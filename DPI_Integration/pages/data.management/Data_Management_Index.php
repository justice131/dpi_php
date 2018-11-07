<!DOCTYPE html>
<html>
    <head>
        <title>Data Management</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--Template-->
        <link href="../../lib/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="../../css/navigator_style.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="../../css/dpi.css">
        <script type="text/javascript" src="../../common.scripts/settings.js"></script>
        <script>
            window.onload=function(){
                pageHeight = window.screen.height*heightRatio*0.92;
                document.getElementById("map").style.height = pageHeight + "px";
            }
        </script>
    </head>
    <body style="background-color:#F3F3F4;">
        <?php include("../../common.scripts/navigator.html"); ?>
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