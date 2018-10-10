<!DOCTYPE html>
<html>
    <head>
        <title>
            Whole Catchment Indices
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
                        <th>catchment_size</th>
                        <th>surface_water_size</th>
                        <th>groundwater_size</th>
                        <th>total_irrigated_areas</th>
                        <th>annual_production_value</th>
                        <th>annual_employment_number</th>
                        <th>annual_water_use</th>
                        <th>production_value_per_water_drop</th>
                        <th>total_mine_number</th>
                        <th>water_treatment_centre_number</th>
                        <th>affected_population</th>
                        <th>annual_power_generated</th>
                        <th>annual_town_water_sewerage_use</th>
                        <th>power_generation_water_use</th>
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
                        $catchment_size=$result_arr['catchment_size'];
                        $surface_water_size=$result_arr['surface_water_size'];
                        $groundwater_size=$result_arr['groundwater_size'];  
                        $total_irrigated_areas=$result_arr['total_irrigated_areas']; 
                        $annual_production_value=$result_arr['annual_production_value'];
                        $annual_employment_number=$result_arr['annual_employment_number'];
                        $annual_water_use=$result_arr['annual_water_use'];  
                        $production_value_per_water_drop=$result_arr['production_value_per_water_drop']; 
                        $total_mine_number=$result_arr['total_mine_number'];
                        $water_treatment_centre_number=$result_arr['water_treatment_centre_number'];
                        $affected_population=$result_arr['affected_population'];  
                        $annual_power_generated=$result_arr['annual_power_generated']; 
                        $annual_town_water_sewerage_use=$result_arr['annual_town_water_sewerage_use'];
                        $power_generation_water_use=$result_arr['power_generation_water_use'];
                        echo"<tr><td>$catchment_id</td><td>$catchment_name</td><td>$overall_fui</td><td>"
                            . "$overall_idsi</td><td>$overall_fmi</td><td>$overall_dei</td><td>$catchment_size</td><td>"
                            . "$surface_water_size</td><td>$groundwater_size</td><td>$total_irrigated_areas</td><td>"
                            . "$annual_production_value</td><td>$annual_employment_number</td><td>$annual_water_use</td><td>"
                            . "$production_value_per_water_drop</td><td>$total_mine_number</td><td>$water_treatment_centre_number</td><td>"
                            . "$affected_population</td><td>$annual_power_generated</td><td>$annual_town_water_sewerage_use</td><td>$power_generation_water_use</td></tr>"; 
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

