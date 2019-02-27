<?php
include 'db_table_create.php';

if($_FILES["file"]["type"] == "application/vnd.ms-excel"){
    if ($_FILES["file"]["error"] > 0){
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }else{
        //Save the uploaded file
        $save_path = "../files/upload.files/".date("YmdHis",time())."_".$_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"],$save_path);
        //Read the file
        $data = file_list_reader($save_path);       
        //Variable initiation
        $start =1;
        $query_per_time = 1000;
        $row_num = count($data);
        $loop_times = ceil($row_num/$query_per_time);
        $table_name = $_GET['table_name'];
        mysqli_select_db($conn, "dpi_project");
        
        if ($table_name == "whole_catchment_indices"){
            $sql = "truncate table whole_catchment_indices;";
            mysqli_query($conn,$sql);
            $col_num_s = 5;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into whole_catchment_indices(catchment_name,overall_fui,overall_idsi,overall_fmi,overall_dei)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "lga_data"){
            $sql = "truncate table lga_data;";
            mysqli_query($conn,$sql);
            $col_num_s = 59;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into lga_data("
                        ."lga_name,"
                        ."catchment,"
                        ."proportion_in_macquarie_catchment,"
                        ."proportion_in_manning_catchment,"
                        ."proportion_in_backwater,"
                        ."proportion_in_bell,"
                        ."proportion_in_bullbodney,"
                        ."proportion_in_burrendong,"
                        ."proportion_in_campbells,"
                        ."proportion_in_coolbaggie,"
                        ."proportion_in_cooyal,"
                        ."proportion_in_ewenmar,"
                        ."proportion_in_fish,"
                        ."proportion_in_goolma,"
                        ."proportion_in_lawsons,"
                        ."proportion_in_little,"
                        ."proportion_in_lowerbogan,"
                        ."proportion_in_lowermacquarie,"   
                        ."proportion_in_lowertalbragar,"
                        ."proportion_in_macquarie,"
                        ."proportion_in_marra,"
                        ."proportion_in_marthaguy,"
                        ."proportion_in_maryvale,"
                        ."proportion_in_molong,"
                        ."proportion_in_piambong,"
                        ."proportion_in_pipeclay,"
                        ."proportion_in_queen,"
                        ."proportion_in_summerhill,"
                        ."proportion_in_turon,"
                        ."proportion_in_upperbogan,"
                        ."proportion_in_uppercudgegong,"
                        ."proportion_in_uppertallbragar,"
                        ."proportion_in_wambangalong,"
                        ."proportion_in_winburndale,"
                        ."proportion_in_avon,"
                        ."proportion_in_bowman,"
                        ."proportion_in_cooplacurripa,"
                        ."proportion_in_dingo,"
                        ."proportion_in_lowerbarnard,"
                        ."proportion_in_lowerbarrington,"
                        ."proportion_in_lowermanning,"   
                        ."proportion_in_manning,"
                        ."proportion_in_midmanning,"
                        ."proportion_in_myall,"
                        ."proportion_in_nowendoc,"
                        ."proportion_in_rowleys,"
                        ."proportion_in_upperbarnard,"
                        ."proportion_in_upperbarrington,"
                        ."proportion_in_uppergloucester,"
                        ."proportion_in_uppermanning,"
                        ."year_population,"
                        ."population,"
                        ."year_irrigation,"
                        ."irrigation_production,"
                        ."year_mining,"
                        ."mining_production,"
                        ."year_employment,"
                        ."employment_irrigation,"
                        ."employment_mining)values("
                            . "\"".$data[$i][0]."\","
                            . "\"".$data[$i][1]."\","
                            . "\"".$data[$i][2]."\","
                            . "\"".$data[$i][3]."\","
                            . "\"".$data[$i][4]."\","
                            . "\"".$data[$i][5]."\","
                            . "\"".$data[$i][6]."\","
                            . "\"".$data[$i][7]."\","
                            . "\"".$data[$i][8]."\","
                            . "\"".$data[$i][9]."\","
                            . "\"".$data[$i][10]."\","
                            . "\"".$data[$i][11]."\","
                            . "\"".$data[$i][12]."\","
                            . "\"".$data[$i][13]."\","
                            . "\"".$data[$i][14]."\","
                            . "\"".$data[$i][15]."\","
                            . "\"".$data[$i][16]."\","
                            . "\"".$data[$i][17]."\","
                            . "\"".$data[$i][18]."\","
                            . "\"".$data[$i][19]."\","
                            . "\"".$data[$i][20]."\","
                            . "\"".$data[$i][21]."\","
                            . "\"".$data[$i][22]."\","
                            . "\"".$data[$i][23]."\","
                            . "\"".$data[$i][24]."\","
                            . "\"".$data[$i][25]."\","
                            . "\"".$data[$i][26]."\","
                            . "\"".$data[$i][27]."\","
                            . "\"".$data[$i][28]."\","
                            . "\"".$data[$i][29]."\","
                            . "\"".$data[$i][30]."\","
                            . "\"".$data[$i][31]."\","
                            . "\"".$data[$i][32]."\","
                            . "\"".$data[$i][33]."\","
                            . "\"".$data[$i][34]."\","
                            . "\"".$data[$i][35]."\","
                            . "\"".$data[$i][36]."\","
                            . "\"".$data[$i][37]."\","
                            . "\"".$data[$i][38]."\","
                            . "\"".$data[$i][39]."\","
                            . "\"".$data[$i][40]."\","
                            . "\"".$data[$i][41]."\","
                            . "\"".$data[$i][42]."\","
                            . "\"".$data[$i][43]."\","
                            . "\"".$data[$i][44]."\","
                            . "\"".$data[$i][45]."\","
                            . "\"".$data[$i][46]."\","
                            . "\"".$data[$i][47]."\","
                            . "\"".$data[$i][48]."\","
                            . "\"".$data[$i][49]."\","
                            . "\"".$data[$i][50]."\","
                            . "\"".$data[$i][51]."\","
                            . "\"".$data[$i][52]."\","
                            . "\"".$data[$i][53]."\","
                            . "\"".$data[$i][54]."\","
                            . "\"".$data[$i][55]."\","
                            . "\"".$data[$i][56]."\","
                            . "\"".$data[$i][57]."\","
                            . "\"".$data[$i][58]."\");";
                    mysqli_query($conn,$sql);   
                }
            }
        }else if ($table_name == "town_water_supply"){
            $sql = "truncate table town_water_supply;";
            mysqli_query($conn,$sql);
            $col_num_s = 13;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into town_water_supply(catchment,exact_location,town_served,latitude,longitude,postcode,volume_treated,HBT_index,population_served,gross_regional_product,WSDI,Risk,Opportunity)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\",\"".$data[$i][8]."\",\"".$data[$i][9]."\",\"".$data[$i][10]."\",\"".$data[$i][11]."\",\"".$data[$i][12]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "water_source"){
            $sql = "truncate table water_source;";
            mysqli_query($conn,$sql);
            $col_num_s = 13;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into water_source(catchment,water_source,longterm_extraction_limit,unreg_entitlement,mean_flow,FUI,DSI,irrigable_area,wetland_area,infrastructure_upgrade_schedule,estimated_infrastructure_upgrade,average_risk,max_risk)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\",\"".$data[$i][8]."\",\"".$data[$i][9]."\",\"".$data[$i][10]."\",\"".$data[$i][11]."\",\"".$data[$i][12]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "valley_summary"){
            $sql = "truncate table valley_summary;";
            mysqli_query($conn,$sql);
            $col_num_s = 4;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into valley_summary(valley_name,Entitlement_GS,NSW_share_ATF,dam_names)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "valley_yearly_data"){
            $sql = "truncate table valley_yearly_data;";
            mysqli_query($conn,$sql);
            $col_num_s = 5;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into valley_yearly_data(valley_name,year,balance,diversion,carry_over)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\");";
                    mysqli_query($conn,$sql);
                }
            }       
        }else if ($table_name == "valley_daily_data"){
            $sql = "truncate table valley_daily_data;";
            mysqli_query($conn,$sql);
            $col_num_s = 9;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($loop_time=0; $loop_time<$loop_times;$loop_time++){
                $end = $start + $query_per_time;
                if($end > $row_num){
                    $end = $row_num;
                }
                $sql="insert delayed into valley_daily_data(valley_name,day,ONA_TWS,ONA_HS,ONA_GS,GS_OFA,FPH,annual_total_flow,annual_regulated_flow)values";
                for($i=$start;$i<$end;$i++){
                    $col_num = count($data[$i]);
                    if($col_num_s==$col_num){
                        $sql .= "(\"";
                        $sql .= $data[$i][0]."\",STR_TO_DATE('".$data[$i][1]."', '%d/%m/%Y'),\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\""
                        .$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\",\"".$data[$i][8]."\"";
                        $sql .= '),';
                    }
                }
                $sql = substr($sql,0,strlen($sql)-1).";";
                mysqli_query($conn,$sql);
                $start += $query_per_time;
            }
        }else if ($table_name == "dam_summary"){
            $sql = "truncate table dam_summary;";
            mysqli_query($conn,$sql);
            $col_num_s = 6;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into dam_summary(dam_name,full_supply_volume,flood_surcharge_volume,NSW_share_dam,storage_sequence,NSW_share_ARSRCP)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "dam_daily_data"){
            $sql = "truncate table dam_daily_data;";
            mysqli_query($conn,$sql);
            $col_num_s = 5;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($loop_time=0; $loop_time<$loop_times;$loop_time++){
                $end = $start + $query_per_time;
                if($end > $row_num){
                    $end = $row_num;
                }
                $sql="insert delayed into dam_daily_data(dam_name,day,daily_storage_volume,daily_regulated_releases,daily_spill_volume)values";
                for($i=$start;$i<$end;$i++){
                    $col_num = count($data[$i]);
                    if($col_num_s==$col_num){
                        $sql .= "(\"";
                        $sql .= $data[$i][0]."\",STR_TO_DATE('".$data[$i][1]."', '%d/%m/%Y'),\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\"";
                        $sql .= '),';
                    }
                }
                $sql = substr($sql,0,strlen($sql)-1).";";
                mysqli_query($conn,$sql);
                $start += $query_per_time;
            }
        }else if ($table_name == "license_data"){
            $sql = "truncate table license_data;";
            mysqli_query($conn,$sql);
            $col_num_s = 10;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "<script>alert(\"File format not valid.\")</script>";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into license_data(Basin_name,Category,AL,WaterType,purpose_des,WSP,WS,ShareComponent,Longitude,Latitude)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\",\"".$data[$i][8]."\",\"".$data[$i][9]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "employment_data"){
            $sql = "truncate table employment_data;";
            mysqli_query($conn,$sql);
            $col_num_s = 6;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "<script>alert(\"File format not valid.\")</script>";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into employment_data(catchment_name,year,lga_name,lga_prop_catchment,industry_code,employee_count)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\");";
                    mysqli_query($conn,$sql);
                }
            }
            
        }else if ($table_name == "work_approval"){
            $sql = "truncate table work_approval;";
            mysqli_query($conn,$sql);
            $col_num_s = 9;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($loop_time=0; $loop_time<$loop_times;$loop_time++){
                $end = $start + $query_per_time;
                if($end > $row_num){
                    $end = $row_num;
                }
                $sql="insert delayed into work_approval(basin_name,approval,work_description,so,catchment,water_type,water_source,longitude,latitude)values";
                for($i=$start;$i<$end;$i++){
                    $col_num = count($data[$i]);
                    if($col_num_s==$col_num){
                        if($data[$i][3] == ""){
                            $data[$i][3] = 0;
                        }
                        $sql .= "(\"";
                        $sql .= $data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\""
                            .$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\",\"".$data[$i][8]."\"";
                        $sql .= '),';
                    }
                }
                $sql = substr($sql,0,strlen($sql)-1).";";
                mysqli_query($conn,$sql);
                $start += $query_per_time;
            }
        }else if ($table_name == "waste_water_treatment_centre"){
            $sql = "truncate table waste_water_treatment_centre;";
            mysqli_query($conn,$sql);
            $col_num_s = 7;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into waste_water_treatment_centre("
                        ."catchment,"
                        ."lga,"
                        ."treatment_plant,"
                        ."latitude,"
                        ."longitude,"
                        ."wwqi,"
                        ."treted_volume)values("
                            . "\"".$data[$i][0]."\","
                            . "\"".$data[$i][1]."\","
                            . "\"".$data[$i][2]."\","
                            . "\"".$data[$i][3]."\","
                            . "\"".$data[$i][4]."\","
                            . "\"".$data[$i][5]."\","
                            . "\"".$data[$i][6]."\");";
                    mysqli_query($conn,$sql);   
                }
            }
        }else if ($table_name == "ground_water"){
            $sql = "truncate table ground_water;";
            mysqli_query($conn,$sql);
            $col_num_s = 3;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into ground_water("
                        ."catchment,"
                        ."groundwater,"
                        ."longterm_extraction_limit)values("
                            . "\"".$data[$i][0]."\","
                            . "\"".$data[$i][1]."\","
                            . "\"".$data[$i][2]."\");";
                    mysqli_query($conn,$sql);   
                }
            }
        }else if ($table_name == "water_use_for_each_watersource"){
            $sql = "truncate table water_use_for_each_watersource;";
            mysqli_query($conn,$sql);
            $col_num_s = 4;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into water_use_for_each_watersource("
                        ."catchment,"
                        ."watersource,"
                        ."agriculture_water_use,"
                        . "mining_water_use)values("
                            . "\"".$data[$i][0]."\","
                            . "\"".$data[$i][1]."\","
                            . "\"".$data[$i][2]."\","
                            . "\"".$data[$i][3]."\");";
                    mysqli_query($conn,$sql);   
                }
            }
        }else{
            echo "Error in table name";
            return;
        }
        echo "Successfully Import";
        mysqli_close($conn);//Close the connection
    }
}else{
    echo "File type not valid";
}

function file_list_reader($file_path){
    $file = fopen($file_path,"r");
    $lines = array();
    while(!feof($file)){
        array_push($lines, fgetcsv($file));
    }
    fclose($file);
    return $lines;
}