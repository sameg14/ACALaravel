<?php

namespace App\Services;

use App\Db\DBCommon;
use App\Exceptions\LoginException;

use \Exception;

/**
 * Class LoginService this will handle site logins
 * @package ACA\ShopBundle\Service
 */
class LoginService
{
    /**
     * @var DBCommon
     */
    protected $db;

    /**
     * Primary key from the users table
     * @var int
     */
    protected $userId;

    /**
     * This is their full name
     * @var string
     */
    protected $fullName;

    /**
     * This method will handle authentication
     * @param string $username User input
     * @param string $password user input as well
     * @throws Exception
     * @throws LoginException
     * @return bool
     */
    public function doLogin($username, $password)
    {
        if(!isset($this->db)){
            throw new Exception('Database has not been set');
        }

        $query = '
        select
            user_id as uid,
            name as full_name
        from
            aca_user
        where
            username = "'.$this->db->quote($username).'"
            and password = "'.$this->db->quote($password).'"';


        $this->db->setQuery($query);
        $userRow = $this->db->loadObject(); //gets one record

        if(empty($userRow)) {
            throw new LoginException('Your credentials are invalid');
        }

        // Assign this data to the local properties
        $this->userId = $userRow->uid;
        $this->fullName = $userRow->full_name;

        return true;
    }


    /**
     * @param DBCommon $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }
}
