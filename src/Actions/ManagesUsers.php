<?php

namespace TestMonitor\ActiveCampaign\Actions;

use TestMonitor\ActiveCampaign\Resources\User;

trait ManagesUsers
{
    /**
     * Get all users.
     *
     * @return array
     */
    public function users()
    {
	//
        return $this->transformCollection(
            $this->get('users'),
            User::class,
            'users'
        );
    }


    /**
     * Find user by email.
     *
     * @param string $email
     *
     * @return User|null
     */
    public function findUser($email)
    {
        $users = $this->transformCollection(
            $this->get('users/email/' . $email),
            User::class
        );

        return array_shift($users);
    }

}
