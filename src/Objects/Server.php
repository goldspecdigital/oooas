<?php

namespace GoldSpecDigital\ObjectOrientedOAS\Objects;

use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class Server extends BaseObject
{
    protected $url;
    protected $description;

    /**
     * @param string $url
     * @return \GoldSpecDigital\ObjectOrientedOAS\Objects\Server
     */
    public static function create(string $url)
    {
        $instance = new static();

        $instance->url = $url;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'url' => $this->url,
            'description' => $this->description,
        ]);
    }
}
