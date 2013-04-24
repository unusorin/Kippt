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
class KipptModel extends \stdClass
{

    /**
     * @var string
     */
    protected static $objectUrl;
    protected static $writable = array();


    protected $canAdd = true;

    /**
     * @param array $data
     */
    public function __construct($data = array())
    {
        if(!empty($data)){
            $this->canAdd=false;
        }
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

}