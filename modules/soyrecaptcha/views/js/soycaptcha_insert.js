/**
 *
 * Recaptcha V3 Only
 *
 * This script add dynamically a new input hidden at the end of the contact form
 * The captcha is render inside this div by Recaptcha V3
 * If needed you can change the selector by overriding this file in your theme
 */
$(document).ready(function () {
   
    $('#login-form').append('<input type="hidden" id="captcha-box" value="" name="g-recaptcha-response">');
    $('.contact-form form').append('<input type="hidden" id="captcha-box" value="" name="g-recaptcha-response">');
        $('#customer-form').append('<input type="hidden" id="captcha-box" value="" name="g-recaptcha-response">');
$('#blockEmailSubscription_displayFooterBefore form').append(
        '<input type="hidden" id="captcha-box" value="" name="g-recaptcha-response">'
    );    
});

$(document).ready(function() {
    $('#customer-form').on('submit', function(e) {
        // Validación del captcha
        if (!isCaptchaValid()) {
            e.preventDefault(); // Evita el envío si el captcha no es válido
            alert("Por favor, valida el captcha.");
        }
    });
});

function isCaptchaValid() {
    // Lógica para verificar el captcha (según el módulo soyrecaptcha)
    return grecaptcha && grecaptcha.getResponse(); // O según la API de soyrecaptcha
}