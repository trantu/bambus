<?php
session_start();

$admin = parse_ini_file("admin.ini");
if($_SESSION['user']=='admin'&&$_SESSION['pass']==$admin['PASS']){

}else{
    header("Location: ../admin/login.php");
}
?>

<?php

class Myconnect extends SQLite3
{
    function __construct()
    {
        $this->open(dirname(dirname(__FILE__)).'/db/ArtikelOL.db3');
    }

    function getLogo(){

        $sql=<<<EOF
		SELECT Value FROM Settings_Online where Name='logo_banner';
EOF;

        $result=$this->query($sql);
        while($row = $result->fetchArray(SQLITE3_ASSOC) ){
            $ar=$row;
        }

        return $ar;
    }
}

$logo_arr = new Myconnect();
$logo=$logo_arr->getLogo();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Wasabi</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link href="css/xeditable.min.css" rel="stylesheet">
    <link href="css/color-picker.css" rel="stylesheet">

</head>
<style>
    .nav >li> a{
        color: #ffffff !important;

    }
    .group {
        background-color:#7e1dd3 !important;
    }
    .product {
        background-color:#7e1dd3 !important;
    }
    .setting {
        background-color:#7e1dd3 !important;
    }
    .order {
        background-color:#7e1dd3 !important;
    }
    .nav >li> a.active{

</style>
<body>
<div class="container" ng-app="App">

    <!-- Static navbar -->
    <nav class="navbar navbar-default" style="background-color: #005A00;color: #ffffff">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src='../<?php echo $logo["Value"] ?>'  width="200px;"height="150px" class="img-responsive" alt="" /></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a class="{{group}}" href="#groups">Groups</a></li>
                    <li><a class="{{product}}" href="#products">Products</a></li>
                    <li><a class="{{setting}}" href="#settings">Settings</a></li>
                    <li><a class="{{histor_order}}" href="#orders">History Orders</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../admin/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>



            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>


    <div ng-view id="ui-view" ></div>



</div> <!-- /container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/angular.js"></script>
<script src="js/color-picker.js"></script>
<script src="js/angular-route.min.js"></script>
<script src="js/xeditable.min.js"></script>
<script src="app.js"></script>
<script src="groups.controller.js"></script>
<script src="products.controller.js"></script>
<script src="settings.controller.js"></script>
<script src="orders.controller.js"></script>
<script src="services/groups.services.js"></script>
<script src="services/products.services.js"></script>
<script src="services/settings.services.js"></script>
<script src="services/orders.services.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.4/underscore-min.js"></script>

</body>
</html>




