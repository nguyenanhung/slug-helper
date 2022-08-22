<?php

use nguyenanhung\Libraries\Slug\SlugUrl;

if (!function_exists('seoToSlugify')) {
    /**
     * Function seoToSlugify
     *
     * @param $str
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 34:34
     */
    function seoToSlugify($str): string
    {
        return (new SlugUrl())->slugify($str);
    }
}
if (!function_exists('seoSearchSlugify')) {
    /**
     * Function seoSearchSlugify
     *
     * @param $str
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 34:34
     */
    function seoSearchSlugify($str): string
    {
        return (new SlugUrl())->searchSlugify($str);
    }
}
if (!function_exists('convertStrToEn')) {
    /**
     * Function convertStrToEn
     *
     * @param $str
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 34:34
     */
    function convertStrToEn($str): string
    {
        return (new SlugUrl())->toEnglish($str);
    }
}
if (!function_exists('convert_string_utf8_to_vietnamese')) {
    /**
     * Function convert_string_utf8_to_vietnamese
     *
     * @param $str
     *
     * @return array|mixed|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/08/2022 23:33
     */
    function convert_string_utf8_to_vietnamese($str)
    {
        return (new SlugUrl())->convertStringUtf8ToUnicode($str);
    }
}
if (!function_exists('convert_string_utf8_to_unicode')) {
    /**
     * Function convert_string_utf8_to_unicode
     *
     * @param $str
     *
     * @return array|mixed|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 22/08/2022 23:33
     */
    function convert_string_utf8_to_unicode($str)
    {
        return (new SlugUrl())->convertStringUtf8ToUnicode($str);
    }
}
