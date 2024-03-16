<?php

namespace App\Helpers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;

class Nav
{
    const NAV_CLASS_DROP_DOWN = 'hidden';
    const NAV_CLASS_ITEM = 'bg-gray-100 dark:bg-gray-700';

    public static function isRoute($route_name, $class = null)
    {
        // for item only

        if ($class == null) {
            $class = self::NAV_CLASS_ITEM;
        }

        if (Route::is($route_name)) {
            return $class;
        }
        return;
    }

    public static function urlHave($names, $class = null)
    {
        if ($class == null) {
            $class = self::NAV_CLASS_ITEM;
        }

        $uri = request()->path();

        $names = !is_array($names) ? [$names] : $names;

        foreach ($names as $name) {
            if ($uri == $name) {
                return $class;
            }
        }

        return;
    }

    public static function urlDontHave($names, $class = null)
    {
        if ($class == null) {
            $class = self::NAV_CLASS_DROP_DOWN;
        }

        $uri = request()->path();

        $names = !is_array($names) ? [$names] : $names;

        foreach ($names as $name) {
            if ($uri == $name) {
                return;
            }
        }

        return $class;
    }
}
