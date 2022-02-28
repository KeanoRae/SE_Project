<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <link rel="stylesheet" href="assets/css/css/all.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <title>NJ Customized Glass Painting</title>
</head>
<body>
   <br>
   <br>
   <br>
   <br>
   <br>
   <input type="text" id="txt" value=""> 
   <div class="d-flex mx-0">
        <button type="button" class="d-inline-block me-3" name="addons-ch" value=30 data-bs-toggle="button">Character</button>
        <button type="button" class="d-inline-block me-3" name="addons-bd" value=30 data-bs-toggle="button">Background/Dedication</button>
    </div>

   <script>
       function price_btn( elem ){
            var btnEl = document.querySelectorAll('.price-select');
            for (var i = 0; i < btnEl.length; i++) {
                btnEl[i].classList.remove('selected');
            }
            elem.classList.add('selected');
            var x = document.querySelector('.selected').value;
            document.getElementById("txt").value = x;
            return;
        }
   </script>
   

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>