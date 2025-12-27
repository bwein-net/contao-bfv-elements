<?php

declare(strict_types=1);

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
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\StringUtil;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement('bfvWidget', category: 'bfvElements', template: 'ce_bfv_widget')]
class BfvWidgetElementController extends AbstractContentElementController
{
    public function __construct(private readonly WidgetFactory $widgetFactory)
    {
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        $provider = $this->widgetFactory->getWidgetProvider($model->bfvWidgetProvider);
        $setting = BfvElementsSettingModel::findById($model->bfvSetting);

        if ($provider instanceof WidgetProviderInterface && $setting instanceof BfvElementsSettingModel) {
            $provider->setWidgetId('bfv_widget_'.$model->id);
            $provider->setClubId($setting->clubId);
            $provider->setTeamId($setting->teamId);
            $provider->setSeasonId($setting->seasonId);

            $width = $this->generateSizeValue($model->bfvWidgetWidth);
            $provider->setWidth($width);
            $height = $this->generateSizeValue($model->bfvWidgetHeight);
            $provider->setHeight($height);

            $provider->setColorResults(BfvElementsSettingModel::generateColorValue($setting->colorResults));
            $provider->setColorNav(BfvElementsSettingModel::generateColorValue($setting->colorNav));
            $provider->setBackgroundNav(BfvElementsSettingModel::generateColorValue($setting->backgroundNav));
            $provider->setColorClubName(BfvElementsSettingModel::generateColorValue($setting->colorClubName));

            $provider->setTemplateScripts($setting->templateScripts);
            $provider->setTemplateInit($setting->templateInit);

            $template->widgetProvider = $model->bfvWidgetProvider;
            $template->clubId = $setting->clubId;
            $template->teamId = $setting->teamId;
            $template->seasonId = $setting->seasonId;
            $template->width = $width;
            $template->height = $height;

            $template->bfvWidgetCode = $provider->generateWidgetCode();
        }

        return $template->getResponse();
    }

    private function generateSizeValue($sizeRaw): string
    {
        $size = 'undefined';
        $arrSize = StringUtil::deserialize($sizeRaw);

        if (isset($arrSize['value']) && '' !== $arrSize['value'] && $arrSize['value'] >= 0) {
            $size = $arrSize['value'].$arrSize['unit'];
        }

        return $size;
    }
}
