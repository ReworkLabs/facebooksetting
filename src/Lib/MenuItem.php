<?php

namespace Reworklabs\FacebookSetting\Lib;

class MenuItem
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $type = 'web_url';

    /** @var string */
    protected $url;

    /** @var string */
    protected $payload;

    /** @var string */
    protected $webview_height_ratio = 'full';

    /** @var string */
    protected $messenger_extensions = false;

    /**
     * @param string $title
     * @return static
     */
    public static function create($title)
    {
        return new static($title);
    }

    /**
     * @param string $title
     */
    public function __construct($title)
    {
        $this->title =  $title;
    }

    /**
     * Set the button URL.
     * @param string $url
     * @return $this
     */
    public function url($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Set the button type.
     * @param string $type
     * @return $this
     */
    public function type($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param $payload
     * @return $this
     */
    public function payload($payload)
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @param $webview_height_ratio
     * @return $this
     */
    public function webview_height_ratio($webview_height_ratio)
    {
        $this->webview_height_ratio = $webview_height_ratio;

        return $this;
    }

     /**
     * @param $messenger_extensions
     * @return $this
     */
    public function messenger_extensions($messenger_extensions)
    {
        $this->messenger_extensions = $messenger_extensions;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $buttonArray = [
            'type' => $this->type,
            'title' => $this->title,
        ];

        if ($this->type === 'postback') {
            $buttonArray['payload'] = $this->payload;
        } else {
            $buttonArray['url'] = $this->url;
        }

        $buttonArray['webview_height_ratio'] = $this->webview_height_ratio;

        return $buttonArray;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
