<?php

namespace GoldSpecDigital\ObjectOrientedOAS;

use GoldSpecDigital\ObjectOrientedOAS\Objects\Info;
use GoldSpecDigital\ObjectOrientedOAS\Objects\BaseObject;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Paths;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class OpenApi extends BaseObject
{
    const VERSION_3_0_0 = '3.0.0';
    const VERSION_3_0_1 = '3.0.1';

    protected $version;
    protected $info;
    protected $servers;
    protected $paths;
    protected $components;
    protected $security;
    protected $tags;
    protected $externalDocs;

    /**
     * @param string $version
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Info $info
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths $paths
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public static function create(string $version, Info $info, Paths $paths)
    {
        $instance = new static();

        $instance->version = $version;
        $instance->info = $info;
        $instance->paths = $paths;

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::filter([
            'version' => $this->version,
            'info' => $this->info,
            'servers' => $this->servers,
            'paths' => $this->paths,
            'components' => $this->components,
            'security' => $this->security,
            'tags' => $this->tags,
            'externalDocs' => $this->externalDocs,
        ]);
    }

    public function version(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function info(?Info $info): self
    {
        $this->info = $info;

        return $this;
    }

    public function servers(Server ...$servers): self
    {
        $this->servers = count($servers) > 0 ? $servers : null;

        return $this;
    }
}
