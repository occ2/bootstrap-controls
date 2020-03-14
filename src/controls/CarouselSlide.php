<?php

namespace BootstrapControls\controls;

/**
 * Class CarouselSlide
 * @package BootstrapControls\controls
 */
class CarouselSlide extends BaseControl
{
    const TEMPLATE = parent::TEMPLATE . "carouselSlide.latte";

    protected Carousel $carousel;
    protected string $imageSrc = "";
    protected string $imageAlt = "";
    protected ?string $title = null;
    protected ?string $comment = null;
    protected ?string $customTemplate = null;
    protected array $customParams = [];
    protected bool $active = false;
    protected ?int $interval = null;

    /**
     * @return int|null
     */
    public function getInterval(): ?int
    {
        return $this->interval;
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
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
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
     * @param string $imageSrc
     * @return $this
     */
    public function setImageSrc(string $imageSrc)
    {
        $this->imageSrc = $imageSrc;
        return $this;
    }

    /**
     * @param string $imageAlt
     * @return $this
     */
    public function setImageAlt(string $imageAlt)
    {
        $this->imageAlt = $imageAlt;
        return $this;
    }

    /**
     * @param string|null $title
     * @return $this
     */
    public function setTitle(?string $title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string|null $comment
     * @return $this
     */
    public function setComment(?string $comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @param string|null $customTemplate
     * @return $this
     */
    public function setCustomTemplate(?string $customTemplate)
    {
        $this->customTemplate = $customTemplate;
        return $this;
    }

    /**
     * @param array $customParams
     * @return $this
     */
    public function setCustomParams(array $customParams)
    {
        $this->customParams = $customParams;
        return $this;
    }

    /**
     * CarouselSlide constructor.
     * @param Carousel $carousel
     */
    public function __construct(Carousel $carousel)
    {
        $this->carousel = $carousel;
    }

    /**
     * @return Carousel
     */
    public function endSlide(): Carousel
    {
        return $this->carousel;
    }

    /**
     * render slide
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->imageSrc = $this->imageSrc;
        $this->template->imageAlt = $this->imageAlt;
        $this->template->title = $this->title;
        $this->template->comment = $this->comment;
        $this->template->customTemplate = $this->customTemplate;
        $this->template->customParams = $this->customParams;
        return parent::render($toString);
    }

    /**
     * @param string $snippet
     */
    public function reload(string $snippet): void
    {
        $this->redrawControl("customSlide");
        $this->redrawControl($snippet);
    }
}
