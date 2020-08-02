<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Team;

class TeamCrewBfvWidgetProvider extends AbstractTeamBfvWidgetProvider
{
    protected $label = 'Mannschaft: Kader';
    protected $supports = 'team_crew';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.mannschaftTabs.kader'];

        return $params;
    }
}
