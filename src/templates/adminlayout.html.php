
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/local.css" />
    <link rel="stylesheet" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link rel="stylesheet" href="
    <?php
        session_start(); 
        echo($_SESSION["newtheme"]);
        session_write_close(); 
    ?>
    ">
    <link rel="shortcut icon" href="favicon.ico">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php">Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active"><a href="admin.php"><i class="fa fa-bullseye"></i> Welcome</a></li>
                    <li><a href="#"><i class="fa fa-tasks"></i> Categories</a>
                        <ul>
                            <li><a href="modifyCategory.php">Modify Category</a></li>
                            <li><a href="updateCategory.php">Update Category</a></li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-edit"></i> Products</a>
                        <ul>
                            <li><a href="insertProduct.php">Insert Product</a></li>
                            <li><a href="deleteProduct.php">Delete Product</a></li>
                        </ul>
                    </li>
                    <li><a href="settings.php"><i class="fa fa-wrench"></i> Settings</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
                        <?php 
                          require_once "classes/AdminAuthentication.php";
                          session_start();
                          if(isset($_SESSION["adminusername"])) {
                            $loginName = $_SESSION["adminusername"];
                            echo ($loginName);
                          }
                          else {
                            echo("Nobody");
                          }
                        ?>
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="settings.php"><i class="fa fa-gear"></i> Settings</a></li>
                            <li class="divider"></li>
                            <li><a href="adminlogout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    <!-- wrapper -->
        <div id="page-wrapper">
            <div class="row">
                <?= $output ?>  
            </div>
        </div>
    <!-- /#wrapper -->
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/plugins/jquery.validate/jquery.validate.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    <script src="js/admin.js"></script>
</body>
</html>
