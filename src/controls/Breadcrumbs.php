<?php

namespace BootstrapControls\controls;

/**
 * Class Breadcrumbs
 * @package BootstrapControls\controls
 */
class Breadcrumbs extends BaseControl
{
    const TEMPLATE = parent::TEMPLATE . "breadcrumbs.latte";

    /**
     * @var array
     */
    protected array $items = [];

    /**
     * @param string $name
     * @return BreadCrumbItem
     */
    public function addItem(string $name): BreadcrumbItem
    {
        $this->items[$name] = $item = new BreadcrumbItem();
        $this->addComponent($item, $name);
        return $item;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function removeItem(string $name)
    {
        $this->removeComponent($this->items[$name]);
        unset($this->items[$name]);
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->items = $this->items;
        return parent::render($toString);
    }
}
