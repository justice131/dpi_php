<!DOCTYPE html>
<html>
    <head>
        <title>
            Town Water Supply
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/x-admin.css" media="all">
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="lib/bootstrap/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
        <script src="lib/layui/layui.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>Data in Visualization</cite></a>
              <a><cite>Town Water Supply</cite></a>
            </span>
        </div>
        <div class="x-body">
          <div tabindex="300" class="btn btn-info btn-lg btn-file" >
                <i class="fa fa-folder-open"></i>  
                <span class="hidden-xs">Import …</span>
                <input id="file-3" type="file" onchange="import_data(this.files);">
            </div>
            <button type="button" class="btn btn-info btn-lg" onclick="delete_table();"><i class="layui-icon">&#xe640;</i>Delete Table</button>
            <button type="button" class="btn btn-info btn-lg" onclick="download_table();"><i class="layui-icon">&#xe601;&nbsp;</i>Download</button>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>tws_id</th>
                        <th>catchment</th>
                        <th>exact_location</th>
                        <th>town_served</th>
                        <th>latitude</th>
                        <th>longitude</th>
                        <th>postcode</th>
                        <th>volume_treated</th>
                        <th>HBT_index</th>
                        <th>population_served</th>
                        <th>WSDI</th>
                        <th>water_supply_risk</th>
                        <th>health_risk_dueto_poor_water_quality</th>
                    <tr>
                </thead>
                <tbody>
                <?php
                    include 'db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM town_water_supply");  
                    $dataCount=mysqli_num_rows($result);   
                    for($i=0;$i<$dataCount;$i++){  
                        $result_arr=mysqli_fetch_assoc($result);  
                        $tws_id=$result_arr['tws_id'];  
                        $catchment=$result_arr['catchment'];  
                        $exact_location=$result_arr['exact_location'];  
                        $town_served=$result_arr['town_served']; 
                        $latitude=$result_arr['latitude'];
                        $longitude=$result_arr['longitude'];
                        $postcode=$result_arr['postcode'];  
                        $volume_treated=$result_arr['volume_treated']; 
                        $HBT_index=$result_arr['HBT_index'];
                        $population_served=$result_arr['population_served'];
                        $WSDI=$result_arr['WSDI'];  
                        $water_supply_risk=$result_arr['water_supply_risk']; 
                        $health_risk_dueto_poor_water_quality=$result_arr['health_risk_dueto_poor_water_quality']; 
                        echo "<tr><td>$tws_id</td><td>$catchment</td><td>$exact_location</td><td>$town_served</td>"
                            . "<td>$latitude</td><td>$longitude</td><td>$postcode</td>"
                            . "<td>$volume_treated</td><td>$HBT_index</td>"
                            . "<td>$population_served</td><td>$WSDI</td>"
                            . "<td>$water_supply_risk</td><td>$health_risk_dueto_poor_water_quality</td><tr>";
                        }
                ?>
                </tbody>
            </table>
        </div>
        <script>
            function delete_table(){
                var r=confirm("Are you sure to delete the current table?");
                if (r==true){
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            alert("Table Delete successfully.");
                            location.reload();
                        }
                    };
                    xhttp.open("POST", "tools/db_table_delete.php?table_name=town_water_supply", true);
                    xhttp.send();
                }
            }
            function import_data(files){
                var file = files[0];      
                form = new FormData();
                req = new XMLHttpRequest();
                form.append("file", file);
                req.onreadystatechange = function() {
                    if(req.readyState === 4 && req.status === 200) {
                        alert(this.responseText);
                        location.reload();
                    }
                };
                req.open("POST", 'tools/db_table_import.php?table_name=town_water_supply', true);
                req.send(form);
            }
            
            function download_table(){
                var req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                    if(req.readyState === 4 && req.status === 200) {
                        if(this.responseText=="1"){
                            window.open("output_files/town_water_supply.csv");
                        }else{
                            alert("Fail to output the table.");
                        }
                    }
                };
                req.open("POST", 'tools/db_table_output.php?table_name=town_water_supply', true);
                req.send();
            }
        </script>            
    </body>
</html>

