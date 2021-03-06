<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Irrigation Data Insight of Macquarie</title>
        <?php include("Common_Script_Import.html"); ?>
        <!--Parallel Coordinates-->
        <!-- d3 -->
        <script type="text/javascript" src="lib/d3/d3.min.js"></script>
        <script type="text/javascript" src="lib/d3/d3.csv.min.js"></script>
        <script type="text/javascript" src="lib/d3/d3.parcoords.js"></script>

        <!-- other libs -->
        <script type="text/javascript" src="lib/jquery.js"></script>
        <script type="text/javascript" src="lib/underscore.js"></script>

        <!-- nsw map -->
        <script src="border/MacquarieBogan_watersource_centroids.geojson"></script>

        <!-- SlickGrid -->
        <script type="text/javascript" src="lib/slickgrid/jquery.event.drag-2.0.min.js"></script>
        <script type="text/javascript" src="lib/slickgrid/slick.core.js"></script>
        <script type="text/javascript" src="lib/slickgrid/slick.grid.js"></script>
        <script type="text/javascript" src="lib/slickgrid/slick.dataview.js"></script>

        <!-- StyleSheet -->
        <link rel="stylesheet" href="lib/slickgrid/slick.grid.css" type="text/css" />
        <link rel="stylesheet" href="lib/d3/d3.parcoords.css" type="text/css" >
        <!--<link rel="stylesheet" href="lib/style.css" type="text/css" charset="utf-8" />-->
        
        <style>
            .row{
                width: 6000px;
                height: 100%;
            }           
            #paracoord {
                position: relative;
                width: 100%;
                height: 740px;
	    }
            #grid {
                position: relative;
                width: 100%;
                height: 750px;
                line-height: 130%;
	    }
            .slick-row:hover {
                font-weight: 1500;
                color: #069;
            }
            .slick-header-column.ui-state-default {
                background:none ;
                background-color: #505050 ;
                color: #eeeeee;  
                border: none;  
                padding: 0;
                text-shadow: none;
                font-family: Arial, Verdana, Helvetica, sans-serif;
                font-size: 13px;
                font-weight: bold;
                height: 40px;
                line-height: 40px;    
            }
            .info {
                background: white;
                position: relative;
                padding-top: 5px;
                padding-right: 10px;
                padding-left: 10px;
                padding-bottom: 5px;
                font-family: "微软雅黑";
                font-size: 13px;
                color: black;
                padding: 10px;
                line-height:135%;
                z-index: 30;
                border-radius: 5px;
                box-shadow: 0 0 15px rgba(0,0,0,0.2);
            }
            .info h4 {
                margin: 0 0 5px;
                font-family: "微软雅黑";
                font-size: 13px;
                font-weight: bold;
            }
            .legend {
                text-align: left;
                line-height: 18px;
                color: #555;
            }
            .legend i {
                width: 50px;
                height: 15px;
                float: left;
                margin-right: 10px;
                opacity: 0.6;
            }
            .my-leaflet-div-icon {
                color: #DDD;
                width: auto;
                text-shadow:
                        -1px -1px 1px black,
                        1px -1px 1px black,
                        -1px  1px 1px black,
                        1px  1px 1px black;
            }
            .stations, .stations svg {
                position: absolute;
            }

            .stations svg {
                width: 80px;
                height: 80px;
                padding-right: 100px;
                font: 10px sans-serif;
            }
                .title {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        background-color: #ffffff;
        border-color: #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 4px 0px 0;
        color: inherit;
        margin-bottom: 0;
        padding: 14px 15px 7px;
        height: 48px;
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
			<div class="box-container" style="width:22%;" id="map_panel">
				<div class="box">
					<div class="box-title">
                                            <div id="s0_title">
<!--						<h4><b>Water Source of Macquarie Catchment</b></h4>-->
                                            </div>
					</div>
					<div class="box-content" role="tabpanel">
						<div id="map"></div>
					</div>
                                        <div id="Ck_box_para_macquarie">
                                            <input type="checkbox" id="s2" onclick="show_s2('s2')"> <font size="2">Scenario 1 </font></br>
                                            <input type="checkbox" id="s6" onclick="show_s6('s6')"> <font size="2">Scenario 2 </font>
                                        </div>        
                                </div>
			</div>
			<div class="box-container" style="width:46.5%;">
                                <div class="box">
                                        <div class="box-title">
                                                <h4><b>Parallel Coordinates</b></h4>                                                
                                        </div>
                                        <div id="parcoord_1" class="parcoords"></div>
                                        <div id="parcoord_2" class="parcoords"></div>
                                </div>

			</div>
			<div class="box-container" style="width:31.5%;">
                                <div class="box">
                                        <div class="box-title">
                                                <h4><b>Water Source List</b></h4>                                               
                                        </div>  
                                        <div id="grid" class="box-content"></div>
                                </div>

			</div>                   
		</div>
	</div>
        <div class="se-pre-con"></div>
        
        <script type="text/javascript">
            
            // Show preloader
            $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");;
            });
            document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Water Source of Macquarie Catchment'+'</span>';
            
            var removeLayer = function (feature) {
                for (var i = 0; i < feature.length; i++){     
                    map.removeLayer(feature[i]);
                }               
            };
            
            /*Functions section*/
            function showIt(d) {
                    return d > -1 ? 0.75 : 0;
            }

            function resetHighlight(e) {
                    geojson.resetStyle(e.target);
                    //info.update();
            }

            function zoomToFeature(e) {
                    var layer = e.target;
                    info.update(layer.feature.properties);
                    //map.fitBounds(e.target.getBounds());
            }

            function onEachFeature(feature, layer) {
                    layer.on({
                            mouseover: highlightFeature,
                            mouseout: resetHighlight,
                            click: zoomToFeature
                    });
            }

            function highlightFeature(e) {
                    var layer = e.target;
                    if (layer._layers) {
                            console.log(layer);
                            layer.eachLayer(function (myLayer) {
                                    console.log(myLayer);
                                    myLayer.setStyle({
                                            weight: myLayer.options ? (myLayer.options.opacity > 0 ? 3 : 0) : 0,
                                            color: '#666',
                                            dashArray: '',
                                    });
                            });
                    } else {
                            layer.setStyle({
                                    weight: layer.options ? (layer.options.opacity > 0 ? 3 : 0) : 0,
                                    color: '#666',
                                    dashArray: '',
                            });
                    }

                    if (!L.Browser.ie && !L.Browser.opera) {
                            layer.bringToFront();
                    }

                    //info.update(layer.feature.properties);
            }
            /*Function section*/
            
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

            /*overall variables*/
            var myCols = [
                    '#ff3333',//Red
                    '#ff8533',//Orange
                    '#33ff33'//Green
            ];


            var lgas = MacquarieBogan_unregulated;
            var padding = 35;
            var layer, overlay;
            var filtered;
            var isSelected = false;
            var lga = new Array();
            /*overall variables*/
                        
            var map = L.map('map',{zoomControl: false}).setView([-29.0, 134.7], 4.4);
            L.control.zoom({
                position:'bottomleft'
            }).addTo(map);
            
            var myToken = 'pk.eyJ1IjoiZHlobCIsImEiOiJjaWtubG5uMWYwc3BmdWNqN2hlMzFsNDhvIn0.027tda69GVKbxiPnkEBDAw';
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + myToken, {
                    maxZoom: 18,
                    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                            '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                            'Imagery © <a href="http://mapbox.com">Mapbox</a>',
                    id: 'mapbox.outdoors'
            }).addTo(map);
            
            var Mac_unregulated = L.geoJSON(lgas, {
                onEachFeature: function onEach(feature, layer){
                    layer.setStyle({color: 'grey', weight: 1.2, fillOpacity: 0.1});
                }
            }).addTo(map);  
            
