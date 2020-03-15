<?php

namespace BootstrapControls\controls;

/**
 * Class BreadCrumbItem
 * @package BootstrapControls\controls
 */
class BreadcrumbItem extends BaseControl
{
    const TEMPLATE = parent::TEMPLATE . "breadcrumbItem.latte";

    protected string $text;
    protected string $href = "#";
    protected bool $active = false;

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
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->text = $this->text;
        $this->template->href = $this->href;
        $this->template->active = $this->active;
        return parent::render($toString);
    }

    /**
     * @return BreadCrumbs
     */
    public function endItem(): BreadCrumbs
    {
        /**
         * @var $parent Breadcrumbs
         */
        $parent = $this->getParent();
        return $parent;
    }
}
