<style>
    .crew-item {
        cursor: default;
    }
    .crew-item .h5 {
        color: initial;
    }
    .selected-crew {
        transition: all .6s;
    }
    .selected-crew .h5 {
        transition: all .6s;
        color: #1266F1;
    }
    .arrow-svg {
        width: 100%;
        height: auto;
        opacity: 0;
    }
</style>

<div class="col-md-5 text-light text-left d-none d-md-block">
<div class="h1">V akých kategóriách?</div>
<div class="mt-3 mb-5">
    <p>
        Vytvorte štartovnú listinu Vašej rodiny.
    </p>
    <p>
        <i class="fas fa-info-circle text-info me-2"></i>Ak ste v nejakom mene spravili preklep, nevadí. Prihláste pretekára aj s preklepom a na konci registrácie to budete mať možnosť napraviť.
    </p>
</div>
</div>
<div class="col-md-7 text-left align-self-center">
<div class="card py-3 scroll">
  <div class="card-body">
    <div class="container-fluid align-items-center">
      <div class="row d-block d-md-none">
          <div class="h1">V akých kategóriách?</div>
          <div class="mt-3 mb-5">
              <p>
                Vytvorte štartovnú listinu Vašej rodiny.
              </p>
              <p>
                <i class="fas fa-info-circle text-info me-2"></i>Ak ste v nejakom mene spravili preklep, nevadí. Prihláste pretekára aj s preklepom a na konci registrácie to budete mať možnosť napraviť.
              </p>
          </div>
      </div>
      <div class="row w-100">
            <div class="container-fluid w-100">
                <div class="row">
                    <div class="col-1">
                        <img src="inc/arrow.svg" alt="arrow" class="arrow-svg">
                    </div>
                    <div class="col-11">
                        <div class="row d-flex align-items-center">
                            <div class="col-3">
                                <h6>Pridajte kategóriu:</h6>
                            </div>
                            <div class="col-7">
                                <div id="categ-select">
                                    <optgroup label="Dvoj-posádkové">
                                        <option value="k2_rodicia">K2 rodičia</option>
                                        <option value="k2_rodiciaDeti">K2 rodičia + deti</option>
                                        <option value="c2_rodicia">C2 rodičia</option>
                                        <option value="c2_rodiciaDeti">C2 rodičia + deti</option>
                                        <option value="k2_krpciMedium">K2 krpci/medium</option>
                                    </optgroup>
                                    <optgroup label="Jedno-posádkové">
                                        <option value="p1_rodicia">P1 rodičia</option>
                                        <option value="s1_rodicia">S1 rodičia</option>
                                        <option value="k1_krpci">K1 krpci</option>
                                        <option value="k1bp_rodiciaDeti">K1BP rodičia/deti</option>
                                        <option value="k1_medium">K1 medium</option>
                                    </optgroup>
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary btn-floating" onclick="_CreateCrew()">
                                    <i class="fas fa-plus" title="Pridať"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row d-flex flex-row align-items-center justify-content-center my-3">
                            <div class="col-5"><hr></div>
                            <div class="col-2 text-center"><i class="fas fa-angle-down fa-2x text-primary"></i></div>
                            <div class="col-5"><hr></div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <h6>Nastavte pretekárov:</h6>
                            </div>
                            <div class="col-9 d-flex align-items-center" id="crew-setup">
                                <small class="text-muted">Zatiaľ nevybraná žiadna posádka.</small>
                            </div>
                        </div>
                        <div class="row d-flex flex-row align-items-center justify-content-center my-3">
                            <div class="col-5"><hr></div>
                            <div class="col-2 text-center"><i class="fas fa-angle-down fa-2x text-primary"></i></div>
                            <div class="col-5"><hr></div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <h6>Celá Vaša listina:</h6>
                            </div>
                            <div class="col-9" id="all-crews-list"></div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
      <div class="row mt-3 text-center">
        <div class="col">
          <button type="submit" class="btn btn-outline-primary btn-rounded btn-lg nextStep-btn" onclick="PassToNextStep();" data-mdb-animation-start="onLoad">Všetky posádky prihlásené, ďalej<i class="fas fa-check ms-2"></i></button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
    var duoCategs = ["k2_rodicia", "k2_rodiciaDeti", "c2_rodicia", "c2_rodiciaDeti", "k2_krpciMedium"];
    const onlyKidCategs = ["k1_krpci", "k1_medium", "k2_krpciMedium"];
    const mixedCategs = ["k2_rodiciaDeti", "c2_rodiciaDeti", "k1bp_rodiciaDeti"];
    var references = [];
    const adultThreshold = 18;
    console.log("point");
    
    inputData = <?php echo json_encode($_GET); ?>;
    members = inputData.members;
    
    var thisData = inputData;
    thisData.crews = {};

    function PharseSlug(categ) {
        switch( categ ) {
            case "k2_rodicia":
                return "K2 rodičia";
            case "k2_rodiciaDeti":
                return "K2 rodičia + deti";
            case "c2_rodicia":
                return "C2 rodičia";
            case "c2_rodiciaDeti":
                return "C2 rodičia + deti";
            case "k2_krpciMedium":
                return "K2 krpci/medium";
            case "p1_rodicia":
                return "P1 rodičia";
            case "s1_rodicia":
                return "S1 rodičia";
            case "k1_krpci":
                return "K1 krpci";
            case "k1bp_rodiciaDeti":
                return "K1BP rodičia/deti";
            case "k1_medium":
                return "K1 medium";
        }
    }

    function PharseCateg(categ) {
        switch( categ ) {
            case "K2 rodičia":
                return "k2_rodicia";
            case "K2 rodičia + deti":
                return "k2_rodiciaDeti";
            case "C2 rodičia":
                return "c2_rodicia";
            case "C2 rodičia + deti":
                return "c2_rodiciaDeti";
            case "K2 krpci/medium":
                return "k2_krpciMedium";
            case "P1 rodičia":
                return "p1_rodicia";
            case "S1 rodičia":
                return "s1_rodicia";
            case "K1 krpci":
                return "k1_krpci";
            case "K1BP rodičia/deti":
                return "k1bp_rodiciaDeti";
            case "K1 medium":
                return "k1_medium";
        }
    }

    function _CreateCrew() {
        const categ = $("#categ-select").children("optgroup").children("option:selected").val();
        if( typeof categ === "undefined" ) {
            AddErrHit();
            const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-notSelected'));
            staticInstance.show();
            return;
        }
        var max = 0;
        for (var property in thisData.crews) {
            max = (max < parseInt(property)) ? parseInt(property) : max;
        }
        const dataIndex = max + 1;
        thisData.crews[dataIndex] = {
            duo: duoCategs.includes(categ),
            categ: categ,
            pretekar1: "",
            pretekar2: ""
        }
        const thisRef = $("#all-crews-list").append(`
            <div class="crew-item mb-2">
                <span class="h5">${PharseSlug(categ)}</span>
                <span class="crew-members"><span class="crew-member-1"></span><span class="crew-member-2"></span></span>
                <span class="ms-2">
                    <i class="fas fa-pencil-alt text-muted" style="cursor:pointer;" onclick="SetCurrentCrew($(this.parentElement.parentElement), '${categ}', '${dataIndex}', false)"></i>
                    <i class="far fa-trash-alt text-danger ms-1" style="cursor:pointer;" onclick="RemoveCrew($(this.parentElement.parentElement), '${dataIndex}')"></i>
                </span>
            </div>
        `);
        SetCurrentCrew(thisRef.children("div:last-child"), categ, dataIndex);
    }

    function SetCurrentCrew(ref, categSlug, dataIndex, animateH=true) {
        $(".crew-item").removeClass("selected-crew");
        ref.addClass("selected-crew");
        if( animateH ) {
            var el = ref,
                curHeight = 0,
                autoHeight = el.css('height', 'auto').height();
            el.height(curHeight).animate({height: autoHeight}, 200);
        }
        var sel1 = thisData.crews[dataIndex].pretekar1 === "" ? false : parseInt(thisData.crews[dataIndex].pretekar1);
        var sel2 = thisData.crews[dataIndex].pretekar2 === "" ? false : parseInt(thisData.crews[dataIndex].pretekar2);
        var elRefIndex = references.push(ref) - 1;
        if( duoCategs.includes(categSlug) ) {
            $("#crew-setup").html(`
                <select class="select" id="crew1-sel" onchange="_UpdateSelectedCrewDuo(this, ${elRefIndex}, 1, '${categSlug}', '${dataIndex}')">
                    ${IterateOptionsForMembers(sel1)}
                </select>
                <span class="h5 text-muted mx-3">&</span>
                <select class="select" id="crew2-sel" onchange="_UpdateSelectedCrewDuo(this, ${elRefIndex}, 2, '${categSlug}', '${dataIndex}')">
                    ${IterateOptionsForMembers(sel2)}
                </select>
            `);
            const selectEl1 = document.getElementById('crew1-sel');
            const select1 = new mdb.Select(selectEl1);
            const selectEl2 = document.getElementById('crew2-sel');
            const select2 = new mdb.Select(selectEl2);
        } else {
            $("#crew-setup").html(`
                <select class="select" id="crew1-sel" onchange="_UpdateSelectedCrewOne(this, ${elRefIndex}, '${categSlug}', '${dataIndex}')">
                    ${IterateOptionsForMembers(sel1)}
                </select>
            `);
            const selectEl1 = document.getElementById('crew1-sel');
            const select1 = new mdb.Select(selectEl1);
        }
    }

    function _UpdateSelectedCrewOne(selRef, elRefIndex, categSlug, dataIndex=-1) {
        const selectedVal = $(selRef).children("option:selected").val();
        const selectedText = $(selRef).children("option:selected").text();
        const itemRef = references[elRefIndex];
        itemRef.children(".crew-members").children(".crew-member-1").html(selectedText);
        thisData.crews[parseInt(dataIndex)].pretekar1 = selectedVal;
    }

    function _UpdateSelectedCrewDuo(selRef, elRefIndex, pos, categSlug, dataIndex=-1) {
        const selectedVal = $(selRef).children("option:selected").val();
        const selectedText = $(selRef).children("option:selected").text();
        const innerHtml = pos === 2 ? ` & ${selectedText}` : selectedText
        const itemRef = references[elRefIndex];
        itemRef.children(".crew-members").children(`.crew-member-${pos}`).html(innerHtml);
        thisData.crews[parseInt(dataIndex)][`pretekar${pos}`] = selectedVal;
    }

    function RemoveCrew(ref, dataIndex) {
        delete thisData.crews[dataIndex];
        var el = ref,
            curHeight = el.height();
        el.height(curHeight).animate({height: 0}, 200);
        setTimeout(() => {
            ref.remove();
        }, 200);
    }

    function IterateOptionsForMembers(selIndex=false) {
        var out = `<option${selIndex === false ? ' selected' : ''} disabled>Vyberte člena...</option$>`;
        var index = 0;
        for( const member of members ) {
            out += `<option value="${index}"${index === selIndex ? ' selected' : ''}>${member.name}</option>`;
            index += 1;
        }
        return out;
    }

    function PassToNextStep() {
        const crews = thisData.crews;
        console.log(crews);
        if( $.isEmptyObject(crews) ) {
            AddErrHit();
            const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-emptyData'));
            staticInstance.show();
            return;
        }
        for( const crewCode in crews ) {
            const crew = crews[crewCode];
            const pretekar1 = members[parseInt(crew.pretekar1)];
            const pretekar2 = members[parseInt(crew.pretekar2)];
            if( onlyKidCategs.includes(crew.categ) ) {
                if( crew.duo && ( parseInt(pretekar1.age) >= adultThreshold || parseInt(pretekar2.age) >= adultThreshold ) ) {
                    AddErrHit();
                    const problMem = parseInt(pretekar1.age) >= adultThreshold ? pretekar1 : pretekar2;
                    $("#againstRules__names").html(`${pretekar1.name} (${pretekar1.age}) & ${pretekar2.name} (${pretekar2.age})`);
                    $("#againstRules__categ").html(PharseSlug(crew.categ));
                    $("#againstRules__reason").html(`Pretekár ${problMem.name} (${problMem.age}) v kategórii ${PharseSlug(crew.categ)} nemôže pretekať, pretože je klasifikovaný ako dospelý`);
                    const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-againstRules'));
                    staticInstance.show();
                    return;
                } else if( !crew.duo && parseInt(pretekar1.age) >= adultThreshold ) {
                    AddErrHit();
                    $("#againstRules__names").html(`${pretekar1.name} (${pretekar1.age})`);
                    $("#againstRules__categ").html(PharseSlug(crew.categ));
                    $("#againstRules__reason").html(`Pretekár ${pretekar1.name} (${pretekar1.age}) v kategórii ${PharseSlug(crew.categ)} nemôže pretekať, pretože je klasifikovaný ako dospelý`);
                    const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-againstRules'));
                    staticInstance.show();
                    return;
                }
            } else if( mixedCategs.includes(crew.categ) ) {
                if( crew.duo && ( ( parseInt(pretekar1.age) >= adultThreshold && parseInt(pretekar2.age) >= adultThreshold ) || ( parseInt(pretekar1.age) < adultThreshold && parseInt(pretekar2.age) < adultThreshold ) ) ) {
                    AddErrHit();
                    $("#againstRules__names").html(`${pretekar1.name} (${pretekar1.age}) & ${pretekar2.name} (${pretekar2.age})`);
                    $("#againstRules__categ").html(PharseSlug(crew.categ));
                    $("#againstRules__reason").html(`Obidvaja zvolení pretekári sú už klasifikovaný ako dospelí alebo deti, čo je v kategórii ${PharseSlug(crew.categ)} neprípustné`);
                    const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-againstRules'));
                    staticInstance.show();
                    return;
                }
            } else {
                if( crew.duo && ( parseInt(pretekar1.age) < adultThreshold || parseInt(pretekar2.age) < adultThreshold ) ) {
                    AddErrHit();
                    const problMem = parseInt(pretekar1.age) < adultThreshold ? pretekar1 : pretekar2;
                    $("#againstRules__names").html(`${pretekar1.name} (${pretekar1.age}) & ${pretekar2.name} (${pretekar2.age})`);
                    $("#againstRules__categ").html(PharseSlug(crew.categ));
                    $("#againstRules__reason").html(`Pretekár ${problMem.name} (${problMem.age}) v kategórii ${PharseSlug(crew.categ)} nemôže pretekať, pretože je klasifikovaný ako dieťa`);
                    const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-againstRules'));
                    staticInstance.show();
                    return;
                } else if( !crew.duo && parseInt(pretekar1.age) < adultThreshold ) {
                    AddErrHit();
                    $("#againstRules__names").html(`${pretekar1.name} (${pretekar1.age})`);
                    $("#againstRules__categ").html(PharseSlug(crew.categ));
                    $("#againstRules__reason").html(`Pretekár ${pretekar1.name} (${pretekar1.age}) v kategórii ${PharseSlug(crew.categ)} nemôže pretekať, pretože je klasifikovaný ako dieťa`);
                    const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-againstRules'));
                    staticInstance.show();
                    return;
                }
            }
            if( crew.duo ) {
                if( crew.pretekar1 === "" || crew.pretekar2 === "" ) {
                    AddErrHit();
                    const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-notFulfilled'));
                    staticInstance.show();
                    return;
                }
                if( crew.pretekar1 === crew.pretekar2 ) {
                    AddErrHit();
                    $("#againstRules__names").html(`${pretekar1.name} (${pretekar1.age}) & ${pretekar2.name} (${pretekar2.age})`);
                    $("#againstRules__categ").html(PharseSlug(crew.categ));
                    $("#againstRules__reason").html(`V jednej dvojčlennej posádke nesmie pretekať ten istý človek`);
                    const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-againstRules'));
                    staticInstance.show();
                    return;
                }
                for( const subCrewCode in crews ) {
                    if( subCrewCode === crewCode ) continue;
                    const subCrew = crews[subCrewCode];
                    if( subCrew.categ !== crew.categ ) continue;
                    if( subCrew.pretekar1 === crew.pretekar1 || subCrew.pretekar2 === crew.pretekar1 || subCrew.pretekar2 === crew.pretekar2 ) {
                        AddErrHit();
                        const problMem = subCrew.pretekar2 === crew.pretekar2 ? pretekar2 : pretekar1;
                        $("#multiReg__name").html(problMem.name);
                        $("#multiReg__categ").html(PharseSlug(crew.categ));
                        const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-multiRegistration'));
                        staticInstance.show();
                        return;
                    }
                }
            } else {
                if( crew.pretekar1 === "" ) {
                    AddErrHit();
                    const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-notFulfilled'));
                    staticInstance.show();
                    return;
                }
                for( const subCrewCode in crews ) {
                    if( subCrewCode === crewCode ) continue;
                    const subCrew = crews[subCrewCode];
                    if( subCrew.categ !== crew.categ ) continue;
                    if( subCrew.pretekar1 === crew.pretekar1 ) {
                        AddErrHit();
                        $("#multiReg__name").html(pretekar1.name);
                        $("#multiReg__categ").html(PharseSlug(crew.categ));
                        const staticInstance = mdb.Toast.getInstance(document.getElementById('toast-multiRegistration'));
                        staticInstance.show();
                        return;
                    }
                }
            }
        }
        Stepper.NextStep(thisData, false);
    }

    $(document).ready(function() {
        document.title = 'FamilyCup Expresná : Prihlásenie do kategórii (Krok 4)';
        window.onbeforeunload = function () {
            return 'POZOR! Pokúšate sa opustiť stránku aj napriek tomu, že ste súhlasili, že to nespravíte.';
        };
        $("#categ-select optgroup").hide();
        const categSel = new mdb.Select(document.getElementById('categ-select'), { noResultText: 'Žiadne nájdené kategórie', searchPlaceholder: 'Hľadať...', filter: true, placeholder: '10 kategórií...', size: 'lg' });
    });
</script>

<script type="text/javascript" src="https://storage.esec.sk/lib/mdb5/js/mdb.min.js" defer></script>