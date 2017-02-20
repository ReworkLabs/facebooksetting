# FacebookSetting for Botman is to extend BotMan 🤖 to set Facebook Messenger Setting

In Progress


## Sample code

use Reworklabs\FacebookSetting\SettingFactory;
use Reworklabs\FacebookSetting\Lib\ThreadSetting;
use Reworklabs\FacebookSetting\Lib\MenuItem;


$setting = SettingFactory::create($config);

//greeting text
```php
$setting->addSetting(ThreadSetting::create()->setting_type('greeting')->state('Hi Dude'));
```

//get started button button
```php
$setting->addSetting(ThreadSetting::create()->state('new_thread')->addPayload('USER_DEFINED_PAYLOAD'));
```

//presistent menu
```php
$setting->addSetting(ThreadSetting::create()
 		->addItem(MenuItem::create('Tell me more')->type('postback')->payload('tellmemore'))
 		->addItem(MenuItem::create('Show me the docs')->url('http://botman.io/')));
```

## License

FacebookSetting for Botman is free software distributed under the terms of the MIT license.
