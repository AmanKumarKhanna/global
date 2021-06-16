<?php 
      include("header.php");
      include("navbar.php");
      include("sidebar.php")
     ?>
<body class="hold-transition sidebar-mini">
<style type="text/css">
  .imgs{
    width: 50px;
    height: 50px;
    object-fit: cover;
  }
</style>
  <!-- Navbar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders Manager</h1>
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
              <h3 class="col-10 card-title">Orders</h3>
<!--               <a class=" col-2 btn btn-outline-primary" href="order_detail_insert.php">INSERT</a>
 -->            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>

                 
                <tr>
                  <th>User</th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Date</th>
                  <th>Order Status</th>
                  <th>Product Status</th>
                  
                </tr>
                </thead>

                 <?php 
                    include'connection.php';

                    $qry="SELECT od.* , pm.* , o.*, u.*
                          FROM order_detail od, product_master pm, orders o, user u
                          WHERE  o.order_id=od.order_id and od.product_id=pm.product_id and u.user_id=o.user_id"; 

                    $result=mysqli_query($con,$qry)or die(mysqli_error($con));
                    while($lst=mysqli_fetch_array($result)) {
                    ?>
                   <tr>
                    <td><?php echo $lst['user_name']; ?></td>
                    <td><img class="imgs" src="./image/product/<?php echo $lst['product_img']; ?>"></td>
                    <td><?php echo $lst['product_name']; ?></td>
                    <td><?php echo $lst['offer_price']; ?></td>
                    <td><?php echo $lst['product_qty']; ?></td>
                    <td><?php echo $lst['date']; ?></td>
                    <td><a href='order_detail_insert.php?update&order_id=<?php echo $lst['order_id']; ?>'><b><?php echo $lst['status']; ?></b></a></td>
                    <td><a href='order_detail_insert1.php?update&order_id=<?php echo $lst['order_id']; ?>'><b><?php echo $lst['m_status']; ?></b></a></td>
                   
                   
                   </tr>
                 <?php } ?>     
                <tbody>          
              </table>
            </div>
          </div>
        </div>
      </div>
      </section>
  </div>

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
<?php include("footer.php") ?>
</body>
</html>
