<?php

namespace TestMonitor\ActiveCampaign\Resources;

class Deal extends Resource
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
    public $description;
    
    /**
     * @var string
     */
    public $contact;

    /**
     * @var int
     */
    public $value;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string
     */
    public $group;

    /**
     * @var string
     */
    public $stage;

    /**
     * @var string
     */
    public $owner;

    /**
     * @var int
     */
    public $percent;

    /**
     * @var int
     */
    public $status;
}
