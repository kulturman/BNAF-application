<?php
    if (!function_exists('getArticleContentPreview')) {
        function getArticleContentPreview(string $content, int $charactersCount = 20) {
            $preview = substr(strip_tags($content), 0, $charactersCount);
            if (strlen($content) > $charactersCount)
                $preview .= '...';
            return $preview;
        }
    }