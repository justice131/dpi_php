<?php
    include '../db.helper/db_connection_ini.php';
    
    $table_name = $_GET["table_name"];
    mysqli_select_db($conn, "dpi_project");
    if ($table_name == "whole_catchment_indices"){
        $sql = "truncate table whole_catchment_indices;";
    }else if ($table_name == "river_indices"){
        $sql = "truncate table river_indices;";
    }else if ($table_name == "management_zone_indices"){
        $sql = "truncate table management_zone_indices;";
    }else if ($table_name == "irrigated_areas"){
        $sql = "truncate table irrigated_areas;";
    }else if ($table_name == "operational_mines"){
        $sql = "truncate table operational_mines;";
    }else if ($table_name == "water_treatment_centre"){
        $sql = "truncate table water_treatment_centre;";
    }else if ($table_name == "lga_data"){
        $sql = "truncate table lga_data;";
    }else if ($table_name == "manning_flow_data"){
        $sql = "truncate table manning_flow_data;";
    }else if ($table_name == "town_water_supply"){
        $sql = "truncate table town_water_supply;";
    }else if ($table_name == "water_source"){
        $sql = "truncate table water_source;";
    }else if ($table_name == "license_data"){
        $sql = "truncate table license_data;";
    }else if ($table_name == "work_approval"){
        $sql = "truncate table work_approval;";    
    }else if ($table_name == "employment_data"){
        $sql = "truncate table employment_data;";
    }else if ($table_name == "valley_summary"){
        $sql = "truncate table valley_summary;";
    }else if ($table_name == "valley_daily_data"){
        $sql = "truncate table valley_daily_data;";
    }else if ($table_name == "valley_yearly_data"){
        $sql = "truncate table valley_yearly_data;";
    }else if ($table_name == "dam_daily_data"){
        $sql = "truncate table dam_daily_data;";
    }else if ($table_name == "dam_summary"){
        $sql = "truncate table dam_summary;";
    }else if ($table_name == "waste_water_treatment_centre"){
        $sql = "truncate table waste_water_treatment_centre;";
    }else if ($table_name == "ground_water"){
        $sql = "truncate table ground_water;";
    }else if ($table_name == "water_use_for_each_watersource"){
        $sql = "truncate table water_use_for_each_watersource;";
    }
    $retval = mysqli_query($conn,$sql);
    if(! $retval ){
        die("Could not delete the table" . mysql_error());
        echo "Could not delete the table";
    }else{
        echo "Table Delete successfully.";
    }
    mysqli_close($conn);
    
