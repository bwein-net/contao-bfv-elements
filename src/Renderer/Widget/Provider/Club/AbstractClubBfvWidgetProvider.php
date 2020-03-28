<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Club;

use Bwein\BfvElements\Renderer\Widget\Provider\AbstractWidgetProvider;

abstract class AbstractClubBfvWidgetProvider extends AbstractWidgetProvider
{
    protected $seletedTabMap = [
        'BFVWidget.HTML5.vereinTabs.spiele' => 'all',
        'BFVWidget.HTML5.vereinTabs.heimspiele' => 'home',
        'BFVWidget.HTML5.vereinTabs.manschaften' => 'team',
    ];

    public function validate(): bool
    {
        if (empty($this->clubId)) {
            return false;
        }

        return true;
    }

    public function generateWidgetCode(): string
    {
        if ($this->validate()) {
            $widgetParams = sprintf(
                '"%s", "%s", %s',
                $this->clubId,
                $this->widgetId,
                json_encode($this->getWidgetParams())
            );

            return $this->generateWidgetInit('BFVWidget.HTML5.zeigeVereinSpiele', $widgetParams);
        }

        return '';
    }
}
