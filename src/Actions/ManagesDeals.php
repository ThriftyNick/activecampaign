<?php

namespace TestMonitor\ActiveCampaign\Actions

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
