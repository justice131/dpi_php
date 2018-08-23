<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Critical Environmental Assets</title>
        <?php include("Common_Script_Import.html"); ?>
        <style>
        .hover_info {
            width: 280px;
        }
        </style>      
        <script type="text/javascript" src="border/Macquarie_Wetland.geojson"></script>
        <script type="text/javascript" src="border/Manning_Wetland.geojson"></script>
    </head>
    <body style="background-color:#F3F3F4;">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav">
                    <li class="nav-header text-center"> <a href="http://www.water.nsw.gov.au/" target="_blank" style="padding: 3px 0 10px"> <img src="images/nsw.png" alt="nsw" height="50"/> </a> </li>
                    <li class=""> <a href="index.php" target="_blank" data-toggle="tooltip" title="Home"><i class="glyphicon glyphicon-home"></i></a> </li>
<!--                    <li class=""> <a href="Management_zone.php" target="_blank" data-toggle="tooltip" title="Water Management Zone"><i class="glyphicon glyphicon-tint"></i></a> </li>-->
                    <li class=""> <a href="Irrigation_module.php" target="_blank" data-toggle="tooltip" title="Irrigation"><i class="glyphicon glyphicon-leaf"></i></a> </li>
                    <li class=""> <a href="Mining_module.php" target="_blank" data-toggle="tooltip" title="Mining"><i class="glyphicon glyphicon-fire"></i></a> </li>
                    <li class=""> <a href="Town_water_power_gen_module.php" target="_blank" data-toggle="tooltip" title="Town Water & Power Generation"><i class="glyphicon glyphicon-flash"></i></a> </li>
                    <li class=""> <a href="Environmental_module.php" target="_blank" data-toggle="tooltip" title="Critical Environmental Assets"><i class="glyphicon glyphicon-tree-deciduous"></i></a> </li>
                    <li class=""> <a href="Data_Management_Index.php" target="_blank" data-toggle="tooltip" title="Data Management"><i class="glyphicon glyphicon-cog"></i></a> </li>
                </ul>
            </div>
	</nav>
	<div id="page-wrapper" class="gray-bg dashboard"  style="padding-bottom:20px">
		<div class="row">
			<div class="box-container" style="width:16.5%; height:728px;" id="left_panel">
				<table style="width:100%">
				  <tr>
					<td>
						<div>
						  <div class="box-title">
							<h4><b>Catchment Settings</b></h4>
						  </div>                                                   
                                               
						  <div class="box-content" style="height:210px;">
                                                    <table>
                                                        <tr>
                                                            <th>
                                                            <form action="../">
                                                                <select name="selectCAT" id="selectCAT"  onchange='OnChange(this.form.selectCAT);' >
                                                                <option value="default">------CATCHMENT------</option>
                                                                <option value="MacquarieBogan">MacquarieBogan</option>
                                                                <option value="ManningRiver">Manning</option>
                                                                </select>
                                                            </form>
                                                            </th>
                                                        <th>
                                                            <button id="clear" onClick="clearAllLayers()">Clear</button>  
                                                        </th>
                                                        </tr>
                                                    </table>
						  </div>
						</div>
					</td>
				  </tr>
				  <tr>
					<td>
						<div>
						  <div class="box-title">
							<h4><b>Map Icon Legend</b></h4>
						  </div>
						  <div class="box-content" style="height:518px;">
							<div id="rightdiv">
                                                            <div id="legend">
<!--                                                                <img src="lib/leaflet/images/marker-icon.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Regulated river<br>
                                                                <img src="lib/leaflet/images/new-marker.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Unregulated river<br>
                                                                <img src="lib/leaflet/images/new-marker-1.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Groundwater<br>
                                                                <img src="lib/leaflet/images/new-marker-2.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Management zone<br>
                                                                <img src="lib/leaflet/images/new-marker-8.png"  width="13" height="22" align = "center">&nbsp; &nbsp; &nbsp;License (regulated river)<br>
                                                                <img src="lib/leaflet/images/new-marker-6.png"  width="13" height="22" align = "center">&nbsp; &nbsp; &nbsp;License (unregulated river)<br>
                                                                <img src="lib/leaflet/images/new-marker-7.png"  width="13" height="22" align = "center">&nbsp; &nbsp; &nbsp;License (groundwater)<br>
                                                                <img src="lib/leaflet/images/new-marker-3.png"  width="13" height="22" align = "center">&nbsp; &nbsp; &nbsp;Work approval (regulated river)<br>
                                                                <img src="lib/leaflet/images/new-marker-4.png"  width="13" height="22" align = "center">&nbsp; &nbsp; &nbsp;Work approval (unregulated river)<br>
                                                                <img src="lib/leaflet/images/new-marker-5.png"  width="13" height="22" align = "center">&nbsp; &nbsp; &nbsp;Work approval (groundwater)<br>
                                                                <img src="images/green.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Floodplain wetland<br>
                                                                <img src="images/blue.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Reservoir<br>
                                                                <img src="images/purple.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Freshwater lake<br>
                                                                <img src="images/brown.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Coastal lagoons and lakes<br>
                                                                <img src="images/cyan.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Estuarine wetland<br>-->
                                                                <br>
                                                            </div>
							</div>
						  </div>
						</div>
					</td>
				  </tr>
				  </table>
			</div>                  
			
			<div class="box-container" style="width:83.5%" id="map_panel">
				<div class="box">
					<div class="box-title">
						<h4><b>Critical Environmental Assets</b></h4>
					</div>
					<div class="box-content" role="tabpanel">
						<div id="map"></div>
					</div>
                                        <div id="MacquarieBogan">
                                                <input type="checkbox" id="Regulated-CAT-MacquarieBogan" onclick="show_gis_MacquarieBogan_regulated('Regulated-CAT-MacquarieBogan')"> <font size="2">Regulated </font></br>       
                                                <input type="checkbox" id="Unregulated-CAT-MacquarieBogan" onclick="show_gis_MacquarieBogan_unregulated('Unregulated-CAT-MacquarieBogan')"> <font size="2">Unregulated </font></br>   
                                                <input type="checkbox" id="Groundwater-CAT-MacquarieBogan" onclick="show_gis_MacquarieBogan_groundwater('Groundwater-CAT-MacquarieBogan')"> <font size="2">Groundwater </font></span></br>   
<!--                                                <input type="checkbox" id="Work-approvals-CAT-MacquarieBogan" onclick="show_gis_MacquarieBogan_workapprovals('Work-approvals-CAT-MacquarieBogan')"> <font size="2">License </font></br>
                                                <input type="checkbox" id="Approvals-CAT-MacquarieBogan" onclick="show_gis_MacquarieBogan_approvals('Approvals-CAT-MacquarieBogan')"> <font size="2">Work approvals </font>-->
                                        </div>
        
                                        <div id="ManningRiver">
                                                <input type="checkbox" id="Regulated-CAT-Manning" onclick="show_gis_Manning_regulated('Regulated-CAT-Manning')"> <font size="2">Regulated </font></br>
                                                <input type="checkbox" id="Unregulated-CAT-Manning" onclick="show_gis_Manning_unregulated('Unregulated-CAT-Manning')"> <font size="2">Unregulated </font></br>
                                                <input type="checkbox" id="Groundwater-CAT-Manning" onclick="show_gis_Manning_groundwater('Groundwater-CAT-Manning')"> <font size="2">Groundwater </font></br>
