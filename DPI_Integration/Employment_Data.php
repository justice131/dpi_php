<!DOCTYPE html>
<html>
    <head>
        <title>
            Employment Data
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
              <a><cite>Employment Data</cite></a>
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
                        <th>employment_id</th>
                        <th>catchment_name</th>
                        <th>year</th>
                        <th>lga_name</th>
                        <th>lga_prop_catchment</th>
                        <th>industry_code</th>
                        <th>employee_count</th>
                    <tr>
                </thead>
                <tbody>
                <?php
                    include 'db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM employment_data");  
                    $dataCount=mysqli_num_rows($result);   
                    for($i=0;$i<$dataCount;$i++){  
                        $result_arr=mysqli_fetch_assoc($result);
                        $employment_id=$result_arr['employment_id'];
                        $catchment_name=$result_arr['catchment_name'];  
                        $year=$result_arr['year']; 
                        $lga_name=$result_arr['lga_name'];
                        $lga_prop_catchment=$result_arr['lga_prop_catchment'];
                        $industry_code=$result_arr['industry_code'];  
                        $employee_count=$result_arr['employee_count']; 
                        echo "<tr>"
                                . "<td>$employment_id</td>"
                                . "<td>$catchment_name</td>"
                                . "<td>$year</td>"
                                . "<td>$lga_name</td>"
                                . "<td>$lga_prop_catchment</td>"
                                . "<td>$industry_code</td>"
                                . "<td>$employee_count</td>"
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
                    xhttp.open("POST", "tools/db_table_delete.php?table_name=employment_data", true);
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
                req.open("POST", 'tools/db_table_import.php?table_name=employment_data', true);
                req.send(form);
            }
            
             function download_table(){
                var req = new XMLHttpRequest();
                req.onreadystatechange = function() {
                    if(req.readyState === 4 && req.status === 200) {
                        if(this.responseText=="1"){
                            window.open("output.files/employment_data.csv");
                        }else{
                            alert("Fail to output the table.");
                        }
                    }
                };
                req.open("POST", 'tools/db_table_output.php?table_name=employment_data', true);
                req.send();
            }
        </script>            
    </body>
</html>

