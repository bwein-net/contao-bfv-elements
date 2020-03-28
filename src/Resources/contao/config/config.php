<?php

use Bwein\BfvElements\Model\BfvElementsSettingModel;

$GLOBALS['BE_MOD']['bwein_bfv_elements']['bwein_bfv_setting'] = [
    'tables' => [BfvElementsSettingModel::getTable()],
];

$GLOBALS['TL_MODELS']['tl_bwein_bfv_elements_setting'] = BfvElementsSettingModel::class;
