
var myModal = document.getElementById('staticBackdrop')
  
myModal.addEventListener('shown.bs.modal', function () {
cedula.focus()
})

const mobileScreen = window.matchMedia("(max-width: 990px )");

var modalHistorial = document.getElementById('ModalHistorial')
  
modalHistorial.addEventListener('shown.bs.modal', function () {
 fecha_inicio.focus()
})

//const mobileScreen = window.matchMedia("(max-width: 990px )");

$(document).ready(function () {
    $(".dashboard-nav-dropdown-toggle").click(function () {
        $(this).closest(".dashboard-nav-dropdown")
            .toggleClass("show")
            .find(".dashboard-nav-dropdown")
            .removeClass("show");
        $(this).parent()
            .siblings()
            .removeClass("show");
    });
    $(".menu-toggle").click(function () {
        if (mobileScreen.matches) {
            $(".dashboard-nav").toggleClass("mobile-show");
        } else {
            $(".dashboard").toggleClass("dashboard-compact");
        }
    });
});



