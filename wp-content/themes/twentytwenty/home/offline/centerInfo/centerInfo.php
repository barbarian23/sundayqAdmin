<?php
include get_theme_file_path("home/offline/centerInfo/status-uicenterInfo.php");
include get_theme_file_path("home/offline/centerInfo/interact-uicenterInfo.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="centerinfo-page-loading">
        <span id="centerinfolesson-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="centerinfo-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="centerinfo-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<div class="manage-list-lecture-title">
        <span id="currentTitle" style="text-transform:capitalists"><?php echo $GLOBALS["CENTER_INFO_TITLE"]; ?></span>
    </div>

	 <div class="manage-teacher-contain-right">
		<div class="manage-section-infomation-right" id="centerImage">
            <div class="manage-section-infomation-right-title">
                <span id="spanNameOfLectureReference"></span>
            </div>
			<span class="manage-section-infomation-right-list-image-title"><?php echo $GLOBALS["CENTER_IMAGE"]; ?></span>
            <div class="manage-section-infomation-right-list-image" id="listLEctureImg">
				
                <!-- 				<img id="lecture-list-img" class="manage-section-infomation-right-item" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'> -->
                <div>


                   
                </div>
            </div>
			<div class="manage-section-infomation-right-item-div-add">
			 <label for="uploadImgLectureURLL">
				 		<span id="btnAddImageLecture"><?php echo $GLOBALS["LECTURE_ADD_IMAGE"] ?></span>
                        <input type="file" id="uploadImgLectureURLL" name="uploadImgLectureURL">
             </label>
			</div>
        </div>
    </div>
	
    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- openTime -->
            <span><?php echo $GLOBALS["CENTER_INFO_OPEN_TIME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idOpenTime" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["CENTER_INFO_OPEN_TIME_PLACEHOLDER"]; ?>' required>

            <!-- address -->
            <span><?php echo $GLOBALS["CENTER_INFO_ADDRESS"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idAddress" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["CENTER_INFO_ADDRESS_PLACEHOLDER"]; ?>' required>
			
			<!-- phoneService -->
            <span><?php echo $GLOBALS["CENTER_INFO_PHONESERVICE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idPhoneService" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["CENTER_INFO_PHONESERVICE_PLACEHOLDER"]; ?>' required>
			
			<!-- phoneBusiness -->
            <span><?php echo $GLOBALS["CENTER_INFO_PHONEBUSSINES"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idPhoneBussiness" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["CENTER_INFO_PHONEBUSSINES_PLACEHOLDER"]; ?>' required>
			
				<!-- email -->
            <span><?php echo $GLOBALS["CENTER_INFO_EMAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idEmail" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["CENTER_INFO_EMAIL_PLACEHOLDER"]; ?>' required>

    </div>
 </div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='centerinfolessonSubmit' value='<?php echo $GLOBALS["CENTER_INFO_EDIT_SUBMIT"]; ?>' id="centerinfolessonSubmit">
    </div>
</form>
<script>
    let myCurrentcenterinfolesson = {},dataPrice = []
    , centerinfolessonDescription = "";
	
    window.onload = function() {
        myCurrentcenterinfolesson = {};
			if (getCurrentACtion() == dictionaryKey.editStatus) {
            //fetch từ server
            setLoadingDatacenterinfo(true);
            requestToSever(
                sunQRequestType.get,
                getHome(),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDatacenterinfo(false);
                    if (res.code === networkCode.success) {
                        myCurrentcenterinfolesson.centerInfo = res.data.centerInfo;
						myCurrentcenterinfolesson.banner =  res.data.banner;
						
                        console.log(res.data);
                        console.log(myCurrentcenterinfolesson);
                    	dataPrice = [...res.data.prices];
						
                        document.getElementById("idOpenTime").value = myCurrentcenterinfolesson.centerInfo.openTime == null ? "" : myCurrentcenterinfolesson.centerInfo.openTime;
						
                        document.getElementById("idAddress").value = myCurrentcenterinfolesson.centerInfo.address == null ? "" : myCurrentcenterinfolesson.centerInfo.address;

                      document.getElementById("idPhoneService").value = myCurrentcenterinfolesson.centerInfo.phoneService == null ? "" : myCurrentcenterinfolesson.centerInfo.phoneService;
						
                        document.getElementById("idPhoneBussiness").value = myCurrentcenterinfolesson.centerInfo.phoneBusiness == null ? "" : myCurrentcenterinfolesson.centerInfo.phoneBusiness;
						
						document.getElementById("idEmail").value = myCurrentcenterinfolesson.centerInfo.email == null ? "" : myCurrentcenterinfolesson.centerInfo.email;
						
						if (myCurrentcenterinfolesson.banner != null) {
							let parent = document.getElementById("listLEctureImg");
                            myCurrentcenterinfolesson.banner.forEach((item, index) => {
								let imgLEctureParrent = document.createElement("div");
								imgLEctureParrent.className = "manage-section-infomation-right-item";
								
								let imgTempLEcture = document.createElement("img");
								imgTempLEcture.id = "lecture-img-" + (index + 1);
								imgTempLEcture.className = "manage-section-infomation-right-item-img";
								imgTempLEcture.src = getHomeURL() + item;
								let imgLEctureClose = document.createElement("div");
								imgLEctureClose.className = "manage-section-infomation-right-list-image-drop";
								imgLEctureClose.innerHTML = "x";
								imgLEctureClose.addEventListener("click",function(){
									imgLEctureClose.remove();
									imgLEctureParrent.remove();
									myCurrentcenterinfolesson.banner.splice(index,1);
								})
                                /*imgTempLEcture = imgTempLEcture + "<div class=>x</div><img id=\"lecture-img-" + (index + 1) + "\"  class=\"manage-section-infomation-right-item\" src=\"" + getHomeURL() + item + "\" >";*/
								imgLEctureParrent.appendChild(imgLEctureClose);
								imgLEctureParrent.appendChild(imgTempLEcture);
								parent.appendChild(imgLEctureParrent);
                            });
							
                        } else {
						    document.getElementById("btnAddImageLecture").innerHTML = '<?php echo $GLOBALS["LECTURE_LECTURE_NO_IMAGE"]; ?>';
						}
						
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDatacenterinfo(dictionaryKey.ERR);
                    console.log(dictionaryKey.ERR_INFO, err);
                    SunQAlert()
                        .position('center')
                        .title(dictionaryKey.ERROR_API_MESSAGE)
                        .type('error')
                        .confirmButtonColor("#3B4EDC")
                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                        .callback((result) => {
                            webpageRedirect(window.location.href);
                        })
                        .show();
                }
            );

        } else{
			 //createQuestion(0);
			  }	

		
       
    }

	function upLoadIteminListImage(file) {
        let dataLectureImgage = new FormData();
        dataLectureImgage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDatacenterinfo(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDatacenterinfo(false);
               if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					console.log(res);
					if (myCurrentcenterinfolesson.banner == null){
						myCurrentcenterinfolesson.banner = [];
					}
					myCurrentcenterinfolesson.banner.push(res.url);
					
					let parent = document.getElementById("listLEctureImg");
                	//parent.innerHTML = "";
                	
					let imgLEctureParrent = document.createElement("div");
					imgLEctureParrent.className = "manage-section-infomation-right-item";
					
                	let imgTempLEcture  = document.createElement("img");
                	imgTempLEcture.id = "lecture-img-" + myCurrentcenterinfolesson.banner.length + "" ;
					let index = myCurrentcenterinfolesson.banner.length;
                	imgTempLEcture.className = "manage-section-infomation-right-item-img";
                	imgTempLEcture.src = getHomeURL()+res.url;
                	
					let imgLEctureClose = document.createElement("div");
					imgLEctureClose.id=myCurrentcenterinfolesson.banner.length;
								imgLEctureClose.className = "manage-section-infomation-right-list-image-drop";
								imgLEctureClose.innerHTML = "x";
								imgLEctureClose.addEventListener("click",function(){
								    imgLEctureParrent.remove();
									imgTempLEcture.remove();
									imgLEctureClose.remove();
									myCurrentcenterinfolesson.banner.splice(index,1);
								})
					imgLEctureParrent.appendChild(imgLEctureClose);
					imgLEctureParrent.appendChild(imgTempLEcture);
					parent.appendChild(imgLEctureParrent);
				}
            },
            function(err) {
				 setLoadingDatacenterinfo(false);
                console.log(dictionaryKey.ERR_INFO, err);
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.IMAGE_LOADED_FAILED)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //webpageRedirect(window.location.href);
                    })
                    .show();
            },
			true
        );
    }
	
	 document.getElementById("uploadImgLectureURLL").addEventListener("change", function(evt) {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        //upLoadImage(tgt.files[0]);
        // FileReader support
        //console.log("xxxxxxzz");
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {

                //alert("input");				
                upLoadIteminListImage(files[0]);
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    });
	
	document.getElementById("idOpenTime").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentcenterinfolesson.centerInfo.openTime = tttValue.escape();
    });
	
	document.getElementById("idAddress").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentcenterinfolesson.centerInfo.address = tttValue.escape();
    });
                    
	document.getElementById("idPhoneService").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentcenterinfolesson.centerInfo.phoneService = tttValue.escape();
    });
                        
	document.getElementById("idPhoneBussiness").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentcenterinfolesson.centerInfo.phoneBusiness = tttValue.escape();
    });
						
	document.getElementById("idEmail").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentcenterinfolesson.centerInfo.email = tttValue.escape();
    });
   
	function checkNullInputt(val){
		return val == null || val == "";
	}
	
    //submit form
    document.getElementById("centerinfolessonSubmit").addEventListener("click", function(e) {
        e.preventDefault();
		if(checkNullInputt(myCurrentcenterinfolesson.centerInfo.openTime)){
			 SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.WRONG_CENTER_INFO_OPEN_TIME)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
		} else if(checkNullInputt(myCurrentcenterinfolesson.centerInfo.address)){
			 SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.WRONG_CENTER_INFO_OPEN_ADDRESS)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
		}else if(checkNullInputt(myCurrentcenterinfolesson.centerInfo.phoneService)){
			 SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.WRONG_CENTER_INFO_OPEN_PHONE_SERVICE)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
		}else if(checkNullInputt(myCurrentcenterinfolesson.centerInfo.phoneBusiness)){
			 SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.WRONG_CENTER_INFO_OPEN_PHONE_BUSINESS)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
		}else if(checkNullInputt(myCurrentcenterinfolesson.centerInfo.email)){
			 SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.WRONG_CENTER_INFO_OPEN_EMAIL)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
		}else if(checkNullInputt(myCurrentcenterinfolesson.banner)){
			 SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.WRONG_CENTER_INFO_BANNER)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
		}
       else{
            let titlleRequestFreeLesson = dictionaryKey.REQUEST_EDIT;
            //alert("data lên " + JSON.stringify(myCurrentcenterinfolesson));
            SunQAlert()
                .position('center')
                .title(titlleRequestFreeLesson)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentcenterinfolesson = Object.assign({},myCurrentcenterinfolesson);
						
						//tempmyCurrentcenterinfolesson.prices = [...dataPrice];
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }
						//delete tempmyCurrentcenterinfolesson.banner;
            //console.log("data lên " + JSON.stringify(tempmyCurrentcenterinfolesson));
                        setLoadingDatacenterinfo(true);
                        requestToSever(
                           sunQRequestType.put,
                            putCenterInfoandBanner(),
                            tempmyCurrentcenterinfolesson,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDatacenterinfo(false);
                                let sunqalertsuccess = dictionaryKey.CENTER_INFO_EDIT_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
										
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=centerinfo&action=edit");
                                        })
                                        .show();
                                } else if (res.code === networkCode.accessDenied) {
                                    makeAlertPermisionDenial();
                                } else if (res.code === networkCode.sessionTimeOut) {
                                    makeAlertRedirect();
                                } else {
                                    //alert("loi"+JSON.stringify(res));
                                    SunQAlert()
                                        .position('center')
                                        .title(dictionaryKey.SERVER_INFO + res.message)
                                        .type('error')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                        .callback((result) => {})
                                        .show();
                                }
                            },
                            function(err) { //alert("err");
                                setLoadingDatacenterinfo(dictionaryKey.ERR);
                                let sunqalertfailed =dictionaryKey.CENTER_INFO_EDIT_FAILED;
                                SunQAlert()
                                    .position('center')
                                    .title(sunqalertfailed)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                        // webpageRedirect(window.location.href);

                                    })
                                    .show();
                                console.log(dictionaryKey.ERR_INFO, err);
                            }
                        );
						
						 //banner
