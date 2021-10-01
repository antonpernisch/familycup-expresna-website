function Antimation() {
    return;
}

Antimation.prototype = {
    Do: function( sel, anim, callback=()=>{return;}, delay=0, duration=500 ) {
        const element = document.querySelector( sel );
        const animate = new mdb.Animate(element, { animation: anim, onEnd: callback, animationDelay: delay, animationDuration: duration, animationStart: 'onLoad' });
        animate.init();
        return;
    },

    BtnChange: function( sel, newText, speed=250, onlyW=false ) {
        $(sel).css("width", $(sel).width());
        if( !onlyW ) $(sel).css("heigth", $(sel).width());
        $(sel).html(newText);
        onlyW ? $(sel).animateAuto("width", speed) : $(sel).animateAuto("both", speed);
    }
};

var Animation = new Antimation();