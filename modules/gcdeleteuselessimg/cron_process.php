<?php
/**
 * GcDeleteUselessImg
 *
 * @author    Grégory Chartier <hello@gregorychartier.fr>
 * @copyright 2020 Grégory Chartier (https://www.gregorychartier.fr)
 * @license   Commercial license see license.txt
 * @category  Prestashop
 * @category  Module
 */

include_once('../../config/config.inc.php');
include_once('../../init.php');

$token = Tools::getValue('token');
$the_token = Tools::encrypt(Tools::getShopDomainSsl());

if ($token != $the_token) {
    echo 'Bye';
    exit;
}

$images_ids = array();
$folders    = array();
$result     = array();
$dactive    = array();
$image_type    = array();
$deletecount     = 0;

class Singleton
{
    private static $instance;
    public $countof = 0;

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Singleton();
        }

        return self::$instance;
    }
}

if (Tools::getValue('_t')) {
    $selectquery = 'SELECT `id_image_type`, `name` FROM ' . _DB_PREFIX_ . 'image_type WHERE products = 1';
    $image_type  = Db::getInstance()->ExecuteS($selectquery);
    $type_name = array();
    foreach ($image_type as $imgtype) {
        $type_name[] = $imgtype['name'];
    }
    
    $dir           = _PS_PROD_IMG_DIR_;
    $files2        = scandir($dir, 0);
    $delk          = $k = array();
    $r             = listdir($dir, $files2, $k);
    $folders       = arrayflatten($r);
    
    $paths   = array();
    foreach ($folders as $folder) {
        $new            = str_split($folder);
        $path           = implode('/', $new);
        $paths[$folder] = _PS_PROD_IMG_DIR_ . $path;
    }
    $result = array();
    foreach ($paths as $folder => $path) {
        $is_dir = 0;
        $files2 = scandir($path, 0);
        foreach ($files2 as $f) {
            if ($f == '.' || $f == '..' || $f == 'index.php') {
                continue;
            }

            $dirs = array_filter(glob($path . '/' . $f), 'is_dir');
            if (count($dirs) > 0) {
                $is_dir = 1;
            } else {
                $replcename = Tools::substr($f, 0, strrpos($f, '.'));
                $lastname   = array();
                if (strpos($replcename, '-') !== false) {
                    $arr        = explode('-', $replcename);
                    $lastname[] = end($arr);
                } else {
                    $arr = explode($folder, $replcename);
                    end($arr);
                }
                $result = array();
                $result = array_diff($lastname, $type_name);
                if (!empty($result)) {
                    foreach ($result as $res) {
                        unlink($path . '/' . $f);
                        $deletecount ++;
                    }
                }
            }
        }
    }
} else {
    $sql = 'SHOW TABLE STATUS LIKE \'' . _DB_PREFIX_ . 'image\'';
    $max = Db::getInstance()->executeS($sql);
    $limit = (int)$max[0]['Auto_increment'];

    $start           = 1;
    $deactiveproduct = (int)Tools::getValue('_d');

    $index = $limit;
    while ($index > 1 && ($index <= $limit)) {
        $new  = str_split($index);
        $path = implode('/', $new);
        $dir  = _PS_PROD_IMG_DIR_ . $path;
        if (file_exists($dir) && is_dir($dir) && is_writable($dir)) {
            sanitizeImgDir($dir, $index);
            $image = new Image($index);
            if ((!Validate::isLoadedObject($image))) {
                $deletecount += deleteFolder($dir);
            } elseif ($deactiveproduct) {
                $product = new Product((int)$image->id_product);
                if (!Validate::isLoadedObject($product) || !$product->active) {
                    $deletecount += deleteFolder($dir);
                }
            }
        }

        $index--;
    }
}

echo 'Ok done: '.$deletecount;
exit;
function listdir($dir, $files2, $k)
{
    foreach ($files2 as $r) {
        if (is_dir($dir . $r) && $r != '..' && $r != '.') {
            $subfiles2 = scandir($dir . $r . '/', 0);
            $n         = array($dir . $r . '/');
            $k[]       = listdir($dir . $r . '/', $subfiles2, $n);
        }
    }

    return $k;
}

function arrayflatten($array)
{
    $return = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $return = array_merge($return, arrayflatten($value));
        } else {
            $return[$key] = str_replace('/', '', str_replace(_PS_PROD_IMG_DIR_, '', $value));
            sanitizeImgDir($value, $return[$key]);
        }
    }

    return $return;
}

function sanitizeImgDir($dir, $id_img)
{
    $countof = Singleton::getInstance()->countof;
    if (!is_dir($dir)) {
        return false;
    }
    $dir      = rtrim(rtrim($dir, '\\'), '/') . '/';
    $query    = (int)$id_img;
    $files    = Tools::scandir($dir, '');
    $autorise = array('png', 'jpg', 'jpeg', 'gif');
    foreach ($files as $file) {
        if ($file[0] != '.' && !is_dir($dir . $file) && $file != 'index.php') {
            $ext  = Tools::strtolower((pathinfo($dir . $file, PATHINFO_EXTENSION)));
            $f_ar = explode('-', $file);
            $f_ar = (int)$f_ar[0];
            if (in_array($ext, $autorise) && $f_ar !== $query) {
                unlink($dir . $file);
                $countof++;
            }
        }
    }
}

function getMaxFolderName($dir)
{
    $dir     = rtrim(rtrim($dir, '\\'), '/') . '/';
    $files2  = scandir($dir, 0);
    $folders = $return = array();
    foreach ($files2 as $r) {
        if (is_dir($dir . $r) && $r != '..' && $r != '.') {
            $folders[] = (int)$r;
        }
    }
    if (!empty($folders)) {
        $max      = max($folders);
        $return[] = $max;
        if (is_dir($dir . $max)) {
            $return = array_merge($return, getMaxFolderName($dir . $max));
        }
    }

    return $return;
}

function deleteFolder($path)
{
    $is_dir  = 0;
    $files2  = scandir($path, 0);
    $deleted = 0;
    foreach ($files2 as $f) {
        if ($f == '.' || $f == '..') {
            continue;
        }

        $dirs = array_filter(glob($path . '/' . $f), 'is_dir');
        if (count($dirs) > 0) {
            $is_dir = 1;
        } else {
            if ($f != 'index.php') {
                if (file_exists($path . '/' . $f)) {
                    unlink($path . '/' . $f);
                }
                $deleted += 1;
            }
        }
    }

    if ($is_dir == 0) {
        if (file_exists($path . '/index.php')) {
            unlink($path . '/index.php');
        }
        rmdir($path);
        $deleted += 1;
    }

    return $deleted;
}
