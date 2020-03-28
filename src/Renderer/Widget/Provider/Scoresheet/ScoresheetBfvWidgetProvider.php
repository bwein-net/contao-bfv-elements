<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Scoresheet;

use Bwein\BfvElements\Renderer\Widget\Provider\AbstractWidgetProvider;

class ScoresheetBfvWidgetProvider extends AbstractWidgetProvider
{
    protected $label = 'Spielbericht';
    protected $supports = 'scoresheet';

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

            return $this->generateWidgetInit('BFVWidget.HTML5.zeigeSpielbericht', $widgetParams);
        }

        return '';
    }
}
