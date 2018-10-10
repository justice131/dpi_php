<!DOCTYPE html>
<html>
    <head>
        <title>
            Valley Daily Data
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
              <a><cite>Macquarie Valley and Dam Data</cite></a>
              <a><cite>Valley Daily Data</cite></a>
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
                        <th>row_id</th>
                        <th>valley_name</th>
                        <th>day</th>
                        <th>ONA_TWS</th>
                        <th>ONA_HS</th>
                        <th>ONA_GS</th>
                        <th>GS_OFA</th>
                        <th>FPH</th>
                        <th>annual_total_flow</th>
                        <th>annual_regulated_flow</th>
                    <tr>
                </thead>
                <tbody>
                <?php
                    include '../../db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM valley_daily_data");  
                    $dataCount=mysqli_num_rows($result);   
                    for($i=0;$i<$dataCount;$i++){  
                        $result_arr=mysqli_fetch_assoc($result);
                        $row_id=$result_arr['row_id'];
                        $valley_name=$result_arr['valley_name'];  
                        $day=$result_arr['day']; 
                        $ONA_TWS=$result_arr['ONA_TWS'];
                        $ONA_HS=$result_arr['ONA_HS'];
                        $ONA_GS=$result_arr['ONA_GS'];
                        $GS_OFA=$result_arr['GS_OFA'];  
                        $FPH=$result_arr['FPH']; 
                        $annual_total_flow=$result_arr['annual_total_flow'];
                        $annual_regulated_flow=$result_arr['annual_regulated_flow'];
                        echo "<tr>"
                                . "<td>$row_id</td>"
                                . "<td>$valley_name</td>"
                                . "<td>$day</td>"
                                . "<td>$ONA_TWS</td>"
                                . "<td>$ONA_HS</td>"
                                . "<td>$ONA_GS</td>"
                                . "<td>$GS_OFA</td>"
                                . "<td>$FPH</td>"
                                . "<td>$annual_total_flow</td>"
                                . "<td>$annual_regulated_flow</td>"
                            . "<tr>";
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
                    xhttp.open("POST", "../../tools/db_table_delete.php?table_name=valley_daily_data", true);
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
                req.open("POST", '../../tools/db_table_import.php?table_name=valley_daily_data', true);
                req.send(form);
            }
            
            function download_table(){
                var req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                    if(req.readyState === 4 && req.status === 200) {
                        if(this.responseText=="1"){
                            window.open("../../files/export.files/valley_daily_data.csv");
                        }else{
                            alert("Fail to output the table.");
                        }
                    }
                };
                req.open("POST", '../../tools/db_table_output.php?table_name=valley_daily_data', true);
                req.send();
            }
        </script>            
    </body>
</html>

