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

$module_name = 'gcdeleteuselessimg';

if ( !Module::isEnabled($module_name) ) {
    die('KO');
}

$allimage_types = array();
$type_name      = array();
if (Tools::getValue('type')) {
    if (Tools::getValue('chk_imgtype') == 1) {
        // return array with images type used by products
        $selectquery = 'SELECT `id_image_type`, `name` FROM ' . _DB_PREFIX_ . 'image_type WHERE products = 1';
        $image_type  = Db::getInstance()->ExecuteS($selectquery);
        foreach ($image_type as $imgtype) {
            $type_name[] = $imgtype['name'];
        }
    } else {
        $allimage_types = ImageType::getImagesTypes();
        foreach ($allimage_types as $img_types) {
            $type_name[] = $img_types['name'];
        }
    }
    echo json_encode(array('typestatus' => '1', 'typenames' => $type_name));
}
if (Tools::getValue('foldername')) {
    $dir           = _PS_PROD_IMG_DIR_;
    $files2        = scandir($dir, 0);
    $delk          = $k = array();
    $r             = listdir($dir, $files2, $k);
    $folders       = arrayflatten($r);
    $countoffolder = count($folders);
    echo json_encode(array(
        'folderstatus' => '1',
        'typenames'    => Tools::getValue('typenames'),
        'foldersname'  => $folders,
        'foldercount'  => $countoffolder
    ));
}
if (Tools::getValue('folderimg')) {
    $paths   = array();
    $folders = Tools::getValue('folders');
    $folders = explode('|', $folders);
    $idShop = (int)Context::getContext()->shop->id;
    foreach ($folders as $folder) {
        $id_module = Module::getModuleIdByName($module_name);
        $sql = 'SELECT COUNT(*) AS n '
        .' FROM `' . _DB_PREFIX_ . 'image_shop` '
        .' WHERE id_image = '.(int)$folder.' AND id_shop IS NOT NULL AND id_shop NOT IN ( SELECT id_shop FROM `' . _DB_PREFIX_ . 'module_shop` WHERE id_module = ' . (int) $id_module . ' )';

        $nb = (int)Db::getInstance()->getValue($sql);
        if ( $nb > 0 ) {
            continue;
        }

        $new            = str_split($folder);
        $path           = implode('/', $new);
        $paths[$folder] = _PS_PROD_IMG_DIR_ . $path;
    }
    $result = array();
    foreach ($paths as $folder => $path) {
        $is_dir = 0;
        if ( !file_exists($path) ) {
            continue;
        }
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
                    $replcename = Tools::substr($f, 0, strrpos($f, '.'));
                    $lastname   = array();
                    if (strpos($replcename, '-') !== false) {
                        $arr        = explode('-', $replcename);
                        $lastname[] = end($arr);
                    } else {
                        $arr = explode($folder, $replcename);
                        end($arr);
                    }
                    $types  = Tools::getValue('typenames');
                    $result = array();
                    $result = array_diff($lastname, $types);
                    if (!empty($result)) {
                        foreach ($result as $res) {
                            unlink($path . '/' . $f);
                        }
                    }
                }
            }
        }
    }
    echo json_encode(array('imgstatus' => '1', 'result' => $result));
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
        }
    }

    return $return;
}
