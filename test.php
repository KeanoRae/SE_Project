<?php
    session_start();
    include('include/header.php');
    include('include/navbar.php');
?>

<br><br><br><br><br>

    <div class="content d-flex align-items-center justify-content-between">
        <div class="mx-3 d-flex align-items-center mt-2">
            <div class="checkbox">
                <input type="checkbox" id="cart-checkbox" class="shadow-none border-dark rounded-0" style="height:30px;width:30px;" value="">
            </div>
            <div class="box border border-dark ms-3" style="height: 124px;width: 112px;"></div>
            <div class="text ms-3 mx-3">
                <div class="mx-auto">
                    <p class="fs-4"></p>
                </div>
                <div id="qty" class="d-flex border border-dark" style="width:100px;">
                    <div role="button" class="add border-0 w-25 fs-3 text-center align-self-center px-2">+</div>
                    <input type="text" id="cbox" name="cbox" class="text-center border-0 fs-5" value="2" readonly style="height:50px;width:50px;">
                    <div role="button" class="sub border-0 w-25 fs-3 text-center align-self-center px-2">-</div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <!-- holds the price of the product -->
            <input type="text" id="price-holder" value="350">
            <!-- holds the value of add-ons -->
            <input type="text" id="addons-holder" class="mx-2" value="30">
            <!-- holds the subtotal value -->
            <input type="text" id="subtotal-holder" class="text-end border-0 fs-5 mb-1 me-5" value="730">
            <!-- button for modal -->
            <a class="border-0" style="background-color:#fff;" data-bs-toggle="modal" data-bs-target="#deletecart">
                <span class="iconify fs-1" data-icon="bi:x" style="color: #c4c4c4;"></span>
            </a>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <div class="content d-flex align-items-center justify-content-between">
        <div class="mx-3 d-flex align-items-center mt-2">
            <div class="checkbox">
                <input type="checkbox" id="cart-checkbox" class="shadow-none border-dark rounded-0" style="height:30px;width:30px;" value="">
            </div>
            <div class="box border border-dark ms-3" style="height: 124px;width: 112px;"></div>
            <div class="text ms-3 mx-3">
                <div class="mx-auto">
                    <p class="fs-4"></p>
                </div>
                <div id="qty" class="d-flex border border-dark" style="width:100px;">
                    <div role="button" class="add border-0 w-25 fs-3 text-center align-self-center px-2">+</div>
                    <input type="text" id="cbox" name="cbox" class="text-center border-0 fs-5" value="3" readonly style="height:50px;width:50px;">
                    <div role="button" class="sub border-0 w-25 fs-3 text-center align-self-center px-2">-</div>
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center">
            <!-- holds the price of the product -->
            <input type="text" id="price-holder" value="390">
            <!-- holds the value of add-ons -->
            <input type="text" id="addons-holder" class="mx-2" value="30">
            <!-- holds the subtotal value -->
            <input type="text" id="subtotal-holder" class="text-end border-0 fs-5 mb-1 me-5" value="1200">
            <!-- button for modal -->
            <a class="border-0" style="background-color:#fff;" data-bs-toggle="modal" data-bs-target="#deletecart">
                <span class="iconify fs-1" data-icon="bi:x" style="color: #c4c4c4;"></span>
            </a>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <!-------------------------------------------------------------------------------------->
    <div class="d-flex text-start me-2 mb-5">
        <div class="d-flex align-items-center ms-3 me-5">
            <input type="checkbox" id="selectall-box" onClick="checkall(this)" class="shadow-none border-dark rounded-0" style="height:30px;width:30px;">
            <label for="selectall-box" class="fs-4 ms-2">Select All</label>
        </div>
        <button id="cart-multidelete" class="text-center py-1 px-2 fs-4 border-0 btn-pink btn-shadow">
            <span style="width:35px;height:30px;" class="iconify" data-icon="bi:trash"></span> Delete
        </button>
    </div>
    <div class="checkout-box btn-shadow float-end me-4" style="width: 650px;height: 200px;background: rgba(196, 196, 196, 0.47);">
        <div class="d-flex justify-content-between mx-5 my-4">
            <label for="subtotal" class="fs-4">Subtotal</label>
            <input type="text" id="display-subtotal" name="subtotal" class="text-center border-0" placeholder="3" value="0">
        </div>
        <div class="d-flex justify-content-center">
            <button class="text-reset text-decoration-none text-center py-1 w-100 mx-5 fs-4 border-0 btn-pink btn-shadow">
                CHECK OUT ORDER
            </button>
        </div>
    </div>

