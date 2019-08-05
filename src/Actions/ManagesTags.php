<?php

namespace TestMonitor\ActiveCampaign\Actions;

use TestMonitor\ActiveCampaign\Resources\Tag;

trait ManagesTags
{
    /**
     * Get all tags.
     *
     * @return array
     */
    public function tags()
    {
        return $this->transformCollection(
            $this->get('tags'),
            Tag::class,
            'tags'
        );
    }

    /**
     * Find tag by name.
     *
     * @param string $name
     *
     * @return array
     */
    public function findTag($name)
    {
        $tags = $this->transformCollection(
            $this->get('tags', ['query' => ['search' => $name]]),
            Tag::class,
            'tags'
        );

	$tags = array_filter($tags, function($e){
		return $e->tagType == "contact";
	});

        return array_shift($tags);
    }

    /**
     * Create new tag.
     *
     * @param array $data
     *
     * @return Tag
     */
    public function createTag(array $data = [])
    {
        $tags = $this->transformCollection(
            $this->post('tags', ['json' => ['tag' => $data]]),
            Tag::class
        );

        return array_shift($tags);
    }

    /**
     * Find or create a tag.
     *
     * @param string $name
     *
     * @return Tag
     */
    public function findOrCreateTag($name)
    {
        $tag = $this->findTag($name);

        if ($tag instanceof Tag) {
            return $tag;
        }

        return $this->createTag(['tag' => $name]);
    }
}
