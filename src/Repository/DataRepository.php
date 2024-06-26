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
     * @param  string  $configName  Tên file config
     *
     * @return array|mixed
     * @author: 713uk13m <dev@nguyenanhung.com>
     * @time  : 9/28/18 14:47
     *
     */
    public static function getData(string $configName)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . self::CONFIG_PATH . DIRECTORY_SEPARATOR . trim(
                $configName
            ) . self::CONFIG_EXT;
        if (is_file($path) && file_exists($path)) {
            return require $path;
        }

        return array();
    }
}
