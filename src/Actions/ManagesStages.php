<?php

namespace TestMonitor\ActiveCampaign\Actions;

use TestMonitor\ActiveCampaign\Resources\Stage;

trait ManagesStages
{
    /**
     * Get all stages.
     *
     * @return array
     */
    public function stages()
    {
        return $this->transformCollection(
            $this->get('dealStages'),
            Stage::class,
            'dealStages'
        );
    }

    /**
     * Find stage by title.
     *
     * @param string $title
     *
     * @return Stage|null
     */
    public function findStage($title)
    {
        $stages = $this->transformCollection(
            $this->get('dealStages', ['query' => ['title' => $title]]),
            Stage::class,
            'dealStages'
        );

        return array_shift($stages);
    }
    
}
