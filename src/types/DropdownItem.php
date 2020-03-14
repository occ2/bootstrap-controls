<?php

namespace BootstrapControls\types;

/**
 * Class DropdownItem
 * @package BootstrapControls\types
 */
class DropdownItem extends BaseType
{
    public string $text;
    public string $href;
    public bool $active;
    public bool $disabled;
    public bool $ajax;
}
