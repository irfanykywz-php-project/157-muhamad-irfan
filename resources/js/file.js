/**
 * share
 * not work if use http!
 */
$("#share").on('click', function (){
    navigator.share({
        title: '{{ $file->name }}',
        url: '{{ url()->current() }}',
    })
})

/**
 * facebook comment
 */
$("#showComments").on('click', function (){
    $("#showComments").innerHTML = 'Loading...'
    let js = document.createElement("script"),
    appId = $("#comments").data('appid');
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v20.0&appId=" + appId;
    document.body.appendChild(js);
    js.onload = () => {
        $("#showComments").remove()
    }
})

/**
 * countdown
 */
let counter = 5,
    downloadButton = $(".download-button"),
    countDown = $(".countdown");
let intervalId = setInterval(function(){
    console.log(counter);
    $('button', countDown).html(`Scanning files in ${counter} seconds.`);
    counter--;
    if (counter === 0) {
        countDown.addClass('d-none');
        downloadButton.removeClass('d-none');
        clearInterval(intervalId)
    }
}, 1000);
