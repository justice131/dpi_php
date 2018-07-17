<?php
include 'db_table_create.php';

if($_FILES["file"]["type"] == "application/vnd.ms-excel"){
    if ($_FILES["file"]["error"] > 0){
        echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }else{
        //Save the uploaded file
        $save_path = "../upload_files/".date("YmdHis",time())."_".$_FILES["file"]["name"];
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
            $col_num_s = 19;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into whole_catchment_indices(catchment_name,overall_fui,overall_idsi,overall_fmi,overall_dei,catchment_size,surface_water_size,groundwater_size,total_irrigated_areas,annual_production_value,annual_employment_number,annual_water_use,production_value_per_water_drop,total_mine_number,water_treatment_centre_number,affected_population,annual_power_generated,annual_town_water_sewerage_use,power_generation_water_use)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\",\"".$data[$i][8]."\",\"".$data[$i][9]."\",\"".$data[$i][10]."\",\"".$data[$i][11]."\",\"".$data[$i][12]."\",\"".$data[$i][13]."\",\"".$data[$i][14]."\",\"".$data[$i][15]."\",\"".$data[$i][16]."\",\"".$data[$i][17]."\",\"".$data[$i][18]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "river_indices"){
            $col_num_s = 8;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into river_indices(belong_catchment_id,river_name,river_type,lt_annual_extraction_limit,license_category_1,license_category_2,fui,idsi)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\");";
                    mysqli_query($conn,$sql);
                }
            }       
        }else if ($table_name == "management_zone_indices"){
            $col_num_s = 6;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into management_zone_indices(belong_river_id,belong_catchment_id,management_zone_name,lt_annual_extraction_limit,license_category_1,license_category_2)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "irrigated_areas"){
            $col_num_s = 5;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into irrigated_areas(irrigated_area_name,belong_catchment_id,annual_production_value,annual_water_use,cotton_plantation)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "operational_mines"){
            $col_num_s = 4;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into operational_mines(operational_mine_name,belong_catchment_id,mineral_type,annual_water_use)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "water_treatment_centre"){
            $col_num_s = 8;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into water_treatment_centre(wtc_name,belong_catchment_id,served_towns,served_population,annual_water_use,health_based_target_index,waste_water_quality_index,water_supply_deficiency_index)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "town_water_supply"){
            $col_num_s = 10;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into town_water_supply(catchment,exact_location,town_served,latitude,longitude,postcode,volume_treated,HBT_index,WSDI,population_served)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\",\"".$data[$i][8]."\",\"".$data[$i][9]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "water_source"){
            $col_num_s = 9;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "File format not valid";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into water_source(catchment_id,water_source,all_entitlement,unreg_entitlement,mean_flow,seasonflow,FUI,DSI,irrigable_area)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\",\"".$data[$i][8]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "valley_summary"){
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
            $col_num_s = 11;
            $col_num = count($data[0]);
            if($col_num_s!=$col_num){
                echo "<script>alert(\"File format not valid.\")</script>";
                return;
            }
            for($i=1;$i<$row_num;$i++){
                $col_num = count($data[$i]);
                if($col_num_s==$col_num){
                    $sql="insert delayed into license_data(Basin_name,Category,AL,WaterType,purpose_des,WSP,WS,ShareComponent,Purpose,Longitude,Latitude)values(\""
                        .$data[$i][0]."\",\"".$data[$i][1]."\",\"".$data[$i][2]."\",\"".$data[$i][3]."\",\"".$data[$i][4]."\",\"".$data[$i][5]."\",\"".$data[$i][6]."\",\"".$data[$i][7]."\",\"".$data[$i][8]."\",\"".$data[$i][9]."\",\"".$data[$i][10]."\");";
                    mysqli_query($conn,$sql);
                }
            }
        }else if ($table_name == "employment_data"){
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