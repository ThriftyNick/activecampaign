<?php

namespace TestMonitor\ActiveCampaign\Resources;

class Pipeline extends Resource
{
    /**
     * The id of the deal.
     *
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var int
     */
    public $allgroups;

    /**
     * @var int
     */
    public $allusers;

    /**
     * @var int
     */
    public $autoassign;

    /**
     *  @var array[string]
     */
    public $users;

    /**
     *  @var array[string]
     */
    public $groups;

}