// 		    let tempmyCurrentcenterinfolessonbanner = Object.assign({},myCurrentcenterinfolesson);
// 					delete tempmyCurrentcenterinfolessonbanner.openTime;
// 					delete tempmyCurrentcenterinfolessonbanner.address;
// 					delete tempmyCurrentcenterinfolessonbanner.phoneService;
// 					delete tempmyCurrentcenterinfolessonbanner.phoneBusiness;
// 					delete tempmyCurrentcenterinfolessonbanner.email;
		   
//                         setLoadingDatacenterinfo(true);
//                         requestToSever(
//                            sunQRequestType.put,
//                             putBanner(),
//                             tempmyCurrentcenterinfolessonbanner,
//                             getLocalStorage(dictionary.MSEC),
//                             function(res) {
//                                 setLoadingDatacenterinfo(false);
//                                 let sunqalertsuccess = dictionaryKey.CENTER_INFO_EDIT_SUCCESS;
//                                 if (res.code === networkCode.success) {
//                                     //myCurrentTeacher = res.data;
//                                     SunQAlert()
//                                         .position('center')
//                                         .title(sunqalertsuccess)
//                                         .type('success')
//                                         .confirmButtonColor("#3B4EDC")
//                                         .confirmButtonText(dictionaryKey.AGREE)
//                                         .callback((result) => {
										
