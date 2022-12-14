document.addEventListener("DOMContentLoaded", function() {

    el_autohide = document.querySelector('.auto-hide');

    // add padding-top to bady (if necessary)
    // navbar_height = document.querySelector('.navbar').offsetHeight;
    // document.body.style.paddingTop = navbar_height + 'px';

    if (el_autohide) {
        var last_scroll_top = 0;
        window.addEventListener('scroll', function() {
            let scroll_top = window.scrollY;
            if (scroll_top < last_scroll_top) {
                el_autohide.classList.remove('scrolled-down');
                el_autohide.classList.add('scrolled-up');
            } else {
                el_autohide.classList.remove('scrolled-up');
                el_autohide.classList.add('scrolled-down');
            }
            last_scroll_top = scroll_top;
        });
        // window.addEventListener
    }
    // if

});
// DOMContentLoaded  end

$(".close").click(function() {
    $(this).parent().addClass("closed");
})

var alertHide = setTimeout(function() {
    $(".notification").addClass("closed");
}, 10000);

var userInput = document.getElementById("username");
var pswInput = document.getElementById("psw");
var confirmInput = document.getElementById("confirm");
var userConditions = document.getElementById("userConditions");
var userConditionsColor = document.getElementById("userConditionsColor");
var conditions = document.getElementById("conditions");
var conditionsColor = document.getElementById("conditionsColor");
var match = document.getElementById("match");
var matchColor = document.getElementById("matchColor");

// When the user clicks on the password field, show the message box
$("#username").focus(function() {
    $('#userConditions').fadeIn(1000);
})
$('#username').blur(function() {
    $('#userConditions').fadeOut(1000);
});

$("#psw").focus(function() {
    $('#conditions').fadeIn(1000);
})
$('#psw').blur(function() {
    $('#conditions').fadeOut(1000);
});

$("#confirm").focus(function() {
    $('#match').fadeIn(1000);
})
$('#confirm').blur(function() {
    $('#match').fadeOut(1000);
});

var lowerCase = /[a-z]/g; // Validate lowercase letters
var upperCase = /[A-Z]/g; // Validate capital letters  
var numbers = /[0-9]/g; // Validate numbers
var letterNumber = /^[0-9a-zA-Z]+$/; // Validate only containers letters and numbers

// When the user starts to type something inside the password field
userInput.onkeyup = function() {

    // Validate passwords contain correct characters and length
    if ((userInput.value.match(letterNumber)) && userInput.value.length >= 3) {
        userConditionsColor.classList.remove("info");
        userConditionsColor.classList.add("success");
    } else {
        userConditionsColor.classList.remove("success");
        userConditionsColor.classList.add("info");
    }
}

// When the user starts to type something inside the password field
pswInput.onkeyup = function() {



    // Validate passwords contain correct characters and length
    if (pswInput.value.match(letterNumber) && pswInput.value.match(upperCase) && pswInput.value.match(lowerCase) && pswInput.value.match(numbers) && pswInput.value.length >= 8) {
        conditionsColor.classList.remove("info");
        conditionsColor.classList.add("success");
    } else {
        conditionsColor.classList.remove("success");
        conditionsColor.classList.add("info");
    }

    // Validate passwords matching
    if (confirmInput.value == pswInput.value || pswInput.value == confirmInput.value) {
        matchColor.classList.remove("info");
        matchColor.classList.add("success");
    } else {
        matchColor.classList.remove("success");
        matchColor.classList.add("info");
    }


}
confirmInput.onkeyup = function() {
    // Validate length
    if (confirmInput.value == pswInput.value || pswInput.value == confirmInput.value) {
        matchColor.classList.remove("info");
        matchColor.classList.add("success");
    } else {
        matchColor.classList.remove("success");
        matchColor.classList.add("info");
    }
}