<!DOCTYPE html>

<html>
    <head>
        <title>Scenarios</title>
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
            
            //scenario selection onchange function
            function scenario_selection(){
                var cm_ele=document.getElementById("select_catchment");
                var cm_index=cm_ele.selectedIndex;
                var cm=cm_ele.options[cm_index].value;
                
                var scenario_ele=document.getElementById("select_scenario");
                var scenario_index=scenario_ele.selectedIndex ;
                var scenario=scenario_ele.options[scenario_index].value;
                if(cm=="MacquarieBogan"){
                    catchment = "macquarie";
                }else if(cm=="ManningRiver"){
                    catchment = "manning";
                }else{
                    alert("Please select a catchment to explore.");
                    return;
                }
                if(scenario!="potential_need"&&scenario!="water_risk"){
                    alert("Please select a scenario to explore.");
                    return;
                }
                document.getElementById("iframe").src = "../" + catchment + "/"+ catchment + "_scenario_" + scenario + ".php";
            }
        </script>
    </head>
    <body style="background-color:#F3F3F4;">
        <?php include("../../common.scripts/navigator.html"); ?>
        <div id="page-wrapper" class="gray-bg dashboard"  style="padding-bottom:20px">
            <div class="row" style="width: 6500px;">
                <div id="left_panel" class="box-container" style="width:5.5%;">
                    <table style="width:100%">
                        <tr>
                            <td>
                                <div id="setting">
                                    <div class="box-title">
                                            <h4><b>Catchment and Scenario Settings</b></h4>
                                    </div>
                                    <div class="box-content" style="height:40%;">
                                        <h5><b>Select a Catchment for More Information</b></h5>
                                        <select id="select_catchment" style="width:135px" onchange="scenario_selection()">
                                            <option value="default">-----CATCHMENT-----</option>
                                            <option value="MacquarieBogan">Macquarie</option>
                                            <option value="ManningRiver">Manning</option>
                                        </select><br/><br/>
                                        <h5><b>Select the scenario you want to explore</b></h5>
                                        <table>
                                          <tr>
                                                <th>
                                                    <select id="select_scenario" style="width:300px" onchange="scenario_selection()">
                                                        <option value="default">------------------------Scenario------------------------</option>
                                                        <option value="potential_need">Potential need for new infrastructure</option>
                                                        <option value="water_risk">Water related health risk due to poor ecosystem health</option>
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
                <div id="visualization" class="box-container" style="width:94.5%;">
                    <iframe id="iframe" style="width:100%; height: 100%;" frameborder="no" scrolling="no"/>
                </div>
            </div>
        </div>
    </body>
</html>