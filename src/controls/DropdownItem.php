<?php

namespace BootstrapControls\controls;

/**
 * Class DropdownItem
 * @package BootstrapControls\controls
 */
class DropdownItem extends BaseControl
{
    const TEMPLATE = parent::TEMPLATE . "dropdownItem.latte";

    protected string $text;
    protected string $href = "#";
    protected bool $ajax = true;
    protected bool $active = false;
    protected bool $disabled = false;

    /**
     * @return Dropdown
     */
    public function endItem(): Dropdown
    {
        /**
         * @var $parent Dropdown
         */
        $parent = $this->parent;
        return $parent;
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
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->text = $this->text;
        $this->template->href = $this->href;
        $this->template->active = $this->active;
        $this->template->disabled = $this->disabled;
        $this->template->ajax = $this->ajax;
        return parent::render($toString);
    }
}
