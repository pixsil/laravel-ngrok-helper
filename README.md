# laravel-ngrok-helper

Work in progress

Installation in env file:

Quick install notes comming soon.

```
NGROK_REPLACE=true
```

Usage:

```
ngrok_replace(route('recovery.finish'))
```

Ngrok forces HTTPS by default because this is in most API's required. With the following .env configuration you can set this behauvior off.

```
NGROK_FORCE_SSL=false
```
