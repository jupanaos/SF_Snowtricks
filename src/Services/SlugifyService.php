<?php

namespace App\Services;

use Symfony\Component\String\Slugger\SluggerInterface;

class SlugifyService
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    /**
     * Slugify a property name or title
     */
    public function slugify(string $title)
    {
        $slug = $this->slugger->slug($title, '-', 'en_GB');

        return $slug;
    }
}