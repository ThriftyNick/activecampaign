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


    /**
     * Find deal by title.
     *
     * @param string $title
     *
     * @return Deal|null
     */
    public function findDeal($title)
    {
        $deals = $this->transformCollection(
            $this->get('deals', ['query' => ['filters[title]' => $title, 'include' => 'dealCustomFieldData']]),
            Deal::class,
            'deals'
        );

        return array_shift($deals);
    }

    /**
     * Create new deal.
     *
     * @param string $title
     * @param string $contact
     * @param int $value
     * @param string $currency
     * @param string $stage
     * @param string $owner
     *
     * @return Deal|null
     */
    public function createDeal($title, $contact, $value, $currency, $stage, $owner)
    {
        $deals = $this->transformCollection(
            $this->post('deals', ['json' => ['deal' => compact('title', 'contact', 'value', 'currency', 'stage', 'owner')]]),
            Deal::class
        );

        return array_shift($deals);
    }

}
