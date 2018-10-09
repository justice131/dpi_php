<!DOCTYPE html>
<html>
    <head>
        <title>
            LGA Data
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
              <a><cite>LGA Data</cite></a>
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
                        <th>lga_id</th>
                        <th>lga_name</th>
                        <th>catchment</th>
                        <th>proportion_in_macquarie_catchment</th>
                        <th>proportion_in_manning_catchment</th>
                        <th>proportion_in_backwater</th>
                        <th>proportion_in_bell</th>
                        <th>proportion_in_bullbodney</th>
                        <th>proportion_in_burrendong</th>
                        <th>proportion_in_campbells</th>
                        <th>proportion_in_coolbaggie</th>
                        <th>proportion_in_cooyal</th>
                        <th>proportion_in_ewenmar</th>
                        <th>proportion_in_fish</th>
                        <th>proportion_in_goolma</th>
                        <th>proportion_in_lawsons</th>
                        <th>proportion_in_little</th>
                        <th>proportion_in_lowerbogan</th>
                        <th>proportion_in_lowermacquarie</th>   
                        <th>proportion_in_lowertalbragar</th>
                        <th>proportion_in_macquarie</th>
                        <th>proportion_in_marra</th>
                        <th>proportion_in_marthaguy</th>
                        <th>proportion_in_maryvale</th>
                        <th>proportion_in_molong</th>
                        <th>proportion_in_piambong</th>
                        <th>proportion_in_pipeclay</th>
                        <th>proportion_in_queen</th>
                        <th>proportion_in_summerhill</th>
                        <th>proportion_in_turon</th>
                        <th>proportion_in_upperbogan</th>
                        <th>proportion_in_uppercudgegong</th>
                        <th>proportion_in_uppertallbragar</th>
                        <th>proportion_in_wambangalong</th>
                        <th>proportion_in_winburndale</th>
                        <th>proportion_in_avon</th>
                        <th>proportion_in_bowman</th>
                        <th>proportion_in_cooplacurripa</th>
                        <th>proportion_in_dingo</th>
                        <th>proportion_in_lowerbarnard</th>
                        <th>proportion_in_lowerbarrington</th>
                        <th>proportion_in_lowermanning</th>   
                        <th>proportion_in_manning</th>
                        <th>proportion_in_midmanning</th>
                        <th>proportion_in_myall</th>
                        <th>proportion_in_nowendoc</th>
                        <th>proportion_in_rowleys</th>
                        <th>proportion_in_upperbarnard</th>
                        <th>proportion_in_upperbarrington</th>
                        <th>proportion_in_uppergloucester</th>
                        <th>proportion_in_uppermanning</th>
                        <th>year_population</th>
                        <th>population</th>
                        <th>year_irrigation</th>
                        <th>irrigation_production</th>
                        <th>year_mining</th>
                        <th>mining_production</th>
                        <th>year_employment</th>
                        <th>employment_irrigation</th>
                        <th>employment_mining</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    include 'db.helper/db_connection_ini.php';
                    mysqli_select_db($conn, "dpi_project"); 
                    $result=mysqli_query($conn,"SELECT * FROM lga_data");  
                    $dataCount=mysqli_num_rows($result); 
                    for($i=0;$i<$dataCount;$i++){
                        $result_arr=mysqli_fetch_assoc($result); 
                        $lga_id=$result_arr['lga_id']; 
                        $lga_name=$result_arr['lga_name'];
                        $catchment=$result_arr['catchment'];
                        $proportion_in_macquarie_catchment=$result_arr['proportion_in_macquarie_catchment'];
                        $proportion_in_manning_catchment=$result_arr['proportion_in_manning_catchment'];
                        $proportion_in_backwater=$result_arr['proportion_in_backwater'];
                        $proportion_in_bell=$result_arr['proportion_in_bell'];
                        $proportion_in_bullbodney=$result_arr['proportion_in_bullbodney'];
                        $proportion_in_burrendong=$result_arr['proportion_in_burrendong'];
                        $proportion_in_campbells=$result_arr['proportion_in_campbells'];
                        $proportion_in_coolbaggie=$result_arr['proportion_in_coolbaggie'];
                        $proportion_in_cooyal=$result_arr['proportion_in_cooyal'];
                        $proportion_in_ewenmar=$result_arr['proportion_in_ewenmar'];
                        $proportion_in_fish=$result_arr['proportion_in_fish'];
                        $proportion_in_goolma=$result_arr['proportion_in_goolma'];
                        $proportion_in_lawsons=$result_arr['proportion_in_lawsons'];
                        $proportion_in_little=$result_arr['proportion_in_little'];
                        $proportion_in_lowerbogan=$result_arr['proportion_in_lowerbogan'];
                        $proportion_in_lowermacquarie=$result_arr['proportion_in_lowermacquarie'];   
                        $proportion_in_lowertalbragar=$result_arr['proportion_in_lowertalbragar'];
                        $proportion_in_macquarie=$result_arr['proportion_in_macquarie'];
                        $proportion_in_marra=$result_arr['proportion_in_marra'];
                        $proportion_in_marthaguy=$result_arr['proportion_in_marthaguy'];
                        $proportion_in_maryvale=$result_arr['proportion_in_maryvale'];
                        $proportion_in_molong=$result_arr['proportion_in_molong'];
                        $proportion_in_piambong=$result_arr['proportion_in_piambong'];
                        $proportion_in_pipeclay=$result_arr['proportion_in_pipeclay'];
                        $proportion_in_queen=$result_arr['proportion_in_queen'];
                        $proportion_in_summerhill=$result_arr['proportion_in_summerhill'];
                        $proportion_in_turon=$result_arr['proportion_in_turon'];
                        $proportion_in_upperbogan=$result_arr['proportion_in_upperbogan'];
                        $proportion_in_uppercudgegong=$result_arr['proportion_in_uppercudgegong'];
                        $proportion_in_uppertallbragar=$result_arr['proportion_in_uppertallbragar'];
                        $proportion_in_wambangalong=$result_arr['proportion_in_wambangalong'];
                        $proportion_in_winburndale=$result_arr['proportion_in_winburndale'];
                        $proportion_in_avon=$result_arr['proportion_in_avon'];
                        $proportion_in_bowman=$result_arr['proportion_in_bowman'];
                        $proportion_in_cooplacurripa=$result_arr['proportion_in_cooplacurripa'];
                        $proportion_in_dingo=$result_arr['proportion_in_dingo'];
                        $proportion_in_lowerbarnard=$result_arr['proportion_in_lowerbarnard'];
                        $proportion_in_lowerbarrington=$result_arr['proportion_in_lowerbarrington'];
                        $proportion_in_lowermanning=$result_arr['proportion_in_lowermanning'];
                        $proportion_in_manning=$result_arr['proportion_in_manning'];
                        $proportion_in_midmanning=$result_arr['proportion_in_midmanning'];
                        $proportion_in_myall=$result_arr['proportion_in_myall'];
                        $proportion_in_nowendoc=$result_arr['proportion_in_nowendoc'];
                        $proportion_in_rowleys=$result_arr['proportion_in_rowleys'];
                        $proportion_in_upperbarnard=$result_arr['proportion_in_upperbarnard'];
                        $proportion_in_upperbarrington=$result_arr['proportion_in_upperbarrington'];
                        $proportion_in_uppergloucester=$result_arr['proportion_in_uppergloucester'];
                        $proportion_in_uppermanning=$result_arr['proportion_in_uppermanning'];
                        $year_population=$result_arr['year_population'];
                        $population=$result_arr['population'];
                        $year_irrigation=$result_arr['year_irrigation'];
                        $irrigation_production=$result_arr['irrigation_production'];
                        $year_mining=$result_arr['year_mining'];
                        $mining_production=$result_arr['mining_production'];
                        $year_employment=$result_arr['year_employment'];
                        $employment_irrigation=$result_arr['employment_irrigation'];
                        $employment_mining=$result_arr['employment_mining'];
                        echo"<tr>"
                            . "<td>$lga_id</td>"
                            . "<td>$lga_name</td>"
                            . "<td>$catchment</td>"
                            . "<td>$proportion_in_macquarie_catchment</td>"
                            . "<td>$proportion_in_manning_catchment</td>"
                            . "<td>$proportion_in_backwater</td>"
                            . "<td>$proportion_in_bell</td>"
                            . "<td>$proportion_in_bullbodney</td>"
                            . "<td>$proportion_in_burrendong</td>"
                            . "<td>$proportion_in_campbells</td>"
                            . "<td>$proportion_in_coolbaggie</td>"
                            . "<td>$proportion_in_cooyal</td>"
                            . "<td>$proportion_in_ewenmar</td>"
                            . "<td>$proportion_in_fish</td>"
                            . "<td>$proportion_in_goolma</td>"
                            . "<td>$proportion_in_lawsons</td>"
                            . "<td>$proportion_in_little</td>"
                            . "<td>$proportion_in_lowerbogan</td>"
                            . "<td>$proportion_in_lowermacquarie</td>"   
                            . "<td>$proportion_in_lowertalbragar</td>"
                            . "<td>$proportion_in_macquarie</td>"
                            . "<td>$proportion_in_marra</td>"
                            . "<td>$proportion_in_marthaguy</td>"
                            . "<td>$proportion_in_maryvale</td>"
                            . "<td>$proportion_in_molong</td>"
                            . "<td>$proportion_in_piambong</td>"
                            . "<td>$proportion_in_pipeclay</td>"
                            . "<td>$proportion_in_queen</td>"
                            . "<td>$proportion_in_summerhill</td>"
                            . "<td>$proportion_in_turon</td>"
                            . "<td>$proportion_in_upperbogan</td>"
                            . "<td>$proportion_in_uppercudgegong</td>"
                            . "<td>$proportion_in_uppertallbragar</td>"
                            . "<td>$proportion_in_wambangalong</td>"
                            . "<td>$proportion_in_winburndale</td>"
                            . "<td>$proportion_in_avon</td>"
                            . "<td>$proportion_in_bowman</td>"
                            . "<td>$proportion_in_cooplacurripa</td>"
                            . "<td>$proportion_in_dingo</td>"
                            . "<td>$proportion_in_lowerbarnard</td>"
                            . "<td>$proportion_in_lowerbarrington</td>"
                            . "<td>$proportion_in_lowermanning</td>"   
                            . "<td>$proportion_in_manning</td>"
                            . "<td>$proportion_in_midmanning</td>"
                            . "<td>$proportion_in_myall</td>"
                            . "<td>$proportion_in_nowendoc</td>"
                            . "<td>$proportion_in_rowleys</td>"
                            . "<td>$proportion_in_upperbarnard</td>"
                            . "<td>$proportion_in_upperbarrington</td>"
                            . "<td>$proportion_in_uppergloucester</td>"
                            . "<td>$proportion_in_uppermanning</td>"
                            . "<td>$year_population</td>"
                            . "<td>$population</td>"
                            . "<td>$year_irrigation</td>"
                            . "<td>$irrigation_production</td>"
                            . "<td>$year_mining</td>"
                            . "<td>$mining_production</td>"
                            . "<td>$year_employment</td>"
                            . "<td>$employment_irrigation</td>"
                            . "<td>$employment_mining</td>"
                          . "</tr>"; 
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
                    xhttp.open("POST", "tools/db_table_delete.php?table_name=lga_data", true);
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
                req.open("POST", 'tools/db_table_import.php?table_name=lga_data', true);
                req.send(form);
            }
            
            function download_table(){
               var req = new XMLHttpRequest();
               req.onreadystatechange = function() {
                   if(req.readyState === 4 && req.status === 200) {
                       if(this.responseText=="1"){
                           window.open("output.files/lga_data.csv");
                       }else{
                           alert("Fail to output the table.");
                       }
                   }
               };
               req.open("POST", 'tools/db_table_output.php?table_name=lga_data', true);
               req.send();
            }
        </script>
    </body>
</html>

