<?php

namespace GoldSpecDigital\ObjectOrientedOAS;

use GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Info;
use GoldSpecDigital\ObjectOrientedOAS\Objects\BaseObject;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Paths;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Tag;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

class OpenApi extends BaseObject
{
    const VERSION_3_0_0 = '3.0.0';
    const VERSION_3_0_1 = '3.0.1';

    /**
     * @var string
     */
    protected $version;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Info
     */
    protected $info;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[]|null
     */
    protected $servers;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths
     */
    protected $paths;

    /**
     * @var array[]|null
     */
    protected $security;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Tag[]|null
     */
    protected $tags;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null
     */
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
            'openapi' => $this->version,
            'info' => $this->info,
            'servers' => $this->servers,
            'paths' => $this->paths,
            'security' => $this->security,
            'tags' => $this->tags,
            'externalDocs' => $this->externalDocs,
        ]);
    }

    /**
     * @param string $version
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function version(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Info|null $info
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function info(?Info $info): self
    {
        $this->info = $info;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[] $servers
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function servers(Server ...$servers): self
    {
        $this->servers = $servers ?: null;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths|null $paths
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function paths(?Paths $paths): self
    {
        $this->paths = $paths;

        return $this;
    }

    /**
     * @param array ...$security
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function security(array ...$security): self
    {
        $this->security = $security ?: null;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Tag ...$tags
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function tags(Tag ...$tags): self
    {
        $this->tags = $tags ?: null;

        return $this;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null $externalDocs
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function externalDocs(?ExternalDocs $externalDocs): self
    {
        $this->externalDocs = $externalDocs;

        return $this;
    }
}
