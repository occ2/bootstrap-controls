<?php

namespace BootstrapControls\controls;

use Nette\Application\UI\Control;

/**
 * Class ButtonToolbar
 * @package BootstrapControls\controls
 */
class ButtonToolbar extends BaseControl
{
    const TEMPLATE =  parent::TEMPLATE . "buttonToolbar.latte";

    protected array $controls = [];
    protected string $label;

    /**
     * @param Control $control
     * @param string $name
     * @return $this
     */
    public function addControl(Control $control, string $name)
    {
        $this->controls[$name] = $control;
        $this->addComponent($control, $name);
        return $this;
    }

    /**
     * @param string $name
     * @return ButtonGroup
     */
    public function addButtonGroup(string $name): ButtonGroup
    {
        $this->controls[$name] = $group = new ButtonGroup();
        $group->setTranslator($this->translator);
        $this->addComponent($group, $name);
        return $group;
    }

    /**
     * @return array
     */
    public function getControls(): array
    {
        return $this->controls;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function removeControl(string $name)
    {
        $this->removeComponent($this->controls[$name]);
        unset ($this->controls[$name]);
        return $this;
    }

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
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->controls = $this->controls;
        $this->template->label = $this->label;
        return parent::render($toString);
    }
}
