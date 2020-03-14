<?php

namespace BootstrapControls\types;

/**
 * Class Carousel
 * @package BootstrapControls\types
 */
class Carousel extends BaseType
{
    public array $slides;
    public bool $hasIndicators;
    public bool $hasControls;
    public string $previousTitle;
    public string $nextTitle;
    public bool $fade;
    public ?int $interval;
    public bool $keyboard;
    public bool $pause;
    public bool $ride;
    public bool $wrap;
    public bool $touch;
}
