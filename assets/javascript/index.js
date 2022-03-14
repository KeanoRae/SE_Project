function price_btn(element){
    let btn = document.querySelectorAll('.price-select');
    for (let i = 0; i < btn.length; i++) {
        btn[i].classList.remove('selected');
    }
    element.classList.add('selected');
    let price = document.querySelector('.selected').value;
    document.getElementById("baseprice").value = price;
    let qty = document.querySelector('#qtybox').value;
    document.getElementById("subtotal").value = Number(parseFloat(qty) * parseFloat(price)).toFixed(2);
    
    return;
}
//< for product page
function increase() {
  let textBox = document.getElementById("qtybox");
    if(textBox.value < 10){
      textBox.value++;
    }
    //let bprice = document.getElementById("baseprice").value;
    //document.getElementById("subtotal").value = Number(parseFloat(bprice) * parseFloat(textBox.value)).toFixed(2);
}    

function decrease() {
  let textBox = document.getElementById("qtybox");
  if(textBox.value > 1){
      textBox.value--;
    }
    let bprice = document.getElementById("baseprice").value;
    document.getElementById("subtotal").value = Number(parseFloat(bprice) * parseFloat(textBox.value)).toFixed(2);
}
// />


  function getaddons(element) {
    let res = document.getElementById("addons-price");
      if(element.classList.contains("active")){
        //add value to result
        res.value = parseInt(res.value) + parseInt(element.value);
      }
      else{
        //subtract value from result
        res.value = parseInt(res.value) - parseInt(element.value);
      }
  }


function checkall(selector) {
  let checkboxes = document.querySelectorAll('#cart-checkbox');
  for (let i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i] != selector)
          checkboxes[i].checked = selector.checked;
  }
}
  
function edit_info(btn){
  let input = document.querySelectorAll('#form-input');
    if (btn.classList.contains("clicked")){
      for (let i = 0; i < input.length; i++) {
        input[i].setAttribute("readonly", "");
      }
        btn.classList.remove("clicked");
        document.querySelector("#btn-text").innerHTML = "edit";
    }
    else{
      for (let i = 0; i < input.length; i++) {
        input[i].removeAttribute("readonly", "");
      }
      btn.classList.add("clicked");
      document.querySelector("#btn-text").innerHTML = "save";
    }
}

  
    //const actualBtn = document.getElementById('actual-btn');
    //const fileChosen = document.getElementById('file-chosen');
    //actualBtn.addEventListener('change', function(){
    //fileChosen.textContent = this.files[0].name
   // })


