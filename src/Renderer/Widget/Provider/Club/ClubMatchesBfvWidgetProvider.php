<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Club;

class ClubMatchesBfvWidgetProvider extends AbstractClubBfvWidgetProvider
{
    protected $label = 'Verein: Spiele';
    protected $supports = 'club_matches';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.vereinTabs.spiele'];

        return $params;
    }
}
