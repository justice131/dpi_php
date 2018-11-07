<!DOCTYPE html>

<html>
    <head>
        <title>Risk & Opportunity</title>
        <meta charset="UTF-8">
        <link href="../../lib/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="../../css/navigator_style.css" rel="stylesheet">
        <link rel="stylesheet" href="../../css/dpi.css">
        <script type="text/javascript" src="../../common.scripts/settings.js"></script>
        <script>
            window.onload=function(){
                pageHeight = window.screen.height*heightRatio;
                document.getElementById("visualization").style.height = pageHeight + "px";
                var settingHeight = document.getElementById("setting").offsetHeight;
                var legendTitleHeight = document.getElementById("legend_title").offsetHeight;
                document.getElementById("legend_content").style.height = (pageHeight - settingHeight - legendTitleHeight) + "px";
            }
            
            //module selection onchange function
            function module_selection(){
                var cm_ele=document.getElementById("select_catchment");
                var cm_index=cm_ele.selectedIndex;
                var cm=cm_ele.options[cm_index].value;
                
                var module_ele=document.getElementById("module");
                var module_index=module_ele.selectedIndex ;
                var module=module_ele.options[module_index].value;
                if(cm=="MacquarieBogan"){
                    catchment = "macquarie";
                }else if(cm=="ManningRiver"){
                    catchment = "manning";
                }else{
//                    alert("Please select a catchment to explore.");
                    return;
                }
                if(module!="irrigation"&&module!="mining"&&module!="environment"&&module!="town_water_supply"){
//                    alert("Please select a module to explore.");
                    return;
                }
                document.getElementById("iframe").src = "../" + catchment + "/"+ catchment + "_" + module + ".php";
                
                var elementToBeRemoved = document.getElementById('tw_legend');
                if (!!elementToBeRemoved){
                    document.getElementById('legend').removeChild(elementToBeRemoved);
                }
                
                if(cm=="MacquarieBogan" && module==="town_water_supply"){
                    var elem_ov = document.createElement("div");
                    elem_ov.setAttribute('id', 'tw_legend');
                    elem_ov.innerHTML = (
                            '<img src="../../lib/leaflet/images/water_treatment_icon_red.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (high <small>WSDI</small>)<br>'+
                            '<img src="../../lib/leaflet/images/water_treatment_icon_orange.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (medium <small>WSDI</small>)<br>'+
                            '<img src="../../lib/leaflet/images/water_treatment_icon_green.png"  width="14" height="14" align = "center">&nbsp; &nbsp;Water treatment centre (low <small>WSDI</small>)<div style="height:2px;"><br></div>'
                            );
                    document.getElementById("legend").appendChild(elem_ov);
                }
            }
        </script>
    </head>
    <body style="background-color:#F3F3F4;">
        <?php include("../../common.scripts/navigator.html"); ?>
        <div id="page-wrapper" class="gray-bg dashboard"  style="padding-bottom:20px">
            <div class="row" style="width: 8100px;">
                <div id="left_panel" class="box-container" style="width:4.5%;">
                    <table style="width:100%">
                        <tr>
                            <td>
                                <div id="setting">
                                    <div class="box-title">
                                            <h4><b>Catchment and Related Settings</b></h4>
                                    </div>
                                    <div class="box-content" style="height:40%;">
                                        <h5><b>Select a Catchment for More Information</b></h5>
                                        <select id="select_catchment" style="width:140px" onchange="module_selection()">
                                            <option value="default">-----CATCHMENT-----</option>
                                            <option value="MacquarieBogan">Macquarie</option>
                                            <option value="ManningRiver">Manning</option>
                                        </select><br/><br/>
                                        <h5><b>Select the module you want to explore</b></h5>
                                        <table>
                                          <tr>
                                                <th>
                                                    <select id="module" style="width:140px" onchange="module_selection()">
                                                        <option value="default">------MODULE------</option>
                                                        <option value="irrigation">Irrigation</option>
                                                        <option value="mining">Mining</option>
                                                        <option value="environment">Environment</option>
                                                        <option value="town_water_supply">Town Water Supply</option>
                                                    </select>
                                                </th>
                                                <th>
                                                </th>
                                          </tr>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
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
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="visualization" class="box-container" style="width:95.5%;">
                    <iframe id="iframe" style="width:100%; height: 100%;" frameborder="no" scrolling="no"/>
                </div>
            </div>
        </div>
    </body>
</html>