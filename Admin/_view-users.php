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
            <div class="row" >
                    <div class="col-md-3 col-sm-6 col-xs-6">           
                        <table  class="table">
                            
                            <tr>
                                <!-- Name -->
                                <th scope="col"> 
                                    <span> Name  </span>
                                </th>

                                <!-- Price -->
                                <th scope="col"> 
                                    <span> Email </span>
                                </th>
                                <th scope="col"> 
                                    <span></span>
                                </th>
                                <th scope="col"> 
                                    <span></span>
                                </th>
                                
                            </tr>

                            <tr>
                                <td scope="row"> 
                                    <span>1</span>
                                </td>
                                <td> 
                                    <span>1</span>
                                </td>
                                <td> 
                                    <span> <a href="#">Edit </a>  </span>
                                </td>
                                <td> 
                                    <span> <a href="#">Delete</a> </span>
                                </td>

                            </tr>
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
