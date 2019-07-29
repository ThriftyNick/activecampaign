<?php

namespace TestMonitor\ActiveCampaign\Actions;

use TestMonitor\ActiveCampaign\Resources\Contact;
use TestMonitor\ActiveCampaign\Resources\Deal;
use TestMonitor\ActiveCampaign\Resources\CustomField;

trait ManagesCustomFields
{
    /**
     * Get all custom fields.
     *
     * @return array
     */
    public function customFields()
    {
        return $this->transformCollection(
            $this->get('fields'),
            CustomField::class,
            'fields'
        );
    }

    /**
     * Find custom field by name.
     *
     * @param string $name
     *
     *
     * @return CustomField|null
     */
    public function findCustomField($name)
    {
        $customFields = $this->transformCollection(
            $this->get('fields', ['query' => ['search' => $name]]),
            CustomField::class,
            'fields'
        );

        return array_shift($customFields);
    }

    /**
     * Add custom field value to contact.
     *
     * @param \TestMonitor\ActiveCampaign\Resources\Contact $contact
     * @param \TestMonitor\ActiveCampaign\Resources\CustomField $customField
     * @param $value
     *
     * @return Contact
     */
    public function addCustomFieldToContact(Contact $contact, CustomField $customField, $value)
    {
        $data = [
            'contact' => $contact->id,
            'field' => $customField->id,
            'value' => $value,
        ];

        $contacts = $this->transformCollection(
            $this->post('fieldValues', ['json' => ['fieldValue' => $data]]),
            Contact::class,
            'contacts'
        );

        return array_shift($contacts);
    }

    public function getCustomFieldValues($contactId) {
	    /*$value = $this->transformCollection(
		    $this->get('fieldValues', ['query' => ['filters[val]' => $customField]]),
		    CustomField::class
	    );*/

	    //$value = $this->get('fieldValues', ['query' => ['filters[val]' => $customField]]);

	    //query doesn't work, so have to do it the hard way.
	    $value = $this->get('fieldValues', ['query' => ['filters[contact]' => $contactId]]);

	    $value = array_filter($value['fieldValues'], function($e) use($contactId){
		return $e['contact'] == $contactId;
	    });
	    return $value;
    }

    /**
     * Get all custom deal fields.
     *
     * @return array
     */
    public function customDealFields()
    {
        return $this->transformCollection(
            $this->get('dealCustomFieldMeta'),
            CustomField::class,
            'dealCustomFieldMeta'
        );
    }

    /**
     * Find custom field by name.
     *
     * @param string $name
     *
     * @return CustomField|null
     */
    public function findCustomDealField($name)
    {
	$customFields = $this->transformCollection(
	    $this->get('dealCustomFieldMeta', ['query' => ['filters[fieldLabel]' => $name]]),
	    CustomField::class,
	    'dealCustomFieldMeta'
	);

        return array_shift($customFields);
    }

    /**
     * Add custom deal field value to deal.
     *
     * @param \TestMonitor\ActiveCampaign\Resources\Deal $deal
     * @param \TestMonitor\ActiveCampaign\Resources\CustomField $customField
     * @param $value
     *
     * @return Deal
     */
    public function addCustomFieldToDeal(Deal $deal, CustomField $customField, $value)
    {
        $data = [
            'dealId' => $deal->id,
            'customFieldId' => $customField->id,
            'fieldValue' => $value,
        ];

        $deals = $this->transformCollection(
            $this->post('dealCustomFieldData', ['json' => ['dealCustomFieldDatum' => $data]]),
            Deal::class,
            'deals'
        );

        return array_shift($deals);
    }

    public function getCustomDealFieldValues($dealId) {
	    $value = $this->transformCollection(
		    $this->get('dealCustomFieldData', ['query' => ['filters[dealId]' => $dealId]]),
		    CustomField::class,
		    'attributes'
	    );

	    return $value;
    }
}
