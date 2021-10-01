function Stepper() {
    this.steps_slugs = ["onboarding", "rodina", "veduci", "clenovia", "kategorie", "email", "rekapitulacia"];
    this.current_step_index = -1;
    return;
}

Stepper.prototype = {
    NextStep: function (passedData, validateForm = false) {
        if (validateForm) {
            var flag = false;
            $(".validate-this-box").each(function () {
                var el = $(this);
                var val = el.val();
                if (val == "") flag = true;
            });
            if (flag) {
                AddErrHit();
                let notFulfilledToast = mdb.Toast.getInstance(document.getElementById('toast-notFulfilled'));
                notFulfilledToast.show();
                return;
            }
        }
        var nextStepIndex = this.current_step_index + 1;
        if (nextStepIndex > this.steps_slugs.length - 1) return;
        var nextStepSlug = this.steps_slugs[nextStepIndex];
        nextStepIndex == 0 || nextStepIndex == 1 ? Animation.BtnChange(".nextStep-btn", `<span class="spinner-grow text-light spinner-grow-sm" role="status" aria-hidden="true"></span>`) : Animation.BtnChange(".nextStep-btn", `<span class="spinner-grow text-primary spinner-grow-sm" role="status" aria-hidden="true"></span>`);
        // Load next design block and show it afterwards
        $.ajax({
            url: `blocks/steps/${nextStepSlug}.php?${$.param(passedData)}`,
            success: (result) => {
                Animation.BtnChange(".nextStep-btn", `<i class="far fa-check-circle"></i>`);
                Animation.Do("#main-inner-content", "fade-out-down", () => { }, 0, 800);
                setTimeout(() => {
                    $("#main-inner-content").html(result);
                    $("#main-inner-content").removeClass("fade-out-down");
                    Animation.Do("#main-inner-content", "fade-in-up");
                    Stepper.current_step_index = nextStepIndex;
                }, 800);
            },
            error: (e) => {
                console.error(e);
            }
        });
    }
};

var Stepper = new Stepper();