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
            <h1>offer Detail</h1>
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
              <a class=" col-2 btn btn-outline-primary" href="offers_form.php">INSERT</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr class="text-center">
                  <th>product_name</th>            
                  <th>description</th>
                  <th>Till Time</th>
                  <th>priority</th>
                  <th>status</th>
                  <th>Action</th>
                </tr>
                </thead>

                 <?php 
                    include'connection.php';
                    $qry="SELECT o.* , p.product_name FROM offers o , product_master p WHERE p.product_id=o.pro_id";
                    $result=mysqli_query($con,$qry);
                    while($lst=mysqli_fetch_array($result)) 
                    {                                      
                 // pro_id`, `o_desc`, `o_date`, `o_status`, `o_priority

              echo" <tr class='text-center'>
                      <td>".$lst['product_name']."</td>
                      <td style='width:30vw;'>".$lst['o_desc']."</td>
                      <td>".$lst['o_date']."</td>
                      <td>".$lst['o_priority']."</td>
                      <td>".$lst['o_status']."</td>
                      <td>
                          <a href='offers_form.php?update=1&oid=".$lst['o_id']."' class='far fa-edit'><b>Update</b></a>&nbsp
                          <br>
                          <a href='offers_process.php?delete=1&oid=".$lst['o_id']."' class='fas fa-trash-alt'><b>Delete</b></a>&nbsp
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
