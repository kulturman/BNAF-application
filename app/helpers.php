<?php
if (!function_exists('getArticleContentPreview')) {
    function getArticleContentPreview(string $content, int $charactersCount = 20)
    {
        $preview = substr(strip_tags($content), 0, $charactersCount);
        if (strlen($content) > $charactersCount)
            $preview .= '...';
        return $preview;
    }
}

if (! function_exists('customUrl')) {
    function customUrl($path = null, $parameters = [], $secure = null)
    {
        return url($path, $parameters, getenv('APP_ENV') === 'production');
    }
}

if (! function_exists('ancreUrl')) {
    function ancreUrl(string $id)
    {
        if (request()->path() !== '/')
            return url('/') . $id;
        return $id;
    }
}