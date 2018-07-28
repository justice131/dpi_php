<?php
//Get the connection of the database
include '../db.helper/db_connection_ini.php';

//Create the database dpi_project if not exist
function create_db_if_not_exist($conn){
    if (mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS dpi_project")){
//        echo "database created, database name=dpi_project";
    }else{
        echo "Error creating database: " . mysql_error();
    }
}

//Get connection and create database
create_db_if_not_exist($conn);

//Create whole_catchment_indices
mysqli_select_db($conn, "dpi_project");
$sql = "CREATE TABLE IF NOT EXISTS whole_catchment_indices( ".
    "catchment_id INT NOT NULL AUTO_INCREMENT, ".
    "catchment_name VARCHAR(30) NOT NULL, ".
    "overall_fui FLOAT, ".
    "overall_idsi FLOAT, ".
    "overall_fmi FLOAT, ".
    "overall_dei FLOAT, ".
    "catchment_size FLOAT, ".
    "surface_water_size FLOAT, ".
    "groundwater_size FLOAT, ".
    "total_irrigated_areas FLOAT, ".
    "annual_production_value FLOAT, ".
    "annual_employment_number FLOAT, ".
    "annual_water_use FLOAT, ".
    "production_value_per_water_drop FLOAT, ".
    "total_mine_number FLOAT, ".
    "water_treatment_centre_number FLOAT, ".
    "affected_population FLOAT, ".
    "annual_power_generated FLOAT, ".
    "annual_town_water_sewerage_use FLOAT, ".
    "power_generation_water_use FLOAT, ".
    "PRIMARY KEY (catchment_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create river_indices
$sql = "CREATE TABLE IF NOT EXISTS river_indices( ".
    "river_id INT NOT NULL AUTO_INCREMENT, ".
    "belong_catchment_id INT NOT NULL, ".
    "river_name VARCHAR(100) NOT NULL, ".
    "river_type CHAR(50), ".
    "lt_annual_extraction_limit FLOAT, ".
    "license_category_1 FLOAT, ".
    "license_category_2 FLOAT, ".
    "fui FLOAT, ".
    "idsi FLOAT, ".
    "PRIMARY KEY (river_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create management_zone_indices
$sql = "CREATE TABLE IF NOT EXISTS management_zone_indices( ".
    "zone_id INT NOT NULL AUTO_INCREMENT, ".
    "belong_river_id INT NOT NULL, ".
    "belong_catchment_id INT NOT NULL, ".
    "management_zone_name VARCHAR(100) NOT NULL, ".
    "lt_annual_extraction_limit FLOAT, ".
    "license_category_1 FLOAT, ".
    "license_category_2 FLOAT, ".
    "PRIMARY KEY (zone_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create irrigated_areas
$sql = "CREATE TABLE IF NOT EXISTS irrigated_areas( ".
    "irrigated_area_id INT NOT NULL AUTO_INCREMENT, ".
    "irrigated_area_name VARCHAR(50) NOT NULL, ".
    "belong_catchment_id INT NOT NULL, ".
    "annual_production_value FLOAT, ".
    "annual_water_use FLOAT, ".
    "cotton_plantation FLOAT, ".
    "PRIMARY KEY (irrigated_area_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create operational_mines
$sql = "CREATE TABLE IF NOT EXISTS operational_mines( ".
    "operational_mine_id INT NOT NULL AUTO_INCREMENT, ".
    "operational_mine_name VARCHAR(50) NOT NULL, ".
    "belong_catchment_id INT NOT NULL, ".
    "mineral_type VARCHAR(50), ".
    "annual_water_use FLOAT, ".
    "PRIMARY KEY (operational_mine_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create water_treatment_centre
$sql = "CREATE TABLE IF NOT EXISTS water_treatment_centre( ".
    "wtc_id INT NOT NULL AUTO_INCREMENT, ".
    "wtc_name VARCHAR(50) NOT NULL, ".
    "belong_catchment_id INT NOT NULL, ".
    "served_towns INT, ".
    "served_population INT, ".
    "annual_water_use FLOAT, ".
    "health_based_target_index FLOAT, ".
    "waste_water_quality_index FLOAT, ".
    "water_supply_deficiency_index FLOAT, ".
    "PRIMARY KEY (wtc_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create lga_data
