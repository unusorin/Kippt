<?php
/**
 * src/unusorin/Kippt/Models/User.php
 * @author Sorin Badea <sorin.badea91@gmail.com>
 */
namespace unusorin\Kippt\Models;

use unusorin\Kippt\KipptActiveModel;

/**
 * Class User
 * @package unusorin\Kippt\Models
 */
class User extends KipptActiveModel
{
    /**
     * @var string
     */
    public static $objectUrl = '/api/users/';

    /**
     * @return static
     */
    public static function getSelf()
    {
        return self::get('self');
    }
}