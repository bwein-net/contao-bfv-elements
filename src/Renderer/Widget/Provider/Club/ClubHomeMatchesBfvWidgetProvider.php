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

class ClubHomeMatchesBfvWidgetProvider extends AbstractClubBfvWidgetProvider
{
    protected $label = 'Verein: Heimspiele';

    protected $supports = 'club_homematches';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.vereinTabs.heimspiele'];

        return $params;
    }
}
