<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Team;

class TeamMatchesBfvWidgetProvider extends AbstractTeamBfvWidgetProvider
{
    protected $label = 'Mannschaft: Spiele';
    protected $supports = 'team_matches';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.mannschaftTabs.spiele'];

        return $params;
    }
}
