<?php

namespace BootstrapControls\controls;

use Nette\Utils\Html;

/**
 * Class Badge
 * @package BootstrapControls\controls
 */
class Badge extends BaseControl
{
    protected string $text;
    protected string $type = "primary";
    protected bool $pillStyle = false;
    protected string $element = "span";
    protected ?Html $prototype = null;

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param bool $pillStyle
     * @return $this
     */
    public function setPillStyle(bool $pillStyle)
    {
        $this->pillStyle = $pillStyle;
        return $this;
    }

    /**
     * @param string $element
     * @return $this
     */
    public function setElement(string $element)
    {
        $this->element = $element;
        return $this;
    }

    /**
     * @return Html
     */
    public function getPrototype(): Html
    {
        if (empty($this->prototype)) {
            $this->prototype = $this->createPrototype();
        }
        return $this->prototype;
    }

    /**
     * @return Html
     */
    protected function createPrototype(): Html
    {
        $class = "badge";
        if ($this->pillStyle == true) {
            $class .= " badge-pill";
        }
        $class .= " badge-" . $this->type;
        $this->attributes["class"] = $class;
        return Html::el($this->element)
            ->addAttributes($this->attributes)
            ->setText(
                !empty($this->translator) ? $this->translator->translate($this->text) : $this->text
            );
    }

    /**
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $badge = $this->getPrototype();
        if ($toString == true) {
            return (string) $badge;
        } else {
            echo $badge;
            return null;
        }
    }
}
