var _timeout = (10 * 60) * 1000;
var _afterModalTimeout = 30 * 1000
var _sessionRenewed = 0;
showModalTimeout(_timeout);

// alert('imported');

function showModalTimeout(timeout) {
    setTimeout('showModal()', timeout);
}

function showModal() {
    $('#inactivityModal').modal('show');
    _sessionRenewed = 0;
}

function goBack() {
    renewSession();
    showModalTimeout(_timeout);
    _sessionRenewed = 1;
}

function renewSession() {
    var ajaxurl = '/gr4/renewsession';
    $.post(ajaxurl, function (response) {
    });
}

function inactivityLogout() {
    if (_sessionRenewed === 0) {
        $('#inactivityModal').modal('hide');
        window.location.href = "/gr4/inactivity";
    }
}

$(document).ready(function () {
    $("#inactivityModal").on('shown.bs.modal', function (event) {
        // not setting focus to submit button
        setTimeout('inactivityLogout()', _afterModalTimeout);
    });
});

$(document).ready(function () {
    $("#inactivityModal").on('hide.bs.modal', function (event) {
        // not setting focus to submit button
        goBack();
    });
});
