<?php

// version 4
if (!function_exists('ngrok_replace')) {
    function ngrok_replace($url)
    {
        // guard live
        if (env('NGROK_REPLACE', false) === false) {
            return $url;
        }
        // guard no ngrok
        if (!isset($_SERVER['HTTP_X_ORIGINAL_HOST'])) {
            abort(403, 'Looks like you are not using Ngrok?');
        }

        // replace url
        $url = str_replace($_SERVER['HTTP_HOST'], $_SERVER['HTTP_X_ORIGINAL_HOST'], $url);

        // replace https
        if (env('NGROK_FORCE_SSL', true) === true) {
            $url = str_replace('http://', 'https://', $url);
        }
        
        return $url;
    }
}
