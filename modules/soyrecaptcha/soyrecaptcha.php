<?php

/**
 * 2007-2025 PrestaShop
 *
 * @class Soyrecaptcha
 * @brief Módulo para integrar Google reCaptcha en PrestaShop.
 * Permite habilitar reCaptcha en varias secciones del sitio.
 * 
 * @version 1.0.0
 * @author Soy.es
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

class Soyrecaptcha extends Module
{

/**
* @var bool $config_form Configuración del formulario
*/
    protected $config_form = false;

/**
* Constructor del módulo.
* Configura el nombre, versión y el autor del módulo.
* Registra los hooks que serán utilizados.
*/

    public function __construct()
    {
        $this->name = 'soyrecaptcha';
        $this->tab = 'administration';
        $this->version = '1.0.0';
        $this->author = 'Soy.es';
        $this->need_instance = 1;

        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Google Recapctha Modular');
        $this->description = $this->l('Módulo que nos permite en que partes de la web queremos cargar el Recaptcha de Google');

        $this->confirmUninstall = $this->l('¿Estas seguro de desinstalar nuestro módulo de recaptcha?');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

/**
* Instalación del módulo.
* Registra los hooks necesarios para la funcionalidad del módulo.
*
* @return bool Estado de la instalación (true/false)
*/

    public function install()
    {

        return parent::install() &&
            $this->registerHook('header') &&
            $this->registerHook('actionCustomerRegisterSubmitCaptcha') &&
            $this->registerHook('actionContactFormSubmitBefore') &&
            $this->registerHook('displayHeader');
    }

/**
* Desinstalación del módulo.
*
* @return bool Estado de la desinstalación (true/false)
*/

    public function uninstall()
    {
        return parent::uninstall();
    }

/**
* Obtiene el contenido del módulo para ser mostrado en el backoffice.
*
* @return string HTML del formulario de configuración.
*/

    public function getContent()
    {
        if (((bool)Tools::isSubmit('submitSoyrecaptchaModule')) == true) {
            $this->postProcess();
        }

        $this->context->smarty->assign('module_dir', $this->_path);

        return $this->renderForm();
    }
/**
* Crea el formulario de configuración del módulo en el backoffice.
* Contiene varias opciones para configurar el comportamiento de reCaptcha.
*
* @return string HTML del formulario.
*/

    public function renderForm()
    {
        $fields_form = [
            'form' => [
                'legend' => [
                    'title' => $this->l(' Configuración Recaptcha Google'),
                    'icon' => 'icon-cogs',
                ],
                'tabs' => [
                    'general' => $this->l('Configuración general'),
                    'advanced' => $this->l('Parámetros avanzados'),
                ],
                'description' => $this->l('Necesitas obtener primero las llaves de acceso de Google, puedes seguir este enlace:')
                    . '<br /><a href="https://www.google.com/recaptcha/intro/index.html" target="_blank">https://www.google.com/recaptcha/intro/index.html</a>',
                'input' => [
                    [
                        'type' => 'radio',
                        'label' => $this->l('Recaptcha Version'),
                        'name' => 'CAPTCHA_VERSION',
                        'required' => true,
                        'class' => 't',
                        'values' => [
                            [
                                'id' => 'v3',
                                'value' => 3,
                                'label' => $this->l('V3'),
                            ],
                        ],
                        'tab' => 'general',
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->l('Captcha Google llave pública (Site key)'),
                        'name' => 'CAPTCHA_PUBLIC_KEY',
                        'required' => true,
                        'empty_message' => $this->l('Please fill the captcha public key'),
                        'tab' => 'general',
                    ],
                    [
                        'type' => 'text',
                        'label' => $this->l('Captcha Google llave privada (Secret key)'),
                        'name' => 'CAPTCHA_PRIVATE_KEY',
                        'required' => true,
                        'empty_message' => $this->l('Please fill the captcha private key'),
                        'tab' => 'general',
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Habilitar Capctha para formulario contacto'),
                        'name' => 'CAPTCHA_ENABLE_CONTACT',
                        'required' => true,
                        'class' => 't',
                        'is_bool' => true,
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Activo'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Desactivado'),
                            ],
                        ],
                        'tab' => 'general',
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Habilitar capctha para registro'),
                        'name' => 'CAPTCHA_ENABLE_ACCOUNT',
                        'required' => true,
                        'class' => 't',
                        'is_bool' => true,
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Activo'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Desactivado'),
                            ],
                        ],
                        'tab' => 'general',
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Habilitar capctha para checkout'),
                        'name' => 'CAPTCHA_ENABLE_CHECKOUT',
                        'required' => true,
                        'class' => 't',
                        'is_bool' => true,
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Activo'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Desactivado'),
                            ],
                        ],
                        'tab' => 'general',
                    ],
                    [
                        'type' => 'switch',
                        'label' => $this->l('Activar captcha para newsletter'),
                        'hint' => $this->l('Only availaibles in certain conditions*'),
                        'name' => 'CAPTCHA_ENABLE_NEWSLETTER',
                        'required' => true,
                        'class' => 't',
                        'is_bool' => true,
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Activo'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Desactivado'),
                            ],
                        ],
                        'tab' => 'general',
                    ],
                    [
                        'type' => 'select',
                        'label' => $this->l('Nivel de seguridad del captcha'),
                        'name' => 'CAPTCHA_SECURITY_LEVEL',
                        'required' => true,
                        'class' => 't',
                        'options' => [
                            'query' => array_map(function ($value) {
                                return ['id_option' => $value, 'name' => $value];
                            }, range(1, 8)),
                            'id' => 'id_option',
                            'name' => 'name',
                        ],
                        'desc' => $this->l('Selecciona el nivel de seguridad del captcha (1 = Bajo, 10 = Alto).'),
                        'tab' => 'general',
                    ],


                    [
                        'type' => 'switch',
                        'name' => 'CAPTCHA_LOAD_EVERYWHERE',
                        'label' => $this->l('Cargar Capctha para toda la web'),
                        'hint' => $this->l('Let this option disabled by default if you don\'t use a specific contact form'),
                        'desc' => $this->l('Habilita esta opción si utilizas elementor o formlarios que no sean por defecto los de Prestashop.'),
                        'required' => false,
                        'class' => 't',
                        'is_bool' => true,
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Activo'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Desactivado'),
                            ],
                        ],
                        'tab' => 'advanced',
                    ],
                        [
                        'type' => 'switch',
                        'name' => 'CAPTCHA_LOAD_LOGO',
                        'label' => $this->l('Ocultar logo de Google'),
                        'required' => false,
                        'class' => 't',
                        'is_bool' => true,
                        'values' => [
                            [
                                'id' => 'active_on',
                                'value' => 1,
                                'label' => $this->l('Activo'),
                            ],
                            [
                                'id' => 'active_off',
                                'value' => 0,
                                'label' => $this->l('Desactivado'),
                            ],
                        ],
                        'tab' => 'advanced',
                    ],
                    [
                        'type' => 'select',
                        'name' => 'CAPTCHA_SELECT_HOUR_START',
                        'label' => $this->l('Desactivar CAPTCHA a las:'),
                        'hint' => $this->l('Desactivar CAPTCHA a las:'),
                        'desc' => $this->l('Este campo permite seleccionar una hora del día, en la qual se desactivara el CAPTCHA.'),
                        'required' => false,
                        'class' => 't',
                        'options' => [
                            'query' => [
	                            ['value' => 'Siempre activo', 'label' => 'Siempre activo'],
                                ['value' => '00:00', 'label' => '00:00'],
                                ['value' => '01:00', 'label' => '01:00'],
                                ['value' => '02:00', 'label' => '02:00'],
                                ['value' => '03:00', 'label' => '03:00'],
                                ['value' => '04:00', 'label' => '04:00'],
                                ['value' => '05:00', 'label' => '05:00'],
                                ['value' => '06:00', 'label' => '06:00'],
                                ['value' => '07:00', 'label' => '07:00'],
                                ['value' => '08:00', 'label' => '08:00'],
                                ['value' => '09:00', 'label' => '09:00'],
                                ['value' => '10:00', 'label' => '10:00'],
                                ['value' => '11:00', 'label' => '11:00'],
                                ['value' => '12:00', 'label' => '12:00'],
                                ['value' => '13:00', 'label' => '13:00'],
                                ['value' => '14:00', 'label' => '14:00'],
                                ['value' => '15:00', 'label' => '15:00'],
                                ['value' => '16:00', 'label' => '16:00'],
                                ['value' => '17:00', 'label' => '17:00'],
                                ['value' => '18:00', 'label' => '18:00'],
                                ['value' => '19:00', 'label' => '19:00'],
                                ['value' => '20:00', 'label' => '20:00'],
                                ['value' => '21:00', 'label' => '21:00'],
                                ['value' => '22:00', 'label' => '22:00'],
                                ['value' => '23:00', 'label' => '23:00'],
                            ],
                            'id' => 'value',
                            'name' => 'label'
                        ],
                        'tab' => 'advanced',
                    ],
                          [
                        'type' => 'select',
                        'name' => 'CAPTCHA_SELECT_HOUR_END',
                        'label' => $this->l('Activar CAPTCHA a las:'),
                        'hint' => $this->l('Selecciona la hora deseada'),
                        'desc' => $this->l('Este campo permite seleccionar una hora del día, en la qual se volverá a activar el CAPTCHA.'),
                        'required' => false,
                        'class' => 't',
                        'options' => [
                            'query' => [
	                            ['value' => 'Siempre activo', 'label' => 'Siempre activo'],
                                ['value' => '00:00', 'label' => '00:00'],
                                ['value' => '01:00', 'label' => '01:00'],
                                ['value' => '02:00', 'label' => '02:00'],
                                ['value' => '03:00', 'label' => '03:00'],
                                ['value' => '04:00', 'label' => '04:00'],
                                ['value' => '05:00', 'label' => '05:00'],
                                ['value' => '06:00', 'label' => '06:00'],
                                ['value' => '07:00', 'label' => '07:00'],
                                ['value' => '08:00', 'label' => '08:00'],
                                ['value' => '09:00', 'label' => '09:00'],
                                ['value' => '10:00', 'label' => '10:00'],
                                ['value' => '11:00', 'label' => '11:00'],
                                ['value' => '12:00', 'label' => '12:00'],
                                ['value' => '13:00', 'label' => '13:00'],
                                ['value' => '14:00', 'label' => '14:00'],
                                ['value' => '15:00', 'label' => '15:00'],
                                ['value' => '16:00', 'label' => '16:00'],
                                ['value' => '17:00', 'label' => '17:00'],
                                ['value' => '18:00', 'label' => '18:00'],
                                ['value' => '19:00', 'label' => '19:00'],
                                ['value' => '20:00', 'label' => '20:00'],
                                ['value' => '21:00', 'label' => '21:00'],
                                ['value' => '22:00', 'label' => '22:00'],
                                ['value' => '23:00', 'label' => '23:00'],
                            ],
                            'id' => 'value',
                            'name' => 'label'
                        ],
                        'tab' => 'advanced',
                    ]
                    
                ],
                'submit' => [
                    'title' => $this->l('Guardar'),
                    'class' => 'button btn btn-default pull-right',
                ],
            ],
        ];

        $helper = new HelperForm();

        $helper->show_toolbar = false;
        $helper->table = $this->table;
        $helper->module = $this;
        $helper->default_form_language = $this->context->language->id;
        $helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG', 0);

        $helper->identifier = $this->identifier;
        $helper->submit_action = 'submitSoyrecaptchaModule';
        $helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false)
            . '&configure=' . $this->name . '&tab_module=' . $this->tab . '&module_name=' . $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');

        $helper->tpl_vars = array(
            'fields_value' => $this->getConfigFormValues(), 
            'languages' => $this->context->controller->getLanguages(),
            'id_language' => $this->context->language->id,
        );

        return $helper->generateForm([$fields_form]);
    }


