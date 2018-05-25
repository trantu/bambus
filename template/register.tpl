<!-- BEGIN:main -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{TITLE} | Registrierung</title>
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="style/css/animate.css">
    <link rel="stylesheet" href="style/css/tooltipster.css">
    <link rel="stylesheet" href="style/css/custom.css">
    <link rel="stylesheet" href="style/css/giohangpopup.css">
    <link href="style/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{FAVICON_ICO}">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <script>
        var email_isset="{LANGUAGEREGISTER.email_isset}";
        var repassword_false="{LANGUAGEREGISTER.repassword_false}";
    </script>
</head>
<body>
    <header>
       {FILE {TEMPLATEHEADER}}
    </header>
    <div id="profile-wrap">
        <section id="profile">
            <article class="left" style="width:100%">
                <h2><span>{LANGUAGEREGISTER.title_register}</span></h2>
                    <hr><hr>
                    <p class='errorrepass' style="color:red; text-align:center;padding-bottom:20px;">{REGISTERSTATUS}</p>
                    <form id="delivery-info" action='index.php?mod=register' method="post">
                        <div>
                            <div>
                                <label for="email">{LANGUAGEREGISTER.emailyou}</label>
                                <input type="text" required value="{EMAILUSER}" placeholder="{LANGUAGEREGISTER.emailyou_holder}" id="info_email" name="email">
                            </div>
                            <div>
                                <label for="name">{LANGUAGEREGISTER.password}</label>
                                <input type="password"  required name="password" id="info_password" placeholder="{LANGUAGEREGISTER.password_holder}"/>
                            </div>

                            <div>
                                <label for="name">{LANGUAGEREGISTER.repassword}</label>
                                <input type="password" class="inputs" required name="repassword" id="info_repassword" placeholder="{LANGUAGEREGISTER.repassword_holder}"/>
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
                                <label for="phone"> {LANGUAGEREGISTER.postalcode}</label>
                                <input type="text" required placeholder="{LANGUAGEREGISTER.postalcode_holder}" value="{POSTALCODEUSER}" id="info_postalcode" name="postalcode">
                            </div>
                            <div style="height:86px;">
                                <span style="display:block ;float:left;width:100px;padding-top: 20px;" >
                                    <input  type="radio" {IFMALE}  style="display:block" required name="sex" id='male_sex' value="1" /><span style='font-family: "Source Sans Pro", sans-serif;'>{LANGUAGEREGISTER.male}</span>
                                </span >
                                <span style="display:block ;float:left;width:100px;padding-top: 20px;">
                                    <input  type="radio" {IFFEMALE} style="display:block" required name="sex" id="female_sex" value="0"/><span style='font-family: "Source Sans Pro", sans-serif;'>{LANGUAGEREGISTER.female}</span>
                                </span>
                            </div>
        
                            <div>
                                <label for="address">{LANGUAGEREGISTER.office}</label>
                                <input type="text"  placeholder="{LANGUAGEREGISTER.office}" value="{OFFICEUSER}" id="info_office" name="office">
                            </div>
                        </div>
                        <div>
                            <div>
                                <label for="apartament">{LANGUAGEREGISTER.numberhouse}</label>
                                <input type="text" required placeholder="{LANGUAGEREGISTER.numberhouse_holder}" value="{NUMBERHOUSEUSER}" id="info_numberhouse" name="numberhouse">
                            </div>
                            
                            <div>
                                <label for="stress">{LANGUAGEREGISTER.street}</label>
                                <input type="text" required  name="stress"  value="{STRESSUSER}"id="info_stress" placeholder="{LANGUAGEREGISTER.street_holder}"/> 
                            </div>
                            <div>
                                <label for="Region">{LANGUAGEREGISTER.region} </label>
                                <input type="text" readonly name="region" value="{REGIONUSER}" id="info_region" placeholder="{LANGUAGEREGISTER.region_holder}"/>
                            </div>
                            <div>
                                <label for="company">{LANGUAGEREGISTER.company}</label>
                                <input type="text" name="company" value="{COMPANYUSER}" id="info_company" placeholder="{LANGUAGEREGISTER.company_holder}"/>
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
                            </div>
                        </div>
                        <input type="submit" id="payment-paypal" value="{LANGUAGEREGISTER.btn_payment}" 
                        style=''>
                        <!-- BEGIN:success -->
                           <!--  <p id="success" style="font-size:18px; color:red;text-align:center;">{REGISTERSTATUS}</p> -->
                         <!-- END:success -->
                    </form>
            </article>
            <div class="cleaner"></div>
        </section>
    </div>

    {FILE {TEMPLATEFOOTER}}
    {FILE {TEMPLATELOGIN}}
  <section class="form-box-overlay"></section>

  <script src="style/js/jquery-1.11.1.min.js"></script>
  <script src="style/js/jquery.bxslider.min.js"></script>
  <script src="style/js/imgLiquid-min.js"></script>
  <script src="style/js/jquery.tooltipster.min.js"></script>
  <script src="style/js/wow.min.js"></script>
  <script src="style/js/profile.js"></script>
  <script src="style/js/menu.js"></script>
  <script src="style/js/forms.js"></script>
  <script src="style/jsme/login.js"></script>
  <script src="style/jsme/register.js"></script>
  <script src="style/jsme/jquery-ui.js"> </script>
  <script type="text/javascript" src="style/jsme/custom-slideshow.js"></script>
<style>
    @media (max-width: 500px ) {
        #payment-paypal{width: 45% !important;}
    }
</style>
</body>
</html>

<!-- END:main-->