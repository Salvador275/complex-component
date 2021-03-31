<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

/**
 * @var string $componentPath
 * @var string $componentName
 * @var array $arCurrentValues
 * */

use Bitrix\Main\Loader,
    Bitrix\Main\Localization\Loc,
    \Bitrix\Iblock\IblockTable;

if( !Loader::includeModule("iblock") ) {
    throw new \Exception('Не загружены модули необходимые для работы компонента');
}

$arIblock = [];
$rsIblocks  = IblockTable::getList();
while ($iBlock = $rsIblocks->fetch()){
    $arIblock[$iBlock['ID']] = '['.$iBlock['ID'].'] '.$iBlock['NAME'];
}
unset($rsIblocks, $iBlock);

$arComponentParameters = [
    "GROUPS" => [
        "SETTINGS" => [
            "NAME" => Loc::getMessage('GROUP_NAME'),
            "SORT" => 500,
        ],
    ],
    // поля для ввода параметров в правой части
    "PARAMETERS" => [
        // Произвольный параметр типа СПИСОК
        "IBLOCK_ID" => [
            "PARENT" => "SETTINGS",
            "NAME" => Loc::getMessage('PARAMETER_NAME'),
            "TYPE" => "LIST",
            "ADDITIONAL_VALUES" => "Y",
            "VALUES" => $arIblock,
            "REFRESH" => "Y"
        ],
        // Настройки кэширования
        'CACHE_TIME' => ['DEFAULT' => 3600],
    ]
];
