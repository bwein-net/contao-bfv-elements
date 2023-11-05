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

class CompetitionScorersBfvWidgetProvider extends AbstractCompetitionBfvWidgetProvider
{
    protected $label = 'Liga: Torschützen';

    protected $supports = 'competition_scorers';

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['selectedTab'] = $this->seletedTabMap['BFVWidget.HTML5.wettbewerbTabs.torschuetzen'];

        return $params;
    }
}
