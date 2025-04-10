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

if (!defined('_PS_VERSION_')) {
    exit;
}

class GcDeleteUselessImg extends Module
{
    public function __construct()
    {
        $this->name          = 'gcdeleteuselessimg';
        $this->tab           = 'administration';
        $this->version       = '1.4.0';
        $this->bootstrap     = true;
        $this->display       = 'view';
        $this->module_key    = '77d1e8490d91590130acf972b686dc96';
        $this->need_instance = 0;
        $this->author        = 'Grégory Chartier';

        parent::__construct();

        $this->displayName = $this->l('Delete useless images');
        $this->description = $this->l('Clean useless products images from your server');
    }

    public function install()
    {
        return parent::install() && Configuration::updateValue('GCDELETEUSELESSIMG_STOPRATING', 0)
               && $this->registerHook('actionAdminControllerSetMedia')
               && $this->registerHook('displayBackOfficeHeader');
    }

    public function uninstall()
    {
        return parent::uninstall() && Configuration::deleteByName('GCDELETEUSELESSIMG_STOPRATING');
    }

    public function getContent()
    {
        if (Tools::getIsset('stop_rating')) {
            Configuration::updateValue('GCDELETEUSELESSIMG_STOPRATING', 1);
            die;
        }
        $html = $this->getRating();
        $base_url = _PS_BASE_URL_.'/'.$this->getPathUri()
                .'cron_process.php?token='.Tools::encrypt(Tools::getShopDomainSsl());
        $this->context->smarty->assign(array(
            'base_url' => $base_url,
        ));
        $html .= $this->context->smarty->fetch($this->local_path.'views/templates/admin/_configure.tpl');
        $html .= $this->renderForm();

        return $html;
    }

    protected function renderForm()
    {
        $form = array(
            'form' => array(
                'legend' => array(
                    'title' => $this->l('Traitement'),
                    'icon'  => 'icon-cogs',
                ),
                'input'  => array(
                    array(
                        'type'   => 'checkbox',
                        'name'   => 'chk_getimages',
                        'values' => array(
                            'query' => array(
                                array(
                                    'id'   => '1',
                                    'val'  => 1,
                                    'name' => $this->l('Delete photos from inactives products [optional]')
                                )
                            ),
                            'id'    => 'id',
                            'name'  => 'name',
                        ),
                    ),
                    array(
                        'type'   => 'checkbox',
                        'name'   => 'chk_imgtype',
                        'values' => array(
                            'query' => array(
                                array('id' => '1',
                                    'val' => 1,
                                    'name' => $this->l('Delete old image type photos [optional]')
                                )
                            ),
                            'id'    => 'id',
                            'name'  => 'name',
                        ),
                    ),
                    array(
                        'type'   => 'checkbox',
                        'name'   => 'chk_confirm',
                        'values' => array(
                            'query' => array(
                                array(
                                    'id' => '1',
                                    'val' => 1,
                                    'name' => $this->l('I understand I will delete useless images')
                                )
                            ),
                            'id'    => 'id',
                            'name'  => 'name',
                        ),
                    ),
                    array(
                        'type' => 'hidden',
                        'name' => 'chk_action_uri',
                    ),
                ),
                'submit' => array(
                    'title' => $this->l('Executer'),
                    'icon'  => 'process-icon-cogs',
                ),
            ),
        );

        $form_values = array(
            'chk_getimages'  => 0,
            'chk_imgtype'    => 0,
            'chk_confirm'    => 0,
            'chk_action_uri' => Context::getContext()->shop->getBaseURL(true) . ltrim($this->getPathUri(), '/'),
        );

        $helper = new HelperForm();

        $helper->show_toolbar             = false;
        $helper->table                    = $this->table;
        $helper->module                   = $this;
        $helper->default_form_language    = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier    = $this->identifier;
        $helper->submit_action = 'submitProcess';
        $helper->currentIndex  = $this->context->link->getAdminLink('AdminModules', false)
                                . '&configure=' . $this->name . '&tab_module='
                                . $this->tab . '&module_name=' . $this->name;
        $helper->token         = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $form_values, /* Add values for your inputs */
            'languages'    => $this->context->controller->getLanguages(),
            'id_language'  => $this->context->language->id,
        );

        return $helper->generateForm(array($form));
    }

    public function listdir($dir, $files2, $k)
    {
        foreach ($files2 as $r) {
            if (is_dir($dir . $r) && $r != '..' && $r != '.') {
                $subfiles2 = scandir($dir . $r . '/', 0);
                $n         = array($dir . $r . '/');
                $k[]       = $this->listdir($dir . $r . '/', $subfiles2, $n);
            }
        }

        return $k;
    }

    public function arrayflatten($array)
    {
        $return = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $return = array_merge($return, $this->arrayflatten($value));
            } else {
                $return[$key] = str_replace('/', '', str_replace(_PS_PROD_IMG_DIR_, '', $value));
            }
        }

        return $return;
    }

    public function hookactionAdminControllerSetMedia()
    {
        if (Tools::getValue('module_name') == $this->name || Tools::getValue('configure') == $this->name) {
            $this->context->controller->addCSS('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
            $this->context->controller->addCSS($this->_path . 'views/css/process.css');
            $this->context->controller->addJS('https://code.jquery.com/ui/1.12.1/jquery-ui.js');
            $this->context->controller->addJS($this->_path . 'views/js/process.js');
        }
    }

    public function hookdisplayBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name || Tools::getValue('configure') == $this->name) {
            $this->smarty->assign(array(
                'confirm_please' => $this->l('Thanks to confirm you want to start the process !'),
                'fetch_db'       => $this->l('Read images from database'),
                'processing'     => $this->l('Processing'),
                'fetch_img'      => $this->l('Read images from folders'),
                'fetch_img_from' => $this->l('Read images'),
                'compare'        => $this->l('Compare database and folders'),
                'completetxt'    => $this->l('OK'),
                'deleteuseless'  => $this->l('Delete Useless Images'),
                'notfound'       => $this->l('No useless images found ! Congratulations !'),
            ));

            return $this->display(__FILE__, 'header.tpl');
        }
    }

    public function getRating()
    {
        $stop_rating = (int)Configuration::get('GCDELETEUSELESSIMG_STOPRATING');
        if ($stop_rating != 1) {
            return $this->display(__FILE__, 'views/templates/admin/rating.tpl');
        }
    }
}
