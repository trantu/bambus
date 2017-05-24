<!-- BEGIN:main -->
<html>
 <meta charset="utf8">
<title> HQTECH </title> 
<head>
    <script>      
        var chosedefault={CHOSEDEFUALT};
        var CPERRORDB='{CPERRORDB}';
        var CPISSETPAS='{CPISSETPASS}';
        var CPSUCCESS='{CPSUCCESS}';
        var CPCFPASSS='{CPCFPASSS}';
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="style/css/m_history.css" rel="stylesheet" type="text/css" />
     <link href="style/css/m_login.css" rel="stylesheet" type="text/css" />
    <link href="style/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="style/css/bootstrap/custom.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="style/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="style/js/m_history.js"></script>

</head>
<body>
    <div class="index-in">
        <div class="indexheader-in">
            <div class="header">
                <div class="logo"><a href="index.php?mod=m/main"><img src="style/images/logo.png" alt=""/></a></div>
                <div class="login">
                    <ul>
                        <!-- BEGIN:loginsession -->
                        <li class="action-logins"><a href="#"><span>{HTTCHANGEPASS}</span></a></li>
                        <li class="action-logout"><a href="index.php?mod=m/logout"><span>{LOGUOT}</span></a></li>
                        <!-- END:loginsession -->
                    </ul>
                </div>
                <div class="titin">
                    <p>Klick ein Gericht an, um es in den Warenkorb zu legen</p>
                </div>
            </div>
        </div>


        <div class="indexcontent">

            <div id="pp-register"  >
               
                <a href="#" class="orderouser-his">   
                    <div id="signup-header" class="infoheader-or col-sm-12 col-xs-12" style=" height:9em;float:left; width:50%; border-left:0.3em solid green;">
                        <h2 style="margin-top:0px;font-size:1.4em;">{HTITLE}</h2>
                        <p style="font-size:1.2em;">{HTITLEHP}</p>  
                    </div>
                </a>
                
                <a href="#" class="infouser-his">
                    <div id="signup-header" class="infoheader-us col-sm-12 col-xs-12" style="height:9em;float:left; width:50%;border-right:3px solid green;">
                        <h2 style="margin-top:0px;font-size:1.4em;">{HTTINFO}</h2> 
                        <p style="font-size:1.2em;">{HTITLEP}</p>
                      
                    </div>
                </a>

                <div id="ip-register" class="col-sm-12 col-xs-12" style="margin-top:20px;">
                    <form  id="fr-register" class="fr-registerss form-horizontal" action="index.php?mod=m/history_order" method="POST" role="form">
                               <!-- BEGIN:success -->
                            <div class="col-sm-10 col-sm-offset-2">  
                               <p id="success">{IFUPDATESUCCESS}</p>
                            </div>  
                            <!-- END:success -->
                            <!-- BEGIN:error -->
                            <div class="col-sm-10 col-sm-offset-2">  
                               <p id="success">{IFUPDATERROR}</p>
                            </div>  
                            <!-- END:error -->

                            <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label">{IFEMAIL}</label>
                                <div class="col-sm-10">  
                                    <input type="email" readonly class="form-control" required name="email" id="rg_email"  placeholder="{RPMAIL}" value="{EMAILUSER}" />
                                </div>

                            </div> 

                            <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label">{IFFIRSTNAME}</label>
                                 <div class="col-sm-10">  
                                    <input type="text" required class="form-control" name="firstname" id="rg_firstname" placeholder="{RPFIRSTNAME}" value="{FIRSTNAMEUSER}" />
                                </div>   
                            </div>
                             <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label">{IFLASTNAME}</label>
                                 <div class="col-sm-10">  
                                    <input type="text" required class="form-control" name="lastname" id="rg_lastname" placeholder="{RPLASTNAME}" value="{LASTNAMEUSER}" />
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
                            <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label">{IFPOSTAL}</label>
                                <div class="col-sm-10">  
                                    <input type="text" required class="form-control" name="postalcode" id="rg_postalcode" placeholder="{RPPOSTAL}" value="{POSTALCODEUSER}" />
                                </div>
                            </div>
                             <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label">{IFOFFICE}</label>
                                 <div class="col-sm-10">  
                                    <input type="text" required class="form-control" name="office" id="rg_office" placeholder="{RPOFFICE}" value="{OFFICEUSER}" />
                                </div>
                            </div>
                            <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label">{IFNUMBERHOUSE}</label>
                                <div class="col-sm-10">  
                                    <input type="text" required class="form-control" name="numberhouse" id="rg_numberhouse" placeholder="{RPNUMBERHOUSE}" value="{NUMBERHOUSEUSER}" />
                                </div>
                            </div>

                            <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label">{IFNOTEPOSITON}</label>
                                <div class="col-sm-10">  
                                     <textarea name="noteposition" class="form-control" id="rg_noteposition" placeholder="{RPNOTEPOSITION}"  >{NOTEPOSITIONUSER}</textarea>
                                </div>
                            </div>
                            <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label">{IFSTRESS}</label>
                                <div class="col-sm-10">    
                                    <input type="text" required class="form-control" name="stress" id="rg_stress" placeholder="{RPSTRESS}" valueold="{STRESSOLD}" value="{STRESSUSER}" />
                                </div>
                            </div>

                              <div  class="form-group" >
                                <label for=""   class="col-sm-2 control-label">{IFREGION}</label>
                                 <div class="col-sm-10">  
                                    <input type="text" required class="form-control" name="region" id="rg_region" placeholder="{Region}" value="{REGIONUSER}"/>
                                </div>
                            </div>
                              <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label"> {IFCOMPANY}</label> 
                                 <div class="col-sm-10">  
                                    <input type="text" required class="form-control" name="company" id="rg_company" placeholder="{RPCOMPANY}" value="{COMPANYUSER}" />
                                </div>
                            </div>
                             <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label"> {IFPHONE}</label>
                                 <div class="col-sm-10">  
                                    <input type="number" required class="form-control" name="phone" id="rg_phone" placeholder="{RPPHONE}" value="{PHONEUSER}" />
                                </div>
                            </div>
                             <div  class="form-group" >
                                <label for="" class="col-sm-2 control-label">{IFNOTE}</label>
                                <div class="col-sm-10">   
                                    <textarea name="note" id="rg_note" class="form-control" placeholder="{RPNOTE}">{NOTEUSER}</textarea>
                                </div>
                            </div>
                            <div  class="form-group" >
                                <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit"  name="sb-register"  class="btn btn-success">{IFBUTTON}</button>
                                </div>
                            </div>    
                          
                    </form>
                 
                    <div class="table-responsive" id="table-historys">
                        <table id="table-history"  class="table table-bordered table-striped">
                            <CAPTION style="padding-top:40px; font-size:20px; font-weight:bold;padding-bottom:20px; color:green;"> {HCATION}</CAPTION>
                            <tr> 
                               <th>{HDAY}</th> 
                               <th>{HQTY}</th>
                               <th>{HTOTALPRICE}</th>
                               <th>{HADDRESS}</th>
                               <th>{HDELETE}</th>
                            
                            </tr>
                            <!-- BEGIN:history -->
                            <tr> 
                               <td>{DAY}</td>
                               <td>{QTY}</td>
                               <td>{TOTAL} {ICONPRICE}</td>
                               <td>{ADDRESSORDER}</td>
                               <td><a href="#" class="delete_order" idDH="{IDDH}">{HDELETE}</a></td>
                            </tr>
                            <!-- END:history -->
                            
                         </table>
                     </div>
                
                </div>
            </div>
        </div>
    </div>
     
     <div class="indextopfoot2 col-sm-12" >
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
            <div class="topfoot2-2">
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

    <!---Change password -->

    <div id="signup" style="position: fixed; opacity: 1; z-index: 11000;width:90%;left:5%;top:10%;display:none;">
        <div id="signup-ct">
            <div id="signup-header" style="padding: 0.5em 1.8em 1.4em 1.8em;">
                <h2>{CPTITLE}</h2>
                <p class="resultmail" style="color:red;font-size:1.8em"></p>
                <a class="modal_close cancel-sign" href="#"></a>
            </div>
            
            <form id="sm-login">

              <div class="txt-fld">
                <label for="">{CPPASSOLD}</label>
                <input id="password_old" name="password_old" type="password" required placeholder="{CPPASSOLD}..">
              </div>
              
              <div class="txt-fld">
                <label for="">{CPPASSNEW}</label>
                <input id="password_new" name="password_new" type="password" required placeholder="{CPPASSNEW}..">
              </div>

              <div class="txt-fld">
                <label for="">{CPPASSCONFIRM}</label>
                <input id="cpassword_new" name="cpassword_new" type="password" required placeholder="{CPPASSCONFIRM}.."> 
                <p class="cpasserror" style="text-align:center;color:red;font-size:14px;font-family: 'PT Sans Narrow', sans-serif;"></p> 
              </div>
               
              <div class="btn-flds" style="text-align:center; padding-bottom:16px;">
                  <div style="text-align:center;padding-top:7px;">
                    <button type="submit" id="login-button">{CPBUTTON}</button> 
                  </div>
              </div>
                   
            </form>

        </div>
    </div>

    <div class="opacity-body"></div>

</body>
</html>
<!-- End:main -->