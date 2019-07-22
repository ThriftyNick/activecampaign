<?php

namespace TestMonitor\ActiveCampaign\Actions;

use TestMonitor\ActiveCampaign\Resources\Deal;

trait ManagesDeals
{
    /**
     * Get all deals.
     *
     * @return array
     */
    public function deals()
    {
	//
        return $this->transformCollection(
            $this->get('deals'),
            Deal::class,
            'deals'
        );
    }

}
