<?php
include get_theme_file_path("home/offline/banner/status-banner.php");
include get_theme_file_path("home/offline/banner/interact-ui-banner.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="banner-page-loading">
        <span id="bannerlesson-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="banner-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="banner-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<div class="manage-list-lecture-title">
        <span id="currentTitle" style="text-transform:capitalists"></span>
    </div>
	
    <div class="manage-teacher-contain-left">
		<div class="manage-section-infomation-right">
            <div class="manage-section-infomation-right-title">
                <span id="spanNameOfLectureReference"></span>
            </div>
			<span class="manage-section-infomation-right-list-image-title"><?php echo $GLOBALS["LECTURE_LIST_IMAGE"]; ?></span>
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
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='bannerlessonSubmit' value='<?php echo $GLOBALS["banner_PLAN_SUBMIT_ADD"]; ?>' id="bannerlessonSubmit">
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script>
<script>
    let myCurrentbannerlesson = {}
    , bannerlessonDescription = "";
	
    window.onload = function() {
        myCurrentbannerlesson = {};
	
		if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("bannerlessonSubmit").value = '<?php echo $GLOBALS["banner_PLAN_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDatabanner(true);
            requestToSever(
                sunQRequestType.get,
                getURLLesson(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDatabanner(false);
                    if (res.code === networkCode.success) {
                        myCurrentbannerlesson = res.data.lesson;
                        //month
                        let tempDatee = new Date();
                        tempDatee.setMonth(myCurrentbannerlesson.month - 1);
                        mobiscroll.datetime('#idbannerlessonMonth', {
                            theme: 'ios',
                            themeVariant: 'light',
                            layout: 'fixed',
                            //minDate: tempDatee,
                            dateFormat: 'd/mm/yy',
                            //dateFormat:'d/mm/yyyy', 
                            timeFormat: 'H:ii',
                            display: 'bubble',
                        });
						let tempDate = new Date();
			tempDate.setMonth(myCurrentbannerlesson.month);
			let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
			let monthmonth = monthTemp[tempDate.getMonth()] + ",năm " + tempDate.getFullYear();
						
						
                        document.getElementById("shortDescriptionImg").src =  myCurrentbannerlesson.thumbnailUrl != null ? getHomeURL() + myCurrentbannerlesson.thumbnailUrl : '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>';
						
                        document.getElementById("idbannerlessonMonth").value = monthmonth;
                        //title
                        document.getElementById("idTitlebannerlesson").value = myCurrentbannerlesson.title == null ? "" : myCurrentbannerlesson.title;

                        //description
                        bannerlessonDescription.setData(myCurrentbannerlesson.description != null ? myCurrentbannerlesson.description : "");

                        //sub description
                        document.getElementById("bannerlessonSubDetailTextArea").value = myCurrentbannerlesson.shortDescription == null ? "" : myCurrentbannerlesson.shortDescription;

						 //KIT
                        currentKit = myCurrentbannerlesson.kitId;
                        selectKitIndex(currentKit);

                        //resource
                         myCurrentbannerlesson.resources && myCurrentbannerlesson.resources.forEach((item, index) => {
							 console.log("video id", item);
							 if(item){
                            selectVideoIndex(item.id);
                            currentVideos.push(item.id);
							 }
                            //console.log("video", currentOwners);
                        });
						
						//quesstion
						if(myCurrentbannerlesson.questions != null){
							myCurrentbannerlesson.questions.forEach((item,index)=>{console.log("quesstion chooosen",item);
								selectQuestionIndex(item.id);
                            	currentQuestions.push(item.id);
								//number,title,a1,a2,a3,a4,correct,explain
								//createQuestion(index,item.content,item.a,item.b,item.c,item.d,item.answer,item.answer);
							})
						}
						
                        console.log(res.data);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDatabanner(dictionaryKey.ERR);
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
        setLoadingDataLEcture(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataLEcture(false);
               if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					//alert("réult"+myCurrentLecture.otherImgUrls);
					console.log(res);
					if (myCurrentLecture.otherImgUrls == null){
						myCurrentLecture.otherImgUrls = [];
					}
					myCurrentLecture.otherImgUrls.push(res.url);
					
					let parent = document.getElementById("listLEctureImg");
                	//parent.innerHTML = "";
                	
					let imgLEctureParrent = document.createElement("div");
					imgLEctureParrent.className = "manage-section-infomation-right-item";
					
                	let imgTempLEcture  = document.createElement("img");
                	imgTempLEcture.id = "lecture-img-" + myCurrentLecture.otherImgUrls.length + "" ;
					let index = myCurrentLecture.otherImgUrls.length;
                	imgTempLEcture.className = "manage-section-infomation-right-item-img";
                	imgTempLEcture.src = getHomeURL()+res.url;
                				//console.log("add",parent.innerHTML);
//                 let imgTempLEcture = "<img id=\"lecture-img-" +getCurrentACtion() == dictionaryKey.editStatus ? myCurrentLecture.otherImgUrls.length : "" + "\"  class=\"manage-section-infomation-right-item\" src=\"" + res.urls + "\" >";
//                 				//console.log("imgTempLEcture",imgTempLEcture);
//                 	let parentImgList = imgTempLEcture + parent.innerHTML;
                	
					let imgLEctureClose = document.createElement("div");
					imgLEctureClose.id=myCurrentLecture.otherImgUrls.length;
								imgLEctureClose.className = "manage-section-infomation-right-list-image-drop";
								imgLEctureClose.innerHTML = "x";
								imgLEctureClose.addEventListener("click",function(){alert(index);
								    imgLEctureParrent.remove();
									imgTempLEcture.remove();
									imgLEctureClose.remove();
									myCurrentLecture.otherImgUrls.splice(index,1);
								})
                                /*imgTempLEcture = imgTempLEcture + "<div class=>x</div><img id=\"lecture-img-" + (index + 1) + "\"  class=\"manage-section-infomation-right-item\" src=\"" + getHomeURL() + item + "\" >";*/
					imgLEctureParrent.appendChild(imgLEctureClose);
					imgLEctureParrent.appendChild(imgTempLEcture);
					parent.appendChild(imgLEctureParrent);
				}
            },
            function(err) {
                //setLoadingDataLEcture(dictionaryKey.ERR);
				 setLoadingDataLEcture(false);
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

    document.getElementById("listQuestionClose").addEventListener("click", function(e) {
        getChoosingQuestionbanner() ? setChoosingQuestionbanner(false) : setChoosingQuestionbanner(true);
    });
	
   
    //submit form
    document.getElementById("bannerlessonSubmit").addEventListener("click", function(e) {
        e.preventDefault();
   
        /*
		if (myCurrentbannerlesson.descriptionImgUrl == "" || myCurrentbannerlesson.descriptionImgUrl == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_IMG_FreeLesson)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } 
		*/
        if (myCurrentbannerlesson.title == "" || myCurrentbannerlesson.title == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_PLAN_KIT_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else if (myCurrentbannerlesson.month == "" || myCurrentbannerlesson.month == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_PLAN_KIT_IMAGE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else if (myCurrentbannerlesson.description == "" || myCurrentbannerlesson.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_PLAN_KIT_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else {
            let titlleRequestFreeLesson = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD;
            console.log("data lên " + JSON.stringify(myCurrentbannerlesson));
            //alert("data lên " + JSON.stringify(myCurrentbannerlesson));
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
                        let tempmyCurrentbannerlesson = Object.assign({},myCurrentbannerlesson);
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

						console.log(getCurrentACtion(),dictionaryKey.editStatus);
                        setLoadingDatabanner(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLLesson(getCurrentEdit()) : postURLLesson(getbannerParentId()),
                            tempmyCurrentbannerlesson,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDatabanner(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.banner_CLASS_EDIT_SUCCESS : dictionaryKey.banner_CLASS_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
										
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=banner-kit-class-" + getbannerclass() + "&sclass=" + getbannerclass() + "&id=" + getbannerParentId() + "&category=" + getbannerpart());
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
                                setLoadingDatabanner(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.banner_CLASS_EDIT_FAILED : dictionaryKey.banner_CLASS_ADD_FAILED;
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
                    }
                })
                .show();
        }
    });
</script>