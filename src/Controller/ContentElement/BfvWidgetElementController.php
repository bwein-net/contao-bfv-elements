<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Controller\ContentElement;

use Bwein\BfvElements\Model\BfvElementsSettingModel;
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
        $setting = BfvElementsSettingModel::findByPk($model->bfvSetting);
        if ($provider instanceof WidgetProviderInterface && $setting instanceof BfvElementsSettingModel) {
            $provider->setWidgetId('bfv_widget_'.$model->id);
            $provider->setClubId($setting->clubId);
            $provider->setTeamId($setting->teamId);
            $provider->setSeasonId($setting->seasonId);

            $arrSize = StringUtil::deserialize($model->bfvWidgetWidth);
            if (isset($arrSize['value']) && '' !== $arrSize['value'] && $arrSize['value'] >= 0) {
                $provider->setWidth($arrSize['value'].$arrSize['unit']);
            }
            $arrSize = StringUtil::deserialize($model->bfvWidgetHeight);
            if (isset($arrSize['value']) && '' !== $arrSize['value'] && $arrSize['value'] >= 0) {
                $provider->setHeight($arrSize['value'].$arrSize['unit']);
            }

            $provider->setColorResults(BfvElementsSettingModel::generateColorValue($setting->colorResults));
            $provider->setColorNav(BfvElementsSettingModel::generateColorValue($setting->colorNav));
            $provider->setBackgroundNav(BfvElementsSettingModel::generateColorValue($setting->backgroundNav));
            $provider->setColorClubName(BfvElementsSettingModel::generateColorValue($setting->colorClubName));

            $provider->setTemplateScripts($setting->templateScripts);
            $provider->setTemplateInit($setting->templateInit);

            $template->bfvWidgetCode = $provider->generateWidgetCode();
        }

        return $template->getResponse();
    }
}
