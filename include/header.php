<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  <?php 
      if(!isset($_SESSION['user_type'])){
  ?>
  <link rel="stylesheet" href="assets/css/css/all.css">
  <link rel="stylesheet" href="assets/css/styles.css">
  <?php 
      }
      else{ 
  ?>
  <link rel="stylesheet" href="../../assets/css/css/all.css">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <?php
      }
  ?>
  <title>NJ Customized Glass Painting</title>
</head>
<body>