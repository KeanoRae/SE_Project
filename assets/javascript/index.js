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
  let checkboxes = document.querySelectorAll('.cart-checkbox');
  for (let i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i] != selector){
        checkboxes[i].checked = selector.checked;
        if(checkboxes[i].checked){
          get_val(checkboxes[i]);
        }
      }    
  }
  display_value();
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
  let inc_btn = document.getElementsByClassName("inc");
  let dec_btn = document.getElementsByClassName("dec");
  //increment
  for(let i = 0; i < inc_btn.length; i++){
    let current_btn = inc_btn[i];
    current_btn.addEventListener('click',function(event){
        let btn_clicked = event.target;
        let qty_element = btn_clicked.parentElement.children[1];
        let parent_element = btn_clicked.parentElement.parentElement.parentElement.parentElement;
        //console.log(parent_element);
        let cart_price = parent_element.children[1].children[0].value;
        let cart_addons = parseFloat(parent_element.children[1].children[1].value);
        let cart_subtotal_element = parent_element.children[1].children[2];
        let cart_subtotal = parent_element.children[1].children[2].value.replace('₱','');
        let new_value = parseInt(qty_element.value) + 1;
        if(new_value < 11){
          qty_element.value = new_value;
          cart_subtotal = '₱' + ((cart_price * qty_element.value) + cart_addons).toFixed(2);
          cart_subtotal_element.value = cart_subtotal;
        }
        //console.log(cart_subtotal_element.value);
    });
  }
  //decrement
  for(let i = 0; i < dec_btn.length; i++){
    let current_btn = dec_btn[i];
    current_btn.addEventListener('click',function(event){
      let btn_clicked = event.target;
      let qty_element = btn_clicked.parentElement.children[1];
      let parent_element = btn_clicked.parentElement.parentElement.parentElement.parentElement.children[1];
      let cart_price = parent_element.children[0].value;
      let cart_addons = parseFloat(parent_element.children[1].value);
      let cart_subtotal_element = parent_element.children[2];
      let cart_subtotal = parent_element.children[2].value.replace('₱','');
      let new_value = parseInt(qty_element.value) - 1;
      if(new_value > 0){
        qty_element.value = new_value;
        cart_subtotal = '₱' + ((cart_price * qty_element.value)+cart_addons).toFixed(2);
        cart_subtotal_element.value = cart_subtotal;
      }
      else{
        qty_element.value = 1;
      }
      //console.log(cart_subtotal_element.value);
    });
  }


  // --------------------------------- //
  function get_val(box){
    let inc_button = box.parentElement.parentElement.parentElement.children[0].children[2].children[1].children[0];
    let dec_button = box.parentElement.parentElement.parentElement.children[0].children[2].children[1].children[2];
    display_value();
    inc_button.addEventListener('click',function(){
      display_value();
    });
    dec_button.addEventListener('click',function(){
      display_value();
    });
  }

  function display_value(){
    let cart_checkbox = document.querySelectorAll(".cart-checkbox");
    let val = 0;
    for(let i = 0; i < cart_checkbox.length; i++){
      if(cart_checkbox[i].checked){
        let box_val = cart_checkbox[i].parentElement.parentElement.parentElement.children[1].children[2].value.replace('₱','');
        val += parseFloat(box_val);
      }
    }
    document.getElementById("display-subtotal").value = '₱'+val.toFixed(2);
  }

  //function get_user_id(){
    //const table_user = document.getElementById("user-table");
    //for(let i = 0; i < table_user.rows.length; i++){
      //table_user.rows[i].addEventListener('click', function(){
        //let id = this.cells[0].innerHTML;
        //location.href = "../../users/admin/process/manage_user_process.php" + "?table_id=" + id;
      //});
    //}
  //}
  //window.onload = get_user_id();
    
  //const table_user = document.getElementById("user-table");
  //for(let i = 0; i < table_user.rows.length; i++){
    //table_user.rows[i].addEventListener('click', function(){
      //let fullname = this.cells[1].innerHTML.split(' ');
      //let lname = fullname.pop();
      //let fname = fullname.join(' ');
      //document.getElementById("fname").value = fname;
      //document.getElementById("lname").value = lname;
      //document.getElementById("username").value = this.cells[2].innerHTML;
      //document.getElementById("role").value = this.cells[3].innerHTML;
    //});
  //}
 
  function upload_receipt(){
    const receiptBtn = document.getElementById('receipt-btn');
    const fileChosen = document.getElementById('file-chosen');
    receiptBtn.addEventListener('change', function(){
      fileChosen.textContent = "receipt_"+this.files[0].name;
    });
  }