<script>
    let add_btn = document.getElementsByClassName("add");
  let sub_btn = document.getElementsByClassName("sub");
  //increment
  for(let i = 0; i < add_btn.length; i++){
    let current_btn = add_btn[i];
    current_btn.addEventListener('click',function(event){
        let btn_clicked = event.target;
        let qty_element = btn_clicked.parentElement.children[1];
        let parent_element = btn_clicked.parentElement.parentElement.parentElement.parentElement.children[1];
        //console.log(parent_element);
        let cart_price = parent_element.children[0].value;
        let cart_addons = parseFloat(parent_element.children[1].value);
        let cart_subtotal_element = parent_element.children[2];
        let cart_subtotal = parent_element.children[2].value.replace('₱','');
        let new_value = parseInt(qty_element.value) + 1;
        if(new_value < 11){
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
  //decrement
  for(let i = 0; i < sub_btn.length; i++){
    let current_btn = sub_btn[i];
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
    let cart_checkbox = document.querySelectorAll("#cart-checkbox");
    let sum = 0;
    let new_sum = 0;
    let new_subtotal = 0;
    for(let i = 0; i < cart_checkbox.length; i++){
      cart_checkbox[i].addEventListener('click',function(event){
        let checkedbox = event.target;
        let subtotal_counter = document.getElementById("subtotal-holder");
        let new_subtotal_holder = checkedbox.parentElement.parentElement.parentElement.children[1].children[2];
        let subtotal = parseFloat(checkedbox.parentElement.parentElement.parentElement.children[1].children[2].value.replace('₱',''));
        let changed_price = parseFloat(checkedbox.parentElement.parentElement.parentElement.children[1].children[0].value.replace('₱',''));
        let changed_addons = parseFloat(checkedbox.parentElement.parentElement.parentElement.children[1].children[1].value.replace('₱',''));
        let checked_qty = checkedbox.parentElement.parentElement.parentElement.children[0].children[2].children[1].children[1];
        let inc_change = checkedbox.parentElement.parentElement.parentElement.children[0].children[2].children[1].children[0];
        let dec_change = checkedbox.parentElement.parentElement.parentElement.children[0].children[2].children[1].children[2];
        //document.getElementById("display-subtotal").value = '₱'+subtotal.toFixed(2);
        if(checkedbox.checked){
            //console.log("try = ", new_subtotal_holder.value);
            inc_change.addEventListener('click',function(event){
                new_subtotal = (changed_price * checked_qty.value) + changed_addons;
                new_subtotal_holder.value = new_subtotal;
                //subtotal = new_subtotal;
                //console.log("new subtotal = ", new_subtotal);
                new_sum = parseFloat(new_sum) + parseFloat(new_subtotal_holder.value);
                document.getElementById("display-subtotal").value = '₱'+new_sum;
                //console.log("subtotal = ", subtotal);
                sum = sum + subtotal;
                //console.log("sum = ", sum);
            });
            sum = parseFloat(sum) + subtotal;
            console.log("old subtotal = ", sum.toFixed(2));
            document.getElementById("display-subtotal").value = '₱'+sum.toFixed(2);
        }
        else{
            sum = parseFloat(sum) - subtotal;
        }
        dec_change.addEventListener('click',function(event){
            subtotal = (changed_price * checked_qty.value) + changed_addons;
            console.log("changed subtotal = ", subtotal.toFixed(2));
            sum = parseFloat(sum) + subtotal;
            //document.getElementById("display-subtotal").value = '₱'+sum.toFixed(2);
        });
      });
    }

    
</script>


<br><br><br><br><br>

<?php
    include('include/footer.php');
?>