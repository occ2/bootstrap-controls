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
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $class = "badge";
        if ($this->pillStyle == true) {
            $class .= " badge-pill";
        }
        $class .= " badge-" . $this->type;
        $this->attributes["class"] = $class;
        $badge = Html::el($this->element)
            ->addAttributes($this->attributes)
            ->setText(
                !empty($this->translator) ? $this->translator->translate($this->text) : $this->text
            );
        if ($toString == true) {
            return (string) $badge;
        } else {
            echo $badge;
            return null;
        }
    }
}