/**
* Obtiene los valores actuales de la configuración del módulo.
*
* @return array Valores de configuración.
*/

    protected function getConfigFormValues()
    {
        return array(
            'CAPTCHA_VERSION' => Configuration::get('CAPTCHA_VERSION'),
            'CAPTCHA_PRIVATE_KEY' => Configuration::get('CAPTCHA_PRIVATE_KEY'),
            'CAPTCHA_PUBLIC_KEY' => Configuration::get('CAPTCHA_PUBLIC_KEY'),
            'CAPTCHA_ENABLE_ACCOUNT' => Configuration::get('CAPTCHA_ENABLE_ACCOUNT'),
            'CAPTCHA_ENABLE_CONTACT' => Configuration::get('CAPTCHA_ENABLE_CONTACT'),
            'CAPTCHA_ENABLE_NEWSLETTER' => Configuration::get('CAPTCHA_ENABLE_NEWSLETTER'),
            'CAPTCHA_THEME' => Configuration::get('CAPTCHA_THEME'),
            'CAPTCHA_LOAD_EVERYWHERE' => Configuration::get('CAPTCHA_LOAD_EVERYWHERE'),
            'CAPTCHA_SECURITY_LEVEL' => Configuration::get('CAPTCHA_SECURITY_LEVEL'),
            'CAPTCHA_ENABLE_CHECKOUT' => Configuration::get('CAPTCHA_ENABLE_CHECKOUT'),
            'CAPTCHA_SELECT_HOUR_START' => Configuration::get('CAPTCHA_SELECT_HOUR_START'),
            'CAPTCHA_SELECT_HOUR_END' => Configuration::get('CAPTCHA_SELECT_HOUR_END'),
            'CAPTCHA_LOAD_LOGO' => Configuration::get('CAPTCHA_LOAD_LOGO')
        );
    }


