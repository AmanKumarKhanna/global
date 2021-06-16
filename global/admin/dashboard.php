<?php

	include("header.php");
	include("navbar.php");
	include("sidebar.php");
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Hello Admin</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php 
                    include'connection.php';
                    $qry="select * from product_master ";
                    $result=mysqli_query($con,$qry);
                    $r = mysqli_num_rows($result);
                    echo($r);  
                   ?>
                </h3>

                <p>Total-Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="http://localhost/global/global/admin/product.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php 
                    include'connection.php';
                    $qry="select * from order_detail ";
                    $result=mysqli_query($con,$qry);
                    $r = mysqli_num_rows($result);
                    echo($r);  
                   ?></sup></h3>

                <p>Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="http://localhost/global/global/admin/order_detail.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php 
                    include'connection.php';
                    $qry="select * from user ";
                    $result=mysqli_query($con,$qry);
                    $r = mysqli_num_rows($result);
                    echo($r);  
                   ?></h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="http://localhost/global/global/admin/user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php 
                    include'connection.php';
                    $qry="select * from offers ";
                    $result=mysqli_query($con,$qry);
                    $r = mysqli_num_rows($result);
                    echo($r);  
                   ?></h3>

                <p>Offers</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="http://localhost/global/global/admin/offers.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
      </div>
    </section>
    
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <?php include("footer.php"); ?>