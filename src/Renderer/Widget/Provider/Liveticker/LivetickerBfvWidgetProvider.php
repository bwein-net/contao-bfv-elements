<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider\Liveticker;

use Bwein\BfvElements\Renderer\Widget\Provider\AbstractWidgetProvider;

class LivetickerBfvWidgetProvider extends AbstractWidgetProvider
{
    protected $label = 'Liveticker';
    protected $supports = 'liveticker';

    public function validate(): bool
    {
        if (empty($this->clubId) || empty($this->teamId)) {
            return false;
        }

        return true;
    }

    public function generateWidgetCode(): string
    {
        if ($this->validate()) {
            $widgetParams = sprintf(
                '"%s", "%s", "%s", %s',
                $this->clubId,
                $this->teamId,
                $this->widgetId,
                json_encode($this->getWidgetParams())
            );

            return $this->generateWidgetInit('BFVWidget.HTML5.zeigeMannschaftsLiveticker', $widgetParams);
        }

        return '';
    }
}
