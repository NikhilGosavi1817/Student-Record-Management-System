<?php

include "connection.php";

if (isset($_POST['logout'])) {
  header('location:logout.php');
}

?>


<html>

<head>
  <title>my project</title>
  <meta charset="utf-8">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <style>
    .col-lg-12 img {
      float: left;
      width: 150px;
      height: 80px;
      background: #555;
    }

    .col-lg-12 h1 {
      position: relative;
      top: 10px;
      left: -70px;
    }
  </style>


</head>

<body>
  <div class="container-fluid">

    <div class="row " style="background-color:#2CEEF0;height:100px;">
      <div class="col-lg-12 " style="font-family: 'Times New Roman';margin-top:15px;">
        <img src="img/logo.png" alt="logo" />
        <h1 align="center">STUDENTS RECORD</h1>

        <form method="post">
          <button class="btn btn-danger" type="submit" align="right" style="margin-left:1300px; margin-top:30px " name="logout">LogOut</button>
        </form>

      </div>
    </div>
  </div>