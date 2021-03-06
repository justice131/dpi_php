<!DOCTYPE html>
<html>
    <head>
        <title>
            River Indices
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
              <a><cite>River Indices</cite></a>
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
                        <th>river_id</th>
                        <th>belong_catchment_id</th>
                        <th>river_name</th>
                        <th>river_type</th>
                        <th>lt_annual_extraction_limit</th>
                        <th>license_category_1</th>
                        <th>license_category_2</th>
                        <th>fui</th>
                        <th>idsi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include 'db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM river_indices");  
                    $dataCount=mysqli_num_rows($result);    
                    for($i=0;$i<$dataCount;$i++){  
                        $result_arr=mysqli_fetch_assoc($result);  
                        $river_id=$result_arr['river_id'];  
                        $belong_catchment_id=$result_arr['belong_catchment_id'];  
                        $river_name=$result_arr['river_name']; 
                        $river_type=$result_arr['river_type'];
                        $lt_annual_extraction_limit=$result_arr['lt_annual_extraction_limit'];
                        $license_category_1=$result_arr['license_category_1'];  
                        $license_category_2=$result_arr['license_category_2']; 
                        $fui=$result_arr['fui'];
                        $idsi=$result_arr['idsi'];        
                        echo "<tr><td>$river_id</td><td>$belong_catchment_id</td><td>$river_name</td>"
                            . "<td>$river_type</td><td>$lt_annual_extraction_limit</td><td>$license_category_1</td>"
                            . "<td>$license_category_2</td><td>$fui</td><td>$idsi</td><tr>";
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
                    xhttp.open("POST", "tools/db_table_delete.php?table_name=river_indices", true);
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
                req.open("POST", 'tools/db_table_import.php?table_name=river_indices', true);
                req.send(form);
            }
            
            function download_table(){
                var req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                    if(req.readyState === 4 && req.status === 200) {
                        if(this.responseText=="1"){
                            window.open("output.files/river_indices.csv");
                        }else{
                            alert("Fail to output the table.");
                        }
                    }
                };
                req.open("POST", 'tools/db_table_output.php?table_name=river_indices', true);
                req.send();
            }
        </script>
    </body>
</html>

