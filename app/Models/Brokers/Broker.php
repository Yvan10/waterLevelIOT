<?php namespace Models\Brokers;

use Zephyrus\Database\Brokers\DatabaseBroker;
use Zephyrus\Database\DatabaseSession;

/**
 * Zephyrus enforces that the way to communicate with your database should use broker instances. This class acts as a
 * middleware, all the other "brokers" should extends this class and thus, you can add project specific processing to
 * this class that every other brokers shall inherit.
 *
 * Class Broker
 * @package Models\Brokers
 */
abstract class Broker extends DatabaseBroker
{
    public function __construct()
    {
        parent::__construct(DatabaseSession::getInstance()->getDatabase());
        /*$this->applyConnectionVariables();*/
    }

    /**
     * Sample code if you want to automatically send php data to the database environment which could be used inside a
     * trigger for example. If this has no purpose in your project, you should remove this method.
     */
    /*private function applyConnectionVariables()
    {
        $userId = Session::getInstance()->read('id');
        parent::addSessionVariable('zephyrus.user_id', $user_id);
    }*/
}
