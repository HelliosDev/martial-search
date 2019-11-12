function readImage(input, imgId) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(imgId).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#profile__drop").change(function() {
    readImage(this, '#profile__avatar');
});

$("#profile__dojo").change(function() {
    readImage(this, '#picture__dojo');
});