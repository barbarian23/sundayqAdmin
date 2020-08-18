<?php

?>

<link rel="stylesheet" href="wp-content/themes/twentytwenty//assets/sweetalert2/dist/sweetalert2.min.css" />
<script type="text/javascript" src="wp-content/themes/twentytwenty//assets/sweetalert2/dist/sweetalert2.min.js"></script>

<link href="wp-content/themes/twentytwenty//assets/css/mobiscroll.javascript.min.css" rel="stylesheet">
<script src="wp-content/themes/twentytwenty//assets/js/mobiscroll.javascript.min.js"></script>
<script>
		window.onload = function(){
			
		}
		
	
	
		function saveData(key,data){
					localStorage.saveItem(key,data);
				}

			function getData(key,data){
					return localStorage.getItem(key);
				}

			function saveToLocalStorage(key, input){
				localStorage.setItem(key, input);
			}

			function getLocalStorage(key){
				return localStorage.getItem(key);
			}


			function setCookie(cname,cvalue,exdays) {
		  var d = new Date();
		  d.setTime(d.getTime() + (exdays*24*60*60*1000));
		  var expires = "expires=" + d.toGMTString();
		  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		function getCookie(cname) {
		  var name = cname + "=";
		  var decodedCookie = decodeURIComponent(document.cookie);
		  var ca = decodedCookie.split(';');
		  for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
			  c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
			  return c.substring(name.length, c.length);
			}
		  }
		  return "";
		}
		function eraseCookie(name) {   
			document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		}function saveData(key,data){
					localStorage.saveItem(key,data);
				}

			function getData(key,data){
					return localStorage.getItem(key);
				}

			function saveToLocalStorage(key, input){
				localStorage.setItem(key, input);
			}

			function getLocalStorage(key){
				return localStorage.getItem(key);
			}


			function setCookie(cname,cvalue,exdays) {
		  var d = new Date();
		  d.setTime(d.getTime() + (exdays*24*60*60*1000));
		  var expires = "expires=" + d.toGMTString();
		  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		function getCookie(cname) {
		  var name = cname + "=";
		  var decodedCookie = decodeURIComponent(document.cookie);
		  var ca = decodedCookie.split(';');
		  for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
			  c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
			  return c.substring(name.length, c.length);
			}
		  }
		  return "";
		}
		function eraseCookie(name) {   
			document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		}
	
		function makeAlertRedirect(){
					let timerIntervalListTeacher;
					let textRedirectTiele = dictionary.SESION_TIMEOUT_SERVER_TITLE;
					let textRedirectSecond = dictionary.SESION_TIMEOUT_SERVER ;
					SunQAlert()
						.position('center')
						.title(textRedirectTiele)
						.html(textRedirectSecond)
						.type('error')
						.timer(dictionaryKey.timeoutReLogin)
						.timerProgressBar(true)
						.confirmButtonColor("#3B4EDC")
						.confirmButtonText(dictionaryKey.AGREE)
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
	
		function makeAlertPermisionDenial(){
					let timerIntervalListTeacher;
					let textRedirectTitle = dictionary.ACCESS_DENIED_SERVER_TITLE;
					SunQAlert()
                    .position('center')
                    .title(textRedirectTitle)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                       
                    })
                    .show();
		}
	
		function clearListImageAndDetailImage(){
			console.log("clearListImageAndDetailImage");
			listImage.length = 0;
			imageDetail = "";
		}
	
		
		function encrypt(input,secretMessage){
		 return encrypted = CryptoJS.AES.encrypt(input, secretMessage);
	}
	
	function decrypto(input,secretMessage){
		let decrypted = CryptoJS.AES.decrypt(encrypted, secretMessage);
		return decrypted.toString(CryptoJS.enc.Utf8);
	}
	
	function webpageRedirect(url){
		window.location.href = url;
	}
	
	function setCallBackForArray(array,func,callback){
		Object.defineProperty(array,func,{
			enumerable: false,
            writable: true,
            value: function(...arg){
                let result = Array.prototype.push.apply(this,arg);
                callback(result);
                return result
            }
		});
	}
	//?mode=offline&page=account&action=edit&id="+item.id+"\"
	function makeATagRedirect(mode,page,action,id){
		if(id){
			return "?mode="+mode+"&page="+page+"&action="+action+"&id="+id;
		}
		return "?mode="+mode+"&page="+page+"&action="+action;
	}
	
	function checkMobileIOS() {
        const toMatch = [
            /webOS/i,
            /iPhone/i,
            /iPad/i,
            /iPod/i,
        ];
        return toMatch.some((toMatchItem) => {
            return navigator.userAgent.match(toMatchItem);
        });
    }
	
	function inputNumberSmallerThanTen(input){
		return input < 10 ? "0" + input : input;
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
	
	function checkEmail(value) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(value).toLowerCase());
    }

	function checkPhone(value){
    	var re = /[0-9]{8,}/;
		return re.test(value);
	}
	
	String.prototype.escape = function() {
    var tagsToReplace = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;'
    };
    return this.replace(/[&<>]/g, function(tag) {
        return tagsToReplace[tag] || tag;
		});
	};
</script>