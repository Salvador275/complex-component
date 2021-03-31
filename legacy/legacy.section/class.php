<?php

use Bitrix\Main\Loader,
    \Bitrix\Iblock\SectionTable;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CLegacySection extends \CBitrixComponent
{
    private function checkModules(){
        if( !Loader::includeModule("iblock") ) {
            throw new \Exception('Не загружены модули необходимые для работы компонента');
        }
    }

    public function executeComponent()
    {
        try {
            $this->checkModules();
            $iblockId = (int)$this->arParams['IBLOCK_ID'];
            $arSections = SectionTable::getList(array(
                    'filter' => array(
                        'IBLOCK_ID' => $iblockId,
                        "ACTIVE" => "Y",
                        "GLOBAL_ACTIVE" => "Y"
                    ),
                    'select' =>  array('ID','CODE','NAME'),
                )
            );
            while ($section = $arSections->fetch()){
                $this->arResult['SECTIONS'][] = $section;
            }


            $this->IncludeComponentTemplate();
        } catch (Exception $e) {
            echo $e;
        }
    }
}