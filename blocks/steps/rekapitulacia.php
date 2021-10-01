<div class="col-md-5 text-light text-left d-none d-md-block">
  <div class="h1">Zrekapitulujme si to...</div>
  <div class="mt-3 mb-5">
      <p>
        Dobre si ešte raz skontrolujte všetky vypnené informácie. Väčšinu z nich už po registrácii inak, ako kontaktovaním organizátorov nezmeníte.
      </p>
      <p>
        <i class="fas fa-info-circle text-info me-2"></i>Na ich úpravu použite ikonku ceruzky
      </p>
      <p>
        <i class="fas fa-exclamation-circle text-warning me-2"></i>Úprava mien pretekárov (členov rodiny) slúži len na <span class="fw-bold text-warning">opravu preklepov v mene</span> a nie na kompletnú zmenu mena (osoby).
        Nerešpektovanie tohto nariadenia môže viesť ku <span class="fw-bold text-warning">kompletnej diskvalifikácii</span> pretekára alebo celej rodiny.
      </p>
  </div>
</div>
<div class="col-md-7 text-left align-self-center">
  <div class="card py-3 scroll">
    <div class="card-body">
      <div class="container-fluid align-items-center">
        <div class="row d-block d-md-none">
            <div class="h1">Zrekapitulujme si to...</div>
            <div class="mt-3 mb-5">
                <p>
                    Dobre si ešte raz skontrolujte všetky vypnené informácie. Väčšinu z nich už po registrácii inak, ako kontaktovaním organizátorov nezmeníte.
                </p>
                <p>
                    <i class="fas fa-info-circle text-info me-2"></i>Na ich úpravu použite ikonku ceruzky
                </p>
                <p>
                    <i class="fas fa-exclamation-circle text-warning me-2"></i>Úprava mien pretekárov (členov rodiny) slúži len na <span class="fw-bold text-warning">opravu preklepov v mene</span> a nie na kompletnú zmenu mena (osoby).
                    Nerešpektovanie tohto nariadenia môže viesť ku <span class="fw-bold text-warning">kompletnej diskvalifikácii</span> pretekára alebo celej rodiny.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="ticket">
                <div class="ticket__content">
                    <h2>Záväzná prihláška na FamilyCup 2021</h2>
                    <h6 class="text-muted">Vyplnená <?php echo date("d. m. Y"); ?></h6>
                    <hr class="my-3">
                    <p>Ja, <span class="data-leadName"></span> (rodina <span class="data-famName"></span>), záväzne registrujem rodinu <span class="data-famName"></span> na FamilyCup 2021.</p>
                    <p>Do súťaže registrujem tieto osoby (ktoré sú členmi rodiny <span class="data-famName"></span>): <span class="data-listFamMembers"></span>.</p>
                    <p>Vyššie spomínané osoby budú pretekať v následujúcom zložení:</p>
                    <ul class="data-listCrews" style="list-style-type: none;"></ul>
                    <p>Registráciou som oboznámený s tým, že do 24 hodín (zvyčajne ihneď) mi na môj e-mail (<span class="data-email"></span>) príde potvrdenie a dočasné heslo, ktoré môžem použiť na dohlasovanie alebo odhlasovanie posádok na stránke <a href="https://family-cup.sk" target="_blank">family-cup.sk</a>.</p>
                    <p>Virtuálnym podaním (kliknutím na nižšie položené tlačidlo) súhlasím s <a href="https://family-cup.sk/files/pravidla-FamCup-1.0.0.pdf" target="_blank">pravidlami FamilyCupu</a> a moja rodina, ktorej som vedúci, sa ich zaväzuje dodržiavať. Taktiež sa tým zaväzujem zaplatiť štartovný poplatok na mieste v hodnote <span class="fw-bold"><span class="data-price"></span>€</span> (2€/osoba).</p>
                </div>
            </div>
        </div>
        <div class="row mt-3 text-center">
          <div class="col">
            <button type="submit" class="btn btn-primary btn-rounded btn-lg nextStep-btn" onclick="SendToBackend()" data-mdb-animation-start="onLoad" id="button-backend-send">Všetko v poriadku, registrovať<i class="fas fa-check ms-2"></i></button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    var data = <?php echo json_encode($_GET); ?>;
    var editable_id = 0;

    function GetUniqueID() {
        editable_id += 1;
        return editable_id;
    }

    $(".data-leadName").each(function(i, obj) {
        $(this).html( ConstructEditableContent(data.lead.name, ".data-leadName", "data-leadName-content", "leadName") );
    });
    $(".data-famName").each(function(i, obj) {
        $(this).html( ConstructEditableContent(data.family, ".data-famName", "data-famName-content", "family") );
    });
    $(".data-email").each(function(i, obj) {
        $(this).html( ConstructEditableContent(data.mail, ".data-email", "data-email-content", "mail") );
    });
    $(".data-listFamMembers").each(function(i, obj) {
        $(this).html( ListAllMembers() );
    });
    $(".data-price").each(function(i, obj) {
        $(this).html( CalculateStartPrice() );
    });
    $(".data-listCrews").each(function(i, obj) {
        $(this).html( ListAllCrews() );
    });
    $(".editable-input").keypress(function(e){ return e.which != 13; });

    function ConstructEditableContent( initData, parentClass, className, dataType, dataTypeAddition="null" ) {
        const idNum = GetUniqueID();
        return `<span oninput="HandleEditableChange(this.parentElement, this, '${parentClass}', '${dataType}', '${className}', '${dataTypeAddition}');" class="${className} editable-input" id="${className}-${idNum}">${initData}</span><span><i class="fas fa-pencil-alt text-muted ms-1" style="cursor:pointer;" onclick="ToggleEditable('#${className}-${idNum}', '.${className}', this.parentElement, '${className}', ${idNum});"></i></span>`;
    }

    function ToggleEditable( specialRef, classRef, pencilRef, className, idNum ) {
        const newValue = $(specialRef).attr('contentEditable') == "true" ? false : true;
        $(specialRef).attr('contentEditable', newValue);
        if( newValue ) {
            setTimeout(() => {
                $(specialRef).focus();
            }, 0);
        }
        const pencilInner = newValue ? `<i class="fas fa-check text-success ms-1" style="cursor:pointer;" onclick="ToggleEditable('#${className}-${idNum}', '.${className}', this.parentElement, '${className}', ${idNum});"></i>` : `<i class="fas fa-pencil-alt text-muted ms-1" style="cursor:pointer;" onclick="ToggleEditable('#${className}-${idNum}', '.${className}', this.parentElement, '${className}', ${idNum});"></i>`;
        $(pencilRef).html(pencilInner);
    }

    function HandleEditableChange( thisParentRef, thisRef, classRef, dataType, className, dataTypeAddition ) {
        const newValue = thisRef.innerHTML;
        //$(classRef).not(thisParentRef).html( ConstructEditableContent( newValue, classRef, className, dataType ) );
        $(classRef).not(thisParentRef).each(function(i, obj) {
            $(this).html( ConstructEditableContent( newValue, classRef, className, dataType, dataTypeAddition ) );
        });
        $(".editable-input").keypress(function(e){ return e.which != 13; });
        switch( dataType ) {
            case "leadName":
                data.lead.name = newValue;
                break;
            case "member":
                data.members[parseInt(dataTypeAddition)].name = newValue;
                break;
            default:
                data[dataType] = newValue;
        }
    }

    function ListAllCrews() {
        const crews = data.crews;
        let output = "";
        for( const crewIndex in crews ) {
            const crew = crews[crewIndex];
            const crewMembers = crew.duo === "true" ? `
                <span class="data-members-${crew.pretekar1}">
                    ${ConstructEditableContent(data.members[parseInt(crew.pretekar1)].name, `.data-members-${crew.pretekar1}`, `data-members-${crew.pretekar1}-content`, "member", crew.pretekar1)}
                </span>
                &
                <span class="data-members-${crew.pretekar2}">
                    ${ConstructEditableContent(data.members[parseInt(crew.pretekar2)].name, `.data-members-${crew.pretekar2}`, `data-members-${crew.pretekar2}-content`, "member", crew.pretekar2)}
                </span>
            ` : `
                <span class="data-members-${crew.pretekar1}">
                    ${ConstructEditableContent(data.members[parseInt(crew.pretekar1)].name, `.data-members-${crew.pretekar1}`, `data-members-${crew.pretekar1}-content`, "member", crew.pretekar1)}
                </span>
            `;
            output += `
                <li><span class="text-primary fw-bold">${PharseSlug(crew.categ)}</span><span class="ms-2">${crewMembers}</span></li>
            `;
        }
        return output;
    }

    function CalculateStartPrice() {
        var members = data.members;
        var membersArray = []
        for( const member of members ) membersArray.push(member.name);
        return membersArray.length * 2;
    }

    function ListAllMembers() {
        var members = data.members;
        var membersArray = []
        var index = 0;
        for( const member of members ) {
            membersArray.push(`
                <span class="data-members-${index}">
                    ${ConstructEditableContent(member.name, `.data-members-${index}`, `data-members-${index}-content`, "member", index)}
                </span>
            `);
            index += 1;
        }
        return membersArray.join(", ");
    }

    $(document).ready(function() {
        document.title = 'FamilyCup Expresná : Rekapitulácia';
        window.onbeforeunload = function () {
            return 'POZOR! Pokúšate sa opustiť stránku aj napriek tomu, že ste súhlasili, že to nespravíte.';
        };
    });

    function ValidateAllData() {
        const familyMatchReg = /^([\p{L}-]+)(ových|ných|cích)$/gu;
        const mailMatchReg = /(?:[a-z0-9!#$%&'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+\/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/gu;
        if( !data.family.match(familyMatchReg) ) {
            AddErrHit();
            let staticInstance = mdb.Toast.getInstance(document.getElementById('toast-invalidPriez'));
            staticInstance.show();
            Animation.BtnChange( "#button-backend-send", `Všetko v poriadku, registrovať<i class="fas fa-check ms-2"></i>` );
            $("#button-backend-send").attr("disabled", false);
            return;
        }
        if( !data.mail.match(mailMatchReg) ) {
            AddErrHit();
            let staticInstance = mdb.Toast.getInstance(document.getElementById('toast-invalidEmail'));
            staticInstance.show();
            Animation.BtnChange( "#button-backend-send", `Všetko v poriadku, registrovať<i class="fas fa-check ms-2"></i>` );
            $("#button-backend-send").attr("disabled", false);
            return;
        }
        return true;
    }

    function SendToBackend() {
        // Pretty unprotected, but tbh I don't care lmao
        Animation.BtnChange( "#button-backend-send", `<span class="spinner-grow text-light spinner-grow-sm" role="status" aria-hidden="true"></span>` );
        $("#button-backend-send").attr("disabled", true);
        if( ValidateAllData() ) {
            data.token = "huUdwb6B6Dadp7bzavb";
            const famName = data.family;
            const email = data.mail;
            $.ajax({
                type: "POST",
                url: "https://api.family-cup.sk/regFromExpress.php",
                data,
                success: (data) => {
                    console.log(data);
                    try {
                        if( data.response === "success" ) {
                            window.onbeforeunload = undefined;
                            window.location.replace(`https://expresna.family-cup.sk/hotovo?r=${famName}&e=${email}`);
                        } else {
                            if( data.response === "error" && data.info === "already_registered" ) {
                                AddErrHit();
                                let staticInstance = mdb.Toast.getInstance(document.getElementById('toast-alreadyRegistered'));
                                staticInstance.show();
                                Animation.BtnChange( "#button-backend-send", `Všetko v poriadku, registrovať<i class="fas fa-check ms-2"></i>` );
                                $("#button-backend-send").attr("disabled", false);
                                return;
                            } else {
                                // Data rejected
                                DisplayFatal(`(E_REKAP_001) Dáta boli odmietnuté serverom.\n\n${JSON.stringify(data)}`);
                                Animation.BtnChange( "#button-backend-send", `Všetko v poriadku, registrovať<i class="fas fa-check ms-2"></i>` );
                                $("#button-backend-send").attr("disabled", false);
                            }
                        }
                    } catch(err) {
                        // Data reading failed
                        DisplayFatal(`(E_REKAP_002) Čítanie odpovede zo servera zlyhalo.\n\n${err}\n\n${JSON.stringify(data)}`);
                        Animation.BtnChange( "#button-backend-send", `Všetko v poriadku, registrovať<i class="fas fa-check ms-2"></i>` );
                        $("#button-backend-send").attr("disabled", false);
                    }
                },
                error: (xhr, status, err) => {
                    // Data sending failed
                    console.log(xhr, status, err);
                    DisplayFatal(`(E_REKAP_003) Komunikácia zo serverom zlyhala.\n\n${err}\n\n${status}`);
                    Animation.BtnChange( "#button-backend-send", `Všetko v poriadku, registrovať<i class="fas fa-check ms-2"></i>` );
                    $("#button-backend-send").attr("disabled", false);
                }
            });
        }
    }

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
</script>

<script type="text/javascript" src="https://storage.esec.sk/lib/mdb5/js/mdb.min.js"></script>