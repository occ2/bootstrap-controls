<?php

namespace BootstrapControls\controls;

use Nette\Application\UI\Control;
use Nette\Localization\ITranslator;

/**
 * Class BaseControl
 * @package BootstrapControls\controls
 */
abstract class BaseControl extends Control
{
    const TEMPLATE = __DIR__ . "/../templates/";

    /**
     * @var string|null
     */
    protected ?string $id = null;

    /**
     * @var array
     */
    protected array $attributes = [];

    /**
     * @var ITranslator|null
     */
    protected ?ITranslator $translator;

    /**
     * @param ITranslator|null $translator
     * @return $this
     */
    public function setTranslator(?ITranslator $translator)
    {
        $this->translator = $translator;
        return $this;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->id = $this->id;
        $this->template->attributes = $this->attributes;
        $this->template->setTranslator($this->translator);
        $this->template->setFile(self::TEMPLATE);
        if ($toString == true) {
            return $this->template->renderToString();
        } else {
            $this->template->render();
            return null;
        }
    }
}
