<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class Info extends BaseObject
{
    protected $title;
    protected $description;
    protected $termsOfService;
    protected $contact;
    protected $license;
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
}
