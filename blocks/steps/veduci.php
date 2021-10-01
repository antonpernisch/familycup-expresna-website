<div class="col-md-5 text-light text-left d-none d-md-block">
    <div class="h1">Povedzte nám niečo o sebe...</div>
    <div class="mt-3 mb-5">
      <p>
        Zaujíma nás hlavne Vaše meno a vek.
      </p>
      <p>
        <i class="fas fa-info-circle text-info me-2"></i>Zadávajte iba svoje meno <strong>(bez priezviska)</strong>
      </p>
      <p>
        <i class="fas fa-info-circle text-info me-2"></i>V prípade menovníkov, <strong>použite výber napravo</strong> od políčka pre meno
      </p>
    </div>
  </div>
  <div class="col-md-7 text-left align-self-center">
    <div class="card py-3 scroll">
      <div class="card-body">
        <div class="container-fluid align-items-center">
          <div class="row d-block d-md-none">
            <div class="h1">Povedzte nám niečo o sebe...</div>
            <div class="mt-3 mb-5">
              <p>
                Zaujíma nás hlavne Vaše meno a vek.
              </p>
              <p>
                <i class="fas fa-info-circle text-info me-2"></i>Zadávajte iba svoje meno <strong>(bez priezviska)</strong>
              </p>
              <p>
                <i class="fas fa-info-circle text-info me-2"></i>V prípade menovníkov, <strong>použite výber napravo</strong> od políčka pre meno
              </p>
            </div>
          </div>
          <div class="row">
              <div class="col-9">
                <div class="form-outline">
                  <input type="text" id="leadName-input" class="form-control form-control-lg validate-this-box" />
                  <label class="form-label" for="leadName-input">Vaše meno (bez priezviska)</label>
                </div>
              </div>
              <div class="col-3 align-self-center">
                <select class="select" id="leadName-select">
                  <option value=""></option>
                  <option value=" najml.">najml.</option>
                  <option value=" ml.">ml.</option>
                  <option value=" st.">st.</option>
                  <option value=" najst.">najst.</option>
                </select>
              </div>
          </div>
          <div class="row my-3 d-flex justify-content-center">
            <div class="col-12 col-md-6">
              <div class="input-group">
                <span class="input-group-text border-0">Mám</span>
                <input type="number" class="form-control rounded validate-this-box" id="veduci-vek-Input" aria-label="Vek veducheo rodiny" />
                <span class="input-group-text border-0">rokov</span>
              </div>
            </div>
          </div>
          <div class="row mt-3 text-center">
            <div class="col">
              <button type="button" class="btn btn-outline-primary btn-rounded btn-lg nextStep-btn" id="begin-onboarding-next-btn" onclick="PassToNextStep()" data-mdb-animation-start="onLoad">OK</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <script type="text/javascript">
    let inputData = <?php echo json_encode($_GET); ?>;
    let famName = inputData.family;

    function PassToNextStep() {
        const leadName = $("#leadName-input").val() + $("#leadName-select").children("option:selected").val();
        const leadAge = $("#veduci-vek-Input").val();

        Stepper.NextStep({
            family: famName,
            lead: {
                name: leadName,
                age: leadAge
            }
        }, true);
    }

    $(document).ready(function() {
        document.title = 'FamilyCup Expresná : Vedúci rodiny (Krok 2)';
        window.onbeforeunload = function () {
          return 'POZOR! Pokúšate sa opustiť stránku aj napriek tomu, že ste súhlasili, že to nespravíte.';
        }
    });
  </script>
  
  <script type="text/javascript" src="https://storage.esec.sk/lib/mdb5/js/mdb.min.js"></script>