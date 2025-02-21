<?php

class OrderController extends OrderControllerCore
{
    public function postProcess()
    {
        if (
            Tools::isSubmit('submitCreate')
            && Module::isInstalled('soyrecaptcha')
            && Module::isEnabled('soyrecaptcha')
            && false === Module::getInstanceByName('soyrecaptcha')->hookActionCustomerRegisterSubmitCaptcha([])
            && !empty($this->errors)
        ) {
            unset($_POST['submitCreate']);
        }
        parent::postProcess();
    }
}
