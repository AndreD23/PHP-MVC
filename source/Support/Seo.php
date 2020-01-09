<?php

namespace Source\Support;

use CoffeeCode\Optimizer\Optimizer;

class Seo
{
    protected $optimizer;

    public function __construct(string $schema = "article")
    {
        $this->optimizer = new Optimizer();
        $this->optimizer->openGraph(
            SITE_NAME,
            "pt_BR",
            $schema
        )->publisher(
            "ImperioSoftStudios",
            "andre.pereira23"
        )->twitterCard(
            "AndreDorneles23",
            "AndreDorneles23",
            "https://imperiosoft.com.br"
        )->facebook(
            "735911779841605"
        );
    }

    public function render(string $title, string $description, string $url, string $image, bool $follow = true): string
    {
        return $this->optimizer->optimize($title, $description, $url, $image, $follow)->render();
    }
}