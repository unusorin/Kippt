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
     * @return \CurlResponse
     * @throws Exceptions\KipptException
     */
    public function makeRequest($library)
    {
        $response       = $this->curl->get('https://kippt.com' . $library);
        $response->body = json_decode($response->body);
        switch ($response->headers['Status-Code']) {
            case '200':
                return $response;
            default:
                throw new KipptException($response->body->message);
        }
    }

}