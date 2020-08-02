<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Chart;

use Bwein\BfvElements\Renderer\Widget\Provider\AbstractWidgetProvider;

class ChartBfvWidgetProvider extends AbstractWidgetProvider
{
    protected $label = 'Tabelle';
    protected $supports = 'chart';

    public function validate(): bool
    {
        if (empty($this->seasonId) || empty($this->teamId)) {
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
                json_encode($this->getWidgetParams())
            );

            return $this->generateWidgetInit('BFVWidget.HTML5.zeigeWettbewerbsTabelle', $widgetParams);
        }

        return '';
    }

    protected function getWidgetParams(): array
    {
        $params = parent::getWidgetParams();
        $params['teamPermanentId'] = $this->teamId;

        return $params;
    }
}
