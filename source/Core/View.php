<?php

namespace Source\Core;

use League\Plates\Engine;

class View
{
    private $engine;

    public function __construct(string $path = CONF_VIEW_PATH, string $ext = CONF_VIEW_EXT)
    {
        $this->engine = Engine::create($path, $ext);
    }

    /**
     * path
     *
     * @param  string $name
     * @param  string $path
     * @return null|View
     */
    public function path(string $name, string $path): ?View
    {
        $this->engine->addFolder($name, $path);
        return $this;
    }
    
    /**
     * render
     *
     * @param  string $templateName
     * @param  array $data
     * @return string
     */
    public function render(string $templateName, array $data): string
    {
        return $this->engine->render($templateName, $data);
    }
    
    /**
     * engine
     *
     * @return null|Engine
     */
    public function engine(): ?Engine
    {
        return $this->engine();
    }

}