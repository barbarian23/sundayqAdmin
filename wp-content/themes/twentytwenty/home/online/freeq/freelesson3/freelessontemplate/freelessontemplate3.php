<?php
include get_theme_file_path("home/online/freeq/freelesson3/freelessontemplate/status-freelessontemplate3.php");
include get_theme_file_path("home/online/freeq/freelesson3/freelessontemplate/interact-ui-freelessontemplate3.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="FreeLessonTemplate3-page-loading">
        <span id="FreeLessonTemplate3-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="FreeLessonTemplate3-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="FreeLessonTemplate3-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

    <!--     <div class="manage-teacher-contain-left">
        <label class="manage-teacher-contain-left-upload" for="uploadShortDescriptionImg">
            <span>
                <?php echo $GLOBALS["FreeLesson_SHORT_DESCRIPTION_IMG"]; ?>
            </span>
            <span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <img id="shortDescriptionImg" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
            <input type="file" id="uploadShortDescriptionImg" name="uploadShortDescriptionImg" />
        </label>
    </div> -->
	<div class="manage-list-lecture-title">
			<span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_TEMPLATE_LESSON_1"] . $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_3_TAILER"] ; ?></span>
		</div>
	
    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleFreeLessonTemplate3" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_NAME_PLACEHOLDER"]; ?>' required>

            <!-- tháng -->
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_MONTH"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idFreeLessonTemplate3Month" name="FreeLessonTemplate3_month" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_MONTH_PLACEHOLDER"]; ?>' required>

            <!-- resource -->
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_RESOURCE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idFreeLessonTemplate3Video" name="FreeLessonTemplate3_Resource" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_RESOURCE_PLACEHOLDER"]; ?>' readonly>

			<span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_VIDEO"]; ?></span>
            <div class="chosen-kit-video-FreeLessonTemplate3" id="currentListVideo">
                
            </div>

            <div class="manage-section-detail-left-list-parent" id="listVideo">
                <span class="manage-section-detail-left-list-close" id="listVideoClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchVideoFreeLessonTemplate3">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="popup-kit-video-FreeLessonTemplate3" id="divVideoFreeLessonTemplate3">

                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeVideoEmpty">
                    <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
                    <span><?php echo $GLOBALS["VIDEO_NO_LIST"]; ?></span>
                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeVideoError">
                    <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
                    <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
                </div>
            </div>

        </div>
        <hr class="manage-teacher-hr-between">
        <!-- mô tả -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="exhibitionSubDetailTextAreaTitle"><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["FreeLesson_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->
                <div id="FreeLessonTemplate3DetailTextArea-toolbar-container"></div>
                <div id="FreeLessonTemplate3DetailTextArea" style="max-width: 100%;
    width: 100%;
    height: 520px;"><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_DETAIL_PLACEHOLDER"]; ?></div>
            </div>
        </div>
        <!-- mô tả ngắn gọn -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="FreeLessonTemplate3SubDetailTextAreaTitle"><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_SUB_DETAIL"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <textarea id="FreeLessonTemplate3SubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
        </div>

        <!-- kit -->
        <div class="manage-section-detail-midlle-span">
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_KIT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <div class="manage-section-detail-left-list-parent" id="listKit">
                <span class="manage-section-detail-left-list-close" id="listKitClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchKitFreeLessonTemplate3">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="popup-kit-video-FreeLessonTemplate3" id="divKitFreeLessonTemplate3">

                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeKitEmpty">
                    <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
                    <span><?php echo $GLOBALS["KIT_NO_LIST"]; ?></span>
                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeKitError">
                    <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
                    <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
                </div>
            </div>
        </div>
        <input id="idFreeLessonTemplate3Kit" name="FreeLessonTemplate3_Kit" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_KIT_PLACEHOLDER"]; ?>' readonly>

        <div class="chosen-kit-video-FreeLessonTemplate3" id="currentListKit">
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_KIT"]; ?></span>
        </div>
    </div>

    <div class="manage-teacher-bottom-action">
        <input type="submit" id="FreeLessonTemplate3Submit" name='FreeLessonTemplate3Submit' value='<?php echo $GLOBALS["FREELESSON_TEMPLATE_SUBMIT_ADD"]; ?>'>
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script>
<script>
    let myCurrentFreeLessonTemplate3 = {},
        currentKit = null,
        currentVideos = [], listKitFromServer = [], listVideoFromServer = [];
    let FreeLessonTemplate3Description = "";
    window.onload = function() {
        myCurrentFreeLessonTemplate3 = {};
        FreeLessonTemplate3Description = "";
        //edit
        DecoupledEditor
            .create(document.querySelector('#FreeLessonTemplate3DetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                FreeLessonTemplate3Description = editor;
                let toolbarContainer = document.querySelector('#FreeLessonTemplate3DetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        if (getCurrentACtion() == dictionaryKey.addStatus) {
            mobiscroll.datetime('#idFreeLessonTemplate3Month', {
                theme: 'ios',
                themeVariant: 'light',
                layout: 'fixed',
                value: 1,
                step: 1,
                min: 0,
                max: 30,
                display: 'bubble',
            });
        }

        let tempArray = localStorage.getItem('listScroll1');

        if (tempArray) {
            tempArray = JSON.parse(tempArray);
            console.log("tempArray", tempArray);
            let tempCheckExist = true;
            tempArray.some((item, index) => {
                if (item.id == "idFreeLessonTemplate3Month") {
                    tempCheckExist = false;
                    return true;
                }
            });
            console.log("tempCheckExist", tempCheckExist);
            if (tempCheckExist) {
                tempArray.push({
                    id: "idFreeLessonTemplate3Month",
                    lib: 'monthyear'
                });
            }
        } else {
            tempArray = [];
            tempArray.push({
                id: "idFreeLessonTemplate3Month",
                lib: 'monthyear'
            });
        }

        localStorage.setItem('language', 'vietnam');
        localStorage.setItem('listScroll1', JSON.stringify(tempArray));
		
		//thứ tự kit -> video -> bài giảng hiện tại
		
        //load kit
       progressLoadKit();

        //load video
        

        mobiscroll.datetime('#idFreeLessonTemplate3Month', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            //min: new Date(),
            dateFormat: 'd/mm/yy',
            //dateFormat:'d/mm/yyyy', 
            timeFormat: 'H:ii',
            display: 'bubble',
        });

        myCurrentFreeLessonTemplate3.month = new Date().getMonth() + 1;

        
    }

	function progressLoadKit(){
		 setFetchingKitFreeLessonTemplate3(true);
        requestToSever(
            sunQRequestType.get,
            getURLListKit(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingKitFreeLessonTemplate3(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setKitGreaterThanZero(false);
                    } else {
                        emptyTableKitListFreeLessonTemplate3();
                        createListKit(res.data);
                    }
					//load video
					progressLoadVideo();
                } else if (res.code === networkCode.accessDenied) {
                    makeAlertPermisionDenial();
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setFetchingKitFreeLessonTemplate3(false);
                setKitFromServerSuccess(false);
                console.log(dictionaryKey.ERR_INFO, err);
                // 			if(res){
                // 			if (res.code === networkCode.sessionTimeOut){
                // 					makeAlertRedirect();
                // 			} else {
                // 				//console.log("123cxzczxc");

                // 			}
                //			}
            }
        );
	}
	
	function progressLoadVideo(){
		setFetchingVideoFreeLessonTemplate3(true);
        requestToSever(
            sunQRequestType.get,
            getListVideo(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingVideoFreeLessonTemplate3(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setVideoGreaterThanZero(false);
                    } else {
                        emptyTableVideoListFreeLessonTemplate3();
                        createListVideo(res.data);
                    }
					progressLoadCurrentLesson();
                } else if (res.code === networkCode.accessDenied) {
                    makeAlertPermisionDenial();
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setFetchingVideoFreeLessonTemplate3(false);
                setVideoFromServerSuccess(false);
                console.log(dictionaryKey.ERR_INFO, err);
                // 			if(res){
                // 			if (res.code === networkCode.sessionTimeOut){
                // 					makeAlertRedirect();
                // 			} else {
                // 				//console.log("123cxzczxc");

                // 			}
                //			}
            }
        );
	}
	
	function progressLoadCurrentLesson(){
		if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("FreeLessonTemplate3Submit").value = '<?php echo $GLOBALS["FREELESSON_TEMPLATE_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataFreeLessonTemplate3(true);
            requestToSever(
                sunQRequestType.get,
                getURLFreeLesson(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataFreeLessonTemplate3(false);
                    if (res.code === networkCode.success) {
                        myCurrentFreeLessonTemplate3 = res.data.lesson;
						console.log(myCurrentFreeLessonTemplate3);
                        //month
                        let tempDatee = new Date();
                        tempDatee.setMonth(myCurrentFreeLessonTemplate3.month - 1);
                        mobiscroll.datetime('#idFreeLessonTemplate3Month', {
                            theme: 'ios',
                            themeVariant: 'light',
                            layout: 'fixed',
                            //minDate: tempDatee,
                            dateFormat: 'd/mm/yy',
                            //dateFormat:'d/mm/yyyy', 
                            timeFormat: 'H:ii',
                            display: 'bubble',
                        });
                        document.getElementById("idFreeLessonTemplate3Month").value = myCurrentFreeLessonTemplate3.month;
                        //title
                        document.getElementById("idTitleFreeLessonTemplate3").value = myCurrentFreeLessonTemplate3.title == null ? "" : myCurrentFreeLessonTemplate3.title;

                        //description
                        FreeLessonTemplate3Description.setData(myCurrentFreeLessonTemplate3.description != null ? myCurrentFreeLessonTemplate3.description : "");

                        //sub description
                        document.getElementById("FreeLessonTemplate3SubDetailTextArea").value = myCurrentFreeLessonTemplate3.shortDescription == null ? "" : myCurrentFreeLessonTemplate3.shortDescription;

                        //KIT
                        currentKit = myCurrentFreeLessonTemplate3.kitId;
                        selectKitIndex(currentKit);

                        //resource
                        //alert(myCurrentFreeLessonTemplate3.resources);
                         myCurrentFreeLessonTemplate3.resources && myCurrentFreeLessonTemplate3.resources.forEach((item, index) => {
							 
                            selectVideoIndex(item.id);
                            currentVideos.push(item.id);
                            //console.log("video", currentOwners);
                        });

                        console.log(res.data);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataFreeLessonTemplate3(dictionaryKey.ERR);
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

        }
	}
	
    document.getElementById("idTitleFreeLessonTemplate3").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonTemplate3.title = tttValue.escape();
    });

    document.getElementById("idFreeLessonTemplate3Month").addEventListener("change", function(e) {
        let tempDate = new Date(e.target.value.split("/")[1] + "/" + e.target.value.split("/")[0] + "/" + e.target.value.split("/")[2]);
        let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
        document.getElementById("idFreeLessonTemplate3Month").value = monthTemp[tempDate.getMonth() + 1] + ",năm " + tempDate.getFullYear();
        myCurrentFreeLessonTemplate3.month = tempDate.getMonth() + 1;
    });

    document.getElementById("FreeLessonTemplate3SubDetailTextArea").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonTemplate3.shortDescription = tttValue.escape();
    });

    //kit
    document.getElementById("idFreeLessonTemplate3Kit").addEventListener("click", function(e) {
        getChoosingKitFreeLessonTemplate3() ? setChoosingKitFreeLessonTemplate3(false) : setChoosingKitFreeLessonTemplate3(true);
    });

    document.getElementById("listKitClose").addEventListener("click", function(e) {
        getChoosingKitFreeLessonTemplate3() ? setChoosingKitFreeLessonTemplate3(false) : setChoosingKitFreeLessonTemplate3(true);
    });

    //video
    document.getElementById("idFreeLessonTemplate3Video").addEventListener("click", function(e) {
        getChoosingVideoFreeLessonTemplate3() ? setChoosingVideoFreeLessonTemplate3(false) : setChoosingVideoFreeLessonTemplate3(true);
    });

    document.getElementById("listVideoClose").addEventListener("click", function(e) {
        getChoosingVideoFreeLessonTemplate3() ? setChoosingVideoFreeLessonTemplate3(false) : setChoosingVideoFreeLessonTemplate3(true);
    });

    //submit form
    document.getElementById("FreeLessonTemplate3Submit").addEventListener("click", function(e) {
        e.preventDefault();
		myCurrentFreeLessonTemplate3.kitId = currentKit;
        myCurrentFreeLessonTemplate3.resources = currentVideos;
        myCurrentFreeLessonTemplate3.description = FreeLessonTemplate3Description.getData();
        console.log("lesson", myCurrentFreeLessonTemplate3);
        /*
		if (myCurrentFreeLessonTemplate3.descriptionImgUrl == "" || myCurrentFreeLessonTemplate3.descriptionImgUrl == null) {
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
        if (myCurrentFreeLessonTemplate3.title == "" || myCurrentFreeLessonTemplate3.title == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_TEMPLATE_KIT_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        else if (myCurrentFreeLessonTemplate3.kitId == "" || myCurrentFreeLessonTemplate3.kitId == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_TEMPLATE_KIT_KIT)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        else if (myCurrentFreeLessonTemplate3.resources == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_TEMPLATE_KIT_VIDEO)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else if (myCurrentFreeLessonTemplate3.resources != null && myCurrentFreeLessonTemplate3.resources.length == 0) {
                SunQAlert()
                    .position('center')
                    .title(dictionaryKey.FREELESSON_TEMPLATE_KIT_VIDEO)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        window.scrollTo(0, 0);
                    })
                    .show();
        } else if (myCurrentFreeLessonTemplate3.month == "" || myCurrentFreeLessonTemplate3.month == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_TEMPLATE_KIT_IMAGE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else if (myCurrentFreeLessonTemplate3.description == "" || myCurrentFreeLessonTemplate3.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_TEMPLATE_KIT_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else {
            let titlleRequestFreeLesson = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD;
            console.log("data lên " + JSON.stringify(myCurrentFreeLessonTemplate3));
            //alert("data lên " + JSON.stringify(myCurrentFreeLessonTemplate3));
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
                        let tempmyCurrentFreeLessonTemplate3 = myCurrentFreeLessonTemplate3;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentFreeLessonTemplate3.createAt;
                        delete tempmyCurrentFreeLessonTemplate3.updateAt;
                        delete tempmyCurrentFreeLessonTemplate3.id;
                        delete tempmyCurrentFreeLessonTemplate3.serviceId;
                        delete tempmyCurrentFreeLessonTemplate3.ageId;
                        delete tempmyCurrentFreeLessonTemplate3.kit;
						
                        if(getCurrentACtion() != dictionaryKey.editStatus){
						   tempmyCurrentFreeLessonTemplate3.isSampleLesson = true;
						   }

                        setLoadingDataFreeLessonTemplate3(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLFreeLesson(getCurrentEdit()) : getURLFreeLesson(ageID.freelesson3.id),
                            tempmyCurrentFreeLessonTemplate3,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataFreeLessonTemplate3(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.FREELESSON_TEMPLATE_EDIT_SUCCESS : dictionaryKey.FREELESSON_TEMPLATE_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-freelessontemplate3");
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
                                setLoadingDataFreeLessonTemplate3(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.FREELESSON_TEMPLATE_EDIT_FAILED : dictionaryKey.FREELESSON_TEMPLATE_ADD_FAILED;
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