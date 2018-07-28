<!DOCTYPE html>
<html>
    <head>
        <title>
            Manning Flow Data
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
              <a><cite>Raw Data</cite></a>
              <a><cite>Manning Flow Data</cite></a>
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
                        <th>station_id</th>
                        <th>station_code</th>
                        <th>date</th>
                        <th>flow</th>                        
                    </tr>
                </thead>
                <tbody>
                <?php
                    include 'db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM manning_flow_data");  
                    $dataCount=mysqli_num_rows($result); 
                    for($i=0;$i<$dataCount;$i++){
                        $result_arr=mysqli_fetch_assoc($result);  
                        $station_id=$result_arr['station_id'];  
                        $station_code=$result_arr['station_code']; 
                        $date=$result_arr['date'];
                        $flow=$result_arr['flow'];                        
                        echo"<tr><td>$station_id</td><td>$station_code</td><td>$date</td><td>"
                            . "$flow</td></tr>"; 
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
                    xhttp.open("POST", "tools/db_table_delete.php?table_name=manning_flow_data", true);
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
                req.open("POST", 'tools/db_table_import.php?table_name=manning_flow_data', true);
                req.send(form);
            }
        </script>
    </body>
</html>

