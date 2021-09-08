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
                        <a href="../registration.php">Create</a>  
                        <br>     
                        <br>              
                        <table  class="table">
                            
                            <tr>
                                <!-- Name -->
                                <th scope="col"> 
                                    <span> Name  </span>
                                </th>
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

                            <?php foreach ($user_import as $item) { ?>
                            <tr>
                                <td scope="row"> 
                                    <span><?php echo $item['first_name'] ?? "First Name"; ?></span>
                                </td>
                                <td scope="row"> 
                                    <span><?php echo $item['last_name'] ?? "Last Name"; ?></span>
                                </td>
                                <td> 
                                    <span> <?php echo $item['user_email'] ?? "Email"; ?></span>
                                </td>
                                <td> 
                                    <span> <a href="<?php printf('%s?user_id=%s', '_edit-user.php', $item['user_id']); ?>">Edit </a>  </span>
                                </td>
                                <td> 
                                    <span> <a href="<?php printf('%s?user_id=%s', '_delete-user.php', $item['user_id']); ?>">Delete</a> </span>
                                </td>

                            </tr>
                            <?php } //closing foreach function?>
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
