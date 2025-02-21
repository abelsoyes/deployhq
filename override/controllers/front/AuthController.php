<?php

class LoginController extends LoginControllerCore
{
    public function initContent()
    {
        if (Tools::isSubmit('create_account')) {
            return $this->redirectWithNotifications('registration');
        }

        $should_redirect = false;

        $login_form = $this->makeLoginForm()->fillWith(
            Tools::getAllValues()
        );

        // Validación CAPTCHA antes de procesar el login
        if (Tools::isSubmit('submitLogin')) {
            if (Configuration::get('CAPTCHA_ENABLE_LOGIN') == 1) {
                Hook::exec('actionCustomerLoginSubmitCaptcha');
            }

            // Procesar login solo si no hay errores de CAPTCHA
            if (!sizeof($this->context->controller->errors) && $login_form->submit()) {
                $should_redirect = true;
            } else {
                // Recargar formulario con errores
                $this->context->smarty->assign([
                    'login_form' => $login_form->getProxy(),
                ]);
                $this->setTemplate('customer/authentication');
                FrontController::initContent();
                return;
            }
        }

        $this->context->smarty->assign([
            'login_form' => $login_form->getProxy(),
        ]);
        $this->setTemplate('customer/authentication');

        parent::initContent();

        if ($should_redirect && !$this->ajax) {
            $back = rawurldecode(Tools::getValue('back'));

            if (Tools::urlBelongsToShop($back)) {
                return $this->redirectWithNotifications($back);
            }

            if ($this->authRedirection) {
                return $this->redirectWithNotifications($this->authRedirection);
            }

            return $this->redirectWithNotifications(__PS_BASE_URI__);
        }
    }
}
