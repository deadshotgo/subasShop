
$(document).ready(function () {



});


function updateFun(path) {
    event.preventDefault();

    $.ajax({
        url: path,
        contentType: false,
        cache: false,
        processData: false,
        success: function (html) {
            $("#tovat").html(html).hide().fadeIn(1000);

        }
    });
}

