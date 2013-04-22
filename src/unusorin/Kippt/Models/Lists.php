<?php
/**
 * src/unusorin/Kippt/Models/Lists.php
 * @author Sorin Badea <sorin.badea91@gmail.com>
 */
namespace unusorin\Kippt\Models;

use unusorin\Kippt\KipptActiveModel;

/**
 * Class Lists
 * @package unusorin\Kippt\Models
 */
class Lists extends KipptActiveModel{
    public $app_url;
    public $rss_url;
    public $updated;
    public $description;
    public $title;
    public $created;
    public $collaborators;
    public $slug;
    /**
     * @var User
     */
    public $user;
    public $id;
    public $is_private;
    public $resource_uri;

    /**
     * @var string
     */
    protected static $objectUrl = '/api/lists/';

    /**
     * @param string $data
     */
    public function __construct($data){
        parent::__construct($data);
        $this->user=new User($this->user);
    }
}