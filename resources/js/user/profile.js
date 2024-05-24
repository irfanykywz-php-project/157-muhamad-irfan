import croppie from "croppie/croppie.min.js";
window.croppie = croppie;

let $resize = $('.photo').croppie({
    mouseWheelZoom: 'ctrl',
    enforceBoundary: true,
    viewport: {
        width: 100,
        height: 100
    },
    boundary: {
        width: 250,
        height: 250
    }
});


$('.select-photo').on('change', function (){
    let reader = new FileReader();
    reader.onload = function (e) {
        $resize.croppie('bind', {
            url: e.target.result
        }).then(function(){
            console.log('jQuery bind complete');
        });
    }
    reader.readAsDataURL(this.files[0]);
})

$('.upload').on('click', function () {
    $resize.croppie('result', {
        type: 'canvas',
        size: 'viewport',
        circle: true
    }).then(function (res) {
        $.ajax({
            url: $('.upload').data('url'),
            type: "PUT",
            data: {"photo": res},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                console.log('uploaded...');

                bootstrap.Modal.getInstance(document.getElementById("photoModal")).hide();

                window.location.href = window.location.href;
            }
        });
    });
});
