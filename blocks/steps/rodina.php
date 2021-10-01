<div class="col-md-5 text-light text-left d-none d-md-block">
  <div class="h1">Priezvisko Vašej rodiny?</div>
  <div class="mt-3 mb-5">
      <p>
        Napr. ak sa voláte Janko Jablčný, tu napíšte <strong>Jablčných</strong>.
      </p>
      <p>
        <i class="fas fa-info-circle text-info me-2"></i>Chceme teda tvar priezviska Vašej rodiny s príponou <strong>-ových</strong> alebo <strong>-ných</strong>
      </p>
  </div>
</div>
<div class="col-md-7 text-left align-self-center">
  <div class="card py-3 scroll">
    <div class="card-body">
      <div class="container-fluid align-items-center">
        <div class="row d-block d-md-none">
            <div class="h1">Priezvisko Vašej rodiny?</div>
            <div class="mt-3 mb-5">
                <p>
                  Napr. ak sa voláte Janko Jablčný, tu napíšte <strong>Jablčných</strong>.
                </p>
                <p>
                  <i class="fas fa-info-circle text-info me-2"></i>Chceme teda tvar priezviska Vašej rodiny s príponou <strong>-ových</strong> alebo <strong>-ných</strong>
                </p>
            </div>
        </div>
        <div class="row">
          <div class="form-outline">
            <input type="text" id="familyInput" class="form-control form-control-lg validate-this-box"/>
            <label class="form-label" for="familyInput">Rodina...</label>
          </div>
        </div>
        <div class="row mt-3 text-center">
          <div class="col">
            <button type="submit" class="btn btn-outline-primary btn-rounded btn-lg nextStep-btn" id="begin-onboarding-next-btn" onclick="ProceedToNext()" data-mdb-animation-start="onLoad">Mám to<i class="fas fa-check ms-2"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
      document.title = 'FamilyCup Expresná : Priezvisko (Krok 1)';
      window.onbeforeunload = function () {
        return 'POZOR! Pokúšate sa opustiť stránku aj napriek tomu, že ste súhlasili, že to nespravíte.';
      };
  });
  function ProceedToNext() {
      const famInputText = $('#familyInput').val();
      const matchReg = /^([\p{L}-]+)(ových|ných|cích)$/gu;
      if( famInputText.match(matchReg) ) {
          Stepper.NextStep({ family: famInputText }, true);
      } else {
          AddErrHit();
          const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-invalidPriez'));
          staticInstance.show();
      }
  }
</script>

<script type="text/javascript" src="https://storage.esec.sk/lib/mdb5/js/mdb.min.js"></script>