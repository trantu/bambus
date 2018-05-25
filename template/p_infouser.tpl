<!-- BEGIN:main -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{TITLE} | Shop</title>
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/animate.css">
    <link rel="stylesheet" href="style/css/tooltipster.css">
        <link rel="stylesheet" href="style/css/custom.css">
    <link href="style/css/jquery-ui.css" rel="stylesheet" type="text/css" /
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <!-- favicon -->
    <link rel="icon" href="{FAVICON_ICO}">
</head>
<body>

    <header>
    {FILE {TEMPLATEHEADER}}
    </header>
    <!--/HEADER-->


    <!--PROFILE-->
    <div id="profile-wrap">
        <section id="profile">
             
                <!--/NEW DISHES-->
            </aside>
            <article class="left">
                <h2><span>{LANGUAGEREGISTER.title_account}</span> </h2>
                    <hr><hr>
                    <form id="delivery-info" action='' method="post">
                        <div>
                            <label for="email">{LANGUAGEREGISTER.emailyou}</label>
                            <input type="text" required value="{EMAILUSER}" placeholder="{LANGUAGEREGISTER.emailyou_holder}" id="info_email" name="email">
                        </div>
                        <div>
                            <label for="name">{LANGUAGEREGISTER.firstname}</label>
                            <input type="text" required id="info_firstname" value="{FIRSTNAMEUSER}" name="firstname" placeholder="{LANGUAGEREGISTER.firstname_holder}">
                        </div>

                        <div>
                            <label for="name">{LANGUAGEREGISTER.lastname}</label>
                            <input type="text" required id="info_lastname" value="{LASTNAMEUSER}" name="lastname" placeholder="{LANGUAGEREGISTER.lastname_holder}">
                        </div>
                        <div>
                            <label for="phone">{LANGUAGEREGISTER.postalcode}</label>
                            <input type="text" required placeholder="{LANGUAGEREGISTER.postalcode_holder}" value="{POSTALCODEUSER}" id="info_postalcode" name="postalcode">
                        </div>
                        <div style="height:86px;">
                            <span style="display:block ;float:left;width:100px;padding-top: 20px;" >
                                <input  type="radio" {IFMALE}  style="display:block" required name="sex" id='male_sex' value="1" />{LANGUAGEREGISTER.male}
                            </span >
                            <span style="display:block ;float:left;width:100px;padding-top: 20px;">
                                <input  type="radio" {IFFEMALE} style="display:block" required name="sex" id="female_sex" value="0"/>{LANGUAGEREGISTER.female}
                            </span>
                        </div>

                        
                        <div>
                            <label for="address">{LANGUAGEREGISTER.office}</label>
                            <input type="text" placeholder="{LANGUAGEREGISTER.office_holder}" value="{OFFICEUSER}" id="info_office" name="office">
                        </div>
                        <div>
                            <label for="apartament">{LANGUAGEREGISTER.numberhouse}</label>
                            <input type="text" required placeholder="{LANGUAGEREGISTER.numberhouse_holder}" value="{NUMBERHOUSEUSER}" id="info_numberhouse" name="numberhouse">
                        </div>
                        
                        <div>
                            <label for="stress">{LANGUAGEREGISTER.street}</label>
                            <input type="text" required  name="stress"  value="{STRESSUSER}"id="info_stress" placeholder="{LANGUAGEREGISTER.street_holder}"/> 
                        </div>
                        <div>
                            <label for="Region">{LANGUAGEREGISTER.region}</label>
                            <input type="text" required  name="region" value="{REGIONUSER}" id="info_region" placeholder="{LANGUAGEREGISTER.region_holder}"/>
                        </div>
                        <div>
                            <label for="company">{LANGUAGEREGISTER.company}</label>
                            <input type="text"   name="company" value="{COMPANYUSER}" id="info_company" placeholder="{LANGUAGEREGISTER.company_holder}"/>
                        </div>
                        <div>
                            <label for="Phone">{LANGUAGEREGISTER.phone}</label>
                            <input type="text" required  name="phone" value="{PHONEUSER}" id="info_phone" placeholder="{LANGUAGEREGISTER.phone_holder}"/>
                        </div>
                        <div>
                            <label for="NotePosition">{LANGUAGEREGISTER.notePosition}</label>
                            <textarea name="noteposition"  id="info_noteposition" placeholder="{LANGUAGEREGISTER.notePosition_holder}">{NOTEPOSITIONUSER}</textarea>
                        </div>
                        <div>
                            <label for="Note">{LANGUAGEREGISTER.younote}</label>
                            <textarea id="specifications info_note" name="note"  placeholder="{LANGUAGEREGISTER.younote_placeholder}">{NOTEUSER}</textarea>
                            <input type="submit" id="payment-paypal" value="{LANGUAGEREGISTER.btn_saveinfo}" 
                        style=''>
                        </div>
                        <!-- BEGIN:success -->
                            <p id="success" style="font-size:18px; color:red;text-align:center;">{IFUPDATESUCCESS}</p>
                         <!-- END:success -->
                    </form>
            </article>
            <div class="cleaner"></div>
        </section>
    </div>
    <!--/PROFILE-->
    
{FILE {TEMPLATEFOOTER}}
 {FILE {TEMPLATELOGIN}}
<!--jQuery-->
<script src="style/js/jquery-1.11.1.min.js"></script>
<script src="style/js/jquery.bxslider.min.js"></script>
<script src="style/js/imgLiquid-min.js"></script>
<script src="style/js/jquery.tooltipster.min.js"></script>
<script src="style/js/jquery.tooltipster.min.js"></script>
<script src="style/js/wow.min.js"></script>
<script src="style/js/menu.js"></script>
<script src="style/js/profile.js"></script>
<script type="text/javascript" src="style/jsme/jquery-ui.js"></script>
<script type="text/javascript" src="style/jsme/custom-slideshow.js"></script>
</body>
</html>
<!-- END:main -->