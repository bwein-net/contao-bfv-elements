<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Team;

class TeamLivetickerBfvWidgetProvider extends AbstractTeamBfvWidgetProvider
{
    protected $label = 'Mannschaft: Liveticker';
    protected $supports = 'team_liveticker';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.mannschaftTabs.liveticker'];

        return $params;
    }
}
