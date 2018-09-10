<?php

/**
 * WiseLoop Session class definition<br/>
 * This class is responsible for handling server session data.
 * The session is basically a collection of key-value pairs gathered together under a common session name.
 * @author WiseLoop
 */
class wlSession  {

    /**
     * Constructor.<br/>
     * Creates a wlSession object.
     * @param string $name the session name
     */
    public function __construct($name = 'wl') {
        @session_name($name);
        if(session_id() === "") {
            @session_start();
        }
    }

    /**
     * Sets a session value.
     * @param string $key the key name
     * @param mixed $data the value
     * @return mixed the value data if the set was successful or null if not
     */
    public function set($key, $data) {
        if($key !== null && $data !== null) {
            $_SESSION[$key] = $data;
            return $data;
        }
        return null;
    }

    /**
     * Gets a session value.
     * @param string $key the key name
     * @param string|null $fieldName if the value is an array, the fieldName specify the field (key) of that array and the corresponding value will be retrieved instead of the whole array
     * @return mixed|null
     */
    public function get($key, $fieldName = null) {
        $val = isset($_SESSION[$key]) ? $_SESSION[$key] : null;
        if(!$fieldName) {
            return $val;
        }
        return isset($val[$fieldName]) ? $val[$fieldName] : null;
    }

    /**
     * Clears the session value for the specified key.
     * @param string $key the key value
     */
    public function clear($key) {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

}
