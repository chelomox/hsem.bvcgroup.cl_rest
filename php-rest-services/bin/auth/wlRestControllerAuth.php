<?php

require_once 'wlAuthHandler.php';
require_once __DIR__ . '/../wlRestUtils.php';

/**
 * WiseLoop wlRestControllerAuth class definition<br/>
 * This is the base authentication controller that should be registered in within a service in order to have authentication routes for the API.<br/>
 * @code
$authHandler = new myAuthHandler();
$service->registerController(new wlRestControllerAuth($authHandler));
 * @endcode
 * @author WiseLoop
 * @see wlAuthHandler
 *
 * See also: @ref howto-06-security
 */
class wlRestControllerAuth extends wlRestController {

    /**
     * @var wlAuthHandler the auth handler that will authenticate the user
     */
    private $_authHandler;

    /**
     * @param wlAuthHandler $authHandler the auth handler that will authenticate the user
     * @param string $name the service controller name
     */
    public function __construct($authHandler = null, $name = 'auth') {
        $this->_authHandler = $authHandler;
        parent::__construct($name);
    }

    /**
     * The corresponding method for the login route (a POST request).
     * @return mixed|null
     * @throws wlRestException
     */
    protected function loginPost() {
        if(!$this->_authHandler) {
            return null;
        }
        try {
            $this->_authHandler->clear();
            $authData = $this->_authHandler->authenticate($this->actionParams);
            return $this->_authHandler->set($authData);
        }catch(Exception $ex) {
            $code = $ex->getCode();
            if(!wlRestUtils::getStatusCodeMessage($code)) {
                $code = 500;
            }
            throw new wlRestException($ex->getMessage(), $code);
        }
    }

    /**
     * The corresponding method for the logout route (a POST request).
     */
    protected function logoutPost() {
        if(!$this->_authHandler) {
            return null;
        }
        $this->_authHandler->clear();
        return null;
    }

    /**
     * The corresponding method for the user route (a GET request).
     */
    protected function userGet() {
        if(!$this->_authHandler) {
            return null;
        }
        $fieldName = count($this->actionParams) ? $this->actionParams[0] : null;
        $userData = null;
        $userData = $this->_authHandler->get($fieldName);
        if(!$userData) {
            throw new wlRestException('Unauthorized', 401);
        }
        return $userData;
    }
    
}
