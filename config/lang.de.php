<?php
if(!defined('SECURITY')) exit('404 - Not Access');
/**
*Config langue
*đang để theo từng page.Lưu ý có những ngôn ngữ 2,3 page và có ngôn ngữ 1 page
*
**/


/**
#
# Language header top .Log in log out
#
**/

	$de_top['top_login']="LOGIN";
	$de_top['top_notmember']="Noch nicht Kunde? ";
	$de_top['top_registernow']='Registrieren';
	$de_top['top_myaccount']="Mein Konto";
	$de_top['top_logout']="LOGOUT";

/**
#
# Language Menu
#
**/
	$de_menu['home']			='HOME';
	$de_menu['about']			='ÜBER UNS';
	$de_menu['shop']			='BESTELLUNG';
	$de_menu['cart']			='WARENKORB';
	$de_menu['cart_item']		='Bestellungen';
	$de_menu['cart_total']		='Gesamt';
	$de_menu['cart_checkout']	='Weiter zur Bestellung';
	$de_menu['cart_thankyou']	='Danke für Ihre Bestellung!';
	$de_menu['contact']			='IMPRESSUM';

/**
#
# Language footer
#
**/

$de_footer['the_samurai']	="BAMBUSSTÄBCHEN";
$de_footer['all_right'] 	="- Alle Rechte vorbehalten 2015";

/**
#
#Langue login
#
**/

	$de_login['address_order']		='Addresse';
	$de_login['postalcode']			='Postleitzahl';
	$de_login['house_number']		='Hausnummer';
	$de_login['street']				='Straße';
	$de_login['region']				='Region';
	$de_login['btn_submit']			='Abschließen';
	$de_login['error']				='Benutzname oder Kennwort ist unkorrekt...';
	$de_login['email']				='Email...';
	$de_login['password']			='Kennwort...';
	$de_login['remember']			='Angemeldet bleiben';
	$de_login['dontaccount']		='Sie haben noch kein Konto bei uns';
	$de_login['btn_login']			='Login';
	$de_login['registern']			='Registriere dich jetzt!';
	$de_login['pass_sent']			='Kennwort wird an Ihrer Email gesendet.';
	$de_login['btn_resetpass']		='zurücksetzen';

	/* quen password */
	$de_login['forgetpass']				="Kennwort vergessen?";
	$de_login['forget']['title']		="Email hinzufügen";//tieu de khi quen mat khau
	$de_login['forget']['placeholder']	="Email login...";//hiện sẵn gợi ý
	$de_login['forget']['button']		="Email senden >>";//tên button gửi mail
	$de_login['forget_success']			="Email versendet!";//thông báo gửi mail thành công
	$de_login['forget_error']		    ="Fehler! Wiederholen!";// Thông báo Mail gửi không dc
	$de_login['mail_not_register']		="Diese Email ist nicht registriert!";// Thông báo Mail này chưa đăng ký



/**
#
# Page Home
#
**/

	$de_home['the_best']="Probieren Sie";
	$de_home['asian_cuise']="Uns";
	$de_home['in_all']="";
	$de_home['start_you']="Sofort Online Bestellen!";


/**
#
# Page Main
#
**/

	$de_main['deine_address']='IHRE ADRESSE';
	$de_main['btn_submit']='Abschließen';
	$de_main['haccount']='Sie haben doch ein Konto?';
	$de_main['lginnow']='Login jetzt!';
	$de_main['categories']='Menü';
	$de_main['total']='Summe';
	$de_main['yoderticket']='Warenkorb';
	$de_main['cartsubtotal']='Zwischensumme:';
	$de_main['ordermin']='Mindestbestellwert:';
	$de_main['notetext']='Notiz...';
	$de_main['addcart']='Abschließen';
	$de_main['confirmorder']='Abschließen';
	$de_main['thankforu']='Danke für Ihre Bestellung!';
	$de_main['name']='Speisen';
	$de_main['food']='';
	$de_main['btn_back']='Zurück';
	$de_main['btn_next']='Weiter';
	$de_main['btn_quit']='Verlassen';
	$de_main['enter_address_hover']='BRODOWINER RING 16, 12679 Berlin';
	$de_main['timeout']['timeout_title']="Zurzeit keine Bestellannahme!";//tieu de thoi gian het gio
	$de_main['timeout']['order']="Vorbestellung";//button chon order truoc
	$de_main['timeout']['see']="Menü anschauen";//button chon xem truoc
	$de_main['priceorder_title']="Sie sollen mindesten bestellen";// tieu de khi order chua du tien
	$de_main['txt_menu_gruppe_mobile']="Menü Übersicht";
	$de_main['notice_address_fail']="Leider ist die Bestellung außerhalb unseres Liefergebiet!";
	$de_main['please_check_checkbox']="Bitte kreuzen Sie an!";
	/* Main menu in mobile*/
	$de_main['showmenu']='Show Menu';
	$de_main['hidemenu']='Hide Menu';
	$de_main['showcart']='Show cart';
	$de_main['hidecart']='Hide cart';
	/*$de_main['menu']['Speisekarte']='Speisekarte';
	$de_main['menu']['Bewertungen']='Bewertungen';
	$de_main['menu']['Info']='Info';
	*/

