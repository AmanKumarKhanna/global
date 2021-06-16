<?php include("header.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <section class="content">
      <form action="order_receipt_process.php<?php if(isset($_GET['receipt_id'])) echo '?update=1&receipt_id='.$_GET['receipt_id']; ?> " method="post">
        <?php 
                    include 'connection.php';                    
                    if(isset($_GET['receipt_id']))
                    {                      
                      $qry = "SELECT * from order_receipt where order_receipt_id =".$_GET['receipt_id'];
                      $result = mysqli_query($con,$qry);
                      $lst = mysqli_fetch_array($result);
                    }
       ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Order Receipt</h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="row">
                
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Product Quantity</label>
                    <input type="text" class="form-control" name="qty" value="<?php if(isset($_GET['receipt_id'])){  echo($lst['Product_qty']); } ?>" placeholder="Enter Product Qauntity">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputFile">Total</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="text" class="form-control" name="total_amount" placeholder="Total amount" value="<?php if(isset($_GET['receipt_id'])){  echo($lst['total_amount']); } ?>">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
       
               <div class="row text-center">
                     <div class="col-md-12 ">                      
                        <button class="col-md-2 btn btn-outline-primary" type="Submit">Submit</button>
                        <button class="col-md-2 btn btn-outline-danger" type="Reset">Reset</button> 
                      </div>
                </div>
              </div>            
             </div>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </form>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include("footer.php");?>