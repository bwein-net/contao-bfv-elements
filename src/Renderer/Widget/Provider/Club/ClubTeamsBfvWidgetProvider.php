<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Club;

class ClubTeamsBfvWidgetProvider extends AbstractClubBfvWidgetProvider
{
    protected $label = 'Verein: Mannschaften';
    protected $supports = 'club_teams';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.vereinTabs.manschaften'];

        return $params;
    }
}
