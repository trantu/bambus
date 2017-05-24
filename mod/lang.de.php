<?php 
if(!defined('SECURITY')) exit('404 - Not Access');
/*
*Config langue 
*đang để theo từng page.Lưu ý có những ngôn ngữ 2,3 page và có ngôn ngữ 1 page
*
*/

/*
*
*Page Home
*
*/

	$home['menu']['home']="Home";//menu text is home
	$home['menu']['about']="About us";//menu text is About
	$home['menu']['menu']="Menu";//menu text is menu
	$home['menu']['contact']="Contact";//menu text is Contact
	$home['enter_stress']="Deine Stadt/Postleitzahl";//chỗ khách hàng nhập đường 
	$home['button_stress']="LIEFERSERVICE FINDEN";// nút bấm tìm đường
	$home['placeholder_stress']="Mohrenstrabe 60";//hiện sẵn trong text input đường
	$home['text_register_login']=" Or: Login And Register";
	$home['sigin']['btrgter']="Register »";
	$home['sigin']['login']="Login and Register  »";
	$home['info']['buttoninfo']=" Save Change";
	$home['info']['title']=" Thông tin của bạn ";
	$home['info']['content']=" Chúng tôi sẽ lấy thông tin này để sử dụng đặt hàng.Bạn có thể thay đổi để chính xác hơn ";
	$home['info']['psuccess']="Thay đổi thành công!";
	$home['info']['gotoorder']="Go to order";

/*
*
*Page Main
*
*/

	/* het thoi gian lam viec */
	$main['timeout']['timeout_title']="Time out! You must chose go on!";//tieu de thoi gian het gio
	$main['timeout']['order']="Order first";//button chon order truoc
	$main['timeout']['see']="See it";//button chon xem truoc

	$main['priceorder_title']="You must order min";// tieu de khi order chua du tien

	/* quen password */
	$main['forget']['title']="Fill email of you registered";//tieu de khi quen mat khau
	$main['forget']['placeholder']="Email login...";//hiện sẵn gợi ý 
	$main['forget']['button']="Send Mail >>";//tên button gửi mail
	$main['forget']['success']="Successfully! Please! Check Mail!";//thông báo gửi mail quên mật khẩu
	$main['forget']['error']="Error! Try Again!";

	/*
	*
	*SignIn
	*
	*/

	$main['sigin']['title']="Sign In account !";
	$main['sigin']['titlep']="If haven't account!";
	$main['sigin']['titleregister']="Register here ! ";
	$main['sigin']['email']="Email";
	$main['sigin']['emailplace']="example@gmail.com";
	$main['sigin']['password']="Password";
	$main['sigin']['passwordplace']="Password....";
	$main['sigin']['fgpassword']="Forget Password ?";
	$main['sigin']['btsignup']="Sign Up »";
	$main['sigin']['btrgter']="Register »";
	$main['sigin']['login']="LOGIN";
	$main['sigin']['myaccount']="MY ACCOUNT";
	$main['sigin']['logout']="Log Out";
	$main['sigin']['error']="Login Error! Try Again!";
	/* 
	*
	*Register
	*
	*/
	$main['register']['title']="Create a new account";
	$main['register']['ptitle']="It's simple, and free.";
	$main['register']['success']="Register successfully!";
	$main['register']['login']="Login here!";
	$main['register']['pmail']="Email..";
	$main['register']['ppassword']="Password..";
	$main['register']['password']="Password";
	$main['register']['prepasseword']="Repassword..";
	$main['register']['repasseword']="Repassword";
	$main['register']['pfirstname']="Firtname..";
	$main['register']['plastname']="Lastname...";
	$main['register']['pmale']="Male";
	$main['register']['pfemale']="Female";
	$main['register']['ppostal']="Postal Code..";
	$main['register']['poffice']="Office..";
	$main['register']['pnumberhouse']="Number House..";
	$main['register']['pnoteposition']="Note Position..";
	$main['register']['pstress']="Stress..";
	$main['register']['pregion']="Region...";
	$main['register']['pcompany']="Company....";
	$main['register']['pphone']="Phone..";
	$main['register']['pnote']="Note...";
	$main['register']['button']="REGISTER NOW";
	$main['register']['erroremail']="ERROR:Email isset! Check again!";
	$main['register']['errorrepass']="ERROR:Repassword different";
	$main['register']['errorregister']="Error register! Check Again!";


	/** Note **/
	$main['note']['title']="Note";
	$main['note']['content']="Nếu quý khách không ăn được thành phần nào trong món ăn này hoặc làm theo cách của quý khách thì quý khách hãy ghi chú cho chúng tôi biết về món ăn này ở dưới.Nếu quý khách ko có ghi chú, quý khách có thể nhấn Order để bỏ qua.Cảm ơn quý khách!Rất hân hạnh được phục vụ quý khách!";
	$main['note']['button']="Order";
	$main['note']['placeholder']="Note....";


	/* CART */
	$main['cart']['minimum_title']="Minimum Order";
	$main['cart']['summe']="Summe";
	$main['cart']['btorder']="Order";
	$main['cart']['side-dish']="Chose Side-dish";//title món ăn thêm
	$main['cart']['qty']="QTY";
	$main['cart']['step']="STEP";

	/* Main menu in mobile*/
	$main['menu']['Speisekarte']='Speisekarte';
	$main['menu']['Bewertungen']='Bewertungen';
	$main['menu']['Info']='Info';



