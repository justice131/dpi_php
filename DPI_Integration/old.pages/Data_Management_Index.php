<!DOCTYPE html>
<html>
    <head>
        <title>DPI Water</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Template-->
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="css/navigator_style.css" rel="stylesheet">
        <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="css/dpi.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color:#F3F3F4;">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav">
                    <li class="nav-header text-center"> <a href="http://www.water.nsw.gov.au/" target="_blank" style="padding: 3px 0 10px"> <img src="images/nsw.png" alt="nsw" height="50"/> </a> </li>
                    <li class=""> <a href="index.php" target="_blank" data-toggle="tooltip" title="Home" style="padding: 5px 0px 5px 13.5px"><img src="images/home_icon.jpg" alt="irrigation" height="40"/></a> </li>
                    <li class=""> <a href="Irrigation_module.php" target="_blank" data-toggle="tooltip" title="Irrigation" style="padding: 5px 0px 5px 13.5px"><img src="images/irrigation_icon.jpg" alt="irrigation" height="40"/></a> </li>
                    <li class=""> <a href="Mining_module.php" target="_blank" data-toggle="tooltip" title="Mining" style="padding: 5px 0px 5px 13.5px"><img src="images/mining_icon.png" alt="Mining" height="40"/></a> </li>
                    <li class=""> <a href="Town_water_power_gen_module.php" target="_blank" data-toggle="tooltip" title="Town Water & Power Generation" style="padding: 5px 0px 5px 13.5px"><img src="images/town_water_icon.png" alt="Town Water" height="40"/></a> </li>
                    <li class=""> <a href="Environmental_module.php" target="_blank" data-toggle="tooltip" title="Critical Environmental Assets" style="padding: 5px 0px 5px 13.5px"><img src="images/environmental_icon.png" alt="Environmental" height="40"/></i></a> </li>
                    <li class=""> <a href="Data_Management_Index.php" target="_blank" data-toggle="tooltip" title="Data Management" style="padding: 5px 0px 5px 13.5px"><img src="images/data_icon.png" alt="Data" height="40"/></i></a> </li>
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