$sql = "CREATE TABLE IF NOT EXISTS lga_data( ".
    "lga_id INT NOT NULL AUTO_INCREMENT, ".
    "lga_name VARCHAR(70) NOT NULL, ".
    "catchment VARCHAR(70) NOT NULL, ".
    "proportion_in_macquarie_catchment FLOAT, ".
    "proportion_in_manning_catchment FLOAT, ".
    "proportion_in_backwater FLOAT, ".
    "proportion_in_bell FLOAT, ".
    "proportion_in_bullbodney FLOAT, ".
    "proportion_in_burrendong FLOAT, ".
    "proportion_in_campbells FLOAT, ".
    "proportion_in_coolbaggie FLOAT, ".
    "proportion_in_cooyal FLOAT, ".
    "proportion_in_ewenmar FLOAT, ".
    "proportion_in_fish FLOAT, ".
    "proportion_in_goolma FLOAT, ".
    "proportion_in_lawsons FLOAT, ".
    "proportion_in_little FLOAT, ".
    "proportion_in_lowerbogan FLOAT, ".
    "proportion_in_lowermacquarie FLOAT, ".   
    "proportion_in_lowertalbragar FLOAT, ".
    "proportion_in_macquarie FLOAT, ".
    "proportion_in_marra FLOAT, ".
    "proportion_in_marthaguy FLOAT, ".
    "proportion_in_maryvale FLOAT, ".
    "proportion_in_molong FLOAT, ".
    "proportion_in_piambong FLOAT, ".
    "proportion_in_pipeclay FLOAT, ".
    "proportion_in_queen FLOAT, ".
    "proportion_in_summerhill FLOAT, ".
    "proportion_in_turon FLOAT, ".
    "proportion_in_upperbogan FLOAT, ".
    "proportion_in_uppercudgegong FLOAT, ".
    "proportion_in_uppertallbragar FLOAT, ".
    "proportion_in_wambangalong FLOAT, ".
    "proportion_in_winburndale FLOAT, ".
    "proportion_in_avon FLOAT, ".
    "proportion_in_bowman FLOAT, ".
    "proportion_in_cooplacurripa FLOAT, ".
    "proportion_in_dingo FLOAT, ".
    "proportion_in_lowerbarnard FLOAT, ".
    "proportion_in_lowerbarrington FLOAT, ".
    "proportion_in_lowermanning FLOAT, ".   
    "proportion_in_manning FLOAT, ".
    "proportion_in_midmanning FLOAT, ".
    "proportion_in_myall FLOAT, ".
    "proportion_in_nowendoc FLOAT, ".
    "proportion_in_rowleys FLOAT, ".
    "proportion_in_upperbarnard FLOAT, ".
    "proportion_in_upperbarrington FLOAT, ".
    "proportion_in_uppergloucester FLOAT, ".
    "proportion_in_uppermanning FLOAT, ".
    "year_population FLOAT, ".
    "population FLOAT, ".
    "year_irrigation VARCHAR(50), ".
    "irrigation_production VARCHAR(50), ".
    "year_mining VARCHAR(50), ".
    "mining_production FLOAT, ".
    "year_employment VARCHAR(50), ".
    "employment_irrigation FLOAT, ".
    "employment_mining FLOAT, ".
    "PRIMARY KEY (lga_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
    mysqli_query($conn,$sql);
    
//Create manning_flow_data
$sql = "CREATE TABLE IF NOT EXISTS manning_flow_data( ".
    "station_id INT NOT NULL AUTO_INCREMENT, ".
    "station_code INT NOT NULL, ".
    "date VARCHAR(30) NOT NULL, ".
    "flow FLOAT, ".
    "PRIMARY KEY (station_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

    
//Create town_water_supply
$sql = "CREATE TABLE IF NOT EXISTS town_water_supply( ".
    "tws_id INT NOT NULL AUTO_INCREMENT, ".
    "catchment VARCHAR(50) NOT NULL, ".
    "exact_location VARCHAR(50) NOT NULL, ".
    "town_served VARCHAR(50) NOT NULL, ".
    "latitude FLOAT, ".
    "longitude FLOAT, ".
    "postcode INT, ".
    "volume_treated INT, ".
    "HBT_index FLOAT, ".
    "WSDI FLOAT, ".
    "population_served FLOAT, ".
    "PRIMARY KEY (tws_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create Water_source
$sql = "CREATE TABLE IF NOT EXISTS water_source( ".
    "id INT NOT NULL AUTO_INCREMENT, ".
    "catchment_id VARCHAR(50), ".
    "water_source VARCHAR(50), ".
    "all_entitlement FLOAT, ".
    "unreg_entitlement FLOAT, ".
    "mean_flow FLOAT, ".
    "seasonflow FLOAT, ".
    "FUI FLOAT, ".
    "DSI FLOAT, ".
    "irrigable_area FLOAT, ".
    "PRIMARY KEY (id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create valley_summary
