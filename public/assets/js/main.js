const Editor = toastui.Editor;

$(document).ready(function () {
    $("body").tooltip({ selector: '[data-bs-toggle=tooltip]' });

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

    $('.add-content').click(function () {
        $('.add-content-type').attr('style', 'display: block !important')
        $('.add-content-type').css('opacity', '1');

        $('.add-content-type').mouseleave(function () {
            $('.add-content-type').css('opacity', '0');
            setTimeout(function () {
                $('.add-content-type').hide();
            }, 500)
        })
    })

    const editor = new Editor({
        el: document.querySelector('#editor'),
        height: '500px',
        initialEditType: 'markdown',
        previewStyle: 'vertical'
    });
    
    editor.setMarkdown(document.querySelector('#markdown').value);

    document.querySelector('#save').addEventListener('click', e => {
        document.querySelector('#command').value = "save";
        document.querySelector('#markdown').value = editor.getMarkdown();
        document.querySelector('#editorForm').submit();
    });
    
    document.querySelector('#publish').addEventListener('click', e => {
        alert('fff');
        document.querySelector('#command').value = "publish";
        document.querySelector('#markdown').value = editor.getMarkdown();
        document.querySelector('#editorForm').submit();
    });
});