<?php include("header.php");?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("connection.php");?>
  <?php include("navbar.php");?>
  
  <?php include("sidebar.php");?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Page Master</h1>
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
      <form action="page_master_process.php<?php if(isset($_GET['p_id'])) echo '?update=1&p_id='.$_GET['p_id']; ?> " method="post">
         <?php                  
              if(isset($_GET['p_id']))
              {                      
                $qry = 'SELECT * from page_master where page_id ='.$_GET['p_id'];
                $result = mysqli_query($con,$qry);
                $lst = mysqli_fetch_assoc($result);
              }
          ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                page Details
              </h3>
              <!-- tools box -->
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"title="Collapse"><i class="fas fa-minus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pad">
              <div class="row">
                <div class="col-sm-6 form-group">
                  <label>Page Title</label>
                  <input type="text" name="title" class="form-control " value="<?php if(isset($_GET['p_id'])){  echo($lst['title']); } ?>">
                </div>
              </div>
            <div class="row">
                <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control col-12" name="page_desc" >
                          <?php if(isset($_GET['p_id'])){  echo $lst['page_desc']; } ?>
                        </textarea> 
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

