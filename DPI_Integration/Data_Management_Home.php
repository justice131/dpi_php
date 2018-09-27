<!DOCTYPE HTML>
<html>
    <head>
        <title>DPI Data Management System</title>
        <link href="lib/bootstrap/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <script src="js/jquery.min.js"></script>
        <link href="css/db_style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:100,300,400,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="header_bottom">
          <div class="container">
                <div class="logo">
                   <a href="main.php"><img src="images/logo.png" width="45%" alt=""/></a>
                </div>
                <div class="consul_btn1"><a href="#">Free Consultation</a></div>
                    <div class="menu">
                        <div class="h_menu4">
                            <ul class="nav">
                                <li class="layui-nav-item">
                                    <!--<a class="javascript:;" href="javascript:;" onclick=showdiv_import("")>
                                      <i class="layui-icon" style="top: 5px;">&#xe612;</i><cite>Import Data</cite>
                                    </a>-->
                                </li>
                                <li class="layui-nav-item">
                                    <!--<a class="javascript:;" href="javascript:;" onclick=showdiv_manage("")>
                                      <i class="layui-icon" style="top: 5px;">&#xe612;</i><cite>Delete Data</cite>
                                    </a>-->
                                </li>
                            </ul>
                            <!--<script type="text/javascript" src="js/nav.js"></script>-->
                        </div>
                        <script type="text/javascript">
                            jQuery(document).ready(function($) {
                                $(".scroll").click(function(event){		
                                        event.preventDefault();
                                        $('html,body').animate({scrollTop:$(this.hash).offset().top},800);
                                });
                            });
                        </script>
                        <div class="clearfix"> </div>
                    </div>
          </div>
        </div>
        
        <div class="slider" id="home">
         <div class="slider_container">
            <div class="wmuSlider example1">
                       <div class="wmuSliderWrapper">
                            <article style="position: absolute; width: 100%; opacity: 0;"> 
                                <div class="banner-wrap">
                                        <div class="slider-left">
                                               <p class="top">Water Management System</p>
                                        </div>
                                </div>
                               </article>
                            <article style="position: relative; width: 100%; opacity: 1;"> 
                                <div class="banner-wrap">
                                    <div class="slider-left">
                                        <p class="top">Water Source Visualization</p>
                                    </div>
                                </div>
                            </article>
                        </div>
            </div>
            <script src="js/jquery.wmuSlider.js"></script> 	           	      
           </div>
       </div>

        <div class="footer-bottom">
             <div class="container">
                 <div class="copy">
                     <p>&copy; 2018 by <a target="_blank"> Department of Primary Industries (NSW)</a></p>
                 </div>
             </div>
         </div>
         <script type="text/javascript">
             $('.example1').wmuSlider();    
         </script>
         <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
    </body>
</html>