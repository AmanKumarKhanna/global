<?php include("header.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("sidebar.php");?>
  <?php include("connection.php");?>

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
      </div>
    </section>

    <section class="content">
      <form action="sub_category_process.php<?php if(isset($_GET['sid'])) echo '?update=1&sid='.$_GET['sid']; ?> " method="post" enctype="multipart/form-data">
       <?php
              include 'connection.php';                    
              if(isset($_GET['sid']))
              {                      
                $qry = 'SELECT * from sub_category where sub_cat_id ='.$_REQUEST['sid'];
                $result = mysqli_query($con,$qry);
                $lst = mysqli_fetch_assoc($result);                
              }
            ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title"> sub Category Details</h3>
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
                    <label for="exampleInputEmail1">Choose Category Name :</label>
                    
                      <select class="form-control" name="cat_id">                           
                             <?php                                  
                                  $qry1="SELECT * FROM category ";
                                  $res=mysqli_query($con,$qry1);
                                 while ($lst=mysqli_fetch_assoc($res))
                                  { ?>
                                   <option value="<?php  echo $lst['cat_id'];?>"><?php  echo $lst['cat_name'];?></option>                         
                                 <?php  } ?>                                  
                             ?>
                        </select>
                  </div>  
                </div>
                <div class="col-md-4">
                  <label>Sub category name</label>
                            <div class="form-group mb-3">
                          <input type="text" class="form-control" value="<?php if(isset($_GET['sid'])){  echo($lst['sub_cat_name']); } ?>" name="name" placeholder="Enter sub category name" >
                        </div>
                </div>
                <div class="col-md-4">
                  <label>Sub category Image</label>
                            <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="customFile" name="image" value="<?php if(isset($_GET['sid'])){  echo($lst['sub_cat_image']); } ?>">
                          <label class="custom-file-label" for="customFile">Choose file</label>

                        </div>
                </div>
              </div>
              <div class="row">                  
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Discription :</label>
                   <textarea class="form-control" name="desc"  placeholder="Enter Discription.."><?php if(isset($_GET['sid'])){  echo($lst['sub_cat_desc']); } ?> </textarea>
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