<?php

namespace BootstrapControls\types;

/**
 * Class CarouselSlide
 * @package BootstrapControls\types
 */
class CarouselSlide extends BaseType
{
    public string $imageSrc;
    public string $imageAlt;
    public ?string $title;
    public ?string $comment;
    public ?string $customTemplate;
    public array $customParams;
}
