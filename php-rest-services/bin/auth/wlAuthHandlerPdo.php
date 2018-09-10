<?php

require_once 'wlAuthHandler.php';

/**
 * WiseLoop AuthHandlerPdo class definition<br/>
 * This class is designed to provide security handlers that are authorizing users stored in a database.<br/>
 * The connection to the database is made through PDO extension, so make sure you have it enabled.
 * @author WiseLoop
 * @see wlAuthHandler
 *
 * See also: @ref howto-06-security
 */
class wlAuthHandlerPdo extends wlAuthHandler {

    /**
     * @var string the PDO connection string
     */
    private $_connString;

    /**
     * @var string the database user name used to connect
     */
    private $_dbUserName;

    /**
     * @var string the database password
     */
    private $_dbPassword;

    /**
     * @var string the table name that stores the users
     */
    private $_usersTable;

    /**
     * @var string the field name that corresponds to the userName used in authentication mechanism
     */
    private $_userNameField;

    /**
     * @var string the field name that corresponds to the user password
     */
    private $_passwordField;

    /**
     * @var bool specifies if the password id hashed using md5
     */
    private $_isPasswordMd5;

    /**
     * @param string $connString the PDO connection string
     * @param string $dbUserName the database user name used to connect
     * @param string $dbPassword the database password
     * @param string $usersTable the table name that stores the users
     * @param string $userNameField the field name that corresponds to the userName used in authentication mechanism
     * @param string $passwordField the field name that corresponds to the user password
     * @param bool $isPasswordMd5 specifies if the password id hashed using md5
     */
    public function __construct($connString, $dbUserName, $dbPassword, $usersTable = 'users', $userNameField = 'userName', $passwordField = 'password', $isPasswordMd5 = true) {
        parent::__construct();
        $this->_connString = $connString;
        $this->_dbUserName = $dbUserName;
        $this->_dbPassword = $dbPassword;
        $this->_usersTable = $usersTable;
        $this->_userNameField = $userNameField;
        $this->_passwordField = $passwordField;
        $this->_isPasswordMd5 = $isPasswordMd5;
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
     * This method authenticates a user/password pair against the database.
     * @param array $authData an array containing two fields: <b>userName</b> and <b>password</b>
     * @throws Exception
     * @return array the user information consisting of all the fields for the authenticated user except the password (ex. fullName, access rights, email etc.)
     */
    public function authenticate($authData){
        $userName = $authData['userName'];
        $password = $authData['password'];
        if($this->_passwordField) {
            $password = md5($password);
        }

        $dbh = @new PDO($this->_connString, $this->_dbUserName, $this->_dbPassword);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $qry = "SELECT * FROM `$this->_usersTable` WHERE `$this->_userNameField` = '$userName' AND `$this->_passwordField` = '$password'";

        $stmt = $dbh->query($qry);
        if(!$stmt) {
            $error = $stmt->errorInfo();
            throw(new Exception("$error[0]: $error[1] $error[2]", 500));
        }

        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $ret = array();
            foreach(array_keys($row) as $field) {
                if($field != $this->_passwordField) {
                    $ret[$field] = $row[$field];
                }
            }
            return $ret;
        }

        throw new Exception('Invalid credentials', 401);
    }

}
