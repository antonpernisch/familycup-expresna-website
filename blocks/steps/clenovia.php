<style>
    .slot-card {
        height: 120px;
        width: 140px;
        padding: 12px;
    }
    .slot-card.unpopulated {
        opacity: .3;
        border-radius: 6px;
        border: 1px dashed black;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all .6s;
    }
    .slot-card.unpopulated:hover {
        opacity: 1;
    }
    .slot-card.unpopulated:hover .slot-add-icon {
        font-size: 36px;
    }
    .slot-card.populated {
        border-radius: 8px;
        box-shadow: 2px 2px 14px 1px rgba(0,0,0,0.1);
        position: relative;
    }
    .slot-add-icon {
        font-size: 30px;
        transition: all .4s;
    }
    .remove-slot-btn {
        position: absolute;
        top: 4px;
        right: 6px;
        color: #e74c3c;
        font-size: 14px;
        z-index: 10;
        cursor: pointer;
    }
</style>

<div class="col-md-5 text-light text-left d-none d-md-block">
  <div class="h1">Kto bude za vašu rodinu pretekať?</div>
  <div class="mt-3 mb-5">
      <p>
        Viac členov môžete pridať neskôr vo FamilyCup účte.
      </p>
      <p>
        <i class="fas fa-info-circle text-info me-2"></i>V prípdade menovníkov použite najml., ml., st. alebo najst. za menom.
      </p>
      <p>
        <i class="fas fa-info-circle text-info me-2"></i>Pridaním záznamu automaticky člen súhlasí so spracúvaním osobných údajov.
      </p>
  </div>
</div>
<div class="col-md-7 text-left align-self-center">
  <div class="card py-3 scroll">
    <div class="card-body">
      <div class="container-fluid align-items-center">
        <div class="row d-block d-md-none">
            <div class="h1">Kto bude za vašu rodinu pretekať?</div>
            <div class="mt-3 mb-5">
                <p>
                    Viac členov môžete pridať neskôr vo FamilyCup účte.
                </p>
                <p>
                  <i class="fas fa-info-circle text-info me-2"></i>Pridaním záznamu automaticky člen súhlasí so spracúvaním osobných údajov.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="row slots mb-3">
                    <div class="col-6 col-md-4 d-flex justify-content-center align-items-center mb-2 mb-md-4" id="slot-1" style="padding: 0 !important;">
                        <div class="slot-card unpopulated" onclick="HandleAdd(1)">
                            <div class="slot-add-icon"><i class="fas fa-plus"></i></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 d-flex justify-content-center align-items-center mb-2 mb-md-4" id="slot-2" style="padding: 0 !important;">
                        <div class="slot-card unpopulated" onclick="HandleAdd(2)">
                            <div class="slot-add-icon"><i class="fas fa-plus"></i></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 d-flex justify-content-center align-items-center mb-2 mb-md-4" id="slot-3" style="padding: 0 !important;">
                        <div class="slot-card unpopulated" onclick="HandleAdd(3)">
                            <div class="slot-add-icon"><i class="fas fa-plus"></i></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 d-flex justify-content-center align-items-center" id="slot-4" style="padding: 0 !important;">
                        <div class="slot-card unpopulated" onclick="HandleAdd(4)">
                            <div class="slot-add-icon"><i class="fas fa-plus"></i></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 d-flex justify-content-center align-items-center" id="slot-5" style="padding: 0 !important;">
                        <div class="slot-card unpopulated" onclick="HandleAdd(5)">
                            <div class="slot-add-icon"><i class="fas fa-plus"></i></div>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 d-flex justify-content-center align-items-center" id="slot-6" style="padding: 0 !important;">
                        <div class="slot-card unpopulated" onclick="HandleAdd(6)">
                            <div class="slot-add-icon"><i class="fas fa-plus"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 text-center">
          <div class="col">
            <button type="submit" class="btn btn-outline-primary btn-rounded btn-lg nextStep-btn" onclick="PassToNextStep();" data-mdb-animation-start="onLoad">Pokračuj<i class="fas fa-check ms-2"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    inputData = <?php echo json_encode($_GET); ?>;
    var members = inputData.members;

    function PassToNextStep() {
        var outputData = [];
        if( $(".slot-card.populated").length === 0 ) {
            AddErrHit();
            const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-emptyData'));
            staticInstance.show();
            return;
        }
        $(".slot-card.populated").each( function(index) {
            const name = $(this).find(".user-input-name").val();
            const age = $(this).find(".user-input-age").val();
            outputData.push({ name, age });
        });
        inputData.members = outputData;
        Stepper.NextStep(inputData, true);
    }

    function HandleAdd(slot) {
        $(`#slot-${slot}`).html(`
            <div class="slot-card populated" id="slot-card-${slot}">
                <span class="remove-slot-btn" onclick="HandleRemove(${slot})"><i class="fas fa-trash-alt"></i></span>
                <div class="d-flex flex-column m-1">
                    <div class="form-outline mt-2">
                        <input type="text" id="slot-${slot}-input-name" class="form-control validate-this-box user-input-name"/>
                        <label class="form-label" for="slot-${slot}-input-name">Meno...</label>
                    </div>
                    <div class="form-outline mt-2">
                        <input type="number" id="slot-${slot}-input-age" class="form-control validate-this-box user-input-age"/>
                        <label class="form-label" for="slot-${slot}-input-age">Vek...</label>
                    </div>
                </div>
            </div>
        `);
        const animType = slot <= 3 ? "down" : "up";
        Animation.Do( `#slot-card-${slot}`, `fade-in-${animType}` );
        document.querySelectorAll('.form-outline').forEach((formOutline) => {
            new mdb.Input(formOutline).init();
        });
    }

    function HandleRemove(slot) {
        const animType = slot <= 3 ? "up" : "down";
        Animation.Do( `#slot-card-${slot}`, `fade-out-${animType}`, () => {
            $(`#slot-${slot}`).html(`
                <div class="slot-card unpopulated" onclick="HandleAdd(${slot})" id="slot-card-${slot}">
                    <div class="slot-add-icon"><i class="fas fa-plus"></i></div>
                </div>
            `);
            Animation.Do( `#slot-card-${slot}`, "zoom-in" );
        } );
    }

    $(document).ready(function() {
        document.title = 'FamilyCup Expresná : Členovia rodiny (Krok 3)';
        window.onbeforeunload = function () {
            return 'POZOR! Pokúšate sa opustiť stránku aj napriek tomu, že ste súhlasili, že to nespravíte.';
        };
    });
</script>

<script type="text/javascript" src="https://storage.esec.sk/lib/mdb5/js/mdb.min.js" defer></script>