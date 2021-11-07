<?php

namespace App\Helper;

use League\CommonMark\CommonMarkConverter;

class Markdown
{
    public static function renderFile(string $file)
    {
        $markDown = file_get_contents(base_path($file.'.md'));
        $converter = new CommonMarkConverter([
            'html_input'         => 'strip',
            'allow_unsafe_links' => false,
        ]);

        return $converter->convertToHtml($markDown);
    }
}
