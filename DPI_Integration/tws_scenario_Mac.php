<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TWS Insight for Macquarie</title>
        <?php include("Common_Script_Import.html"); ?>
        <style>
        .hover_info {
            width: 380px;
        }
        </style>
    </head>
    <body style="background-color:#F3F3F4;">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav">
                    <li class="nav-header text-center"> <a href="http://www.water.nsw.gov.au/" target="_blank" style="padding: 3px 0 10px"> <img src="images/nsw.png" alt="nsw" height="50"/> </a> </li>
                    <li class=""> <a href="index.php" target="_blank" data-toggle="tooltip" title="Home" style="padding: 5px 0px 5px 13.5px"><img src="images/home_icon.jpg" alt="irrigation" height="40"/></a> </li>
                    <li class=""> <a href="Irrigation_module.php" target="_blank" data-toggle="tooltip" title="Irrigation" style="padding: 5px 0px 5px 13.5px"><img src="images/irrigation_icon.jpg" alt="irrigation" height="40"/></a> </li>
                    <li class=""> <a href="Mining_module.php" target="_blank" data-toggle="tooltip" title="Mining" style="padding: 5px 0px 5px 13.5px"><img src="images/mining_icon.png" alt="Mining" height="40"/></a> </li>
                    <li class=""> <a href="Town_water_power_gen_module.php" target="_blank" data-toggle="tooltip" title="Town Water & Power Generation" style="padding: 5px 0px 5px 13.5px"><img src="images/town_water_icon.png" alt="Town Water" height="40"/></a> </li>
                    <li class=""> <a href="Environmental_module.php" target="_blank" data-toggle="tooltip" title="Critical Environmental Assets" style="padding: 5px 0px 5px 13.5px"><img src="images/environmental_icon.png" alt="Environmental" height="40"/></i></a> </li>
                    <li class=""> <a href="Data_Management_Index.php" target="_blank" data-toggle="tooltip" title="Data Management" style="padding: 5px 0px 5px 13.5px"><img src="images/data_icon.png" alt="Data" height="40"/></i></a> </li>
                </ul>
            </div>
	</nav>
	<div id="page-wrapper" class="gray-bg dashboard"  style="padding-bottom:20px">
		<div class="row">
			<div class="box-container" style="width:17.2%; height:776px;" id="left_panel">
				<table style="width:100%">
				  <tr>
					<td>
						<div>
						  <div class="box-title">
							<h4><b>Map Icon Legend</b></h4>
						  </div>
						  <div class="box-content" style="height:776px;">
							<div id="rightdiv">
                                                            <div id="legend">
                                                                <br>
                                                            </div>
							</div>
						  </div>
						</div>
					</td>
				  </tr>
				  </table>
			</div>                  
			
			<div class="box-container" style="width:82.8%" id="map_panel">
				<div class="box">
					<div class="box-title">
                                            <div id="s0_title">

                                            </div>
                                            <!--						<h4><b>Town Water Supply Insight for Macquarie Catchment</b></h4>-->
					</div>
					<div class="box-content" role="tabpanel">
						<div id="map"></div>
					</div>
                                        <div id="MacquarieBogan">
                                                <input type="checkbox" id="s1" onclick="show_s1('s1')"> <font size="2">Scenario 1 </font></br>  
                                                <input type="checkbox" id="s2" onclick="show_s2('s2')"> <font size="2">Scenario 2 </font>
                                        </div>                                   
                                </div>
			</div>
		</div>
	</div>
        <div class="se-pre-con"></div>
                
        <script type="text/javascript">

        </script>
        <?php
            //Edited by justice
        //purpose_des, share_component, longitude, latitude
            include 'db.helper/db_connection_ini.php';
                if($conn!=null){
                    $sql = "SELECT * FROM town_water_supply WHERE catchment='Macquarie'";
                    $result = $conn->query($sql);
                    $town_water_supply = array();
                    $o = -1;
                    while ($row = $result->fetch_assoc()){
                        $o++;
                        $town_water_supply[$o] = $row;
                    }
                }else{
                    include 'db.helper/db_connection_ini.php';
                }
            //Edited by justice
        ?>
        
        <script type="text/javascript">
            //var lga = lgaBorders;
            var MacquarieBogan_CatchmentBoundary = MacquarieBogan_CatchmentBoundary;
            
            // Show preloader
            $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");;
            });
            document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Town Water Supply Insight for Macquarie Catchment'+'</span>';
                      
            var map = L.map('map',{zoomControl: false}).setView([-32.4, 148.1], 6.5);
            L.control.zoom({
                position:'bottomleft'
            }).addTo(map);
            var myToken = 'pk.eyJ1IjoiZHlobCIsImEiOiJjaWtubG5uMWYwc3BmdWNqN2hlMzFsNDhvIn0.027tda69GVKbxiPnkEBDAw';
		L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + myToken, {
			maxZoom: 18,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
				'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
				'Imagery © <a href="http://mapbox.com">Mapbox</a>',
			id: 'mapbox.outdoors',
		}).addTo(map);
                
            CAT = L.geoJSON(MacquarieBogan_CatchmentBoundary, {
            style: function (feature) {
                    return { color: 'red', weight: 0.3};
            },
            interactive: false
            }).addTo(map);
            
            map.setView([-31.8, 148.5], 8);
            var show_box=document.getElementById("MacquarieBogan");
            show_box.style.display="block";          
            
            var removeLayer = function (feature) {
                for (var i = 0; i < feature.length; i++){     
                    map.removeLayer(feature[i]);
                }               
            };
            
            function toThousands(num) {
                if (isNaN(num)) { 
                    throw new TypeError("num is not a number"); 
                } 
                var groups = (/([\-\+]?)(\d*)(\.\d+)?/g).exec("" + num), 
                    mask = groups[1],
                    integers = (groups[2] || "").split(""),
                    decimal = groups[3] || "",
                    remain = integers.length % 3; 
  
                var temp = integers.reduce(function(previousValue, currentValue, index) { 
                if (index + 1 === remain || (index + 1 - remain) % 3 === 0) { 
                    return previousValue + currentValue + ","; 
                } else { 
                    return previousValue + currentValue; 
                } 
                }, "").replace(/\,$/g, ""); 
                    return mask + temp + decimal; 
            }
            
            var Icon_approval_1 = L.icon({
                iconUrl: 'lib/leaflet/images/wa_reg.png',
                iconSize:     [18, 28], 
                iconAnchor:   [9, 28],  
                popupAnchor:  [0, -30] 
            });
            
            var Icon_approval_2 = L.icon({
                iconUrl: 'lib/leaflet/images/wa_unreg.png',
                iconSize:     [18, 28],
                iconAnchor:   [9, 28],  
                popupAnchor:  [0, -30] 
            });
            
            var Icon_approval_3 = L.icon({
                iconUrl: 'lib/leaflet/images/wa_gw.png',
                iconSize:     [18, 28], 
                iconAnchor:   [9, 28],  
                popupAnchor:  [0, -30] 
            });  
            
            var Icon_license_1 = L.icon({
                iconUrl: 'lib/leaflet/images/li_reg.png',
                iconSize:     [18, 28], 
                iconAnchor:   [9, 28],  
                popupAnchor:  [0, -30] 
            }); 
            
            var Icon_license_2 = L.icon({
                iconUrl: 'lib/leaflet/images/li_unreg.png',
                iconSize:     [18, 28],  
                iconAnchor:   [9, 28],  
                popupAnchor:  [0, -30] 
            }); 
            
            var Icon_license_3 = L.icon({
                iconUrl: 'lib/leaflet/images/li_gw.png',
                iconSize:     [18, 28],   
                iconAnchor:   [9, 28],  
                popupAnchor:  [0, -30] 
            }); 

            var Icon_reg = L.icon({
                iconUrl: 'lib/leaflet/images/reg.png',
                iconSize:     [16, 27], 
                iconAnchor:   [8, 27],  
                popupAnchor:  [0, -34] 
            });
            
            var Icon_unreg = L.icon({
                iconUrl: 'lib/leaflet/images/unreg.png',
                iconSize:     [16, 27], 
                iconAnchor:   [8, 27],  
                popupAnchor:  [0, -34] 
            });
            
            var Icon_gw = L.icon({
                iconUrl: 'lib/leaflet/images/gw.png',
                iconSize:     [16, 27], 
                iconAnchor:   [8, 27],  
                popupAnchor:  [0, -34] 
            });
            
            var Icon_red = L.icon({
                iconUrl: 'lib/leaflet/images/water_treatment_icon_red.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            var Icon_orange = L.icon({
                iconUrl: 'lib/leaflet/images/water_treatment_icon_orange.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            var Icon_green = L.icon({
                iconUrl: 'lib/leaflet/images/water_treatment_icon_green.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            var Icon_waste_green = L.icon({
                iconUrl: 'lib/leaflet/images/waste_water_green.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            var Icon_waste_red = L.icon({
                iconUrl: 'lib/leaflet/images/waste_water_red.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            var Icon_waste_orange = L.icon({
                iconUrl: 'lib/leaflet/images/waste_water_orange.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            
            var Icon_waste_water = L.icon({
                iconUrl: 'lib/leaflet/images/waste_water_treatment.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            <?php if(!empty($town_water_supply)){?>;
                WTC_number_Macquarie = 0;
                WTC_population_Macquarie = 0;
                WTC_volume_Macquarie = 0;
                <?php for ($x=0; $x<count($town_water_supply); $x++) {?>
                        WTC_number_Macquarie = WTC_number_Macquarie + 1;                               
                        var vol = "<?php echo $town_water_supply[$x]["volume_treated"]; ?>";
                        var HBT = "<?php echo $town_water_supply[$x]["HBT_index"]; ?>";
                        var WSDI = "<?php echo $town_water_supply[$x]["WSDI"]; ?>";
                        var popu = "<?php echo $town_water_supply[$x]["population_served"]; ?>";

                        WTC_population_Macquarie = WTC_population_Macquarie + Math.round(popu);
                        WTC_volume_Macquarie = WTC_volume_Macquarie + Math.round(vol);
                <?php }?>;    
            <?php }?>; 
                
            <?php
                include 'db.helper/db_connection_ini.php';
                    if($conn!=null){
                        $sql_wwtc = "SELECT * FROM waste_water_treatment_centre WHERE catchment='Macquarie'";
                        $result_wwtc = $conn->query($sql_wwtc);
                        $wwtc_mac = array();
                        $m = -1;
                        while ($row_wwtc_mac = $result_wwtc->fetch_assoc()){
                            $m++;
                            $wwtc_mac[$m] = $row_wwtc_mac;
                        }
                    }else{
                        include 'db.helper/db_connection_ini.php';
                    }
            ?>

            <?php if(!empty($wwtc_mac)){?>;
                WWTC_number_Macquarie = 0;
                WWTC_volume_Macquarie = 0;
                <?php for ($x=0; $x<count($wwtc_mac); $x++) {?>                          
                        WWTC_number_Macquarie = WWTC_number_Macquarie + 1;                               
                        var treatment_plant = "<?php echo $wwtc_mac[$x]["treatment_plant"]; ?>";
                        var wwqi = "<?php echo $wwtc_mac[$x]["wwqi"]; ?>";
                        var treted_volume = "<?php echo $wwtc_mac[$x]["treted_volume"]; ?>";
                        WWTC_volume_Macquarie = WWTC_volume_Macquarie + Math.round(treted_volume);
                <?php }?>;    
            <?php }?>; 
            
            var hover_info = L.control();
            hover_info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'hover_info');
                this.update();
                return this._div;
            };
                     
            hover_info.update = function (props) {
                var catch_name = 'MacquarieBogan';
                var no_wtc = WTC_number_Macquarie;
                var no_wwtc = WWTC_number_Macquarie;
                var waste_volume = WWTC_volume_Macquarie;
                var popu_wtc = WTC_population_Macquarie;
                var volume = WTC_volume_Macquarie;                      
                    this._div.innerHTML = (
                          '<b>' + 'Water Treatment and Power Generation within ' + catch_name + ' Catchment' + '</b><br/><br/>' + 
                          '<p style=\"line-height:50%\"><img src=\"images/water_treatment_number.png\" height=\"25\" width=\"25\"> Number of Water Treatment Centre: <b>' + toThousands(no_wtc) + '</b><br/><br />'+
                          '<img src=\"images/water_population.png\" height=\"25\" width=\"25\"> Number of Waste Water Treatment Centre: <b>' + toThousands(no_wwtc) + '</b><br/><br />'+
                          '<img src=\"images/water_population.png\" height=\"25\" width=\"25\"> Population Served: <b>' + toThousands(popu_wtc) + '</b><br/><br />'+
                          '<img src=\"images/power_generated.png\" height=\"25\" width=\"25\"> Annual Power Generated: <b>' + 0 + '</b><br/><br />'+
                          '<img src=\"images/water_treatment_use_of_water.png\" height=\"25\" width=\"25\"> Annual Use of Water for Town Water: <b>' + toThousands(volume) + ' ML</b><br/><br />'+
                          '<img src=\"images/water_treatment_use_of_water.png\" height=\"25\" width=\"25\"> Annual Treated Water for Waste Water: <b>' + toThousands(waste_volume) + ' ML</b><br/><br />'+
                          '<img src=\"images/power_generated_use_of_water.png\" height=\"25\" width=\"25\"> Annual Use of Water for Power Generation: <b>' + 0 + '</b><br/></p>'  
                    );
            };
            hover_info.addTo(map);
            
            function icon_wsdi(Fui_macquarie, feature){          
                function compareSecondColumn(a, b) {
                    if (a[1] === b[1]) {
                        return 0;
                    }
                    else {
                        return (a[1] > b[1]) ? -1 : 1;
                    }
                }
                Fui_macquarie = Fui_macquarie.sort(compareSecondColumn);
                var e = Fui_macquarie.length;
                if(e>=3 & (e%3) === 0){
                    var i = e/3; 
                    Fui_macquarie_1 = Fui_macquarie.slice(0,i);
                    Fui_macquarie_2 = Fui_macquarie.slice(i,2*i);
                    Fui_macquarie_3 = Fui_macquarie.slice(2*i,3*i);
                }else if(e>3 & (e%3) === 1){
                    var i = Math.floor(e/3); 
                    Fui_macquarie_1 = Fui_macquarie.slice(0,i);
                    Fui_macquarie_2 = Fui_macquarie.slice(i,(2*i+1));
                    Fui_macquarie_3 = Fui_macquarie.slice((2*i+1),e);                  
                }else if(e>3 & (e%3) === 2){
                    var i = Math.floor(e/3); 
                    Fui_macquarie_1 = Fui_macquarie.slice(0,i);
                    Fui_macquarie_2 = Fui_macquarie.slice(i,(2*i+1));
                    Fui_macquarie_3 = Fui_macquarie.slice((2*i+1),e);                      
                }else if (e===2){
                    Fui_macquarie_1 = Fui_macquarie.slice(0,1);
                    Fui_macquarie_2 = Fui_macquarie.slice(e,e);
                    Fui_macquarie_3 = Fui_macquarie.slice(1,e);                    
                }else if (e===1){
                    Fui_macquarie_1 = Fui_macquarie.slice(0,e);
                    Fui_macquarie_2 = Fui_macquarie.slice(e,e);
                    Fui_macquarie_3 = Fui_macquarie.slice(e,e);                   
                }
              
                if ($.inArray(feature, Fui_macquarie_1.map(function(value, index) { return value[0];})) !== -1){
                    return Icon_red;
                }
                if ($.inArray(feature, Fui_macquarie_2.map(function(value, index) { return value[0];})) !== -1){
                    return Icon_orange;
                }
                if ($.inArray(feature, Fui_macquarie_3.map(function(value, index) { return value[0];})) !== -1){
                    return Icon_green;
                }              
            }           

            function icon_wsr(Fui_macquarie, feature){          
                function compareSecondColumn(a, b) {
                    if (a[1] === b[1]) {
                        return 0;
                    }
                    else {
                        return (a[1] > b[1]) ? -1 : 1;
                    }
                }
                Fui_macquarie = Fui_macquarie.sort(compareSecondColumn);
                var e = Fui_macquarie.length;
                if(e>=3 & (e%3) === 0){
                    var i = e/3; 
                    Fui_macquarie_1 = Fui_macquarie.slice(0,i);
                    Fui_macquarie_2 = Fui_macquarie.slice(i,2*i);
                    Fui_macquarie_3 = Fui_macquarie.slice(2*i,3*i);
                }else if(e>3 & (e%3) === 1){
                    var i = Math.floor(e/3); 
                    Fui_macquarie_1 = Fui_macquarie.slice(0,i);
                    Fui_macquarie_2 = Fui_macquarie.slice(i,(2*i+1));
                    Fui_macquarie_3 = Fui_macquarie.slice((2*i+1),e);                  
                }else if(e>3 & (e%3) === 2){
                    var i = Math.floor(e/3); 
                    Fui_macquarie_1 = Fui_macquarie.slice(0,i);
                    Fui_macquarie_2 = Fui_macquarie.slice(i,(2*i+1));
                    Fui_macquarie_3 = Fui_macquarie.slice((2*i+1),e);                      
                }else if (e===2){
                    Fui_macquarie_1 = Fui_macquarie.slice(0,1);
                    Fui_macquarie_2 = Fui_macquarie.slice(e,e);
                    Fui_macquarie_3 = Fui_macquarie.slice(1,e);                    
                }else if (e===1){
                    Fui_macquarie_1 = Fui_macquarie.slice(0,e);
                    Fui_macquarie_2 = Fui_macquarie.slice(e,e);
                    Fui_macquarie_3 = Fui_macquarie.slice(e,e);                   
                }
              
                if ($.inArray(feature, Fui_macquarie_1.map(function(value, index) { return value[0];})) !== -1){
                    return Icon_red;
                }
                if ($.inArray(feature, Fui_macquarie_2.map(function(value, index) { return value[0];})) !== -1){
                    return Icon_orange;
                }
                if ($.inArray(feature, Fui_macquarie_3.map(function(value, index) { return value[0];})) !== -1){
                    return Icon_green;
                }              
            } 
            
            function icon_hr(Fui_macquarie, feature){          
                function compareSecondColumn(a, b) {
                    if (a[1] === b[1]) {
                        return 0;
                    }
                    else {
                        return (a[1] > b[1]) ? -1 : 1;
                    }
                }
                Fui_macquarie = Fui_macquarie.sort(compareSecondColumn);
                var e = Fui_macquarie.length;
                if(e>=3 & (e%3) === 0){
                    var i = e/3; 
                    Fui_macquarie_1 = Fui_macquarie.slice(0,i);
                    Fui_macquarie_2 = Fui_macquarie.slice(i,2*i);
                    Fui_macquarie_3 = Fui_macquarie.slice(2*i,3*i);
                }else if(e>3 & (e%3) === 1){
                    var i = Math.floor(e/3); 
                    Fui_macquarie_1 = Fui_macquarie.slice(0,i);
                    Fui_macquarie_2 = Fui_macquarie.slice(i,(2*i+1));
                    Fui_macquarie_3 = Fui_macquarie.slice((2*i+1),e);                  
                }else if(e>3 & (e%3) === 2){
                    var i = Math.floor(e/3); 
                    Fui_macquarie_1 = Fui_macquarie.slice(0,i);
                    Fui_macquarie_2 = Fui_macquarie.slice(i,(2*i+1));
                    Fui_macquarie_3 = Fui_macquarie.slice((2*i+1),e);                      
                }else if (e===2){
                    Fui_macquarie_1 = Fui_macquarie.slice(0,1);
                    Fui_macquarie_2 = Fui_macquarie.slice(e,e);
                    Fui_macquarie_3 = Fui_macquarie.slice(1,e);                    
                }else if (e===1){
                    Fui_macquarie_1 = Fui_macquarie.slice(0,e);
                    Fui_macquarie_2 = Fui_macquarie.slice(e,e);
                    Fui_macquarie_3 = Fui_macquarie.slice(e,e);                   
                }
              
                if ($.inArray(feature, Fui_macquarie_1.map(function(value, index) { return value[0];})) !== -1){
                    return Icon_red;
                }
                if ($.inArray(feature, Fui_macquarie_2.map(function(value, index) { return value[0];})) !== -1){
                    return Icon_orange;
                }
                if ($.inArray(feature, Fui_macquarie_3.map(function(value, index) { return value[0];})) !== -1){
                    return Icon_green;
                }              
            } 
            
            
            var wsdi_rank_Macquarie = [];
            <?php if(!empty($town_water_supply)){?>;
                <?php for ($x=0; $x<count($town_water_supply); $x++) {?>
                    var loc ="<?php echo $town_water_supply[$x]["exact_location"]; ?>";
                    var wsdi ="<?php echo $town_water_supply[$x]["WSDI"]; ?>";
                    wsdi_rank_Macquarie.push([loc, wsdi]);
                <?php }?>;    
            <?php }?>;
                
            var wsr_rank_Macquarie = [];
            <?php if(!empty($town_water_supply)){?>;
                <?php for ($x=0; $x<count($town_water_supply); $x++) {?>
                    var loc ="<?php echo $town_water_supply[$x]["exact_location"]; ?>";
                    var wsr ="<?php echo $town_water_supply[$x]["water_supply_risk"]; ?>";
                    wsr_rank_Macquarie.push([loc, wsr]);
                <?php }?>;    
            <?php }?>;

            var hr_rank_Macquarie = [];
            <?php if(!empty($town_water_supply)){?>;
                <?php for ($x=0; $x<count($town_water_supply); $x++) {?>
                    var loc ="<?php echo $town_water_supply[$x]["exact_location"]; ?>";
                    var hr ="<?php echo $town_water_supply[$x]["health_risk_dueto_poor_water_quality"]; ?>";
                    hr_rank_Macquarie.push([loc, hr]);
                <?php }?>;    
            <?php }?>;
                
            var featureWTSCollection = []; 
            function show_s1(id){
                var checkBox = document.getElementById(id); 
                if (checkBox.checked === true){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Town Water Supply Insight for Macquarie Catchment--Risk of insufficient water to towns'+'</span>';
                    var elem_ov = document.createElement("div");
                    elem_ov.setAttribute('id', 'tws_legend');
                    elem_ov.innerHTML = (
                            '<img src="lib/leaflet/images/water_treatment_icon_red.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (high <small>WSDI</small>)<br>'+
                            '<img src="lib/leaflet/images/water_treatment_icon_orange.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (medium <small>WSDI</small>)<br>'+
                            '<img src="lib/leaflet/images/water_treatment_icon_green.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (low <small>WSDI</small>)<div style="height:2px;"><br></div>'
                            );
                    document.getElementById("legend").appendChild(elem_ov);
            
                    var max_row = wsdi_rank_Macquarie.length;
                    legend = L.control({position: 'bottomright'});
                    if (max_row>=3 & (max_row%3)===0){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_orange.png"> ' +
                                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (WSDI) Rank</h5>' + labels.join('<br>');
                                return div;
                        };
                    }else if (max_row>=3 & (max_row%3)===1){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_orange.png"> ' +
                                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (WSDI) Rank</h5>' + labels.join('<br>');
                                return div;
                        };                       
                    }else if (max_row>=3 & (max_row%3)===2){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_orange.png"> ' +
                                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.floor(2*max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                3 +' (' + (Math.floor(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (WSDI) Rank</h5>' + labels.join('<br>');
                                return div;
                        };
                    }else if (max_row===2){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + (Math.floor(max_row/3)+1) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                2 +' (' + (Math.ceil(2*max_row/3)) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (WSDI) Rank</h5>' + labels.join('<br>');
                                return div;
                        };                       
                    }else if (max_row===1){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + (Math.floor(max_row/3)+1) + ')');
                                div.innerHTML = '<h5>Index (WSDI) Rank</h5>' + labels.join('<br>');
                                return div;
                        }; 
                    
                    }
                    legend.addTo(map);
                            
                    <?php if(!empty($town_water_supply)){?>;
                        <?php for ($x=0; $x<count($town_water_supply); $x++) {?>                          
                            var location ="<?php echo $town_water_supply[$x]["exact_location"]; ?>";
                            var town_served ="<?php echo $town_water_supply[$x]["town_served"]; ?>";
                            var lat = "<?php echo $town_water_supply[$x]["latitude"]; ?>";
                            var lon = "<?php echo $town_water_supply[$x]["longitude"]; ?>";
                            var pos = "<?php echo $town_water_supply[$x]["postcode"]; ?>";
                            var vol = "<?php echo $town_water_supply[$x]["volume_treated"]; ?>";
                            var HBT = "<?php echo $town_water_supply[$x]["HBT_index"]; ?>";
                            var WSDI = "<?php echo $town_water_supply[$x]["WSDI"]; ?>";
                            var popu = "<?php echo $town_water_supply[$x]["population_served"]; ?>";
                            var M = L.marker([lat, lon], {icon: icon_wsdi(wsdi_rank_Macquarie, location)}).addTo(map)
                            .bindPopup('Location: ' + location + '<br/>'
                            + 'Town Served: ' + town_served + '<br/>'
                            + 'Postcode: ' + pos + '<br/>'
                            + 'Volume Treated: ' + toThousands(vol) + ' ML' + '<br/>'
                            + 'Health Based Target Index: ' + Math.round(HBT*100)/100 + '<br/>'
                            + 'Population Served: ' + Math.round(popu)+ '<br/>'
                            + 'Water Supply Deficiency Index (WSDI): ' + Math.round(WSDI)/100);
                            featureWTSCollection.push(M);
                        <?php }?>;    
                    <?php }?>;                    
                }
                if (checkBox.checked === false){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Town Water Supply Insight for Macquarie Catchment'+'</span>';
                    removeLayer(featureWTSCollection);
                    map.removeControl(legend);
                    var elementToBeRemoved = document.getElementById('tws_legend');
                    document.getElementById('legend').removeChild(elementToBeRemoved);
                }
            }
            
            var featureWTSCollection = []; 
            function show_s2(id){
                var checkBox = document.getElementById(id); 
                if (checkBox.checked === true){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Town Water Supply Insight for Macquarie Catchment--Risk of inadequate water treatment centre'+'</span>';
                    var elem_ov = document.createElement("div");
                    elem_ov.setAttribute('id', 'tws_legend');
                    elem_ov.innerHTML = (
                            '<img src="lib/leaflet/images/water_treatment_icon_red.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (high <small>WSR</small>)<br>'+
                            '<img src="lib/leaflet/images/water_treatment_icon_orange.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (medium <small>WSR</small>)<br>'+
                            '<img src="lib/leaflet/images/water_treatment_icon_green.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (low <small>WSR</small>)<div style="height:2px;"><br></div>'
                            );
                    document.getElementById("legend").appendChild(elem_ov);
            
                    var max_row = wsr_rank_Macquarie.length;
                    legend = L.control({position: 'bottomright'});
                    if (max_row>=3 & (max_row%3)===0){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_orange.png"> ' +
                                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (WSR) Rank</h5>' + labels.join('<br>');
                                return div;
                        };
                    }else if (max_row>=3 & (max_row%3)===1){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_orange.png"> ' +
                                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (WSR) Rank</h5>' + labels.join('<br>');
                                return div;
                        };                       
                    }else if (max_row>=3 & (max_row%3)===2){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_orange.png"> ' +
                                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.floor(2*max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                3 +' (' + (Math.floor(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (WSR) Rank</h5>' + labels.join('<br>');
                                return div;
                        };
                    }else if (max_row===2){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + (Math.floor(max_row/3)+1) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                2 +' (' + (Math.ceil(2*max_row/3)) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (WSR) Rank</h5>' + labels.join('<br>');
                                return div;
                        };                       
                    }else if (max_row===1){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + (Math.floor(max_row/3)+1) + ')');
                                div.innerHTML = '<h5>Index (WSR) Rank</h5>' + labels.join('<br>');
                                return div;
                        }; 
                    
                    }
                    legend.addTo(map);
                            
                    <?php if(!empty($town_water_supply)){?>;
                        <?php for ($x=0; $x<count($town_water_supply); $x++) {?>                          
                            var location ="<?php echo $town_water_supply[$x]["exact_location"]; ?>";
                            var town_served ="<?php echo $town_water_supply[$x]["town_served"]; ?>";
                            var lat = "<?php echo $town_water_supply[$x]["latitude"]; ?>";
                            var lon = "<?php echo $town_water_supply[$x]["longitude"]; ?>";
                            var pos = "<?php echo $town_water_supply[$x]["postcode"]; ?>";
                            var vol = "<?php echo $town_water_supply[$x]["volume_treated"]; ?>";
                            var HBT = "<?php echo $town_water_supply[$x]["HBT_index"]; ?>";
                            var WSDI = "<?php echo $town_water_supply[$x]["water_supply_risk"]; ?>";
                            var popu = "<?php echo $town_water_supply[$x]["population_served"]; ?>";
                            var M = L.marker([lat, lon], {icon: icon_wsr(wsr_rank_Macquarie, location)}).addTo(map)
                            .bindPopup('Location: ' + location + '<br/>'
                            + 'Town Served: ' + town_served + '<br/>'
                            + 'Postcode: ' + pos + '<br/>'
                            + 'Volume Treated: ' + toThousands(vol) + ' ML' + '<br/>'
                            + 'Health Based Target Index: ' + Math.round(HBT*100)/100 + '<br/>'
                            + 'Population Served: ' + Math.round(popu)+ '<br/>'
                            + 'Water Supply Risk (WSR): ' + WSDI);
                            featureWTSCollection.push(M);
                        <?php }?>;    
                    <?php }?>;                    
                }
                if (checkBox.checked === false){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Town Water Supply Insight for Macquarie Catchment'+'</span>';
                    removeLayer(featureWTSCollection);
                    map.removeControl(legend);
                    var elementToBeRemoved = document.getElementById('tws_legend');
                    document.getElementById('legend').removeChild(elementToBeRemoved);
                }
            }
            
            var featureWTSCollection = []; 
            function show_s3(id){
                var checkBox = document.getElementById(id); 
                if (checkBox.checked === true){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Town Water Supply Insight for Macquarie Catchment--Health risk due to poor water quality'+'</span>';
                    var elem_ov = document.createElement("div");
                    elem_ov.setAttribute('id', 'tws_legend');
                    elem_ov.innerHTML = (
                            '<img src="lib/leaflet/images/water_treatment_icon_red.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (high <small>Health Risk</small>)<br>'+
                            '<img src="lib/leaflet/images/water_treatment_icon_orange.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (medium <small>Health Risk</small>)<br>'+
                            '<img src="lib/leaflet/images/water_treatment_icon_green.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (low <small>Health Risk</small>)<div style="height:2px;"><br></div>'
                            );
                    document.getElementById("legend").appendChild(elem_ov);
            
                    var max_row = hr_rank_Macquarie.length;
                    legend = L.control({position: 'bottomright'});
                    if (max_row>=3 & (max_row%3)===0){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_orange.png"> ' +
                                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (Health Risk) Rank</h5>' + labels.join('<br>');
                                return div;
                        };
                    }else if (max_row>=3 & (max_row%3)===1){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_orange.png"> ' +
                                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (Health Risk) Rank</h5>' + labels.join('<br>');
                                return div;
                        };                       
                    }else if (max_row>=3 & (max_row%3)===2){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_orange.png"> ' +
                                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.floor(2*max_row/3) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                3 +' (' + (Math.floor(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (Health Risk) Rank</h5>' + labels.join('<br>');
                                return div;
                        };
                    }else if (max_row===2){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + (Math.floor(max_row/3)+1) + ')');
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_green.png"> ' +
                                                2 +' (' + (Math.ceil(2*max_row/3)) + '&ndash;' + max_row + ')');
                                div.innerHTML = '<h5>Index (Health Risk) Rank</h5>' + labels.join('<br>');
                                return div;
                        };                       
                    }else if (max_row===1){
                        legend.onAdd = function (map) {
                                var div = L.DomUtil.create('div', 'info legend'),
                                labels = [],
                                from, to;
                                labels.push(
                                                '<img src="lib/leaflet/images/water_treatment_icon_red.png"> ' +
                                                1 +' (' +'1&ndash;' + (Math.floor(max_row/3)+1) + ')');
                                div.innerHTML = '<h5>Index (Health Risk) Rank</h5>' + labels.join('<br>');
                                return div;
                        }; 
                    
                    }
                    legend.addTo(map);
                            
                    <?php if(!empty($town_water_supply)){?>;
                        <?php for ($x=0; $x<count($town_water_supply); $x++) {?>                          
                            var location ="<?php echo $town_water_supply[$x]["exact_location"]; ?>";
                            var town_served ="<?php echo $town_water_supply[$x]["town_served"]; ?>";
                            var lat = "<?php echo $town_water_supply[$x]["latitude"]; ?>";
                            var lon = "<?php echo $town_water_supply[$x]["longitude"]; ?>";
                            var pos = "<?php echo $town_water_supply[$x]["postcode"]; ?>";
                            var vol = "<?php echo $town_water_supply[$x]["volume_treated"]; ?>";
                            var HBT = "<?php echo $town_water_supply[$x]["HBT_index"]; ?>";
                            var WSDI = "<?php echo $town_water_supply[$x]["health_risk_dueto_poor_water_quality"]; ?>";
                            var popu = "<?php echo $town_water_supply[$x]["population_served"]; ?>";
                            var M = L.marker([lat, lon], {icon: icon_hr(hr_rank_Macquarie, location)}).addTo(map)
                            .bindPopup('Location: ' + location + '<br/>'
                            + 'Town Served: ' + town_served + '<br/>'
                            + 'Postcode: ' + pos + '<br/>'
                            + 'Volume Treated: ' + toThousands(vol) + ' ML' + '<br/>'
                            + 'Health Based Target Index: ' + Math.round(HBT*100)/100 + '<br/>'
                            + 'Population Served: ' + Math.round(popu)+ '<br/>'
                            + 'Health Risk Due to Poor Water Quality: ' + WSDI);
                            featureWTSCollection.push(M);
                        <?php }?>;    
                    <?php }?>;                    
                }
                if (checkBox.checked === false){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Town Water Supply Insight for Macquarie Catchment'+'</span>';
                    removeLayer(featureWTSCollection);
                    map.removeControl(legend);
                    var elementToBeRemoved = document.getElementById('tws_legend');
                    document.getElementById('legend').removeChild(elementToBeRemoved);
                }
            }
        </script>
    </body>
</html>


