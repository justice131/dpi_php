<!DOCTYPE html>
<html>
    <head>
        <title>
            Water Source
        </title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../css/x-admin.css" media="all">
        <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../lib/bootstrap/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
        <script src="../../lib/layui/layui.js" charset="utf-8"></script>
    </head>
    <body>
        <div class="x-nav">
            <span class="layui-breadcrumb">
              <a><cite>Data in Visualization</cite></a>
              <a><cite>Water Source</cite></a>
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
                        <th>id</th>
                        <th>catchment</th>
                        <th>water_source</th>
                        <th>longterm_extraction_limit</th>
                        <th>unreg_entitlement</th>
                        <th>mean_flow</th>
                        <th>FUI</th>
                        <th>DSI</th>
                        <th>irrigable_area</th>
                        <th>wetland_area</th>
                    <tr>
                </thead>
                <tbody>
                <?php
                    include '../../db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM water_source");  
                    $dataCount=mysqli_num_rows($result);   
                    for($i=0;$i<$dataCount;$i++){  
                        $result_arr=mysqli_fetch_assoc($result);  
                        $id=$result_arr['id'];  
                        $catchment=$result_arr['catchment'];  
                        $water_source=$result_arr['water_source']; 
                        $longterm_extraction_limit=$result_arr['longterm_extraction_limit'];
                        $unreg_entitlement=$result_arr['unreg_entitlement'];
                        $mean_flow=$result_arr['mean_flow'];                        
                        $FUI=$result_arr['FUI'];
                        $DSI=$result_arr['DSI'];   
                        $irrigable_area=$result_arr['irrigable_area'];
                        $wetland_area=$result_arr['wetland_area'];
                        echo "<tr><td>$id</td><td>$catchment</td><td>$water_source</td>"
                            . "<td>$longterm_extraction_limit</td><td>$unreg_entitlement</td><td>mean_flow</td>"
                            . "<td>$FUI</td><td>$DSI</td>"
                            . "<td>$irrigable_area</td><td>$wetland_area</td><tr>";
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
                    xhttp.open("POST", "../../tools/db_table_delete.php?table_name=water_source", true);
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
                req.open("POST", '../../tools/db_table_import.php?table_name=water_source', true);
                req.send(form);
            }
            
            function download_table(){
                var req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                    if(req.readyState === 4 && req.status === 200) {
                        if(this.responseText=="1"){
                            window.open("../../files/export.files/water_source.csv");
                        }else{
                            alert("Fail to output the table.");
                        }
                    }
                };
                req.open("POST", '../../tools/db_table_output.php?table_name=water_source', true);
                req.send();
            }
        </script>            
    </body>
</html>

