<?php
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
    function seoToSlugify($str)
    {
        if (empty($str)) {
            return $str;
        }
        $slug = new nguyenanhung\Libraries\Slug\SlugUrl();
        return $slug->slugify($str);
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
    function seoSearchSlugify($str)
    {
        if (empty($str)) {
            return $str;
        }
        $slug = new nguyenanhung\Libraries\Slug\SlugUrl();
        return $slug->searchSlugify($str);
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
    function convertStrToEn($str)
    {
        if (empty($str)) {
            return $str;
        }
        $slug = new nguyenanhung\Libraries\Slug\SlugUrl();
        return $slug->toEnglish($str);
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
        if (empty($str)) {
            return $str;
        }
        $slug = new nguyenanhung\Libraries\Slug\SlugUrl();
        return $slug->convertStringUtf8ToUnicode($str);
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
        if (empty($str)) {
            return $str;
        }
        $slug = new nguyenanhung\Libraries\Slug\SlugUrl();
        return $slug->convertStringUtf8ToUnicode($str);
    }
}
