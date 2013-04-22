<?php
/**
 * kippt bootstrap
 */
require_once __DIR__.'/../curl/lib/curl.php';
require_once __DIR__.'/../curl/lib/curl_response.php';

spl_autoload_register(
    function ($className) {
        $className = ltrim($className, '\\');
        $fileName  = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

        require_once $fileName;
    }
);