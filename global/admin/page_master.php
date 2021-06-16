  <?php 
      include("header.php");
      include("navbar.php");
      include("sidebar.php")
     ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Page Master</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="col-10 card-title">DataTable with default features</h3>
              <a class=" col-2 btn btn-outline-primary" href="page_master_insert.php">INSERT</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>                 
                <tr class="text-center">
                  <!-- <th>Page Id</th> -->
                  <th>Title</th>                 
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                 <?php 
                    include'connection.php';
                    $qry="select * from page_master ";

                    $result=mysqli_query($con,$qry);

                    while($lst=mysqli_fetch_array($result)) {
                      
                    
                    echo" <tr class='text-center'>";
             /*       echo" <td>".$lst['page_id']."</td>"; */                  
                    echo" <td>".$lst['title']."</td>";   
                     echo" <td>".$lst['page_desc']."</td>";                                    
                    echo  "<td><a href='page_master_insert.php?update=1&p_id=". $lst['page_id']."'  class='far fa-edit'><b>Update</b></a> &nbsp
                    <br>
                    <a href='page_master_process.php?delete=1&p_id=". $lst['page_id']."' class='fas fa-trash-alt'><b>Delete</b></a> &nbsp
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
</div>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
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
<?php include("footer.php");?>
</body>
</html>
