<?php

// version 5
if (!function_exists('ngrok_replace')) {
    function ngrok_replace($url)
    {
        // guard ngrok replace is not active
        if (env('NGROK_REPLACE', false) === false) {
            return $url;
        }
        // guard if no url
        if (!$ngrok_url = env('NGROK_URL', null)) {
            abort(403, 'You dont have an url set for ngrok');
        }
        // guard ngrok url is without http or https
        if (strpos($ngrok_url, 'http') !== false) {
            abort(403, 'Ngrok url in env is without http or https');
        }
        // guard no ngrok parameter or url is set (this used if we doing the full application over ngrok)
        if (!isset($_SERVER['HTTP_X_ORIGINAL_HOST']) && !env('NGROK_URL', null)) {
            abort(403, 'Looks like you are not the -host parameter or ngrok env url.');
        }


        //
        if (isset($_SERVER['HTTP_X_ORIGINAL_HOST'])) {
            $url = str_replace($_SERVER['HTTP_HOST'], $_SERVER['HTTP_X_ORIGINAL_HOST'], $url);
        } else {
            $url = str_replace($_SERVER['HTTP_HOST'], $ngrok_url, $url);
        }
        
        // replace https
        if (env('NGROK_FORCE_SSL', true) === true) {
            $url = str_replace('http://', 'https://', $url);
        }
        
        return $url;
    }
}
