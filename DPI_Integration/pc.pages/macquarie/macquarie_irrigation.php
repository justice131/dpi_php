<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Macquarie Irrigation</title>
        <?php include("../../common.scripts/all_import_scripts.html"); ?>
        <?php include("../../common.scripts/pc_import_scripts.html"); ?>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <script src="../../border/MacquarieBogan_watersource_centroids.geojson"></script>
        <script type="text/javascript" src="../../common.scripts/settings.js"></script>
    </head>
    <body style="background-color:#F3F3F4;">
        <div class="row" style="width: 100%;">
            <div class="box-container" style="width:17%;">
                <div class="box">
                    <div class="box-title">
                        <div>
                            <span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">Water Sources of Macquarie Catchment--Opportunity for irrigation</span>
                        </div>
                    </div>
                    <div class="box-content" style="padding: 10px 10px 10px 20px;">
                        <div id="map1"></div>
                    </div>     
                </div>
            </div>
            <div class="box-container" style="width:17%;">
                <div class="box">
                    <div class="box-title">
                        <div>
                            <span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">Water Sources of Macquarie Catchment--Risk to agriculture due to variation in supply availability</span>
                        </div>
                    </div>
                    <div class="box-content" style="padding: 10px 10px 10px 20px;">
                        <div id="map2"></div>
                    </div>     
                </div>
            </div>
            <div class="box-container" style="width:39%;">
                <div class="box">
                    <div class="box-title">
                        <h4><b>Parallel Coordinates</b></h4>                                                
                    </div>
                    <div class="box-content">
                        <div id="parrallel_coordinate" class="parcoords"></div>
                    </div>
                </div>
            </div>
            <div class="box-container" style="width:27%;">
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
        <div class="se-pre-con"></div>
        
        <script type="text/javascript">
            // Show preloader
            $(window).load(function() {
            $(".se-pre-con").fadeOut("slow");;
            });
            // Set the page and component height
            pageHeight = window.screen.height*heightRatio;//获取页面高度
            window.onload=function(){
                document.getElementById("map1").style.height = (pageHeight*0.95) + "px";//设置map高度
                document.getElementById("map2").style.height = (pageHeight*0.95) + "px";//设置map高度
                document.getElementById("parrallel_coordinate").style.height = pageHeight + "px";//设置map高度
                document.getElementById("grid").style.height = pageHeight + "px";//设置map高度
            }
            
            /*Functions section begining*/            
            function showIt(d) {
                return d > -1 ? 0.75 : 0;
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

            /*overall variables beginning*/
            var myCols = [
                '#ff3333',//Red
                '#ff8533',//Orange
                '#33ff33'//Green
            ];
            var lgas = MacquarieBogan_unregulated;
            var layer, overlay;
            var lga = new Array();
            var max_row=0;//Get the row number of ranking file
            d3.csv("../../pc.csv/irrigation_macquaire.csv", function (data) {
                _.each(data, function (d, i) {
                max_row++;
                });
            });
            
            function getColorScalar(d) {
                if(d >= 0 && d <= 1){
                return myCols[2];
                }else if(d > 1 && d <= 10){
                return myCols[1];
                }else{
                return myCols[0];
                }
            }
            
            function getColorScalar_1(d) {
                if(d >= 0 && d <= 1){
                return myCols[0];
                }else if(d > 1 && d <= 10){
                return myCols[1];
                }else{
                return myCols[2];
                }
            }
            
            /*overall variables end*/
           
           /*Map section*/
           var myToken = 'pk.eyJ1IjoiZHlobCIsImEiOiJjaWtubG5uMWYwc3BmdWNqN2hlMzFsNDhvIn0.027tda69GVKbxiPnkEBDAw';
           //map1
            var map1 = L.map('map1',{zoomControl: false}).setView([-29.0, 134.7], 4.4);
            L.control.zoom({
                position:'bottomleft'
            }).addTo(map1);
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + myToken, {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                        '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="http://mapbox.com">Mapbox</a>',
                id: 'mapbox.outdoors'
            }).addTo(map1);
            L.geoJSON(lgas, {
                onEachFeature: function onEach(feature, layer){
                    layer.setStyle({color: 'grey', weight: 1.2, fillOpacity: 0.1});
                }
            }).addTo(map1);  
            map1.setView([-31.8, 148.5], 8);
            
            // control that shows state info on hover
            info1 = L.control({position: 'topright'});
            info1.onAdd = function (map) {
                    this._div = L.DomUtil.create('div', 'info');
                    this.update();
                    return this._div;
            };
            info1.update = function (props) {
                this._div.innerHTML = (props?
                        '<h4>' + props.WATER_SOUR + '</h4>'+
                        'Irrigated Area: '+ '<b>' + toThousands(Math.round(props.irrigated_area*10)/10) + ' Ha' + '</b>' + '<br />'+
//                                            'Population: '+ '<b>' + toThousands(props.population) +'</b>'+'<br />'+
                        'Irrigation Value: '+ '<b>$'+ toThousands(Math.round(props.irrigation_value*100)/100)+'M' + '</b>'+'<br />'+
//                                            'Mining Value: '+ '<b>' + toThousands(props.mining_value) + ' $M'+'</b>'+'<br />'+
                        'Employment(Irrigation): '+ '<b>'+toThousands(props.employment_irrigation) +'</b>'+'<br />'+
//                                            'Employment Mining: '+ '<b>'+ toThousands(props.employment_mining) +'</b>'+'<br />'+
//                                'Total Entitlement: '+ '<b>'+ toThousands(props.total_entitlement) + '</b>' +'<br />'+
//                                            'Wetland Area: '+ '<b>'+ toThousands(Math.round(props.wetland_area*10)/10) + ' Ha'+'</b>' +'<br />'+
//                                            'Dissolved Oxygen: '+ '<b>'+ toThousands(props.dissolved_oxygen)+'% mg/L' + '</b>' +'<br />'+
//                                'Mean Flow: '+ '<b>'+ toThousands(Math.round(props.mean_flow*10*365)/10) + ' ML/year'+'</b>' +'<br />'+
//                                            'Variation: '+ '<b>'+ toThousands(props.variation) + '</b>' +'<br />'+
//                                            'Median: '+ '<b>'+ toThousands(props.median) + ' ML/year'+'</b>' +'<br />'+
//                                'Days Below Mean Flow: '+ '<b>'+ toThousands(props.days_below_mean) + '</b>' +'<br />'+
//                                            'DSI: '+ '<b>'+ Math.round(props.DSI/100*100)/100 + '</b>'+'<br />'+
//                                            '100 Years Flood Frequency: '+ '<b>'+ toThousands(props.one_hundred_yrs_flood_frequency) + '</b>'+'<br />'+
//                                            'Time Below Requirement: '+ '<b>'+ toThousands(props.time_below_requirement) + '</b>'+'<br />'+
//                                            'FUI: '+ '<b>'+ Math.round(props.FUI/100*100)/100 + '</b>'+'<br />'+
//                                            'Water Scarcity: '+ '<b>'+ toThousands(props.water_scarcity) + '</b>'+'<br />'+
                        'Argicultural Water Use: ' + '<b>'+ toThousands(Math.round(props.agricultural_water_use*10)/10) + ' ML</b>'+'<br />'+
                        'Irrigation Opportunity Index: ' + '<b>$'+ Math.round(props.irrigation_opportunity_index*100)/100 + 'M</b>'+'<br />'
                : '<b>'+ 'Click a Water Source'+'</b>');
            };
            info1.addTo(map1);
            
            // control that shows state info on hover
            info3 = L.control({position: 'topright'});
            info3.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };
            info3.update = function (props) {
                if(props != undefined){
                    var trace = {
                        y: props.irrigation_opportunity_sequence,
                        marker: {color: '#3D9970'},
                        name: 'Irrigation Opportunity',
                        boxpoints: false,
                        type: 'box'
                    };
                    this._div.innerHTML = (props?
                        '<div id=\"myDiv1\" style=\"height: 300px;width:250px;\"></div>'
                    : '<b>'+ 'Click a Water Source'+'</b>');
                    layout = {
                            yaxis: {
                                autorange: true,
                                showgrid: true,
                                zeroline: true,
                                dtick: 5,
                                gridcolor: 'rgb(255, 255, 255)',
                                gridwidth: 1,
                                zerolinecolor: 'rgb(255, 255, 255)',
                                zerolinewidth: 2
                            },
                            margin: {
                                l: 20,
                                r: 10,
                                b: 40,
                                t: 50
                            },
                            paper_bgcolor: 'rgb(243, 243, 243)',
                            plot_bgcolor: 'rgb(243, 243, 243)',
                            showlegend: false
                    };
                    Plotly.newPlot('myDiv1', [trace], layout);
                }
            };
            info3.addTo(map1);

            //map2
            var map2 = L.map('map2',{zoomControl: false}).setView([-29.0, 134.7], 4.4);
            L.control.zoom({
                position:'bottomleft'
            }).addTo(map2);
            L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + myToken, {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
                        '<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="http://mapbox.com">Mapbox</a>',
                id: 'mapbox.outdoors'
            }).addTo(map2);
            L.geoJSON(lgas, {
                onEachFeature: function onEach(feature, layer){
                    layer.setStyle({color: 'grey', weight: 1.2, fillOpacity: 0.1});
                }
            }).addTo(map2);
            map2.setView([-31.8, 148.5], 8);     
            
            // control that shows state info on hover
            info2 = L.control({position: 'topright'});
            info2.onAdd = function (map) {
                    this._div = L.DomUtil.create('div', 'info');
                    this.update();
                    return this._div;
            };
            info2.update = function (props) {
                this._div.innerHTML = (props?
                        '<h4>' + props.WATER_SOUR + '</h4>'+
                                'Irrigated Area: '+ '<b>' + toThousands(Math.round(props.irrigated_area*10)/10) + ' Ha' + '</b>' + '<br />'+
//                                            'Population: '+ '<b>' + toThousands(props.population) +'</b>'+'<br />'+
                                'Irrigation Value: '+ '<b>$'+ toThousands(Math.round(props.irrigation_value*100)/100)+'M' + '</b>'+'<br />'+
//                                            'Mining Value: '+ '<b>' + toThousands(props.mining_value) + ' $M'+'</b>'+'<br />'+
                                'Employment(Irrigation): '+ '<b>'+toThousands(props.employment_irrigation) +'</b>'+'<br />'+
//                                            'Employment Mining: '+ '<b>'+ toThousands(props.employment_mining) +'</b>'+'<br />'+
//                                'Total Entitlement: '+ '<b>'+ toThousands(props.total_entitlement) + '</b>' +'<br />'+
//                                            'Wetland Area: '+ '<b>'+ toThousands(Math.round(props.wetland_area*10)/10) + ' Ha'+'</b>' +'<br />'+
//                                            'Dissolved Oxygen: '+ '<b>'+ toThousands(props.dissolved_oxygen)+'% mg/L' + '</b>' +'<br />'+
//                                'Mean Flow: '+ '<b>'+ toThousands(Math.round(props.mean_flow*10*365)/10) + ' ML/year'+'</b>' +'<br />'+
//                                            'Variation: '+ '<b>'+ toThousands(props.variation) + '</b>' +'<br />'+
//                                            'Median: '+ '<b>'+ toThousands(props.median) + ' ML/year'+'</b>' +'<br />'+
//                                'Days Below Mean Flow: '+ '<b>'+ toThousands(props.days_below_mean) + '</b>' +'<br />'+
//                                            'DSI: '+ '<b>'+ Math.round(props.DSI/100*100)/100 + '</b>'+'<br />'+
//                                            '100 Years Flood Frequency: '+ '<b>'+ toThousands(props.one_hundred_yrs_flood_frequency) + '</b>'+'<br />'+
//                                            'Time Below Requirement: '+ '<b>'+ toThousands(props.time_below_requirement) + '</b>'+'<br />'+
//                                            'FUI: '+ '<b>'+ Math.round(props.FUI/100*100)/100 + '</b>'+'<br />'+
//                                            'Water Scarcity: '+ '<b>'+ toThousands(props.water_scarcity) + '</b>'+'<br />'+
                                'Argicultural Water Use: ' + '<b>'+ toThousands(Math.round(props.agricultural_water_use*10)/10) + ' ML</b>'+'<br />'+
                                'Risk to Argiculture Index: ' + '<b>$'+ Math.round(props.agricluture_risk_index*100)/100 + 'M</b>'+'<br />'
                        : '<b>'+ 'Click a Water Source'+'</b>');
            };
            info2.addTo(map2);
            
            
            // control that shows state info on hover
            info4 = L.control({position: 'topright'});
            info4.onAdd = function (map) {
                this._div = L.DomUtil.create('div', 'info');
                this.update();
                return this._div;
            };
            info4.update = function (props) {
                if(props != undefined){
                    var trace = {
                        y: props.irrigation_risk_sequence,
                        marker: {color: '#3D9970'},
                        name: 'Irrigation Risk',
                        boxpoints: false,
                        type: 'box'
                    };
                    this._div.innerHTML = (props?
                        '<div id=\"myDiv2\" style=\"height: 300px;width:250px;\"></div>'
                    : '<b>'+ 'Click a Water Source'+'</b>');
                    layout = {
                            yaxis: {
                                autorange: true,
                                showgrid: true,
                                zeroline: true,
                                dtick: 5,
                                gridcolor: 'rgb(255, 255, 255)',
                                gridwidth: 1,
                                zerolinecolor: 'rgb(255, 255, 255)',
                                zerolinewidth: 2
                            },
                            margin: {
                                l: 20,
                                r: 10,
                                b: 40,
                                t: 50
                            },
                            paper_bgcolor: 'rgb(243, 243, 243)',
                            plot_bgcolor: 'rgb(243, 243, 243)',
                            showlegend: false
                    };
                    Plotly.newPlot('myDiv2', [trace], layout);
                }
            };
            info4.addTo(map2);
            
            var lgaDict = {};
            // initialise each property for of geojson
            for (j = 0; j < lgas.features.length; j++) {
                    lgas.features[j].properties.irrigated_area=0;
//                    lgas.features[j].properties.population=0;
                    lgas.features[j].properties.irrigation_value=0;
//                    lgas.features[j].properties.mining_value=0;
                    lgas.features[j].properties.employment_irrigation=0;
//                    lgas.features[j].properties.employment_mining=0;
//                    lgas.features[j].properties.total_entitlement=0;	
                    lgas.features[j].properties.agricultural_water_use=0;
//                    lgas.features[j].properties.mining_water_use=0;
//                    lgas.features[j].properties.wetland_area=0;
//                    lgas.features[j].properties.dissolved_oxygen=0;
//                    lgas.features[j].properties.mean_flow=0;
//                    lgas.features[j].properties.variation=0;
//                    lgas.features[j].properties.median=0;
//                    lgas.features[j].properties.days_below_mean=0;
//                    lgas.features[j].properties.DSI=0;
//                    lgas.features[j].properties.one_hundred_yrs_flood_frequency=0;
//                    lgas.features[j].properties.time_below_requirement=0;
                    lgas.features[j].properties.FUI=0;
//                    lgas.features[j].properties.water_scarcity=0;
                    lgas.features[j].properties.irrigation_opportunity_index=0;
//                    lgas.features[j].properties.opportunity_index_rank=0;
                    lgas.features[j].properties.agricluture_risk_index=0;
//                    lgas.features[j].properties.risk_index_rank=0;
                    lgaDict[lgas.features[j].properties.WATER_SOUR] = lgas.features[j];
            }

            // Create parallel Coordinate
            parcoords = d3.parcoords()("#parrallel_coordinate")
                .alpha(1)
                .mode("queue") // progressive rendering
                .height(pageHeight-100)
                .width(document.getElementById("parrallel_coordinate").clientWidth - 10)
                .margin({
                        top: 25,
                        left: 1,
                        right: 1,
                        bottom: 15
                })
                .color(function (d) {return getColorScalar(d["Risk to Agriculture"]); });

            //Read data for parallel coordinate
            d3.csv("../../pc.csv/irrigation_macquaire.csv", function (data) {
                _.each(data, function (d, i) {
                    d.index = d.index || i; //unique id
                    var water_source_name = d["Water Source"];
                    lgaDict[water_source_name].properties.irrigated_area=d["Irrigated Area"];
//                    lgaDict[water_source_name].properties.population=d[keys[2]];
                    lgaDict[water_source_name].properties.irrigation_value=d["Irrigation Value ($)"];
//                    lgaDict[water_source_name].properties.mining_value=d[keys[4]];
                    lgaDict[water_source_name].properties.employment_irrigation=d["Employment (Irrigation)"];
//                    lgaDict[water_source_name].properties.employment_mining=d[keys[6]];
//                    lgaDict[water_source_name].properties.total_entitlement=d[keys[7]];
                    lgaDict[water_source_name].properties.agricultural_water_use=d["Agriculture Water Use"];
//                    lgaDict[water_source_name].properties.mining_water_use=d[keys[9]];
//                    lgaDict[water_source_name].properties.wetland_area=d[keys[10]];
//                    lgaDict[water_source_name].properties.dissolved_oxygen=d[keys[11]];
//                    lgaDict[water_source_name].properties.mean_flow=d[keys[12]];
//                    lgaDict[water_source_name].properties.variation=d[keys[13]];
//                    lgaDict[water_source_name].properties.median=d[keys[14]];
//                    lgaDict[water_source_name].properties.days_below_mean=d[keys[15]];
//                    lgaDict[water_source_name].properties.DSI=d[keys[16]];
//                    lgaDict[water_source_name].properties.one_hundred_yrs_flood_frequency=parseFloat(d[keys[17]]);
//                    lgaDict[water_source_name].properties.time_below_requirement=d[keys[18]];
                    lgaDict[water_source_name].properties.FUI=d["FUI"];
//                    lgaDict[water_source_name].properties.water_scarcity=d[keys[20]];
                    lgaDict[water_source_name].properties.irrigation_opportunity_index=d["Opportunity to Agriculture"];
//                    lgaDict[water_source_name].properties.opportunity_index_rank=d[keys[22]];
                    lgaDict[water_source_name].properties.agricluture_risk_index=d["Risk to Agriculture"];
//                    lgaDict[water_source_name].properties.risk_index_rank=d[keys[24]];
                    lga.push(water_source_name);
                });
                                
                // add lga layer
                // map1
                function resetHighlight1(e) {
                    geojson1.resetStyle(e.target);
                }
                function zoomToFeature1(e) {
                    var layer = e.target;
                    info1.update(layer.feature.properties);
                    info3.update(layer.feature.properties);
                }
                function onEachFeature1(feature, layer) {
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight1,
                        click: zoomToFeature1
                    });
                }
                function style1(feature) {
                    return {
                        weight: 1,
                        opacity: showIt(1),
                        color: 'white',
                        dashArray: '3',
                        fillOpacity: 0.8 * showIt(feature.properties.FUI),
                        fillColor: getColorScalar_1(feature.properties.irrigation_opportunity_index)
                    };
                }
                geojson1 = L.geoJson(lgas, {
                    style: style1,                            
                    onEachFeature: onEachFeature1
                }).addTo(map1);
                // map2
                function resetHighlight2(e) {
                    geojson2.resetStyle(e.target);
                }
                function zoomToFeature2(e) {
                    var layer = e.target;
                    info2.update(layer.feature.properties);
                    info4.update(layer.feature.properties);
                }
                function onEachFeature2(feature, layer) {
                    layer.on({
                        mouseover: highlightFeature,
                        mouseout: resetHighlight2,
                        click: zoomToFeature2
                    });
                }
                function style2(feature) {
                    return {
                        weight: 1,
                        opacity: showIt(1),
                        color: 'white',
                        dashArray: '3',
                        fillOpacity: 0.8 * showIt(feature.properties.FUI),
                        fillColor: getColorScalar(feature.properties.agricluture_risk_index)
                    };
                }
                geojson2 = L.geoJson(lgas, {
                        style: style2,                            
                        onEachFeature: onEachFeature2
                }).addTo(map2);

                // add label layer
                geojsonLabels1 = L.geoJson(lgaCentroids, {
                    pointToLayer: function (feature, latlng) {
                        return  L.marker(latlng, {
                            clickable : false,
                            draggable : false,
                            icon: L.divIcon({
                            className: 'my-leaflet-div-icon',
                            })
                        });
                    },
                }).addTo(map1);
                
                geojsonLabels2 = L.geoJson(lgaCentroids, {
                        pointToLayer: function (feature, latlng) {
                                return  L.marker(latlng, {
                                        clickable : false,
                                        draggable : false,
                                        icon: L.divIcon({
                                        className: 'my-leaflet-div-icon',
                                        })
                                });
                        },
                }).addTo(map2);

                // add legend
                legend1 = L.control({position: 'bottomright'});
                legend1.onAdd = function (map) {
                    var div = L.DomUtil.create('div', 'info legend'),
                    labels = [];
                    labels.push('<i style="background:' + myCols[0] + '"></i> ' + 'High Opportunity [0, 1]');
                    labels.push('<i style="background:' + myCols[1] + '"></i> ' + 'Medium Opportunity (1, 10]');
                    labels.push('<i style="background:' + myCols[2] + '"></i> ' + 'Low Opportunity (10, ∞)');
                    div.innerHTML = '<h4>Opportunity to Agriculture'+'</h4>' + labels.join('<br>');
                    return div;
                };
                legend1.addTo(map1);

                legend2 = L.control({position: 'bottomright'});
                legend2.onAdd = function (map) {
                        var div = L.DomUtil.create('div', 'info legend'),
                        labels = [];
                        labels.push('<i style="background:' + myCols[2] + '"></i> ' + 'Low Risk [0, 1]');
                        labels.push('<i style="background:' + myCols[1] + '"></i> ' + 'Medium Risk (1, 10]');
                        labels.push('<i style="background:' + myCols[0] + '"></i> ' + 'High Risk (10, ∞)');
                        div.innerHTML = '<h4>Risk to Agriculture'+'</h4>' + labels.join('<br>');
                        return div;
                };
                legend2.addTo(map2);
                
                
                //Bind data to parallel coordinate
                parcoords.data(data)
                    .hideAxis(["Water Source","index"])
                    .render()
                    .reorderable()
                    .brushMode("1D-axes")
                    .rate(400);

                /*Setting up grid beginning*/
                var column_keys = d3.keys(data[0]);
                var columns = column_keys.map(function(key,i) {
                    return {
                        id: key,
                        name: key,
                        field: key,
                        sortable: true
                    }
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
                function gridUpdate(data) {
                    dataView.beginUpdate();
                    dataView.setItems(data);
                    dataView.endUpdate();
                };
                /*Setting up grid end*/
                
                // update grid on brush
                parcoords.on("brush", function (d) {
                        gridUpdate(d);
                        //update map1
                        lgas.features.map(function (d) {d.properties.FUI = -1; });
                        geojsonLabels1.getLayers().map(function (d) { d._icon.innerHTML = ""; })
                        _.each(d, function (k, i) {
                                lgaDict[k["Water Source"]].properties.FUI = k.FUI;
                        });
                        //update map2
                        lgas.features.map(function (d) {d.properties.FUI = -1; });
                        geojsonLabels2.getLayers().map(function (d) { d._icon.innerHTML = ""; })
                        _.each(d, function (k, i) {
                                lgaDict[k["Water Source"]].properties.FUI = k.FUI;
                        });
                        refreshMap(lga);
                });
                
                //update map
                function refreshMap(updatedLGA) {
                    // go through updateLGA, or edit the values directly in the geojson layers
                    geojson1.getLayers().map(function (d) {
                        geojson1.resetStyle(d);
                        geojsonLabels1.getLayers().forEach(function (z) {
                            if (z.feature.properties.name == d.feature.properties.WATER_SOUR) {
                                if (d.feature.properties.FUI >= 0) {
                                        z._icon.innerHTML=Math.round(d.feature.properties.irrigation_opportunity_index*100)/100;
                                } else {
                                        z._icon.innerHTML = "";
                                }
                            }
                        });
                    });
                    // go through updateLGA, or edit the values directly in the geojson layers
                    geojson2.getLayers().map(function (d) {
                        geojson2.resetStyle(d);
                        geojsonLabels2.getLayers().forEach(function (z) {
                            if (z.feature.properties.name == d.feature.properties.WATER_SOUR) {
                                if (d.feature.properties.FUI >= 0) {
                                     z._icon.innerHTML=Math.round(d.feature.properties.agricluture_risk_index*100)/100;
                                } else {
                                    z._icon.innerHTML = "";
                                }
                            }
                        });
                    });
                }
            });
            
            d3.csv("../../pc.csv/irrigation_risk_history_macquaire.csv", function (data) {
                var keys = Object.keys(data[0]);
                _.each(data, function (d, i) {
                    d.index = d.index || i; //unique id
                    var water_source_name = d["Water Sources"];                    
                    var irs = new Array(119);
                    for(var i=0;i<119;i++){
                        irs[i] = d[keys[i+1]];
                    }
                    lgaDict[water_source_name].properties.irrigation_risk_sequence=irs;
                });
            });
                
            d3.csv("../../pc.csv/irrigation_opportunity_history_macquaire.csv", function (data) {
                var keys = Object.keys(data[0]);
                _.each(data, function (d, i) {
                    d.index = d.index || i; //unique id
                    var water_source_name = d["Water Sources"];
                    var ios = new Array(119);
                    for(var i=0;i<119;i++){
                        ios[i] = d[keys[i+1]];
                    }
                    lgaDict[water_source_name].properties.irrigation_opportunity_sequence=ios;
                });
            });
                
            setTimeout(function(){ map1.invalidateSize()}, 500);
            setTimeout(function(){ map2.invalidateSize()}, 500);
        </script>
    </body>
</html>