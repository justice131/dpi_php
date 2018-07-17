<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>
            index
        </title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="format-detection" content="telephone=no">
        <link rel="stylesheet" href="./css/x-admin.css" media="all">
    </head>
    <body>
        <div class="layui-layout layui-layout-admin">
            <div class="layui-side layui-bg-black x-side">
                <div class="layui-side-scroll">
                    <ul class="layui-nav layui-nav-tree site-demo-nav" lay-filter="side">
                    <!--Raw Data-->
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;" _href="Data_Management_Home.php">
                               <i class="layui-icon" style="top: 3px;">&#xe62d;</i><cite>RAW DATA</cite>
                            </a>
                      <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="Whole_Catchment_Indices.php">
                                           <cite>Whole Catchment Indices</cite>
                                        </a>
                              </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="River_Indices.php">
                                            <cite>River Indices</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="Management_Zone_Indices.php">
                                            <cite>Management Zone Indices</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="Irrigated_Areas.php">
                                           <cite>Irrigated Areas</cite>
                                        </a>
                              </dd>
                              <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="Operational_Mines.php">
                                           <cite>Operational Mines</cite>
                                        </a>
                              </dd>
                              <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="Water_Treatment_Centre.php">
                                           <cite>Water_Treatment_Centre</cite>
                                        </a>
                              </dd>
                            </dl>
                        </li>
                        
                        <!--Macquarie Valley and Dam Data-->
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe629;</i><cite>Macquarie Valley and Dam Data</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="valley_summary.php">
                                            <i class="layui-icon"></i><cite>Valley Summary</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="valley_daily_data.php">
                                            <i class="layui-icon"></i><cite>Valley Daily Data</cite>
                                        </a>
                                    </dd>
                                </dd> 
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="valley_yearly_data.php">
                                            <i class="layui-icon"></i><cite>Valley Yearly Data</cite>
                                        </a>
                                    </dd>
                                </dd> 
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="dam_daily_data.php">
                                            <i class="layui-icon"></i><cite>Dam Daily Data</cite>
                                        </a>
                                    </dd>
                                    <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="dam_summary.php">
                                            <i class="layui-icon"></i><cite>Dam Summary</cite>
                                        </a>
                                    </dd>
                                </dd> 
                                </dd> 
                            </dl>
                        </li>
                        
                        <!--Data in Visualization-->
                        <li class="layui-nav-item">
                            <a class="javascript:;" href="javascript:;">
                                <i class="layui-icon" style="top: 3px;">&#xe629;</i><cite>Data in Visualization</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="Town_Water_Supply.php">
                                            <i class="layui-icon"></i><cite>Town Water Supply</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="Water_Source.php">
                                            <i class="layui-icon"></i><cite>Water Source</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="License_Data.php">
                                            <i class="layui-icon"></i><cite>License Data</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="Work_Approval.php">
                                            <i class="layui-icon"></i><cite>Work Approval</cite>
                                        </a>
                                    </dd>
                                </dd>
                                <dd class="">
                                    <dd class="">
                                        <a href="javascript:;" _href="Employment_Data.php">
                                            <i class="layui-icon"></i><cite>Employment Data</cite>
                                        </a>
                                    </dd>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="layui-tab layui-tab-card site-demo-title x-main" lay-filter="x-tab" lay-allowclose="true">
                <div class="x-slide_left"></div>
                <ul class="layui-tab-title">
                    <li class="layui-this">
                        <a href="javascript:;" _href="index.php">
                                           <cite>Home</cite>
                                        </a>
                        <i class="layui-icon layui-unselect layui-tab-close">ဆ</i>
                    </li>
                </ul>
                <div class="layui-tab-content site-demo site-demo-body">
                    <div class="layui-tab-item layui-show">
                        <iframe frameborder="0" src="Data_Management_Home.php" class="x-iframe"></iframe>
                    </div>
                </div>
            </div>
            <div class="site-mobile-shade">
            </div>
        </div>
        <script src="./lib/layui/layui.js" charset="utf-8"></script>
        <script src="./lib/js/x-admin.js"></script>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
    </body>
</html>