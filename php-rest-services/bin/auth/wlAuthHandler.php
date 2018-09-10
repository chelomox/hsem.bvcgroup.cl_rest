<?php

require_once __DIR__ . '/../lib/wlSession.php';

/**
 * WiseLoop AuthHandler class definition<br/>
 * This is the base class for defining authentication & authorization handlers.<br/>
 * In order to add security support for an API, one should define an auth handler by extending this class
 * that will describe the authentication & authorization mechanisms for the API:
 * @code
class myAuthHandler extends wlAuthHandler {
    public function authenticate($authData){
        //authenticate $authData and array or an object that should contain the username and password to be authenticated
    }
    public function isAuthorized($request) {
        //authorize the $request
    }
}
 * @endcode
 * A real auth handler should be derived from wlAuthHandler and should overwrite wlAuthHandler::authenticate and wlAuthHandler::isAuthorized methods.<br/>
 * To enable authentication, the auth handler must be instantiated and used inside wlRestControllerAuth that should be registered in within the service
 * and to enable authorization it must be used inside a trigger registered in the service at request time:
 * @code
$authHandler = new myAuthHandler();
$service->registerController(new wlRestControllerAuth($authHandler));
$service->registerTrigger(new wlRestTriggerAuth($authHandler), wlRestTrigger::ON_REQUEST_EVENT);
 * @endcode
 * @author WiseLoop
 *
 * See also: @ref howto-06-security
 */
class wlAuthHandler {

    /**
     * @var wlSession the session data object
     */
    protected $_session;

    /**
     * @var string the session key
     */
    protected $_key;

    /**
     * Constructor.<br/>
     * Creates a wlAuthHandler object.
     */
    public function __construct() {
        $this->_session = new wlSession();
        $this->_key = 'wlAuthData';
    }

    /**
     * This method should be overwritten in the derived classes and describes how to authorize a request.
     * @param wlRestRequest $request the current request
     * @return bool
     */
    public function isAuthorized($request) {
        if(!$this->_session) {
            return false;
        }
        return $this->get() ? true : false;
    }

    /**
     * This method should be overwritten in the derived classes and describes how to authenticate a certain user.
     * @param array|mixed $authData the data (user information - usually userName and password) that needs to be authenticated
     * @return mixed
     */
    function authenticate($authData) {
        if(!is_array($authData)) {
            $authData = array($authData);
        }

        return array(
            'auth' => md5(serialize($authData))
        );
    }

    /**
     * Sets the authentication data for the current session.<br/>
     * This is happening only after a successful authentication.
     * @param mixed $authData the authentication data
     * @return mixed the authentication data if the session set was a success or null if not
     */
    public function set($authData) {
        return $this->_session->set($this->_key, $authData);
    }

    /**
     * Gets the authentication data from the session.
     * @param string|null $fieldName if specified only a that field of the auth data (user information) will be returned
     * @return mixed|null
     */
    public function get($fieldName = null) {
        return $this->_session->get($this->_key, $fieldName);
    }

    /**
     * Clears the authentication data from the session.<br/>
     * This should be used when logging-out.
     */
    public function clear() {
        $this->_session->clear($this->_key);
    }
}
