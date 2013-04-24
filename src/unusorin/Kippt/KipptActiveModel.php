<?php
/**
 * src/unusorin/Kippt/KipptActiveModel.php
 * @author Sorin Badea <sorin.badea91@gmail.com>
 */
namespace unusorin\Kippt;

/**
 * Class KipptActiveModel
 * @package unusorin\Kippt
 */
class KipptActiveModel extends KipptModel
{
    /**
     * get all objects from model
     * @param array $params
     * @return array
     */
    public static function getAll($params = array())
    {
        $objects  = array();
        $class    = get_called_class();
        $callback = function (\CurlResponse $response, $callback) use (&$objects, $class) {

            foreach ($response->body->objects as $object) {
                $objects[] = new $class($object);
            }

            if (!empty($response->body->meta->next)) {
                $callback(Kippt::$dataProvider->makeRequest($response->body->meta->next), $callback);
            }
        };

        $response = Kippt::$dataProvider->makeRequest(static::$objectUrl . "?" . http_build_query($params, null, '&'));

        $callback($response, $callback);

        return $objects;
    }

    /**
     * get specific model
     * @param int $id
     * @param array $params
     * @return static
     */
    public static function get($id, $params = array())
    {
        $response = Kippt::$dataProvider->makeRequest(
            static::$objectUrl . $id . "/?" . http_build_query($params, "", '&')
        );
        $class    = get_called_class();
        return new $class($response->body);
    }

    /**
     * save current object
     */
    public function save()
    {
        $payload = array();

        foreach (static::$writable as $field) {
            if (strlen($this->{$field}) > 0) {
                $payload[$field] = $this->{$field};
            }
        }

        if ($this->canAdd) {
            $response = Kippt::$dataProvider->makeRequest(static::$objectUrl, 'post', json_encode($payload));
            $this->__construct($response->body);
        } else {
            echo static::$objectUrl . $this->id;
            $response = Kippt::$dataProvider->makeRequest(
                static::$objectUrl . $this->id . '/',
                'PUT',
                json_encode($payload)
            );
            $this->__construct($response->body);
        }
    }

    public function delete(){
        if(!$this->canAdd){
            Kippt::$dataProvider->makeRequest(static::$objectUrl.$this->id.'/','delete');
            return true;
        }else{
            return false;
        }
    }
}