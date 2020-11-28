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
	function correctDate(date){
		return date.getFullYear() + "-" + inputNumberSmallerThanTen((date.getMonth()+1)) + "-" + inputNumberSmallerThanTen(date.getDate()) + "T00:00:00Z";
	}
	function getDateString(date){
		return inputNumberSmallerThanTen(date.getDate()) + "/" + inputNumberSmallerThanTen((date.getMonth()+1)) + "/" + date.getFullYear() ;
	}
	function corectDateForOnlyDate(date){
		let tempDate = date.split("/");
		//năm - tháng - ngày
		return tempDate[2] + "-" + tempDate[1] + "-" + tempDate[0] + "T00:00:00Z" ;
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
					let textRedirectTitle = dictionary.ACCESS_DENIED_SERVER_TITLE ? dictionary.ACCESS_DENIED_SERVER_TITLE : "Bạn không có quyền này";
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
	
	function handleNumber(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
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
	
	//image
	class MyUploadAdapter {
        constructor(loader) {
            // CKEditor 5's FileLoader instance.
            this.fileName= "";
            this.loader = loader;//console.log(getData(dictionary.MSEC));
            // URL where to send files.
            this.url = getUploadImageEditorUrl(getData(dictionary.MSEC));
        }

        // Starts the upload process.
        upload() {
            return new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject);
                this._sendRequest();
            });
        }

        // Aborts the upload process.
        abort() {
            if (this.xhr) {
                this.xhr.abort();
            }
        }

        // Example implementation using XMLHttpRequest.
        _initRequest() {
            this.xhr = new XMLHttpRequest();

            
            //xhr.responseType = 'json';
        }

        // Initializes XMLHttpRequest listeners.
        _initListeners(resolve, reject) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = dictionaryKey.UPLOAD_EDITOR_ERROR;

            xhr.addEventListener('error', () => reject(genericErrorText));
            xhr.addEventListener('abort', () => reject());
            xhr.addEventListener('load', () => {
                const response = xhr.response;
				if(response.code == null && typeof response === "string"){
				let urlResponce = JSON.parse(response)["urls"][0];
					 console.log("responce", urlResponce);
					// If the upload is successful, resolve the upload promise with an object containing
					// at least the "default" URL, pointing to the image on the server.
					resolve({
						default: "http://103.146.22.168:3000/"+urlResponce
					});
				}
                else {
					//console.log("responce", response);
                    return reject(response && response.error ? alert(response.error.message) : alert(genericErrorText));
                }
            });

            if (xhr.upload) {
                xhr.upload.addEventListener('progress', evt => {
                    if (evt.lengthComputable) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                });
            }
        }

        // Prepares the data and sends the request.
        _sendRequest() {
            
            this.loader.file.then(i=>{
                
                const data = new FormData();
                this.fileName = i.name;
            data.append('file', i);
            this.xhr.open('POST', this.url, true);
            this.xhr.send(data);
                });
           
        }
    }

    function myCustomUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new MyUploadAdapter(loader);
        };
    }
	
	function fromDateToString(strDate){
		 let monthTempDate = ["tháng một", "tháng hai", "tháng ba", "tháng tư", "tháng năm", "tháng sáu", "tháng bảy", "tháng tám", "tháng chín", "tháng mười", "tháng mười một", "tháng mười hai"];
		let temppDate = new Date(strDate);
		return "Ngày "+temppDate.getDate()+" " + monthTempDate[temppDate.getMonth()] + " năm " + temppDate.getFullYear();
	}
	
	function fromDateTimeToString(strDate){
		 let monthTempDate = ["tháng một", "tháng hai", "tháng ba", "tháng tư", "tháng năm", "tháng sáu", "tháng bảy", "tháng tám", "tháng chín", "tháng mười", "tháng mười một", "tháng mười hai"];
		let temppDate = new Date(strDate);
		return temppDate.getHours()+" giờ "+temppDate.getMinutes()+" phút,ngày "+temppDate.getDate()+" " + monthTempDate[temppDate.getMonth()] + " năm " + temppDate.getFullYear();
	}
	
	function setInputFilter(textbox, inputFilter) {
		  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
			textbox.addEventListener(event, function() {
			  if (inputFilter(this.value)) {
				this.oldValue = this.value;
				this.oldSelectionStart = this.selectionStart;
				this.oldSelectionEnd = this.selectionEnd;
			  } else if (this.hasOwnProperty("oldValue")) {
				this.value = this.oldValue;
				this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
			  } else {
				this.value = "";
			  }
			});
		  });
		}
	
	/*
    DecoupledEditor
        .create(document.querySelector('#CKEditor'), {
            extraPlugins: [ MyCustomUploadAdapterPlugin ],

        })
        .then(editor => {
            edd = editor;
            const toolbarContainer = document.querySelector( '#toolbar-container' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );
        })
        .catch(error => {
            console.error(error);
        });
	*/
</script>