/**
* Procesa y guarda los valores del formulario.
*/

    protected function postProcess()
    {
        $form_values = $this->getConfigFormValues();

        foreach (array_keys($form_values) as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
    }

/**
* Hook para agregar el script de reCaptcha al header de la página.
* Carga los scripts y estilos necesarios según las configuraciones.
*/

    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path . 'views/js/soycaptcha_insert.js');
        $this->context->controller->addCSS($this->_path . 'views/css/front.css');
        $current_controller = get_class($this->context->controller);

        /*Comprobamos si el CAPTCha esta activo en la hora configurada*/ 
        
        $periodActiveCaptcha = (Configuration::get('CAPTCHA_SELECT_HOUR_START') . '-' . Configuration::get('CAPTCHA_SELECT_HOUR_END'));
        list($startTime, $endTime) = explode('-', $periodActiveCaptcha);
        $currentTime = date('H:i');
        
        if(Configuration::get('CAPTCHA_LOAD_LOGO')){
	             $this->context->controller->addCSS($this->_path . 'views/css/display.css');
        }

        if ($currentTime < $startTime || $currentTime > $endTime) { //Comprobamos cargar las paginas correctas
            if (Configuration::get('CAPTCHA_LOAD_EVERYWHERE') == 1) {
                return $this->renderHeaderV3();
            }
            if (Configuration::get('CAPTCHA_ENABLE_NEWSLETTER') == 1) {
                return $this->renderHeaderV3();
            }
            if (Configuration::get('CAPTCHA_ENABLE_CONTACT') == 1 && $current_controller == 'ContactController') {
                return $this->renderHeaderV3();
            }
            if (Configuration::get('CAPTCHA_ENABLE_ACCOUNT') == 1 && $current_controller == 'RegistrationController') {
                return $this->renderHeaderV3();
            }
            if (Configuration::get('CAPTCHA_ENABLE_CHECKOUT') == 1 && $current_controller == 'OrderController') {
                return $this->renderHeaderV3();
            }
        }
     
    }

