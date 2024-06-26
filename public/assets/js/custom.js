// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

// owl carousel
$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
})

// start fixed header
window.onscroll = function () {
    myFunction();
};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("fixed");
    } else {
        header.classList.remove("fixed");
    }
}
// end fixed header

// Start multiple selection form
function setAction(action){
    var form = document.getElementById('multipleSelectionForm');
    var actionInput = document.getElementById('action');
    actionInput.value = action;
    form.submit();
}

document.getElementById('checkAllOne').addEventListener('click', function() {
    let checkboxes = document.querySelectorAll('.row-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});
// End multiple selection form

