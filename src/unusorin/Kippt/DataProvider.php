<?php
/**
 * src/unusorin/Kippt/DataProvider.php
 * @author Sorin Badea <sorin.badea91@gmail.com>
 */
namespace unusorin\Kippt;

use unusorin\Kippt\Exceptions\KipptException;

/**
 * Class DataProvider
 * @package unusorin\Kippt
 */
class DataProvider
{
    /**
     * @var \Curl
     */
    protected $curl;
    /**
     * @var string
     */
    protected $username;
    /**
     * @var string
     */
    protected $apiToken;

    /**
     * @param string $username
     * @param string $apiToken
     */
    public function __construct($username, $apiToken)
    {
        $this->curl                   = new \Curl();
        $this->curl->user_agent       = 'Kippt PHP Client';
        $this->curl->follow_redirects = true;

        $this->username = $username;
        $this->apiToken = $apiToken;

        $this->curl->headers['X-Kippt-Username']  = $this->username;
        $this->curl->headers['X-Kippt-API-Token'] = $this->apiToken;
    }

    /**
     * @param string $library
     * @param string $type
     * @param array|string $payload
     * @return mixed
     * @throws Exceptions\KipptException
     * @throws \InvalidArgumentException
     */
    public function makeRequest($library, $type = 'get', $payload = array())
    {
        if (!in_array(strtolower($type), array('get', 'post', 'put', 'delete'))) {
            throw new \InvalidArgumentException('Invalid request type');
        }
        $response       = $this->curl->request(strtoupper($type), 'https://kippt.com' . $library, $payload);
        $response->body = json_decode($response->body);
        switch ($response->headers['Status-Code']) {
            case '200':
            case
                '201':
                return $response;
            default:
                if (isset($response->body->message)) {
                    throw new KipptException($response->body->message);
                } else {
                    throw new KipptException(json_encode($response->body));
                }
        }
    }

}