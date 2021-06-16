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
            <h1>Category Detail</h1>
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
              <a class=" col-2 btn btn-outline-primary" href="category_insert.php">INSERT</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                 
                <tr class="text-center">
                  <th>Name</th>            
                  <th>Image</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>

                 <?php 
                    include'connection.php';
                    $qry="select * from category";

                    $result=mysqli_query($con,$qry);

                    while($lst=mysqli_fetch_array($result)) 
                    {                                      
                    echo" <tr class='text-center'>";
                    echo"<td>".$lst['cat_name']."</td>"; 
                    echo "<td><img class='rounded-circle' src='./image/category/".$lst['cat_image']."' style='height:60px;width:60px;'></td>";
                    echo "<td>".$lst['cat_desc']."</td>";
                    echo "<td>
                          <a href='category_insert.php?update=1&cid=".$lst['cat_id']."' class='far fa-edit'></a>&nbsp
                          <a href='category_process.php?delete=1&cid=".$lst['cat_id']."' class='fas fa-trash-alt'></a>&nbsp
                        <a href='category_code.php?view=".$lst['cat_id']."' class='fas fa-eye'></a>
                        </td>";
                    echo "</tr>";
                 }
                ?>                         
                <tbody>          
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
    <?php include("footer.php") ?>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
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
</html>
