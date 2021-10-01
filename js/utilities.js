function Utilities() {
    this.ipAPIkey = 'f313c99f0f2d4d6e81e7763f514fec81';
    return;
}

Utilities.prototype = {
    GetUserIP: function( callback ) {
        $.getJSON('https://ipgeolocation.abstractapi.com/v1/?api_key=' + this.ipAPIkey, (data) => {
            callback(data.ip_address);
        });
    }
};

var Utilities = new Utilities();