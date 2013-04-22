<?php
/**
 * src/unusorin/Kippt/Exceptions/KipptException.php
 * @author Sorin Badea <sorin.badea91@gmail.com>
 */
namespace unusorin\Kippt\Exceptions;

/**
 * Class KipptException
 * @package unusorin\Kippt\Exceptions
 */
class KipptException extends \Exception
{
    /**
     * @param string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}