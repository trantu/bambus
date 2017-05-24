<!-- BEGIN: main -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <script>
        var SGERROR='{SGERROR}';
        var FGSUCCESS='{FGSUCCESS}';
         var FGERROR='{FGERROR}';
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HQ TECH</title>
    <link href="style/css/style-mobile.css" rel="stylesheet" type="text/css" />
    <link href="style/css/m_jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="style/css/m_login.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="style/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="style/js/autogoogle.js"></script>
    <script type="text/javascript" src="style/js/jquery-ui.js"></script>
    <script type="text/javascript" src="style/js/m_home.js"></script>
</head>

<body>
<div class="opacity-body"></div>
<div class="index">
	
    <div class="indexheader">
    	<a href="#"><img src="style/images/logo.png" alt="" /></a>
	</div>
    <div class="indexmenu">
    	<div class="menu">
        	<select onchange="GotoURL(this)"  class="form" name="cboWebLink" style=" float:left; width:100%; height:100px; background:black; color:white; font-size: 50px;text-transform: uppercase;">
                <option value="#">{HOME}</option>
                <option value="#">{ABOUT}</option>
                <option value="#">{MENU}</option>
                <option value="#">{CONTACT}</option>
            </select>
        </div>
    </div>
    <div class="indexbanner">
    	<div class="banner">
        	<div class="hd">
                <div class="dht">
                	<form name="input"  action="index.php?mod=m/main" method="POST">
                        <p>{ENTERSTRESS}</p>
                        <input type="text" class="tx2" required id="address" name="address" placeholder="{PLACEHOLDER}"/>
                         
                        <input  class="tx3" type="submit" value="{BUTTONSTRESS}"/>
                        <p style="margin-top:115px;">{TEXTLOGINREGISTER}</p>
                        <input  class="tx3 action-login" style="position:relative;margin-top: 140px;" type="button" value="{BUTTONLOGINREGISTER}"/>
                    </form>                    
                </div>

            </div>
        	<div class="imgbanner"><img src="style/images/banner.jpg" alt="" /></div>
        </div>
    </div>
    <div class="indextopfoot">
    	<div class="topfoot">
        	<div class="topfoot-1">
            	<h3>Shortly About us</h3>
                <span>Mes cuml dia sed ineni as in ger to lot aliiq tes dolore ipsum.</span>
                <p>Mes cuml dia sed in lacus ut enisscet ingerto aliiqt es site emet eimod ictor ut ligulate ameti dapibus ticdu nt mtseb lusto dolor ltissim com. Mes cuml dia sed inertio</p>
				<p>Mes cuml dia sed in lacus ut enisscet ingerto aliiqt es site emet eimod ictor ut ligulate ameti dapibus ticdu nt mtseb lusto dolor ltissim com. Mes cuml dia sed inertio dapibus ticdu nt mtseb lusto dolor ltissim com. Mes cuml dia sed inertio</p>
            </div>
            <div class="topfoot-2">
            	<h3>What's new?</h3>
                <ul>
                	<li>
                    	<ul>
                            <li class="date"><p>11</p><span>Dec</span></li>
                            <li class="cont">
                            	<a href="#">Mes cuml dia sed in lacus utt</a>
                            	<p>Mes cuml dia sed in lacus ut enisscet ingerto aliiqt es site emet eimod ictor ut ligulate ameti dapibus ticdu nt mtseb lusto dolor ltissim com. Mes cuml dia sed inertio</p>
                            </li>
                    	</ul>
                    </li>
                    <li>
                    	<ul>
                            <li class="date"><p>12</p><span>Dec</span></li>
                            <li class="cont">
                            	<a href="#">Mes cuml dia sed int</a>
	                            <p>Mes cuml dia sed in lacus ut enisscet ingerto aliiqt es site emet eimod ictor ut ligulate ameti dapibus ticdu nt mtseb lusto dolor ltissim com. Mes cuml dia sed inertio</p>
                            </li>
                    	</ul>
                    </li>
                </ul>
            </div>
            <div class="topfoot-3">
            	<h3>Opening Hours</h3>
                <ul>
                <!-- BEGIN:rowtime -->
                	<li>
                    	<a>
                            <span style="color:#e74c3c;">{DAY}:</span>
                            <span style="color:white;">{TIME}</span>
                        </a>
                    </li>
                <!-- END:rowtime-->
                </ul>
            </div>
        </div>
    </div>
    <div class="indextopfoot2">
    	<div class="topfoot2">
        	<div class="topfoot2-1">
            	<ul>
                	<li> <!-- BEGIN:addressstore -->
                        <a href="#">{NAMESTORE}</a></br>
                        <a href="#">{ADDRESSSTORE}</a></br>
                        <a href="#">{REGIONSTORE}</a>
                        <!-- END:addressstore -->
                    </li>
                </ul>
            </div>
            <div class="topfoot2-2" style="overflow:hidden;">
                <ul style="margin-left:-3.8em;">
                    <li style="background:none;"> 
                        <!-- BEGIN:contactus -->
                        <a href="#">{TELEPHONE}</a></br>
                        <a href="#">{EMAILCONTACT}</a>
                        <!-- END:contactus -->   
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>



<!-- popup login -->
<div id="signup" style="position: fixed; opacity: 1; z-index: 11000000; left:4%;width:96%;height:65em; margin-left:-2%; top:5%;">
    <div id="signup-ct">
        <div id="signup-header">
            <h2 style="font-size: 4em;">{SGTITLE}</h2>
            <p  style="font-size:2.8em;">{SGTITLEP} <a class="ins-popupregister" href="index.php?mod=m/register" style="color:red;font-size:1.4em;">{SGTITLEREGISTER}</a></p>
            <a class="modal_close cancel" href="#"></a>
        </div>
        
        <form id="sm-login">

          <div class="txt-fld">
            <label for="">{SGEMAIL}</label><br>
            <input id="login-email" class="good_input" name="login-email" type="email" required placeholder="{SGEMAILP}" >
          </div>

          <div class="txt-fld">
            <label for="">{SGPASSWORD}</label><br>
            <input id="login-password" name="login-password" type="password" required placeholder="{SGPASSWORDP}">
          </div>
           
          <div class="txt-fld">
            <a  href="#" class="forget-pass"><label> {SGFGPASS}</label><br> </a>
          </div>
          <div class="btn-flds" style="text-align:center; padding-bottom:16px;">
              <div style="text-align:center;padding-top:7px;">
                <button type="submit" id="login-button">{SGBTSIGNUP}</button>
                <a href="index.php?mod=m/register"><button type="button" class="ins-popupregister">{SGBTRGTER}</button></a>
              </div>
          </div>
               
        </form>

    </div>
</div>


<div class="formpassword" >
    <div id="signup-header" style="text-align:center;height:auto;">
        <h2 style="font-size:3em"> {FGTITLE}</h2>
        <a class="modal_close cancel-forget" href="#"></a>
    </div>
    <form  id="form-forgetpass" style="text-align:center">      
        <input type="email" style="margin-top:1em;" id="email-forget" name="email-forget" placeholder="{FGPLACE}" />
        <input type="submit" value="{FGBUTTON}" id="sb-forget"  style="margin-top:1em;padding: 0.9em 1em;"/><br><br>
    </form>
</div>



</body>
</html>
<!-- END: main -->