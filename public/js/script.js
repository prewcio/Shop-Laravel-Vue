
if (document.getElementById('dotpay')) {
    document.getElementById('dotpay').onclick = function () {
        document.getElementById('payment-type').innerText = "Płatność online - dotpay";
    }
}
if (document.getElementById('payu')) {
    document.getElementById('payu').onclick = function () {
        document.getElementById('payment-type').innerText = "Płatność online - PayU";
    }
}

if (document.getElementById('kurier')) {
    document.getElementById('kurier').onclick = function () {
        document.getElementById('delivery-type').innerText = "Kurier - InPost";
        document.getElementById('delPrice').innerText = 12.99;
        var value = (parseFloat(document.getElementById('cartPrice').innerText.replace(',', '')) + 12.99).toFixed(2);
        document.getElementById('finalPrice').innerText = value;
    }
}
if (document.getElementById('osobisty')) {
    document.getElementById('osobisty').onclick = function () {
        document.getElementById('delivery-type').innerText = "Odbiór Osobisty";
        document.getElementById('delPrice').innerText = (parseFloat(30.00).toFixed(2));
        var value = (parseFloat(document.getElementById('cartPrice').innerText.replace(',', '')) + 30.00).toFixed(2);
        document.getElementById('finalPrice').innerText = value;
    }
}

var menu = $('.nav-menu');
if(menu.length) {
    let links = menu.find('a');
    $(links).each(function (index) {
        if(this.href == window.location.href){
            console.log(index);
            $(links[index]).addClass('active');
        }
    })
}

var btntop = document.getElementById("btn-top");
window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (window.scrollY) {
        btntop.style.display = "block";
    } else {
        btntop.style.display = "none";
    }
}
function topFunction() {
    window.scrollTo(0, 0);
}

const HamburgerMenu = document.querySelector(".hamburger-menu");
const NavMenu = document.querySelector(".nav-menu");

HamburgerMenu.addEventListener("click", MenuMobile);

function MenuMobile() {
    HamburgerMenu.classList.toggle("active");
    NavMenu.classList.toggle("active");
}


const CloseLink = document.querySelectorAll(".close-link");

CloseLink.forEach(n => n.addEventListener("click", CloseMenu));

function CloseMenu() {
    HamburgerMenu.classList.remove("active");
    NavMenu.classList.remove("active");
}
