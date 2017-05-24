<!-- BEGIN:main -->
<html>
 <meta charset="utf8">
<title> HQTECH </title>	
<head>
    <script type="text/javascript">
   
    var errormail='{REEMAIL}';
    var errorrepass='{RERPASS}';
    var errorregister='{RERRESGISTER}';
    var fgsucess='{FGSUCESS}';
    var fgerror='{FGERROR}';
    var sgerror='{SGERROR}';
   
</script>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link href="style/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="style/css/bootstrap/custom.css" rel="stylesheet" type="text/css" />
    <link href="style/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="style/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="style/js/m_register.js"></script>
    <script type="text/javascript" src="style/js/jquery-ui.js"></script>
</head>
<body>
	<div class="index-in container">
	
	    <div class="indexheader-in">
	    	<div class="header">
	            <div class="logo"><a href="index.php?mod=m/home"><img src="style/images/logo.png" alt="" /></a></div>
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
			        <form id="fr-register"  class="form-horizontal"  method="POST" role="form">
                        
                        <div  class="form-group" >
                            <label for="" class="col-sm-2 control-label">{IFEMAIL}</label>
                            <div class="col-sm-10">  
                                <input type="email"  class="form-control" required name="email" id="rg_email"  placeholder="{RPMAIL}"  />
                            </div>
                            <div class="col-sm-10 col-sm-offset-2">  
                            	 <p class="erroremail errorinput" ></p>
                         	</div> 
                        </div>
						
						<div class="form-group">
							<label for="" class="control-label col-sm-2">{RPASSWORD}</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" required name="password" id="rg_password" placeholder="{RPPASSWORD}"/>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="control-label col-sm-2">{RREPASSWORD}</label>
							<div class="col-sm-10">
	                   			 <input type="password" class="form-control" required name="repassword" id="rg_repassword" placeholder="{RPREPASSWORD}"/>
	                   		</div>
	                   	</div>
	                    <p class="errorrepass errorinput col-sm-10 col-sm-offset-2"></p>
						
						<div class="form-group">
							<label for="" class="control-label col-sm-2">{IFFIRSTNAME}</label>
							<div class="col-sm-10">	
	                    		<input type="text" required class="form-control" name="firstname" id="rg_firstname" placeholder="{RPFIRSTNAME}"/>
	                    	</div>
	                    </div>

	                    <div class="form-group">
							<label for="" class="control-label col-sm-2">{IFLASTNAME}</label>
							<div class="col-sm-10">
	                   		 	<input type="text" required class="form-control" name="lastname" id="rg_lastname" placeholder="{RPLASTNAME}"/>
	                   		</div>
	                   	</div>

                       	<div class="form-group">
    						<div class="col-sm-offset-2 col-sm-10">
		                       	<div class="radio">
		  							<label>
								   	 	 <input type="radio"  required name="sex" id="optionsRadios1" value="1" >{RPMALE}
								   	</label>
								</div>
							</div>
						</div>	
						
						<div class="form-group">
    						<div class="col-sm-offset-2 col-sm-10">
								<div class="radio">
		  							<label>
								   	 	  <input type="radio"  required name="sex" id="optionsRadios1" value="0" > {RPFEMALE}
								   	</label>
								</div>
							</div>
						</div>
                        
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFPOSTAL}</label>
                            <div class="col-sm-10"> 
                                <input type="text" required class="form-control" name="postalcode" id="rg_postalcode" placeholder="{RPPOSTAL}"  />
                            </div>
	                    </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFOFFICE}</label>
                            <div class="col-sm-10">  
                                <input type="text" required class="form-control" name="office" id="rg_office" placeholder="{RPOFFICE}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFNUMBERHOUSE}</label>
                            <div class="col-sm-10">   
                                <input type="text" required class="form-control" name="numberhouse" id="rg_numberhouse" placeholder="{RPNUMBERHOUSE}"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFNOTEPOSITON}</label>
                            <div class="col-sm-10">  
                                <textarea name="noteposition" class="form-control" id="rg_noteposition" placeholder="{RPNOTEPOSITION}"  ></textarea>
                            </div>
                        </div>
                
		                <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFSTRESS}</label>
                            <div class="col-sm-10">    
                                <input type="text" required class="form-control" name="stress" id="rg_stress" placeholder="{RPSTRESS}"  />
                            </div>
                           
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFREGION}</label>
                            <div class="col-sm-10"> 
                                <input type="text" required class="form-control" name="region" id="rg_region" placeholder="{RPREGION}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"> {IFCOMPANY}</label> 
                            <div class="col-sm-10"> 
                                <input type="text" required class="form-control" name="company" id="rg_company" placeholder="{RPCOMPANY}" />
                            </div>                        
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label"> {IFPHONE}</label>
                            <div class="col-sm-10"> 
                                <input type="number" required class="form-control" name="phone" id="rg_phone" placeholder="{RPPHONE}"  />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">{IFNOTE}</label> 
                            <div class="col-sm-10"> 
                                <textarea name="note" id="rg_note" class="form-control" placeholder="{RPNOTE}"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2 col-xs-10 col-xs-offset-2"> 
                           	 <button type="submit"  class="sm-register btn btn-success btn-lg">{RBUTTON}</button>
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
                <div class="topfoot2-2 ">
                    <ul>
                        <li> 
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