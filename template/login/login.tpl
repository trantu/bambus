
	<!--infomation user-->
	<article class="form-box getaddressorder">
		<a href="#" class="form-close">
			<img src="style/images/form-close.png" alt="close">
		</a>
		<img src="{FORM_LOGO}" alt="logo">
		<h3>{LANGUAGELOGIN.address_order}</h3><br>
		<form id="address_form_order" action="">
			<label for="Postalcode">{LANGUAGELOGIN.postalcode}</label>
			<input type="text" name="postalcode" required id="info_postalcode" placeholder="{LANGUAGELOGIN.postalcode}">
			<label for="Numberhouse">{LANGUAGELOGIN.house_number}</label>
			<input type="text" name="numberhouse" required id="info_numberhouse" placeholder="{LANGUAGELOGIN.house_number}">
			<label for="Street">{LANGUAGELOGIN.street}</label>
			<input type="text" name="stress" required id="info_stress" placeholder="{LANGUAGELOGIN.street}">
			<label for="Region">{LANGUAGELOGIN.region}</label>
			<input type="text" name="region" required id="info_region" placeholder="{LANGUAGELOGIN.region}">
			<input type="submit"  value="{LANGUAGELOGIN.btn_submit}" style="background-color:{HEADER_COLOR}">
		</form>
	</article>
	<!--/infomation user-->


	<!--LOGIN FORM-->
	<script>
		var error_login="{LANGUAGELOGIN.error}";
		var forget_success="{LANGUAGELOGIN.forget_success}";
		var error_fg_mail="{LANGUAGELOGIN.forget_error}";
		var mail_not_register="{LANGUAGELOGIN.mail_not_register}";
	</script>
	<article class="form-box login">
		<a href="#" class="form-close">
			<img src="style/images/form-close.png" alt="close">
		</a>
		<img src="{FORM_LOGO}" alt="logo">
		<form id="sm-login_home" method="post"  action="index.php?mod=main">
			<!--ERROR MSGS-->
			<label for="login_user" class="error">{LANGUAGELOGIN.error}</label>
			<!--/ERROR MSGS-->
			<input type="text" required name="login-email" id="login-email" placeholder="{LANGUAGELOGIN.email}">
			<input type="password" required name="login-password" id="login-password" placeholder="{LANGUAGELOGIN.password}">
			<input type="checkbox" name="login_remember" id="login_remember">
			<label for="login_remember">{LANGUAGELOGIN.remember}</label>
			&nbsp &nbsp<a href="#" class="popup reset">{LANGUAGELOGIN.forgetpass}</a>
			<input type="submit"  value="{LANGUAGELOGIN.btn_login}">
		</form>
		<p>{LANGUAGELOGIN.dontaccount}<br>
			<a href="index.php?mod=register" class=" register">
				{LANGUAGELOGIN.registern}
			</a>
		</p>
	</article>
	<!--/LOGIN FORM-->

	<!--/Reset passs worrd -->
	<article class="form-box reset">
		<a href="#" class="form-close">
			<img src="style/images/form-close.png" alt="close">
		</a>
		<img src="{FORM_LOGO}" alt="logo">
		<form id="reset-form">
			<!--OK MSGS-->
			<label for="reset_email" class="ok">{LANGUAGELOGIN.pass_sent}</label>
			<!--/OK MSGS-->
			<input type="text" name="reset_email" required id="reset_email" placeholder="{LANGUAGELOGIN.email}">
			<input type="submit" form="reset-form" value="{LANGUAGELOGIN.btn_resetpass}">
		</form>
		
	</article>