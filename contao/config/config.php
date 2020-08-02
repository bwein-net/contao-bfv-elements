<?php

declare(strict_types=1);

/*
 * This file is part of BFV Elements for Contao Open Source CMS.
 *
 * (c) bwein.net
 *
 * @license MIT
 */

use Bwein\BfvElements\Model\BfvElementsSettingModel;

$GLOBALS['BE_MOD']['bwein_bfv_elements']['bwein_bfv_setting'] = [
    'tables' => [BfvElementsSettingModel::getTable()],
];

$GLOBALS['TL_MODELS']['tl_bwein_bfv_elements_setting'] = BfvElementsSettingModel::class;
