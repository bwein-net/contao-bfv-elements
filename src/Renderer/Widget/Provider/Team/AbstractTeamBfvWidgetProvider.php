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

use Bwein\BfvElements\Renderer\Widget\Provider\AbstractWidgetProvider;

abstract class AbstractTeamBfvWidgetProvider extends AbstractWidgetProvider
{
    protected $seletedTabMap = [
        'BFVWidget.HTML5.mannschaftTabs.spiele' => 'teammatches',
        'BFVWidget.HTML5.mannschaftTabs.wettbewerbErgebnisse' => 'select/competitionResults',
        'BFVWidget.HTML5.mannschaftTabs.wettbewerbTabelle' => 'select/competitionTable',
        'BFVWidget.HTML5.mannschaftTabs.kader' => 'kader',
        'BFVWidget.HTML5.mannschaftTabs.wettbewerbTorschuetzen' => 'select/competitionScorer',
        'BFVWidget.HTML5.mannschaftTabs.liveticker' => 'select/liveticker',
    ];

    public function validate(): bool
    {
        if (empty($this->teamId)) {
            return false;
        }

        return true;
    }

    public function generateWidgetCode(): string
    {
        if ($this->validate()) {
            $widgetParams = sprintf(
                '"%s", "%s", %s',
                $this->teamId,
                $this->widgetId,
                json_encode($this->getWidgetParams())
            );

            return $this->generateWidgetInit('BFVWidget.HTML5.zeigeMannschaftKomplett', $widgetParams);
        }

        return '';
    }
}
