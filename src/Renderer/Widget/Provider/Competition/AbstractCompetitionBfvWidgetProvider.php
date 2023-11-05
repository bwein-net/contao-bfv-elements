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

use Bwein\BfvElements\Renderer\Widget\Provider\AbstractWidgetProvider;

abstract class AbstractCompetitionBfvWidgetProvider extends AbstractWidgetProvider
{
    protected $seletedTabMap = [
        'BFVWidget.HTML5.wettbewerbTabs.ergebnisse' => 'results',
        'BFVWidget.HTML5.wettbewerbTabs.tabelle' => 'tables/tabletable',
        'BFVWidget.HTML5.wettbewerbTabs.torschuetzen' => 'scorer',
    ];

    public function validate(): bool
    {
        if (empty($this->seasonId)) {
            return false;
        }

        return true;
    }

    public function generateWidgetCode(): string
    {
        if ($this->validate()) {
            $widgetParams = sprintf(
                '"%s", "%s", %s',
                $this->seasonId,
                $this->widgetId,
                json_encode($this->getWidgetParams()),
            );

            return $this->generateWidgetInit('BFVWidget.HTML5.zeigeWettbewerb', $widgetParams);
        }

        return '';
    }
}
