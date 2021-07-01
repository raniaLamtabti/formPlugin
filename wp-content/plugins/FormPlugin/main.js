document.addEventListener("DOMContentLoaded", function() {
    var fName = document.querySelector("#fName");
    var fNameP = document.querySelector("#fNameP");

    var lName = document.querySelector("#lName");
    var lNameP = document.querySelector("#lNameP");

    var email = document.querySelector("#email");
    var emailP = document.querySelector("#emailP");

    var subj = document.querySelector("#subj");
    var subjP = document.querySelector("#subjP");;

    var msg = document.querySelector("#msg");
    var msgP = document.querySelector("#msgP");

    fName.addEventListener("change", function(event) {
        fNameP.classList.toggle('displayInput');
    });

    lName.addEventListener("change", function(event) {
        lNameP.classList.toggle('displayInput');
    });
    email.addEventListener("change", function(event) {
        emailP.classList.toggle('displayInput');
    });

    subj.addEventListener("change", function(event) {
        subjP.classList.toggle('displayInput');
    });

    msg.addEventListener("change", function(event) {
        msgP.classList.toggle('displayInput');
    });
});