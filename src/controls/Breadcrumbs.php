<?php

namespace BootstrapControls\controls;

use Nette\Application\UI\Multiplier;

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
        $this->items[$name] = $item = new BreadcrumbItem($this);
        return $item;
    }

    /**
     * @param string $name
     */
    public function removeItem(string $name)
    {
        if (isset($this->items[$name])) {
            unset($this->items[$name]);
        }
    }

    /**
     * @param string $name
     * @return BreadcrumbItem|null
     */
    public function getItem(string $name): ?BreadcrumbItem
    {
        return isset($this->items[$name]) ? $this->items[$name] : null;
    }

    /**
     * @param string $name
     * @return Multiplier
     */
    protected function createComponentItem(string $name): Multiplier
    {
        $multiplier = new Multiplier(function ($name) {
            $item = $this->items[$name];
            $item->setTranslator($this->translator);
            return $item;
        });
        $this->addComponent($multiplier, $name);
        return $multiplier;
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
