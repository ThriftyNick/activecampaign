<?php

namespace TestMonitor\ActiveCampaign\Actions;

use TestMonitor\ActiveCampaign\Resources\Pipeline;

trait ManagesPipelines
{
    /**
     * Get all pipelines.
     *
     * @return array
     */
    public function pipelines()
    {
	//
        return $this->transformCollection(
            $this->get('dealGroups'),
            Pipeline::class,
            'pipelines'
        );
    }


    /**
     * Find pipeline by title.
     *
     * @param string $title
     *
     * @return Pipeline|null
     */
    public function findPipeline($title)
    {
        $pipelines = $this->transformCollection(
            $this->get('dealGroups', ['query' => ['filters[title]' => $title, 'include' => 'dealCustomFieldData']]),
            Pipeline::class,
            'pipelines'
        );

        //return array_shift($deals);
	return $pipelines;
    }

}
