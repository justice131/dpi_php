<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Macquarie Above Upper Talbragar FUI</title>
        <?php include("../../common.scripts/all_import_scripts.html"); ?>
        <?php include("../../common.scripts/pc_import_scripts.html"); ?>
        <script src="../../border/MacquarieBogan_watersource_centroids.geojson"></script>
        <style>
            .hover_info {
                width: 370px;
            }
        </style>
    </head>
    <body style="background-color:#F3F3F4;">
        <?php include("../../common.scripts/navigator.html"); ?>
	<div id="page-wrapper" class="gray-bg dashboard"  style="padding-bottom:20px">
		<div class="row">
			<div class="box-container" style="width:22%;" id="map_panel">
				<div class="box">
					<div class="box-title">
                                            <div id="s0_title">
                                                <span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">Water Sources of Upper Talbragar--Opportunity for additional supply</span>
                                            </div>
					</div>
					<div class="box-content">
						<div id="map"></div>
					</div>       
                                </div>
			</div>
			<div class="box-container" style="width:46.5%;">
                            <div class="box">
                                <div class="box-title">
                                        <h4><b>Parallel Coordinates</b></h4>                                                
                                </div>
                                <div class="box-content">
                                    <div id="parrallel_coordinate" class="parcoords"></div>
                                </div>
                            </div>
			</div>
			<div class="box-container" style="width:31.5%;">
                            <div class="box">
                                <div class="box-title">
                                        <h4><b>Water Source List</b></h4>                                               
                                </div>  
                                <div class="box-content">
                                    <div id="grid"></div>
                                </div>
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
            
            // Set the page and component height
            pageHeight = window.screen.height*heightRatio*0.95;//get the page height
            window.onload=function(){
                document.getElementById("map").style.height = pageHeight + "px";//set height of map
                document.getElementById("parrallel_coordinate").style.height = pageHeight + "px";
                document.getElementById("grid").style.height = pageHeight + "px";
            }
            
            var removeLayer = function (feature) {
                for (var i = 0; i < feature.length; i++){     
                    map.removeLayer(feature[i]);
                }               
            };
            
            /*Functions section*/
            function showIt(d) {
                return d > 0 ? 0.75 : 0;
            }

            function resetHighlight(e) {
                    geojson.resetStyle(e.target);
            }

            function zoomToFeature(e) {
                    var layer = e.target;
                    info.update(layer.feature.properties);
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
            /*Function section end*/

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
            map.setView([-32, 149.67], 10); 
            
            function getColorScalar(d) {
                if(d >= 0 && d <= 0.2){
                return myCols[2];
                }else if(d > 0.2 && d <= 0.4){
                return myCols[1];
                }else{
                return myCols[0];
                }
            }
            
           function style(feature) {
                    if(feature.properties.DSIIndexRank !== 0){
                    return {
                            weight: 1,
                            opacity: showIt(1),
                            color: 'white',
                            dashArray: '3',
                            fillOpacity: 0.8 * showIt(feature.properties.FUI+1),
                            fillColor: getColorScalar(feature.properties.FUI)};
                    }else{
                    return {
                            weight: 1,
                            opacity: showIt(1),
                            color: 'white',
                            dashArray: '3',
                            fillOpacity: 0.8 * showIt(feature.properties.FUI),
                            fillColor: getColorScalar(feature.properties.FUI)};
                    }
            }
            var max_row=0;//Get the row number of ranking file
            d3.csv("../../pc.csv/macquarie_above_upper_cudgegong.csv", function (data) {
                _.each(data, function (d, i) {
                max_row++;
                });
            });

            parrallel_coordinate.style.display = 'block';
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
                                'Mining Value: '+ '<b>' + toThousands(props.mining_value) + ' $M'+'</b>'+'<br />'+
                                'Employment Irrigation: '+ '<b>'+toThousands(props.employment_irrigation) +'</b>'+'<br />'+
                                'Employment Mining: '+ '<b>'+ toThousands(props.employment_mining) +'</b>'+'<br />'+
                                'Wetland Area: '+ '<b>'+ toThousands(Math.round(props.wetland_area*10)/10) + ' Ha'+'</b>' +'<br />'+
                                'Dissolved Oxygen: '+ '<b>'+ toThousands(props.dissolved_oxygen) +'% mg/L'+ '</b>' +'<br />'+
                                'Days Below Mean: '+ '<b>'+ toThousands(props.days_below_mean) + '</b>' +'<br />'+
                                'DSI: '+ '<b>'+ Math.round(props.DSI/100*100)/100 + '</b>'+'<br />'+
                                '100 Years Flood Frequency: '+ '<b>'+ toThousands(props.one_hundred_yrs_flood_frequency) + '</b>'+'<br />'+
                                'Time Below Requirement: '+ '<b>'+ toThousands(props.time_below_requirement) + '</b>'+'<br />'+
                                'FUI: '+ '<b>'+ Math.round(props.FUI/100*100)/100 + '</b>'+'<br />'+
                                'Risk to Agriculture: ' + '<b>'+ props.risk_to_agriculture + '</b>'+'<br />'+
                                'Risk to Mining: ' + '<b>'+ props.risk_to_mining + '</b>'+'<br />'+
                                'Opportunity to Agriculture: ' + '<b>'+ props.opportunity_to_agriculture + '</b>'+'<br />'+
                                'Opportunity to Mining: ' + '<b>'+ props.opportunity_to_mining + '</b>'+'<br />'+
                                'Benefit from Environment: ' + '<b>'+ props.benefit_from_environment + '</b>'+'<br />'
                                : '<b>'+ 'Click a Water Source'+'</b>');
            };
            info.addTo(map);

            var lgaDict = {};
            // initialise each property for of geojson
            for (j = 0; j < lgas.features.length; j++) {
                    lgas.features[j].properties.irrigated_area=0;
                    lgas.features[j].properties.population=0;
                    lgas.features[j].properties.irrigation_value=0;
                    lgas.features[j].properties.mining_value=0;
                    lgas.features[j].properties.employment_irrigation=0;
                    lgas.features[j].properties.employment_mining=0;
                    lgas.features[j].properties.wetland_area=0;
                    lgas.features[j].properties.dissolved_oxygen=0;
                    lgas.features[j].properties.days_below_mean=0;
                    lgas.features[j].properties.DSI_org=0;
                    lgas.features[j].properties.DSI=0;
                    lgas.features[j].properties.one_hundred_yrs_flood_frequency=0;
                    lgas.features[j].properties.time_below_requirement=0;
                    lgas.features[j].properties.FUI=0;
                    lgas.features[j].properties.risk_to_agriculture=0;
                    lgas.features[j].properties.risk_to_mining=0;
                    lgas.features[j].properties.opportunity_to_agriculture=0;
                    lgas.features[j].properties.opportunity_to_mining=0;
                    lgas.features[j].properties.benefit_from_environment=0;
                    lgas.features[j].properties.FUIIndexRank=0;
                    lgas.features[j].properties.DSIIndexRank=0;
                    lgaDict[lgas.features[j].properties.WATER_SOUR] = lgas.features[j];
            }

            // Create parallel Coordinate
            parcoords = d3.parcoords()("#parrallel_coordinate")
                    .alpha(1)
                    .mode("queue") // progressive rendering
                    .height(pageHeight)
                    .width(document.getElementById("parrallel_coordinate").clientWidth - 10)
                    .margin({
                            top: 25,
                            left: 1,
                            right: 1,
                            bottom: 15
                    })
                    .color(function (d) { return getColorScalar(d.FUI) });


            //Read data for parallel coordinate
            d3.csv("../../pc.csv/macquarie_above_upper_cudgegong.csv", function (data) {
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
                            lgaDict[water_source_name].properties.wetland_area=d[keys[7]];
                            lgaDict[water_source_name].properties.dissolved_oxygen=d[keys[8]];
                            lgaDict[water_source_name].properties.days_below_mean=d[keys[9]];
                            lgaDict[water_source_name].properties.DSI_org=d[keys[10]];
                            lgaDict[water_source_name].properties.DSI=d[keys[11]];
                            lgaDict[water_source_name].properties.one_hundred_yrs_flood_frequency=parseFloat(d[keys[12]]);
                            lgaDict[water_source_name].properties.time_below_requirement=d[keys[13]];
                            lgaDict[water_source_name].properties.FUI=d[keys[14]];
                            lgaDict[water_source_name].properties.risk_to_agriculture=d[keys[15]];
                            lgaDict[water_source_name].properties.risk_to_mining=d[keys[16]];
                            lgaDict[water_source_name].properties.opportunity_to_agriculture=d[keys[17]];
                            lgaDict[water_source_name].properties.opportunity_to_mining=d[keys[18]];
                            lgaDict[water_source_name].properties.benefit_from_environment=d[keys[19]];
                            lgaDict[water_source_name].properties.FUIIndexRank=d[keys[20]];
                            lgaDict[water_source_name].properties.DSIIndexRank=d[keys[21]];
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

                    // add legend
                    legend = L.control({position: 'bottomright'});
                    legend.onAdd = function (map) {
                            var div = L.DomUtil.create('div', 'info legend'),
                            labels = [],
                            from, to;
                             labels.push(
                                            '<i style="background:' + myCols[2] + '"></i> ' + '[0, 0.2]');
//                                            1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                            labels.push(
                                            '<i style="background:' + myCols[1] + '"></i> ' + '(0.2, 0.4]');
//                                            2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                            labels.push(
                                            '<i style="background:' + myCols[0] + '"></i> ' + '(0.4, 1]');
//                                            3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                            div.innerHTML = '<h4>FUI</h4>' + labels.join('<br>');
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
                                                            z._icon.innerHTML=d.feature.properties.FUI;
                                                    } else {
                                                            z._icon.innerHTML = "";
                                                    }
                                            }
                                    });
                            })
                    }
            });
            setTimeout(function(){ map.invalidateSize()}, 1000);
        </script>
    </body>
</html>


