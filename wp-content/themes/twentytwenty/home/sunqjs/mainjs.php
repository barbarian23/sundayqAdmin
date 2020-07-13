<?php

?>

<link rel="stylesheet" href="wp-content/themes/twentytwenty//assets/sweetalert2/dist/sweetalert2.min.css" />
<script type="text/javascript" src="wp-content/themes/twentytwenty//assets/sweetalert2/dist/sweetalert2.min.js"></script>

<link href="wp-content/themes/twentytwenty//assets/css/mobiscroll.javascript.min.css" rel="stylesheet">
<script src="wp-content/themes/twentytwenty//assets/js/mobiscroll.javascript.min.js"></script>
<script>
		window.onload = function(){
			let sunqModeOfflineDiv = document.getElementById("divShowOffline");
			sunqModeOfflineDiv && sunqModeOfflineDiv.addEventListener("click",function(){
				setMode(sunQMode.offline);
			});


			let sunqModeOnlineDiv = document.getElementById("divShowOnline");
			sunqModeOnlineDiv && sunqModeOnlineDiv.addEventListener("click",function(){
				setMode(sunQMode.online);
			});
		}
		
		function makeAlertRedirect(){
					let timerIntervalListTeacher;
					let textRedirectTiele = dictionary.SESION_TIMEOUT_SERVER_TITLE;
					let textRedirectSecond = dictionary.SESION_TIMEOUT_SERVER ;
					SunQAlert()
						.position('center')
						.title(textRedirectTiele)
						.html(textRedirectSecond)
						.type('success')
						.timer(dictionaryKey.timeoutReLogin)
						.timerProgressBar(true)
						.confirmButtonColor("#3B4EDC")
						.confirmButtonText("Đồng ý")
						.onBeforeOpen(()=>{
							 Swal.showLoading()
							timerIntervalListTeacher = setInterval(() => {
							  let content = Swal.getContent()
							  if (content) {
								const b = content.querySelector('b')
								if (b) {
								  b.textContent = Swal.getTimerLeft()
								}
							  }
							}, 100);
						})
						.callback((result) => {
							clearTimeout(timerIntervalListTeacher);
							let urlLoginLEctureTimeout = getLoginURL();
							webpageRedirect(urlLoginLEctureTimeout);
						   })
						  .show();
		}
	
		function clearListImageAndDetailImage(){
			console.log("clearListImageAndDetailImage");
			listImage.length = 0;
			imageDetail = "";
		}
	
		function saveData(key,data){
			localStorage.saveItem(key,data);
		}
	
	function getData(key,data){
			return localStorage.getItem(key);
		}
	
		function encrypt(input,secretMessage){
		 return encrypted = CryptoJS.AES.encrypt(input, secretMessage);
	}
	
	function decrypto(input,secretMessage){
		let decrypted = CryptoJS.AES.decrypt(encrypted, secretMessage);
		return decrypted.toString(CryptoJS.enc.Utf8);
	}
	
	function saveToLocalStorage(key, input){
		localStorage.setItem(key, input);
	}
	
	function getLocalStorage(key){
		return localStorage.getItem(key);
	}
	
	function webpageRedirect(url){
		window.location.href = url;
	}
	
	function checkSession(){
		requestToSever(
			sunQRequestType.get,
			getURLCheckToken(),
			null,
			getData(dictionary.MSEC),
			function(res){
				console.log(res);
				if(res.code === networkCode.success){
					 
				} else if(res.code === networkCode.sessionTimeOut){
						  webpageRedirect(getLoginURL());
				 }
			},
			function(err){
// 				if(res != undefined){
// 				if(res.code === networkCode.sessionTimeOut){
// 					 webpageRedirect(getLoginURL());
// 				 }
// 				}
			}
		);
	}
</script>