<?php 
      include("header.php");
      include("navbar.php");
      include("sidebar.php")
     ?>
 <script type="text/javascript">
  function loadDoc(e) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("show_user_data").innerHTML =
      this.responseText;
    }
  };
  var url = "user_ajex.php?id="+e;
  console.log(url);
  xhttp.open("GET", url , true);
  xhttp.send();
}   

 </script>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Tables</h1>
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
              <a class=" col-2 btn btn-outline-primary" href="user_insert.php">INSERT</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>                 
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Image</th>
                  <th>contact</th>
                   <th>User type</th>
                  <th>Action</th>
                </tr>
                </thead>
                 <?php 
                    include'connection.php';
                    $qry="SELECT * FROM user ORDER BY user_name DESC";

                    $result=mysqli_query($con,$qry);

                    while($lst=mysqli_fetch_assoc($result)) {
                      
                    
                    echo" <tr>";
                    echo "<td>".$lst['user_name']."</td>";
                    echo "<td>".$lst['user_email']."</td>";
                    echo "<td ><img class='rounded-circle' src='./image/user/".$lst['user_image']."' style='height:80px;width:80px;'></td>";                   
                   
                    echo" <td>".$lst['user_contact']."</td>"; 
                     echo "<td class='text-center'>".$lst['user_type']."</td>";                    
                    echo  "<td><a href='user_insert.php?update=1&uid=". $lst['user_id']."'  class='far fa-edit'><b>Update</b></a>&nbsp
                     <a href='user_proccess.php?delete=1&uid=". $lst['user_id']."' class='fas fa-trash-alt'><b>Delete</b></a>&nbsp
                     <a data-toggle='modal' data-target='#exampleModal' href='user.php?uid=". $lst['user_id']."' onClick='loadDoc(". $lst['user_id'].")' class='fas fa-eye'></a></td>";
                   echo "</tr>";
                 }
                ?>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body text-center" id="show_user_data">

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

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
<script>
$('#exampleModal').on('hidden.bs.modal', function (e) {
   $('#exampleModal modal-body').load('@Url.Action("mypartial")');
})

</script>

<?php include("footer.php");?>
</body>
</html>
