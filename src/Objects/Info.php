<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $title
 * @property string|null $description
 * @property string|null $termsOfService
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Contact|null $contact
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\License|null $license
 * @property string|null $version
 */
class Info extends BaseObject
{
    /**
     * @var string|null
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
     * @var string|null
     */
    protected $version;

    /**
     * @param string|null $title
     * @param string|null $version
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public static function create(string $title = null, string $version = null): self
    {
        $instance = new static();

        $instance->title = $title;
        $instance->version = $version;

        return $instance;
    }

    /**
     * @param null|string $title
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function title(?string $title): self
    {
        $instance = clone $this;

        $instance->title = $title;

        return $instance;
    }

    /**
     * @param null|string $description
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function description(?string $description): self
    {
        $instance = clone $this;

        $instance->description = $description;

        return $instance;
    }

    /**
     * @param null|string $termsOfService
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function termsOfService(?string $termsOfService): self
    {
        $instance = clone $this;

        $instance->termsOfService = $termsOfService;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Contact|null $contact
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function contact(?Contact $contact): self
    {
        $instance = clone $this;

        $instance->contact = $contact;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\License|null $license
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function license(?License $license): self
    {
        $instance = clone $this;

        $instance->license = $license;

        return $instance;
    }

    /**
     * @param null|string $version
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    public function version(?string $version): self
    {
        $instance = clone $this;

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
}
