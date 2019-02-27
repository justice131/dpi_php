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
    "PRIMARY KEY (catchment_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
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
    "population_served FLOAT, ".
    "gross_regional_product FLOAT, ".
    "WSDI FLOAT, ".
    "Risk FLOAT, ".
    "Opportunity FLOAT, ".
    "PRIMARY KEY (tws_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create Water_source
$sql = "CREATE TABLE IF NOT EXISTS water_source( ".
    "id INT NOT NULL AUTO_INCREMENT, ".
    "catchment VARCHAR(50), ".
    "water_source VARCHAR(50), ".
    "longterm_extraction_limit FLOAT, ".
    "unreg_entitlement FLOAT, ".
    "mean_flow FLOAT, ".
    "FUI FLOAT, ".
    "DSI FLOAT, ".
    "irrigable_area FLOAT, ".
    "wetland_area FLOAT, ".
    "infrastructure_upgrade_schedule VARCHAR(50), ".
    "estimated_infrastructure_upgrade VARCHAR(50), ".
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

//Create waste_water_treatment_centre
$sql = "CREATE TABLE IF NOT EXISTS waste_water_treatment_centre( ".
    "centre_id INT NOT NULL AUTO_INCREMENT, ".
    "catchment VARCHAR(30), ".
    "lga VARCHAR(50), ".
    "treatment_plant VARCHAR(50), ".
    "latitude FLOAT, ".
    "longitude FLOAT, ".
    "wwqi FLOAT, ".    
    "treted_volume FLOAT, ". 
    "PRIMARY KEY (centre_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create ground_water
$sql = "CREATE TABLE IF NOT EXISTS ground_water( ".
    "water_id INT NOT NULL AUTO_INCREMENT, ".
    "catchment VARCHAR(30), ".
    "groundwater VARCHAR(50), ".
    "longterm_extraction_limit FLOAT, ".    
    "PRIMARY KEY (water_id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);

//Create water_use_for_each_watersource
$sql = "CREATE TABLE IF NOT EXISTS water_use_for_each_watersource( ".
    "id INT NOT NULL AUTO_INCREMENT, ".
    "catchment VARCHAR(100), ".
    "watersource VARCHAR(500), ".
    "agriculture_water_use FLOAT, ".
    "mining_water_use FLOAT,".
    "PRIMARY KEY (id))ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
mysqli_query($conn,$sql);