<!DOCTYPE html>
<html>
    <head>
        <title>
            Waste Water Treatment Centre
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
              <a><cite>Waste Water Treatment Centre</cite></a>
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
                        <th>centre_id</th>
                        <th>catchment</th>
                        <th>lga</th>
                        <th>treatment_plant</th>
                        <th>latitude</th>
                        <th>longitude</th>
                        <th>wwqi</th>
                        <th>treted_volume</th>
                    <tr>
                </thead>
                <tbody>
                <?php
                    include 'db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM waste_water_treatment_centre");  
                    $dataCount=mysqli_num_rows($result);   
                    for($i=0;$i<$dataCount;$i++){  
                        $result_arr=mysqli_fetch_assoc($result);
                        $centre_id=$result_arr['centre_id'];
                        $catchment=$result_arr['catchment'];  
                        $lga=$result_arr['lga']; 
                        $treatment_plant=$result_arr['treatment_plant'];
                        $longitude=$result_arr['longitude'];   
                        $latitude=$result_arr['latitude'];  
                        $wwqi=$result_arr['wwqi']; 
                        $treted_volume=$result_arr['treted_volume'];
                        echo "<tr><td>$centre_id</td><td>$catchment</td><td>$lga</td>"
                            . "<td>$treatment_plant</td><td>$longitude</td>"
                            . "<td>$latitude</td><td>$wwqi</td><td>$treted_volume</td><tr>";
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
                    xhttp.open("POST", "tools/db_table_delete.php?table_name=waste_water_treatment_centre", true);
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
                req.open("POST", 'tools/db_table_import.php?table_name=waste_water_treatment_centre', true);
                req.send(form);
            }
            
            function download_table(){
                var req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                    if(req.readyState === 4 && req.status === 200) {
                        if(this.responseText=="1"){
                            window.open("output.files/waste_water_treatment_centre.csv");
                        }else{
                            alert("Fail to output the table.");
                        }
                    }
                };
                req.open("POST", 'tools/db_table_output.php?table_name=waste_water_treatment_centre', true);
                req.send();
            }
        </script>            
    </body>
</html>

