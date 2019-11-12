const add = document.getElementById('add');
const cards = document.querySelectorAll('.card-list');
// const modal = document.getElementById('modal');

$(".add").click(function () {
    window.location.href = $(this).data('href');
});

$(".card-detail").click(function () {
    window.location.href = $(this).data('href');
});

/* window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }   
} */