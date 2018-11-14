<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Macquarie Mining</title>
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
                            <span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">Water Sources of Macquarie Catchment--Opportunity of mining ($M)</span>
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
                            <span style="font-size:18px; font-weight:bold; margin-bottom: 0; height: 48px;">Water Sources of Macquarie Catchment--Risk to Mining ($M)</span>
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
            d3.csv("../../pc.csv/mining_macquaire.csv", function (data) {
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
                        'Mining Value: '+ '<b>$' + toThousands(Math.round(props.mining_value*100)/100) + 'M'+'</b>'+'<br />'+
                        'Employment (Mining): '+ '<b>'+ toThousands(props.employment_mining) +'</b>'+'<br />'+
                        'Mining Water Use: '+ '<b>'+ toThousands(props.mining_water_use) + ' ML</b>'+'<br />'+
                        'Opportunity of Mining : ' + '<b>$'+ props.mining_opportunity + 'M</b>'+'<br />'
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
                        y: props.mining_opportunity_sequence,
                        marker: {color: '#3D9970'},
                        name: 'Mining Opportunity',
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
                        'Mining Value: '+ '<b>$' + toThousands(props.mining_value) + 'M'+'</b>'+'<br />'+
                        'Employment (Mining): '+ '<b>'+ toThousands(props.employment_mining) +'</b>'+'<br />'+
                        'Mining Water Use: '+ '<b>'+ toThousands(props.mining_water_use) + ' ML</b>'+'<br />'+
                        'Risk to Mining : ' + '<b>$'+ props.mining_risk + 'M</b>'+'<br />'
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
                        y: props.mining_risk_sequence,
                        marker: {color: '#3D9970'},
                        name: 'Mining Risk',
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
                lgas.features[j].properties.mining_value=0;
                lgas.features[j].properties.employment_mining=0;
                lgas.features[j].properties.mining_water_use=0;
                lgas.features[j].properties.mining_risk=0;
                lgas.features[j].properties.mining_opportunity=0;
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
                .color(function (d) {return getColorScalar(d["Risk to mining"]); });

            //Read data for parallel coordinate
            d3.csv("../../pc.csv/mining_macquaire.csv", function (data) {
                _.each(data, function (d, i) {
                    d.index = d.index || i; //unique id
                    var water_source_name = d["Water Source"];
                    lgaDict[water_source_name].properties.irrigated_area=d["Irrigated area"];
                    lgaDict[water_source_name].properties.mining_value=d["Mining value ($M)"];
                    lgaDict[water_source_name].properties.employment_mining=d["Employment mining"];
                    lgaDict[water_source_name].properties.mining_water_use=d["Mining  water use (ML/year)"];
                    lgaDict[water_source_name].properties.mining_risk=d["Risk to mining"];
                    lgaDict[water_source_name].properties.mining_opportunity=d["Opportunity of mining"];
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
                        fillOpacity: 0.8 * showIt(feature.properties.mining_opportunity),
                        fillColor: getColorScalar_1(feature.properties.mining_opportunity)
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
                        fillOpacity: 0.8 * showIt(feature.properties.mining_risk),
                        fillColor: getColorScalar(feature.properties.mining_risk)
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
                    labels.push('<i style="background:' + myCols[0] + '"></i> ' + 'Low Opportunity [0, 1]');
                    labels.push('<i style="background:' + myCols[1] + '"></i> ' + 'Medium Opportunity (1, 10]');
                    labels.push('<i style="background:' + myCols[2] + '"></i> ' + 'High Opportunity (10, ∞)');
                    div.innerHTML = '<h4>Opportunity to Mining'+'</h4>' + labels.join('<br>');
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
                        div.innerHTML = '<h4>Risk to Mining'+'</h4>' + labels.join('<br>');
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
                        lgas.features.map(function (d) {d.properties.mining_opportunity = -1; });
                        geojsonLabels1.getLayers().map(function (d) { d._icon.innerHTML = ""; })
                        _.each(d, function (k, i) {
                                lgaDict[k["Water Source"]].properties.mining_opportunity = k["Opportunity of mining"];
                        });
                        //update map2
                        lgas.features.map(function (d) {d.properties.mining_risk = -1; });
                        geojsonLabels2.getLayers().map(function (d) { d._icon.innerHTML = ""; })
                        _.each(d, function (k, i) {
                                lgaDict[k["Water Source"]].properties.mining_risk = k["Risk to mining"];
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
                                if (d.feature.properties.mining_opportunity >= 0) {
                                        z._icon.innerHTML=d.feature.properties.mining_opportunity;
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
                                if (d.feature.properties.mining_risk >= 0) {
                                        z._icon.innerHTML=d.feature.properties.mining_risk;
                                } else {
                                        z._icon.innerHTML = "";
                                }
                            }
                        });
                    });
                }
            });
            d3.csv("../../pc.csv/mining_risk_history_macquaire.csv", function (data) {
                var keys = Object.keys(data[0]);
                _.each(data, function (d, i) {
                    d.index = d.index || i; //unique id
                    var water_source_name = d["Water Sources"];                    
                    var irs = new Array(119);
                    for(var i=0;i<119;i++){
                        irs[i] = d[keys[i+1]];
                    }
                    lgaDict[water_source_name].properties.mining_risk_sequence=irs;
                });
            });
                
            d3.csv("../../pc.csv/mining_opportunity_history_macquaire.csv", function (data) {
                var keys = Object.keys(data[0]);
                _.each(data, function (d, i) {
                    d.index = d.index || i; //unique id
                    var water_source_name = d["Water Sources"];
                    var ios = new Array(119);
                    for(var i=0;i<119;i++){
                        ios[i] = d[keys[i+1]];
                    }
                    lgaDict[water_source_name].properties.mining_opportunity_sequence=ios;
                });
            });
            
            setTimeout(function(){ map1.invalidateSize()}, 500);
            setTimeout(function(){ map2.invalidateSize()}, 500);
        </script>
    </body>
</html>