/*
*
*PAGE history order and infomation
*
*/

	/* Page History  Tab infomation */
	$history['info']['ttchangepass']="CHANGE PASSWORD";
	$history['info']['title']="Infomation of you";
	$history['info']['titlep']="You can change it !";
	$history['info']['updatesuccess']="Update Successfully";
	$history['info']['updateerror']="Update Try Again!";
	$history['info']['mail']="Email";
	$history['info']['password']="Password";
	$history['info']['repasseword']="Repassword";
	$history['info']['firstname']="Firtname";
	$history['info']['lastname']="Lastname";
	$history['info']['male']="Male";
	$history['info']['female']="Female";
	$history['info']['postal']="Postal Code";
	$history['info']['office']="Office";
	$history['info']['numberhouse']="Number House";
	$history['info']['noteposition']="Note Position";
	$history['info']['stress']="Stress";
	$history['info']['region']="Region";
	$history['info']['company']="Company";
	$history['info']['phone']="Phone";
	$history['info']['note']="Note";
	$history['info']['button']="UPDATE NOW";



	/* Tab history */
	$history['history']['title']="History order of you";
	$history['history']['titlep']="You can delete it!";
	$history['history']['cation']="HISTORY ORDER OF YOU!";
	$history['history']['day']="DAY";
	$history['history']['qty']="Qty";
	$history['history']['totalprice']="TotalPrice";
	$history['history']['address']="Address";
	$history['history']['delete']="Delete";

	$history['changepass']['title']="Change password!";
	$history['changepass']['passold']="Password old";
	$history['changepass']['passnew']="Password new";
	$history['changepass']['passconfirm']="Confirm Password";
	$history['changepass']['button']="CHANGE PASSWORD »";
	$history['changepass']['errordb']="Connect database error";
	$history['changepass']['issetpass']="Password old not isset!";
	$history['changepass']['success']="Password change successfuly!";
	$history['changepass']['jconfirmpass']="Confirm password not ok!";



/* 
*
*PAGE ORDER 
*
*/
	$order['title']="Infomation of you";
	$order['titlep']="You can change it when by products!";
	$order['name']="Name";
	$order['buttonpay']="PAYMENT TO PAYPAL";
	$order['buttonstress']="Click change default";




/*
*
*Page SEnd mail&& page paypal_success
*
*/
	$mp['title']="Order successfully! Thank you for you!";
	$mp['titlep']="Click Come back main";
	$mp['titlepa']="here";
	$mp['titlepn']="come back now!";
	$mp['titlecart']="INFORMATION CART";
	$mp['name']="Name";
	$mp['qty']="Qty";
	$mp['totalprice']="TotalPrice";//tỒng tiên từng món ăn
	$mp['beilage']="Beilage";
	$mp['plu']="PLU";
	$mp['total']="ToTal:";///tổng tiền order
	$mp['titleaddress']="INFORMATION ADDRESS";
	$mp['errorsendmail']="Error send mail! Please call with contact us order.!";
	$mp['note']="note";



/*
*Cart mobile
*/
	$cart['button']="ZUR KASSE GEHEN";
?>