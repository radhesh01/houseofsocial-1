<?php defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('cc_truncate')) {
    function cc_truncate($text, $limit = 120)
    {
        return strlen($text) > $limit ? substr($text, 0, $limit) . '...' : $text;
    }
}

// Legacy alias kept for backwards compatibility
if (!function_exists('fc_truncate')) {
    function fc_truncate($text, $limit = 120)
    {
        return cc_truncate($text, $limit);
    }
}