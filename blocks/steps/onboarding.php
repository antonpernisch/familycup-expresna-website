<div class="col-md-10 text-light text-center">
  <div class="h1">Predtým, než začneme</div>
  <div class="mt-3 mb-5">
      <p>
        Registrácia zaberie približne <strong>5 minút</strong>.
      </p>
      <p>
        <i class="fas fa-exclamation-circle text-info me-2"></i>Prosíme, počas registrácie <strong>nezatvárajte prehliadač, neobnovujte stránku a nepoužívajte šípku naspäť</strong>! Spravíte problém nám i sebe - k už zadaným informáciam sa nedostanete.
      </p>
      <p>
        <i class="fas fa-exclamation-circle text-info me-2"></i>V prípade, že Vám do 24 hodín od dokončenia registrácie od nás na zadaný mail nepríde správa, kontaktujte organizátorov na Messenger-i (Richard Jahoda, Anton Pernisch alebo Emma Bednárová) alebo napíšte na kancelaria@family-cup.sk.
      </p>
      <p>
        <i class="fas fa-exclamation-circle text-warning me-2"></i>Kliknutím na tlačidlo nižšie <strong class="text-warning">súhlasíte</strong> so spracúvaním všetkých, tu zadávaných údajov.
      </p>
  </div>
  <button type="button" class="btn btn-primary btn-rounded btn-lg disabled nextStep-btn" id="begin-onboarding-next-btn" onclick="Stepper.NextStep({});" data-mdb-animation-start="onLoad">(11) Prečítajte si to</button>
</div>

<script>
  $(document).ready(function() {
    Utilities.GetUserIP((addr)=>{
      $("#users-ip-addr").html( addr );
    });

    let secs = 10;
    let current_secs = 10;
    let counter = 0;
    var interval = setInterval(()=>{
      $("#begin-onboarding-next-btn").html("(" + current_secs + ") Prečítajte si to" );
      if( counter > secs ) {
        $("#begin-onboarding-next-btn").removeClass("disabled");
        $("#begin-onboarding-next-btn").html("Rozmiem a súhlasím, poďme na to!" );
        clearInterval(interval);
      }
      current_secs -= 1;
      counter += 1;
    }, 1000);
  });
</script>