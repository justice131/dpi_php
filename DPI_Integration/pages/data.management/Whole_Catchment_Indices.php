<!DOCTYPE html>
<html>
    <head>
        <title>Whole Catchment Indices</title>
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
              <a><cite>Raw Data</cite></a>
              <a><cite>Whole Catchment Indices</cite></a>
            </span>
        </div>
        <div class="x-body">
            <div tabindex="300" class="btn btn-info btn-lg btn-file" >
                <i class="fa fa-folder-open"></i>  
                <span class="hidden-xs">Import …</span>
                <input id="file-3" type="file" onchange="import_data(this.files);">
            </div>
            <button type="button" class="btn btn-info btn-lg" onclick="delete_table();"><i class="layui-icon">&#xe640;&nbsp;</i>Delete</button>
            <button type="button" class="btn btn-info btn-lg" onclick="download_table();"><i class="layui-icon">&#xe601;&nbsp;</i>Download</button>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>catchment_id</th>
                        <th>catchment_name</th>
                        <th>overall_fui</th>
                        <th>overall_idsi</th>
                        <th>overall_fmi</th>
                        <th>overall_dei</th>
                        </tr>
                </thead>
                <tbody>
                <?php
                    include '../../db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM whole_catchment_indices");  
                    $dataCount=mysqli_num_rows($result); 
                    for($i=0;$i<$dataCount;$i++){
                        $result_arr=mysqli_fetch_assoc($result);
                        $catchment_id=$result_arr['catchment_id'];
                        $catchment_name=$result_arr['catchment_name']; 
                        $overall_fui=$result_arr['overall_fui'];
                        $overall_idsi=$result_arr['overall_idsi'];
                        $overall_fmi=$result_arr['overall_fmi'];  
                        $overall_dei=$result_arr['overall_dei']; 
                        echo"<tr><td>$catchment_id</td><td>$catchment_name</td><td>$overall_fui</td><td>"
                            . "$overall_idsi</td><td>$overall_fmi</td><td>$overall_dei</td></tr>"; 
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
                    xhttp.open("POST", "../../tools/db_table_delete.php?table_name=whole_catchment_indices", true);
                    xhttp.send();
                }
            }
            
            function import_data(files){
                var file = files[0];      
                var form = new FormData();
                var req = new XMLHttpRequest();
                form.append("file", file);
                req.onreadystatechange = function() {
                    if(req.readyState === 4 && req.status === 200) {
                        alert(this.responseText);
                        location.reload();
                    }
                };
                req.open("POST", '../../tools/db_table_import.php?table_name=whole_catchment_indices', true);
                req.send(form);
            }
            
            function download_table(){
                var req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                    if(req.readyState === 4 && req.status === 200) {
                        if(this.responseText=="1"){
                            window.open("../../files/export.files/whole_catchment_indices.csv");
                        }else{
                            alert("Fail to output the table.");
                        }
                    }
                };
                req.open("POST", '../../tools/db_table_output.php?table_name=whole_catchment_indices', true);
                req.send();
            }
        </script>
    </body>
</html>

