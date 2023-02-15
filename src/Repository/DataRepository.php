<?php
/**
 * Project slug-helper
 * Created by PhpStorm
 * User: 713uk13m <dev@nguyenanhung.com>
 * Copyright: 713uk13m <dev@nguyenanhung.com>
 * Date: 09/25/2021
 * Time: 08:24
 */

namespace nguyenanhung\Libraries\Slug\Repository;

/**
 * Class DataRepository
 *
 * @package   nguyenanhung\Libraries\Slug\Repository
 * @author    713uk13m <dev@nguyenanhung.com>
 * @copyright 713uk13m <dev@nguyenanhung.com>
 */
class DataRepository
{
    const CONFIG_PATH = 'config';
    const CONFIG_EXT = '.php';

    /**
     * Hàm lấy nội dung config được quy định trong thư mục config
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 9/28/18 14:47
     *
     * @param string $configName Tên file config
     *
     * @return array|mixed
     */
    public static function getData(string $configName)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . self::CONFIG_PATH . DIRECTORY_SEPARATOR . $configName . self::CONFIG_EXT;
        if (is_file($path) && file_exists($path)) {
            return require $path;
        }

        return array();
    }

    /**
     * Hàm lấy nội dung Data từ 1 file bất kỳ trong hệ thống
     *
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 10/17/18 09:25
     *
     * @param string $filename Đường dẫn file config
     *
     * @return array|mixed
     */
    public static function getDataContent(string $filename)
    {
        if (is_file($filename) && file_exists($filename)) {
            return require $filename;
        }

        return array();
    }
}
