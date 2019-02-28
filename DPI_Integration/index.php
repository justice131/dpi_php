<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>DPI Water</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- nsw map -->
        <script type="text/javascript" src="border/MacquarieBogan_CatchmentBoundary.geojson"></script> 
        <script type="text/javascript" src="border/ManningRiver_CatchmentBoundary.geojson"></script> 

        <!-- MacquarieBogan water dataset-->
        <script type="text/javascript" src="border/MacquarieBogan_GroundWaterSources.geojson"></script>
        <script type="text/javascript" src="border/Macquarie_RegulatedRiver.geojson"></script>
        <script type="text/javascript" src="border/MacquarieBogan_unregulated.geojson"></script>
        <script type="text/javascript" src="border/Macquarie_Unregulatedriver.geojson"></script>

        <!-- Manning water dataset -->
        <script type="text/javascript" src="border/Manning_unregulated.geojson"></script>
        <script type="text/javascript" src="border/Manning_Groundwater.geojson"></script>
        <script type="text/javascript" src="border/Manning_Unregulatedriver.geojson"></script>

        <!--Leaflet-->
        <link rel="stylesheet" href="lib/leaflet/leaflet.css">
        <script src="lib/leaflet/leaflet.js"></script>
        <script src="lib/js/jquery-3.3.1.min.js"></script>

        <!--Easyui-->
        <link rel="stylesheet" type="text/css" href="lib/jquery-easyui-1.5.5.1/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="lib/jquery-easyui-1.5.5.1/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="lib/jquery-easyui-1.5.5.1/demo/demo.css">
        <script type="text/javascript" src="lib/jquery-easyui-1.5.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="lib/jquery-easyui-1.5.5.1/jquery.easyui.min.js"></script> 
        <script type="text/javascript" src="lib/js/wise-leaflet-pip.js"></script>

        <!--mp3-->
        <audio id="error" src="lib/mp3/Error.mp3" preload="auto"></audio>

        <!--MarkerCluster-->
        <script type="text/javascript" src="lib/Leaflet.markercluster-1.3.0/dist/leaflet.markercluster-src.js"></script>
        <link rel="stylesheet" href="lib/Leaflet.markercluster-1.3.0/dist/MarkerCluster.Default.css">
        <link rel="stylesheet" href="lib/Leaflet.markercluster-1.3.0/dist/MarkerCluster.css">

        <!--Controlsearch-->
        <script type="text/javascript" src="lib/leaflet-search-master/src/leaflet-search.js"></script>
        <link rel="stylesheet" href="lib/leaflet-search-master/src/leaflet-search.css" />

        <!--Template-->
        <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="css/navigator_style.css" rel="stylesheet">
        <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
        <link rel="stylesheet" href="css/dpi.css">
        <script src="lib/js/bootstrap-3.3.7.min.js"></script>

        <script type="text/javascript" src="lib/js/Chart.min.js"></script>
        <script type="text/javascript" src="lib/js/dpi.js"></script>
        <script type="text/javascript" src="lib/progressbar.js-master/dist/progressbar.js"></script>

        <!--Leaflet pattern-->
        <script src="lib/Leaflet.pattern-master/dist/leaflet.pattern-src.js"></script>
        <script type="text/javascript" src="common.scripts/settings.js"></script>
    </head>
    <body style="background-color:#F3F3F4;">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav">
                    <li class="nav-header text-center"> <a href="https://www.industry.nsw.gov.au/water" target="_blank" style="padding: 3px 0 10px"> <img src="images/nsw.png" alt="nsw" height="50"/> </a> </li>
                    <li class=""> <a href="index.php" target="_blank" data-toggle="tooltip" title="Home" style="padding: 5px 0px 5px 13.5px"><img src="images/home_icon.jpg" alt="irrigation" height="40"/></a> </li>
                    <li class=""> <a href="pages/irrigation/Irrigation_module.php" target="_blank" data-toggle="tooltip" title="Irrigation" style="padding: 5px 0px 5px 13.5px"><img src="images/irrigation_icon.jpg" alt="irrigation" height="40"/></a> </li>
                    <li class=""> <a href="pages/mining/Mining_module.php" target="_blank" data-toggle="tooltip" title="Mining" style="padding: 5px 0px 5px 13.5px"><img src="images/mining_icon.png" alt="Mining" height="40"/></a> </li>
                    <li class=""> <a href="pages/town.water/Town_water_power_gen_module.php" target="_blank" data-toggle="tooltip" title="Town Water & Power Generation" style="padding: 5px 0px 5px 13.5px"><img src="images/town_water_icon.png" alt="Town Water" height="40"/></a> </li>
                    <li class=""> <a href="pages/environment/Environmental_module.php" target="_blank" data-toggle="tooltip" title="Critical Environmental Assets" style="padding: 5px 0px 5px 13.5px"><img src="images/environmental_icon.png" alt="Environmental" height="40"/></i></a> </li>
                    <li class=""> <a href="pc.pages/all/risk_opportunity.php" target="_blank" data-toggle="tooltip" title="Risk & Opportunity" style="padding: 5px 0px 5px 13.5px"><img src="images/risk_opportunity_icon.png" alt="Data" height="40"/></i></a> </li>
                    <li class=""> <a href="pc.pages/all/scenarios.php" target="_blank" data-toggle="tooltip" title="Scenarios" style="padding: 5px 0px 5px 13.5px"><img src="images/scenario_icon.png" alt="Data" height="40"/></i></a> </li>
                    <li class=""> <a href="pages/data.management/Data_Management_Index.php" target="_blank" data-toggle="tooltip" title="Data Management" style="padding: 5px 0px 5px 13.5px"><img src="images/data_icon.png" alt="Data" height="40"/></i></a> </li>
                </ul>
            </div>
        </nav>
	<div id="page-wrapper" class="gray-bg dashboard"  style="padding-bottom:20px">
            <div class="row">
                <div class="box-container" style="width:16.5%;" id="left_panel">
                    <table style="width:100%">
                      <tr>
                            <td>
                                <div id="setting">
                                  <div class="box-title">
                                        <h4><b>Catchment</b></h4>
                                  </div>
                                  <div class="box-content" style="height:200px;">
                                    <h5><b>Select a Catchment for More Information</b></h5>
                                    <table>
                                        <tr>
                                            <th>
                                            <form action="../">
                                                <select name="selectCAT" id="selectCAT" style="width:135px" onchange='OnChange(this.form.selectCAT);' >
                                                <option value="default">-----CATCHMENT-----</option>
                                                <option value="MacquarieBogan">Macquarie</option>
                                                <option value="ManningRiver">Manning</option>
                                                </select>
                                            </form>
                                            </th>
                                        <th>
                                            <button id="clear" onClick="clearAllLayers()">CLEAR</button>  
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
                              <div id="legend_title" class="box-title">
                                    <h4><b>Map Icon Legend</b></h4>
                              </div>
                              <div id="legend_content" class="box-content">
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

                <div class="box-container" style="width:83.5%;" id="map_panel">
                    <div class="box">
                            <div id="map_title"class="box-title">
                                <h4><b>Map</b></h4>
                            </div>
                            <div class="box-content">
                                <div id="map"></div>
                            </div>
                            <div id="MacquarieBogan">
<!--                                                <input type="checkbox" id="Regulated-CAT-MacquarieBogan" onclick="show_gis_MacquarieBogan_regulated('Regulated-CAT-MacquarieBogan')"> <font size="2">Regulated </font></br>       
                                    <input type="checkbox" id="Unregulated-CAT-MacquarieBogan" onclick="show_gis_MacquarieBogan_unregulated('Unregulated-CAT-MacquarieBogan')"> <font size="2">Unregulated </font></br>   
                                    <input type="checkbox" id="Groundwater-CAT-MacquarieBogan" onclick="show_gis_MacquarieBogan_groundwater('Groundwater-CAT-MacquarieBogan')"> <font size="2">Groundwater </font></span></br>   -->
                                    <input type="checkbox" id="Work-approvals-CAT-MacquarieBogan" onclick="show_gis_MacquarieBogan_workapprovals('Work-approvals-CAT-MacquarieBogan')"> <font size="2">License </font></br>
                                    <input type="checkbox" id="Approvals-CAT-MacquarieBogan" onclick="aa()"> <font size="2">Work approvals </font>
                            </div>

                            <div id="ManningRiver">
