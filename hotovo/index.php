<!doctype html>
<html>         
  <head>                 
    <title>Registrácia úspešná</title>         
    <meta charset="utf-8">              
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="publisher" content="esec">
    <meta name="copyright" content="esec development services, Anton Pernisch, SKKAJAK">
    <meta name="application-name" content="FamilyCup Expresná registrácia"/>
    <meta name="description" content="Expresná registrácia do FamilyCupu jednoducho a bez návodu."/>
    <meta name="keywords" content="skkajak, familycup, skkajak familycup, skkajak 2021, 2021, familycup 2021, skkajak familycup 2021, sk kajak familycup, sk kajak familycup 2021, familycup expresna, expresna familycup"/>
    <meta name="identifier-url" content="https://onair.family-cup.sk/"/>
    <meta name="googlebot" content="index"/>
    <meta name="dcterms.dateCopyrighted" content="2021"/>  
    <link rel="icon" type="image/png" href="../inc/fav.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://storage.esec.sk/lib/mdb5/css/mdb.min.css" rel="stylesheet">  
    <link href="../css/base.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
      .confetti-mask {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 1;
      }
      #main-inner-content {
        z-index: 2 !important;
      }
      .rating {
        font-size: 48px;
      }
    </style>
  </head>         
  <body>
    <div id="lottie-container" class="confetti-mask"></div>

    <div id="view">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.3)">
        <div class="container d-flex align-items-center justify-content-center h-100 w-100">
          <div class="row d-flex justify-content-center align-items-center" id="main-inner-content">
            <div class="col-md-10 text-light text-center">
              <div class="h1">Ďakujeme.</div>
              <div class="mt-3 mb-4">
                <p>
                  Registrácia prebehla úspešne. Všetky posádky rodiny <?php echo $_GET["r"] ?> boli zaregistrované.
                </p>
                <p>
                  Skontrolujte svôj e-mail (<?php echo $_GET["e"] ?>) - prišlo Vám tam dočasné heslo a ďalšie informácie.
                </p>
                <p>
                  Toto okno môžete zavrieť, už nič viac od Vás nepotrebujeme. Ako hodnotíte proces registrácie z pohľadu jednoduchosti a jasnosti informácií?
                </p>
              </div>
              <div class="d-flex justify-content-center">
                <ul class="rating" id="rating" data-mdb-toggle="rating">
                  <li>
                    <i class="far fa-star fa-sm text-warning" title="Hrozné"></i>
                  </li>
                  <li>
                    <i class="far fa-star fa-sm text-warning" title="Mohlo to byť aj lepšie"></i>
                  </li>
                  <li>
                    <i class="far fa-star fa-sm text-warning" title="Bolo to dostačujúce"></i>
                  </li>
                  <li>
                    <i class="far fa-star fa-sm text-warning" title="Výborne, maximálna spokojnosť"></i>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="more_info_btn" id="more_info_btn">
      <a class="btn btn-floating btn-lg btn-light text-dark" id="more_info_btn" data-mdb-toggle="modal" data-mdb-target="#modal_more_info"><i class="fas fa-question fa-2x"></i></a>
    </div>      

    <div class="modal fade top" id="modal_more_info" tabindex="-1" role="dialog" aria-labelledby="more_info_btn" aria-hidden="true" style="z-index: 9999 !important;">
      <div class="modal-dialog modal-side modal-bottom-right" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title w-100 white-text" id="vypdok_button">Expresná registrácia</h4>
            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Expresná registrácia je nástupkyňa pôvodnej, pre neznalého náročnej registrácie. V čom je iná? Pri expresnej registrácií nepotrebujete
            vedieť nič o krokoch našej registrácie, jednoducho postupne vypníte to, čo Vám stránka povie. FamilyCup Expresná je nadizajnovaná tak, že sa predpokladá, že pred registráciou si užívateľ nepozrel žiaden
            návod a spolieha sa len na čisté a jasné inštrukcie na stránke.</p>
            <p>Po dokončení expresnej registrácie budete do FamilyCupu registrovaný a na email, ktorý ste zadali do registrácie, dostanete od nás správu o registrácii a zároveň v nej obdržíte heslo pre Váš FamilyCup
              účet, do ktorého budete môcť aj neskôr pristúpiť cez našu hlavnú stránku <a href="https://family-cup.sk" target="_blank">family-cup.sk</a>.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-mdb-dismiss="modal">Zavrieť</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://storage.esec.sk/lib/mdb5/js/mdb.min.js"></script>
    <script type="text/javascript" src="https://api.family-cup.sk/cdn/lottie.js"></script>
    <script>
      $(document).ready(function() {
        var myNewURL = refineURL();
        window.history.replaceState("a", "b", "/" + myNewURL );
        function refineURL() {
          var currURL= window.location.href; //get current address
          var afterDomain= currURL.substring(currURL.lastIndexOf('/') + 1);
          var beforeQueryString= afterDomain.split("?")[0];  
          return beforeQueryString;     
        }
      });
      lottie.loadAnimation({
        container: document.getElementById("lottie-container"),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: 'confetti.json'
      });
      const icon = document.querySelectorAll('.rating i');
      const ratingDOM = document.querySelector('.rating');
      icon.forEach((el) => {
        el.addEventListener('onSelect.mdb.rating', (e) => {
          $.ajax({ url: `https://api.family-cup.sk/addRating.php?v=${e.value}` });
          $('#rating').hide(600);
        })
      });
    </script>
  </body>
</html>