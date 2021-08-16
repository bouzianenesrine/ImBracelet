<?php

namespace Firebase;
require 'firebaseInterface.php';
/**
 * Firebase PHP Client Library
 *
 * @author Tamas Kalman <ktamas77@gmail.com>
 * @url    https://github.com/ktamas77/firebase-php/
 * @link   https://www.firebase.com/docs/rest-api.html
 */

/**
 * Firebase PHP Class
 *
 * @author Tamas Kalman <ktamas77@gmail.com>
 * @link   https://www.firebase.com/docs/rest-api.html
 */
class FirebaseLib implements FirebaseInterface
{
    protected $baseURI;
    protected $timeout;
    protected $token;
    protected $curlHandler;
    protected $sslConnection;



   
    /**
     * Writing data into Firebase with a PUT request
     * HTTP 200: Ok
     *
     * @param string $path Path
     * @param mixed $data Data
     * @param array $options Options
     * @return mixed
     */
    public function set(string $path, $data, array $options = [])
    {
        return $this->writeData($path, $data, 'PUT', $options);
    }

    /**
     * Pushing data into Firebase with a POST request
     * HTTP 200: Ok
     *
     * @param string $path Path
     * @param mixed $data Data
     * @param array $options Options
     * @return mixed
     */
    public function push(string $path, $data, array $options = [])
    {
        return $this->writeData($path, $data, 'POST', $options);
    }

    /**
     * Updating data into Firebase with a PATH request
     * HTTP 200: Ok
     *
     * @param string $path Path
     * @param mixed $data Data
     * @param array $options Options
     * @return mixed
     */
    public function update(string $path, $data, array $options = [])
    {
        return $this->writeData($path, $data, 'PATCH', $options);
    }

    /**
     * Reading data from Firebase
     * HTTP 200: Ok
     *
     * @param string $path Path
     * @param array $options Options
     * @return mixed
     */
    public function get(string $path, array $options = [])
    {
        $ch = $this->getCurlHandler($path, 'GET', $options);
        return curl_exec($ch);
    }

    /**
     * Deletes data from Firebase
     * HTTP 204: Ok
     *
     * @param string $path Path
     * @param array $options Options
     * @return mixed
     */
    public function delete(string $path, array $options = [])
    {
        $ch = $this->getCurlHandler($path, 'DELETE', $options);
        return curl_exec($ch);
    }

    /**
     * Returns with Initialized CURL Handler
     *
     * @param string $path Path
     * @param string $mode Mode
     * @param array $options Options
     * @return mixed
     */
    private function getCurlHandler(string $path, string $mode, array $options = [])
    {
        $url = $this->getJsonPath($path, $options);
        $ch = $this->curlHandler;
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $mode);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $this->getSSLConnection());
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_URL, $url);
        return $ch;
    }

    /**
     * Writes Data to Firebase API
     *
     * @param string $path
     * @param $data
     * @param string $method
     * @param array $options
     * @return mixed
     */
    
}
?>