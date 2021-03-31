<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

class CLegacyTest extends \CBitrixComponent
{
    public function executeComponent()
    {
        global $APPLICATION;
        $arVariables = array();
        $arDefaultVariableAliases = array();
        $arComponentVariables = array(
            "SECTION_ID",
            "SECTION_CODE",
            "ELEMENT_ID",
            "ELEMENT_CODE",
            "action",
        );

        $arVariableAliases = CComponentEngine::makeComponentVariableAliases($arDefaultVariableAliases, $arParams["VARIABLE_ALIASES"]);
        CComponentEngine::initComponentVariables(false, $arComponentVariables, $arVariableAliases, $arVariables);

        if(isset($arVariables["ELEMENT_ID"]) && intval($arVariables["ELEMENT_ID"]) > 0)
            $componentPage = "element";
        elseif(isset($arVariables["ELEMENT_CODE"]) && $arVariables["ELEMENT_CODE"] <> '')
            $componentPage = "element";
        elseif(isset($arVariables["SECTION_ID"]) && intval($arVariables["SECTION_ID"]) > 0)
            $componentPage = "section";
        elseif(isset($arVariables["SECTION_CODE"]) && $arVariables["SECTION_CODE"] <> '')
            $componentPage = "section";
        else
            $componentPage = "section";

        $currentPage = htmlspecialcharsbx($APPLICATION->GetCurPage())."?";
        $this->arResult = array(
            "FOLDER" => "",
            "URL_TEMPLATES" => array(
                "section" => $currentPage.$arVariableAliases["SECTION_ID"]."=#SECTION_ID#",
                "element" => $currentPage.$arVariableAliases["SECTION_ID"]."=#SECTION_ID#"."&".$arVariableAliases["ELEMENT_ID"]."=#ELEMENT_ID#",
                "compare" => $currentPage."action=COMPARE",
            ),
            "VARIABLES" => $arVariables,
            "ALIASES" => $arVariableAliases
        );

        $this->IncludeComponentTemplate($componentPage);
    }
}