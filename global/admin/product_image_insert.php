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
      <?php $tar = "?pid=".$_GET['pid']; ?>
      <form action="product_image_process.php<?php echo $tar; ?> " method=POST enctype="multipart/form-data" >
        <?php 
                    include 'connection.php';                    
                    if(isset($_GET['imgid']))
                    {                      
                      $qry = 'SELECT * from product_master where product_img ='.$_GET['imgid'];
                      $result = mysqli_query($con,$qry);
                      $lst = mysqli_fetch_assoc($result);
                    }
       ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">product Image Details</h3>
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
               <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="form-group">
                      <label>Image :</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="product_image[]" multiple>
                          <label class="custom-file-label" >Choose file</label>
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