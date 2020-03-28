<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Competition;

class CompetitionChartBfvWidgetProvider extends AbstractCompetitionBfvWidgetProvider
{
    protected $label = 'Liga: Tabellen';
    protected $supports = 'competition_chart';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.wettbewerbTabs.tabelle'];

        return $params;
    }
}
