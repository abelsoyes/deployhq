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
$images_ids = array();
$folders    = array();
$result     = array();
$dactive    = array();

$module_name = 'gcdeleteuselessimg';

if ( !Module::isEnabled($module_name) ) {
    die('KO');
}

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

if (Tools::getValue('image')) {
    $selectquery     = 'SELECT `id_product` FROM ' . _DB_PREFIX_ . 'product WHERE active = 0';
    $deactiveproduct = Db::getInstance()->ExecuteS($selectquery);

    foreach ($deactiveproduct as $dimages) {
        $dactive[] = $dimages['id_product'];
    }

    $sql = 'SHOW TABLE STATUS LIKE \'' . _DB_PREFIX_ . 'image\'';
    $max = Db::getInstance()->executeS($sql);

    $offset = 500;

    echo json_encode(
        array(
            'mes' => '1',
            'start' => (int)$max[0]['Auto_increment'] + $offset, 'offset' => $offset,
            'limit' => (int)$max[0]['Auto_increment'] + $offset, 'deletecount' => 0,
            'deactiveproduct' => (int)Tools::getValue('chk_getimages'),
            'last' => false
        )
    );
    die;
}

if (Tools::getValue('subfolder')) {
    $rootfolder = Tools::getValue('rootfolder');
    $index      = (int)Tools::getValue('index');
    $realfolder = Tools::getValue('realfolder');
    $dir        = _PS_PROD_IMG_DIR_;
    $delk       = $k = array();
    if (isset($rootfolder[$index]) && $rootfolder[$index]) {
        $realfolder[$index] = listdir($dir, array($rootfolder[$index]), $k);
        $last               = false;
    } else {
        $last = true;
    }
    $index++;
    echo json_encode(
        array(
            'mes' => '1',
            'rootfolder' => $rootfolder,
            'index' => $index,
            'last' => $last,
            'realfolder' => $realfolder,
            'imagesIds' => Tools::getValue('images')
        )
    );
    die;
}

if (Tools::getValue('checkImgFolders')) {
    $start           = (int)Tools::getValue('start');
    $offset          = (int)Tools::getValue('offset');
    $limit           = (int)Tools::getValue('limit');
    $deletecount     = (int)Tools::getValue('deletecount');
    $deactiveproduct = (int)Tools::getValue('deactiveproduct');

    $index = $start;
    $idShop = (int)Context::getContext()->shop->id;
    while ($index > 1 && ($index > $start - $offset)) {

        $id_module = Module::getModuleIdByName($module_name);
        $sql = 'SELECT COUNT(*) AS n '
        .' FROM `' . _DB_PREFIX_ . 'image_shop` '
        .' WHERE id_image = '.(int)$index.' AND id_shop IS NOT NULL AND id_shop NOT IN ( SELECT id_shop FROM `' . _DB_PREFIX_ . 'module_shop` WHERE id_module = ' . (int) $id_module . ' )';

        $nb = (int)Db::getInstance()->getValue($sql);

        if ( $nb <= 0 ) {
            $new  = str_split($index);
            $path = implode('/', $new);
            $dir  = _PS_PROD_IMG_DIR_ . $path;
            if (file_exists($dir) && is_dir($dir) && is_writable($dir)) {
                sanitizeImgDir($dir, $index);
                $image = new ImageCore($index);
                if ((!Validate::isLoadedObject($image))) {
                    $deletecount += deleteFolder($dir);
                } elseif ($deactiveproduct) {
                    $product = new Product((int)$image->id_product);
                    if (!Validate::isLoadedObject($product) || !$product->active) {
                        $deletecount += deleteFolder($dir);
                    }
                }
            }
        }

        $index--;
    }

    echo json_encode(
        array(
            'status' => '1',
            'start' => $index,
            'offset' => $offset,
            'limit' => $limit,
            'deletecount' => $deletecount,
            'deactiveproduct' => $deactiveproduct,
            'last' => ($index <= 1)
        )
    );
    die;
}

if (Tools::getValue('folder')) {
    $countof = Singleton::getInstance()->countof;
    $dir     = _PS_PROD_IMG_DIR_;
    $delk    = $k = array();
    $r       = Tools::getValue('realfolder');
    $folders = arrayflatten($r);
    die;
}
if (Tools::getValue('compare')) {
    $images_ids = Tools::getValue('images');
    $folders    = Tools::getValue('folders');
    $countof    = (int)Tools::getValue('countof');
    $result     = array_diff($folders, $images_ids);
    rsort($result);
    if ($countof > 0) {
        $countof  += count($result);
        $result[] = '';
    } else {
        $countof = count($result);
    }
    echo json_encode(array('status' => '1', 'result' => $result, 'countof' => $countof));
}
if (Tools::getValue('delete')) {
    $paths  = array();
    $result = Tools::getValue('results');
    if (empty($result)) {
        die(json_encode(array('status' => '1', 'result' => $result)));
    }
    $new     = str_split($result);
    $path    = implode('/', $new);
    $paths[] = _PS_PROD_IMG_DIR_ . $path;
    foreach ($paths as $path) {
        $is_dir = 0;
        $files2 = scandir($path, 0);
        foreach ($files2 as $f) {
            if ($f == '.' || $f == '..') {
                continue;
            }

            $dirs = array_filter(glob($path . '/' . $f), 'is_dir');
            if (count($dirs) > 0) {
                $is_dir = 1;
            } else {
                if ($f != 'index.php') {
                    unlink($path . '/' . $f);
                }
            }
        }

        if ($is_dir == 0) {
            unlink($path . '/index.php');
            rmdir($path);
        }
    }
    echo json_encode(array('status' => '1', 'result' => $result));
}
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
                $deleted = 1;
            }
        }
    }

    if ($is_dir == 0) {
        if (file_exists($path . '/index.php')) {
            unlink($path . '/index.php');
        }
        rmdir($path);
        $deleted = 1;
    }

    return $deleted;
}
