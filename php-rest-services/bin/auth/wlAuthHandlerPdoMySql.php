<?php

require_once 'wlAuthHandlerPdo.php';

/**
 * WiseLoop AuthHandlerPdoMySql class definition<br/>
 * This class is designed to provide security handlers that are authorizing users stored in a MySQL database.<br/>
 * The connection to the database is made through PDO extension, so make sure you have it enabled.
 * @author WiseLoop
 * @see wlAuthHandlerPdo
 *
 * See also: @ref howto-06-security
 */
class wlAuthHandlerPdoMySql extends wlAuthHandlerPdo {

    /**
     * @param string $dbHost database host (ex. localhost)
     * @param string $dbName database name
     * @param string $dbUserName database user name
     * @param string $dbPassword database password
     * @param string $usersTable the table name that stores the users
     * @param string $userNameField the field name that corresponds to the userName used in authentication mechanism
     * @param string $passwordField the field name that corresponds to the user password
     * @param bool $isPasswordMd5 specifies if the password id hashed using md5
     */
    public function __construct($dbHost, $dbName, $dbUserName, $dbPassword, $usersTable = 'users', $userNameField = 'userName', $passwordField = 'password', $isPasswordMd5 = true) {
        $connString = 'mysql:host=' . $dbHost . ';dbname=' . $dbName;
        parent::__construct($connString, $dbUserName, $dbPassword, $usersTable, $userNameField, $passwordField, $isPasswordMd5);
    }

}
