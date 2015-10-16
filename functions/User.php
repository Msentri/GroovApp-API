<?php

/**
 * Created by PhpStorm.
 * User: msentri
 * Date: 2015/10/16
 * Time: 9:04 AM
 */
class User extends GroveApp
{
    public $user_id,$user_name,$user_surname,$user_picture,$user_registered,
          $user_modified,$user_api_key,$user_password,$user_cell_phone,$user_email,$user_dob,$user_membership_type,$status;

    /**
     * User constructor.
     * @param $user_id
     * @param $user_name
     * @param $user_surname
     * @param $user_picture
     * @param $user_registered
     * @param $user_modified
     * @param $user_api_key
     * @param $user_password
     * @param $user_cell_phone
     * @param $user_email
     * @param $user_dob
     * @param $user_membership_type
     * @param $status
     */
    public function __construct($user_id, $user_name,
                                $user_surname,$user_picture,
                                $user_registered, $user_modified,
                                $user_api_key, $user_password,
                                $user_cell_phone, $user_email,
                                $user_dob, $user_membership_type, $status)
    {
        parent::__construct();


        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->user_surname = $user_surname;
        $this->user_picture = $user_picture;
        $this->user_registered = $user_registered;
        $this->user_modified = $user_modified;
        $this->user_api_key = $user_api_key;
        $this->user_password = $user_password;
        $this->user_cell_phone = $user_cell_phone;
        $this->user_email = $user_email;
        $this->user_dob = $user_dob;
        $this->user_membership_type = $user_membership_type;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->user_name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    /**
     * @return mixed
     */
    public function getUserSurname()
    {
        return $this->user_surname;
    }

    /**
     * @param mixed $user_surname
     */
    public function setUserSurname($user_surname)
    {
        $this->user_surname = $user_surname;
    }

    /**
     * @return mixed
     */
    public function getUserPicture()
    {
        return $this->user_picture;
    }

    /**
     * @param mixed $user_picture
     */
    public function setUserPicture($user_picture)
    {
        $this->user_picture = $user_picture;
    }

    /**
     * @return mixed
     */
    public function getUserRegistered()
    {
        return $this->user_registered;
    }

    /**
     * @param mixed $user_registered
     */
    public function setUserRegistered($user_registered)
    {
        $this->user_registered = $user_registered;
    }

    /**
     * @return mixed
     */
    public function getUserModified()
    {
        return $this->user_modified;
    }

    /**
     * @param mixed $user_modified
     */
    public function setUserModified($user_modified)
    {
        $this->user_modified = $user_modified;
    }

    /**
     * @return mixed
     */
    public function getUserApiKey()
    {
        return $this->user_api_key;
    }

    /**
     * @param mixed $user_api_key
     */
    public function setUserApiKey($user_api_key)
    {
        $this->user_api_key = $user_api_key;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->user_password;
    }

    /**
     * @param mixed $user_password
     */
    public function setUserPassword($user_password)
    {
        $this->user_password = $user_password;
    }

    /**
     * @return mixed
     */
    public function getUserCellPhone()
    {
        return $this->user_cell_phone;
    }

    /**
     * @param mixed $user_cell_phone
     */
    public function setUserCellPhone($user_cell_phone)
    {
        $this->user_cell_phone = $user_cell_phone;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * @param mixed $user_email
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    /**
     * @return mixed
     */
    public function getUserDob()
    {
        return $this->user_dob;
    }

    /**
     * @param mixed $user_dob
     */
    public function setUserDob($user_dob)
    {
        $this->user_dob = $user_dob;
    }

    /**
     * @return mixed
     */
    public function getUserMembershipType()
    {
        return $this->user_membership_type;
    }

    /**
     * @param mixed $user_membership_type
     */
    public function setUserMembershipType($user_membership_type)
    {
        $this->user_membership_type = $user_membership_type;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


}