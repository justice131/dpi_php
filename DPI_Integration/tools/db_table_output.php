<?php
    include '../db.helper/db_connection_ini.php';
    mysqli_select_db($conn, "dpi_project");
    $table_name = $_GET['table_name'];
    $result=mysqli_query($conn,"SELECT * FROM ".$table_name);  
    $record_num=mysqli_num_rows($result);
    $output_file = fopen("../files/export.files/".$table_name.".csv", "w") or die("Unable to open file!");
    
    /*Initiate the title*/
    $fields = array();
    $record = "";
    $result_arr=mysqli_fetch_assoc($result);
    foreach ($result_arr as $key => $value){
        array_push($fields, $key);
        $record .= $key.",";
    }
    fwrite($output_file, $record."\n");
    
    /*Loop to get the data*/
    $field_num = count($fields);
    for($i=0;$i<$record_num;$i++){
        $record = "";
        for($j=0;$j<$field_num;$j++){
            $record .= $result_arr[$fields[$j]].",";
        }
        fwrite($output_file, $record."\n");
        if($i<($record_num-1)){
            $result_arr=mysqli_fetch_assoc($result);
        }
    }
    fclose($output_file);
    echo '1';