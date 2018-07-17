<!DOCTYPE html>
<html>
    <head>
        <title>
            License Data
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
              <a><cite>License Data</cite></a>
            </span>
        </div>
        <div class="x-body">
          <div tabindex="300" class="btn btn-info btn-lg btn-file" >
                <i class="fa fa-folder-open"></i>  
                <span class="hidden-xs">Import …</span>
                <input id="file-3" type="file" onchange="import_data(this.files);">
            </div>
            <button type="button" class="btn btn-info btn-lg" onclick="delete_table();"><i class="layui-icon">&#xe640;</i>Delete Table</button>
            <table class="layui-table">
                <thead>
                     <tr>
                         <th>id</th>
                         <th>Basin_name</th>
                         <th>Category</th>
                         <th>AL</th>
                         <th>WaterType</th>
                         <th>purpose_des</th>
                         <th>WSP</th>
                         <th>WS</th>
                         <th>ShareComponent</th>
                         <th>Purpose</th>
                         <th>Longitude</th>
                         <th>Latitude</th>
                     <tr
                </thead>
                <tbody>
                <?php
                    include 'db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM license_data");  
                    $dataCount=mysqli_num_rows($result);   
                    for($i=0;$i<$dataCount;$i++){  
                        $result_arr=mysqli_fetch_assoc($result);  
                        $id=$result_arr['id'];  
                        $Basin_name=$result_arr['Basin_name'];  
                        $Category=$result_arr['Category']; 
                        $AL=$result_arr['AL'];
                        $WaterType=$result_arr['WaterType'];  
                        $purpose_des=$result_arr['purpose_des']; 
                        $WSP=$result_arr['WSP'];
                        $WS=$result_arr['WS'];
                        $ShareComponent=$result_arr['ShareComponent'];   
                        $Purpose=$result_arr['Purpose'];
                        $Longitude=$result_arr['Longitude'];
                        $Latitude=$result_arr['Latitude'];
                        echo "<tr><td>$id</td><td>$Basin_name</td><td>$Category</td>"
                            . "<td>$AL</td><td>$WaterType</td><td>$purpose_des</td>"
                            . "<td>$WSP</td><td>$WS</td><td>$ShareComponent</td>"
                            . "<td>$Purpose</td><td>$Longitude</td><td>$Latitude</td><tr>";
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
                    xhttp.open("POST", "tools/db_table_delete.php?table_name=license_data", true);
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
                req.open("POST", 'tools/db_table_import.php?table_name=license_data', true);
                req.send(form);
            }
        </script>            
    </body>
</html>

