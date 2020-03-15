<?php

namespace BootstrapControls\controls;

use Nette\ComponentModel\IContainer;

/**
 * Class Dropdown
 * @package BootstrapControls\controls
 */
class Dropdown extends BaseControl
{
    const TEMPLATE = parent::TEMPLATE . "dropdown.latte";

    protected ?Button $button = null;
    protected ?string $buttonText = null;
    protected array $items = [];

    /**
     * @param Button|null $button
     * @return $this
     */
    public function setButton(?Button $button)
    {
        $this->button = $button;
        return $this;
    }

    /**
     * @param string|null $buttonText
     * @return $this
     */
    public function setButtonText(?string $buttonText)
    {
        $this->buttonText = $buttonText;
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
     * @param string $name
     * @return DropdownItem
     */
    public function addItem(string $name): DropdownItem
    {
        $item = new DropdownItem();
        $item->setTranslator($this->translator);
        $this->items[] = $item;
        $this->addComponent($item, $name);
        return $item;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function addSeparator(string $name)
    {
        $this->items[] = $separator = new DropdownSeparator();
        $this->addComponent($separator, $name);
        return $this;
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
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->items = $this->items;
        return parent::render($toString);
    }

    /**
     * @return IContainer|null
     */
    public function endDropdown(): ?IContainer
    {
        return $this->parent;
    }
}
