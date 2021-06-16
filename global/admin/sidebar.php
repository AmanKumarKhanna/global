<?php include("header.php"); ?>
<style type="text/css">
  .custom_width{
    width: 20px !important;
  }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4 " style="position: fixed; top:0; background: linear-gradient(45deg, black, #ab4e4e);">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview ">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon  fas fa-tachometer-alt custom_width"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="user.php" class="nav-link ">
              <i class="nav-icon fas fa-user custom_width"></i>
              <p>User</p>
            </a>
          </li>

      <!--   <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas w-25 fa-align-justify custom_width"></i>
              <p>
                Product Relation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
        </li>  -->      

            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sub_category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub-Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="size.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>size</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="material.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Material</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="color.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Color</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
                <a href="product.php" class="nav-link">
                  <i class="fab fa-product-hunt custom_width"></i>
                  <p>Product</p>
                </a>
              </li>
            <li class="nav-item ">
            <a href="order_detail.php" class="nav-link ">
              <i class="nav-icon fas fa-th custom_width"></i>
              <p>Order Detail</p>
            </a>
          </li>
        <!--           
          <li class="nav-item ">
            <a href="order_receipt.php" class="nav-link ">
              <i class="fas fa-receipt custom_width"></i>
              <p>order receipt</p>
            </a>
          </li> 
        -->
          <li class="nav-item ">
            <a href="slide_master.php" class="nav-link ">
              <i class="nav-icon far fa-address-card custom_width"></i>
              <p>Slide master</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="page_master.php" class="nav-link ">
              <i class="fas fa-pager"></i>
              <p>Page master</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="offers.php" class="nav-link ">
              <i class="fas fa-pager"></i>
              <p>Offers</p>
            </a>
          </li>


          </li>
        </ul>
      </nav>
    </div>
</aside>