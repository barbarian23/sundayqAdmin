<?php

?>
<form class="login-contain" id=sunqLogin>
        <div class="login-input" id="loginInputLabel">
            <label>Đăng nhập</label>
        </div>
        <div class="login-input">
            <span>
                <?php echo $GLOBALS["LOGIN_USERNAME_LABEL"]; ?>
            </span>
            <input type="text" placeholder="Nhập tên tài khoản" id="username" name="username" required>
        </div>

        <div class="login-input">
            <span>
                <?php echo $GLOBALS["LOGIN_PASSWORD_LABEL"]; ?>
            </span>
            <input type="password" placeholder="Nhập mật khẩu" id="password" name="password" required>
        </div>

        <div class="login-input">
			<span id="loginErrorSpan"></span>
            <input type="submit" value="Đăng nhập" class="ripple" id="submitLogin">
			<div class="login-input-loading" id="loginLoading">
				
			</div>
        </div>
</form>
<script>
	document.getElementById("submitLogin").addEventListener("click",function(e){
		e.preventDefault();
		let dataLogin = {
			email: document.getElementById("username").value,
  			password: document.getElementById("password").value
		}
		setLogging(true);
		requestToSever(
			sunQRequestType.post,
			getURLLogin(),
			dataLogin,
			null,
			function(res){
				setLogging(false);
				if(res.code === networkCode.success){
					setLogInFailed(false,'');
					localStorage.setItem(dictionary.MSEC,res.data.token);
					webpageRedirect(getAdminHomeURL());
				}else{
					setLogInFailed(true,'<?php echo $GLOBALS["LOGIN_WRONG_USERNAME_PASWORD"]; ?>');
				}
			},
			function(err){
				console.log("err login",err);
				setLogInFailed(true,'<?php echo $GLOBALS["ERROR_CONNECTION_TRY_AGAIN"]; ?>');
				setLogging(false);
			}
		);
	});

</script>