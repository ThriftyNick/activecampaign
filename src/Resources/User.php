<?php

namespace TestMonitor\ActiveCampaign\Resources;

class User extends Resource
{
    /**
     * The id of the user.
     *
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $email;
    
    /**
     * @var string
     */
    public $firstName;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var int
     */
    public $group;

    /**
     * @var string
     */
    public $password;

}
