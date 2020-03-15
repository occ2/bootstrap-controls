<?php

namespace BootstrapControls\controls;

use Nette\Utils\Html;

/**
 * Class Icon
 * @package BootstrapControls\controls
 */
class Icon extends BaseControl
{
    protected string $type = "fas";
    protected ?string $size = null;
    protected string $element = "span";
    protected string $icon;
    protected ?Html $prototype = null;

    /**
     * @return Html
     */
    protected function createIcon(): Html
    {
        $class = $this->type . " ";
        if (empty($this->size)) {
            $class .= $this->size . " ";
        }
        $class .= "fa-" . $this->icon;
        $this->attributes["class"] = $class;
        return Html::el($this->element)
            ->addAttributes($this->attributes);
    }

    /**
     * @return Html
     */
    public function getPrototype(): Html
    {
        if (empty($this->prototype)) {
            $this->prototype = $this->createIcon();
        }
        return $this->prototype;
    }


    /**
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        if ($toString == true) {
            return (string) $this->getPrototype();
        } else {
            echo $this->getPrototype();
            return null;
        }
    }
}
