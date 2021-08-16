<?php

namespace Firebase;

/**
 * Interface FirebaseInterface
 *
 * @package Firebase
 */
interface FirebaseInterface
{

    /**
     * @param string $path
     * @param mixed $data
     * @param array $options
     * @return mixed
     */
    public function set(string $path, array $data, array $options = []);

    /**
     * @param string $path
     * @param mixed $data
     * @param array $options
     * @return mixed
     */
    public function push(string $path, $data, array $options = []);

    /**
     * @param string $path
     * @param mixed $data
     * @param array $options
     * @return mixed
     */
    public function update(string $path, $data, array $options = []);

    /**
     * @param string $path
     * @param array $options
     * @return mixed
     */
    public function delete(string $path, array $options = []);

    /**
     * @param string $path
     * @param array $options
     * @return mixed
     */
    public function get(string $path, array $options = []);
}