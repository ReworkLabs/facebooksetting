<?php

namespace Reworklabs\FacebookSetting;

use Symfony\Component\HttpFoundation\Request;
use Mpociot\BotMan\Http\Curl;

class SettingFactory
{

    public static function create(array $config, Request $request = null)
    {

        if (empty($request)) {
            $request = Request::createFromGlobals();
        }

        return new FacebookSetting($request, $config, new Curl());
    }

}