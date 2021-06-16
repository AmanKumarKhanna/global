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
      </div>
    </section>

    <section class="content">
      <form action="offers_process.php<?php if(isset($_GET['oid'])) echo '?update=1&uid='.$_GET['oid']; ?> " method="post" enctype="multipart/form-data">
       <?php
              include 'connection.php';                    
              if(isset($_GET['cid']))              {                      
                $qry = 'SELECT * from category where cat_id ='.$_REQUEST['cid'];
                $result = mysqli_query($con,$qry);
                $lst = mysqli_fetch_assoc($result);              
                 
              }
            ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Offer Details</h3>
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
                    <label for="exampleInputEmail1">Select Product :</label>
                    <select class="form-control" name="pro_id">
<?php
$pro = mysqli_query($con , "select product_id,product_name from product_master");
while ($r = mysqli_fetch_assoc($pro)) {
  echo "<option value='{$r['product_id']}'>{$r['product_name']}</option>";
}
?>
                    </select>
                  </div>  
                </div>
                
                <div class="col-md-4">
                  <label>To time</label>
                      <div class="custom-file mb-3">
                          <input type="time" class="form-control" name="totime" value="">
                      </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Priority :</label>
                      <input type="number" class="form-control" name="priority" value="5">
                  </div>  
                </div>                
                <div class="col-md-4">
                  <label>Is Active</label>
                      <div class="custom-file mb-3">
                      <select class="form-control" name="status">
                        <option value="enable">enable</option>
                        <option value="disable">disable</option>
                      </select>
                      </div>
                </div>
              </div>



              <div class="row">                  
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Discription :</label>
                   <textarea class="form-control" name="o_desc"  placeholder="Enter Discription.."><?php if(isset($_GET['cid'])){  echo($lst['cat_desc']); } ?> </textarea>
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