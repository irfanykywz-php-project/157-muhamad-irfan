import Resumable from "resumablejs/resumable.js";

/** Format Bytes */
function formatBytes(a, b = 2) {
    if (0 === a) return "0 Bytes";
    const c = 0 > b ? 0 : b,
        d = Math.floor(Math.log(a) / Math.log(1024));
    return parseFloat((a / Math.pow(1024, d)).toFixed(c)) + " " + ["Bytes", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"][d]
}

/**
 * Reference
 * https://shouts.dev/articles/laravel-upload-large-file-with-resumablejs-and-laravel-chunk-upload
 */
let resumable = new Resumable({
    target:'/upload',
    query:{_token: $('meta[name="csrf-token"]').attr('content')},
    fileType: [],
    fileTypeErrorCallback: function (file, errorCount) {

    },
    maxFileSize: 104857600, // 100MB
    maxFileSizeErrorCallback: function (file, errorCount) {
        alert('max file size 100MB')
    },
    singleSelect: true,
    maxFiles: 1,
    chunkSize: 1 * 1024 * 1024, // 1MB
    simultaneousUploads: 1,
    // maxChunkRetries: 3,
    testChunks: false,
    throttleProgressCallbacks: 1,
    headers: {
        'Accept' : 'application/json'
    },
});

if(resumable.support){
    /* enable browse button */
    resumable.assignBrowse($("#browseButton"));
    /* enable dropzone */
    resumable.assignDrop($("#dropTarget"));

    /* create progressbar */
    let progress = {
        selector: $(".progress"),
        show: function () {
            this.selector.show()
            this.selector.find('.progress-bar').css('width', `0%`)
            this.selector.find('.progress-bar').html(``)
        },
        update: function (val) {
            this.selector.find('.progress-bar').css('width', `${val}%`)
            this.selector.find('.progress-bar').html(`${val}%`)
            this.selector.find('.progress-bar').addClass('active')
        },
        finish: function () {
            this.selector.find('.progress-bar').removeClass('active')
        },
        hide: function () {
            this.selector.hide()
        }
    }

    /* handle event */
    resumable.on('fileAdded', function (file) {
        $("#fileInfo").html(`
                <div>${file.file.name}</div>
                <div class="file-size">${formatBytes(file.file.size)}</div>
            `)
        progress.show()
    })

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        let value = Math.floor(file.progress() * 100);
        progress.update(value)

        // size progress
        let current_size = file.progress() * file.size
        console.log(current_size)
        let size_value = formatBytes(current_size) + '/' + formatBytes(file.size);
        $("#fileInfo .file-size").html(size_value)
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        console.log(response)
        progress.finish()

        setTimeout(function () {
            // set value
            $("#uploadResult a.file-link").attr('href', response.url)
            $("#uploadResult input").val(response.url)

            // show
            $("#formUpload").addClass('d-none');
            $("#uploadResult").removeClass('d-none');
        }, 3000)
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.');
        progress.show()
    });

    /* when upload button clicked */
    $("#uploadButton").on('click', function () {

        /**
         * check if description has value
         * merge data to query
         */
        let description = $("textarea[name=description]")
        if (description.val().length > 0){
            resumable.opts.query = function (file) {
                return {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    description: description.val()
                }
            }
        }

        // check file has selected
        if (resumable.files.length < 1){
            return alert('File not exist, Browse First!')
        }

        // check mime
        console.log(resumable)
        console.log(resumable.files[0].file.type)
        if (resumable.files[0].file.type.includes('video')){
            return alert('Video not allowed!')
        }

        // do upload
        resumable.upload();
    })

    /* when pauseOrResume button clicked */
    $("#pauseOrResumeButton").on('click', function () {
        if (resumable.isUploading()){
            console.log('pause...')
            resumable.pause()
            $(this).removeClass('btn-primary')
            $(this).addClass('btn-warning')
            $(this).html('Resume')
        }else{
            console.log('resume...')
            resumable.upload()
            $(this).removeClass('btn-warning')
            $(this).addClass('btn-primary')
            $(this).html('Pause')
        }
    })

}
