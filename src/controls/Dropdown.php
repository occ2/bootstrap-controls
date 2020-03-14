<?php

namespace BootstrapControls\controls;

use Nette\Application\UI\Multiplier;

/**
 * Class Dropdown
 * @package BootstrapControls\controls
 */
class Dropdown extends BaseControl
{
    const TEMPLATE = parent::TEMPLATE . "dropdown.latte";

    /**
     * @var Button|null
     */
    protected ?Button $button = null;

    /**
     * @var string|null
     */
    protected ?string $buttonText = null;

    /**
     * @var array
     */
    protected array $items = [];

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return DropdownItem
     */
    public function addItem(): DropdownItem
    {
        $item = new DropdownItem($this);
        $item->setTranslator($this->translator);
        $this->items[] = $item;
        return $item;
    }

    /**
     * @return $this
     */
    public function addSeparator()
    {
        $this->items[] = new DropdownSeparator();
        return $this;
    }

    /**
     * @param string $name
     * @return Button
     */
    protected function createComponentButton(string $name): Button
    {
        if (!empty($this->button)) {
            $button = $this->button;
        } else {
            $button = new Button();
        }
        if (!empty($this->buttonText)) {
            $button->setText($this->buttonText);
        }
        $class = $button->getClass() . "  dropdown-toggle";
        $button->setClass($class);
        $button->setHref("#");
        $button->setAjax(false);
        $button->setAttributes([
            "data-toggle" => "dropdown",
            "aria-haspopup" => "true",
            "aria-expanded" => "false"
        ]);
        $button->setId($this->id);
        $this->addComponent($button, $name);
        return $button;
    }

    /**
     * @param string $name
     * @return Multiplier
     */
    protected function createComponentItem(string $name): Multiplier
    {
        $multiplier = new Multiplier(function ($id) {
            return $this->items[$id];
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
