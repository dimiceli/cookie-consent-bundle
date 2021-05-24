document.addEventListener("DOMContentLoaded", function() {
    var cookieConsentForm = document.forms['cookie_consent'];
    var cookieConsentFormButtonAccept = document.getElementById('dm-cookie-consent-button-accept');
    var cookieConsentFormContainer = document.getElementById('dm-cookie-consent-container');
    var cookieConsentHttpRequest = new XMLHttpRequest();
    if (!cookieConsentHttpRequest) {
        console.error('XMLHttpRequest not created');
        hideCookieConsentForm();
        return false;
    }

    cookieConsentFormButtonAccept.addEventListener('click', function(event) {
        event.preventDefault();
        console.log('clicked');
        console.log('action ' + cookieConsentForm.getAttribute('action'));

        let action = cookieConsentForm.getAttribute('action');

        cookieConsentHttpRequest.onreadystatechange = cookieConsentCallback;
        cookieConsentHttpRequest.open('POST', action);
        cookieConsentHttpRequest.send();

        hideCookieConsentForm();
    });

    function cookieConsentCallback()
    {
        if (cookieConsentHttpRequest.readyState === XMLHttpRequest.DONE) {
            if (cookieConsentHttpRequest.status === 200) {
                console.log('Cookie consent saved');
            } else {
                console.log('Cookie consent failed to save');
            }
        }
        hideCookieConsentForm();
    }

    function hideCookieConsentForm() {
        cookieConsentFormContainer.hidden = true;
    }
});
