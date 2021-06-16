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
            <h1>Order Receipt Detail</h1>
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
              <a class=" col-2 btn btn-outline-primary" href="order_receipt_insert.php">INSERT</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                 
                <tr>
                
                  <th>Qauntity</th>
                  <th>Total Amount</th>
                  <th>Date&Time</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>View</th>
                </tr>
                </thead>

                 <?php 
                    include'connection.php';
                    $qry="select * from order_receipt ";

                    $result=mysqli_query($con,$qry);

                    while($lst=mysqli_fetch_array($result)) {                    
                            echo" <tr>";
                            echo"<td>".$lst['qty']."</td>";
                            echo"<td>".$lst['total_amount']."</td>";
                            echo" <td>".$lst['date']."</td>";
                            echo  "<td><a href='order_receipt_insert.php?update=1&receipt_id=". $lst['order_id']."'>Edit</a></td>";
                            echo  "<td><a href='order_receipt_process.php?delete=1&receipt_id=". $lst['order_id']."'>Delete</a></td>";
                            echo  "<td><a href='user_view.php?uid=". $lst['order_id']."'>View</a></td>";
                           echo "</tr>";

                 }
                ?>       
                <tbody>
              </table>
            </div>
          </div>
        </div>
     </div>
  </div>
    <?php include("footer.php") ?>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
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
