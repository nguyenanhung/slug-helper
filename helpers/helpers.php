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
    function seoToSlugify($str)
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
    function seoSearchSlugify($str)
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
    function convertStrToEn($str)
    {
        return (new SlugUrl())->toEnglish($str);
    }
}
