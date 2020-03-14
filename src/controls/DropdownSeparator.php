<?php

namespace BootstrapControls\controls;

use Nette\Application\UI\Control;
use Nette\Utils\Html;

/**
 * Class DropdownSeparator
 * @package BootstrapControls\controls
 */
class DropdownSeparator extends Control
{
    /**
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $div = Html::el("div")
            ->addAttributes([
                "class" => "dropdown-divider"
            ]);
        if ($toString == true) {
            return (string) $div;
        } else {
            echo (string) $div;
            return null;
        }
    }
}
