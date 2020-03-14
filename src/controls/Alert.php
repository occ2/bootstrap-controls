<?php

namespace BootstrapControls\controls;

/**
 * Class Alert
 * @package BootstrapControls\controls
 */
class Alert extends BaseControl
{
    const TEMPLATE = parent::TEMPLATE . "alert.latte";

    protected string $content;
    protected ?string $title = null;
    protected ?string $footer = null;
    protected array $links = [];
    protected bool $dissmiss = false;
    protected string $type = "primary";

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content)
    {
        $this->content = $content;
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
     * @param string|null $footer
     * @return $this
     */
    public function setFooter(?string $footer)
    {
        $this->footer = $footer;
        return $this;
    }

    /**
     * @param array $links
     * @return $this
     */
    public function setLinks(array $links)
    {
        $this->links = $links;
        return $this;
    }

    /**
     * @param bool $dissmiss
     * @return $this
     */
    public function setDissmiss(bool $dissmiss)
    {
        $this->dissmiss = $dissmiss;
        return $this;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $href
     * @param string $text
     * @param string $class
     * @param string $target
     * @return $this
     */
    public function addLink(string $href, string $text, string $class = "alert-link ajax", string $target = "_blank")
    {
        $this->links[] = [
            "href" => $href,
            "text" => $text,
            "class" => $class,
            "target" => $target
        ];
        return $this;
    }

    /**
     * @param bool $toString
     * @return string|null
     */
    public function render(bool $toString = false): ?string
    {
        $this->template->content = $this->content;
        $this->template->title = $this->title;
        $this->template->footer = $this->footer;
        $this->template->links = $this->links;
        $this->template->dissmiss = $this->dissmiss;
        $this->template->type = $this->type;
        return parent::render($toString);
    }
}
