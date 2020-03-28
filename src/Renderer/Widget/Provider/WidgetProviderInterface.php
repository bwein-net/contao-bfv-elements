<?php

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

namespace Bwein\BfvElements\Renderer\Widget\Provider;

interface WidgetProviderInterface
{
    public function getLabel(): string;

    public function getSupports(): string;

    public function supports(string $widgetProvider): bool;

    public function setWidgetId(string $widgetId): void;

    public function setClubId(string $clubId): void;

    public function setTeamId(string $TeamId): void;

    public function setSeasonId(string $seasonId): void;

    public function setWidth(string $width): void;

    public function setHeight(string $height): void;

    public function setColorResults(string $colorResults): void;

    public function setColorNav(string $colorNav): void;

    public function setBackgroundNav(string $backgroundNav): void;

    public function setColorClubName(string $colorClubName): void;

    public function validate(): bool;

    public function generateWidgetCode(): string;
}
