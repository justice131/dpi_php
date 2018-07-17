<!DOCTYPE html>
<html>
    <head>
        <title>DPI Water</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Template-->
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="css/style_1.css" rel="stylesheet">
        <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="css/dpi.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#F3F3F4;">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav">
                    <li class="nav-header text-center"> <a href="http://www.water.nsw.gov.au/" target="_blank" style="padding: 3px 0 10px"> <img src="images/nsw.png" alt="nsw" height="50"/> </a> </li>
                    <li class=""> <a href="index.php" target="_blank" data-toggle="tooltip" title="Home"><i class="glyphicon glyphicon-home"></i></a> </li>
                    <li class=""> <a href="Management_zone.php" target="_blank" data-toggle="tooltip" title="Water Management Zone"><i class="glyphicon glyphicon-tint"></i></a> </li>
                    <li class=""> <a href="Irrigation_module.php" target="_blank" data-toggle="tooltip" title="Irrigation"><i class="glyphicon glyphicon-leaf"></i></a> </li>
                    <li class=""> <a href="Mining_module.php" target="_blank" data-toggle="tooltip" title="Mining"><i class="glyphicon glyphicon-fire"></i></a> </li>
                    <li class=""> <a href="Town_water_power_gen_module.php" target="_blank" data-toggle="tooltip" title="Town Water & Power Generation"><i class="glyphicon glyphicon-flash"></i></a> </li>
                    <li class=""> <a href="Environmental_module.php" target="_blank" data-toggle="tooltip" title="Critical Environmental Assets"><i class="glyphicon glyphicon-tree-deciduous"></i></a> </li>
                    <li class=""> <a href="Data_Management_Index.php" target="_blank" data-toggle="tooltip" title="Data Management"><i class="glyphicon glyphicon-cog"></i></a> </li>
                </ul>
            </div>
	</nav>
        <div id="page-wrapper" class="gray-bg dashboard"  style="padding-bottom:5px">
                <div class="box-container" style="width:100%;height: 100%;" id="map_panel">
                        <div class="box">
                                <div class="box-title">
                                    <h4><b>Data Management</b></h4>
                                </div>
                                <div id="map" class="box-content">
                                    <object style="border:0px" type="text/x-scriptlet" data="Data_Management.php" width=100% height=100%></object>
                                </div>
                        </div>
                </div>
         </div>
    </body>
</html>