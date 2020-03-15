<?php

namespace BootstrapControls\controls;

/**
 * Class ButtonGroup
 * @package BootstrapControls\controls
 */
class ButtonGroup extends BaseControl
{
    const TEMPLATE = parent::TEMPLATE . "buttonGroup.latte";

    protected array $buttons = [];
    protected string $label = "";
    protected string $size = "";
    protected string $class = "";
    protected bool $vertical = false;

    /**
     * @param string $label
     * @return $this
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @param string $size
     * @return $this
     */
    public function setSize(string $size)
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @param string $name
     * @return Button
     */
    public function addButton(string $name): Button
    {
        $button = new Button();
        $button->setTranslator($this->translator);
        $this->buttons[$name] = $button;
        $this->addComponent($button, $name);
        return $button;
    }

    /**
     * @param string $name
     * @return Dropdown
     */
    public function addDropdown(string $name): Dropdown
    {
        $dropdown = new Dropdown();
        $dropdown->setTranslator($this->translator);
        $this->buttons[$name] = $dropdown;
        $this->addComponent($dropdown, $name);
        return $dropdown;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function removeButton(string $name)
    {
        $this->removeComponent($this->buttons[$name]);
        unset ($this->buttons[$name]);
        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function removeDrodown(string $name)
    {
        $this->removeComponent($this->buttons[$name]);
        unset($this->buttons[$name]);
        return $this;
    }

    /**
     * @return array
     */
    public function getButtons(): array
    {
        return $this->buttons;
    }

    /**
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->buttons = $this->buttons;
        $this->template->label = $this->label;
        $this->template->size = $this->size;
        $this->template->vertical = $this->vertical;
        $this->template->class = $this->class;
        return parent::render($toString);
    }
}
