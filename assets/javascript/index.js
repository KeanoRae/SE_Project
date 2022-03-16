// <-- for character button on product page --> //
function price_btn(element){
    let btn = document.querySelectorAll('.price-select');
    for (let i = 0; i < btn.length; i++) {
        btn[i].classList.remove('selected');
    }
    element.classList.add('selected');
    let price = document.querySelector('.selected').value;
    document.getElementById("baseprice").value = price;
    let qty = document.querySelector('#qtybox').value;
    let addons = document.querySelector('#addons-price').value;
    document.getElementById("subtotal").value = ((parseFloat(qty) * parseFloat(price)) + parseFloat(addons)).toFixed(2);
    return;
}
// <--------------------------------> //

// <-- for quantity --> //
function increase() {
  let textBox = document.getElementById("qtybox");
    if(textBox.value < 10){
      textBox.value++;
    }
    let bprice = document.getElementById("baseprice").value;
    document.getElementById("subtotal").value = Number(parseFloat(bprice) * parseFloat(textBox.value)).toFixed(2);
}    

function decrease() {
  let textBox = document.getElementById("qtybox");
  if(textBox.value > 1){
      textBox.value--;
    }
    let bprice = document.getElementById("baseprice").value;
    document.getElementById("subtotal").value = Number(parseFloat(bprice) * parseFloat(textBox.value)).toFixed(2);
}
// <--------------------------------> //

// <-- for addons --> //
let name_arr = [];
function getaddons(element) {
  let sum = document.getElementById("addons-price");
  let name = document.getElementById("addons-name");
  let bprice = document.getElementById("baseprice").value;
  let qty = document.querySelector('#qtybox').value;
    if(element.classList.contains("active")){
      //add value to result
      sum.value = parseInt(sum.value) + parseInt(element.value);
      document.getElementById("subtotal").value = Number(parseFloat(bprice) * parseFloat(qty) + parseFloat(sum.value)).toFixed(2);
      name_arr.push(element.innerHTML); 
    }
    else{
      //subtract value from result
      sum.value = parseInt(sum.value) - parseInt(element.value);
      document.getElementById("subtotal").value = Number(parseFloat(bprice) * parseFloat(qty) + parseFloat(sum.value)).toFixed(2);
      if(name_arr.indexOf(element.innerHTML) == 0){
        name_arr.shift(element.innerHTML);
      }
      else{
        name_arr.pop(element.innerHTML);
      }
    }
    name.value = name_arr.join(", ");
}
// <--------------------------------> //

// <-- for checkbox in cart page --> //
function checkall(selector) {
  let checkboxes = document.querySelectorAll('#cart-checkbox');
  for (let i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i] != selector)
          checkboxes[i].checked = selector.checked;
  }
}
// <--------------------------------> //

// <-- for edit information in payment page --> //
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
// <--------------------------------> //
  




    //const actualBtn = document.getElementById('actual-btn');
    //const fileChosen = document.getElementById('file-chosen');
    //actualBtn.addEventListener('change', function(){
    //fileChosen.textContent = this.files[0].name
   // })


