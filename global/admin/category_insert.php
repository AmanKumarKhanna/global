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
            <h1> Category Data Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <form action="category_process.php<?php if(isset($_GET['cid'])) echo '?update=1&uid='.$_GET['cid']; ?> " method="post" enctype="multipart/form-data">
       <?php
              include 'connection.php';                    
              if(isset($_GET['cid']))
              {                      
                $qry = 'SELECT * from category where cat_id ='.$_REQUEST['cid'];
                $result = mysqli_query($con,$qry);
                $lst = mysqli_fetch_assoc($result);
              
                 
              }
            ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Category Details</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="card-body pad">
              <input type="hidden" name="hdn">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Name :</label>
                    <input type="text" class="form-control" name="catname" value="<?php if(isset($_GET['cid'])){  echo($lst['cat_name']); } ?>" placeholder="Enter Category Name..">
                  </div>  
                </div>
                
                <div class="col-md-4">
                  <label> Image</label>
                            <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="customFile" name="catimage" value="<?php if(isset($_GET['cid'])){  echo($lst['cat_image']); } ?>">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                </div>
              </div>
              <div class="row">                  
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Discription :</label>
                   <textarea class="form-control" name="catdesc"  placeholder="Enter Discription.."><?php if(isset($_GET['cid'])){  echo($lst['cat_desc']); } ?> </textarea>
                  </div>  
                </div>
              </div>          
               <div class="row text-center">
                     <div class="col-md-12 ">                      
                        <button class="col-md-2 btn btn-outline-primary" type="Submit">Submit</button>
                        <button class="col-md-2 btn btn-outline-danger" type="Submit">Reset</button> 
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