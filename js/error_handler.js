function DisplayFatal( message ) {
  $("#modal-error-pre").html(message);
  let myModalEl = document.getElementById('modal-error');
  let modal = new mdb.Modal(myModalEl);
  modal.show();
}