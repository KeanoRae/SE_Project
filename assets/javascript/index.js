function price_btn(element){
    let btn = document.querySelectorAll('.price-select');
    for (let i = 0; i < btn.length; i++) {
        btn[i].classList.remove('selected');
    }
    element.classList.add('selected');
    let price = document.querySelector('.selected').value;
    document.getElementById("baseprice").value = price;
    return;
}

function increase() {
    var textBox = document.getElementById("qtybox");
      if(textBox.value < 10){
        textBox.value++;
      }
  }    

  function decrease() {
    var textBox = document.getElementById("qtybox");
    if(textBox.value > 1){
        textBox.value--;
      }
  }
  
  function headtag(e){
    let btn = document.querySelectorAll('.head');
    for (let i = 0; i < btn.length; i++) {
        btn[i].classList.remove('headtag');
    }
    e.classList.add('headtag');
}