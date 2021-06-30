# laravel-ngrok-helper

Work in progress


## What is it?

If you are working on localhost and like to test a callback of an API. You can use this small helper to do replace the callback url with your Ngrok url automaticly.


## Donate

Find this project useful? You can support me on Patreon

https://www.patreon.com/pixsil


## Installation

For a quick install, run this from your project root:
```bash
mkdir app/Http/Helpers
wget -O app/Http/Helpers/NgrokHelper.php https://raw.githubusercontent.com/pixsil/laravel-ngrok-helper/main/helpers/NgrokHelper.php
```

In your general helper file
```php
include('Helpers/NgrokHelper.php');
```

In your env file:
```
NGROK_REPLACE=true
NGROK_URL="xxxxxx.ngrok.io"
```


## Usage

```
ngrok_replace(route('callback-page'))
```

Ngrok forces HTTPS by default because this is in most API's required. With the following .env configuration you can set this behauvior off.


## Additional knowledge

```
NGROK_FORCE_SSL=false
```
