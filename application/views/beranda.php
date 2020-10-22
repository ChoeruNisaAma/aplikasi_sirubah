<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 ?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>


  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="<?= filter_var(base_url());?>assets/img/icon-lambang-kecamatan.png">
  <title>Beranda SIRUBAH</title>

  <!-- Custom fonts for this template-->
  <link href="<?= filter_var(base_url());?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= filter_var(base_url());?>assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= filter_var(base_url());?>assets/css/sb-admin-2.css" rel="stylesheet">

</head>

<div class="bg-gradient-intro">
  <div class="container col-lg-auto" align="center">
    <div class="mb-3 col-lg-auto">
    <img src="assets/img/banyumanik.jpeg" class="img-fluid">
  </div>

  <hr>

  <header class="mb-3 masthead text-white text-center">
    <div class="container">
      <div class="row">
        <div class="m-auto">
          <h1 class="font-weight-bold" style="font-family: arial-black; font-size: 60px;">SIRUBAH</h1>
          <h2 class="font-weight-bold" style="font-family: arial-black; font-size: 40px">Aplikasi Pengganti Surat Pengantar RT dan RW</h2>
          <h3 class="font-weight-bold" style="font-family: arial-black; font-size: 40px">Kecamatan Banyumanik</h3>
        </div>
      </div>
    </div>
  </header>

  <hr>
      

    <div class="col-lg-auto my-2" align="center">
        <!-- Small boxes (Stat box) -->
        <div class="row" align="center">
          <div class="card col-lg-2 mx-4 col-6 bg-gradient-red">
            <!-- small box -->
            <div class="small-box m-2">
              <div class="icon">
                  <i class="fa fa-users text-white fa-5x"></i>
                </div>
              <div class="text-white text-center">
                  <strong style="font-size: 30px">Administrator</strong>
                </div>
                <a href="<?= filter_var(base_url('Auth_admin')); ?>"class="text-white text-center">Masuk Disini<i class="fas fa-arrow-circle-right mx-2"></i></a>
              </div>
            </div>

            <!-- ./col -->
            <div class="card col-lg-2 mx-4 col-6 bg-gradient-blue">
              <!-- small box -->
              <div class="small-box m-2">
                <div class="icon">
                  <i class="fa fa-address-card text-white fa-5x"></i>
                </div>
                <div class="text-white text-center">
                  <strong style="font-size: 30px">Masyarakat</strong>
                </div>
                <a href="<?= filter_var(base_url('Auth_masyarakat')); ?>" class="text-center text-white">Masuk Disini<i class="fas fa-arrow-circle-right mx-2"></i></a>
              </div>
            </div>
            
          <div class="card col-lg-2 mx-4 col-6 bg-gradient-magenta">
            <!-- small box -->
            <div class="small-box m-2">
              <div class="icon">
                <i class="fa fa-user-circle text-white fa-5x"></i>
              </div>
              <div class="inner text-white text-center">
                <strong style="font-size: 30px">Pengurus RT</strong>
              </div>
                <a href="<?= filter_var(base_url('Login')); ?>"class="text-white text-center">Masuk Disini<i class="fas fa-arrow-circle-right mx-2"></i></a>
              </div>
            </div>

            <div class="card col-lg-2 mx-4 col-6 bg-gradient-gray">
            <!-- small box -->
            <div class="small-box m-2">
              <div class="icon">
                <i class="fa fa-user text-white fa-5x"></i>
              </div>
              <div class="inner text-white text-center">
                <strong style="font-size: 30px">Pengurus RW</strong>
              </div>
                <a href="<?= filter_var(base_url('Login/index')); ?>"class="text-white text-center">Masuk Disini<i class="fas fa-arrow-circle-right mx-2"></i></a>
              </div>
            </div>
            
            <div class="card col-lg-2 mx-4 col-6 bg-gradient-ikon">
            <!-- small box -->
            <div class="small-box m-2">
              <div class="icon">
                <i class="fa fa-university text-white fa-5x"></i>
              </div>
              <div class="inner text-white text-center">
                <strong style="font-size: 30px">Kelurahan</strong>
              </div>
                <a href="<?= filter_var(base_url('Login/index')); ?>"class="text-white text-center">Masuk Disini<i class="fas fa-arrow-circle-right mx-2"></i></a>
              </div>
            </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
