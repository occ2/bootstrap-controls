<?php

namespace BootstrapControls\controls;

use Nette\Utils\Html;

/**
 * Class Button
 * @package BootstrapControls\controls
 */
class Button extends BaseControl
{
    protected bool $outline = false;
    protected ?string $size = null;
    protected bool $block = false;
    protected bool $active = false;
    protected bool $disabled = false;
    protected bool $ajax = true;
    protected string $type = "primary";
    protected string $text;
    protected string $href = "#";
    protected string $class = "";
    protected array $beforeComponents = [];
    protected array $afterComponents = [];

    /**
     * @param Html $component
     * @return $this
     */
    public function addBeforeComponent(Html $component)
    {
        $this->beforeComponents[] = $component;
        return $this;
    }

    /**
     * @param Html $component
     * @return $this
     */
    public function addAfterComponent(Html $component)
    {
        $this->afterComponents[] = $component;
        return $this;
    }

    /**
     * @param bool $ajax
     * @return $this
     */
    public function setAjax(bool $ajax)
    {
        $this->ajax = $ajax;
        return $this;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }

    /**
     * @param bool $outline
     * @return $this
     */
    public function setOutline(bool $outline)
    {
        $this->outline = $outline;
        return $this;
    }

    /**
     * @param string|null $size
     * @return $this
     */
    public function setSize(?string $size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param bool $block
     * @return $this
     */
    public function setBlock(bool $block)
    {
        $this->block = $block;
        return $this;
    }

    /**
     * @param bool $active
     * @return $this
     */
    public function setActive(bool $active)
    {
        $this->active = $active;
        return $this;
    }

    /**
     * @param bool $disabled
     * @return $this
     */
    public function setDisabled(bool $disabled)
    {
        $this->disabled = $disabled;
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
     * @param string $text
     * @return $this
     */
    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $href
     * @return $this
     */
    public function setHref(string $href)
    {
        $this->href = $href;
        return $this;
    }

    /**
     * @param string $class
     * @return $this
     */
    public function setClass(string $class)
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->outline = $this->outline;
        $this->template->size = $this->size;
        $this->template->block = $this->block;
        $this->template->active = $this->active;
        $this->template->disabled = $this->disabled;
        $this->template->type = $this->type;
        $this->template->text = $this->text;
        $this->template->href = $this->href;
        $this->template->class = $this->class;
        $this->template->ajax = $this->ajax;
        $this->template->beforeComponents = $this->beforeComponents;
        $this->template->afterComponents = $this->afterComponents;
        return parent::render($toString);
    }
}
