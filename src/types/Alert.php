<?php

namespace BootstrapControls\types;

/**
 * Class Alert
 * @package BootstrapControls\types
 */
class Alert extends BaseType
{
    public string $content;
    public ?string $title;
    public ?string $footer;
    public array $links;
    public bool $dissmiss;
    public string $type;
}
