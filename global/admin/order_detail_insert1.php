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
      <form action="order_detail_process1.php?update" method="post">
        <?php 
                    include 'connection.php';                    
                    if(isset($_GET['order_id'])) {
                      $qry = 'SELECT * from orders where order_id ='.$_GET['order_id'];
                      $result = mysqli_query($con,$qry);
                      $lst = mysqli_fetch_assoc($result);
                      echo "<input type='hidden' name='order_id' value='".$_GET['order_id']."'>";
                    }
       ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Order Details</h3>
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
                    <label for="exampleInputPassword1">Product Status</label>
                    <select class="form-control" name="m_status">
                      <option value="Pending">Pending</option>
                      <option value="unpaid/undeliverd" <?php echo ($lst['status']=='unpaid/undeliverd')? 'selected':''; ?>>Unpaid/Undeliverd</option>
                      <option value="Paid/Deliverd" <?php echo ($lst['status']=='Paid/Deliverd')? 'selected':''; ?>>Paid/Deliverd</option>
                    </select>
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