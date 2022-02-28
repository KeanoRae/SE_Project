function price_btn(element){
    var btn = document.querySelectorAll('.price-select');
    for (var i = 0; i < btn.length; i++) {
        btn[i].classList.remove('selected');
    }
    element.classList.add('selected');
    var price = document.querySelector('.selected').value;
    document.getElementById("baseprice").value = price;
    return;
}