$sql = "CREATE TABLE IF NOT EXISTS valley_summary( ".
    "valley_id INT NOT NULL AUTO_INCREMENT, ".
    "valley_name VARCHAR(100) NOT NULL, ".
    "Entitlement_GS FLOAT NOT NULL, ".
    "NSW_share_ATF FLOAT NOT NULL, ".
    "dam_names VARCHAR(300) NOT NULL, ". 
    "PRIMARY KEY (valley_id))ENGINE=InnoDB DEFAULT CHARSET=utf8;";
mysqli_query($conn,$sql);

//Create valley_yearly_data
$sql = "CREATE TABLE IF NOT EXISTS valley_yearly_data( ".
    "row_id INT NOT NULL AUTO_INCREMENT, ".
    "valley_name VARCHAR(100) NOT NULL, ".
    "year INT NOT NULL, ".
    "balance FLOAT NOT NULL, ".
    "diversion FLOAT NOT NULL, ".
    "carry_over FLOAT NOT NULL, ".
    "PRIMARY KEY (row_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create valley_daily_data
$sql = "CREATE TABLE IF NOT EXISTS valley_daily_data( ".
    "row_id INT NOT NULL AUTO_INCREMENT, ".
    "valley_name VARCHAR(100) NOT NULL, ".
    "day date NOT NULL, ".   
    "ONA_TWS FLOAT NOT NULL, ".
    "ONA_HS FLOAT NOT NULL, ".
    "ONA_GS FLOAT NOT NULL, ".
    "GS_OFA FLOAT NOT NULL, ".
    "FPH FLOAT NOT NULL, ".
    "annual_total_flow FLOAT NOT NULL, ".
    "annual_regulated_flow FLOAT NOT NULL, ".
    "PRIMARY KEY (row_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create dam_daily_data
$sql = "CREATE TABLE IF NOT EXISTS dam_daily_data( ".
    "row_id INT NOT NULL AUTO_INCREMENT, ".
    "dam_name VARCHAR(100) NOT NULL, ".
    "day DATE NOT NULL,".
    "daily_storage_volume FLOAT NOT NULL, ".
    "daily_regulated_releases FLOAT NOT NULL, ".
    "daily_spill_volume FLOAT NOT NULL, ".
    "PRIMARY KEY (row_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create dam_summary
$sql = "CREATE TABLE IF NOT EXISTS dam_summary( ".
    "dam_id INT NOT NULL AUTO_INCREMENT, ".
    "dam_name VARCHAR(100) NOT NULL, ".
    "full_supply_volume FLOAT NOT NULL, ".
    "flood_surcharge_volume FLOAT NOT NULL, ".
    "NSW_share_dam FLOAT NOT NULL, ".
    "storage_sequence FLOAT NOT NULL, ".
    "NSW_share_ARSRCP FLOAT NOT NULL, ".
    "PRIMARY KEY (dam_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create license_data
$sql = "CREATE TABLE IF NOT EXISTS license_data( ".
    "id INT NOT NULL AUTO_INCREMENT, ".
    "Basin_name VARCHAR(150), ".
    "Category VARCHAR(150), ".
    "AL VARCHAR(150), ".
    "WaterType VARCHAR(150), ".
    "purpose_des VARCHAR(150), ".
    "WSP VARCHAR(150), ".
    "WS VARCHAR(150), ".        
    "ShareComponent FLOAT, ". 
    "Longitude FLOAT, ".
    "Latitude FLOAT, ".
    "PRIMARY KEY (id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);


//Create work_approal
$sql = "CREATE TABLE IF NOT EXISTS work_approval( ".
    "approval_id INT NOT NULL AUTO_INCREMENT, ".
    "basin_name VARCHAR(100) NOT NULL, ".
    "approval VARCHAR(100), ".
    "work_description VARCHAR(300), ".
    "so FLOAT, ".
    "catchment VARCHAR(100), ".
    "water_type VARCHAR(50), ".
    "water_source VARCHAR(300), ".
    "longitude FLOAT NOT NULL, ".
    "latitude FLOAT NOT NULL, ".    
    "PRIMARY KEY (approval_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create employment_data
$sql = "CREATE TABLE IF NOT EXISTS employment_data( ".
    "employment_id INT NOT NULL AUTO_INCREMENT, ".
    "catchment_name VARCHAR(30) NOT NULL, ".
    "year FLOAT, ".
    "lga_name VARCHAR(50), ".
    "lga_prop_catchment FLOAT, ".
    "industry_code VARCHAR(10), ".
    "employee_count FLOAT, ".    
    "PRIMARY KEY (employment_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);





