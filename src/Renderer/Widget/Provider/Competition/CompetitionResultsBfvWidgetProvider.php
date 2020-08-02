<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Competition;

class CompetitionResultsBfvWidgetProvider extends AbstractCompetitionBfvWidgetProvider
{
    protected $label = 'Liga: Ergebnisse';
    protected $supports = 'competition_results';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.wettbewerbTabs.ergebnisse'];

        return $params;
    }
}
