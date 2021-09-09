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
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Admin Dashboard</h2>
                <h5>Welcome ! <?php echo $user_admin['first_name'] . " " . $user_admin['last_name'] ?? 'Tung Huynh' ?>,
                    Love to see you back.
                </h5>
            </div>
        </div>

        <!-- /. ROW  -->
        <hr/>
        <div class="row">
            <div class="col-sm-6 col-lg-offset-1">
                <a href="_create-users-admin.php">Create</a>
                <br>
                <br>
                <table class="table table-hover">
                    <tr>
                        <!-- Name -->
                        <th scope="col">
                            <span> First Name  </span>
                        </th>
                        <th scope="col">
                            <span> Last Name  </span>
                        </th>
                        <!-- Price -->
                        <th scope="col">
                            <span> User </span>
                        </th>
                        <th scope="col">
                            <span></span>
                        </th>
                        <th scope="col">
                            <span></span>
                        </th>
                    </tr>

                    <?php foreach ($usersAdmin_import as $item) { ?>
                        <tr>
                            <td scope="row">
                                <span><?php echo $item['first_name'] ?? "First Name"; ?></span>
                            </td>
                            <td scope="row">
                                <span><?php echo $item['last_name'] ?? "Last Name"; ?></span>
                            </td>
                            <td>
                                <span> <?php echo $item['ad_user'] ?? "Email"; ?></span>
                            </td>
                            <td>
                                <span> <a href="<?php printf('%s?admin_id=%s', '_edit-users-admin.php', $item['admin_id']); ?>">
                                        Edit</a>
                                </span>
                            </td>
                            <td>
                                <span> <a href="<?php printf('%s?admin_id=%s', '_delete-users-admin.php', $item['admin_id']); ?>">
                                        Delete</a>
                                </span>
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
