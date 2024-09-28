<?php

if (!function_exists('are_routes_active')) {
    function are_routes_active(array $routes)
    {
        foreach ($routes as $route) {
            if (request()->is($route)) {
                return true;
            }
        }
        return false;
    }
}