<!--                                                <input type="checkbox" id="Regulated-CAT-Manning" onclick="show_gis_Manning_regulated('Regulated-CAT-Manning')"> <font size="2">Regulated </font></br>
                                    <input type="checkbox" id="Unregulated-CAT-Manning" onclick="show_gis_Manning_unregulated('Unregulated-CAT-Manning')"> <font size="2">Unregulated </font></br>
                                    <input type="checkbox" id="Groundwater-CAT-Manning" onclick="show_gis_Manning_groundwater('Groundwater-CAT-Manning')"> <font size="2">Groundwater </font></br>-->
                                    <input type="checkbox" id="Work-approvals-CAT-Manning" onclick="show_gis_Manning_workapprovals('Work-approvals-CAT-Manning')"> <font size="2">License </font></br>
                                    <input type="checkbox" id="Approvals-CAT-Manning" onclick="show_gis_Manning_approvals('Approvals-CAT-Manning')"> <font size="2">Work approvals </font>
                            </div> 
                            <div id="container"></div>
                    </div>
                </div>
            </div>
	</div>
        <div class="se-pre-con"></div>
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
            window.onload=function(){//Set the height
                pageHeight = window.screen.height*heightRatio;
                var mapTitleHeight = document.getElementById("map_title").offsetHeight;
                document.getElementById("map").style.height = (pageHeight-mapTitleHeight) + "px";
                var settingHeight = document.getElementById("setting").offsetHeight;
                var legendTitleHeight = document.getElementById("legend_title").offsetHeight;
                document.getElementById("legend").style.height = (pageHeight - settingHeight - legendTitleHeight) + "px";
            };
            
            var MacquarieBogan_CatchmentBoundary = MacquarieBogan_CatchmentBoundary;
            var ManningRiver_CatchmentBoundary = ManningRiver_CatchmentBoundary;
            var MacquarieBogan_RugulatedRiver = MacquarieBogan_RugulatedRiver;
            var MacquarieBogan_GW = MacquarieBogan_GW;
            var MacquarieBogan_unregulated = MacquarieBogan_unregulated;
            var Macquarie_Unregulatedriver = Macquarie_UnregulatedRiver;
            var Manning_unregulated = Manning_unregulated;
            var Manning_Unregulatedriver = Manning_Unregulatedriver;
            var Manning_Groundwater = Manning_Groundwater;
            
            // Show preloader
            $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");
            });

            var map = L.map('map',{zoomControl: false, loadingControl: true}).setView([-32.4, 148.1], 6.5);
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
            
            var Mac_bound = L.geoJSON(MacquarieBogan_CatchmentBoundary, {
                style: function (feature) {
                return { color:'white', fillColor: '#3399ff', weight: 0.8, dashArray: '3'};
                },
                onEachFeature: function(feature, layer){
                layer.on({
                    mouseover: highlight_mac,
                    mouseout: reset_mac,
                    click: go_to_mac
                });
                }              
            }).addTo(map);
            
            var Man_bound = L.geoJSON(ManningRiver_CatchmentBoundary, {
                style: function (feature) {
                return { color:'white', fillColor: '#3399ff', weight: 0.8, dashArray: '3'};
                },
                onEachFeature: function(feature, layer){
                layer.on({
                    mouseover: highlight_man,
                    mouseout: reset_man,
                    click: go_to_man
                });
                } 
            }).addTo(map);
            
            function go_to_mac(){               
                window.location.href = "index.php?catchment_name=MacquarieBogan";
            }
            
            function go_to_man(){
                window.location.href = "index.php?catchment_name=ManningRiver";
            }
            
            function highlight_mac(e) {
                var layer = e.target;
                Mac_bound.bindTooltip("<b>"+"Macquarie Catchment"+"</b>", {sticky: true}).addTo(map);
                layer.setStyle({
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0.15
                });
                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }
            
            function highlight_man(e) {
                var layer = e.target;
                Man_bound.bindTooltip("<b>"+"Manning Catchment"+"</b>", {sticky: true});
                layer.setStyle({
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0.15
                });
                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
            }
            
            function reset_mac(e) {
                Mac_bound.resetStyle(e.target || e);
            }
            
            function reset_man(e) {
                Man_bound.resetStyle(e.target || e);
            }
            
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip(); 
            });

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
            
            function grm(){
                var a = Math.floor(Math.random() * 501)+1500; 
                return a;
            }
            
            function aa() {
                if (document.getElementById('Approvals-CAT-MacquarieBogan').checked === true){
                    set_bar();
                    container.style.display='block';
                    bar.animate(1.0);
                }
                setTimeout(function(){                  
                    show_gis_MacquarieBogan_approvals('Approvals-CAT-MacquarieBogan');
                    container.style.display='none';
                },grm()
                );
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
                iconUrl: 'lib/leaflet/images/R.png',
                iconSize:     [17, 18.2], 
                iconAnchor:   [8.5, 9.1],  
                popupAnchor:  [0, -10] 
            });
            
            var Icon_unreg = L.icon({
                iconUrl: 'lib/leaflet/images/U.png',
                iconSize:     [17, 18.2], 
                iconAnchor:   [8.5, 9.1],  
                popupAnchor:  [0, -10] 
            });
            
            var Icon_unreg_red = L.icon({
                iconUrl: 'lib/leaflet/images/U_red.png',
                iconSize:     [17, 18.2], 
                iconAnchor:   [8.5, 9.1],  
                popupAnchor:  [0, -10] 
            });
            
            var Icon_unreg_orange = L.icon({
                iconUrl: 'lib/leaflet/images/U_orange.png',
                iconSize:     [17, 18.2], 
                iconAnchor:   [8.5, 9.1],  
                popupAnchor:  [0, -10] 
            });
            
            var Icon_unreg_green = L.icon({
                iconUrl: 'lib/leaflet/images/U_green.png',
                iconSize:     [17, 18.2], 
                iconAnchor:   [8.5, 9.1],  
                popupAnchor:  [0, -10] 
            });
            
            var Icon_gw = L.icon({
                iconUrl: 'lib/leaflet/images/G.png',
                iconSize:     [17, 18.2], 
                iconAnchor:   [8.5, 9.1],  
                popupAnchor:  [0, -10] 
            });
           
            /*add by justice*/
            // Four indices
            var macquaireIcon = L.icon({
                iconUrl: 'images/index_icons/macquaire.png',
                iconSize: [70, 70]
            });
            var manningIcon = L.icon({
                iconUrl: 'images/index_icons/manning.png',
                iconSize: [70, 70]
            });
            var macquaireIndexIcon = L.marker([-32.2319, 147.8097], {icon: macquaireIcon});
            var mannningIndexIcon = L.marker([-31.7304, 151.8925], {icon: manningIcon});
            macquaireIndexIcon.bindPopup("<div class=\"four_index_link\"><a href=\"pc.pages/macquarie/macquarie_dsi.php\">DSI</a>&nbsp;&nbsp;&nbsp;<a href=\"pc.pages/macquarie/macquarie_fui.php\">FUI</a>&nbsp;&nbsp;&nbsp;<a href=\"pc.pages/macquarie/macquarie_fmi.php\" >FMI</a></div>").openPopup();
            mannningIndexIcon.bindPopup("<div class=\"four_index_link\"><a href=\"pc.pages/manning/manning_dsi.php\">DSI</a>&nbsp;&nbsp;&nbsp;<a href=\"pc.pages/manning/manning_fui.php\">FUI</a>&nbsp;&nbsp;&nbsp;<a href=\"pc.pages/manning/manning_fmi.php\" >FMI</a></div>").openPopup();
            macquaireIndexIcon.addTo(map);//add index icon
            mannningIndexIcon.addTo(map);//add index icon
            
            var ylegend = L.control({position: 'bottomright'});//Legend
            ylegend.onAdd = function (map) {
                var div = L.DomUtil.create('div', 'ylegend');
                div.innerHTML +="<img src=\"images/index_icons/legend.png\" width=\"170px\" height=\"125px\"/>";
                return div;
            };
            ylegend.addTo(map);//add index icon
            
            //Dams
            var burrendongIcon = L.icon({
                iconUrl: 'images/index_icons/macquaire_burrendong.png',
                iconSize: [50, 50]
            });
            var burrendongIndexIcon = L.marker([ -32.924061304999952, 149.226207626000019], {icon: burrendongIcon});
            burrendongIndexIcon.bindPopup("<div class=\"four_index_link\"><a href=\"pc.pages/dams/macquarie_above_burrendong_dam_dsi.php\">DSI</a>&nbsp;&nbsp;&nbsp;<a href=\"pc.pages/dams/macquarie_above_burrendong_dam_fui.php\">FUI</a></div>").openPopup();
            burrendongIndexIcon.addTo(map);//add index icon
            
            var windamereIcon = L.icon({
                iconUrl: 'images/index_icons/macquaire_cudgegong.png',
                iconSize: [50, 50]
            });
            var windamereIndexIcon = L.marker([ -32.80973, 149.912125497000034], {icon: windamereIcon});
            windamereIndexIcon.bindPopup("<div class=\"four_index_link\"><a href=\"pc.pages/dams/macquarie_above_upper_cudgegong_dsi.php\">DSI</a>&nbsp;&nbsp;&nbsp;<a href=\"pc.pages/dams/macquarie_above_upper_cudgegong_fui.php\">FUI</a></div>").openPopup();
            windamereIndexIcon.addTo(map);//add index icon
            /*add by justice*/
            
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
            
            function OnChange(){
                //Edited by justice
                var myselect=document.getElementById("selectCAT");
                var selectedIndex=myselect.selectedIndex;
                var selectValue=myselect.options[selectedIndex].value;
                if(selectValue==="MacquarieBogan"){
                    window.location.href = "index.php?catchment_name=MacquarieBogan";                  
                }else if(selectValue==="ManningRiver"){
                    window.location.href = "index.php?catchment_name=ManningRiver";
                }else if(selectValue==="default"){
                    window.location.href = "index.php";
                }
                //Edited by justice
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
            
            function icon_unreg(w){
                if (w>=0 & w<=0.5){
                    return Icon_unreg_green;
                }else if (w>0.5 & w<=0.75){
                    return Icon_unreg_orange;
                }else{
                    return Icon_unreg_red;
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
                                return { color: 'red', weight: 0.3};
                        },
                        onEachFeature: onEachFeature
                        }).addTo(map);
                //Zooms to the layer selected
                if (CATName==="MacquarieBogan"){
                    map.removeLayer(Mac_bound);
                    map.setView([-31.8, 148.5], 8);
                    show_gis_MacquarieBogan_regulated();
                    show_gis_MacquarieBogan_unregulated();
                    show_gis_MacquarieBogan_groundwater();
                    
                }else if (CATName==="ManningRiver"){
                    map.removeLayer(Man_bound);
                    map.setView([-31.75, 151.9],10);
                    show_gis_Manning_unregulated();
                    show_gis_Manning_groundwater();
                }

                //legendinfo.addTo(map);
                hover_info.addTo(map);
