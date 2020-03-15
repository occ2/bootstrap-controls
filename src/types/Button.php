<?php

namespace BootstrapControls\types;

/**
 * Class Button
 * @package BootstrapControls\types
 */
class Button extends BaseType
{
    public bool $outline;
    public string $size;
    public bool $block;
    public bool $active;
    public bool $disabled;
    public string $type;
    public string $text;
    public string $href;
    public string $class;
    public bool $ajax;
    public array $beforeComponents;
    public array $afterComponents;
}
