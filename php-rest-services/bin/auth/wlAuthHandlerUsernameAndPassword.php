<?php

require_once 'wlAuthHandler.php';

/**
 * WiseLoop wlAuthHandlerUsernameAndPassword class definition<br/>
 * This class is designed to provide security handlers for very simple APIs that needs single user authentication.<br/>
 * @author WiseLoop
 * @see wlAuthHandler
 *
 * See also: @ref howto-06-security
 */
class wlAuthHandlerUsernameAndPassword extends wlAuthHandler {

    /**
     * @var string the user name
     */
    private $_userName;

    /**
     * @var string the password
     */
    private $_password;

    /**
     * @param string $userName
     * @param string $password
     */
    public function __construct($userName, $password) {
        parent::__construct();
        $this->_userName = $userName;
        $this->_password = $password;
    }

    /**
     * This method should be overwritten in the derived classes and describes how to authorize a request.
     * @param wlRestRequest $request the current request
     * @return bool
     */
    public function isAuthorized($request) {
        if('auth' == $request->getControllerName()) {
            return true;
        }
        return parent::isAuthorized($request);
    }

    /**
     * This method authenticates a user/password pair against the credentials given in the constructor.
     * @param array $authData an array containing two fields: <b>userName</b> and <b>password</b>
     * @throws Exception
     * @return array the user information consisting of the userName and a timestamp corresponding to the login time.
     */
    public function authenticate($authData){
        $userName = $authData['userName'];
        $password = $authData['password'];
        if($userName == $this->_userName && $password == $this->_password) {
            return array(
                'userName' => $userName,
                'timestamp' => time()
            );
        }
        throw new Exception('Invalid credentials', 401);
    }

}
