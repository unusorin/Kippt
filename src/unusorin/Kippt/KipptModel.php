<?php
/**
 * src/unusorin/Kippt/KipptModel.php
 * @author Sorin Badea <sorin.badea91@gmail.com>
 */
namespace unusorin\Kippt;

/**
 * Class KipptModel
 * @package unusorin\Kippt
 */
class KipptModel extends \stdClass{

    /**
     * @var string
     */
    protected static $objectUrl;

    /**
     * @param string $data
     */
    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }
}