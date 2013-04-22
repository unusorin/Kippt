<?php
/**
 * src/unusorin/Kippt/Kipp.php
 * @author Sorin Badea <sorin.badea91@gmail.com>
 */
namespace unusorin\Kippt;

/**
 * Class Kippt
 * @package unusorin\Kippt
 */
class Kippt
{
    /**
     * @var DataProvider
     */
    public static $dataProvider;

    /**
     * initialize Kippt data provider
     * @param string $username
     * @param string $apiToken
     */
    public static function initialize($username, $apiToken)
    {
        self::$dataProvider = new DataProvider($username, $apiToken);
    }
}