/**
#
# Langue cart
#
**/

	$de_cart['note']['title']="Note";
	$de_cart['note']['content']="ALLERGIKER AUFGEPASST! \r \n Bitte teilen Sie uns mit, welche Zutaten und Speisen bei Ihnen Allergien oder Unverträglichkeit auslösen können.";
	$de_cart['note']['button']="Bestellung";
	$de_cart['note']['placeholder']="Note....";
	$de_cart['cart']['minimum_title']="Mindestbestellwert";
	$de_cart['cart']['summe']="Summe";
	$de_cart['cart']['btorder']="Zur Kasse";
	$de_cart['cart']['side-dish']="Beilagen und Zutaten";//title món ăn thêm
	$de_cart['cart']['qty']="Stk";
	$de_cart['cart']['step']="Auswahl";
	$de_cart['cantback']="Sie können nicht zurück!";

/**
#
#Langue page checkout
#
**/

	$de_checkout['your_cart']="Warenkorb";
	$de_checkout['product']="Speisen";
	$de_checkout['description']="Beschreibung";
	$de_checkout['price']="Preis";
	$de_checkout['quantity']="Menge";
	$de_checkout['subtotal']="Zwischensumme";
	$de_checkout['rmcart']="Entfernen";
	$de_checkout['address_fail']="Adresse ist nicht verfügbar!";
	$de_checkout['order_min']="Mindesbestellwert";
	$de_checkout['deliver']="Liefer Informationen";
	$de_checkout['type_payment']="Zahlungsart *";
	$de_checkout['cash']="Bargeld";
	$de_checkout['paypal']="Paypal";
	$de_checkout['credit']="Kreditkarte";
	$de_checkout['mobile']="EC";
	$de_checkout['address_deliver']="Zustelladresse *";
	$de_checkout['confirm_order']="Bestellen";
	$de_checkout['address_fail']="Ungünstige Adresse!Bitte wiederholen Sie!";
	$de_checkout['money_fail']="Bitte noch mehr bestellen!";

 /* THÔNG BÁO LỖI KHI CHECKOUT*/
	$de_checkout['enter_housenumber']="Bitter erfühlen Sie die Hausnummer Ihrer Adresse";
	$de_checkout['enter_stress']="Bitter erfühlen Sie die Straße Ihrer Adresse";
	$de_checkout['enter_postalcode']="Bitter erfühlen Sie die PLZ Ihrer Adresse";
	$de_checkout['enter_region']="Bitter erfühlen Sie die Stadt Ihrer Adresse";

	$de_checkout['enter_firstname']="Bitter erfühlen Sie Ihre Vorname";
	$de_checkout['enter_lastname']="Bitter erfühlen Sie Ihre Nachname";
	$de_checkout['enter_phone']="Bitter erfühlen Sie Ihre Phonenummer";
	$de_checkout['enter_email']="Bitter erfühlen Sie  Ihre Email";
	$de_checkout['buy_more']="Bitter auswählen Sie mehr Gericht";
	$de_checkout['please_wait']="Etwas geduldt. System ist im Prozess.";
	$de_checkout['alert_paid']="Vielen Dank für Ihre Bestellung, wir werden in ca. 45 Minuten zu Ihnen liefern.";


