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
    public function setSiteUrl(string $siteUrl = ''): SlugUrl
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
    public function getSiteUrl(): string
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
    public function setSiteExt($siteExt): SlugUrl
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
    public function getSiteExt(): string
    {
        return $this->siteExt;
    }

    /**
     * Function slugify - SEO Slugify
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 9/21/18 02:49
     *
     * @param string $str
     * @param mixed  $options
     *
     * @return string
     */
    public function slugify(string $str = '', $options = null): string
    {
        try {
            if ($options === null) {
                $slugify = new Slugify();
            } else {
                if (is_string($options)) {
                    $slugify = new Slugify(array('separator' => $options));
                } else {
                    $slugify = new Slugify($options);
                }
            }

            return $slugify->slugify($str);
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
    public function searchSlugify(string $str = ''): string
    {
        try {
            $options = array('separator' => '+');
            $slugify = new Slugify($options);

            return $slugify->slugify($str);
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
    public function toEnglish(string $str = ''): string
    {
        try {
            $options = array('separator' => ' ');
            $slugify = new Slugify($options);

            return $slugify->slugify($str);
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
    public function urlEncode(string $url = ''): string
    {
        return urlencode($url);
    }

    /**
     * Function urlDecode
     *
     * @param string $url
     *
     * @return string
     * @author   : 713uk13m <dev@nguyenanhung.com>
     * @copyright: 713uk13m <dev@nguyenanhung.com>
     * @time     : 09/25/2021 31:46
     */
    public function urlDecode(string $url): string
    {
        return urldecode($url);
    }

    /**
     * Function convertVietnameseToEnglish
     *
     * H??m chuy???n ?????i k?? t??? t??? ti???ng Vi???t, v?? c??c k?? t??? ?????c bi???t sang k?? t??? kh??ng d???u
     *
     * S??? d???ng trong tr?????ng h???p class slugify n?? kh??ng ch???y
     *
     * @param string $str Chu???i k?? t??? ?????u v??o
     *
     * @return string ?????u ra r?? 1 chu???i k?? t???
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/13/18 01:17
     *
     */
    public function convertVietnameseToEnglish(string $str = ''): string
    {
        $str  = trim($str);
        $str  = function_exists('mb_strtolower') ? mb_strtolower($str) : strtolower($str);
        $data = DataRepository::getData('convert_vi_to_en');
        if (!empty($str)) {
            $str = str_replace($data['vn_array'], $data['en_array'], $str);
            $str = str_replace($data['special_array'], $data['separator'], $str);
            $str = str_replace(' ', $data['separator'], $str);
            while (strpos($str, '--') > 0) {
                $str = str_replace('--', $data['separator'], $str);
            }
            while (strpos($str, '--') === 0) {
                $str = str_replace('--', $data['separator'], $str);
            }
        }

        return $str;
    }
}
