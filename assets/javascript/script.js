$(function () {
    var current = location.pathname.split('/')[1];
    if (current === "") return;
    var menuItems = document.querySelectorAll('.menu-item a');
    for (var i = 0, len = menuItems.length; i < len; i++) {
        if (menuItems[i].getAttribute("href").indexOf(current) !== -1) {
            menuItems[i].className += "is-active";
        }
    }
})();