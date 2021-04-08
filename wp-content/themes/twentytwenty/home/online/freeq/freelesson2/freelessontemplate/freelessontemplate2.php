<?php
include get_theme_file_path("home/online/freeq/freelesson2/freelessontemplate/status-freelessontemplate2.php");
include get_theme_file_path("home/online/freeq/freelesson2/freelessontemplate/interact-ui-freelessontemplate2.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="FreeLessonTemplate2-page-loading">
        <span id="FreeLessonTemplate2-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="FreeLessonTemplate2-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="FreeLessonTemplate2-page-loading-progress-error">
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
        <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_TEMPLATE_LESSON_1"] . $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_2_TAILER"] ; ?></span>
    </div>
	
    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleFreeLessonTemplate2" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_NAME_PLACEHOLDER"]; ?>' required>

            <!-- tháng -->
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_MONTH"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idFreeLessonTemplate2Month" name="FreeLessonTemplate2_month" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_MONTH_PLACEHOLDER"]; ?>' required>

            <!-- resource -->
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_RESOURCE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idFreeLessonTemplate2Video" name="FreeLessonTemplate2_Resource" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_RESOURCE_PLACEHOLDER"]; ?>' readonly>

			<span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_VIDEO"]; ?></span>
            <div class="chosen-kit-video-FreeLessonTemplate2" id="currentListVideo">
                
            </div>

            <div class="manage-section-detail-left-list-parent" id="listVideo">
                <span class="manage-section-detail-left-list-close" id="listVideoClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchVideoFreeLessonTemplate2">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="popup-kit-video-FreeLessonTemplate2" id="divVideoFreeLessonTemplate2">

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
                <div id="FreeLessonTemplate2DetailTextArea-toolbar-container"></div>
                <div id="FreeLessonTemplate2DetailTextArea" style="max-width: 100%;
    width: 100%;
    height: 520px;"><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_DETAIL_PLACEHOLDER"]; ?></div>
            </div>
        </div>
        <!-- mô tả ngắn gọn -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="FreeLessonTemplate2SubDetailTextAreaTitle"><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_SUB_DETAIL"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <textarea id="FreeLessonTemplate2SubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
        </div>

        <!-- kit -->
        <div class="manage-section-detail-midlle-span">
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_KIT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <div class="manage-section-detail-left-list-parent" id="listKit">
                <span class="manage-section-detail-left-list-close" id="listKitClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchKitFreeLessonTemplate2">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="popup-kit-video-FreeLessonTemplate2" id="divKitFreeLessonTemplate2">

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
        <input id="idFreeLessonTemplate2Kit" name="FreeLessonTemplate2_Kit" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_KIT_PLACEHOLDER"]; ?>' readonly>

        <div class="chosen-kit-video-FreeLessonTemplate2" id="currentListKit">
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_KIT"]; ?></span>
        </div>
    </div>

    <div class="manage-teacher-bottom-action">
        <input type="submit" id="FreeLessonTemplate2Submit" name='FreeLessonTemplate2Submit' value='<?php echo $GLOBALS["FREELESSON_TEMPLATE_SUBMIT_ADD"]; ?>'>
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script>
<script>
    let myCurrentFreeLessonTemplate2 = {},
        currentKit = null,
        currentVideos = [], listKitFromServer = [], listVideoFromServer = [];
    let FreeLessonTemplate2Description = "";
    window.onload = function() {
        myCurrentFreeLessonTemplate2 = {};
        FreeLessonTemplate2Description = "";
        //edit
        DecoupledEditor
            .create(document.querySelector('#FreeLessonTemplate2DetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                FreeLessonTemplate2Description = editor;
                let toolbarContainer = document.querySelector('#FreeLessonTemplate2DetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        if (getCurrentACtion() == dictionaryKey.addStatus) {
            mobiscroll.datetime('#idFreeLessonTemplate2Month', {
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
                if (item.id == "idFreeLessonTemplate2Month") {
                    tempCheckExist = false;
                    return true;
                }
            });
            console.log("tempCheckExist", tempCheckExist);
            if (tempCheckExist) {
                tempArray.push({
                    id: "idFreeLessonTemplate2Month",
                    lib: 'monthyear'
                });
            }
        } else {
            tempArray = [];
            tempArray.push({
                id: "idFreeLessonTemplate2Month",
                lib: 'monthyear'
            });
        }

        localStorage.setItem('language', 'vietnam');
        localStorage.setItem('listScroll1', JSON.stringify(tempArray));
		
		//thứ tự kit -> video -> bài giảng hiện tại
		
        //load kit
       progressLoadKit();

        //load video
        

        mobiscroll.datetime('#idFreeLessonTemplate2Month', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            //min: new Date(),
            dateFormat: 'd/mm/yy',
            //dateFormat:'d/mm/yyyy', 
            timeFormat: 'H:ii',
            display: 'bubble',
        });

        myCurrentFreeLessonTemplate2.month = new Date().getMonth() + 1;

        
    }

	function progressLoadKit(){
		 setFetchingKitFreeLessonTemplate2(true);
        requestToSever(
            sunQRequestType.get,
            getURLListKit(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingKitFreeLessonTemplate2(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setKitGreaterThanZero(false);
                    } else {
                        emptyTableKitListFreeLessonTemplate2();
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
                setFetchingKitFreeLessonTemplate2(false);
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
		setFetchingVideoFreeLessonTemplate2(true);
        requestToSever(
            sunQRequestType.get,
            getListVideo(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingVideoFreeLessonTemplate2(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setVideoGreaterThanZero(false);
                    } else {
                        emptyTableVideoListFreeLessonTemplate2();
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
                setFetchingVideoFreeLessonTemplate2(false);
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
            document.getElementById("FreeLessonTemplate2Submit").value = '<?php echo $GLOBALS["FREELESSON_TEMPLATE_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataFreeLessonTemplate2(true);
            requestToSever(
                sunQRequestType.get,
                getURLFreeLesson(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataFreeLessonTemplate2(false);
                    if (res.code === networkCode.success) {
                        myCurrentFreeLessonTemplate2 = res.data.lesson;
						console.log(myCurrentFreeLessonTemplate2);
                        //month
                        let tempDatee = new Date();
                        tempDatee.setMonth(myCurrentFreeLessonTemplate2.month - 1);
                        mobiscroll.datetime('#idFreeLessonTemplate2Month', {
                            theme: 'ios',
                            themeVariant: 'light',
                            layout: 'fixed',
                            //minDate: tempDatee,
                            dateFormat: 'd/mm/yy',
                            //dateFormat:'d/mm/yyyy', 
                            timeFormat: 'H:ii',
                            display: 'bubble',
                        });
                        document.getElementById("idFreeLessonTemplate2Month").value = myCurrentFreeLessonTemplate2.month;
                        //title
                        document.getElementById("idTitleFreeLessonTemplate2").value = myCurrentFreeLessonTemplate2.title == null ? "" : myCurrentFreeLessonTemplate2.title;

                        //description
                        FreeLessonTemplate2Description.setData(myCurrentFreeLessonTemplate2.description != null ? myCurrentFreeLessonTemplate2.description : "");

                        //sub description
                        document.getElementById("FreeLessonTemplate2SubDetailTextArea").value = myCurrentFreeLessonTemplate2.shortDescription == null ? "" : myCurrentFreeLessonTemplate2.shortDescription;

                        //KIT
                        currentKit = myCurrentFreeLessonTemplate2.kitId;
                        selectKitIndex(currentKit);

                        //resource
                         myCurrentFreeLessonTemplate2.resources && myCurrentFreeLessonTemplate2.resources.forEach((item, index) => {
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
                    setLoadingDataFreeLessonTemplate2(dictionaryKey.ERR);
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
	
    document.getElementById("idTitleFreeLessonTemplate2").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonTemplate2.title = tttValue.escape();
    });

    document.getElementById("idFreeLessonTemplate2Month").addEventListener("change", function(e) {
        let tempDate = new Date(e.target.value.split("/")[1] + "/" + e.target.value.split("/")[0] + "/" + e.target.value.split("/")[2]);
        let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
        document.getElementById("idFreeLessonTemplate2Month").value = monthTemp[tempDate.getMonth() + 1] + ",năm " + tempDate.getFullYear();
        myCurrentFreeLessonTemplate2.month = tempDate.getMonth() + 1;
    });

    document.getElementById("FreeLessonTemplate2SubDetailTextArea").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonTemplate2.shortDescription = tttValue.escape();
    });

    //kit
    document.getElementById("idFreeLessonTemplate2Kit").addEventListener("click", function(e) {
        getChoosingKitFreeLessonTemplate2() ? setChoosingKitFreeLessonTemplate2(false) : setChoosingKitFreeLessonTemplate2(true);
    });

    document.getElementById("listKitClose").addEventListener("click", function(e) {
        getChoosingKitFreeLessonTemplate2() ? setChoosingKitFreeLessonTemplate2(false) : setChoosingKitFreeLessonTemplate2(true);
    });

    //video
    document.getElementById("idFreeLessonTemplate2Video").addEventListener("click", function(e) {
        getChoosingVideoFreeLessonTemplate2() ? setChoosingVideoFreeLessonTemplate2(false) : setChoosingVideoFreeLessonTemplate2(true);
    });

    document.getElementById("listVideoClose").addEventListener("click", function(e) {
        getChoosingVideoFreeLessonTemplate2() ? setChoosingVideoFreeLessonTemplate2(false) : setChoosingVideoFreeLessonTemplate2(true);
    });

    //submit form
    document.getElementById("FreeLessonTemplate2Submit").addEventListener("click", function(e) {
        e.preventDefault();
		myCurrentFreeLessonTemplate2.kitId = currentKit;
        myCurrentFreeLessonTemplate2.resources = currentVideos;
        myCurrentFreeLessonTemplate2.description = FreeLessonTemplate2Description.getData();
        console.log("lesson", myCurrentFreeLessonTemplate2);
        /*
		if (myCurrentFreeLessonTemplate2.descriptionImgUrl == "" || myCurrentFreeLessonTemplate2.descriptionImgUrl == null) {
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
        if (myCurrentFreeLessonTemplate2.title == "" || myCurrentFreeLessonTemplate2.title == null) {
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
        else if (myCurrentFreeLessonTemplate2.kitId == "" || myCurrentFreeLessonTemplate2.kitId == null) {
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
        else if (myCurrentFreeLessonTemplate2.resources == null) {
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
        } else if (myCurrentFreeLessonTemplate2.resources != null && myCurrentFreeLessonTemplate2.resources.length == 0) {
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
        } else if (myCurrentFreeLessonTemplate2.month == "" || myCurrentFreeLessonTemplate2.month == null) {
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
        } else if (myCurrentFreeLessonTemplate2.description == "" || myCurrentFreeLessonTemplate2.description == null) {
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
            console.log("data lên " + JSON.stringify(myCurrentFreeLessonTemplate2));
            //alert("data lên " + JSON.stringify(myCurrentFreeLessonTemplate2));
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
                        let tempmyCurrentFreeLessonTemplate2 = myCurrentFreeLessonTemplate2;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentFreeLessonTemplate2.createAt;
                        delete tempmyCurrentFreeLessonTemplate2.updateAt;
                        delete tempmyCurrentFreeLessonTemplate2.id;
                        delete tempmyCurrentFreeLessonTemplate2.serviceId;
                        delete tempmyCurrentFreeLessonTemplate2.ageId;
                        delete tempmyCurrentFreeLessonTemplate2.kit;
                        delete tempmyCurrentFreeLessonTemplate2.questions;
						
						if(getCurrentACtion() != dictionaryKey.editStatus){
						   tempmyCurrentFreeLessonTemplate2.isSampleLesson = true;
						   }

                        setLoadingDataFreeLessonTemplate2(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLFreeLesson(getCurrentEdit()) : postURLFreeLessonPlan(ageID.freelesson2.id),
                            tempmyCurrentFreeLessonTemplate2,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataFreeLessonTemplate2(false);
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
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-freelessontemplate2");
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
                                setLoadingDataFreeLessonTemplate2(dictionaryKey.ERR);
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