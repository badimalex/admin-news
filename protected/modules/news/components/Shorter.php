<?php

/**
 * Created by PhpStorm.
 * User: badichan
 * Date: 30.06.16
 * Time: 10:32
 */
class Shorter
{
    static function get($text, $chars_limit)
    {
        // Check if length is larger than the character limit
        if (strlen($text) > $chars_limit)
        {
            // If so, cut the string at the character limit
            $new_text = mb_substr($text, 0, $chars_limit);
            // Trim off white space
            $new_text = trim($new_text);
            // Add at end of text ...
            return $new_text . "...";
        }
        // If not just return the text as is
        else
        {
            return $text;
        }
    }
}