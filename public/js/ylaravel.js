$('.preview_input').change(function (event) {
    var file  = event.currentTarget.files[0];
    var url  = window.URL.createObjectURL(file);
    $(event.target).next('.preview_img').attr('src',url);
});