<?php

declare(strict_types=1);

namespace GoldSpecDigital\ObjectOrientedOAS;

use GoldSpecDigital\ObjectOrientedOAS\Objects\BaseObject;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Components;
use GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Info;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Paths;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Server;
use GoldSpecDigital\ObjectOrientedOAS\Objects\Tag;
use GoldSpecDigital\ObjectOrientedOAS\Utilities\Arr;

/**
 * @property string|null $version
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Info|null $info
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[]|null $servers
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths|null $paths
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Components|null $components
 * @property array[]|null $security
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\Tag[]|null $tags
 * @property \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null $externalDocs
 */
class OpenApi extends BaseObject
{
    const VERSION_3_0_0 = '3.0.0';
    const VERSION_3_0_1 = '3.0.1';

    /**
     * @var string|null
     */
    protected $version;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Info|null
     */
    protected $info;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[]|null
     */
    protected $servers;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths|null
     */
    protected $paths;

    /**
     * @var \GoldSpecDigital\ObjectOrientedOAS\Objects\Components|null
     */
    protected $components;

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
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Info|null $info
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths|null $paths
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public static function create(
        string $version = self::VERSION_3_0_1,
        Info $info = null,
        Paths $paths = null
    ) {
        $instance = new static();

        $instance->version = $version;
        $instance->info = $info;
        $instance->paths = $paths;

        return $instance;
    }

    /**
     * @param string|null $version
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function version(?string $version): self
    {
        $instance = clone $this;

        $instance->version = $version;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Info|null $info
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function info(?Info $info): self
    {
        $instance = clone $this;

        $instance->info = $info;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Server[] $servers
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function servers(Server ...$servers): self
    {
        $instance = clone $this;

        $instance->servers = $servers ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Paths|null $paths
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function paths(?Paths $paths): self
    {
        $instance = clone $this;

        $instance->paths = $paths;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Components|null $components
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function components(?Components $components): self
    {
        $instance = clone $this;

        $instance->components = $components;

        return $instance;
    }

    /**
     * @param array ...$security
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function security(array ...$security): self
    {
        $instance = clone $this;

        $instance->security = $security ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\Tag ...$tags
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function tags(Tag ...$tags): self
    {
        $instance = clone $this;

        $instance->tags = $tags ?: null;

        return $instance;
    }

    /**
     * @param \GoldSpecDigital\ObjectOrientedOAS\Objects\ExternalDocs|null $externalDocs
     * @return \GoldSpecDigital\ObjectOrientedOAS\OpenApi
     */
    public function externalDocs(?ExternalDocs $externalDocs): self
    {
        $instance = clone $this;

        $instance->externalDocs = $externalDocs;

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
            'components' => $this->components,
            'security' => $this->security,
            'tags' => $this->tags,
            'externalDocs' => $this->externalDocs,
        ]);
    }
}
