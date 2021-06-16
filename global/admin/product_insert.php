<?php include("header.php");
      include("connection.php");
?>

<script type="text/javascript">

  $(document).ready(function(){
    $("#category").change(function(){
      call_ajex(this.value);
    });
  });
</script>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include("navbar.php");?>
  <?php include("sidebar.php");?>
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Text Editors</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">

<form action="product_process.php<?php if(isset($_GET['pid'])) echo '?update=1&pid='.$_GET['pid']; ?>" method="post" enctype="multipart/form-data">
     
       <?php              
                    if(isset($_GET['pid']))
                    {                      
                      $qry = 'SELECT * from product_master where product_id ='.$_GET['pid'];
                      $result = mysqli_query($con,$qry);
                      $lst = mysqli_fetch_assoc($result);
                    }
       ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">

            <div class="card-header">
              <h3 class="card-title">Product Details</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>              
            </div>

            <div class="card-body pad ">
              <div class="row justify-content-center ">
                 <div  class="col-md-4 ">
                  <div class="form-group">
                        <label>Product category</label>
                        <select class="form-control" required="" id="category" name="cat">
                             <?php 
                            
                                  $qry1="SELECT * FROM  category ";
                                  $color=mysqli_query($con,$qry1);
                                 while ($color1=mysqli_fetch_assoc($color)) 
                                  { 
                                    $sel="";
                                    if ( $lst['cat_id'] == $color1['cat_id'] ) {
                                    echo "<script> call_ajex(".$lst['cat_id']."); </script>";
                                    $sel = "selected";
                                      }
                                    echo "<option $sel value='".$color1['cat_id']."'>".$color1['cat_name']."</option>";
                                  } ?>                                  
                        </select>
                    </div>                
                  </div>
                <div  class="col-md-4 ">
                  <div class="form-group">
                        <label>Product image</label>
                        <input type='file'  name='product_img' value="<?php if(isset($_GET['pid'])){  echo($lst['product_img']); } ?>" >
                       
                        
                    </div>                
                  </div>
                  <div class="col-md-4 ">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Name</label>
                      <input type="text" class="form-control" name="name" value="<?php if(isset($_GET['pid'])){  echo($lst['product_name']); } ?>" placeholder="Enter Product name">
                    </div>  
                  </div>
               </div> 
                <div class="row">
                  <div  class="col-md-4 ">
                  <div class="form-group">
                        <label>Product Material</label>
                        <select name="material" class="form-control" required="">
                           
                             <?php 
                                 
                                  $qry1="SELECT * FROM  product_material ";
                                  $color=mysqli_query($con,$qry1);
                                 while ($color1=mysqli_fetch_assoc($color)) 
                                  { 
($lst['material_id']==$color1['material_id'])? $sel = "selected" : $sel='';
echo "<option $sel value='{$color1['material_id']}'> {$color1['material_name']} </option>";
                                } ?>                                  
                             ?>
                        </select>
                    </div>                
                  </div>

                  <div  class="col-md-4 ">
                  <div class="form-group">
                        <label>Product Size</label>
                        <select name="size" class="form-control" required="">
                           
                             <?php 
                               
                                  $qry1="SELECT * FROM  product_size ";
                                  $color=mysqli_query($con,$qry1);
                                 while ($color1=mysqli_fetch_assoc($color)) 
                                  { 
                                  ($lst['size_id']==$color1['size_id'])? $sel = "selected" : $sel='';
                                  echo "<option $sel value='{$color1['size_id']}'> {$color1['product_size']} </option>";
                                  } ?>                                  
                        </select>
                    </div>                
                    </div> 
                    <div  class="col-md-4 ">
                     <div class="form-group">
                            <label>Product color</label>
                            <select name="color" class="form-control" required="">
                               
                                 <?php 
                                    
                                      $qry1="SELECT * FROM  product_color ";
                                      $color=mysqli_query($con,$qry1);
                                     while ($color1=mysqli_fetch_assoc($color)) 
                                      {
($lst['color_id']==$color1['color_id'])? $sel = "selected" : $sel='';
echo "<option $sel value='{$color1['color_id']}'> {$color1['color_name']} </option>";
                                       } ?>                                  
                                 ?>
                            </select>
                      </div>                
                    </div>
                  </div>
                  <div class="row">                   
             
                    <div class="col-md-4">
                      <div class="form-group">
                       <label for="exampleInputEmail1">Selling Price :</label>
                        <input type="text" class="form-control" name="selling_price" value="<?php if(isset($_GET['pid'])){  echo($lst['selling_price']); } ?>" placeholder="Enter selling price">
                      </div>  
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Offer Price :</label>
                          <input type="text" class="form-control" value="<?php if(isset($_GET['pid'])){  echo($lst['offer_price']); } ?>" name="offer_price" placeholder="Enter Offer price" >
                        </div>  
                    </div>
<!--                      <div  class="col-md-4 ">
                       <div class="form-group">
                              <label>Product Image</label>
                              <input type="file" name="pimg" class="form-control">
                        </div>                
                    </div>
 -->             
                 </div> 
                 <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <textarea  class="form-control col-12" style="width:100%;height:150px;" name="desc" placeholder="Enter product discription"><?php if(isset($_GET['pid'])){  echo($lst['product_discription']); } ?></textarea> 
                      </div>  
                   </div>
                 </div>
 
               <div class="row text-center">
                     <div class="col-md-12">                      
                        <button class="col-md-2 p-2 m-2 btn btn-outline-primary" type="Submit">Submit</button>
                        <button class="col-md-2 p-2 btn btn-outline-danger" type="Submit">Reset</button> 
                      </div>
                </div> 
              </div>            
             </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    </section>
  </div>

 <!--  <?php include("footer.php");?> -->