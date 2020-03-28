<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Team;

class TeamScorersBfvWidgetProvider extends AbstractTeamBfvWidgetProvider
{
    protected $label = 'Mannschaft: Torschützen';
    protected $supports = 'team_scorers';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.mannschaftTabs.wettbewerbTorschuetzen'];

        return $params;
    }
}
