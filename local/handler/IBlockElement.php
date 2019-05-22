<?
AddEventHandler("iblock", "OnAfterIBlockElementUpdate", "OnAfterIBlockElementUpdateHandler");
AddEventHandler("iblock", "OnAfterIBlockElementDelete", "OnAfterIBlockElementDeleteHandler");
AddEventHandler("iblock", "OnAfterIBlockElementAdd", "OnAfterIBlockElementUpdateHandler");

function OnAfterIBlockElementUpdateHandler(&$arFields)
{
    if ($arFields["RESULT"] && $arFields['IBLOCK_ID'] == IBLOCK_TEST) {
        \Bitrix\Iblock\ElementTable::getEntity()->cleanCache();
    }
}

function OnAfterIBlockElementDeleteHandler(&$arFields)
{
    if ($arFields['IBLOCK_ID'] == IBLOCK_TEST) {
        \Bitrix\Iblock\ElementTable::getEntity()->cleanCache();
    }
}
