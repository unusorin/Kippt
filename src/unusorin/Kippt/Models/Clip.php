<?php
/**
 * src/unusorin/Kippt/Models/Clip.php
 * @author Sorin Badea <sorin.badea91@gmail.com>
 */
namespace unusorin\Kippt\Models;

use unusorin\Kippt\Kippt;
use unusorin\Kippt\KipptActiveModel;

/**
 * Class Clip
 * @package unusorin\Kippt\Models
 */
class Clip extends KipptActiveModel
{

    /**
     * @var array
     */
    protected static $writable = array('url', 'title', 'list', 'via', 'notes');
    /**
     * @var string
     */
    protected static $objectUrl = '/api/clips/';

    public $via;
    public $saves;
    public $favicon_url;
    public $is_favorite;
    public $likes;
    public $id;
    public $app_url;
    public $title;
    /**
     * @var Comment[]
     */
    public $comments;
    public $type;
    public $updated;
    /**
     * @var User
     */
    public $user;
    public $url_domain;
    public $created;
    public $url;
    public $notes;
    /**
     * @var Lists
     */
    public $list;
    public $resource_uri;

    /**
     * @param string $data
     */
    public function __construct($data)
    {
        parent::__construct($data);
        $comments = array();
        if ($this->comments->count > 0) {
            foreach ($this->comments->data as $comment) {
                $comments[] = new Comment($this->id, $comment->id);
            }
        }
        $this->comments = $comments;
        $this->user     = new User($this->user);
        if (is_string($this->list)) {
            $this->list = new Lists(Kippt::$dataProvider->makeRequest($this->list)->body);
        } else {
            $this->list = new Lists($this->list);
        }
    }

}