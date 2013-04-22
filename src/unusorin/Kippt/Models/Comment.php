<?php
/**
 * src/unusorin/Kippt/Models/Comment.php
 * @author Sorin Badea <sorin.badea91@gmail.com>
 */
namespace unusorin\Kippt\Models;

use unusorin\Kippt\Kippt;
use unusorin\Kippt\KipptModel;

/**
 * Class Comment
 * @package unusorin\Kippt\Models
 */
class Comment extends KipptModel
{
    public $body;
    public $created;
    public $id;
    public $resource_uri;
    /**
     * @var User
     */
    public $user;
    /**
     * @param int $clipId
     * @param int $commentId
     */
    public function __construct($clipId, $commentId)
    {
        $response = Kippt::$dataProvider->makeRequest('/api/clips/' . $clipId . '/comments/' . $commentId . '/');
        parent::__construct($response->body);
        $this->user=new User($this->user);
    }
}