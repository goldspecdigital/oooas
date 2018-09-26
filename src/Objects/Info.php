<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class Info extends BaseObject
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var string|null
     */
    protected $description;

    /**
     * @var string|null
     */
    protected $termsOfService;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Contact|null
     */
    protected $contact;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\License|null
     */
    protected $license;

    /**
     * @var string
     */
    protected $version;

    /**
     * @param string $title
     * @param string $version
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public static function create(string $title, string $version): self
    {
        $instance = new static();

        $instance->title = $title;
        $instance->version = $version;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'title' => $this->title,
            'description' => $this->description,
            'termsOfService' => $this->termsOfService,
            'contact' => $this->contact,
            'license' => $this->license,
            'version' => $this->version,
        ]);
    }

    /**
     * @param string $title
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function title(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function description(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param null|string $termsOfService
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function termsOfService(?string $termsOfService): self
    {
        $this->termsOfService = $termsOfService;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Contact|null $contact
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function contact(?Contact $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\License|null $license
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function license(?License $license): self
    {
        $this->license = $license;

        return $this;
    }

    /**
     * @param string $version
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function version(string $version): self
    {
        $this->version = $version;

        return $this;
    }
}
