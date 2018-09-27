<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class Contact extends BaseObject
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $email;

    /**
     * @param string $name
     * @param string $url
     * @param string $email
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Contact
     */
    public static function create(string $name, string $url, string $email): self
    {
        $instance = new static();

        $instance->name = $name;
        $instance->url = $url;
        $instance->email = $email;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'name' => $this->name,
            'url' => $this->url,
            'email' => $this->email,
        ]);
    }

    /**
     * @param string $name
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Contact
     */
    public function name(string $name): self
    {
        $instance = clone $this;

        $instance->name = $name;

        return $instance;
    }

    /**
     * @param string $url
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Contact
     */
    public function url(string $url): self
    {
        $instance = clone $this;

        $instance->url = $url;

        return $instance;
    }

    /**
     * @param string $email
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Contact
     */
    public function email(string $email): self
    {
        $instance = clone $this;

        $instance->email = $email;

        return $instance;
    }
}
