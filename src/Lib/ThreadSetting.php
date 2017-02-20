<?php

namespace Reworklabs\FacebookSetting\Lib;

use JsonSerializable;

class ThreadSetting implements JsonSerializable
{
    /** @var array */
    protected $items = [];

    protected $setting_type = 'call_to_actions';

    /** @var string */
    protected $state = 'existing_thread';

    /** @var string */
    protected $payload;

    /**
     * @return static
     */
    public static function create()
    {
        return new static;
    }
    /**
     * @param MenuItem $item
     * @return $this
     */
    public function addItem(MenuItem $item)
    {
        $this->items[] = $item->toArray();

        return $this;
    }

    /**
     * @param string $domain
     * @return $this
     */
    public function addDomain($domain)
    {
        $this->items[] = is_array($domain) ? array_merge($domain,$this->items) : $domain;

        return $this;
    }

    /**
     * @param array $items
     * @return $this
     */
    public function addItems(array $items)
    {
        foreach ($items as $item) {
            if ($item instanceof MenuItem) {
                $this->items[] = $item->toArray();
            }
        }

        return $this;
    }

    /**
     * Set the setting state.
     * @param string $state
     * @return $this
     */
    public function state($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @param string $setting_type
     * @return $this
     */
    public function setting_type($setting_type)
    {
        $this->setting_type = $setting_type;

        return $this;
    }

    /**
     * @param string $payload
     * @return $this
     */
    public function payload($payload)
    {
        $this->payload = $payload;

        return $this;
    }


    /**
     * @return array
     */
    public function toArray()
    {
        if ($this->setting_type == 'call_to_actions') {
            return [
                    'setting_type' => 'call_to_actions',
                    'thread_state' => $this->state,
                    'call_to_actions' => $this->state == 'new_thread' ?  [['payload' => $this->payload ]] : $this->items,
            ];
        }elseif ($this->setting_type == 'greeting'){
            return [
                    'setting_type' => 'greeting',
                    'greeting' => ['text'=>$this->state],
            ];
        }else{
            return [
                    'setting_type' => 'domain_whitelisting',
                    'whitelisted_domains' => $this->items,
                    'domain_action_type' => $this->domain_action_type;
            ];            
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
