<!-- BEGIN:main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> HQTECH </title>	
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="style/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="style/css/bootstrap/custom.css" rel="stylesheet" type="text/css" />
    <link href="style/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="style/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="style/js/m_info_user.js"></script>
    <script type="text/javascript" src="style/js/jquery-ui.js"></script>
</head>
<body>
	<div class="index-in container">
	
	    <div class="indexheader-in">
	    	<div class="header">
	            <div class="logo"><a href="index.php?mod=m/main"><img src="style/images/logo.png" alt="" /></a></div>
	            <div class="titin">
	                <p>Klick ein Gericht an, um es in den Warenkorb zu legen</p>
	            </div>
	        </div>
	    </div>
		<div class="indexcontent">
    		<div id="pp-register" >
                 <div id="signup-header" class="col-sm-12 col-xs-12" style="margin-bottom:10px;">
                    <h2 style="margin-top:5px;font-size: 2em;">{RTITLE}</h2>
                    <p>{RPTITLE}</p>
                </div>
			    <div id="ip-register"  >

                    <!-- BEGIN:success -->
                    <div class="col-sm-10 col-sm-offset-2">  
                       <p id="success" style="color:green;">{IFUPDATESUCCESS}</p>
                    </div>  
                    <!-- END:success -->
                    <!-- BEGIN:error -->
                    <div class="col-sm-10 col-sm-offset-2">  
                       <p id="success" style="color:red;">{IFUPDATERROR}</p>
                    </div>  
                    <!-- END:error -->

			        <form id="fr-register"   class="form-horizontal"  method="POST" role="form"> 
                        <div  class="form-group" >
                            <label for="" class="col-sm-2 control-label">{IFEMAIL}</label>
                            <div class="col-sm-10">  
                                <input type="email"  readonly="true" class="form-control" required name="email" id="rg_email"  placeholder="{RPMAIL}"  value="{EMAILUSER}" />
                            </div>
                           
                        </div>
						<div class="form-group">
							<label for="" class="control-label col-sm-2">{IFFIRSTNAME}</label>
							<div class="col-sm-10">	
	                    		<input type="text" required class="form-control" name="firstname" id="rg_firstname" placeholder="{RPFIRSTNAME}" value="{FIRSTNAMEUSER}"/>
	                    	</div>
	                    </div>

	                    <div class="form-group">
							<label for="" class="control-label col-sm-2">{IFLASTNAME}</label>
							<div class="col-sm-10">
	                   		 	<input type="text" required class="form-control" name="lastname" id="rg_lastname" placeholder="{RPLASTNAME}" value="{LASTNAMEUSER}"/>
	                   		</div>
	                   	</div>
                        <!-- BEGIN:male -->
                         <div  class="form-group" >
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="radio">
                                    <label>
                                         <input type="radio"  required name="sex" {SELECTED} id="optionsRadios1" value="1" >{IFMALE}
                                    </label>
                                </div>
                            </div>
                        </div>
                         <div  class="form-group" >
                             <div class="col-sm-offset-2 col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio"  required name="sex" value="0" class="rg_sex" />{IFFEMALE} 
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- END:male -->
                        <!-- BEGIN:female -->
                        <div  class="form-group" >
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="radio">
                                    <label>
                                         <input type="radio"  required name="sex"  id="optionsRadios1" value="1" >{IFMALE}
                                    </label>
                                </div>
                            </div>
                        </div>
                         <div  class="form-group" >
                             <div class="col-sm-offset-2 col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio"  required name="sex" {SELECTED} value="0" class="rg_sex" />{IFFEMALE}  
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- END:female -->
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFPOSTAL}</label>
                            <div class="col-sm-10"> 
                                <input type="text" required class="form-control" name="postalcode" id="rg_postalcode" placeholder="{RPPOSTAL}" value="{POSTALCODEUSER}" />
                            </div>
	                    </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFOFFICE}</label>
                            <div class="col-sm-10">  
                                <input type="text" required class="form-control" name="office" id="rg_office" placeholder="{RPOFFICE}" value="{OFFICEUSER}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFNUMBERHOUSE}</label>
                            <div class="col-sm-10">   
                                <input type="text" required class="form-control" name="numberhouse" id="rg_numberhouse" placeholder="{RPNUMBERHOUSE}" value="{NUMBERHOUSEUSER}"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFNOTEPOSITON}</label>
                            <div class="col-sm-10">  
                                <textarea name="noteposition" class="form-control" id="rg_noteposition" placeholder="{RPNOTEPOSITION}" >{NOTEPOSITIONUSER}</textarea>
                            </div>
                        </div>
                
		                <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFSTRESS}</label>
                            <div class="col-sm-10">    
                                <input type="text" required class="form-control" name="stress" id="rg_stress" placeholder="{RPSTRESS}"  value="{STRESSUSER}" />
                            </div>
                           
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFREGION}</label>
                            <div class="col-sm-10"> 
                                <input type="text" required class="form-control" name="region" id="rg_region" placeholder="{RPREGION}" value="{REGIONUSER}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"> {IFCOMPANY}</label> 
                            <div class="col-sm-10"> 
                                <input type="text" required class="form-control" name="company" id="rg_company" placeholder="{RPCOMPANY}" value="{COMPANYUSER}" />
                            </div>                        
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"> {IFPHONE}</label>
                            <div class="col-sm-10"> 
                                <input type="number" required class="form-control" name="phone" id="rg_phone" placeholder="{RPPHONE}"  value="{PHONEUSER}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFNOTE}</label> 
                            <div class="col-sm-10"> 
                            <textarea name="note" id="rg_note" class="form-control" placeholder="{RPNOTE}">{NOTEUSER}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2 col-xs-10 col-xs-offset-2"> 
                           	    <button type="submit"  class="sm-register btn btn-success btn-lg">{RBUTTON}</button>
                            </div>
                            <p class="successful col-sm-10 col-sm-offset-2" style="display:none;font-size:1.6em;color:green;">{RSUCCESSS}</p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2 col-xs-10 col-xs-offset-2"> 
                                 <button type="button"  class="goto_order_now btn btn-primary btn-lg">{INFOUSERGOTOORDER}</button>
                            </div>
                            <p class="successful col-sm-10 col-sm-offset-2" style="display:none;font-size:1.6em;color:green;">{RSUCCESSS}</p>
                        </div>

			        </form>
			    </div>
			</div>                        
        </div>         


	 	<div class="indextopfoot2  ">
            <div class="topfoot2 ">
                <div class="topfoot2-1 ">
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
    
</body>
</html>
<!-- End:main -->