//                Add_legend();
                if (checkbox_id !== null){
                    checkbox_id.style.display = "block";
                    
                }
                //Reset to default checkbox
                $("input[type=checkbox]").each(function() { this.checked=false; });
                featureCATCollection.push(CAT);
                displayedCAT.push(CATName);
                check_collection.push(checkbox_id);
                // Remove other's layers
//                removeLayer(displayed_gis_layer_regulated);
//                removeLayer(displayed_gis_layer_unregulated);
//                removeLayer(displayed_gis_layer_groundwater);
                }
                setTimeout(function(){ map.invalidateSize()}, 1000);
            }
                       
//            function show(){
//                window.location.href = "index.php?catchment_name=MacquarieBogan";
//            }
            
            function clearAllLayers(){
                window.location.href = "index.php";
//                for (var i = 0; i < featureCATCollection.length; i++){     
//                    map.removeLayer(featureCATCollection[i]);
//                    if (checkbox_id !== null){
//                        checkbox_id.style.display = "none";
//                    }
//                }
//                //hover_info.style.visibility = 'hidden';
//                removeLayer(displayed_gis_layer_regulated);
//                removeLayer(displayed_gis_layer_unregulated);
//                removeLayer(displayed_gis_layer_groundwater);
//                removeLayer(displayed_gis_layer_workapproval);
//                removeLayer(displayed_gis_layer_approval);
//                document.getElementById('selectCAT').value = 'default';
//                map.removeControl(hover_info);
//                if (typeof legendinfo !== 'undefined') {
//                        map.removeControl(legendinfo);
//                }
//                if (typeof controlSearch !== 'undefined') {
//                        map.removeControl(controlSearch);
//                }
//                if (typeof link_to_parr !== 'undefined') {
//                        link_to_parr.style.display = 'none';
//                }                
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
            
            function set_bar(){
            bar = new ProgressBar.Circle(container, {
                color: 'black',
                trailColor: '#eee',
                // This has to be the same size as the maximum width to
                // prevent clipping
                strokeWidth: 40,
                trailWidth: 1,
                easing: 'easeInOut',
                duration: 2800,
                text: {
                  autoStyleContainer: false
                },
                from: { color: '#FFEA82', width: 1 },
                to: { color: '#ED6A5A', width: 4 },
                // Set default step function for all animate calls
                step: function(state, circle) {
                  circle.path.setAttribute('stroke', state.color);
                  circle.path.setAttribute('stroke-width', state.width);

                  var value = Math.round(circle.value() * 100);
                  if (value === 0) {
                    circle.setText('');
                  } else {
                    circle.setText(value);
                  }

                }
              });
              bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
              bar.text.style.fontSize = '2rem';
          }                             
            //display regulated info for MacquarieBogan
                     
            function show_gis_MacquarieBogan_regulated(){  
                var displayed_gis_layer_regulated = []; 
//                var checkBox = document.getElementById(id); 
                var geojsonfile = MacquarieBogan_RugulatedRiver;
                // display legend for reg river
                var elem = document.createElement("div");
                elem.setAttribute('id', 'reg_mac');
                elem.innerHTML = ('<img src="lib/leaflet/images/R.png"  width="17" height="18.2" align = "center">&nbsp; &nbsp;Regulated river<br>');
                
//                if (checkBox.checked === true){
                                       
                    ylegend.addTo(map);//add index icon
                    macquaireIndexIcon.addTo(map);//add index icon
                    document.getElementById("legend").appendChild(elem);
                    var Reg = L.geoJSON(geojsonfile, {
                        style: function (feature) {
                                switch(feature.properties.OBJECTID){
                                    case 1: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 2: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 3: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 4: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 5: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 6: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 7: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 8: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 9: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 10: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 11: return { fillColor: "darkblue", weight: 2, fillOpacity: 1}; break;
                                    case 12: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
                                    case 13: return { fillColor: "darkblue", weight: 2, fillOpacity: 1}; break;
                                    case 14: return { color: "lightblue", weight: 2, fillOpacity: 1}; break;
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
//                }
//                if (checkBox.checked === false){
//                    map.removeControl(ylegend);//remove index icon, justice
//                    map.removeControl(macquaireIndexIcon);//remove index icon, justice
//                    removeLayer(displayed_gis_layer_regulated);
//                    var elementToBeRemoved = document.getElementById('reg_mac');
//                    document.getElementById('legend').removeChild(elementToBeRemoved);
//                } 
            }
                       
            //display unregulated info for MacquarieBogan
                      
            function show_gis_MacquarieBogan_unregulated(){
                var displayed_gis_layer_unregulated = [];
//                var checkBox = document.getElementById(id); 
                var geojsonfile = MacquarieBogan_unregulated;
                var geojsonfile_1 = Macquarie_Unregulatedriver;
//                link_to_parr = document.getElementById('link_to_parallel_coordinate');
                var elem = document.createElement("div");
                elem.setAttribute('id', 'unreg_mac');
                elem.innerHTML = ('<img src="lib/leaflet/images/U.png"  width="17" height="18.2" align = "center">&nbsp; &nbsp;Unregulated river<br>');
//                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    // display link icon
//                    link_to_parr.style.display = 'block';                                       
                                    
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }
//                    markersLayer = new L.LayerGroup();
//                    map.addLayer(markersLayer);
//                    controlSearch = new L.Control.Search({
//                        position:'topleft',
//                        layer: markersLayer,
//                        initial: false,
//                        zoom: 11,
//                        marker: false,
//                        propertyName: 'water_source',
//                        textPlaceholder: 'Search water source',
//                        textErr: 'Water source not found'
//                    }); 
//                    map.addControl(controlSearch);
                    
                    Unreg = L.geoJSON(geojsonfile, {
                        style: function (feature) {
                            return { color:'white', fillColor: '#88888', weight: 0.6, fillOpacity: 0.3, dashArray: '3'};
                        },
                        onEachFeature: function(feature, layer){
                            layer.on({
                                mouseover: highlightFeature_unreg,
                                mouseout: resetHighlight_unreg
                            });
                        }                      
                    }).addTo(map);
                    var Reg_1 = L.geoJSON(geojsonfile_1, {
                        style: function (feature) {
                            return { color: 'lightblue', weight: 1, fillOpacity: 0.9};
                        }
                    }).addTo(map);                   
                    displayed_gis_layer_unregulated.push(Unreg);  
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
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_0["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_0["estimated_infrastructure_upgrade"]; ?>";
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
                    
                    var Mak_uw_1 = L.marker(unregulated_0, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[0].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[0].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_1);

                    <?php if(!empty($ro_1)){?>
                        var AE ="<?php echo $ro_1["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_1["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_1["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_1["FUI"]; ?>";
                        var DS ="<?php echo $ro_1["DSI"]; ?>";
                        var IE ="<?php echo $ro_1["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_1["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_1["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_1["estimated_infrastructure_upgrade"]; ?>";
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
                    
                    var Mak_uw_2 = L.marker(unregulated_1, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[1].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[1].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_2);

                    <?php if(!empty($ro_2)){?>
                        var AE ="<?php echo $ro_2["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_2["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_2["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_2["FUI"]; ?>";
                        var DS ="<?php echo $ro_2["DSI"]; ?>";
                        var IE ="<?php echo $ro_2["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_2["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_2["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_2["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_3 = L.marker(unregulated_2, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[2].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[2].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_3);

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
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_3["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_3["estimated_infrastructure_upgrade"]; ?>";
                    <?php }?> 
                        
                    var Mak_uw_4 = L.marker(unregulated_3, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[3].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[3].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_4);

                    <?php if(!empty($ro_4)){?>
                        var AE ="<?php echo $ro_4["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_4["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_4["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_4["FUI"]; ?>";
                        var DS ="<?php echo $ro_4["DSI"]; ?>";
                        var IE ="<?php echo $ro_4["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_4["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_4["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_4["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_5 = L.marker(unregulated_4, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[4].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[4].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    ); 
//                    markersLayer.addLayer(Mak_uw_5);

                    <?php if(!empty($ro_5)){?>
                        var AE ="<?php echo $ro_5["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_5["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_5["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_5["FUI"]; ?>";
                        var DS ="<?php echo $ro_5["DSI"]; ?>";
                        var IE ="<?php echo $ro_5["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_5["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_5["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_5["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_6 = L.marker(unregulated_5, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[5].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[5].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_6);

                    <?php if(!empty($ro_6)){?>
                        var AE ="<?php echo $ro_6["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_6["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_6["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_6["FUI"]; ?>";
                        var DS ="<?php echo $ro_6["DSI"]; ?>";
                        var IE ="<?php echo $ro_6["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_6["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_6["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_6["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_7 = L.marker(unregulated_6, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[6].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[6].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_7);
 
                     <?php if(!empty($ro_7)){?>
                        var AE ="<?php echo $ro_7["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_7["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_7["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_7["FUI"]; ?>";
                        var DS ="<?php echo $ro_7["DSI"]; ?>";
                        var IE ="<?php echo $ro_7["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_7["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_7["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_7["estimated_infrastructure_upgrade"]; ?>";
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

                    var Mak_uw_8 = L.marker(unregulated_7, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[7].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[7].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    ); 
//                    markersLayer.addLayer(Mak_uw_8);

                    <?php if(!empty($ro_8)){?>
                        var AE ="<?php echo $ro_8["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_8["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_8["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_8["FUI"]; ?>";
                        var DS ="<?php echo $ro_8["DSI"]; ?>";
                        var IE ="<?php echo $ro_8["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_8["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_8["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_8["estimated_infrastructure_upgrade"]; ?>";
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
                        
                        
                    var Mak_uw_9 = L.marker(unregulated_8, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[8].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[8].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_9);
                    
                    <?php if(!empty($ro_9)){?>
                        var AE ="<?php echo $ro_9["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_9["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_9["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_9["FUI"]; ?>";
                        var DS ="<?php echo $ro_9["DSI"]; ?>";
                        var IE ="<?php echo $ro_9["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_9["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_9["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_9["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_10 = L.marker(unregulated_9, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[9].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[9].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_10);
            
                     <?php if(!empty($ro_10)){?>
                        var AE ="<?php echo $ro_10["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_10["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_10["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_10["FUI"]; ?>";
                        var DS ="<?php echo $ro_10["DSI"]; ?>";
                        var IE ="<?php echo $ro_10["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_10["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_10["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_10["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_11 = L.marker(unregulated_10, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[10].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[10].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_11);
            
                    <?php if(!empty($ro_11)){?>
                        var AE ="<?php echo $ro_11["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_11["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_11["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_11["FUI"]; ?>";
                        var DS ="<?php echo $ro_11["DSI"]; ?>";
                        var IE ="<?php echo $ro_11["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_11["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_11["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_11["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_12 = L.marker(unregulated_11, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[11].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[11].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_12);
            
                    <?php if(!empty($ro_12)){?>
                        var AE ="<?php echo $ro_12["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_12["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_12["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_12["FUI"]; ?>";
                        var DS ="<?php echo $ro_12["DSI"]; ?>";
                        var IE ="<?php echo $ro_12["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_12["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_12["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_12["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_13 = L.marker(unregulated_12, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[12].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[12].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_13);
 
                     <?php if(!empty($ro_13)){?>
                        var AE ="<?php echo $ro_13["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_13["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_13["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_13["FUI"]; ?>";
                        var DS ="<?php echo $ro_13["DSI"]; ?>";
                        var IE ="<?php echo $ro_13["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_13["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_13["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_13["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_14 = L.marker(unregulated_13, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[13].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[13].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_14);

                    <?php if(!empty($ro_14)){?>
                        var AE ="<?php echo $ro_14["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_14["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_14["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_14["FUI"]; ?>";
                        var DS ="<?php echo $ro_14["DSI"]; ?>";
                        var IE ="<?php echo $ro_14["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_14["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_14["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_14["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_15 = L.marker(unregulated_14, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[14].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[14].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_15);

                    <?php if(!empty($ro_15)){?>
                        var AE ="<?php echo $ro_15["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_15["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_15["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_15["FUI"]; ?>";
                        var DS ="<?php echo $ro_15["DSI"]; ?>";
                        var IE ="<?php echo $ro_15["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_15["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_15["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_15["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_16 = L.marker(unregulated_15, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[15].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[15].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_16);

                    <?php if(!empty($ro_16)){?>
                        var AE ="<?php echo $ro_16["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_16["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_16["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_16["FUI"]; ?>";
                        var DS ="<?php echo $ro_16["DSI"]; ?>";
                        var IE ="<?php echo $ro_16["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_16["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_16["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_16["estimated_infrastructure_upgrade"]; ?>";
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
            
            
                    var Mak_uw_17 = L.marker(unregulated_16, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[16].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[16].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_17);
 
                    <?php if(!empty($ro_17)){?>
                        var AE ="<?php echo $ro_17["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_17["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_17["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_17["FUI"]; ?>";
                        var DS ="<?php echo $ro_17["DSI"]; ?>";
                        var IE ="<?php echo $ro_17["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_17["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_17["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_17["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_18 = L.marker(unregulated_17, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[17].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[17].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_18);
 
                     <?php if(!empty($ro_18)){?>
                        var AE ="<?php echo $ro_18["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_18["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_18["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_18["FUI"]; ?>";
                        var DS ="<?php echo $ro_18["DSI"]; ?>";
                        var IE ="<?php echo $ro_18["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_18["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_18["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_18["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_19 = L.marker(unregulated_18, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[18].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[18].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_19);

                    <?php if(!empty($ro_19)){?>
                        var AE ="<?php echo $ro_19["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_19["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_19["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_19["FUI"]; ?>";
                        var DS ="<?php echo $ro_19["DSI"]; ?>";
                        var IE ="<?php echo $ro_19["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_19["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_19["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_19["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_20 = L.marker(unregulated_19, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[19].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[19].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_20);

                    <?php if(!empty($ro_20)){?>
                        var AE ="<?php echo $ro_20["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_20["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_20["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_20["FUI"]; ?>";
                        var DS ="<?php echo $ro_20["DSI"]; ?>";
                        var IE ="<?php echo $ro_20["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_20["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_20["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_20["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_21 = L.marker(unregulated_20, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[20].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[20].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_21);

                    <?php if(!empty($ro_21)){?>
                        var AE ="<?php echo $ro_21["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_21["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_21["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_21["FUI"]; ?>";
                        var DS ="<?php echo $ro_21["DSI"]; ?>";
                        var IE ="<?php echo $ro_21["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_21["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_21["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_21["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_22 = L.marker(unregulated_21, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[21].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[21].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_22);

                    <?php if(!empty($ro_22)){?>
                        var AE ="<?php echo $ro_22["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_22["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_22["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_22["FUI"]; ?>";
                        var DS ="<?php echo $ro_22["DSI"]; ?>";
                        var IE ="<?php echo $ro_22["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_22["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_22["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_22["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_23 = L.marker(unregulated_22, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[22].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[22].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_23);
 
                     <?php if(!empty($ro_23)){?>
                        var AE ="<?php echo $ro_23["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_23["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_23["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_23["FUI"]; ?>";
                        var DS ="<?php echo $ro_23["DSI"]; ?>";
                        var IE ="<?php echo $ro_23["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_23["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_23["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_23["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_24 = L.marker(unregulated_23, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[23].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[23].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_24);
 
                     <?php if(!empty($ro_24)){?>
                        var AE ="<?php echo $ro_24["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_24["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_24["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_24["FUI"]; ?>";
                        var DS ="<?php echo $ro_24["DSI"]; ?>";
                        var IE ="<?php echo $ro_24["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_24["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_24["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_24["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_25 = L.marker(unregulated_24, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[24].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[24].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_25);

                    <?php if(!empty($ro_25)){?>
                        var AE ="<?php echo $ro_25["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_25["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_25["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_25["FUI"]; ?>";
                        var DS ="<?php echo $ro_25["DSI"]; ?>";
                        var IE ="<?php echo $ro_25["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_25["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_25["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_25["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_26 = L.marker(unregulated_25, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[25].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[25].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_26);

                    <?php if(!empty($ro_26)){?>
                        var AE ="<?php echo $ro_26["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_26["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_26["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_26["FUI"]; ?>";
                        var DS ="<?php echo $ro_26["DSI"]; ?>";
                        var IE ="<?php echo $ro_26["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_26["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_26["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_26["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_27 = L.marker(unregulated_26, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[26].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[26].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_27);

                    <?php if(!empty($ro_27)){?>
                        var AE ="<?php echo $ro_27["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_27["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_27["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_27["FUI"]; ?>";
                        var DS ="<?php echo $ro_27["DSI"]; ?>";
                        var IE ="<?php echo $ro_27["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_27["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_27["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_27["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_28 = L.marker(unregulated_27, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[27].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[27].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_28);

                    <?php if(!empty($ro_28)){?>
                        var AE ="<?php echo $ro_28["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_28["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_28["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_28["FUI"]; ?>";
                        var DS ="<?php echo $ro_28["DSI"]; ?>";
                        var IE ="<?php echo $ro_28["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_28["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_28["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_28["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_29 = L.marker(unregulated_28, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[28].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[28].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_29);

                    <?php if(!empty($ro_29)){?>
                        var AE ="<?php echo $ro_29["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_29["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_29["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_29["FUI"]; ?>";
                        var DS ="<?php echo $ro_29["DSI"]; ?>";
                        var IE ="<?php echo $ro_29["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_29["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_29["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_29["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_uw_30 = L.marker(unregulated_29, {icon: icon_unreg(UE/AE), water_source: MacquarieBogan_unregulated.features[29].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + MacquarieBogan_unregulated.features[29].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_uw_30);
            
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
                    
//                    controlSearch.on('search:locationfound', 
//                    function(e) {
//                        e.layer.addTo(map).openPopup();
//                    }); 
//                    }
//                if (checkBox.checked === false){
//                    removeLayer(displayed_gis_layer_unregulated);
//                    map.removeControl(controlSearch);
//                    link_to_parr.style.display = 'none';
//                    var elementToBeRemoved = document.getElementById('unreg_mac');
//                    document.getElementById('legend').removeChild(elementToBeRemoved);
//                }
            }

            //display groundwater info for MacquarieBogan
            function show_gis_MacquarieBogan_groundwater(){
                var displayed_gis_layer_groundwater = [];   
//                var checkBox = document.getElementById(id); 
                var geojsonfile = MacquarieBogan_GW;
                var elem = document.createElement("div");
                elem.setAttribute('id', 'gw_mac');
                elem.innerHTML = ('<img src="lib/leaflet/images/G.png"  width="17" height="18.2" align = "center">&nbsp; &nbsp;Groundwater<br>'+
                        '<img src="lib/leaflet/images/yellow_gw.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Groundwater<br>');
//                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }                    
//                    var markersLayer = new L.LayerGroup();
//                    map.addLayer(markersLayer);
//                    controlSearch = new L.Control.Search({
//                        position:'topleft',
//                        layer: markersLayer,
//                        initial: false,
//                        zoom: 11,
//                        marker: false,
//                        propertyName: 'gwater_source',
//                        textPlaceholder: 'Search groundwater source',
//                        textErr: 'Groundwater source not found'
//                    }); 
//                    map.addControl(controlSearch);
                    
                    var Reg = L.geoJSON(geojsonfile, {
                        style: function (feature) {
                            return { color: "yellow", weight: 0.9, fillOpacity: 0.3};
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
                    var Mak_groundwater_1 = L.marker(groundwater_0, {icon: Icon_gw, water_source: MacquarieBogan_GW.features[0].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+MacquarieBogan_GW.features[0].properties.W_Source_1+'</b>'+'</br></br>'+
                    'Longterm Extraction Limit: ' + toThousands(lel) + ' ML/year'); 
//                    markersLayer.addLayer(Mak_groundwater_1);
                    
                    <?php if(!empty($ro_gw_2)){?>
                        var lel ="<?php echo $ro_gw_2["longterm_extraction_limit"]; ?>";
                    <?php }?> 
                    
                    groundwater_1[0] = groundwater_1[0] - 0.02 ;
                    var Mak_groundwater_2 = L.marker(groundwater_1, {icon: Icon_gw, water_source: MacquarieBogan_GW.features[1].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+MacquarieBogan_GW.features[1].properties.W_Source_1+'</b>'+'</br></br>'+
                    'Longterm Extraction Limit: ' + toThousands(lel) + ' ML/year'); 
//                    markersLayer.addLayer(Mak_groundwater_2);
                    
                    <?php if(!empty($ro_gw_3)){?>
                        var lel ="<?php echo $ro_gw_3["longterm_extraction_limit"]; ?>";
                    <?php }?> 
                        
                    groundwater_2[0] = groundwater_2[0] - 0.01 ;
                    var Mak_groundwater_3 = L.marker(groundwater_2, {icon: Icon_gw, water_source: MacquarieBogan_GW.features[2].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+MacquarieBogan_GW.features[2].properties.W_Source_1+'</b>'+'</br></br>'+
                    'Longterm Extraction Limit: ' + toThousands(lel) + ' ML/year'); 
//                    markersLayer.addLayer(Mak_groundwater_3);

                    <?php if(!empty($ro_gw_4)){?>
                        var lel ="<?php echo $ro_gw_4["longterm_extraction_limit"]; ?>";
                    <?php }?> 
                        
                    var Mak_groundwater_4 = L.marker(groundwater_3, {icon: Icon_gw, water_source: MacquarieBogan_GW.features[3].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+MacquarieBogan_GW.features[3].properties.W_Source_1+'</b>'+'</br></br>'+
                    'Longterm Extraction Limit: ' + toThousands(lel) + ' ML/year');  
//                    markersLayer.addLayer(Mak_groundwater_4);
            
                    displayed_gis_layer_groundwater.push(Mak_groundwater_1); 
                    displayed_gis_layer_groundwater.push(Mak_groundwater_2);
                    displayed_gis_layer_groundwater.push(Mak_groundwater_3);
                    displayed_gis_layer_groundwater.push(Mak_groundwater_4);
                    
//                    controlSearch.on('search:locationfound', 
//                    function(e) {
//                        e.layer.addTo(map).openPopup();
//                    });                                  
                    
//                }
//                if (checkBox.checked === false){
//                    removeLayer(displayed_gis_layer_groundwater);
//                    map.removeControl(controlSearch);
//                    var elementToBeRemoved = document.getElementById('gw_mac');
//                    document.getElementById('legend').removeChild(elementToBeRemoved);
//
//                } 
            } 
            
            var displayed_gis_layer_workapproval = [];
            work_mac = [];
            <?php if(!empty($workapproval)){?>;
                number_license_mac = 0;
                number_license_man = 0;
                <?php for ($x=0; $x<count($workapproval); $x++) {?>
                    var Lat_workapproval ="<?php echo $workapproval[$x]["Latitude"]; ?>";
                    var Lon_workapproval ="<?php echo $workapproval[$x]["Longitude"]; ?>";
                    var Purpose = "<?php echo $workapproval[$x]["purpose_des"]; ?>";
                    var Share_component = "<?php echo $workapproval[$x]["ShareComponent"]; ?>";
                    var water_type = "<?php echo $workapproval[$x]["WaterType"]; ?>";
                    var cat = "<?php echo $workapproval[$x]["Category"]; ?>";
                    var Basin_name = "<?php echo $workapproval[$x]["Basin_name"]; ?>";
                    var WS = "<?php echo $workapproval[$x]["WS"]; ?>";
                    if (Basin_name === 'Macquarie'){
                        number_license_mac = number_license_mac +1;
                    }
                    if (Basin_name === 'Manning'){
                        number_license_man = number_license_man +1;
                    }
                    work_mac.push([Lat_workapproval, Lon_workapproval, Purpose, Share_component, water_type, cat, Basin_name, WS]);
                <?php }?>;    
            <?php }?>;
            
            function show_gis_MacquarieBogan_workapprovals(id){                
                var checkBox = document.getElementById(id);
                var elem = document.createElement("div");
                elem.setAttribute('id', 'lices_mac');
                elem.innerHTML = ('<img src="lib/leaflet/images/li_reg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;License (regulated river)<br>'+
                        '<img src="lib/leaflet/images/li_unreg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;License (unregulated river)<br>'+
                        '<img src="lib/leaflet/images/li_gw.png"  width="13" height="22" align = "center">&nbsp; &nbsp;License (groundwater)<br>');
                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    } 
                    num_marker = number_license_mac;
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
                    var elementToBeRemoved = document.getElementById('lices_mac');
                    document.getElementById('legend').removeChild(elementToBeRemoved);
                }            
            }           
            
            var displayed_gis_layer_approval = []; 
            work_approval_array = [];
            <?php if(!empty($work_approval)){?>;
            number_approval_mac = 0;
            number_approval_man = 0;
                <?php for ($x=0; $x<count($work_approval); $x++) {?>

                    var Lat_approval ="<?php echo $work_approval[$x]["latitude"]; ?>";
                    var Lon_approval ="<?php echo $work_approval[$x]["longitude"]; ?>";
                    var Work_description = "<?php echo $work_approval[$x]["work_description"]; ?>";
                    var So = "<?php echo $work_approval[$x]["so"]; ?>";
                    var Approval_id = "<?php echo $work_approval[$x]["approval"]; ?>";
                    var Basin_name = "<?php echo $work_approval[$x]["basin_name"]; ?>";
                    var Water_type = "<?php echo $work_approval[$x]["water_type"]; ?>";
                    if (Basin_name === 'macquarie'){
                        number_approval_mac = number_approval_mac +1;
                    }
                    if (Basin_name === 'manning'){
                        number_approval_man = number_approval_man +1;
                    }                   
                    work_approval_array.push([Lat_approval, Lon_approval, Work_description, So, Approval_id, Basin_name, Water_type]);
                <?php }?>; 
            <?php }?>; 
                        
            function show_gis_MacquarieBogan_approvals(id){
                var checkBox = document.getElementById(id);
                var elem = document.createElement("div");
                elem.setAttribute('id', 'appro_mac');
                elem.innerHTML = ('<img src="lib/leaflet/images/wa_reg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Work approval (regulated river)<br>'+
                        '<img src="lib/leaflet/images/wa_unreg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Work approval (unregulated river)<br>'+
                        '<img src="lib/leaflet/images/wa_gw.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Work approval (groundwater)<br>');

                if (checkBox.checked === true){                                                             
                    document.getElementById("legend").appendChild(elem);
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }  
                    num_marker = number_approval_mac;
                    var markerClusters = new L.MarkerClusterGroup({disableClusteringAtZoom: 13});
                    controlSearch = new L.Control.Search({
                        position:'topleft',
                        layer: markerClusters,
                        initial: false,
                        zoom: 15,
                        marker: false,
                        propertyName: 'App_id',
                        textPlaceholder: 'Search work approval ID',
                        textErr: 'Work approval not found'
                    }); 
                    map.addControl(controlSearch);
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
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_1, App_id: Approval_id})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                markerClusters.addLayer(M);
                                break;
                                case 'UNREG':
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_2, App_id: Approval_id})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                markerClusters.addLayer(M);                       
                                break;
                                case 'GW':
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_3, App_id: Approval_id})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                markerClusters.addLayer(M);                       
                                break;
                            }
                            displayed_gis_layer_approval.push(M);
                        }
                        map.addLayer(markerClusters);
                        displayed_gis_layer_approval.push(markerClusters);
                        controlSearch.on('search:locationfound', function(e) {
                            e.layer.addTo(map).openPopup();
                        });
                    }
                                        
                }
                if (checkBox.checked === false){  
                    bar.destroy();
                    removeLayer(displayed_gis_layer_approval);
                    map.removeControl(controlSearch);
                    var elementToBeRemoved = document.getElementById('appro_mac');
                    document.getElementById('legend').removeChild(elementToBeRemoved);
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
            
            
            function show_gis_Manning_unregulated(){
                var displayed_gis_layer_unregulated = [];
                var elem = document.createElement("div");
                elem.setAttribute('id', 'unreg_man');
                elem.innerHTML = ('<img src="lib/leaflet/images/U.png"  width="17" height="18.2" align = "center">&nbsp; &nbsp;Unregulated river<br>');

//                var checkBox = document.getElementById(id); 
                var geojsonfile = Manning_unregulated;
                var geojsonfile_1 = Manning_Unregulatedriver;
//                link_to_parr_man = document.getElementById('link_to_parallel_coordinate_manning');
//                if (checkBox.checked === true){
//                    link_to_parr_man.style.display='block';
                    document.getElementById("legend").appendChild(elem);
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }                    
//                    var markersLayer = new L.LayerGroup();
//                    map.addLayer(markersLayer);
//                    controlSearch = new L.Control.Search({
//                        position:'topleft',
//                        layer: markersLayer,
//                        initial: false,
//                        zoom: 12,
//                        marker: false,
//                        propertyName: 'water_source',
//                        textPlaceholder: 'Search water source',
//                        textErr: 'Water source not found'
//                    }); 
//                    map.addControl(controlSearch);
                    
                    Unreg = L.geoJSON(geojsonfile, {
                        style: function (feature) {
                            return { color: 'white', fillColor: '#88888', weight: 0.6, fillOpacity: 0.3, dashArray: '3'};
                        },
                        onEachFeature: function(feature, layer){
                            layer.on({
                                mouseover: highlightFeature_unreg,
                                mouseout: resetHighlight_unreg
                            });
                        }
                    }).addTo(map);
                    
                    var Reg_1 = L.geoJSON(geojsonfile_1, {
                        style: function (feature) {
                            return { color: 'lightblue', weight: 1, fillOpacity: 0.9};
                        }
                    }).addTo(map);
                    
                    displayed_gis_layer_unregulated.push(Unreg);   
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
                    man_unre_8[0] = man_unre_8[0]+0.02;
                    var man_unre_9 = getCentroid(Manning_unregulated.features[9].geometry.coordinates[0]);
                    var man_unre_10 = getCentroid(Manning_unregulated.features[10].geometry.coordinates[0]);
                    var man_unre_11 = getCentroid(Manning_unregulated.features[11].geometry.coordinates[0]);
                    var man_unre_12 = getCentroid(Manning_unregulated.features[12].geometry.coordinates[0]);
                    var man_unre_13 = getCentroid(Manning_unregulated.features[13].geometry.coordinates[0]);
                    man_unre_13[1] = man_unre_13[1]-0.04;
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
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_1["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_1["estimated_infrastructure_upgrade"]; ?>";
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
                    var Mak_1 = L.marker(man_unre_0, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[0].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[0].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_1);

                    <?php if(!empty($ro_2)){?>
                        var AE ="<?php echo $ro_2["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_2["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_2["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_2["FUI"]; ?>";
                        var DS ="<?php echo $ro_2["DSI"]; ?>";
                        var IE ="<?php echo $ro_2["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_2["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_2["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_2["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_2 = L.marker(man_unre_1, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[1].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[1].properties.WATER_SOUR + '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_2);

                    <?php if(!empty($ro_3)){?>
                        var AE ="<?php echo $ro_3["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_3["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_3["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_3["FUI"]; ?>";
                        var DS ="<?php echo $ro_3["DSI"]; ?>";
                        var IE ="<?php echo $ro_3["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_3["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_3["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_3["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_3 = L.marker(man_unre_2, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[2].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[2].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_3);
  
                    <?php if(!empty($ro_4)){?>
                        var AE ="<?php echo $ro_4["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_4["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_4["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_4["FUI"]; ?>";
                        var DS ="<?php echo $ro_4["DSI"]; ?>";
                        var IE ="<?php echo $ro_4["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_4["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_4["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_4["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_4 = L.marker(man_unre_3, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[3].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[3].properties.WATER_SOUR+ '</b><br/><br/>' 
                   + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_4);
            
                    <?php if(!empty($ro_5)){?>
                        var AE ="<?php echo $ro_5["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_5["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_5["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_5["FUI"]; ?>";
                        var DS ="<?php echo $ro_5["DSI"]; ?>";
                        var IE ="<?php echo $ro_5["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_5["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_5["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_5["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_5 = L.marker(man_unre_4, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[4].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[4].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_5);
  
                    <?php if(!empty($ro_6)){?>
                        var AE ="<?php echo $ro_6["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_6["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_6["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_6["FUI"]; ?>";
                        var DS ="<?php echo $ro_6["DSI"]; ?>";
                        var IE ="<?php echo $ro_6["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_6["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_6["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_6["estimated_infrastructure_upgrade"]; ?>";
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
                    var Mak_6 = L.marker(man_unre_5, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[5].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[5].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_6);
   
                    <?php if(!empty($ro_7)){?>
                        var AE ="<?php echo $ro_7["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_7["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_7["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_7["FUI"]; ?>";
                        var DS ="<?php echo $ro_7["DSI"]; ?>";
                        var IE ="<?php echo $ro_7["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_7["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_7["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_7["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_7 = L.marker(man_unre_6, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[6].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[6].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_7);
   
                    <?php if(!empty($ro_8)){?>
                        var AE ="<?php echo $ro_8["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_8["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_8["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_8["FUI"]; ?>";
                        var DS ="<?php echo $ro_8["DSI"]; ?>";
                        var IE ="<?php echo $ro_8["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_8["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_8["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_8["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_8 = L.marker(man_unre_7, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[7].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[7].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_8);
  
                    <?php if(!empty($ro_9)){?>
                        var AE ="<?php echo $ro_9["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_9["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_9["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_9["FUI"]; ?>";
                        var DS ="<?php echo $ro_9["DSI"]; ?>";
                        var IE ="<?php echo $ro_9["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_9["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_9["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_9["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_9 = L.marker(man_unre_8, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[8].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[8].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_9);
   
                    <?php if(!empty($ro_10)){?>
                        var AE ="<?php echo $ro_10["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_10["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_10["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_10["FUI"]; ?>";
                        var DS ="<?php echo $ro_10["DSI"]; ?>";
                        var IE ="<?php echo $ro_10["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_10["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_10["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_10["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_10 = L.marker(man_unre_9, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[9].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[9].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_10);
  
                    <?php if(!empty($ro_11)){?>
                        var AE ="<?php echo $ro_11["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_11["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_11["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_11["FUI"]; ?>";
                        var DS ="<?php echo $ro_11["DSI"]; ?>";
                        var IE ="<?php echo $ro_11["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_11["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_11["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_11["estimated_infrastructure_upgrade"]; ?>";
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
                    var Mak_11 = L.marker(man_unre_10, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[10].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[10].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_11);
   
                    <?php if(!empty($ro_12)){?>
                        var AE ="<?php echo $ro_12["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_12["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_12["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_12["FUI"]; ?>";
                        var DS ="<?php echo $ro_12["DSI"]; ?>";
                        var IE ="<?php echo $ro_12["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_12["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_12["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_12["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_12 = L.marker(man_unre_11, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[11].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[11].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_12);
  
                    <?php if(!empty($ro_13)){?>
                        var AE ="<?php echo $ro_13["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_13["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_13["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_13["FUI"]; ?>";
                        var DS ="<?php echo $ro_13["DSI"]; ?>";
                        var IE ="<?php echo $ro_13["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_13["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_13["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_13["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_13 = L.marker(man_unre_12, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[12].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[12].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_13);
  
                    <?php if(!empty($ro_14)){?>
                        var AE ="<?php echo $ro_14["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_14["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_14["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_14["FUI"]; ?>";
                        var DS ="<?php echo $ro_14["DSI"]; ?>";
                        var IE ="<?php echo $ro_14["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_14["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_14["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_14["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_14 = L.marker(man_unre_13, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[13].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[13].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_14);
                    
                    <?php if(!empty($ro_15)){?>
                        var AE ="<?php echo $ro_15["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_15["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_15["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_15["FUI"]; ?>";
                        var DS ="<?php echo $ro_15["DSI"]; ?>";
                        var IE ="<?php echo $ro_15["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_15["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_15["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_15["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_15 = L.marker(man_unre_14, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[14].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[14].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_15);
 
                    <?php if(!empty($ro_16)){?>
                        var AE ="<?php echo $ro_16["longterm_extraction_limit"]; ?>";
                        var UE ="<?php echo $ro_16["unreg_entitlement"]; ?>";
                        var MF ="<?php echo $ro_16["mean_flow"]; ?>";
                        var FU ="<?php echo $ro_16["FUI"]; ?>";
                        var DS ="<?php echo $ro_16["DSI"]; ?>";
                        var IE ="<?php echo $ro_16["irrigable_area"]; ?>";
                        var WA ="<?php echo $ro_16["wetland_area"]; ?>";
                        var RA = (UE/AE)*100;
                        var IUS ="<?php echo $ro_16["infrastructure_upgrade_schedule"]; ?>";
                        var EIU ="<?php echo $ro_16["estimated_infrastructure_upgrade"]; ?>";
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
                        
                    var Mak_16 = L.marker(man_unre_15, {icon: icon_unreg(UE/AE), water_source: Manning_unregulated.features[15].properties.WATER_SOUR}).addTo(map)
                    .bindPopup('<b>' + Manning_unregulated.features[15].properties.WATER_SOUR+ '</b><br/><br/>' 
                    + 'Longterm Extraction Limit: ' + toThousands(AE) + ' ML' + '<br/>'
                    + 'Unreg Entitlement: ' + toThousands(UE) + ' ML (' + Math.round(RA*10)/10 +' % of Longterm Extraction Limit)' + '<br/>'
                    + 'MeanFlow: ' + toThousands(MF) + ' ML/year' + '<br/>'
                    + 'FUI: ' + toThousands(Math.round(FU*100)/100) + '<br/>'
                    + 'DSI: ' + toThousands(Math.round(DS*100)/100) + '<br/>'
                    + 'Irrigable Area: ' + toThousands(IE)+ ' Ha' + '<br/>'
                    + 'Wetland Area: ' + toThousands(WA)+ ' Ha' + '<br/>'
                    + 'Population: ' + toThousands(Math.round(Population))+ '<br/>'
                    + 'Annual Production Value (Irrigation) : $' + toThousands(Math.round(Irrigation_production/1000000)) + 'M' + '<br/>'
                    + 'Annual Production Value (Mining) : $' + toThousands(Math.round(Mining_production))+ 'M' +'<br/>'
                    + 'Annual Employment Number (Irrigation) : ' + toThousands(Math.round(Irrigation_employment))+ '<br/>'
                    + 'Annual Employment Number (Mining) : ' + toThousands(Math.round(Mining_employment))+ '<br/>'
                    + 'Infrastructure Upgrade Schedule : ' + IUS+ '<br/>'
                    + 'Estimated Infrastructure Upgrade : ' + EIU
                    );
//                    markersLayer.addLayer(Mak_16);
            
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
                    
//                    controlSearch.on('search:locationfound', 
//                    function(e) {
//                        e.layer.addTo(map).openPopup();
//                    });                   
//                }
//                if (checkBox.checked === false){
//                    removeLayer(displayed_gis_layer_unregulated);
//                    map.removeControl(controlSearch);
//                    var elementToBeRemoved = document.getElementById('unreg_man');
//                    document.getElementById('legend').removeChild(elementToBeRemoved);
//                    link_to_parr_man.style.display='none';
//                }             
            }
            
               
            function show_gis_Manning_groundwater(){
                var displayed_gis_layer_groundwater = [];
//                var checkBox = document.getElementById(id); 
                var elem = document.createElement("div");
                elem.setAttribute('id', 'gw_man');
                elem.innerHTML = ('<img src="lib/leaflet/images/G.png"  width="17" height="18.2" align = "center">&nbsp; &nbsp;Groundwater<br>'+
                        '<img src="lib/leaflet/images/yellow_gw.png"  width="13" height="13" align = "center">&nbsp; &nbsp;Groundwater<br>');

                var geojsonfile = Manning_Groundwater;
//                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }                    
//                    var markersLayer = new L.LayerGroup();
//                    map.addLayer(markersLayer);
//                    controlSearch = new L.Control.Search({
//                        position:'topleft',
//                        layer: markersLayer,
//                        initial: false,
//                        zoom: 11,
//                        marker: false,
//                        propertyName: 'gwater_source',
//                        textPlaceholder: 'Search groundwater source',
//                        textErr: 'Groundwater source not found'
//                    }); 
//                    map.addControl(controlSearch);
                    
                    var Reg = L.geoJSON(geojsonfile, {
                        style: function (feature) {
                            return { color: "yellow", weight: 0.9, fillOpacity: 0.3};
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
                    //markersLayer.addLayer(Mak_1);
                    
                    var Mak_2 = L.marker(man_gw_1, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[1].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[1].properties.W_Source_1+'</b>');
                    //markersLayer.addLayer(Mak_2);
                    man_gw_2[1] = man_gw_2[1]-0.001;
                    
                    var Mak_3 = L.marker(man_gw_2, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[2].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[2].properties.W_Source_1+'</b>');
                   // markersLayer.addLayer(Mak_3);
                    
                    man_gw_3[1] = man_gw_3[1]-0.007;
                    var Mak_4 = L.marker(man_gw_3, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[3].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[3].properties.W_Source_1+'</b>');
                   // markersLayer.addLayer(Mak_4);
                    
                    man_gw_4[1] =  man_gw_4[1]+0.001;
                    var Mak_5 = L.marker(man_gw_4, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[4].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[4].properties.W_Source_1+'</b>');
                   // markersLayer.addLayer(Mak_5);
                    
                    man_gw_5[1]=man_gw_5[1]+0.04;
                    man_gw_5[0]=man_gw_5[0]-0.005;
                    var Mak_6 = L.marker(man_gw_5, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[5].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[5].properties.W_Source_1+'</b>');
                   // markersLayer.addLayer(Mak_6);
                    
                    man_gw_6[1]=man_gw_6[1]+0.005;
                    var Mak_7 = L.marker(man_gw_6, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[6].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[6].properties.W_Source_1+'</b>');
                    //markersLayer.addLayer(Mak_7);
                    
                    man_gw_7[1] = man_gw_7[1] - 0.01 ;
                    var Mak_8 = L.marker(man_gw_7, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[7].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[7].properties.W_Source_1+'</b>');
                   // markersLayer.addLayer(Mak_8);
                    
                    var Mak_9 = L.marker(man_gw_8, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[8].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[8].properties.W_Source_1+'</b>');
                   // markersLayer.addLayer(Mak_9);
                    
                    var Mak_10 = L.marker(man_gw_9, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[9].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[9].properties.W_Source_1+'</b>');
                    //markersLayer.addLayer(Mak_10);
                    
                    var Mak_11 = L.marker(man_gw_10, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[10].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[10].properties.W_Source_1+'</b>');
                   // markersLayer.addLayer(Mak_11);
                    
                    var Mak_12 = L.marker(man_gw_11, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[11].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[11].properties.W_Source_1+'</b>');
                   // markersLayer.addLayer(Mak_12);
                    
                    man_gw_12[0] = man_gw_12[0] + 0.006;
                    var Mak_13 = L.marker(man_gw_12, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[12].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[12].properties.W_Source_1+'</b>');
                    //markersLayer.addLayer(Mak_13);
                    
                    man_gw_13[1]=man_gw_13[1]+0.015;
                    var Mak_14 = L.marker(man_gw_13, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[13].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[13].properties.W_Source_1+'</b>');
                   // markersLayer.addLayer(Mak_14);
                    
                    man_gw_14[0] = man_gw_14[0]-0.02;
                    var Mak_15 = L.marker(man_gw_14, {icon: Icon_gw, gwater_source: Manning_Groundwater.features[14].properties.W_Source_1}).addTo(map)
                    .bindPopup('<b>'+Manning_Groundwater.features[14].properties.W_Source_1+'</b>');
                    //markersLayer.addLayer(Mak_15);
                    
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
                    
//                    controlSearch.on('search:locationfound', 
//                    function(e) {
//                        e.layer.addTo(map).openPopup();
//                    });
//                }
//                if (checkBox.checked === false){
//                    removeLayer(displayed_gis_layer_groundwater);
//                    map.removeControl(controlSearch);
//                    var elementToBeRemoved = document.getElementById('gw_man');
//                    document.getElementById('legend').removeChild(elementToBeRemoved);
//                }                 
            }
            
            var displayed_gis_layer_workapproval = [];                        
            function show_gis_Manning_workapprovals(id){
                var checkBox = document.getElementById(id);
                var elem = document.createElement("div");
                elem.setAttribute('id', 'lice_man');
                elem.innerHTML = ('<img src="lib/leaflet/images/li_reg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;License (regulated river)<br>'+
                        '<img src="lib/leaflet/images/li_unreg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;License (unregulated river)<br>'+
                        '<img src="lib/leaflet/images/li_gw.png"  width="13" height="22" align = "center">&nbsp; &nbsp;License (groundwater)<br>');

                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    } 
                    num_marker = number_license_man;
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
                    var elementToBeRemoved = document.getElementById('lice_man');
                    document.getElementById('legend').removeChild(elementToBeRemoved);

                }  
            }
            
            var displayed_gis_layer_approval = [];
            function show_gis_Manning_approvals(id){
                var checkBox = document.getElementById(id);
                var elem = document.createElement("div");
                elem.setAttribute('id', 'appro_man');
                elem.innerHTML = ('<img src="lib/leaflet/images/wa_reg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Work approval (regulated river)<br>'+
                        '<img src="lib/leaflet/images/wa_unreg.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Work approval (unregulated river)<br>'+
                        '<img src="lib/leaflet/images/wa_gw.png"  width="13" height="22" align = "center">&nbsp; &nbsp;Work approval (groundwater)<br>');

                if (checkBox.checked === true){
                    document.getElementById("legend").appendChild(elem);
                    if (typeof controlSearch !== 'undefined') {
                        map.removeControl(controlSearch);
                    }  
                    num_marker = number_approval_man;
                    var markerClusters = new L.MarkerClusterGroup({disableClusteringAtZoom: 13});
                    controlSearch = new L.Control.Search({
                        position:'topleft',
                        layer: markerClusters,
                        initial: false,
                        zoom: 15,
                        marker: false,
                        propertyName: 'App_id',
                        textPlaceholder: 'Search work approval ID',
                        textErr: 'Work approval not found'
                    }); 
                    map.addControl(controlSearch);
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
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_1, App_id: Approval_id})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                markerClusters.addLayer(M);                                
                                break;
                                case 'UNREG':
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_2, App_id: Approval_id})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                markerClusters.addLayer(M); 
                                break;
                                case 'GW':
                                var M = L.marker([Lat_approval, Lon_approval], {icon: Icon_approval_3, App_id: Approval_id})
                                .bindPopup("Approval ID: " + Approval_id + '<br/>'
                                + "Work Description: " + Work_description + '<br/>'
                                + "Share Component: " + toThousands(So) + " ML"); 
                                markerClusters.addLayer(M); 
                                break;
                            }
                            displayed_gis_layer_approval.push(M);
                            controlSearch.on('search:locationfound', 
                            function(e) {
                                e.layer.addTo(map).openPopup();
                            });
                        }
                    map.addLayer(markerClusters);
                    displayed_gis_layer_approval.push(markerClusters);
                    }
                }
                if (checkBox.checked === false){
                    removeLayer(displayed_gis_layer_approval);
                    map.removeControl(controlSearch);
                    var elementToBeRemoved = document.getElementById('appro_man');
                    document.getElementById('legend').removeChild(elementToBeRemoved);

                } 
            }
            // display information of each catchment
            function onEachFeature(feature, layer) {
                layer.on({
//                    mouseover: highlightFeature,
//                    mouseout: resetHighlight,
                    click: zoomToFeature
                });
            }
            
            function highlightFeature(e) {
                var layer = e.target;
                layer.setStyle({
                    weight: 5,
                    color: '#666',
                    dashArray: '',
                    fillOpacity: 0.15
                });
                if (!L.Browser.ie && !L.Browser.opera) {
                    layer.bringToFront();
                }
                hover_info.update(layer.feature.properties);
            }
            
            function highlightFeature_unreg(e) {
                    var layer = e.target;
                    if (layer._layers) {
                            layer.eachLayer(function (myLayer) {
                                    myLayer.setStyle({
                                            weight: myLayer.options ? (myLayer.options.opacity > 0 ? 4 : 0) : 0,
                                            color: '#666',
                                            dashArray: ''
                                    });
                            });
                    } else {
                            layer.setStyle({
                                    weight: layer.options ? (layer.options.opacity > 0 ? 4 : 0) : 0,
                                    color: '#666',
                                    dashArray: ''
                            });
                    }
                    if (!L.Browser.ie && !L.Browser.opera) {
                           //layer.bringToFront();
                    }
            }
            
            function resetHighlight(e) {
                CAT.resetStyle(e.target || e);
                hover_info.update();
            }
            
            function resetHighlight_unreg(e) {
                Unreg.resetStyle(e.target || e);
            }
            
            function zoomToFeature(e) { 
                if (e.target.feature.properties.MAJOR_CATC === "MACQUARIE"){
                    map.setView([-31.8, 148.5], 8);
                }if (e.target.feature.properties.MAJOR_CATC === "MANNING RIVER"){
                    map.setView([-31.75, 151.9],10);
                }
            }
            
            var hover_info = L.control();
            hover_info.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'hover_info');
                this.update();
                return this._div;
            };
                     
            hover_info.update = function (props) {
                <?php if(!empty($row)){?>;
                    var catch_name = "<?php echo $_GET['catchment_name']; ?>";  
                    var overall_fui = "<?php echo $row["overall_fui"]; ?>";
                    var overall_idsi = "<?php echo $row["overall_idsi"]; ?>";
                    var overall_fmi = "<?php echo $row["overall_fmi"]; ?>";
                    var overall_dei = "<?php echo $row["overall_dei"]; ?>";
                    this._div.innerHTML = (
//                        props?
//                        '<h5>' + catch_name + ' Catchment' + '</h5>' + 
//                        'Overall Flow Utilisation: '+ overall_fui + '<br/>' +
//                        'Overall Irrigation Drought Security: '+ overall_idsi + '<br />'+
//                        'Overall Flood Management: '+ overall_fmi + '<br />'+
//                        'Overall Delivery Efficiency: '+ overall_dei + '<br />'+
//                        'Szie of Surface Water: ' + surface_water_size + '<br />'+
//                        'Size of Groundwater: ' + groundwater_size + '<br />'
                        '<b>' + catch_name + ' Catchment' + '</b><br/><br/>' + 
                        '<p style=\"line-height:50%\"><img src=\"images/'+index_level(overall_fui,"fui")+'\" height=\"25\" width=\"25\"> <b>'+'&nbsp;&nbsp;'+ Math.round(overall_fui*100)/100 + '</b><br/><br/>' +
                        '<img src=\"images/'+index_level(overall_idsi,"idsi")+'\" height=\"25\" width=\"25\"> <b>'+'&nbsp;&nbsp;'+ Math.round(overall_idsi*100)/100 + '</b><br/><br/>'+
                        '<img src=\"images/'+index_level(overall_fmi,"fmi")+'\" height=\"25\" width=\"25\"> <b>'+'&nbsp;&nbsp;'+ Math.round(overall_fmi*100)/100 + '</b><br/><br/>'+
                        '<img src=\"images/'+index_level(overall_dei,"dei")+'\" height=\"25\" width=\"25\"> <b>'+'&nbsp;&nbsp;'+ Math.round(overall_dei*100)/100 + '</b>'+'</p>'
//                        : '<b>' + '&nbsp;&nbsp;&nbsp;&nbsp;Hover over a catchment' + '</b>'
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
            
            // add the lenged
            function Add_legend(){
                legendinfo = L.control({position: 'bottomright'});
                legendinfo.onAdd = function (map) {
                    var div = L.DomUtil.create('div', 'info legend');
                    div.innerHTML= '<div style=\"background-color:white;border-radius:10px;\"><canvas id=\"bar-pic\" width=200 height=180></canvas></div>';
                    return div;
                };
                legendinfo.addTo(map);

                Chart.defaults.global.title.display = false;
                Chart.defaults.global.legend.display = false;
                var popCanvas = document.getElementById("bar-pic").getContext("2d");
                var bg_color = new Array();
                var data = [];
                <?php if(!empty($row)){?>;
                    data = [<?php echo $row["overall_fui"]; ?>, <?php echo $row["overall_idsi"]; ?>, <?php echo $row["overall_fmi"]; ?>, <?php echo $row["overall_dei"]; ?>];
                <?php }?>;
                for(i = 0; i < 3; i++) {
                    if(data[i] <= 0.25){
                        bg_color.push("#ff3333");
                    }else if(data[i] <= 0.4){
                        bg_color.push("#ff8533");
                    }else{
                        bg_color.push("#33ff33");
                    }
                }
                if(data[3] <= 0.7){
                    bg_color.push("#ff3333");
                }else if(data[3] <= 0.8){
                    bg_color.push("#ff8533");
                }else{
                    bg_color.push("#33ff33");
                }
    //            bg_color.push("rgba(50, 255, 70, 1)");
    //            bg_color.push("rgba(255, 159, 64, 1)");

                var barChart = new Chart(popCanvas, {
                    type: 'bar',
                    data: {
    //                    labels: ["FUI", "IDSI", "FMI", "DEI", "Surface", "Ground"],
                        labels: ["FUI", "IDSI", "FMI", "DEI"],
                        datasets: [{
                          label: '',
                          data: data,
                          backgroundColor: bg_color
                        }]
                    },
                    options:{
                        scales: {
                          yAxes: [{
                                display: false,
                                gridLines: {
                                  display: false
                                }
                          }],
                          xAxes: [{
                                gridLines: {
                                  display: false
                                },
                                textStyle:{color: '#FFF'}
                          }]
                        }
                    }
                });
            }
            setTimeout(function(){ map.invalidateSize()}, 1000);
            //Edited by justice       
        </script>
    </body>
</html>