/**
* Renderiza el script de Google reCaptcha V3.
* Este script es necesario para cargar el captcha en el frontend.
*
* @return string Script HTML con el token de reCaptcha.
*/

    public function renderHeaderV3()
    {

        $publicKey = Configuration::get('CAPTCHA_PUBLIC_KEY');
        $js = '
            <script src="https://www.google.com/recaptcha/api.js?render=' . $publicKey . '"></script>
            <script>
                grecaptcha.ready(function () {
                    grecaptcha.execute("' . $publicKey . '", {action: "contact"}).then(function (token) {
                        var recaptchaResponse = document.getElementById("captcha-box");
                        recaptchaResponse.value = token;
                        });
                    });
            </script>';

        return $js;
    }

/**
* Hook para validar el captcha en el formulario de registro de cliente.
*
* @param array $params Parámetros del hook.
* @return bool Resultado de la validación del captcha.
*/

    public function hookActionCustomerRegisterSubmitCaptcha(array $params)
    {
        return $this->validateCaptcha();
    }

    public function hookActionContactFormSubmitBefore($params)
    {
        return $this->validateCaptcha();
    }


    public function validateCaptcha()
    {
        $security_level =  Configuration::get('CAPTCHA_SECURITY_LEVEL');
        $security_level = $security_level / 10;

        if (!Tools::getValue('g-recaptcha-response')) {
            $this->context->controller->errors[] = $this->l('Por favor, completa el captcha.');
            return;
        }

        $recaptchaSecret = Configuration::get('CAPTCHA_PRIVATE_KEY');
        $response = Tools::file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecret&response=" . Tools::getValue('g-recaptcha-response'));
        $responseKeys = json_decode($response, true);

        if ((isset($responseKeys["score"]) && $responseKeys["score"] < $security_level) || !$responseKeys["success"]) {

            $current_controller = get_class($this->context->controller);

            if ($current_controller == 'ContactController') {
                $this->context->controller->errors[] = $this->l('🤖¡Vaya parece que tenemos un bot entre nosotros! El captcha es inválido.');
            } else {
                $this->context->controller->errors[] = ('<div class="captcha-error-container">
                                                        <div class="captcha-error-icon">🤖</div>
                                                        <div class="captcha-error-message">
                                                            <h2>Verificación de seguridad no completada</h2>
                                                            <p>No pudimos validar la autenticidad de la solicitud. Por favor, inténtalo nuevamente para continuar con el proceso de forma segura.</p>
                                                        </div>
                                                    </div>');
            }

            return false;

        } else {
            return true;
        }
    }
}
