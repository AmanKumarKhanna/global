<?php 
      include("header.php");
      include("navbar.php");
      include("sidebar.php")
     ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub-Category Detail</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="col-10 card-title">DataTable with default features</h3>
              <a class=" col-2 btn btn-outline-primary" href="sub_category_insert.php">INSERT</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                 
                <tr>
                 
                  <th>Name</th>
                  <th>Image</th>
                  <th>Description </th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php 
                    include'connection.php';
                    $qry="select * from sub_category ";

                    $result=mysqli_query($con,$qry);

                    while($lst=mysqli_fetch_array($result)) {
                      
                    
                    echo" <tr>";
                   
                    echo"<td>".$lst['sub_cat_name']."</td>";
                    echo "<td><img class='rounded-circle' src='./image/sub_category/".$lst['sub_cat_image']."' style='height:60px;width:60px;'></td>"; 

                    echo"<td>".$lst['sub_cat_desc']."</td>";          
                     echo "<td>
                          <a href='sub_category_insert.php?update=1&sid=".$lst['sub_cat_id']."' class='far fa-edit'></a>&nbsp
                          <a href='sub_category_process.php?delete=1&sid=".$lst['sub_cat_id']."' class='fas fa-trash-alt'></a>&nbsp
                        <a href='sub_category.php?view=".$lst['sub_cat_id']."' class='fas fa-eye'></a>
                        </td>";
                   echo "</tr>";

                 }
                ?>       
                  
                </tbody>
          
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>
  <!-- /.content-wrapper -->
    <?php include("footer.php") ?>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>

