<div class="col-md-5 text-light text-left d-none d-md-block">
  <div class="h1">Aký je Váš e-mail?</div>
  <div class="mt-3 mb-5">
      <p>
        Na tento e-mail Vám odošleme všetky potrebné informácie po dokončení tejto registrácie. Tam Vám príde aj dočasné heslo.
      </p>
      <p>
        <i class="fas fa-info-circle text-info me-2"></i>Váš e-mail <strong>s nikým nezdieľame</strong>
      </p>
  </div>
</div>
<div class="col-md-7 text-left align-self-center">
  <div class="card py-3 scroll">
    <div class="card-body">
      <div class="container-fluid align-items-center">
        <div class="row d-block d-md-none">
            <div class="h1">Aký je Váš e-mail?</div>
            <div class="mt-3 mb-5">
                <p>
                    Na tento e-mail Vám odošleme všetky potrebné informácie po dokončení tejto registrácie. Tam Vám príde aj dočasné heslo.
                </p>
                <p>
                    <i class="fas fa-info-circle text-info me-2"></i>Váš e-mail <strong>s nikým nezdieľame</strong>
                </p>
            </div>
        </div>
        <div class="row">
          <div class="form-outline">
            <input type="email" id="emailInput" class="form-control form-control-lg validate-this-box"/>
            <label class="form-label" for="emailInput">E-mail...</label>
          </div>
        </div>
        <div class="row mt-3 text-center">
          <div class="col">
            <button type="submit" class="btn btn-outline-primary btn-rounded btn-lg nextStep-btn" onclick="ProceedToNext()" data-mdb-animation-start="onLoad">Prejsť na rekapituláciu<i class="fas fa-check ms-2"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    inputData = <?php echo json_encode($_GET); ?>;

    $(document).ready(function() {
        document.title = 'FamilyCup Expresná : E-mail (Krok 5)';
        window.onbeforeunload = function () {
            return 'POZOR! Pokúšate sa opustiť stránku aj napriek tomu, že ste súhlasili, že to nespravíte.';
        };
    });
    function ProceedToNext() {
        const mailInputText = $('#emailInput').val();
        const matchReg = /(?:[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/gu;
        if( mailInputText.match(matchReg) ) {
            inputData.mail = mailInputText;
            Stepper.NextStep(inputData, true);
        } else {
            AddErrHit();
            const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-invalidEmail'));
            staticInstance.show();
        }
    }
</script>

<script type="text/javascript" src="https://storage.esec.sk/lib/mdb5/js/mdb.min.js"></script>