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
            <h1>User Details</h1>
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
      <form action="user_proccess.php <?php if(isset($_GET['uid'])) {echo '?update=1&uid='.$_GET['uid']; } ?> " method="post" enctype="multipart/form-data">
        <?php
                    include 'connection.php';                    
                    if(isset($_GET['uid'])){                      
                      $qry = 'SELECT * from user where user_id ='.$_GET['uid'];
                      $result = mysqli_query($con,$qry);
                      $lst = mysqli_fetch_assoc($result);
                    }
                  ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                User Form
              </h3>
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
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control" name="name" value="<?php if(isset($_GET['uid'])){  echo ($lst['user_name']); } ?>" placeholder="Enter user name">
                  </div>  
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">E-mail id</label>
                    <input type="email" class="form-control" name="email" value="<?php if(isset($_GET['uid'])){  echo $lst['user_email']; }?>" placeholder="Enter email-id">
                  </div>
                </div>
                <div class="col-md-4">
                     <label>Category Image</label>
                            <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="customFile" name="userimage" value="<?php if(isset($_GET['cid'])){  echo($lst['user_image']); } ?>">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control" required="">
                           <option>Select Gender</option>
                           <option value="male" <?php if(isset($_GET['uid'])){  
                            if ($lst['user_gender']=="male") {
                              echo "selected";
                            }
                            } ?> >Male</option>
                           <option value="female" <?php if(isset($_GET['uid'])){  
                            if ($lst['user_gender']=="female") {
                              echo "selected";
                            }
                            } ?>
                            >Female</option>
                        </select>
                      </div>
                  </div>
                  
                  <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Date of Birth</label>
                        <input type="Date" class="form-control" value="<?php if(isset($_GET['uid'])){  echo $lst['user_dob']; } ?>" name="dob">
                      </div>  
                  </div>
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Contact No:</label>
                    <input type="number" class="form-control" name="contact" value="<?php if(isset($_GET['uid'])){  echo $lst['user_contact']; } ?>" placeholder="Enter content no">
                  </div>  
                </div>
              </div>
            <div class="row">              
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password:</label>
                    <input type="password" class="form-control" name="pwd" value="<?php if(isset($_GET['uid'])){  echo $lst['user_pwd']; } ?>" placeholder="Create Password">
                  </div>
                </div>                

             </div>
             <div class="row justify-content-center">
               <div class="col-md-12 ">                      
                        <label for="exampleInputEmail1">Address:-</label>
                        <textarea class="form-control " name="address"  placeholder="Enter Address"><?php if(isset($_GET['uid'])){  echo $lst['user_address']; } ?></textarea> 
                      </div>  
             </div> 
               <div class="row text-center mt-4">
                     <div class="col-md-12 ">                      
                        <button class="col-md-2 btn btn-outline-primary " type="Submit">Submit</button>&nbsp
                        <button class="col-md-2 btn btn-outline-danger" type="Submit">Reset</button> 
                      </div>
                </div>
              </div>            
             </div>
            </div>
          </div>
        </div>
      </div>
       </form>
    </section>
  </div>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>


<!-------------------footer ------------------->
  <?php include("footer.php");?> -->