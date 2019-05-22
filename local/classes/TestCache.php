<?

namespace Test;
\Bitrix\Main\Loader::includeModule('iblock');

/**
 * Class TestCache - основной класс
 * @package Test
 */
class TestCache
{
    private $ID_iblock;

    /**
     * TestCache constructor.
     * @param $ID_iblock
     */
    public function __construct($ID_iblock)
    {
        $this->ID_iblock = $ID_iblock;
    }

    /**
     * @param array $arSelect
     * @param array $arSort
     * @param array $arFilter
     * @param int $cacheTime
     * @return array
     */
    public function getData($arSelect = ['ID'], $arSort = ['ID' => 'ASC'], $arFilter = [], $cacheTime = 3600)
    {
        if (isset($arFilter["IBLOCK_ID"]))
            unset($arFilter["IBLOCK_ID"]);

        $query = \Bitrix\Iblock\ElementTable::getList(array(
            'select' => $arSelect,
            'filter' => array_merge(['IBLOCK_ID' => $this->ID_iblock], $arFilter),
            'order' => $arSort,
            'cache' => array(
                'ttl' => $cacheTime,
                'cache_joins' => true,
            )
        ));

        $result = [];
        while ($arResult = $query->fetch()) {
            $result[] = $arResult;
        }
        return $result;
    }
}
