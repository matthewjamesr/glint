const Editor = toastui.Editor;

$(document).ready(function () {

    $("#glintChina").click(function () {
        window.location.href = "/china"
    })

    $("#glintDPRK").click(function () {
        window.location.href = "/dprk"
    })

    $("#glintRussia").click(function () {
        window.location.href = "/russia"
    })

    $('#type').on('change', function () {
        if (this.value == 'Choose type') {
            $('#form-country-input').hide();
            $('#form-title-input').hide();
            $('#form-description-input').hide();
            $('#form-video-url-input').hide();
            $('#form-editor-input').hide();
        }
        if (this.value == 'video') {
            $('#form-country-input').show();
            $('#form-title-input').hide();
            $('#form-description-input').hide();
            $('#form-video-url-input').show();
            $('#form-editor-input').hide();
        } else if (this.value == 'article') {
            $('#form-country-input').show();
            $('#form-title-input').show();
            $('#form-description-input').show();
            $('#form-video-url-input').hide();
            $('#form-editor-input').show();
        } else if (this.value == 'blip') {
            $('#form-country-input').show();
            $('#form-title-input').hide();
            $('#form-description-input').hide();
            $('#form-video-url-input').hide();
            $('#form-editor-input').show();
        }
    });
})

const editor = new Editor({
    el: document.querySelector('#editor'),
    height: '500px',
    initialEditType: 'markdown',
    previewStyle: 'vertical'
})

document.querySelector('#editorForm').addEventListener('submit', e => {
    e.preventDefault();
    document.querySelector('#markdown').value = editor.getMarkdown();
    e.target.submit();
})