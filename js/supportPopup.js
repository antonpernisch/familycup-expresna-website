const min_err_hits = 5;
var ERROR_HITS = 0;
var SHOW_POPUP = true;

function AddErrHit() {
    ERROR_HITS += 1;
    if (ERROR_HITS >= min_err_hits) {
        if (SHOW_POPUP) {
            ShowSupportPopup();
        }
        ERROR_HITS = 0;
    }
}

function ShowSupportPopup() {
    let supportModalDOM = document.getElementById('modal-support');
    let supportModal = mdb.Modal.getInstance(supportModalDOM);
    supportModal.show();
}

function TurnSupportPopupOff() {
    SHOW_POPUP = false;
}

function DisposeSupportPopup() {
    let supportModalDOM = document.getElementById('modal-support');
    let supportModal = mdb.Modal.getInstance(supportModalDOM);
    supportModal.dispose();
}