<!--                                                <input type="checkbox" id="Work-approvals-CAT-Manning" onclick="show_gis_Manning_workapprovals('Work-approvals-CAT-Manning')"> <font size="2">License </font></br>
                                                <input type="checkbox" id="Approvals-CAT-Manning" onclick="show_gis_Manning_approvals('Approvals-CAT-Manning')"> <font size="2">Work approvals </font>-->
                                        </div>   
                                    
                                        <div id="link_to_parallel_coordinate">
                                            <a href="parallel_coordinate_macquarie_environment.php" target="_blank">Insight</a>
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
            if(!empty($_GET['catchment_name'])){
                if($conn!=null){
                    $sql_0 = "SELECT * FROM whole_catchment_indices WHERE catchment_name='".$_GET['catchment_name']."'";
                    $sql_1 = "SELECT * FROM license_data";
                    $sql_2 = "SELECT * FROM work_approval";
                    $result = $conn->query($sql_0);
                    $result_1 = $conn->query($sql_1);
                    $result_2 = $conn->query($sql_2);
                    $row = $result->fetch_assoc();
                    $workapproval = array();
                    $m = -1;
                    while ($row_1 = $result_1->fetch_assoc()){
                        $m++;
                        $workapproval[$m] = $row_1;
                    }
                    $work_approval = array();
                    $n = -1;
                    while ($row_2 = $result_2->fetch_assoc()){
                        $n++;
                        $work_approval[$n] = $row_2;
                    }                    
                }else{
                    include 'db.helper/db_connection_ini.php';
                }
            }
            //Edited by justice
        ?>
        
        <script type="text/javascript">
            //var lga = lgaBorders;
            var MacquarieBogan_CatchmentBoundary = MacquarieBogan_CatchmentBoundary;
            var MacquarieBogan_CatchmentBoundary_1 = MacquarieBogan_CatchmentBoundary;
            var ManningRiver_CatchmentBoundary = ManningRiver_CatchmentBoundary;
            var ManningRiver_CatchmentBoundary_1 = ManningRiver_CatchmentBoundary;
            var MacquarieBogan_RugulatedRiver = MacquarieBogan_RugulatedRiver;
            var MacquarieBogan_GW = MacquarieBogan_GW;
            var MacquarieBogan_unregulated = MacquarieBogan_unregulated;
            var Macquarie_Unregulatedriver = Macquarie_UnregulatedRiver;
            var Manning_unregulated = Manning_unregulated;
            var Manning_Unregulatedriver = Manning_Unregulatedriver;
            var Manning_Groundwater = Manning_Groundwater;
            var Macquarie_Wetland = Macquarie_Wetland;
            var Manning_Wetland = Manning_Wetland;

            // Show preloader
            $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");;
            });
            
            var elem_ov = document.createElement("div");
            elem_ov.setAttribute('id', 'irr_legend');
            elem_ov.innerHTML = (
                    '<img src="images/green.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Floodplain wetland<br>'+
                    '<img src="images/blue.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Reservoir<br>'+
                    '<img src="images/purple.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Freshwater lake<br>'+
                    '<img src="images/brown.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Coastal lagoons and lakes<br>'+
                    '<img src="images/cyan.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Estuarine wetland<div style="height:2px;"><br></div'
                    );
            document.getElementById("legend").appendChild(elem_ov);
            
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

            var catchments = {
                "MacquarieBogan": MacquarieBogan_CatchmentBoundary,
                "ManningRiver": ManningRiver_CatchmentBoundary
            };           

            var getProperty = function (propertyName) {
                return catchments[propertyName];
            };
            
            var removeLayer = function (feature) {
                for (var i = 0; i < feature.length; i++){     
                    map.removeLayer(feature[i]);
                }               
            };
            
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
            
            function inside (point, vs) {
                var x = point[0], y = point[1];
                var inside = false;
                for (var i = 0, j = vs.length - 1; i < vs.length; j = i++) {
                var xi = vs[i][0], yi = vs[i][1];
                var xj = vs[j][0], yj = vs[j][1];  
                var intersect = ((yi > y) !== (yj > y))
                && (x < (xj - xi) * (y - yi) / (yj - yi) + xi);
                if (intersect) inside = !inside;
                }
                return inside;
            }
            
            function mouse_over_workapproval(M){
                M.on('mouseover', function (e) {
                    this.openPopup();
                });
                M.on('mouseout', function (e) {
                    this.closePopup();
                });
            }
            
            function OnChange(dropdown){
//                var myindex = dropdown.selectedIndex;
//                var CATName = dropdown.options[myindex].value;
//                var CATValue = getProperty(CATName);
//                addCATLayer(CATName, CATValue);
                
                //Edited by justice
                var  myselect=document.getElementById("selectCAT");
                var selectedIndex=myselect.selectedIndex;
                var selectValue=myselect.options[selectedIndex].value;
                if(selectValue==="MacquarieBogan"){
                    window.location.href = "Environmental_module.php?catchment_name=MacquarieBogan";
                }else if(selectValue==="ManningRiver"){
                    window.location.href = "Environmental_module.php?catchment_name=ManningRiver";
                }
                //Edited by justice
            }
            
            function getColor(Color_crop){
                if (Color_crop === "Floodplain Wetland"){
                    return 'green';
                }else if (Color_crop === "Reservoir"){
                    return 'blue';
                }else if (Color_crop === "Freshwater Lake"){
                    return 'purple';
                }else if (Color_crop === "Coastal lagoons and lakes"){
                    return 'brown';
                }else if (Color_crop === "Estuarine Wetland"){
                    return 'cyan';
                }else {
                    return 'black';
                }
            }
            
            function idsi_color(){
                <?php if(!empty($row)){?>; 
                    var overall_fui = "<?php echo $row["overall_fui"]; ?>";
                <?php }?>;
                    
                if (overall_fui>0.4){
                    return 'rgba(21, 171, 108, 1)';
                }else if (overall_fui>0.25 & overall_fui<=0.4){
                    return 'rgba(252, 157, 61, 1)';
                }else{
                    return 'rgba(255, 56, 3, 1)';
                }
            }
            
            var featureCATCollection = []; 
            var check_collection = [];
            function addCATLayer(CATName, CATValue){
                for (var i = 0; i < featureCATCollection.length; i++){     
                    map.removeLayer(featureCATCollection[i]);
                }
                if (check_collection.length !== 0){
                    for (var i = 0; i < check_collection.length; i++){
                        check_collection[i].style.display = "none";   
                    }
                }            
                displayedCAT = [];
                check_collection = [];
                checkbox_id = document.getElementById(CATName);
                if($.inArray(CATName, displayedCAT) === -1) {
                    CAT = L.geoJSON(CATValue, {
                        style: function (feature) {
                                return { color: idsi_color(), weight: 0.3};
                        },
                        onEachFeature: onEachFeature,
                        interactive: false
                        }).addTo(map);
                if(CATName === 'MacquarieBogan'){
                    Environment = L.geoJSON(Macquarie_Wetland, {
                        //style: function (feature) {
                        //        return { color: getRandomColor(), weight: 0.5, fillOpacity: 0.4};                               
                       // },
                        onEachFeature: function onEach(feature, layer){
                            layer.setStyle({color: getColor(feature.properties.GROUP_), weight: 1.0, fillOpacity: 0.8});
                            return layer.bindPopup('Name: ' + feature.properties.NAME + '<br/>' 
                                    + 'Type: ' + feature.properties.GROUP_ + '<br/>' 
                                    + 'Area: ' + toThousands(Math.round(feature.properties.HECTARES*100)/100) + ' Ha');
                        }
                        }).addTo(map);
                } 
                
                if(CATName === 'ManningRiver'){
                    Environment = L.geoJSON(Manning_Wetland, {
                        //style: function (feature) {
                        //        return { color: getRandomColor(), weight: 0.5, fillOpacity: 0.4};
                        //},
                        onEachFeature: function onEach(feature, layer){
                            layer.setStyle({color: getColor(feature.properties.GROUP_), weight: 1.0, fillOpacity: 0.8});
                            return layer.bindPopup('Name: ' + feature.properties.NAME + '<br/>' 
                                    + 'Type: ' + feature.properties.GROUP_ + '<br/>' 
                                    + 'Area: ' + toThousands(Math.round(feature.properties.HECTARES*100)/100) + ' Ha');
                        }
                        }).addTo(map);
                } 
                //Zooms to the layer selected
                if (CATName==="MacquarieBogan"){
                    map.setView([-31.8, 148.5], 8);
                }else if (CATName==="ManningRiver"){
                    map.setView([-31.75, 151.9],10);
                }
                
                hover_info.addTo(map);
                if (checkbox_id !== null){
                    checkbox_id.style.display = "block";
                }
                //Reset to default checkbox
                $("input[type=checkbox]").each(function() { this.checked=false; });
                featureCATCollection.push(CAT);
                featureCATCollection.push(Environment);
                displayedCAT.push(CATName);
                check_collection.push(checkbox_id);
                // Remove other's layers
                removeLayer(displayed_gis_layer_regulated);
                removeLayer(displayed_gis_layer_unregulated);
                removeLayer(displayed_gis_layer_groundwater);
                }        
            }          
            
            function clearAllLayers(){
                for (var i = 0; i < featureCATCollection.length; i++){     
                    map.removeLayer(featureCATCollection[i]);
                    if (checkbox_id !== null){
                        checkbox_id.style.display = "none";
                    }
                }
                //hover_info.style.visibility = 'hidden';
                removeLayer(displayed_gis_layer_regulated);
                removeLayer(displayed_gis_layer_unregulated);
                removeLayer(displayed_gis_layer_groundwater);
                removeLayer(displayed_gis_layer_workapproval);
                removeLayer(displayed_gis_layer_approval);
                document.getElementById('selectCAT').value = 'default';
                map.removeControl(hover_info);
            }
                       
            // find the middle point from geojason file
            function find_middle_point(geo_coordinate){
                var geo_length = geo_coordinate.length;
                var coordinate = [];
                var index = parseInt(geo_length/2);
                coordinate[0] = geo_coordinate[index][1];
                coordinate[1] = geo_coordinate[index][0];
                return coordinate;
            }
            
            function getCentroid(arr) {
                var twoTimesSignedArea = 0;
                var cxTimes6SignedArea = 0;
                var cyTimes6SignedArea = 0;
                var length = arr.length;
                var x = function (i) { return arr[i % length][0]; };
                var y = function (i) { return arr[i % length][1]; };
                for ( var i = 0; i < arr.length; i++) {
                    var twoSA = x(i)*y(i+1) - x(i+1)*y(i);
                    twoTimesSignedArea += twoSA;
                    cxTimes6SignedArea += (x(i) + x(i+1)) * twoSA;
                    cyTimes6SignedArea += (y(i) + y(i+1)) * twoSA;
                }
                var sixSignedArea = 3 * twoTimesSignedArea;
                return [cyTimes6SignedArea / sixSignedArea, cxTimes6SignedArea / sixSignedArea];        
            }
            
            function getRandomColor(){
                var letters = '0123456789ABCDEF';
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            }
            
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
                                           
            //display regulated info for MacquarieBogan
            var displayed_gis_layer_regulated = [];          
            function show_gis_MacquarieBogan_regulated(id){
                var checkBox = document.getElementById(id); 
                var geojsonfile = MacquarieBogan_RugulatedRiver;
                // display legend for reg river
                var elem = document.createElement("div");
                elem.setAttribute('id', 'reg_mac');
                elem.innerHTML = ('<img src="lib/leaflet/images/reg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Regulated river<br>');
                
                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    var Reg = L.geoJSON(geojsonfile, {
                        style: function (feature) {
                                switch(feature.properties.OBJECTID){
                                    case 1: return { color: "rgb(0, 0, 125)", weight: 2}; break;
                                    case 2: return { color: "rgb(255, 125, 0)", weight: 2}; break;
                                    case 3: return { color: "rgb(255, 255, 0)", weight: 2}; break;
                                    case 4: return { color: "rgb(0, 0, 0)", weight: 2}; break;
                                    case 5: return { color: "rgb(125, 0, 0)", weight: 2}; break;
                                    case 6: return { color: "rgb(255, 0, 125)", weight: 2}; break;
                                    case 7: return { color: "rgb(255, 0, 255)", weight: 2}; break;
                                    case 8: return { color: "rgb(125, 0, 125)", weight: 2}; break;
                                    case 9: return { color: "rgb(0, 125, 0)", weight: 2}; break;
                                    case 10: return { color: "rgb(0, 255, 0)", weight: 2}; break;
                                    case 11: return { color: "rgb(0, 0, 255)", weight: 2}; break;
                                    case 12: return { color: "rgb(255, 0, 0)", weight: 2}; break;
                                    case 13: return { color: "rgb(0, 255, 125)", weight: 2}; break;
                                    case 14: return { color: "rgb(0, 255, 255)", weight: 2}; break;
                               }}
                    }).addTo(map);
                    displayed_gis_layer_regulated.push(Reg);
                    
                    //display marker for regulated rivers
                    var regulated_river_0 = find_middle_point(MacquarieBogan_RugulatedRiver.features[0].geometry.coordinates[0]);
                    var regulated_river_1 = find_middle_point(MacquarieBogan_RugulatedRiver.features[1].geometry.coordinates[0]);
                    var regulated_river_2 = find_middle_point(MacquarieBogan_RugulatedRiver.features[2].geometry.coordinates[0]);
                    var regulated_river_3 = find_middle_point(MacquarieBogan_RugulatedRiver.features[3].geometry.coordinates[0]);
                    var regulated_river_4 = find_middle_point(MacquarieBogan_RugulatedRiver.features[4].geometry.coordinates[0]);
                    var regulated_river_5 = find_middle_point(MacquarieBogan_RugulatedRiver.features[5].geometry.coordinates[0]);
                    var regulated_river_6 = find_middle_point(MacquarieBogan_RugulatedRiver.features[6].geometry.coordinates[0]);
                    var regulated_river_7 = find_middle_point(MacquarieBogan_RugulatedRiver.features[7].geometry.coordinates[0]);
                    var regulated_river_8 = find_middle_point(MacquarieBogan_RugulatedRiver.features[8].geometry.coordinates[0]);
                    var regulated_river_9 = find_middle_point(MacquarieBogan_RugulatedRiver.features[9].geometry.coordinates[0]);
                    var regulated_river_10 = find_middle_point(MacquarieBogan_RugulatedRiver.features[10].geometry.coordinates[0]);
                    var regulated_river_11 = find_middle_point(MacquarieBogan_RugulatedRiver.features[11].geometry.coordinates[0]);
                    var regulated_river_12 = find_middle_point(MacquarieBogan_RugulatedRiver.features[12].geometry.coordinates[0]);
                    var regulated_river_13 = find_middle_point(MacquarieBogan_RugulatedRiver.features[13].geometry.coordinates[0]);
                    
                    var Mak_1 = L.marker(regulated_river_0, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[0].properties.RIVER_CREE); 
            
                    var Mak_2 = L.marker(regulated_river_1, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[1].properties.RIVER_CREE); 
            
                    var Mak_3 = L.marker(regulated_river_2, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[2].properties.RIVER_CREE); 
            
                    var Mak_4 = L.marker(regulated_river_3, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[3].properties.RIVER_CREE); 
            
                    var Mak_5 = L.marker(regulated_river_4, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[4].properties.RIVER_CREE); 
            
                    var Mak_6 = L.marker(regulated_river_5, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[5].properties.RIVER_CREE);
            
                    var Mak_7 = L.marker(regulated_river_6, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[6].properties.RIVER_CREE); 
            
                    var Mak_8 = L.marker(regulated_river_7, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[7].properties.RIVER_CREE); 
            
                    var Mak_9 = L.marker(regulated_river_8, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[8].properties.RIVER_CREE); 
            
                    var Mak_10 = L.marker(regulated_river_9, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[9].properties.RIVER_CREE); 
            
                    var Mak_11 = L.marker(regulated_river_10, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[10].properties.RIVER_CREE); 
            
                    var Mak_12 = L.marker(regulated_river_11, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[11].properties.RIVER_CREE);
            
                    var Mak_13 = L.marker(regulated_river_12, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[12].properties.RIVER_CREE); 
            
                    var Mak_14 = L.marker(regulated_river_13, {icon: Icon_reg}).addTo(map)
                    .bindPopup(MacquarieBogan_RugulatedRiver.features[13].properties.RIVER_CREE); 
            
                    displayed_gis_layer_regulated.push(Mak_1);
                    displayed_gis_layer_regulated.push(Mak_2);
                    displayed_gis_layer_regulated.push(Mak_3);
                    displayed_gis_layer_regulated.push(Mak_4);
                    displayed_gis_layer_regulated.push(Mak_5);
                    displayed_gis_layer_regulated.push(Mak_6);
                    displayed_gis_layer_regulated.push(Mak_7);
                    displayed_gis_layer_regulated.push(Mak_8);
                    displayed_gis_layer_regulated.push(Mak_9);
                    displayed_gis_layer_regulated.push(Mak_10);
                    displayed_gis_layer_regulated.push(Mak_11);
                    displayed_gis_layer_regulated.push(Mak_12);
                    displayed_gis_layer_regulated.push(Mak_13);
                    displayed_gis_layer_regulated.push(Mak_14);
                }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_regulated);
                    var elementToBeRemoved = document.getElementById('reg_mac');
                    document.getElementById('legend').removeChild(elementToBeRemoved);
                } 
            }
            
            //display unregulated info for MacquarieBogan
            var displayed_gis_layer_unregulated = [];          
            function show_gis_MacquarieBogan_unregulated(id){
                var checkBox = document.getElementById(id); 
                var geojsonfile = MacquarieBogan_unregulated;
                var geojsonfile_1 = Macquarie_Unregulatedriver;
                link_to_parr = document.getElementById('link_to_parallel_coordinate');
                var elem = document.createElement("div");
                elem.setAttribute('id', 'unreg_mac');
                elem.innerHTML = ('<img src="lib/leaflet/images/unreg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Unregulated river<br>');
                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    // display link icon
                    link_to_parr.style.display = 'block';                                       
                                    
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }
                    var markersLayer = new L.LayerGroup();
                    map.addLayer(markersLayer);
                    controlSearch = new L.Control.Search({
                        position:'topleft',
                        layer: markersLayer,
                        initial: false,
                        zoom: 11,
                        marker: false,
                        propertyName: 'water_source',
                        textPlaceholder: 'Search water source',
                        textErr: 'Water source not found'
                    }); 
                    map.addControl(controlSearch);
                    
                    var Reg = L.geoJSON(geojsonfile, {
//                        style: function (feature) {
//                            return { color: getRandomColor(), weight: 0.0, fillOpacity: 0.3};
//                        }
                        onEachFeature: function onEach(feature, layer){
                            layer.setStyle({color: 'grey', weight: 1.2, fillOpacity: 0.4});
                        }

                    }).addTo(map);
                    var Reg_1 = L.geoJSON(geojsonfile_1, {
                        style: function (feature) {
                            return { color: 'blue', weight: 1.2, fillOpacity: 0.3};
                        }
                    }).addTo(map);                   
                    displayed_gis_layer_unregulated.push(Reg);  
                    displayed_gis_layer_unregulated.push(Reg_1);  
                    
                    //display marker for unregulated
                    var unregulated_0 = getCentroid(MacquarieBogan_unregulated.features[0].geometry.coordinates[0][0]);
                    var unregulated_1 = getCentroid(MacquarieBogan_unregulated.features[1].geometry.coordinates[0][0]);
                    var unregulated_2 = getCentroid(MacquarieBogan_unregulated.features[2].geometry.coordinates[0][0]);
                    var unregulated_3 = getCentroid(MacquarieBogan_unregulated.features[3].geometry.coordinates[0][0]);
                    var unregulated_4 = getCentroid(MacquarieBogan_unregulated.features[4].geometry.coordinates[0][0]);
                    var unregulated_5 = getCentroid(MacquarieBogan_unregulated.features[5].geometry.coordinates[0][0]);
                    var unregulated_6 = getCentroid(MacquarieBogan_unregulated.features[6].geometry.coordinates[0][0]);
                    var unregulated_7 = getCentroid(MacquarieBogan_unregulated.features[7].geometry.coordinates[0][0]);
                    var unregulated_8 = getCentroid(MacquarieBogan_unregulated.features[8].geometry.coordinates[0][0]);
                    var unregulated_9 = getCentroid(MacquarieBogan_unregulated.features[9].geometry.coordinates[0][0]);
                    var unregulated_10 = getCentroid(MacquarieBogan_unregulated.features[10].geometry.coordinates[0][0]);
                    var unregulated_11 = getCentroid(MacquarieBogan_unregulated.features[11].geometry.coordinates[0][0]);
                    var unregulated_12 = getCentroid(MacquarieBogan_unregulated.features[12].geometry.coordinates[0][0]);
                    var unregulated_13 = getCentroid(MacquarieBogan_unregulated.features[13].geometry.coordinates[0][0]);
                    var unregulated_14 = getCentroid(MacquarieBogan_unregulated.features[14].geometry.coordinates[0][0]);
                    var unregulated_15 = getCentroid(MacquarieBogan_unregulated.features[15].geometry.coordinates[0][0]);
                    var unregulated_16 = getCentroid(MacquarieBogan_unregulated.features[16].geometry.coordinates[1][0]);
                    var unregulated_17 = getCentroid(MacquarieBogan_unregulated.features[17].geometry.coordinates[0][0]);
                    var unregulated_18 = getCentroid(MacquarieBogan_unregulated.features[18].geometry.coordinates[0][0]);
                    var unregulated_19 = getCentroid(MacquarieBogan_unregulated.features[19].geometry.coordinates[0][0]);
                    var unregulated_20 = getCentroid(MacquarieBogan_unregulated.features[20].geometry.coordinates[0][0]);
                    var unregulated_21 = getCentroid(MacquarieBogan_unregulated.features[21].geometry.coordinates[0][0]);
                    var unregulated_22 = getCentroid(MacquarieBogan_unregulated.features[22].geometry.coordinates[0][0]);
                    var unregulated_23 = getCentroid(MacquarieBogan_unregulated.features[23].geometry.coordinates[0][0]);
                    var unregulated_24 = getCentroid(MacquarieBogan_unregulated.features[24].geometry.coordinates[0][0]);
                    var unregulated_25 = getCentroid(MacquarieBogan_unregulated.features[25].geometry.coordinates[0][0]);
                    var unregulated_26 = getCentroid(MacquarieBogan_unregulated.features[26].geometry.coordinates[0][0]);
                    var unregulated_27 = getCentroid(MacquarieBogan_unregulated.features[27].geometry.coordinates[0][0]);
                    var unregulated_28 = getCentroid(MacquarieBogan_unregulated.features[28].geometry.coordinates[0][0]);
                    var unregulated_29 = getCentroid(MacquarieBogan_unregulated.features[29].geometry.coordinates[0][0]);
                    
                    <?php
                        include 'db.helper/db_connection_ini.php';
                        if($conn!=null){
                            $sq_0 = "SELECT * FROM water_source WHERE water_source = 'Backwater Boggy Cowal Water Source'";                             
                            $res_0 = $conn->query($sq_0);
                            $ro_0= $res_0->fetch_assoc();
                            
                            $sq_1 = "SELECT * FROM water_source WHERE water_source = 'Bell River Water Source'";                             
                            $res_1 = $conn->query($sq_1);
                            $ro_1 = $res_1->fetch_assoc();
                            
                            $sq_2 = "SELECT * FROM water_source WHERE water_source = 'Bulbodney Grahway Creek Water Source'";                             
                            $res_2 = $conn->query($sq_2);
                            $ro_2 = $res_2->fetch_assoc();
                            
                            $sq_3 = "SELECT * FROM water_source WHERE water_source = 'Burrendong Dam Tributaries Water Source'";                             
                            $res_3 = $conn->query($sq_3);
                            $ro_3 = $res_3->fetch_assoc();
                            
                            $sq_4 = "SELECT * FROM water_source WHERE water_source = 'Campbells River Water Source'";                             
                            $res_4 = $conn->query($sq_4);
                            $ro_4 = $res_4->fetch_assoc();
                            
                            $sq_5 = "SELECT * FROM water_source WHERE water_source = 'Coolbaggie Creek Water Source'";                             
                            $res_5 = $conn->query($sq_5);
                            $ro_5 = $res_5->fetch_assoc();
                            
                            $sq_6 = "SELECT * FROM water_source WHERE water_source = 'Cooyal Wialdra Creek Water Source'";                             
                            $res_6 = $conn->query($sq_6);
                            $ro_6 = $res_6->fetch_assoc();

                            $sq_7 = "SELECT * FROM water_source WHERE water_source = 'Ewenmar Creek Water Source'";                             
                            $res_7 = $conn->query($sq_7);
                            $ro_7 = $res_7->fetch_assoc();

                            $sq_8 = "SELECT * FROM water_source WHERE water_source = 'Fish River Water Source'";                             
                            $res_8 = $conn->query($sq_8);
                            $ro_8 = $res_8->fetch_assoc();

                            $sq_9 = "SELECT * FROM water_source WHERE water_source = 'Goolma Creek Water Source'";                             
                            $res_9 = $conn->query($sq_9);
                            $ro_9 = $res_9->fetch_assoc();

                            $sq_10 = "SELECT * FROM water_source WHERE water_source = 'Lawsons Creek Water Source'";                             
                            $res_10 = $conn->query($sq_10);
                            $ro_10 = $res_10->fetch_assoc();

                            $sq_11 = "SELECT * FROM water_source WHERE water_source = 'Little River Water Source'";                             
                            $res_11 = $conn->query($sq_11);
                            $ro_11 = $res_11->fetch_assoc();

                            $sq_12 = "SELECT * FROM water_source WHERE water_source = 'Lower Bogan River Water Source'";                             
                            $res_12 = $conn->query($sq_12);
                            $ro_12 = $res_12->fetch_assoc();

                            $sq_13 = "SELECT * FROM water_source WHERE water_source = 'Lower Macquarie River Water Source'";                             
                            $res_13 = $conn->query($sq_13);
                            $ro_13 = $res_13->fetch_assoc();

                            $sq_14 = "SELECT * FROM water_source WHERE water_source = 'Lower Talbragar River Water Source'";                             
                            $res_14 = $conn->query($sq_14);
                            $ro_14 = $res_14->fetch_assoc();

                            $sq_15 = "SELECT * FROM water_source WHERE water_source = 'Macquarie River above Burrendong Water Source'";                             
                            $res_15 = $conn->query($sq_15);
                            $ro_15 = $res_15->fetch_assoc();

                            $sq_16 = "SELECT * FROM water_source WHERE water_source = 'Marra Creek Water Source'";                             
                            $res_16 = $conn->query($sq_16);
                            $ro_16 = $res_16->fetch_assoc();

                            $sq_17 = "SELECT * FROM water_source WHERE water_source = 'Marthaguy Creek Water Source'";                             
                            $res_17 = $conn->query($sq_17);
                            $ro_17 = $res_17->fetch_assoc();

                            $sq_18 = "SELECT * FROM water_source WHERE water_source = 'Maryvale Geurie Creek Water Source'";                             
                            $res_18 = $conn->query($sq_18);
                            $ro_18 = $res_18->fetch_assoc();

                            $sq_19 = "SELECT * FROM water_source WHERE water_source = 'Molong Creek Water Source'";                             
                            $res_19 = $conn->query($sq_19);
                            $ro_19 = $res_19->fetch_assoc();

                            $sq_20 = "SELECT * FROM water_source WHERE water_source = 'Piambong Creek Water Source'";                             
                            $res_20 = $conn->query($sq_20);
                            $ro_20 = $res_20->fetch_assoc();   
                            
                            $sq_21 = "SELECT * FROM water_source WHERE water_source = 'Pipeclay Creek Water Source'";                             
                            $res_21 = $conn->query($sq_21);
                            $ro_21 = $res_21->fetch_assoc(); 
                            
                            $sq_22 = "SELECT * FROM water_source WHERE water_source = 'Queen Charlottes Vale Evans Plains Creek Water Source'";                             
                            $res_22 = $conn->query($sq_22);
                            $ro_22 = $res_22->fetch_assoc(); 
                            
                            $sq_23 = "SELECT * FROM water_source WHERE water_source = 'Summerhill Creek Water Source'";                             
                            $res_23 = $conn->query($sq_23);
                            $ro_23 = $res_23->fetch_assoc(); 
                            
                            $sq_24 = "SELECT * FROM water_source WHERE water_source = 'Turon Crudine River Water Source'";                             
                            $res_24 = $conn->query($sq_24);
                            $ro_24 = $res_24->fetch_assoc(); 

                            $sq_25 = "SELECT * FROM water_source WHERE water_source = 'Upper Bogan River Water Source'";                             
                            $res_25 = $conn->query($sq_25);
                            $ro_25 = $res_25->fetch_assoc(); 

                            $sq_26 = "SELECT * FROM water_source WHERE water_source = 'Upper Cudgegong River Water Source'";                             
                            $res_26 = $conn->query($sq_26);
                            $ro_26 = $res_26->fetch_assoc(); 

                            $sq_27 = "SELECT * FROM water_source WHERE water_source = 'Upper Talbragar River Water Source'";                             
                            $res_27 = $conn->query($sq_27);
                            $ro_27 = $res_27->fetch_assoc(); 

                            $sq_28 = "SELECT * FROM water_source WHERE water_source = 'Wambangalong Whylandra Creek Water Source'";                             
                            $res_28 = $conn->query($sq_28);
                            $ro_28 = $res_28->fetch_assoc(); 

                            $sq_29 = "SELECT * FROM water_source WHERE water_source = 'Winburndale Rivulet Water Source'";                             
                            $res_29 = $conn->query($sq_29);
                            $ro_29 = $res_29->fetch_assoc(); 
                            
                            $sq_30 = "SELECT * FROM LGA_Data WHERE catchment = 'macquarie'";  
                            $res_30 = $conn->query($sq_30);
                            $lga_1 = array();
                            $o = -1;
                            while ($ro_30 = $res_30->fetch_assoc()){
                                $o++;
                                $lga_1[$o] = $ro_30;
                            }                         
                        }else{
                            include 'db.helper/db_connection_ini.php';
                        }
                    ?>
                   
                    <?php if(!empty($ro_0)){?>
                        var AE ="<?php echo $ro_0["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_0["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_0["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_0["FUI"]; ?>";
                        var DS ="<?php echo $ro_0["DSI"]; ?>";
                        var IE ="<?php echo $ro_0["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_0["wetland_area"]; ?>";
                    <?php }?>  
                    
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_backwater"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?> 
                    
                    var Mak_uw_1 = L.marker(unregulated_0, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[0].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[0].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_1);

                    <?php if(!empty($ro_1)){?>
                        var AE ="<?php echo $ro_1["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_1["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_1["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_1["FUI"]; ?>";
                        var DS ="<?php echo $ro_1["DSI"]; ?>";
                        var IE ="<?php echo $ro_1["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_1["wetland_area"]; ?>";
                    <?php }?> 

                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_bell"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?> 
                    
                    var Mak_uw_2 = L.marker(unregulated_1, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[1].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[1].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_2);

                    <?php if(!empty($ro_2)){?>
                        var AE ="<?php echo $ro_2["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_2["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_2["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_2["FUI"]; ?>";
                        var DS ="<?php echo $ro_2["DSI"]; ?>";
                        var IE ="<?php echo $ro_2["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_2["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_bullbodney"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?> 
                        
                    var Mak_uw_3 = L.marker(unregulated_2, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[2].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[2].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_3);

                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_burrendong"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?> 
            
                    <?php if(!empty($ro_3)){?>
                        var AE ="<?php echo $ro_3["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_3["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_3["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_3["FUI"]; ?>";
                        var DS ="<?php echo $ro_3["DSI"]; ?>";
                        var IE ="<?php echo $ro_3["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_3["wetland_area"]; ?>";
                    <?php }?> 
                    var Mak_uw_4 = L.marker(unregulated_3, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[3].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[3].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'All Entitlement: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_4);

                    <?php if(!empty($ro_4)){?>
                        var AE ="<?php echo $ro_4["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_4["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_4["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_4["FUI"]; ?>";
                        var DS ="<?php echo $ro_4["DSI"]; ?>";
                        var IE ="<?php echo $ro_4["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_4["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_campbells"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?> 
                        
                    var Mak_uw_5 = L.marker(unregulated_4, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[4].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[4].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));        
                    markersLayer.addLayer(Mak_uw_5);

                    <?php if(!empty($ro_5)){?>
                        var AE ="<?php echo $ro_5["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_5["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_5["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_5["FUI"]; ?>";
                        var DS ="<?php echo $ro_5["DSI"]; ?>";
                        var IE ="<?php echo $ro_5["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_5["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_coolbaggie"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?> 
                        
                    var Mak_uw_6 = L.marker(unregulated_5, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[5].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[5].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_6);

                    <?php if(!empty($ro_6)){?>
                        var AE ="<?php echo $ro_6["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_6["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_6["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_6["FUI"]; ?>";
                        var DS ="<?php echo $ro_6["DSI"]; ?>";
                        var IE ="<?php echo $ro_6["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_6["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_cooyal"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?> 
                        
                    var Mak_uw_7 = L.marker(unregulated_6, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[6].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[6].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_7);
 
                     <?php if(!empty($ro_7)){?>
                        var AE ="<?php echo $ro_7["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_7["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_7["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_7["FUI"]; ?>";
                        var DS ="<?php echo $ro_7["DSI"]; ?>";
                        var IE ="<?php echo $ro_7["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_7["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_ewenmar"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?> 

                    var Mak_uw_8 = L.marker(unregulated_7, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[7].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[7].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));    
                    markersLayer.addLayer(Mak_uw_8);

                    <?php if(!empty($ro_8)){?>
                        var AE ="<?php echo $ro_8["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_8["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_8["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_8["FUI"]; ?>";
                        var DS ="<?php echo $ro_8["DSI"]; ?>";
                        var IE ="<?php echo $ro_8["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_8["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_fish"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?> 
                        
                        
                    var Mak_uw_9 = L.marker(unregulated_8, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[8].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[8].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_9);
                    
                    <?php if(!empty($ro_9)){?>
                        var AE ="<?php echo $ro_9["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_9["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_9["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_9["FUI"]; ?>";
                        var DS ="<?php echo $ro_9["DSI"]; ?>";
                        var IE ="<?php echo $ro_9["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_9["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_goolma"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>                         
                        
                    var Mak_uw_10 = L.marker(unregulated_9, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[9].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[9].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'All Entitlement: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_10);
            
                     <?php if(!empty($ro_10)){?>
                        var AE ="<?php echo $ro_10["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_10["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_10["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_10["FUI"]; ?>";
                        var DS ="<?php echo $ro_10["DSI"]; ?>";
                        var IE ="<?php echo $ro_10["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_10["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_lawsons"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_11 = L.marker(unregulated_10, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[10].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[10].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_11);
            
                    <?php if(!empty($ro_11)){?>
                        var AE ="<?php echo $ro_11["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_11["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_11["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_11["FUI"]; ?>";
                        var DS ="<?php echo $ro_11["DSI"]; ?>";
                        var IE ="<?php echo $ro_11["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_11["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_little"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_12 = L.marker(unregulated_11, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[11].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[11].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_12);
            
                    <?php if(!empty($ro_12)){?>
                        var AE ="<?php echo $ro_12["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_12["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_12["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_12["FUI"]; ?>";
                        var DS ="<?php echo $ro_12["DSI"]; ?>";
                        var IE ="<?php echo $ro_12["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_12["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_lowerbogan"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_13 = L.marker(unregulated_12, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[12].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[12].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_13);
 
                     <?php if(!empty($ro_13)){?>
                        var AE ="<?php echo $ro_13["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_13["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_13["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_13["FUI"]; ?>";
                        var DS ="<?php echo $ro_13["DSI"]; ?>";
                        var IE ="<?php echo $ro_13["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_13["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_lowermacquarie"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_14 = L.marker(unregulated_13, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[13].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[13].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_14);

                    <?php if(!empty($ro_14)){?>
                        var AE ="<?php echo $ro_14["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_14["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_14["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_14["FUI"]; ?>";
                        var DS ="<?php echo $ro_14["DSI"]; ?>";
                        var IE ="<?php echo $ro_14["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_14["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_lowertalbragar"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_15 = L.marker(unregulated_14, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[14].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[14].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_15);

                    <?php if(!empty($ro_15)){?>
                        var AE ="<?php echo $ro_15["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_15["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_15["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_15["FUI"]; ?>";
                        var DS ="<?php echo $ro_15["DSI"]; ?>";
                        var IE ="<?php echo $ro_15["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_15["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_macquarie"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_16 = L.marker(unregulated_15, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[15].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[15].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_16);

                    <?php if(!empty($ro_16)){?>
                        var AE ="<?php echo $ro_16["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_16["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_16["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_16["FUI"]; ?>";
                        var DS ="<?php echo $ro_16["DSI"]; ?>";
                        var IE ="<?php echo $ro_16["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_16["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_marra"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>           
            
            
                    var Mak_uw_17 = L.marker(unregulated_16, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[16].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[16].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_17);
 
                    <?php if(!empty($ro_17)){?>
                        var AE ="<?php echo $ro_17["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_17["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_17["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_17["FUI"]; ?>";
                        var DS ="<?php echo $ro_17["DSI"]; ?>";
                        var IE ="<?php echo $ro_17["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_17["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_marthaguy"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_18 = L.marker(unregulated_17, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[17].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[17].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_18);
 
                     <?php if(!empty($ro_18)){?>
                        var AE ="<?php echo $ro_18["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_18["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_18["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_18["FUI"]; ?>";
                        var DS ="<?php echo $ro_18["DSI"]; ?>";
                        var IE ="<?php echo $ro_18["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_18["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_maryvale"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_19 = L.marker(unregulated_18, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[18].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[18].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_19);

                    <?php if(!empty($ro_19)){?>
                        var AE ="<?php echo $ro_19["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_19["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_19["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_19["FUI"]; ?>";
                        var DS ="<?php echo $ro_19["DSI"]; ?>";
                        var IE ="<?php echo $ro_19["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_19["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_molong"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_20 = L.marker(unregulated_19, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[19].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[19].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_20);

                    <?php if(!empty($ro_20)){?>
                        var AE ="<?php echo $ro_20["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_20["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_20["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_20["FUI"]; ?>";
                        var DS ="<?php echo $ro_20["DSI"]; ?>";
                        var IE ="<?php echo $ro_20["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_20["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_piambong"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_21 = L.marker(unregulated_20, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[20].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[20].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_21);

                    <?php if(!empty($ro_21)){?>
                        var AE ="<?php echo $ro_21["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_21["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_21["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_21["FUI"]; ?>";
                        var DS ="<?php echo $ro_21["DSI"]; ?>";
                        var IE ="<?php echo $ro_21["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_21["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_pipeclay"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_22 = L.marker(unregulated_21, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[21].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[21].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_22);

                    <?php if(!empty($ro_22)){?>
                        var AE ="<?php echo $ro_22["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_22["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_22["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_22["FUI"]; ?>";
                        var DS ="<?php echo $ro_22["DSI"]; ?>";
                        var IE ="<?php echo $ro_22["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_22["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_queen"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_23 = L.marker(unregulated_22, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[22].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[22].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_23);
 
                     <?php if(!empty($ro_23)){?>
                        var AE ="<?php echo $ro_23["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_23["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_23["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_23["FUI"]; ?>";
                        var DS ="<?php echo $ro_23["DSI"]; ?>";
                        var IE ="<?php echo $ro_23["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_23["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_summerhill"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_24 = L.marker(unregulated_23, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[23].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[23].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_24);
 
                     <?php if(!empty($ro_24)){?>
                        var AE ="<?php echo $ro_24["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_24["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_24["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_24["FUI"]; ?>";
                        var DS ="<?php echo $ro_24["DSI"]; ?>";
                        var IE ="<?php echo $ro_24["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_24["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_turon"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_25 = L.marker(unregulated_24, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[24].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[24].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_25);

                    <?php if(!empty($ro_25)){?>
                        var AE ="<?php echo $ro_25["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_25["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_25["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_25["FUI"]; ?>";
                        var DS ="<?php echo $ro_25["DSI"]; ?>";
                        var IE ="<?php echo $ro_25["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_25["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_upperbogan"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_26 = L.marker(unregulated_25, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[25].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[25].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_26);

                    <?php if(!empty($ro_26)){?>
                        var AE ="<?php echo $ro_26["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_26["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_26["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_26["FUI"]; ?>";
                        var DS ="<?php echo $ro_26["DSI"]; ?>";
                        var IE ="<?php echo $ro_26["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_26["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_uppercudgegong"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_27 = L.marker(unregulated_26, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[26].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[26].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_27);

                    <?php if(!empty($ro_27)){?>
                        var AE ="<?php echo $ro_27["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_27["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_27["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_27["FUI"]; ?>";
                        var DS ="<?php echo $ro_27["DSI"]; ?>";
                        var IE ="<?php echo $ro_27["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_27["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_uppertallbragar"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_28 = L.marker(unregulated_27, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[27].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[27].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_28);

                    <?php if(!empty($ro_28)){?>
                        var AE ="<?php echo $ro_28["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_28["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_28["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_28["FUI"]; ?>";
                        var DS ="<?php echo $ro_28["DSI"]; ?>";
                        var IE ="<?php echo $ro_28["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_28["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_wambangalong"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_29 = L.marker(unregulated_28, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[28].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[28].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_29);

                    <?php if(!empty($ro_29)){?>
                        var AE ="<?php echo $ro_29["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_29["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_29["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_29["FUI"]; ?>";
                        var DS ="<?php echo $ro_29["DSI"]; ?>";
                        var IE ="<?php echo $ro_29["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_29["wetland_area"]; ?>";
                    <?php }?> 
                    
                    <?php if(!empty($lga_1)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_1); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_1[$x]["proportion_in_winburndale"]; ?>";
                            var Pop ="<?php echo $lga_1[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_1[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_1[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_1[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_1[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>  
                        
                    var Mak_uw_30 = L.marker(unregulated_29, {icon: Icon_unreg, water_source: MacquarieBogan_unregulated.features[29].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[29].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_uw_30);
            
                    displayed_gis_layer_unregulated.push(Mak_uw_1);
                    displayed_gis_layer_unregulated.push(Mak_uw_2);
                    displayed_gis_layer_unregulated.push(Mak_uw_3);
                    displayed_gis_layer_unregulated.push(Mak_uw_4);
                    displayed_gis_layer_unregulated.push(Mak_uw_5);
                    displayed_gis_layer_unregulated.push(Mak_uw_6);
                    displayed_gis_layer_unregulated.push(Mak_uw_7);
                    displayed_gis_layer_unregulated.push(Mak_uw_8);
                    displayed_gis_layer_unregulated.push(Mak_uw_9);
                    displayed_gis_layer_unregulated.push(Mak_uw_10);
                    displayed_gis_layer_unregulated.push(Mak_uw_11);
                    displayed_gis_layer_unregulated.push(Mak_uw_12);
                    displayed_gis_layer_unregulated.push(Mak_uw_13);
                    displayed_gis_layer_unregulated.push(Mak_uw_14);
                    displayed_gis_layer_unregulated.push(Mak_uw_15);
                    displayed_gis_layer_unregulated.push(Mak_uw_16);
                    displayed_gis_layer_unregulated.push(Mak_uw_17);
                    displayed_gis_layer_unregulated.push(Mak_uw_18);
                    displayed_gis_layer_unregulated.push(Mak_uw_19);
                    displayed_gis_layer_unregulated.push(Mak_uw_20);
                    displayed_gis_layer_unregulated.push(Mak_uw_21);
                    displayed_gis_layer_unregulated.push(Mak_uw_22);
                    displayed_gis_layer_unregulated.push(Mak_uw_23);
                    displayed_gis_layer_unregulated.push(Mak_uw_24);
                    displayed_gis_layer_unregulated.push(Mak_uw_25);
                    displayed_gis_layer_unregulated.push(Mak_uw_26);
                    displayed_gis_layer_unregulated.push(Mak_uw_27);
                    displayed_gis_layer_unregulated.push(Mak_uw_28);
                    displayed_gis_layer_unregulated.push(Mak_uw_29);
                    displayed_gis_layer_unregulated.push(Mak_uw_30);
                    
                    controlSearch.on('search:locationfound', 
                    function(e) {
                        e.layer.addTo(map).openPopup();
                    }); 
                    }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_unregulated);
                    map.removeControl(controlSearch);
                    link_to_parr.style.display = 'none';
                    var elementToBeRemoved = document.getElementById('unreg_mac');
                    document.getElementById('legend').removeChild(elementToBeRemoved);
                } 
            }
            
            //display groundwater info for MacquarieBogan
            var displayed_gis_layer_groundwater = [];          
            function show_gis_MacquarieBogan_groundwater(id){
                var checkBox = document.getElementById(id); 
                var geojsonfile = MacquarieBogan_GW;
                var elem = document.createElement("div");
                elem.setAttribute('id', 'gw_mac');
                elem.innerHTML = ('<img src="lib/leaflet/images/gw.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Groundwater<br>');
                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }                    
                    var markersLayer = new L.LayerGroup();
                    map.addLayer(markersLayer);
                    controlSearch = new L.Control.Search({
                        position:'topleft',
                        layer: markersLayer,
                        initial: false,
                        zoom: 11,
                        marker: false,
                        propertyName: 'gwater_source',
                        textPlaceholder: 'Search groundwater source',
                        textErr: 'Groundwater source not found'
                    }); 
                    map.addControl(controlSearch);
                    
                    var Reg = L.geoJSON(geojsonfile, {
                        style: function (feature) {
                            return { color: getRandomColor(), weight: 1.0, fillOpacity: 0.3};
                        }
                    }).addTo(map);
                    displayed_gis_layer_groundwater.push(Reg);  
                    
                    //display marker for groundwater
                    var groundwater_0 = getCentroid(MacquarieBogan_GW.features[0].geometry.coordinates[0]);
                    var groundwater_1 = getCentroid(MacquarieBogan_GW.features[1].geometry.coordinates[0]);
                    var groundwater_2 = getCentroid(MacquarieBogan_GW.features[2].geometry.coordinates[0]);
                    var groundwater_3 = getCentroid(MacquarieBogan_GW.features[3].geometry.coordinates[0]);

                    <?php
                        include 'db.helper/db_connection_ini.php';
                        if($conn!=null){
                            $sq_gw_1 = "SELECT * FROM ground_water WHERE groundwater = 'Bell Alluvial Groundwater Source'";                             
                            $res_gw_1 = $conn->query($sq_gw_1);
                            $ro_gw_1 = $res_gw_1->fetch_assoc(); 

                            $sq_gw_2 = "SELECT * FROM ground_water WHERE groundwater = 'Talbragar Alluvial Groundwater Source'";                             
                            $res_gw_2 = $conn->query($sq_gw_2);
                            $ro_gw_2 = $res_gw_2->fetch_assoc(); 

                            $sq_gw_3 = "SELECT * FROM ground_water WHERE groundwater = 'Cudgegong Alluvial Groundwater Source'";                             
                            $res_gw_3 = $conn->query($sq_gw_3);
                            $ro_gw_3 = $res_gw_3->fetch_assoc(); 

                            $sq_gw_4 = "SELECT * FROM ground_water WHERE groundwater = 'Upper Macquarie Alluvial Groundwater Source'";                             
                            $res_gw_4 = $conn->query($sq_gw_4);
                            $ro_gw_4 = $res_gw_4->fetch_assoc(); 
                        }else{
                            include 'db.helper/db_connection_ini.php';
                        }
                    ?>
                                    
                    <?php if(!empty($ro_gw_1)){?>
                        var lel ="<?php echo $ro_gw_1["longterm_extraction_limit"]; ?>";
                    <?php }?> 

                    groundwater_0[1] = groundwater_0[1] - 0.03 ;
                    var Mak_groundwater_1 = L.marker(groundwater_0, {icon: Icon_gw, gwater_source: MacquarieBogan_GW.features[0].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+MacquarieBogan_GW.features[0].properties.W_Source_1+'</b>'+'</br></br>'+
                    'Longterm Extraction Limit: ' + toThousands(lel) + ' ML/year'); 
                    markersLayer.addLayer(Mak_groundwater_1);
                    
                    <?php if(!empty($ro_gw_2)){?>
                        var lel ="<?php echo $ro_gw_2["longterm_extraction_limit"]; ?>";
                    <?php }?> 
                    
                    groundwater_1[0] = groundwater_1[0] - 0.02 ;
                    var Mak_groundwater_2 = L.marker(groundwater_1, {icon: Icon_gw, gwater_source: MacquarieBogan_GW.features[1].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+MacquarieBogan_GW.features[1].properties.W_Source_1+'</b>'+'</br></br>'+
                    'Longterm Extraction Limit: ' + toThousands(lel) + ' ML/year'); 
                    markersLayer.addLayer(Mak_groundwater_2);
                    
                    <?php if(!empty($ro_gw_3)){?>
                        var lel ="<?php echo $ro_gw_3["longterm_extraction_limit"]; ?>";
                    <?php }?> 
                        
                    groundwater_2[0] = groundwater_2[0] - 0.01 ;
                    var Mak_groundwater_3 = L.marker(groundwater_2, {icon: Icon_gw, gwater_source: MacquarieBogan_GW.features[2].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+MacquarieBogan_GW.features[2].properties.W_Source_1+'</b>'+'</br></br>'+
                    'Longterm Extraction Limit: ' + toThousands(lel) + ' ML/year'); 
                    markersLayer.addLayer(Mak_groundwater_3);

                    <?php if(!empty($ro_gw_4)){?>
                        var lel ="<?php echo $ro_gw_4["longterm_extraction_limit"]; ?>";
                    <?php }?> 
                        
                    var Mak_groundwater_4 = L.marker(groundwater_3, {icon: Icon_gw, gwater_source: MacquarieBogan_GW.features[3].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+MacquarieBogan_GW.features[3].properties.W_Source_1+'</b>'+'</br></br>'+
                    'Longterm Extraction Limit: ' + toThousands(lel) + ' ML/year');  
                    markersLayer.addLayer(Mak_groundwater_4);
            
                    displayed_gis_layer_groundwater.push(Mak_groundwater_1); 
                    displayed_gis_layer_groundwater.push(Mak_groundwater_2);
                    displayed_gis_layer_groundwater.push(Mak_groundwater_3);
                    displayed_gis_layer_groundwater.push(Mak_groundwater_4);
                    
                    controlSearch.on('search:locationfound', 
                    function(e) {
                        e.layer.addTo(map).openPopup();
                    });                                  
                    
                }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_groundwater);
                    map.removeControl(controlSearch);
                    var elementToBeRemoved = document.getElementById('gw_mac');
                    document.getElementById('legend').removeChild(elementToBeRemoved);

                } 
            } 
            
            var displayed_gis_layer_workapproval = [];
            work_mac = [];
            <?php if(!empty($workapproval)){?>;
                <?php for ($x=0; $x<count($workapproval); $x++) {?>
                    var Lat_workapproval ="<?php echo $workapproval[$x]["Latitude"]; ?>";
                    var Lon_workapproval ="<?php echo $workapproval[$x]["Longitude"]; ?>";
                    var Purpose = "<?php echo $workapproval[$x]["purpose_des"]; ?>";
                    var Share_component = "<?php echo $workapproval[$x]["ShareComponent"]; ?>";
                    var water_type = "<?php echo $workapproval[$x]["WaterType"]; ?>";
                    var cat = "<?php echo $workapproval[$x]["Category"]; ?>";
                    var Basin_name = "<?php echo $workapproval[$x]["Basin_name"]; ?>";
                    var WS = "<?php echo $workapproval[$x]["WS"]; ?>";
                    work_mac.push([Lat_workapproval, Lon_workapproval, Purpose, Share_component, water_type, cat, Basin_name, WS]);
                <?php }?>;    
            <?php }?>;
            
            function show_gis_MacquarieBogan_workapprovals(id){
                var checkBox = document.getElementById(id);
                if (checkBox.checked === true){  
                    var markerClusters = new L.MarkerClusterGroup({disableClusteringAtZoom: 13});
                    for (i=0; i<work_mac.length; i++){
                        var Lat_workapproval = work_mac[i][0];
                        var Lon_workapproval = work_mac[i][1];
                        var Purpose = work_mac[i][2];
                        var Share_component = work_mac[i][3];
                        var WT = work_mac[i][4];
                        var cat = work_mac[i][5];
                        var Basin_name = work_mac[i][6];
                        var Water_Source = work_mac[i][7];
                        if (Basin_name === 'Macquarie'){
                                switch(WT){
                                    case 'REG': 
                                    var M = L.marker([Lat_workapproval, Lon_workapproval], {icon: Icon_license_1})
                                    .bindPopup("Purpose: " + Purpose + '<br/>'
                                    + "Share Component: " + toThousands(Share_component) +" ML"+ '<br/>'
                                    + "Category: " + cat + '<br/>'
                                    + "Water Source: " + Water_Source); 
                                    mouse_over_workapproval(M);
                                    markerClusters.addLayer(M);
                                    break;
                                    case 'UNREG':
                                    var M = L.marker([Lat_workapproval, Lon_workapproval], {icon: Icon_license_2})
                                    .bindPopup("Purpose: " + Purpose + '<br/>'
                                    + "Share Component: " + toThousands(Share_component) +" ML"+ '<br/>'
                                    + "Category: " + cat + '<br/>'
                                    + "Water Source: " + Water_Source); 
                                    mouse_over_workapproval(M);
                                    markerClusters.addLayer(M);                                    
                                    break;
                                    case 'GW':
                                    var M = L.marker([Lat_workapproval, Lon_workapproval], {icon: Icon_license_3})
                                    .bindPopup("Purpose: " + Purpose + '<br/>'
                                    + "Share Component: " + toThousands(Share_component) +" ML"+ '<br/>'
                                    + "Category: " + cat + '<br/>'
                                    + "Water Source: " + Water_Source); 
                                    mouse_over_workapproval(M);
                                    markerClusters.addLayer(M);
                                    break;
                               } 
                        displayed_gis_layer_workapproval.push(M);
                        }
                    }
                    map.addLayer(markerClusters);
                    displayed_gis_layer_workapproval.push(markerClusters);
                    
                }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_workapproval);
                }  
            }           
            
            var displayed_gis_layer_approval = [];
            work_approval_array = [];
            <?php if(!empty($work_approval)){?>;
                <?php for ($x=0; $x<count($work_approval); $x++) {?>
                    var Lat_approval ="<?php echo $work_approval[$x]["latitude"]; ?>";
                    var Lon_approval ="<?php echo $work_approval[$x]["longitude"]; ?>";
                    var Work_description = "<?php echo $work_approval[$x]["work_description"]; ?>";
                    var So = "<?php echo $work_approval[$x]["so"]; ?>";
                    var Approval_id = "<?php echo $work_approval[$x]["approval"]; ?>";
                    var Basin_name = "<?php echo $work_approval[$x]["basin_name"]; ?>";
                    var Water_type = "<?php echo $work_approval[$x]["water_type"]; ?>";
                    work_approval_array.push([Lat_approval, Lon_approval, Work_description, So, Approval_id, Basin_name, Water_type]);
                <?php }?>;    
            <?php }?>; 
                
            function show_gis_MacquarieBogan_approvals(id){
                var checkBox = document.getElementById(id);
                if (checkBox.checked === true){  
                    var markerClusters = new L.MarkerClusterGroup({disableClusteringAtZoom: 13});
                    for (i=0; i<work_approval_array.length; i++){
                        var Lat_approval = work_approval_array[i][0];
                        var Lon_approval = work_approval_array[i][1];
                        var Work_description = work_approval_array[i][2];
                        var So = work_approval_array[i][3];
                        var Approval_id = work_approval_array[i][4];
                        var Basin_name = work_approval_array[i][5];
                        var Water_type = work_approval_array[i][6];  
                        if (Basin_name === 'macquarie'){
                            switch(Water_type){
                                case 'REG': 
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_1})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                mouse_over_workapproval(M);
                                markerClusters.addLayer(M);
                                break;
                                case 'UNREG':
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_2})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                mouse_over_workapproval(M);
                                markerClusters.addLayer(M);                       
                                break;
                                case 'GW':
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_3})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                mouse_over_workapproval(M);
                                markerClusters.addLayer(M);                       
                                break;
                            }
                            displayed_gis_layer_approval.push(M);
                        }
                        map.addLayer(markerClusters);
                        displayed_gis_layer_approval.push(markerClusters);
                    }
                }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_approval);
                } 
            }
                       
            function show_gis_Manning_regulated(id){
                var checkBox = document.getElementById(id); 
                if (checkBox.checked === true){
                    document.getElementById('error').pause();
                    document.getElementById('error').play();
                    alert("Sorry! Currently, there is no regulated river in Manning catchment!");  
                    document.getElementById('Regulated-CAT-Manning').checked=false;
                }
            }        
            
            var displayed_gis_layer_unregulated = [];
            function show_gis_Manning_unregulated(id){
                var elem = document.createElement("div");
                elem.setAttribute('id', 'unreg_man');
                elem.innerHTML = ('<img src="lib/leaflet/images/unreg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Unregulated river<br>');

                var checkBox = document.getElementById(id); 
                var geojsonfile = Manning_unregulated;
                var geojsonfile_1 = Manning_Unregulatedriver;
                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }                    
                    var markersLayer = new L.LayerGroup();
                    map.addLayer(markersLayer);
                    controlSearch = new L.Control.Search({
                        position:'topleft',
                        layer: markersLayer,
                        initial: false,
                        zoom: 12,
                        marker: false,
                        propertyName: 'water_source',
                        textPlaceholder: 'Search water source',
                        textErr: 'Water source not found'
                    }); 
                    map.addControl(controlSearch);
                    
                    var Reg = L.geoJSON(geojsonfile, {
                        style: function (feature) {
                            return { color: 'grey', weight: 0.0, fillOpacity: 0.3};
                        }
                    }).addTo(map);
                    
                    var Reg_1 = L.geoJSON(geojsonfile_1, {
                        style: function (feature) {
                            return { color: 'blue', weight: 1.5, fillOpacity: 0.3};
                        }
                    }).addTo(map);
                    
                    displayed_gis_layer_unregulated.push(Reg);   
                    displayed_gis_layer_unregulated.push(Reg_1);  
                    
                    var man_unre_0 = getCentroid(Manning_unregulated.features[0].geometry.coordinates[0]);
                    var man_unre_1 = getCentroid(Manning_unregulated.features[1].geometry.coordinates[0]);
                    var man_unre_2 = getCentroid(Manning_unregulated.features[2].geometry.coordinates[0]);
                    var man_unre_3 = getCentroid(Manning_unregulated.features[3].geometry.coordinates[0]);
                    var man_unre_4 = getCentroid(Manning_unregulated.features[4].geometry.coordinates[0]);
                    var man_unre_5 = getCentroid(Manning_unregulated.features[5].geometry.coordinates[0]);
                    var man_unre_6 = getCentroid(Manning_unregulated.features[6].geometry.coordinates[0]);
                    var man_unre_7 = getCentroid(Manning_unregulated.features[7].geometry.coordinates[0]);
                    var man_unre_8 = getCentroid(Manning_unregulated.features[8].geometry.coordinates[0]);
                    var man_unre_9 = getCentroid(Manning_unregulated.features[9].geometry.coordinates[0]);
                    var man_unre_10 = getCentroid(Manning_unregulated.features[10].geometry.coordinates[0]);
                    var man_unre_11 = getCentroid(Manning_unregulated.features[11].geometry.coordinates[0]);
                    var man_unre_12 = getCentroid(Manning_unregulated.features[12].geometry.coordinates[0]);
                    var man_unre_13 = getCentroid(Manning_unregulated.features[13].geometry.coordinates[0]);
                    var man_unre_14 = getCentroid(Manning_unregulated.features[14].geometry.coordinates[0]);
                    var man_unre_15 = getCentroid(Manning_unregulated.features[15].geometry.coordinates[0]);
                    
                    <?php
                        include 'db.helper/db_connection_ini.php';
                        if($conn!=null){
                            $sq_1 = "SELECT * FROM water_source WHERE water_source = 'Avon River Water Source'";                             
                            $res_1 = $conn->query($sq_1);
                            $ro_1 = $res_1->fetch_assoc();
                            
                            $sq_2 = "SELECT * FROM water_source WHERE water_source = 'Bowman River Water Source'";                             
                            $res_2 = $conn->query($sq_2);
                            $ro_2 = $res_2->fetch_assoc();

                            $sq_3 = "SELECT * FROM water_source WHERE water_source = 'Cooplacurripa River Water Source'";                             
                            $res_3 = $conn->query($sq_3);
                            $ro_3 = $res_3->fetch_assoc();

                            $sq_4 = "SELECT * FROM water_source WHERE water_source = 'Dingo Creek Water Source'";                             
                            $res_4 = $conn->query($sq_4);
                            $ro_4 = $res_4->fetch_assoc();

                            $sq_5 = "SELECT * FROM water_source WHERE water_source = 'Lower Barnard River Water Source'";                             
                            $res_5 = $conn->query($sq_5);
                            $ro_5 = $res_5->fetch_assoc();

                            $sq_6 = "SELECT * FROM water_source WHERE water_source = 'Lower Barrington / Gloucester Rivers Water Source'";                             
                            $res_6 = $conn->query($sq_6);
                            $ro_6 = $res_6->fetch_assoc();
                            
                            $sq_7 = "SELECT * FROM water_source WHERE water_source = 'Lower Manning River Water Source'";                             
                            $res_7 = $conn->query($sq_7);
                            $ro_7 = $res_7->fetch_assoc();

                            $sq_8 = "SELECT * FROM water_source WHERE water_source = 'Manning Estuary Tributaries Water Source'";                             
                            $res_8 = $conn->query($sq_8);
                            $ro_8 = $res_8->fetch_assoc();
 
                            $sq_9 = "SELECT * FROM water_source WHERE water_source = 'Mid Manning River Water Source'";                             
                            $res_9 = $conn->query($sq_9);
                            $ro_9 = $res_9->fetch_assoc();
                            
                            $sq_10 = "SELECT * FROM water_source WHERE water_source = 'Myall Creek Water Source'";                             
                            $res_10 = $conn->query($sq_10);
                            $ro_10 = $res_10->fetch_assoc();
                            
                            $sq_11 = "SELECT * FROM water_source WHERE water_source = 'Nowendoc River Water Source'";                             
                            $res_11 = $conn->query($sq_11);
                            $ro_11 = $res_11->fetch_assoc();

                            $sq_12 = "SELECT * FROM water_source WHERE water_source = 'Rowleys River Water Source'";                             
                            $res_12 = $conn->query($sq_12);
                            $ro_12 = $res_12->fetch_assoc();

                            $sq_13 = "SELECT * FROM water_source WHERE water_source = 'Upper Barnard River Water Source'";                             
                            $res_13 = $conn->query($sq_13);
                            $ro_13 = $res_13->fetch_assoc();

                            $sq_14 = "SELECT * FROM water_source WHERE water_source = 'Upper Barrington River Water Source'";                             
                            $res_14 = $conn->query($sq_14);
                            $ro_14 = $res_14->fetch_assoc();

                            $sq_15 = "SELECT * FROM water_source WHERE water_source = 'Upper Gloucester River Water Source'";                             
                            $res_15 = $conn->query($sq_15);
                            $ro_15 = $res_15->fetch_assoc();

                            $sq_16 = "SELECT * FROM water_source WHERE water_source = 'Upper Manning River Water Source'";                             
                            $res_16 = $conn->query($sq_16);
                            $ro_16 = $res_16->fetch_assoc();   
                            
                            $sq_17 = "SELECT * FROM LGA_Data WHERE catchment = 'manning'";  
                            $res_17 = $conn->query($sq_17);
                            $lga_2 = array();
                            $o = -1;
                            while ($ro_17 = $res_17->fetch_assoc()){
                                $o++;
                                $lga_2[$o] = $ro_17;
                            } 
                        
                        }else{
                            include 'db.helper/db_connection_ini.php';
                        }
                    ?>
                   
                    <?php if(!empty($ro_1)){?>
                        var AE ="<?php echo $ro_1["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_1["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_1["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_1["FUI"]; ?>";
                        var DS ="<?php echo $ro_1["DSI"]; ?>";
                        var IE ="<?php echo $ro_1["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_1["wetland_area"]; ?>";
                        //IE = IE.toFixed(2);
                    <?php }?>  
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_avon"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                    //var water_source = Manning_unregulated.features[0].properties.WATER_SOUR;
                    var Mak_1 = L.marker(man_unre_0, {icon: Icon_unreg, water_source: Manning_unregulated.features[0].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[0].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_1);

                    <?php if(!empty($ro_2)){?>
                        var AE ="<?php echo $ro_2["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_2["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_2["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_2["FUI"]; ?>";
                        var DS ="<?php echo $ro_2["DSI"]; ?>";
                        var IE ="<?php echo $ro_2["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_2["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_bowman"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_2 = L.marker(man_unre_1, {icon: Icon_unreg, water_source: Manning_unregulated.features[1].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[1].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_2);

                    <?php if(!empty($ro_3)){?>
                        var AE ="<?php echo $ro_3["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_3["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_3["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_3["FUI"]; ?>";
                        var DS ="<?php echo $ro_3["DSI"]; ?>";
                        var IE ="<?php echo $ro_3["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_3["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_cooplacurripa"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_3 = L.marker(man_unre_2, {icon: Icon_unreg, water_source: Manning_unregulated.features[2].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[2].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_3);
  
                    <?php if(!empty($ro_4)){?>
                        var AE ="<?php echo $ro_4["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_4["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_4["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_4["FUI"]; ?>";
                        var DS ="<?php echo $ro_4["DSI"]; ?>";
                        var IE ="<?php echo $ro_4["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_4["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_dingo"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_4 = L.marker(man_unre_3, {icon: Icon_unreg, water_source: Manning_unregulated.features[3].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[3].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_4);
            
                    <?php if(!empty($ro_5)){?>
                        var AE ="<?php echo $ro_5["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_5["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_5["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_5["FUI"]; ?>";
                        var DS ="<?php echo $ro_5["DSI"]; ?>";
                        var IE ="<?php echo $ro_5["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_5["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_lowerbarnard"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_5 = L.marker(man_unre_4, {icon: Icon_unreg, water_source: Manning_unregulated.features[4].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[4].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_5);
  
                    <?php if(!empty($ro_6)){?>
                        var AE ="<?php echo $ro_6["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_6["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_6["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_6["FUI"]; ?>";
                        var DS ="<?php echo $ro_6["DSI"]; ?>";
                        var IE ="<?php echo $ro_6["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_6["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_lowerbarrington"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    man_unre_5[1] = man_unre_5[1] + 0.05;
                    var Mak_6 = L.marker(man_unre_5, {icon: Icon_unreg, water_source: Manning_unregulated.features[5].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[5].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_6);
   
                    <?php if(!empty($ro_7)){?>
                        var AE ="<?php echo $ro_7["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_7["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_7["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_7["FUI"]; ?>";
                        var DS ="<?php echo $ro_7["DSI"]; ?>";
                        var IE ="<?php echo $ro_7["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_7["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_lowermanning"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_7 = L.marker(man_unre_6, {icon: Icon_unreg, water_source: Manning_unregulated.features[6].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[6].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_7);
   
                    <?php if(!empty($ro_8)){?>
                        var AE ="<?php echo $ro_8["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_8["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_8["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_8["FUI"]; ?>";
                        var DS ="<?php echo $ro_8["DSI"]; ?>";
                        var IE ="<?php echo $ro_8["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_8["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_manning"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_8 = L.marker(man_unre_7, {icon: Icon_unreg, water_source: Manning_unregulated.features[7].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[7].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_8);
  
                    <?php if(!empty($ro_9)){?>
                        var AE ="<?php echo $ro_9["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_9["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_9["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_9["FUI"]; ?>";
                        var DS ="<?php echo $ro_9["DSI"]; ?>";
                        var IE ="<?php echo $ro_9["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_9["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_midmanning"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_9 = L.marker(man_unre_8, {icon: Icon_unreg, water_source: Manning_unregulated.features[8].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[8].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_9);
   
                    <?php if(!empty($ro_10)){?>
                        var AE ="<?php echo $ro_10["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_10["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_10["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_10["FUI"]; ?>";
                        var DS ="<?php echo $ro_10["DSI"]; ?>";
                        var IE ="<?php echo $ro_10["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_10["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_myall"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_10 = L.marker(man_unre_9, {icon: Icon_unreg, water_source: Manning_unregulated.features[9].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[9].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_10);
  
                    <?php if(!empty($ro_11)){?>
                        var AE ="<?php echo $ro_11["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_11["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_11["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_11["FUI"]; ?>";
                        var DS ="<?php echo $ro_11["DSI"]; ?>";
                        var IE ="<?php echo $ro_11["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_11["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_nowendoc"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    man_unre_10[0] = man_unre_10[0] - 0.05;
                    var Mak_11 = L.marker(man_unre_10, {icon: Icon_unreg, water_source: Manning_unregulated.features[10].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[10].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_11);
   
                    <?php if(!empty($ro_12)){?>
                        var AE ="<?php echo $ro_12["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_12["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_12["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_12["FUI"]; ?>";
                        var DS ="<?php echo $ro_12["DSI"]; ?>";
                        var IE ="<?php echo $ro_12["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_12["wetland_area"]; ?>";
                    <?php }?>
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_rowleys"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_12 = L.marker(man_unre_11, {icon: Icon_unreg, water_source: Manning_unregulated.features[11].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[11].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_12);
  
                    <?php if(!empty($ro_13)){?>
                        var AE ="<?php echo $ro_13["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_13["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_13["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_13["FUI"]; ?>";
                        var DS ="<?php echo $ro_13["DSI"]; ?>";
                        var IE ="<?php echo $ro_13["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_13["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_upperbarnard"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_13 = L.marker(man_unre_12, {icon: Icon_unreg, water_source: Manning_unregulated.features[12].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[12].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_13);
  
                    <?php if(!empty($ro_14)){?>
                        var AE ="<?php echo $ro_14["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_14["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_14["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_14["FUI"]; ?>";
                        var DS ="<?php echo $ro_14["DSI"]; ?>";
                        var IE ="<?php echo $ro_14["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_14["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_upperbarrington"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_14 = L.marker(man_unre_13, {icon: Icon_unreg, water_source: Manning_unregulated.features[13].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[13].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_14);
                    
                    <?php if(!empty($ro_15)){?>
                        var AE ="<?php echo $ro_15["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_15["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_15["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_15["FUI"]; ?>";
                        var DS ="<?php echo $ro_15["DSI"]; ?>";
                        var IE ="<?php echo $ro_15["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_15["wetland_area"]; ?>";
                    <?php }?> 
                    
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_uppergloucester"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_15 = L.marker(man_unre_14, {icon: Icon_unreg, water_source: Manning_unregulated.features[14].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[14].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_15);
 
                    <?php if(!empty($ro_16)){?>
                        var AE ="<?php echo $ro_16["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_16["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_16["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_16["FUI"]; ?>";
                        var DS ="<?php echo $ro_16["DSI"]; ?>";
                        var IE ="<?php echo $ro_16["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_16["wetland_area"]; ?>";
                    <?php }?> 
                        
                    <?php if(!empty($lga_2)){?>
                        var Population = 0;
                        var Irrigation_production = 0;
                        var Mining_production = 0;
                        var Irrigation_employment = 0;
                        var Mining_employment = 0;
                        <?php for ($x=0; $x<count($lga_2); $x++) {?>
                            var WaSource_prop ="<?php echo $lga_2[$x]["proportion_in_uppermanning"]; ?>";
                            var Pop ="<?php echo $lga_2[$x]["population"]; ?>";
                            var Irrigation_pro ="<?php echo $lga_2[$x]["irrigation_production"]; ?>";
                            Irrigation_pro = parseInt(Irrigation_pro.replace(/,/g, ''));
                            var Mining_pro ="<?php echo $lga_2[$x]["mining_production"]; ?>";
                            var Irrigation_emp ="<?php echo $lga_2[$x]["employment_irrigation"]; ?>";
                            var Mining_emp ="<?php echo $lga_2[$x]["employment_mining"]; ?>";
                            Population = Population + WaSource_prop*Pop;
                            Irrigation_production = Irrigation_production + WaSource_prop*Irrigation_pro;
                            Mining_production = Mining_production + WaSource_prop*Mining_pro;
                            Irrigation_employment = Irrigation_employment + WaSource_prop*Irrigation_emp;
                            Mining_employment = Mining_employment + WaSource_prop*Mining_emp;
                        <?php }?> 
                    <?php }?>
                        
                    var Mak_16 = L.marker(man_unre_15, {icon: Icon_unreg, water_source: Manning_unregulated.features[15].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[15].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(FU) + '<br/>'
                    + 'DSI: ' + toThousands(DS) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha'+ '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha'+ '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : ' + toThousands((Math.round(Irrigation_production)/1000000).toFixed(2)) + ' $M' + '<br/>'
                    + 'Annual Production Value (Mining) : ' + toThousands(Mining_production.toFixed(2))+ ' $M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment)));
                    markersLayer.addLayer(Mak_16);
            
                    displayed_gis_layer_unregulated.push(Mak_1);
                    displayed_gis_layer_unregulated.push(Mak_2);
                    displayed_gis_layer_unregulated.push(Mak_3);
                    displayed_gis_layer_unregulated.push(Mak_4);
                    displayed_gis_layer_unregulated.push(Mak_5);
                    displayed_gis_layer_unregulated.push(Mak_6);
                    displayed_gis_layer_unregulated.push(Mak_7);
                    displayed_gis_layer_unregulated.push(Mak_8);
                    displayed_gis_layer_unregulated.push(Mak_9);
                    displayed_gis_layer_unregulated.push(Mak_10);
                    displayed_gis_layer_unregulated.push(Mak_11);
                    displayed_gis_layer_unregulated.push(Mak_12);
                    displayed_gis_layer_unregulated.push(Mak_13);
                    displayed_gis_layer_unregulated.push(Mak_14);
                    displayed_gis_layer_unregulated.push(Mak_15);
                    displayed_gis_layer_unregulated.push(Mak_16);
                    
                    controlSearch.on('search:locationfound', 
                    function(e) {
                        e.layer.addTo(map).openPopup();
                    });                   
                }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_unregulated);
                    map.removeControl(controlSearch);
                    var elementToBeRemoved = document.getElementById('unreg_man');
                    document.getElementById('legend').removeChild(elementToBeRemoved);

                }                       
            }
            
            var displayed_gis_layer_groundwater = [];   
            function show_gis_Manning_groundwater(id){
                var checkBox = document.getElementById(id); 
                var elem = document.createElement("div");
                elem.setAttribute('id', 'gw_man');
                elem.innerHTML = ('<img src="lib/leaflet/images/gw.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Groundwater<br>');

                var geojsonfile = Manning_Groundwater;
                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }                    
                    var markersLayer = new L.LayerGroup();
                    map.addLayer(markersLayer);
                    controlSearch = new L.Control.Search({
                        position:'topleft',
                        layer: markersLayer,
                        initial: false,
                        zoom: 11,
                        marker: false,
                        propertyName: 'gwater_source',
                        textPlaceholder: 'Search groundwater source',
                        textErr: 'Groundwater source not found'
                    }); 
                    map.addControl(controlSearch);
                    
                    var Reg = L.geoJSON(geojsonfile, {
                        style: function (feature) {
                            return { color: getRandomColor(), weight: 1.5, fillOpacity: 0.3};
                        }
                    }).addTo(map);
                    displayed_gis_layer_groundwater.push(Reg); 
                    
                    var man_gw_0 = getCentroid(Manning_Groundwater.features[0].geometry.coordinates[9][0]);
                    var man_gw_1 = getCentroid(Manning_Groundwater.features[1].geometry.coordinates[0][0]);
                    var man_gw_2 = getCentroid(Manning_Groundwater.features[2].geometry.coordinates[0][0]);
                    var man_gw_3 = getCentroid(Manning_Groundwater.features[3].geometry.coordinates[0][0]);
                    var man_gw_4 = getCentroid(Manning_Groundwater.features[4].geometry.coordinates[0][0]);
                    var man_gw_5 = getCentroid(Manning_Groundwater.features[5].geometry.coordinates[0][0]);
                    var man_gw_6 = getCentroid(Manning_Groundwater.features[6].geometry.coordinates[4][0]);
                    var man_gw_7 = getCentroid(Manning_Groundwater.features[7].geometry.coordinates[1][0]);
                    var man_gw_8 = getCentroid(Manning_Groundwater.features[8].geometry.coordinates[1][0]);
                    var man_gw_9 = getCentroid(Manning_Groundwater.features[9].geometry.coordinates[0][0]);
                    var man_gw_10 = getCentroid(Manning_Groundwater.features[10].geometry.coordinates[0][0]);
                    var man_gw_11 = getCentroid(Manning_Groundwater.features[11].geometry.coordinates[1][0]);
                    var man_gw_12 = getCentroid(Manning_Groundwater.features[12].geometry.coordinates[1][0]);
                    var man_gw_13 = getCentroid(Manning_Groundwater.features[13].geometry.coordinates[8][0]);
                    var man_gw_14 = getCentroid(Manning_Groundwater.features[14].geometry.coordinates[0][0]);
                    
                    var Mak_1 = L.marker(man_gw_0, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[0].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[0].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_1);
                    
                    var Mak_2 = L.marker(man_gw_1, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[1].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[1].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_2);
                    man_gw_2[1] = man_gw_2[1]-0.001;
                    
                    var Mak_3 = L.marker(man_gw_2, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[2].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[2].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_3);
                    
                    man_gw_3[1] = man_gw_3[1]-0.007;
                    var Mak_4 = L.marker(man_gw_3, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[3].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[3].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_4);
                    
                    man_gw_4[1] =  man_gw_4[1]+0.001;
                    var Mak_5 = L.marker(man_gw_4, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[4].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[4].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_5);
                    
                    man_gw_5[1]=man_gw_5[1]+0.04;
                    man_gw_5[0]=man_gw_5[0]-0.005;
                    var Mak_6 = L.marker(man_gw_5, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[5].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[5].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_6);
                    
                    man_gw_6[1]=man_gw_6[1]+0.005;
                    var Mak_7 = L.marker(man_gw_6, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[6].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[6].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_7);
                    
                    man_gw_7[1] = man_gw_7[1] - 0.01 ;
                    var Mak_8 = L.marker(man_gw_7, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[7].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[7].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_8);
                    
                    var Mak_9 = L.marker(man_gw_8, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[8].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[8].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_9);
                    
                    var Mak_10 = L.marker(man_gw_9, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[9].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[9].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_10);
                    
                    var Mak_11 = L.marker(man_gw_10, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[10].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[10].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_11);
                    
                    var Mak_12 = L.marker(man_gw_11, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[11].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[11].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_12);
                    
                    man_gw_12[0] = man_gw_12[0] + 0.006;
                    var Mak_13 = L.marker(man_gw_12, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[12].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[12].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_13);
                    
                    man_gw_13[1]=man_gw_13[1]+0.015;
                    var Mak_14 = L.marker(man_gw_13, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[13].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[13].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_14);
                    
                    man_gw_14[0] = man_gw_14[0]-0.02;
                    var Mak_15 = L.marker(man_gw_14, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[14].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[14].properties.W_Source_1+'</b>');
                    markersLayer.addLayer(Mak_15);
                    
                    displayed_gis_layer_groundwater.push(Mak_1); 
                    displayed_gis_layer_groundwater.push(Mak_2);
                    displayed_gis_layer_groundwater.push(Mak_3);
                    displayed_gis_layer_groundwater.push(Mak_4);
                    displayed_gis_layer_groundwater.push(Mak_5);
                    displayed_gis_layer_groundwater.push(Mak_6);
                    displayed_gis_layer_groundwater.push(Mak_7);
                    displayed_gis_layer_groundwater.push(Mak_8);
                    displayed_gis_layer_groundwater.push(Mak_9);
                    displayed_gis_layer_groundwater.push(Mak_10);
                    displayed_gis_layer_groundwater.push(Mak_11);
                    displayed_gis_layer_groundwater.push(Mak_12);
                    displayed_gis_layer_groundwater.push(Mak_13);
                    displayed_gis_layer_groundwater.push(Mak_14);
                    displayed_gis_layer_groundwater.push(Mak_15);
                    
                    controlSearch.on('search:locationfound', 
                    function(e) {
                        e.layer.addTo(map).openPopup();
                    });
                }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_groundwater);
                    map.removeControl(controlSearch);
                    var elementToBeRemoved = document.getElementById('gw_man');
                    document.getElementById('legend').removeChild(elementToBeRemoved);
                }              
            }
            
            var displayed_gis_layer_workapproval = [];                                        
            function show_gis_Manning_workapprovals(id){
                var checkBox = document.getElementById(id);
                if (checkBox.checked === true){  
                    var markerClusters = new L.MarkerClusterGroup({disableClusteringAtZoom: 13});
                    for (i=0; i<work_mac.length; i++){
                        var Lat_workapproval = work_mac[i][0];
                        var Lon_workapproval = work_mac[i][1];
                        var Purpose = work_mac[i][2];
                        var Share_component = work_mac[i][3];
                        var WT = work_mac[i][4];
                        var cat = work_mac[i][5];
                        var Basin_name = work_mac[i][6];
                        var Water_Source = work_mac[i][7];
                        if (Basin_name === 'Manning'){
                                switch(WT){
                                    case 'REG': 
                                    var M = L.marker([Lat_workapproval, Lon_workapproval], {icon: Icon_license_1})
                                    .bindPopup("Purpose: " + Purpose + '<br/>'
                                    + "Share Component: " + toThousands(Share_component) +" ML"+ '<br/>'
                                    + "Category: " + cat + '<br/>'
                                    + "Water Source: " + Water_Source); 
                                    mouse_over_workapproval(M);
                                    markerClusters.addLayer(M);
                                    break;
                                    case 'UNREG':
                                    var M = L.marker([Lat_workapproval, Lon_workapproval], {icon: Icon_license_2})
                                    .bindPopup("Purpose: " + Purpose + '<br/>'
                                    + "Share Component: " + toThousands(Share_component) +" ML"+ '<br/>'
                                    + "Category: " + cat + '<br/>'
                                    + "Water Source: " + Water_Source); 
                                    mouse_over_workapproval(M);
                                    markerClusters.addLayer(M);                                    
                                    break;
                                    case 'GW':
                                    var M = L.marker([Lat_workapproval, Lon_workapproval], {icon: Icon_license_3})
                                    .bindPopup("Purpose: " + Purpose + '<br/>'
                                    + "Share Component: " + toThousands(Share_component) +" ML"+ '<br/>'
                                    + "Category: " + cat + '<br/>'
                                    + "Water Source: " + Water_Source); 
                                    mouse_over_workapproval(M);
                                    markerClusters.addLayer(M);
                                    break;
                               } 
                        displayed_gis_layer_workapproval.push(M);
                        }
                    }
                    map.addLayer(markerClusters);
                    displayed_gis_layer_workapproval.push(markerClusters);
                    
                }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_workapproval);
                }  
            }
            
            var displayed_gis_layer_approval = [];
            function show_gis_Manning_approvals(id){
                var checkBox = document.getElementById(id);
                if (checkBox.checked === true){
                    var markerClusters = new L.MarkerClusterGroup({disableClusteringAtZoom: 13});
                    for (i=0; i<work_approval_array.length; i++){
                        var Lat_approval = work_approval_array[i][0];
                        var Lon_approval = work_approval_array[i][1];
                        var Work_description = work_approval_array[i][2];
                        var So = work_approval_array[i][3];
                        var Approval_id = work_approval_array[i][4];
                        var Basin_name = work_approval_array[i][5];
                        var Water_type = work_approval_array[i][6];  
                        if (Basin_name === 'manning'){
                            switch(Water_type){
                                case 'REG':                                
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_1})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                mouse_over_workapproval(M);
                                markerClusters.addLayer(M);                                
                                break;
                                case 'UNREG':
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_2})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                mouse_over_workapproval(M);
                                markerClusters.addLayer(M); 
                                break;
                                case 'GW':
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_3})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                mouse_over_workapproval(M);
                                markerClusters.addLayer(M); 
                                break;
                            }
                            displayed_gis_layer_approval.push(M);
                        }
                    map.addLayer(markerClusters);
                    displayed_gis_layer_approval.push(markerClusters);
                    }
                }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_approval);
                } 
            }
            // display information of each catchment
            function onEachFeature(feature, layer) {
                layer.on({
                    mouseover: highlightFeature,
                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }
            
            function highlightFeature(e) {
                var layer = e.target;
                layer.setStyle({
                    weight: 5,
                    color: '#666',
                    //color: getRandomColor(),
                    dashArray: '',
                    fillOpacity: 0.15
                });
                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
                hover_info.update(layer.feature.properties);
            }
            
            function resetHighlight(e) {
                CAT.resetStyle(e.target || e);
                hover_info.update();
            }
            
            function zoomToFeature(e) {
                map.fitBounds(e.target.getBounds());
            }
            
            var hover_info = L.control();
            hover_info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'hover_info');
                this.update();
                return this._div;
            };
            
            function area_sum(Crop){
                var area = 0;
                for (i=0; i<Crop.features.length; i++){
                    area = area + Crop.features[i].properties.HECTARES;
                }
                return area;
            }
            
            function asset_no(Crop){
                var num = Crop.features.length;
                return num;
            }
                     
            hover_info.update = function (props) {
                <?php if(!empty($row)){?>;
                    var catch_name = "<?php echo $_GET['catchment_name']; ?>";  
                    var overall_fui = "<?php echo $row["overall_fui"]; ?>";
                    var overall_idsi = "<?php echo $row["overall_idsi"]; ?>";
                    var overall_fmi = "<?php echo $row["overall_fmi"]; ?>";
                    var overall_dei = "<?php echo $row["overall_dei"]; ?>";
                    var catchment_size = "<?php echo $row["catchment_size"]; ?>";
                    var surface_water_size = "<?php echo $row["surface_water_size"]; ?>";
                    var groundwater_size = "<?php echo $row["groundwater_size"]; ?>";
                    if (catch_name === 'MacquarieBogan'){
                        var Total_area = area_sum(Macquarie_Wetland);
                        var Total_no = asset_no(Macquarie_Wetland);
                    }else if(catch_name === 'ManningRiver'){
                        var Total_area = area_sum(Manning_Wetland);
                        var Total_no = asset_no(Manning_Wetland);
                        
                    }
                    this._div.innerHTML = (
//                        '<h5>' + 'Critical Environmental Assets within ' + catch_name + ' Catchment' + '</h5>' + 
//                        'Total Number of Asset: ' + Total_no + '<br/>' +
//                        'Total Area of Asset: ' + toThousands(Math.round(Total_area*100)/100) + ' Ha'
                        
                        '<b>' + 'Critical Environmental Assets within ' + catch_name + ' Catchment' + '</b><br/><br/>' + 
                        '<p style=\"line-height:50%\"><img src=\"images/environmental_number.png\" height=\"25\" width=\"25\"> Total Number of Asset: <b>' + Total_no + '</b><br/><br />'+
                        '<img src=\"images/environmental_area.png\" height=\"25\" width=\"25\"> Total Area of Asset: <b>' + toThousands(Math.round(Total_area*10)/10) + ' Ha' + '</b><br/></p>'     
                    );
                <?php }?>;
            };
            //hover_info.addTo(map);
            
            //Edited by justice
            //Get post data from the link
            function getQueryString(name){
                location.href.replace("#","");  
                if(location.href.indexOf("?")===-1 || location.href.indexOf(name+'=')===-1)     {          
                   return '';      
                }  
                var queryString = location.href.substring(location.href.indexOf("?")+1);        
                var parameters = queryString.split("&");        
                var pos, paraName, paraValue;       
                for(var i=0; i<=parameters.length; i++) {  
                   pos = parameters[i].split('=');           
                   if(pos === -1) { continue; }            
                   paraName = pos[0];           
                   paraValue = pos[1];           
                   if(paraName === name) {       
                        return decodeURIComponent(paraValue.replace(/\+/g, " "));           
                   }     
                }
                return '';   
            }
            var catchment_name = getQueryString("catchment_name");
            if(catchment_name==="MacquarieBogan"||catchment_name==="ManningRiver"){
                document.getElementById("selectCAT").value = catchment_name;
                var CATValue = getProperty(catchment_name);
                addCATLayer(catchment_name, CATValue);
            }
            //Edited by justice
            //L.geoJSON(MacquarieBogan_CatchmentBoundary).addTo(map).getBounds();
        </script>
    </body>
</html>
