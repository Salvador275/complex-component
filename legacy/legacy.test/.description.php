<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use \Bitrix\Main\Localization\Loc;

$arComponentDescription = array(
    "NAME" => Loc::getMessage('COMPONENT_NAME'),
    "DESCRIPTION" => Loc::getMessage('COMPONENT_DESCRIPTION'),
    "ICON" => "/images/sections_list.gif",
    "CACHE_PATH" => "Y",
    "PATH" => array(
        "ID" => "legacy",
        "NAME" => Loc::getMessage('COMPONENT_PATH_NAME')
    ),
);