//                                             //webpageRedirect(getAdminHomeURL() + "page=centerinfo&action=edit");
//                                         })
//                                         .show();
//                                 } else if (res.code === networkCode.accessDenied) {
//                                     makeAlertPermisionDenial();
//                                 } else if (res.code === networkCode.sessionTimeOut) {
//                                     makeAlertRedirect();
//                                 } else {
//                                     //alert("loi"+JSON.stringify(res));
//                                     SunQAlert()
//                                         .position('center')
//                                         .title(dictionaryKey.SERVER_INFO + res.message)
//                                         .type('error')
//                                         .confirmButtonColor("#3B4EDC")
//                                         .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                                         .callback((result) => {})
//                                         .show();
//                                 }
//                             },
//                             function(err) { //alert("err");
//                                 setLoadingDatacenterinfo(dictionaryKey.ERR);
//                                 let sunqalertfailed =dictionaryKey.CENTER_INFO_EDIT_FAILED;
//                                 SunQAlert()
//                                     .position('center')
//                                     .title(sunqalertfailed)
//                                     .type('error')
//                                     .confirmButtonColor("#3B4EDC")
//                                     .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                                     .callback((result) => {
//                                         // webpageRedirect(window.location.href);

//                                     })
//                                     .show();
//                                 console.log(dictionaryKey.ERR_INFO, err);
//                             }
//                         );
                    }
                })
                .show();
						
                    }
           
    });
</script>