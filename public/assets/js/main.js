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