<?php
/**
 * Project slug-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/25/2021
 * Time: 08:24
 */

namespace nguyenanhung\Libraries\Slug;

use Exception;
use Cocur\Slugify\Slugify;
use nguyenanhung\Libraries\Slug\Repository\DataRepository;

/**
 * Class SlugUrl
 *
 * @package   nguyenanhung\Libraries\Slug
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class SlugUrl
{
    /** @var string $siteUrl */
    protected $siteUrl;

    /** @var string Site Ext */
    protected $siteExt = '.html';

    /**
     * Function setSiteUrl
     *
     * @param string $siteUrl
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 26:03
     */
    public function setSiteUrl($siteUrl = '')
    {
        $this->siteUrl = $siteUrl;

        return $this;
    }

    /**
     * Function getSiteUrl
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 26:11
     */
    public function getSiteUrl()
    {
        return $this->siteUrl;
    }

    /**
     * Function setSiteExt
     *
     * @param $siteExt
     *
     * @return $this
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 26:00
     */
    public function setSiteExt($siteExt)
    {
        $this->siteExt = $siteExt;

        return $this;
    }

    /**
     * Function getSiteExt
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 26:17
     */
    public function getSiteExt()
    {
        return $this->siteExt;
    }

    /**
     * Function slugify - SEO Slugify
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 9/21/18 02:49
     *
     * @param string            $str
     * @param array|string|null $options
     *
     * @return string
     */
    public function slugify($str = '', $options = null)
    {
        if (empty($str)) {
            return $str;
        }
        try {
            $slugify = new Slugify();
            if (empty($options)) {
                $options = array('separator' => '-');
            }
            if (is_string($options)) {
                $options = array('separator' => $options);
            }
            if (method_exists($slugify, 'setOptions')) {
                $slugify->setOptions($options);

                return $slugify->slugify($str);
            }

            return $slugify->slugify($str, $options);
        } catch (Exception $e) {
            return $this->convertVietnameseToEnglish($str);
        }

    }

    /**
     * Function searchSlugify - SEO Search Slugify
     *
     * @param string $str
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 30:20
     */
    public function searchSlugify($str = '')
    {
        if (empty($str)) {
            return $str;
        }
        try {
            $options = array('separator' => '+');
            $slugify = new Slugify();
            if (empty($options)) {
                $options = array('separator' => '-');
            }
            if (method_exists($slugify, 'setOptions')) {
                $slugify->setOptions($options);

                return $slugify->slugify($str);
            }

            return $slugify->slugify($str, $options);
        } catch (Exception $e) {
            return $this->convertVietnameseToEnglish($str);
        }
    }

    /**
     * Function toEnglish - Convert String to English
     *
     * @param string $str
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 32:49
     */
    public function toEnglish($str = '')
    {
        if (empty($str)) {
            return $str;
        }
        try {
            $options = array('separator' => ' ');
            $slugify = new Slugify();
            if (empty($options)) {
                $options = array('separator' => '-');
            }
            if (method_exists($slugify, 'setOptions')) {
                $slugify->setOptions($options);

                return $slugify->slugify($str);
            }

            return $slugify->slugify($str, $options);
        } catch (Exception $e) {
            return $this->convertVietnameseToEnglish($str);
        }
    }

    /**
     * Function urlEncode
     *
     * @param string $url
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 31:43
     */
    public function urlEncode($url = '')
    {
        if (empty($url)) {
            return $url;
        }

        return urlencode($url);
    }

    /**
     * Function urlDecode
     *
     * @param $url
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 31:46
     */
    public function urlDecode($url)
    {
        if (empty($url)) {
            return $url;
        }

        return urldecode($url);
    }

    /**
     * Function convertVietnameseToEnglish
     *
     * Hàm chuyển đổi ký tự từ tiếng Việt, và các ký tự đặc biệt sang ký tự không dấu
     *
     * Sử dụng trong trường hợp class slugify nó không chạy
     *
     * @param string $str Chuỗi ký tự đầu vào
     *
     * @return string Đầu ra rà 1 chuỗi ký tự
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/13/18 01:17
     *
     */
    public function convertVietnameseToEnglish($str = '')
    {
        if (empty($str)) {
            return $str;
        }
        $str = trim($str);
        $str = function_exists('mb_strtolower') ? mb_strtolower($str) : strtolower($str);
        $data = DataRepository::getData('convert_vi_to_en');
        if (!empty($str)) {
            $str = str_replace(array($data['vn_array'], $data['special_array'], ' '), array($data['en_array'], $data['separator'], $data['separator']), $str);
            while (strpos($str, '--') > 0) {
                $str = str_replace('--', $data['separator'], $str);
            }
            while (strpos($str, '--') === 0) {
                $str = str_replace('--', $data['separator'], $str);
            }
        }

        return $str;
    }

    /**
     * Function convertStringUtf8ToUnicode
     *
     * @param $str
     *
     * @return array|mixed|string|string[]
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 15/02/2023 10:33
     */
    public function convertStringUtf8ToUnicode($str = '')
    {
        if (empty($str)) {
            return $str;
        }
        $str = trim($str);
        if ($str !== '') {
            $data = DataRepository::getData('convert_utf8_to_unicode');
            $str = str_replace($data['utf8_array'], $data['unicode_array'], $str);
        }

        return $str;
    }
}
