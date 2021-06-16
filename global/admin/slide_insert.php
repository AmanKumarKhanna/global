<?php include("header.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("navbar.php");?>
  <?php include("sidebar.php");?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slide master</h1>
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
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Slide Details
              </h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body pad">
              <div class="row ">
              <div class="col-md-12 ">             
                  <div class="card-body ">
                    <form action="slide_process.php<?php if(isset($_GET['s_id'])) echo '?update=1&s_id='.$_GET['s_id']; ?> " method="post"  enctype="multipart/form-data">
                      <?php
                        include 'connection.php';                    
                        if(isset($_GET['s_id'])){                      
                          $qry = 'SELECT * from slide_master where slide_id ='.$_GET['s_id'];
                          $result = mysqli_query($con,$qry);
                          $lst = mysqli_fetch_assoc($result);
                        }
                      ?>
                      <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Slide title</label>
                              <input type="text" class="form-control" placeholder="enter slide title" name="slide_title"  value="<?php if(isset($_GET['s_id'])){  echo($lst['slide_title']); } ?>">
                            </div>
                        </div>
                        <div class="col-md-4 custom-file ">
                          <label>Slide Image</label>
                            <div class="custom-file mb-3">
                          <input type="file" class="custom-file-input" id="customFile" name="slide_image" value="<?php if(isset($_GET['s_id'])){  echo($lst['slide_image']); } ?>">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8 form-group">
                          <label>is active</label>
                          <select class="form-control" name="isactive">
                            <option value="1">enable</option>
                            <option value="0">disable</option>
                          </select>
                        </div>                       
                      </div>
                      <div class="row">
                      <div class="col-md-12">
                          <label>Slide Description</label>
                          <textarea class="form-control" placeholder="Description" name="slide_desc" ><?php if(isset($_GET['s_id'])){  echo($lst['slide_desc']); } ?></textarea>
                        </div>                       
                      </div>
                      <div class="row">   
                        <div class="col-md-12" align="center">
                          <div class="card-footer">
                            <button type="submit" class="col-2 btn btn-outline-info btn-round">Submit</button>&nbsp   
                            <input type="reset" name="reset" class="col-2 btn btn-outline-danger btn-round">
                          </div>
                         </div>
                      </div>
                     </form>
                   </div>
                  </div>
                </div>                     
               </div>
              </div>            
             </div>
            </div>
          </div>
    </section>
  </div>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
  <?php include("footer.php");?>