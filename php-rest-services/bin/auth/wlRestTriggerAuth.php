<?php

require_once 'wlAuthHandler.php';

/**
 * WiseLoop RestTriggerAuth class definition<br/>
 * This trigger should be hooked to the wlRestTrigger::ON_REQUEST_EVENT.
 * @code
$authHandler = new myAuthHandler();
$service->registerTrigger(new wlRestTriggerAuth($authHandler), wlRestTrigger::ON_REQUEST_EVENT);
 * @endcode
 * @author WiseLoop
 * @see wlAuthHandler
 *
 * See also: @ref howto-06-security
 */
class wlRestTriggerAuth extends wlRestTrigger {

    /**
     * @var wlAuthHandler the auth handler that will authenticate the user
     */
    private $_authHandler;

    /**
     * @param wlAuthHandler $authHandler the auth handler that will authenticate the user
     */
    public function __construct($authHandler = null) {
        $this->_authHandler = $authHandler;
    }

    /**
     * Runs the trigger.
     */
    public function run() {
        if($this->_authHandler && !$this->_authHandler->isAuthorized($this->getService()->getRequest())) {
            throw new wlRestException('Unauthorized', 401);
        }
    }
}
