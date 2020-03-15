<?php

namespace BootstrapControls\controls;

use Nette\Utils\Random;

/**
 * Class Carousel
 * @package BootstrapControls\controls
 */
class Carousel extends BaseControl
{
    const TEMPLATE = parent::TEMPLATE . "carousel.latte";

    protected array $slides = [];
    protected bool $hasIndicators = true;
    protected bool $hasControls = true;
    protected string $previousTitle = "Previous";
    protected string $nextTitle = "Next";
    protected bool $fade = false;
    protected ?int $interval = null;
    protected bool $keyboard = true;
    protected bool $pause = true;
    protected bool $ride = false;
    protected bool $wrap = true;
    protected bool $touch = true;

    /**
     * @param bool $hasIndicators
     * @return $this
     */
    public function setHasIndicators(bool $hasIndicators)
    {
        $this->hasIndicators = $hasIndicators;
        return $this;
    }

    /**
     * @param bool $hasControls
     * @return $this
     */
    public function setHasControls(bool $hasControls)
    {
        $this->hasControls = $hasControls;
        return $this;
    }

    /**
     * @param string $previousTitle
     * @return $this
     */
    public function setPreviousTitle(string $previousTitle)
    {
        $this->previousTitle = $previousTitle;
        return $this;
    }

    /**
     * @param string $nextTitle
     * @return $this
     */
    public function setNextTitle(string $nextTitle)
    {
        $this->nextTitle = $nextTitle;
        return $this;
    }

    /**
     * @param bool $fade
     * @return $this
     */
    public function setFade(bool $fade)
    {
        $this->fade = $fade;
        return $this;
    }

    /**
     * @param int|null $interval
     * @return $this
     */
    public function setInterval(?int $interval)
    {
        $this->interval = $interval;
        return $this;
    }

    /**
     * @param bool $keyboard
     * @return $this
     */
    public function setKeyboard(bool $keyboard)
    {
        $this->keyboard = $keyboard;
        return $this;
    }

    /**
     * @param bool $pause
     * @return $this
     */
    public function setPause(bool $pause)
    {
        $this->pause = $pause;
        return $this;
    }

    /**
     * @param bool $ride
     * @return $this
     */
    public function setRide(bool $ride)
    {
        $this->ride = $ride;
        return $this;
    }

    /**
     * @param bool $wrap
     * @return $this
     */
    public function setWrap(bool $wrap)
    {
        $this->wrap = $wrap;
        return $this;
    }

    /**
     * @param bool $touch
     * @return $this
     */
    public function setTouch(bool $touch)
    {
        $this->touch = $touch;
        return $this;
    }

    /**
     * @param string $name
     * @return CarouselSlide
     */
    public function addSlide(string $name): CarouselSlide
    {
        $this->slides[$name] = $slide = new CarouselSlide();
        $this->addComponent($slide, $name);
        return $slide;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function removeSlide(string $name)
    {
        $this->removeComponent($this->slides[$name]);
        unset($this->slides[$name]);
        return $this;
    }

    /**
     * @return array
     */
    public function getSlides(): array
    {
        return $this->slides;
    }

    /**
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        if (empty($this->id)) {
            $this->id = Random::generate(10);
        }
        $this->template->slides = $this->slides;
        $this->template->hasControls = $this->hasControls;
        $this->template->hasIndicators = $this->hasIndicators;
        $this->template->previousTitle = $this->previousTitle;
        $this->template->nextTitle = $this->nextTitle;
        $this->template->fade = $this->fade;
        $this->template->interval = $this->interval;
        $this->template->keyboard = $this->keyboard;
        $this->template->pause = $this->pause;
        $this->template->ride = $this->ride;
        $this->template->wrap = $this->wrap;
        $this->template->touch = $this->touch;
        return parent::render($toString);
    }
}
