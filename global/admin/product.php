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
  var url = "product_ajax.php?id="+e;
  console.log(url);
  xhttp.open("GET", url , true);
  xhttp.send();
}   

 </script>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Detail</h1>
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
              <a class=" col-2 btn btn-outline-primary" href="product_insert.php">INSERT</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>                 
                <tr>
                  <th>Name</th>
                  <th>Image</th>

                  <th>Offer price </th>
                  <th>Selling price</th>
                  <th>Action</th>
                </tr>
                </thead>
                 <?php 
                    include'connection.php';
                    $qry="select * from product_master ";
                    $result=mysqli_query($con,$qry);
                    while($lst=mysqli_fetch_array($result)) {                   
                    echo" <tr>";
                    
                    echo"<td>".$lst['product_name']."</td>";
                    echo "<td ><img class='rounded-circle' src='./image/product/".$lst['product_img']."' style='height:150px;width:150px;'></td>";

                    echo" <td>".$lst['offer_price']."</td>";
                    echo" <td>".$lst['selling_price']."</td>";
                    echo  "<td><br><a class='far fa-edit' href='product_insert.php?update=1&pid=". $lst['product_id']."'><b>Update</b></a>&nbsp
                      <br><br><br>
                     <a class='far fa-trash-alt' href='product_process.php?delete=1&pid=". $lst['product_id']."'><b>Delete</b></a>
                     <a data-toggle='modal' data-target='#exampleModal'  class='far fa-eye' href='user_view.php?pid=". $lst['product_id']."'></a>
                     <a class='far fa-images' href='product_image.php?pid=". $lst['product_id']."'></a>

                   </td>";
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
    <?php include("footer.php") ?>
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
</body>
</html>
