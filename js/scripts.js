$( document ).ready(function() {
    $('#loading').hide();
    $('#formCadastrapaciente').submit(function(event){
    
        let validaCheckbox = false
        $.each($("input[type='checkbox']"), function(id , val){
            if($(val).is(":checked")){
                validaCheckbox = true
            };
            });
        if(validaCheckbox){
            $('#formCadastrapaciente').submit()
        }else{
            event.preventDefault()
            alert('Marque ao menos um sintoma possivel.')
        }
        });

    $("#buscaClientes").keyup(function() {
        var caracteresCliente = $(this).val();
            $('#loading').show();
            $.ajax({
                url: 'buscaClientes.php',
                method: 'POST',
                data: { caracteresCliente: caracteresCliente },
            success: function(data) {
                $('#tablePacientes').html(data)
                $('#loading').hide();
            },
            error: function() {
                alert('Erro ao consultar pacientes!');
                $('#loading').hide();
            }
        });

        
    });
});

function abrirModal(idCliente) {
    $.ajax({
        url: 'buscaDados.php',
        method: 'POST',
        data: { idCliente: idCliente },
        success: function(data) {
            $('#exibeDados').html(data)
            $('#orderModal').modal('show')
        },
        error: function() {
            alert('Erro ao consultar Laudo Médico');
        }
    });
}

(function ($) {
"use strict"; // Start of use strict

// Smooth scrolling using jQuery easing
$('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
    if (
        location.pathname.replace(/^\//, "") ==
            this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
    ) {
        var target = $(this.hash);
        target = target.length
            ? target
            : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
            $("html, body").animate(
                {
                    scrollTop: target.offset().top,
                },
                1000,
                "easeInOutExpo"
            );
            return false;
        }
    }
});

// Closes responsive menu when a scroll trigger link is clicked
$(".js-scroll-trigger").click(function () {
    $(".navbar-collapse").collapse("hide");
});

// Activate scrollspy to add active class to navbar items on scroll
$("body").scrollspy({
    target: "#sideNav",
});


})(jQuery); // End of use strict
