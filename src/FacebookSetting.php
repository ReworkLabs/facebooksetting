<?php

namespace Reworklabs\FacebookSetting;
use Mpociot\BotMan\Drivers\FacebookDriver;

class FacebookSetting extends FacebookDriver
{

    const DRIVER_NAME = 'FacebookSetting';

    /**
     * Return the driver name.
     *
     * @return string
     */
    public function getName()
    {
        return self::DRIVER_NAME;
    }

    public function addSetting($setting)
    {

        $parameters = $setting->toArray();

        $parameters['access_token'] = $this->config->get('facebook_token');
        echo '<pre>';
        var_dump($parameters);
        return $this->http->post('https://graph.facebook.com/v2.6/me/thread_settings', [], $parameters);
    }

}