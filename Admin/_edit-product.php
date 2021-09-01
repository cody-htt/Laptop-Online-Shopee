<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

    include('header.php');
?>

<body>
<?php

    include('sub-menu.php');

    include('menuAdmin.php');
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome Jhon Deo , Love to see you back. </h5>
                    </div>
                </div> 

                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6">           
                        <form action="../Model/UpdateProductModel.php" method="GET">
                            <input type="text" placeholder="Name Product" id="nameproduct" name="nameproduct">  
                            <input type="text" placeholder="Desription" id="descrpition" name="descrpition">  
                            <input type="text" placeholder="Image" id="image" name="image">  
                            <input type="text" placeholder="Price" id="price" name="price">  

                            <input type="submit" value="Update product">
                        </form>
                        </div>
                    
                </div>

           </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
<?php

    include('footer.php');
?>
   
</body>
</html>
