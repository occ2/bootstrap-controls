<?php

namespace BootstrapControls\types;

use Nette\Bridges\ApplicationLatte\Template;

/**
 * Class BaseType
 * @package BootstrapControls\types
 */
abstract class BaseType extends Template
{
    public string $id;
    public array $attributes;
}
