<?php
include get_theme_file_path("home/online/freeq/freelesson1/freelessontemplate/status-freelessontemplate1.php");
include get_theme_file_path("home/online/freeq/freelesson1/freelessontemplate/interact-ui-freelessontemplate1.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="FreeLessonTemplate1-page-loading">
        <span id="FreeLessonTemplate1-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="FreeLessonTemplate1-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="FreeLessonTemplate1-page-loading-progress-error">
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
        <span><?php echo $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_TEMPLATE_LESSON_1"] . $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_1_TAILER"] ; ?></span>
    </div>
	
    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleFreeLessonTemplate1" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_NAME_PLACEHOLDER"]; ?>' required>

            <!-- tháng -->
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_MONTH"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idFreeLessonTemplate1Month" name="FreeLessonTemplate1_month" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_MONTH_PLACEHOLDER"]; ?>' required>

            <!-- resource -->
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_RESOURCE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idFreeLessonTemplate1Video" name="FreeLessonTemplate1_Resource" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_RESOURCE_PLACEHOLDER"]; ?>' readonly>
			
			<span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_VIDEO"]; ?></span>
            <div class="chosen-kit-video-FreeLessonTemplate1" id="currentListVideo">
                
            </div>

            <div class="manage-section-detail-left-list-parent" id="listVideo">
                <span class="manage-section-detail-left-list-close" id="listVideoClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchVideoFreeLessonTemplate1">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="popup-kit-video-FreeLessonTemplate1" id="divVideoFreeLessonTemplate1">

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
                <div id="FreeLessonTemplate1DetailTextArea-toolbar-container"></div>
                <div id="FreeLessonTemplate1DetailTextArea" style="max-width: 100%;
    width: 100%;
    height: 520px;"><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_DETAIL_PLACEHOLDER"]; ?></div>
            </div>
        </div>
        <!-- mô tả ngắn gọn -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="FreeLessonTemplate1SubDetailTextAreaTitle"><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_SUB_DETAIL"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <textarea id="FreeLessonTemplate1SubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
        </div>

        <!-- kit -->
        <div class="manage-section-detail-midlle-span">
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_KIT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <div class="manage-section-detail-left-list-parent" id="listKit">
                <span class="manage-section-detail-left-list-close" id="listKitClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchKitFreeLessonTemplate1">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="popup-kit-video-FreeLessonTemplate1" id="divKitFreeLessonTemplate1">

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
        <input id="idFreeLessonTemplate1Kit" name="FreeLessonTemplate1_Kit" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_KIT_PLACEHOLDER"]; ?>' readonly>

        <div class="chosen-kit-video-FreeLessonTemplate1" id="currentListKit">
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_KIT"]; ?></span>
        </div>
    </div>

    <div class="manage-teacher-bottom-action">
        <input type="submit" id="FreeLessonTemplate1Submit" name='FreeLessonTemplate1Submit' value='<?php echo $GLOBALS["FREELESSON_TEMPLATE_SUBMIT_ADD"]; ?>'>
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script>
<script>
    let myCurrentFreeLessonTemplate1 = {},
        currentKit = null,
        currentVideos = [], listKitFromServer = [], listVideoFromServer = [];
    let FreeLessonTemplate1Description = "";
    window.onload = function() {
        myCurrentFreeLessonTemplate1 = {};
        FreeLessonTemplate1Description = "";
        //edit
        DecoupledEditor
            .create(document.querySelector('#FreeLessonTemplate1DetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                FreeLessonTemplate1Description = editor;
                let toolbarContainer = document.querySelector('#FreeLessonTemplate1DetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        if (getCurrentACtion() == dictionaryKey.addStatus) {
            mobiscroll.datetime('#idFreeLessonTemplate1Month', {
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
                if (item.id == "idFreeLessonTemplate1Month") {
                    tempCheckExist = false;
                    return true;
                }
            });
            console.log("tempCheckExist", tempCheckExist);
            if (tempCheckExist) {
                tempArray.push({
                    id: "idFreeLessonTemplate1Month",
                    lib: 'monthyear'
                });
            }
        } else {
            tempArray = [];
            tempArray.push({
                id: "idFreeLessonTemplate1Month",
                lib: 'monthyear'
            });
        }

        localStorage.setItem('language', 'vietnam');
        localStorage.setItem('listScroll1', JSON.stringify(tempArray));
		
		//thứ tự kit -> video -> bài giảng hiện tại
		
        //load kit
       progressLoadKit();

        //load video
        

        mobiscroll.datetime('#idFreeLessonTemplate1Month', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            //min: new Date(),
            dateFormat: 'd/mm/yy',
            //dateFormat:'d/mm/yyyy', 
            timeFormat: 'H:ii',
            display: 'bubble',
        });

        myCurrentFreeLessonTemplate1.month = new Date().getMonth() + 1;

        
    }

	function progressLoadKit(){
		 setFetchingKitFreeLessonTemplate1(true);
        requestToSever(
            sunQRequestType.get,
            getURLListKit(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingKitFreeLessonTemplate1(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setKitGreaterThanZero(false);
                    } else {
                        emptyTableKitListFreeLessonTemplate1();
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
                setFetchingKitFreeLessonTemplate1(false);
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
		setFetchingVideoFreeLessonTemplate1(true);
        requestToSever(
            sunQRequestType.get,
            getListVideo(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingVideoFreeLessonTemplate1(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setVideoGreaterThanZero(false);
                    } else {
                        emptyTableVideoListFreeLessonTemplate1();
						//console.log("video",res.data);
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
                setFetchingVideoFreeLessonTemplate1(false);
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
            document.getElementById("FreeLessonTemplate1Submit").value = '<?php echo $GLOBALS["FREELESSON_TEMPLATE_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataFreeLessonTemplate1(true);
            requestToSever(
                sunQRequestType.get,
                getURLFreeLesson(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataFreeLessonTemplate1(false);
                    if (res.code === networkCode.success) {
                        myCurrentFreeLessonTemplate1 = res.data.lesson;
						console.log("frome server",myCurrentFreeLessonTemplate1);
                        //month
                        let tempDatee = new Date();
                        tempDatee.setMonth(myCurrentFreeLessonTemplate1.month - 1);
                        mobiscroll.datetime('#idFreeLessonTemplate1Month', {
                            theme: 'ios',
                            themeVariant: 'light',
                            layout: 'fixed',
                            //minDate: tempDatee,
                            dateFormat: 'd/mm/yy',
                            //dateFormat:'d/mm/yyyy', 
                            timeFormat: 'H:ii',
                            display: 'bubble',
                        });
                        document.getElementById("idFreeLessonTemplate1Month").value = myCurrentFreeLessonTemplate1.month;
                        //title
                        document.getElementById("idTitleFreeLessonTemplate1").value = myCurrentFreeLessonTemplate1.title == null ? "" : myCurrentFreeLessonTemplate1.title;

                        //description
                        FreeLessonTemplate1Description.setData(myCurrentFreeLessonTemplate1.description != null ? myCurrentFreeLessonTemplate1.description : "");

                        //sub description
                        document.getElementById("FreeLessonTemplate1SubDetailTextArea").value = myCurrentFreeLessonTemplate1.shortDescription == null ? "" : myCurrentFreeLessonTemplate1.shortDescription;

                        //KIT
                        currentKit = myCurrentFreeLessonTemplate1.kitId;
                        selectKitIndex(currentKit);

                        //resource
                         myCurrentFreeLessonTemplate1.resources && myCurrentFreeLessonTemplate1.resources.forEach((item, index) => {
							 //console.log("video id", item);
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
                    setLoadingDataFreeLessonTemplate1(dictionaryKey.ERR);
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
	
    document.getElementById("idTitleFreeLessonTemplate1").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonTemplate1.title = tttValue.escape();
    });

    document.getElementById("idFreeLessonTemplate1Month").addEventListener("change", function(e) {
        let tempDate = new Date(e.target.value.split("/")[1] + "/" + e.target.value.split("/")[0] + "/" + e.target.value.split("/")[2]);
        let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
        document.getElementById("idFreeLessonTemplate1Month").value = monthTemp[tempDate.getMonth() + 1] + ",năm " + tempDate.getFullYear();
        myCurrentFreeLessonTemplate1.month = tempDate.getMonth() + 1;
    });

    document.getElementById("FreeLessonTemplate1SubDetailTextArea").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonTemplate1.shortDescription = tttValue.escape();
    });

    //kit
    document.getElementById("idFreeLessonTemplate1Kit").addEventListener("click", function(e) {
        getChoosingKitFreeLessonTemplate1() ? setChoosingKitFreeLessonTemplate1(false) : setChoosingKitFreeLessonTemplate1(true);
    });

    document.getElementById("listKitClose").addEventListener("click", function(e) {
        getChoosingKitFreeLessonTemplate1() ? setChoosingKitFreeLessonTemplate1(false) : setChoosingKitFreeLessonTemplate1(true);
    });

    //video
    document.getElementById("idFreeLessonTemplate1Video").addEventListener("click", function(e) {
        getChoosingVideoFreeLessonTemplate1() ? setChoosingVideoFreeLessonTemplate1(false) : setChoosingVideoFreeLessonTemplate1(true);
    });

    document.getElementById("listVideoClose").addEventListener("click", function(e) {
        getChoosingVideoFreeLessonTemplate1() ? setChoosingVideoFreeLessonTemplate1(false) : setChoosingVideoFreeLessonTemplate1(true);
    });

    //submit form
    document.getElementById("FreeLessonTemplate1Submit").addEventListener("click", function(e) {
        e.preventDefault();
		myCurrentFreeLessonTemplate1.kitId = currentKit;
        myCurrentFreeLessonTemplate1.resources = currentVideos;
        myCurrentFreeLessonTemplate1.description = FreeLessonTemplate1Description.getData();
        /*
		if (myCurrentFreeLessonTemplate1.descriptionImgUrl == "" || myCurrentFreeLessonTemplate1.descriptionImgUrl == null) {
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
        if (myCurrentFreeLessonTemplate1.title == "" || myCurrentFreeLessonTemplate1.title == null) {
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
        else if (myCurrentFreeLessonTemplate1.kitId == "" || myCurrentFreeLessonTemplate1.kitId == null) {
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
        else if (myCurrentFreeLessonTemplate1.resources == null) {
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
        } else if (myCurrentFreeLessonTemplate1.resources != null && myCurrentFreeLessonTemplate1.resources.length == 0) {
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
        } else if (myCurrentFreeLessonTemplate1.month == "" || myCurrentFreeLessonTemplate1.month == null) {
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
        } else if (myCurrentFreeLessonTemplate1.description == "" || myCurrentFreeLessonTemplate1.description == null) {
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
            //console.log("data lên " + JSON.stringify(myCurrentFreeLessonTemplate1));
            //alert("data lên " + JSON.stringify(myCurrentFreeLessonTemplate1));
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
                        let tempmyCurrentFreeLessonTemplate1 = myCurrentFreeLessonTemplate1;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentFreeLessonTemplate1.createAt;
                        delete tempmyCurrentFreeLessonTemplate1.updateAt;
                        delete tempmyCurrentFreeLessonTemplate1.id;
                        delete tempmyCurrentFreeLessonTemplate1.serviceId;
                        delete tempmyCurrentFreeLessonTemplate1.ageId;
                        //delete tempmyCurrentFreeLessonTemplate1.kitId;
                        delete tempmyCurrentFreeLessonTemplate1.kit;
						if(getCurrentACtion() != dictionaryKey.editStatus){
						  tempmyCurrentFreeLessonTemplate1.isSampleLesson = true;
						}
        				console.log("lesson", tempmyCurrentFreeLessonTemplate1);

                        setLoadingDataFreeLessonTemplate1(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLFreeLesson(getCurrentEdit()) : getURLFreeLesson(ageID.freelesson1.id),
                            tempmyCurrentFreeLessonTemplate1,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataFreeLessonTemplate1(false);
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
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-freelessontemplate1");
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
                                setLoadingDataFreeLessonTemplate1(dictionaryKey.ERR);
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