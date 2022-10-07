<?php

namespace Zeus\Traits;

trait Routeable
{
    public function routes()
    {
        require __DIR__ . '/../../routes/zeus-routes.php';
    }
    public function api_routes()
    {
        require __DIR__ . '/../../routes/zeus-api.php';
    }
}