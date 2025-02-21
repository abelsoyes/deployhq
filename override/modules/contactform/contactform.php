<?php
class ContactformOverride extends Contactform
{
    public function sendMessage()
    {
        die();
        Hook::exec('actionContactFormSubmitBefore');
        if (!sizeof($this->context->controller->errors)) {
            parent::sendMessage();
        }
    }
}
