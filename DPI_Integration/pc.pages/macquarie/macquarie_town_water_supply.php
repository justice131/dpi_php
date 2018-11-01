<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Irrigation Data Insight</title>
        <?php include("../../common.scripts/all_import_scripts.html"); ?>
        <?php include("../../common.scripts/pc_import_scripts.html"); ?>
        <script type="text/javascript" src="../../common.scripts/settings.js"></script>
        <!-- nsw map -->
        <script src="../../border/lgaCentroids_macquarie.geojson"></script>
        <script src="../../border/lga_macquarie.geojson"></script>
    </head>
    <body style="background-color:#F3F3F4;">
        <div class="row" style="width: 100%;">
            <div class="box-container" style="width:17%;">
                <div class="box">
                    <div class="box-title">
                        <div>
                            <span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">Town Water Supply Insight for Macquarie Catchment--Opportunity</span>
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
                            <span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">Town Water Supply Insight for Macquarie Catchment--Risk</span>
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
        <?php
            include '../../db.helper/db_connection_ini.php';
            //if(!empty($_GET['catchment_name'])){
                if($conn!=null){
                    $sql_3 = "SELECT * FROM town_water_supply WHERE catchment = 'Macquarie'";
                    $result_3 = $conn->query($sql_3);
                    $town_water_supply = array();
                    $o = -1;
                    while ($row_3 = $result_3->fetch_assoc()){
                        $o++;
                        $town_water_supply[$o] = $row_3;
                    }
                }else{
                    include '../../db.helper/db_connection_ini.php';
                }
           // }
        ?>
        
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
                return d > 0 ? 0.75 : 0;
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
            
            var Icon_red = L.icon({
                iconUrl: '../../lib/leaflet/images/water_treatment_icon_red.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            var Icon_orange = L.icon({
                iconUrl: '../../lib/leaflet/images/water_treatment_icon_orange.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            var Icon_green = L.icon({
                iconUrl: '../../lib/leaflet/images/water_treatment_icon_green.png',
                iconSize:     [15, 15], 
                iconAnchor:   [7.5, 7.5],  
                popupAnchor:  [0, -15] 
            });
            
            /*Function section end*/

            /*overall variables beginning*/
            var myCols = [
                '#ff3333',//Red
                '#ff8533',//Orange
                '#33ff33'//Green
            ];
            var lgas = lga_mac;
            var layer, overlay;
            var lga = new Array();
            var max_row=0;//Get the row number of ranking file
            d3.csv("../../pc.csv/town_water_supply_macquaire.csv", function (data) {
                _.each(data, function (d, i) {
                max_row++;
                });
            });
            function getColorScalar(d) {
                if(d >= 0 && d <= 10){
                return myCols[2];
                }else if(d > 10 && d <= 100){
                return myCols[1];
                }else{
                return myCols[0];
                }
            }
            
            function getColorScalar_1(d) {
                if(d >= 0 && d <= 10){
                return myCols[0];
                }else if(d > 10 && d <= 100){
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
                        '<h4>' + props.NSW_LGA__3 + '</h4>'+
                        'Plan: '+ '<b>' + props.plan + '</b>' + '<br />'+
                        'Volume Treated: '+ '<b>' + props.volume_treated + '</b>' + '<br />'+
                        'Population Served: '+ '<b>' + props.population_served + '</b>' + '<br />'+
                        'Population in 2015: '+ '<b>' + props.population_2015 + '</b>' + '<br />'+
                        'Population predicted in 2036: '+ '<b>' + props.population_2036 + '</b>' + '<br />'+
                        'Gross Regional Product: '+ '<b>' + props.gross_reional_product + '</b>' + '<br />'+
                        'WSDI: '+ '<b>' + props.WSDI + '</b>' + '<br />'+
                        'Forecast Drinking Water Quality Deficiency (HBT) Index (%): '+ '<b>' + props.HBT + '</b>' + '<br />'+
                        'Risk: '+ '<b>$' + Math.round(props.risk*10)/10 + 'M</b>' + '<br />'+
                        'Opportunity : '+ '<b>' + Math.round(props.opportunity*10)/10 + '</b>' + '<br />'
                : '<b>'+ 'Click a Water Source'+'</b>');
            };
            info1.addTo(map1);
            
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
                        '<h4>' + props.NSW_LGA__3 + '</h4>'+
                        'Plan: '+ '<b>' + props.plan + '</b>' + '<br />'+
                        'Volume Treated: '+ '<b>' + props.volume_treated + '</b>' + '<br />'+
                        'Population Served: '+ '<b>' + props.population_served + '</b>' + '<br />'+
                        'Population in 2015: '+ '<b>' + props.population_2015 + '</b>' + '<br />'+
                        'Population predicted in 2036: '+ '<b>' + props.population_2036 + '</b>' + '<br />'+
                        'Gross Regional Product: '+ '<b>' + props.gross_reional_product + '</b>' + '<br />'+
                        'WSDI: '+ '<b>' + props.WSDI + '</b>' + '<br />'+
                        'Forecast Drinking Water Quality Deficiency (HBT) Index (%): '+ '<b>' + props.HBT + '</b>' + '<br />'+
                        'Risk: '+ '<b>$' + Math.round(props.risk*10)/10 + 'M</b>' + '<br />'+
                        'Opportunity : '+ '<b>' + Math.round(props.opportunity*10)/10 + '</b>' + '<br />'
                        : '<b>'+ 'Click a Water Source'+'</b>');
            };
            info2.addTo(map2);
            
            var lgaDict = {};
            // initialise each property for of geojson
            for (j = 0; j < lgas.features.length; j++) {
                lgas.features[j].properties.plan="";
                lgas.features[j].properties.volume_treated=0;
                lgas.features[j].properties.population_served=0;
                lgas.features[j].properties.population_2015=0;
                lgas.features[j].properties.population_2036=0;
                lgas.features[j].properties.gross_reional_product=0;
                lgas.features[j].properties.WSDI=0;
                lgas.features[j].properties.HBT=0;
                lgas.features[j].properties.risk=0;
                lgas.features[j].properties.risk_index_rank=0;
                lgas.features[j].properties.opportunity=0;
                lgas.features[j].properties.opportunity_index_rank=0;
                lgaDict[lgas.features[j].properties.NSW_LGA__3] = lgas.features[j];
            }

            // Create parallel Coordinate
            parcoords = d3.parcoords()("#parrallel_coordinate")
                .alpha(1)
                .mode("queue") // progressive rendering
                .height(pageHeight-100)
                .width(document.getElementById("parrallel_coordinate").clientWidth - 10)
                .margin({
                        top: 25,
                        left: 100,
                        right: 1,
                        bottom: 15
                })
                .color(function (d) {return getColorScalar(d[keys[12]]); });

            //Read data for parallel coordinate
            d3.csv("../../pc.csv/town_water_supply_macquaire.csv", function (data) {
                keys = Object.keys(data[0]);
                _.each(data, function (d, i) {
                    d.index = d.index || i; //unique id
                    var LGA_name = d[keys[0]];
                    lgaDict[LGA_name].properties.plan=d[keys[1]];
                    lgaDict[LGA_name].properties.volume_treated=d[keys[5]];
                    lgaDict[LGA_name].properties.population_served=d[keys[6]];
                    lgaDict[LGA_name].properties.population_2015=d[keys[7]];
                    lgaDict[LGA_name].properties.population_2036=d[keys[8]];
                    lgaDict[LGA_name].properties.gross_reional_product=d[keys[9]];
                    lgaDict[LGA_name].properties.WSDI=d[keys[10]];
                    lgaDict[LGA_name].properties.HBT=d[keys[11]];
                    lgaDict[LGA_name].properties.risk=d[keys[12]];
                    lgaDict[LGA_name].properties.risk_index_rank=d[keys[13]];
                    lgaDict[LGA_name].properties.opportunity=d[keys[14]];
                    lgaDict[LGA_name].properties.opportunity_index_rank=d[keys[15]];
                    lga.push(LGA_name);
                });
                
                // add lga layer
                // map1
                function resetHighlight1(e) {
                    geojson1.resetStyle(e.target);
                }
                function zoomToFeature1(e) {
                    var layer = e.target;
                    info1.update(layer.feature.properties);
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
                        fillOpacity: 0.8 * showIt(feature.properties.HBT),
                        fillColor: getColorScalar_1(feature.properties.opportunity)
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
                        fillOpacity: 0.8 * showIt(feature.properties.HBT),
                        fillColor: getColorScalar(feature.properties.risk)
                    };
                }
                geojson2 = L.geoJson(lgas, {
                        style: style2,                            
                        onEachFeature: onEachFeature2
                }).addTo(map2);

                // add label layer
                geojsonLabels1 = L.geoJson(lgaCentroids_mac, {
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
                geojsonLabels2 = L.geoJson(lgaCentroids_mac, {
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
                    labels = [],
                    from, to;
                    labels.push(
                                    '<i style="background:' + myCols[0] + '"></i> ' + '[0, 10]');
//                                    1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                    labels.push(
                                    '<i style="background:' + myCols[1] + '"></i> ' + '(10, 100]');
//                                    2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                    labels.push(
                                    '<i style="background:' + myCols[2] + '"></i> ' + '(100, ∞)');
//                                    3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                    div.innerHTML = '<h4>Index Rank (Opportunity)</h4>' + labels.join('<br>');
                    return div;
                };
                legend1.addTo(map1);

                legend2 = L.control({position: 'bottomright'});
                legend2.onAdd = function (map) {
                        var div = L.DomUtil.create('div', 'info legend'),
                        labels = [],
                        from, to;
                        labels.push(
                                '<i style="background:' + myCols[2] + '"></i> ' + '[0, 10]');
//                                1 +' (' +'1&ndash;' + Math.floor(max_row/3) + ')');
                        labels.push(
                                '<i style="background:' + myCols[1] + '"></i> ' + '(10, 100]');
//                                2 +' (' + (Math.floor(max_row/3)+1) + '&ndash;' + Math.ceil(2*max_row/3) + ')');
                        labels.push(
                                '<i style="background:' + myCols[0] + '"></i> ' + '(100, ∞)');
//                                3 +' (' + (Math.ceil(2*max_row/3)+1) + '&ndash;' + max_row + ')');
                        div.innerHTML = '<h4>Index Rank (Risk)</h4>' + labels.join('<br>');
                        return div;
                };
                legend2.addTo(map2);
                
                
                //Bind data to parallel coordinate
                parcoords.data(data)
                    .hideAxis(["Water source","index"])
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
                        lgas.features.map(function (d) {d.properties.HBT = -1; });
                        geojsonLabels1.getLayers().map(function (d) { d._icon.innerHTML = ""; })
                        _.each(d, function (k, i) {
                                lgaDict[k[keys[0]]].properties.HBT = k.HBT;
                        });
                        //update map2
                        lgas.features.map(function (d) {d.properties.HBT = -1; });
                        geojsonLabels2.getLayers().map(function (d) { d._icon.innerHTML = ""; })
                        _.each(d, function (k, i) {
                                lgaDict[k[keys[0]]].properties.HBT = k.HBT;
                        });
                        refreshMap(lga);
                });
                
                //update map
                function refreshMap(updatedLGA) {
                    // go through updateLGA, or edit the values directly in the geojson layers
                    geojson1.getLayers().map(function (d) {
                        geojson1.resetStyle(d);
                        geojsonLabels1.getLayers().forEach(function (z) {
                            if (z.feature.properties.name == d.feature.properties.NSW_LGA__3) {
                                if (d.feature.properties.HBT > 0) {
                                        z._icon.innerHTML=Math.round(d.feature.properties.opportunity*10)/10;
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
                            if (z.feature.properties.name == d.feature.properties.NSW_LGA__3) {
                                if (d.feature.properties.HBT > 0) {
                                     z._icon.innerHTML=Math.round(d.feature.properties.risk*10)/10;
                                } else {
                                    z._icon.innerHTML = "";
                                }
                            }
                        });
                    });
                }
            });
            
            setTimeout(function(){ map1.invalidateSize()}, 500);
            setTimeout(function(){ map2.invalidateSize()}, 500);
            
            //
            var hbt_rank_Macquarie = [];
            var tws_marker_collection = [];
            <?php if(!empty($town_water_supply)){?>;
                    <?php for ($x=0; $x<count($town_water_supply); $x++) {?>                              
                            var loca ="<?php echo $town_water_supply[$x]["exact_location"]; ?>";
                            var town_served ="<?php echo $town_water_supply[$x]["town_served"]; ?>";
                            var lat = "<?php echo $town_water_supply[$x]["latitude"]; ?>";
                            var lon = "<?php echo $town_water_supply[$x]["longitude"]; ?>";
                            var pos = "<?php echo $town_water_supply[$x]["postcode"]; ?>";
                            var vol = "<?php echo $town_water_supply[$x]["volume_treated"]; ?>";
                            var HBT = "<?php echo $town_water_supply[$x]["HBT_index"]; ?>";
                            var WSDI = "<?php echo $town_water_supply[$x]["WSDI"]; ?>";
                            var popu = "<?php echo $town_water_supply[$x]["population_served"]; ?>";
                            hbt_rank_Macquarie.push([loca, HBT]);
                                var M_1 = L.marker([lat, lon], {icon: icon_wsdi(hbt_rank_Macquarie, loca)}).addTo(map1)
                                .bindPopup('Location: ' + loca + '<br/>'
                                + 'Town Served: ' + town_served + '<br/>'
                                + 'Postcode: ' + pos + '<br/>'
                                + 'Volume Treated: ' + toThousands(vol) + ' ML' + '<br/>'
                                + 'Health Based Target Index: ' + HBT + '<br/>'
                                + 'Water Supply Deficiency Index: ' + WSDI + '<br/>'
                                + 'Population Served: ' + Math.round(popu));
                                tws_marker_collection.push(M_1); 
                                
                                var M_2 = L.marker([lat, lon], {icon: icon_wsdi(hbt_rank_Macquarie, loca)}).addTo(map2)
                                .bindPopup('Location: ' + loca + '<br/>'
                                + 'Town Served: ' + town_served + '<br/>'
                                + 'Postcode: ' + pos + '<br/>'
                                + 'Volume Treated: ' + toThousands(vol) + ' ML' + '<br/>'
                                + 'Health Based Target Index: ' + HBT + '<br/>'
                                + 'Water Supply Deficiency Index: ' + WSDI + '<br/>'
                                + 'Population Served: ' + Math.round(popu));
                                tws_marker_collection.push(M_2);                     
                    <?php }?>;    
            <?php }?>; 
            //
            
        </script>
    </body>
</html>