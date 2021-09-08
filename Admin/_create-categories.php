<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

    include('header.php');
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('../Database/_add-Product.php');
}
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
                        <table>
                            <form action="_create-product.php" method="POST" enctype="multipart/form-data" id="add-product-form">
                            <tr>
                                <th><label for="nameproduct">Name Product:</label></th>
                                <td><input type="text" placeholder="Name Product" id="nameproduct" name="nameproduct"> </td>
                            </tr>
                                
                            <tr>
                                <th><label for="nameproduct">Brand Product:</label></th>
                                <td><input type="text" placeholder="Brand" id="brand" name="brand"> </td>
                            </tr>
                            
                            <tr>
                                <th><label for="nameproduct">Image Product:</label></th>
                                <td><input type="text" placeholder="Image" id="image" name="image"> </td>
                            </tr>


                            <tr>
                                <th><label for="nameproduct">Price Product:</label></th>
                                <td><input type="text" placeholder="Price" id="price" name="price"> </td>
                            </tr>

                            <!-- <tr>
                                <th><label for="nameproduct">Product Register:</label></th>
                                <td><input type="text" placeholder="Product register" id="register" name="register"> </td>
                            </tr> -->

                            <tr>
                                <th><label for="nameproduct">Discount Price:</label></th>
                                <td><input type="text" placeholder="Discount Price" id="discountprice" name="discountprice">   </td>
                            </tr>
                                

                            <tr>
                                <td></td>
                                <td><input type="submit" value="Create product"></td>
                            </tr>

                                
                            </form>  
                        </table>
                         


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
