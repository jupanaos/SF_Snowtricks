<?php

namespace App\Service;

use Symfony\Component\String\Slugger\SluggerInterface;

class SlugifyService
{
    private $slugger;

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    /**
     * Slugify a property's name (can then be used in URLs).
     */
    public function slugify(string $name)
    {
        $slug = $this->slugger->slug($name, '-', 'en_GB');

        return $slug;
    }
}