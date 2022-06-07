<?php

class Session
{
    public static $instance = null;

    public static function instance()
    {
        if (static::$instance === null) {
            // if we don't have an instance of Session yet,
            // create it
            static::$instance = new static;

        }

        // return the current instance of Session
        return static::$instance;
    }


    public $data = [];

    protected function __construct()
    {
        session_start();

        $this->data = $_SESSION;

        if (isset($_SESSION['flashed_data'])) {
            $this->data = array_merge($this->data, $_SESSION['flashed_data']);
            unset($_SESSION['flashed_data']);
        }
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;

        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function flash($key, $value)
    {
        if (!isset($_SESSION['flashed_data'])) {
            $_SESSION['flashed_data'] = [];
        }

        $_SESSION['flashed_data'][$key] = $value;
    }
}