/**
#
#Langue register
#
**/


	$de_register['emailyou']='Ihre Email Adresse *';
	$de_register['emailyou_holder']='info@abc.de';
	$de_register['password']='Kennwort *';
	$de_register['password_holder']='Kennwort';
	$de_register['repassword']='Kennwort wiederholen';
	$de_register['repassword_holder']='Kennwort wiederholen';
	$de_register['male']='Herr';
	$de_register['female']='Frau';
	$de_register['firstname']='Vorname*';
	$de_register['firstname_holder']='Vorname';
	$de_register['lastname']='Nachname *';
	$de_register['lastname_holder']='Nachname';
	$de_register['postalcode']='Postleitzahl *';
	$de_register['postalcode_holder']='Postleitzahl';
	$de_register['numberhouse']='Hausnummer*';
	$de_register['numberhouse_holder']='Hausnummer';
	$de_register['street']='Straße *';
	$de_register['street_holder']='Straße';
	$de_register['region']='Region *';
	$de_register['region_holder']='Region';
	$de_register['office']='Büro';
	$de_register['office_holder']='Büronummer';
	$de_register['company']='Firma';
	$de_register['company_holder']='Firma';
	$de_register['phone']='Telefon *';
	$de_register['phone_holder']='Telefon';
	$de_register['notePosition']='Adresszusatz';
	$de_register['notePosition_holder']='4. Stock, hinteres Haus, im Hof, rote Tür';
	$de_register['younote']='Notiz';
	$de_register['younote_placeholder']='';
	$de_register['btn_payment']='REGISTRIEREN';
	$de_register['register_success']='Sie haben sich erfolgreich registriert!';
	$de_register['click_toshop']='zum Shop';
	$de_register['register_error']='Registrierung fehlgeschlagen. Versuchen Sie es erneut!';
	$de_register['title_register']='Registrieren';
	$de_register['email_isset']='Email existiert bereits!';
	$de_register['repassword_false']='Kennwort stimmt nicht überein!';
	$de_register['btn_saveinfo']="Speichen";
//LANGUAGE MY ACCOUNT
$de_register['title_account']='Mein Konto';


/*
*
*PAGE history order and infomation
*
*/

	/* Page History  Tab infomation */
	$history['info']['ttchangepass']="Kennwort ändern";
	$history['info']['title']="Infomation of you";
	$history['info']['titlep']="Sie können es noch ändern !";
	$history['info']['updatesuccess']="Speichen erfolgreich";
	$history['info']['updateerror']="Speichen fehlgeschagen!";
	$history['info']['mail']="Email";
	$history['info']['password']="Kennwort";
	$history['info']['repasseword']="Kennwort wiederholen";
	$history['info']['firstname']="Vorname";
	$history['info']['lastname']="Nachname";
	$history['info']['male']="Herr";
	$history['info']['female']="Frau";
	$history['info']['postal']="Postleitzahl";
	$history['info']['office']="Büro";
	$history['info']['numberhouse']="Hausnummer";
	$history['info']['noteposition']="Adresszusatz";
	$history['info']['stress']="Straße";
	$history['info']['region']="Region";
	$history['info']['company']="Firma";
	$history['info']['phone']="Telefon";
	$history['info']['note']="Notiz";
	$history['info']['button']="Speichen";



	/* Tab history */
	$history['history']['title']="Bestellverlauf";
	$history['history']['titlep']="Sie können es entfernen!";
	$history['history']['cation']="BESTELLVERLAUF!";
	$history['history']['day']="Datum";
	$history['history']['qty']="Stk";
	$history['history']['totalprice']="Summe";
	$history['history']['address']="Adresse";
	$history['history']['delete']="Entfernen";

	$history['changepass']['title']="Kennwort ändern!";
	$history['changepass']['passold']="altes Kennwort";
	$history['changepass']['passnew']="neues Kennwort";
	$history['changepass']['passconfirm']="Kennwort wiederholen";
	$history['changepass']['button']="KENNWORT ÄNDERN»";
	$history['changepass']['errordb']="Verbindung zum Server fehlgeschlagen";
	$history['changepass']['issetpass']="Kennwort unkorrekt!";
	$history['changepass']['success']="Kennwort Änderung erfolgreich!";
	$history['changepass']['jconfirmpass']="Kennwort stimmt nicht überein!";



/*
*
*Page SEnd mail&& page paypal_success
*
*/
	$mp['title']="Bestellung erfolgreich! Vielen Dank!";
	$mp['titlep']="Zurück zu Hauptseite";
	$mp['titlepa']="Klick hier";
	$mp['titlepn']="Zurück!";
	$mp['titlecart']="Bestellinformation";
	$mp['name']="Name";
	$mp['qty']="Stk";
	$mp['totalprice']="Summe";//tỒng tiên từng món ăn
	$mp['beilage']="Beilage";
	$mp['plu']="PLU";
	$mp['total']="ToTal:";///tổng tiền order
	$mp['titleaddress']="KUNDEN INFORMATIONEN";
	$mp['errorsendmail']="Bestellung fehlgeschlagen! Bitte kontaktieren Sie uns!";
	$mp['note']="Notiz";


/*
*Cart mobile
*/
	//$cart['button']="ZUR KASSE GEHEN";
?>
