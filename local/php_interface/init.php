<?
define("IBLOCK_TEST", 1);

require_once(__DIR__ . '/../handler/IBlockElement.php');

CModule::AddAutoloadClasses(
    '',
    [
        'Test\TestCache' => '/local/classes/TestCache.php',
    ]
);

