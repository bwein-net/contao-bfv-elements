<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Team;

class TeamChartBfvWidgetProvider extends AbstractTeamBfvWidgetProvider
{
    protected $label = 'Mannschaft: Tabellen';
    protected $supports = 'team_chart';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.mannschaftTabs.wettbewerbTabelle'];

        return $params;
    }
}