//            map.fitBounds(Mac_unregulated.getBounds());
            map.setView([-31.8, 148.5], 8);                            
            
            displayed_s2 = [];
            function show_s2(id){
                    function getColorScalar(d) {
                        if(d<=Math.floor(max_row/3)){
                        return myCols[0];
                        }else if(d<=Math.ceil(2*max_row/3)){
                        return myCols[1];
                        }else{
                        return myCols[2];
                        }
                    }
                    function style(feature) {
                            return {
                                    weight: 1,
                                    opacity: showIt(1),
                                    color: 'white',
                                    dashArray: '3',
                                    fillOpacity: 0.8 * showIt(feature.properties.FUI),
                                    fillColor: getColorScalar(feature.properties.IndexRank)
                            };
                    }
                    var max_row=0;//Get the row number of ranking file
                    d3.csv("data/FUI_irrigation_area_potential_mac.csv", function (data) {
                        _.each(data, function (d, i) {
                        max_row++;
                        });
                    });
                    
                    var checkBox = document.getElementById(id); 
                    if (checkBox.checked === true){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Water Source of Macquarie Catchment--Opportunity for irrigation'+'</span>';
                    parcoord_1.style.display = 'block';
                    grid.style.display = 'block';
                    // control that shows state info on hover
                    info = L.control({position: 'topright'});
                    info.onAdd = function (map) {
                            this._div = L.DomUtil.create('div', 'info');
                            this.update();
                            return this._div;
                    };
                    info.update = function (props) {
                            this._div.innerHTML = (props?
                                    '<h4>' + props.WATER_SOUR + '</h4>'+
                                            'Irrigated Area: '+ '<b>' + toThousands(Math.round(props.irrigated_area*10)/10) + ' Ha' + '</b>' + '<br />'+
                                            'Population: '+ '<b>' + toThousands(props.population) +'</b>'+'<br />'+
                                            'Irrigation Value: '+ '<b>'+ Math.round(toThousands(props.irrigation_value/1000000)*100)/100+' $M' + '</b>'+'<br />'+
//                                            'Mining Value: '+ '<b>' + toThousands(props.mining_value) + ' $M'+'</b>'+'<br />'+
                                            'Employment Irrigation: '+ '<b>'+toThousands(props.employment_irrigation) +'</b>'+'<br />'+
//                                            'Employment Mining: '+ '<b>'+ toThousands(props.employment_mining) +'</b>'+'<br />'+
                                            'Total Entitlement: '+ '<b>'+ toThousands(props.total_entitlement) +' ML/year'+ '</b>' +'<br />'+
//                                            'Wetland Area: '+ '<b>'+ toThousands(Math.round(props.wetland_area*10)/10) + ' Ha'+'</b>' +'<br />'+
//                                            'Dissolved Oxygen: '+ '<b>'+ toThousands(props.dissolved_oxygen) + '% mg/L'+'</b>' +'<br />'+
                                            'Mean Flow: '+ '<b>'+ toThousands(props.mean_flow) + ' ML/day'+'</b>' +'<br />'+
//                                            'Variation: '+ '<b>'+ toThousands(props.variation) + '</b>' +'<br />'+
//                                            'Median: '+ '<b>'+ toThousands(props.median) + ' ML/year'+'</b>' +'<br />'+
//                                            'Days Below Mean: '+ '<b>'+ toThousands(props.days_below_mean) + '</b>' +'<br />'+
                                            'DSI: '+ '<b>'+ Math.round(props.DSI/100*100)/100 + '</b>'+'<br />'+
//                                            '100 Years Flood Frequency: '+ '<b>'+ toThousands(props.one_hundred_yrs_flood_frequency) + '</b>'+'<br />'+
//                                            'Time Below Requirement: '+ '<b>'+ toThousands(props.time_below_requirement) + '</b>'+'<br />'+
                                            'FUI: '+ '<b>'+ Math.round(props.FUI/100*100)/100 + '</b>'+'<br />'+
//                                            'Water Scarcity: '+ '<b>'+ toThousands(props.water_scarcity) + '</b>'+'<br />'+
                                            'Irrigation Opportunity Index: ' + '<b>'+ Math.round(props.FUI_irrigation_area_potential*100)/100 + '</b>'+'<br />'
                                    : '<b>'+ 'Click a Water Source'+'</b>');
                    };
                    info.addTo(map);

                    var lgaDict = {};
//                    var geojson, geojsonLabels;
                    // initialise each property for of geojson
                    for (j = 0; j < lgas.features.length; j++) {
                            lgas.features[j].properties.irrigated_area=0;
                            lgas.features[j].properties.population=0;
                            lgas.features[j].properties.irrigation_value=0;
                            lgas.features[j].properties.mining_value=0;
                            lgas.features[j].properties.employment_irrigation=0;
                            lgas.features[j].properties.employment_mining=0;
                            lgas.features[j].properties.total_entitlement=0;	
                            lgas.features[j].properties.agricultural_water_use=0;
                            lgas.features[j].properties.mining_water_use=0;
                            lgas.features[j].properties.wetland_area=0;
                            lgas.features[j].properties.dissolved_oxygen=0;
                            lgas.features[j].properties.mean_flow=0;
                            lgas.features[j].properties.variation=0;
                            lgas.features[j].properties.median=0;
                            lgas.features[j].properties.days_below_mean=0;
                            lgas.features[j].properties.DSI=0;
                            lgas.features[j].properties.one_hundred_yrs_flood_frequency=0;
                            lgas.features[j].properties.time_below_requirement=0;
                            lgas.features[j].properties.FUI=0;
                            lgas.features[j].properties.water_scarcity=0;
                            lgas.features[j].properties.FUI_irrigation_area_potential=0;
                            lgas.features[j].properties.IndexRank=0;
                            lgaDict[lgas.features[j].properties.WATER_SOUR] = lgas.features[j];
                    }

                    // Create parallel Coordinate
                    parcoords = d3.parcoords()("#parcoord_1")
                            .alpha(1)
                            .mode("queue") // progressive rendering
                            .height(760)
                            .width(2800)
                            .margin({
                                    top: 25,
                                    left: 1,
                                    right: 1,
                                    bottom: 15
                            })
                            .color(function (d) { return getColorScalar(d.IndexRank) });


                    //Read data for parallel coordinate
                    d3.csv("data/FUI_irrigation_area_potential_mac.csv", function (data) {
                        var keys = Object.keys(data[0]);
                            _.each(data, function (d, i) {
                                    d.index = d.index || i; //unique id
                                    var water_source_name = d[keys[0]];
                                    lgaDict[water_source_name].properties.irrigated_area=d[keys[1]];
                                    lgaDict[water_source_name].properties.population=d[keys[2]];
                                    lgaDict[water_source_name].properties.irrigation_value=d[keys[3]];
                                    lgaDict[water_source_name].properties.mining_value=d[keys[4]];
                                    lgaDict[water_source_name].properties.employment_irrigation=d[keys[5]];
                                    lgaDict[water_source_name].properties.employment_mining=d[keys[6]];
                                    lgaDict[water_source_name].properties.total_entitlement=d[keys[7]];
                                    lgaDict[water_source_name].properties.agricultural_water_use=d[keys[8]];
                                    lgaDict[water_source_name].properties.mining_water_use=d[keys[9]];
                                    lgaDict[water_source_name].properties.wetland_area=d[keys[10]];
                                    lgaDict[water_source_name].properties.dissolved_oxygen=d[keys[11]];
                                    lgaDict[water_source_name].properties.mean_flow=d[keys[12]];
                                    lgaDict[water_source_name].properties.variation=d[keys[13]];
                                    lgaDict[water_source_name].properties.median=d[keys[14]];
                                    lgaDict[water_source_name].properties.days_below_mean=d[keys[15]];
                                    lgaDict[water_source_name].properties.DSI=d[keys[16]];
                                    lgaDict[water_source_name].properties.one_hundred_yrs_flood_frequency=parseFloat(d[keys[17]]);
                                    lgaDict[water_source_name].properties.time_below_requirement=d[keys[18]];
                                    lgaDict[water_source_name].properties.FUI=d[keys[19]];
                                    lgaDict[water_source_name].properties.water_scarcity=d[keys[20]];
                                    lgaDict[water_source_name].properties.FUI_irrigation_area_potential=d[keys[21]];
                                    lgaDict[water_source_name].properties.IndexRank=d[keys[22]];
                                    lga.push(water_source_name);
                            });

                            // add lga layer
                            geojson = L.geoJson(lgas, {
                                    style: style,                            
                                    onEachFeature: onEachFeature
                            }).addTo(map);

                            // add label layer
                            geojsonLabels = L.geoJson(lgaCentroids, {
                                    pointToLayer: function (feature, latlng) {
                                            return  L.marker(latlng, {
                                                    clickable : false,
                                                    draggable : false,
                                                    icon: L.divIcon({
                                                    className: 'my-leaflet-div-icon',
                                                    })
                                            });
                                    },
                            }).addTo(map);
                            displayed_s2.push(geojson);
                            displayed_s2.push(geojsonLabels);                         

                            // add legend
                            legend = L.control({position: 'bottomright'});
                            legend.onAdd = function (map) {
                                    var div = L.DomUtil.create('div', 'info legend'),
                                    labels = [],
                                    from, to;
                                    labels.push(
                                                    '<i style="background:' + myCols[0] + '"></i> ' +
                                                    1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                    labels.push(
                                                    '<i style="background:' + myCols[1] + '"></i> ' +
                                                    2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                                    labels.push(
                                                    '<i style="background:' + myCols[2] + '"></i> ' +
                                                    3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                    div.innerHTML = '<h4>Index Rank</h4>' + labels.join('<br>');
                                    return div;
                            };
                            legend.addTo(map);

                            //Bind data to parallel coordinate
                            parcoords.data(data)
                                            .hideAxis(["Water source","index"])
                                            .render()
                                            .reorderable()
                                            .brushMode("1D-axes")
                                            .rate(400);

                            // setting up grid
                            var column_keys = d3.keys(data[0]);
                            var columns = column_keys.map(function(key,i) {
                                    return {
                                            id: key,
                                            name: key,
                                            field: key,
                                            sortable: true}
                            });

                            var options = {
                                    enableCellNavigation: true,
                                    enableColumnReorder: false,
                                    multiColumnSort: false,
                            };

                            var dataView = new Slick.Data.DataView();
                            var grid = new Slick.Grid("#grid", dataView, columns, options);

                            grid.autosizeColumns();

                            // wire up model events to drive the grid
                            dataView.onRowCountChanged.subscribe(function (e, args) {
                                    grid.updateRowCount();
                                    grid.render();
                            });

                            dataView.onRowsChanged.subscribe(function (e, args) {
                                    grid.invalidateRows(args.rows);
                                    grid.render();
                            });

                            // column sorting
                            var sortcol = column_keys[0];
                            var sortdir = 1;

                            function comparer(a, b) {
                                    var x = a[sortcol], y = b[sortcol];
                                    return (x == y ? 0 : (x > y ? 1 : -1));
                            }

                            // click header to sort grid column
                            grid.onSort.subscribe(function (e, args) {
                                    sortdir = args.sortAsc ? 1 : -1;
                                    sortcol = args.sortCol.field;

                                    if ($.browser.msie && $.browser.version <= 8) {
                                            dataView.fastSort(sortcol, args.sortAsc);
                                    } else {
                                            dataView.sort(comparer, args.sortAsc);
                                    }
                            });

                            // highlight row in chart
                            grid.onMouseEnter.subscribe(function(e,args) {
                                    var i = grid.getCellFromEvent(e).row;
                                    var d = parcoords.brushed() || data;
                                    parcoords.highlight([d[i]]);
                            });

                            grid.onMouseLeave.subscribe(function(e,args) {
                                    parcoords.unhighlight();
                            });

                            // fill grid with data
                            gridUpdate(data);

                            // update grid on brush
                            parcoords.on("brush", function (d) {
                                    filtered = d;
                                    isSelected = true;
                                    gridUpdate(d);
                                    //update map
                                    lgas.features.map(function (d) {d.properties.FUI = -1; });
                                    geojsonLabels.getLayers().map(function (d) { d._icon.innerHTML = ""; })
                                    _.each(d, function (k, i) {
                                            lgaDict[k[keys[0]]].properties.FUI = k.FUI;
                                    });

                                    map.removeControl(legend);
                                    legend.addTo(map);
                                    refreshMap(lga);
                            });


                            function gridUpdate(data) {
                                    dataView.beginUpdate();
                                    dataView.setItems(data);
                                    dataView.endUpdate();
                            };

                            function refreshMap(updatedLGA) {
                                    // go through updateLGA, or edit the values directly in the geojson layers
                                    geojson.getLayers().map(function (d) {
                                            geojson.resetStyle(d);
                                            geojsonLabels.getLayers().forEach(function (z) {
                                                    if (z.feature.properties.name == d.feature.properties.WATER_SOUR) {
                                                            if (d.feature.properties.FUI > 0) {
                                                                    z._icon.innerHTML=Math.round(d.feature.properties.FUI/100*100)/100;
                                                            } else {
                                                                    z._icon.innerHTML = "";
                                                            }
                                                    }
                                            });
                                    })
                            }
                    });
                }
                if (checkBox.checked === false){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Water Source of Macquarie Catchment'+'</span>';
                    parcoord_1.style.display = 'none';
                    grid.style.display = 'none';
                    map.removeControl(info);
                    map.removeControl(legend);
                    removeLayer(displayed_s2);
                    
                }
            }
            
            displayed_s6 = [];
            function show_s6(id){
                    function getColorScalar(d) {
                        if(d<=Math.floor(max_row/3)){
                        return myCols[2];
                        }else if(d<=Math.ceil(2*max_row/3)){
                        return myCols[1];
                        }else{
                        return myCols[0];
                        }
                    }
                    function style(feature) {
                            return {
                                    weight: 1,
                                    opacity: showIt(1),
                                    color: 'white',
                                    dashArray: '3',
                                    fillOpacity: 0.8 * showIt(feature.properties.FUI),
                                    fillColor: getColorScalar(feature.properties.IndexRank)
                            };
                    }
                    var max_row=0;//Get the row number of ranking file
                    d3.csv("data/days_below_mean_agriculture_production_mac.csv", function (data) {
                        _.each(data, function (d, i) {
                        max_row++;
                        });
                    });
                    
                    var checkBox = document.getElementById(id); 
                    if (checkBox.checked === true){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Water Source of Macquarie Catchment--Risk to agriculture due to variation in supply availability'+'</span>';
                    parcoord_2.style.display = 'block';
                    grid.style.display = 'block';
                    // control that shows state info on hover
                    info = L.control({position: 'topright'});
                    info.onAdd = function (map) {
                            this._div = L.DomUtil.create('div', 'info');
                            this.update();
                            return this._div;
                    };
                    info.update = function (props) {
                            this._div.innerHTML = (props?
                                    '<h4>' + props.WATER_SOUR + '</h4>'+
//                                            'Irrigated Area: '+ '<b>' + toThousands(Math.round(props.irrigated_area*10)/10) + ' Ha' + '</b>' + '<br />'+
//                                            'Population: '+ '<b>' + toThousands(props.population) +'</b>'+'<br />'+
//                                            'Irrigation Value: '+ '<b>'+ Math.round(toThousands(props.irrigation_value/1000000)*100)/100+' $M' + '</b>'+'<br />'+
//                                            'Mining Value: '+ '<b>' + toThousands(props.mining_value) + ' $M'+'</b>'+'<br />'+
//                                            'Employment Irrigation: '+ '<b>'+toThousands(props.employment_irrigation) +'</b>'+'<br />'+
//                                            'Employment Mining: '+ '<b>'+ toThousands(props.employment_mining) +'</b>'+'<br />'+
                                            'Total Entitlement: '+ '<b>'+ toThousands(props.total_entitlement) + '</b>' +'<br />'+
//                                            'Wetland Area: '+ '<b>'+ toThousands(Math.round(props.wetland_area*10)/10) + ' Ha'+'</b>' +'<br />'+
//                                            'Dissolved Oxygen: '+ '<b>'+ toThousands(props.dissolved_oxygen)+'% mg/L' + '</b>' +'<br />'+
                                            'Mean Flow: '+ '<b>'+ toThousands(props.mean_flow) + ' ML/year'+'</b>' +'<br />'+
//                                            'Variation: '+ '<b>'+ toThousands(props.variation) + '</b>' +'<br />'+
//                                            'Median: '+ '<b>'+ toThousands(props.median) + ' ML/year'+'</b>' +'<br />'+
                                            'Days Below Mean: '+ '<b>'+ toThousands(props.days_below_mean) + '</b>' +'<br />'+
//                                            'DSI: '+ '<b>'+ Math.round(props.DSI/100*100)/100 + '</b>'+'<br />'+
//                                            '100 Years Flood Frequency: '+ '<b>'+ toThousands(props.one_hundred_yrs_flood_frequency) + '</b>'+'<br />'+
//                                            'Time Below Requirement: '+ '<b>'+ toThousands(props.time_below_requirement) + '</b>'+'<br />'+
//                                            'FUI: '+ '<b>'+ Math.round(props.FUI/100*100)/100 + '</b>'+'<br />'+
//                                            'Water Scarcity: '+ '<b>'+ toThousands(props.water_scarcity) + '</b>'+'<br />'+
                                            'Risk to Argiculture Index: ' + '<b>'+ Math.round(props.days_below_mean_agriculture_production*100)/100 + '</b>'+'<br />'
                                    : '<b>'+ 'Click a Water Source'+'</b>');
                    };
                    info.addTo(map);

                    var lgaDict = {};
//                    var geojson, geojsonLabels;
                    // initialise each property for of geojson
                    for (j = 0; j < lgas.features.length; j++) {
                            lgas.features[j].properties.irrigated_area=0;
                            lgas.features[j].properties.population=0;
                            lgas.features[j].properties.irrigation_value=0;
                            lgas.features[j].properties.mining_value=0;
                            lgas.features[j].properties.employment_irrigation=0;
                            lgas.features[j].properties.employment_mining=0;
                            lgas.features[j].properties.total_entitlement=0;
                            lgas.features[j].properties.agricultural_water_use=0;
                            lgas.features[j].properties.mining_water_use=0;
                            lgas.features[j].properties.wetland_area=0;
                            lgas.features[j].properties.dissolved_oxygen=0;
                            lgas.features[j].properties.mean_flow=0;
                            lgas.features[j].properties.variation=0;
                            lgas.features[j].properties.median=0;
                            lgas.features[j].properties.days_below_mean=0;
                            lgas.features[j].properties.DSI=0;
                            lgas.features[j].properties.one_hundred_yrs_flood_frequency=0;
                            lgas.features[j].properties.time_below_requirement=0;
                            lgas.features[j].properties.FUI=0;
                            lgas.features[j].properties.water_scarcity=0;
                            lgas.features[j].properties.days_below_mean_agriculture_production=0;
                            lgas.features[j].properties.IndexRank=0;
                            lgaDict[lgas.features[j].properties.WATER_SOUR] = lgas.features[j];
                    }

                    // Create parallel Coordinate
                    parcoords = d3.parcoords()("#parcoord_2")
                            .alpha(1)
                            .mode("queue") // progressive rendering
                            .height(760)
                            .width(2800)
                            .margin({
                                    top: 25,
                                    left: 1,
                                    right: 1,
                                    bottom: 15
                            })
                            .color(function (d) { return getColorScalar(d.IndexRank) });


                    //Read data for parallel coordinate
                    d3.csv("data/days_below_mean_agriculture_production_mac.csv", function (data) {
                        var keys = Object.keys(data[0]);
                            _.each(data, function (d, i) {
                                    d.index = d.index || i; //unique id
                                    var water_source_name = d[keys[0]];
                                    lgaDict[water_source_name].properties.irrigated_area=d[keys[1]];
                                    lgaDict[water_source_name].properties.population=d[keys[2]];
                                    lgaDict[water_source_name].properties.irrigation_value=d[keys[3]];
                                    lgaDict[water_source_name].properties.mining_value=d[keys[4]];
                                    lgaDict[water_source_name].properties.employment_irrigation=d[keys[5]];
                                    lgaDict[water_source_name].properties.employment_mining=d[keys[6]];
                                    lgaDict[water_source_name].properties.total_entitlement=d[keys[7]];
                                    lgaDict[water_source_name].properties.agricultural_water_use=d[keys[8]];
                                    lgaDict[water_source_name].properties.mining_water_use=d[keys[9]];
                                    lgaDict[water_source_name].properties.wetland_area=d[keys[10]];
                                    lgaDict[water_source_name].properties.dissolved_oxygen=d[keys[11]];
                                    lgaDict[water_source_name].properties.mean_flow=d[keys[12]];
                                    lgaDict[water_source_name].properties.variation=d[keys[13]];
                                    lgaDict[water_source_name].properties.median=d[keys[14]];
                                    lgaDict[water_source_name].properties.days_below_mean=d[keys[15]];
                                    lgaDict[water_source_name].properties.DSI=d[keys[16]];
                                    lgaDict[water_source_name].properties.one_hundred_yrs_flood_frequency=parseFloat(d[keys[17]]);
                                    lgaDict[water_source_name].properties.time_below_requirement=d[keys[18]];
                                    lgaDict[water_source_name].properties.FUI=d[keys[19]];
                                    lgaDict[water_source_name].properties.water_scarcity=d[keys[20]];
                                    lgaDict[water_source_name].properties.days_below_mean_agriculture_production=d[keys[21]];
                                    lgaDict[water_source_name].properties.IndexRank=d[keys[22]];
                                    lga.push(water_source_name);
                            });

                            // add lga layer
                            geojson = L.geoJson(lgas, {
                                    style: style,                            
                                    onEachFeature: onEachFeature
                            }).addTo(map);

                            // add label layer
                            geojsonLabels = L.geoJson(lgaCentroids, {
                                    pointToLayer: function (feature, latlng) {
                                            return  L.marker(latlng, {
                                                    clickable : false,
                                                    draggable : false,
                                                    icon: L.divIcon({
                                                    className: 'my-leaflet-div-icon',
                                                    })
                                            });
                                    },
                            }).addTo(map);
                            displayed_s6.push(geojson);
                            displayed_s6.push(geojsonLabels);                         

                            // add legend
                            legend = L.control({position: 'bottomright'});
                            legend.onAdd = function (map) {
                                    var div = L.DomUtil.create('div', 'info legend'),
                                    labels = [],
                                    from, to;
                                    labels.push(
                                                    '<i style="background:' + myCols[0] + '"></i> ' +
                                                    1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                                    labels.push(
                                                    '<i style="background:' + myCols[1] + '"></i> ' +
                                                    2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                                    labels.push(
                                                    '<i style="background:' + myCols[2] + '"></i> ' +
                                                    3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                                    div.innerHTML = '<h4>Index Rank</h4>' + labels.join('<br>');
                                    return div;
                            };
                            legend.addTo(map);

                            //Bind data to parallel coordinate
                            parcoords.data(data)
                                            .hideAxis(["Water source","index"])
                                            .render()
                                            .reorderable()
                                            .brushMode("1D-axes")
                                            .rate(400);

                            // setting up grid
                            var column_keys = d3.keys(data[0]);
                            var columns = column_keys.map(function(key,i) {
                                    return {
                                            id: key,
                                            name: key,
                                            field: key,
                                            sortable: true}
                            });

                            var options = {
                                    enableCellNavigation: true,
                                    enableColumnReorder: false,
                                    multiColumnSort: false,
                            };

                            var dataView = new Slick.Data.DataView();
                            var grid = new Slick.Grid("#grid", dataView, columns, options);

                            grid.autosizeColumns();

                            // wire up model events to drive the grid
                            dataView.onRowCountChanged.subscribe(function (e, args) {
                                    grid.updateRowCount();
                                    grid.render();
                            });

                            dataView.onRowsChanged.subscribe(function (e, args) {
                                    grid.invalidateRows(args.rows);
                                    grid.render();
                            });

                            // column sorting
                            var sortcol = column_keys[0];
                            var sortdir = 1;

                            function comparer(a, b) {
                                    var x = a[sortcol], y = b[sortcol];
                                    return (x == y ? 0 : (x > y ? 1 : -1));
                            }

                            // click header to sort grid column
                            grid.onSort.subscribe(function (e, args) {
                                    sortdir = args.sortAsc ? 1 : -1;
                                    sortcol = args.sortCol.field;

                                    if ($.browser.msie && $.browser.version <= 8) {
                                            dataView.fastSort(sortcol, args.sortAsc);
                                    } else {
                                            dataView.sort(comparer, args.sortAsc);
                                    }
                            });

                            // highlight row in chart
                            grid.onMouseEnter.subscribe(function(e,args) {
                                    var i = grid.getCellFromEvent(e).row;
                                    var d = parcoords.brushed() || data;
                                    parcoords.highlight([d[i]]);
                            });

                            grid.onMouseLeave.subscribe(function(e,args) {
                                    parcoords.unhighlight();
                            });

                            // fill grid with data
                            gridUpdate(data);

                            // update grid on brush
                            parcoords.on("brush", function (d) {
                                    filtered = d;
                                    isSelected = true;
                                    gridUpdate(d);
                                    //update map
                                    lgas.features.map(function (d) {d.properties.FUI = -1; });
                                    geojsonLabels.getLayers().map(function (d) { d._icon.innerHTML = ""; })
                                    _.each(d, function (k, i) {
                                            lgaDict[k[keys[0]]].properties.FUI = k.FUI;
                                    });

                                    map.removeControl(legend);
                                    legend.addTo(map);
                                    refreshMap(lga);
                            });


                            function gridUpdate(data) {
                                    dataView.beginUpdate();
                                    dataView.setItems(data);
                                    dataView.endUpdate();
                            };

                            function refreshMap(updatedLGA) {
                                    // go through updateLGA, or edit the values directly in the geojson layers
                                    geojson.getLayers().map(function (d) {
                                            geojson.resetStyle(d);
                                            geojsonLabels.getLayers().forEach(function (z) {
                                                    if (z.feature.properties.name == d.feature.properties.WATER_SOUR) {
                                                            if (d.feature.properties.FUI > 0) {
                                                                    z._icon.innerHTML=Math.round(d.feature.properties.FUI/100*100)/100;
                                                            } else {
                                                                    z._icon.innerHTML = "";
                                                            }
                                                    }
                                            });
                                    })
                            }
                    });
                }
                if (checkBox.checked === false){
                    document.getElementById('s0_title').innerHTML = '<span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">'+'Water Source of Macquarie Catchment'+'</span>';
                    parcoord_2.style.display = 'none';
                    grid.style.display = 'none';
                    map.removeControl(info);
                    map.removeControl(legend);
                    removeLayer(displayed_s6);                   
                }
            }
        </script>
    </body>
</html>


