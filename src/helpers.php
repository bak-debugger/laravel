<?php

use BakDebugger\Laravel\Bak;

if (!function_exists('bak')) {
    /**
     * @param $content
     * @return Bak
     */
    function bak($content): Bak
    {
        $caller = [
            'file' => debug_backtrace()[1]['file'],
            'line' => debug_backtrace()[1]['line']
        ];
        return (new Bak($content, $caller))->send();
    }
}
