<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Controller\ContentElement;

use Bwein\BfvElements\Renderer\Widget\Provider\WidgetProviderInterface;
use Bwein\BfvElements\Renderer\Widget\WidgetFactory;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\StringUtil;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement("bfvWidget", category="bfvElements", template="ce_bfv_widget")
 */
class BfvWidgetElementController extends AbstractContentElementController
{
    /**
     * @var WidgetFactory
     */
    private $widgetFactory;

    public function __construct(WidgetFactory $widgetFactory)
    {
        $this->widgetFactory = $widgetFactory;
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): ?Response
    {
        $provider = $this->widgetFactory->getWidgetProvider($model->bfvWidgetProvider);
        if ($provider instanceof WidgetProviderInterface) {
            $provider->setWidgetId('bfv_widget_'.$model->id);
            $provider->setClubId($model->bfvWidgetClubId);
            $provider->setTeamId($model->bfvWidgetTeamId);
            $provider->setSeasonId($model->bfvWidgetSeasonId);

            $arrSize = StringUtil::deserialize($model->bfvWidgetWidth);
            if (isset($arrSize['value']) && '' !== $arrSize['value'] && $arrSize['value'] >= 0) {
                $provider->setWidth($arrSize['value'].$arrSize['unit']);
            }
            $arrSize = StringUtil::deserialize($model->bfvWidgetHeight);
            if (isset($arrSize['value']) && '' !== $arrSize['value'] && $arrSize['value'] >= 0) {
                $provider->setHeight($arrSize['value'].$arrSize['unit']);
            }

            if (!empty($model->bfvWidgetColorResults)) {
                $provider->setColorResults('#'.$model->bfvWidgetColorResults);
            }
            if (!empty($model->bfvWidgetColorNav)) {
                $provider->setColorNav('#'.$model->bfvWidgetColorNav);
            }
            if (!empty($model->bfvWidgetBackgroundNav)) {
                $provider->setBackgroundNav('#'.$model->bfvWidgetBackgroundNav);
            }
            if (!empty($model->bfvWidgetColorClubName)) {
                $provider->setColorClubName('#'.$model->bfvWidgetColorClubName);
            }

            $template->bfvWidgetCode = $provider->generateWidgetCode();
        }

        return $template->getResponse();
    }
}
