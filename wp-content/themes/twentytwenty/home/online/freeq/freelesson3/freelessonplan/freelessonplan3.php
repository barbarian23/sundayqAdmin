<?php
include get_theme_file_path("home/online/freeq/freelesson3/freelessonplan/status-freelessonplan3.php");
include get_theme_file_path("home/online/freeq/freelesson3/freelessonplan/interact-ui-freelessonplan3.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="FreeLessonPlan3-page-loading">
        <span id="FreeLessonPlan3-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="FreeLessonPlan3-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="FreeLessonPlan3-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

    <div class="manage-list-lecture-title">
        <span><?php echo $GLOBALS["FREELESSON_PLAN_REAL_TITLE"] . $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_3_TAILER"] ; ?></span>
    </div>

    <div class="manage-teacher-contain-left">
        <div class="manage-teacher-contain-right-upper">
            <label class="manage-teacher-contain-left-upload" for="uploadShortDescriptionImg">
                <span>
                    <?php echo $GLOBALS["FREELESSON_PLAN_INPUT_IMAGE"]; ?>
                </span>
                <span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <img id="shortDescriptionImg" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                <input type="file" id="uploadShortDescriptionImg" name="uploadShortDescriptionImg" />
            </label>
        </div>
    </div>

    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["FREELESSON_PLAN_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleFreeLessonPlan3" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_PLAN_INPUT_NAME_PLACEHOLDER"]; ?>' required>

            <!-- tháng -->
            <span><?php echo $GLOBALS["FREELESSON_PLAN_INPUT_MONTH"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idFreeLessonPlan3Month" name="FreeLessonPlan3_month" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_PLAN_INPUT_MONTH_PLACEHOLDER"]; ?>' readonly>

            <div class="manage-section-detail-left-list-parent" id="listVideo">
                <span class="manage-section-detail-left-list-close" id="listVideoClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchVideoFreeLessonPlan3">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="manage-section-detail-left-list" id="divVideoFreeLessonPlan3">

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
                <span id="exhibitionSubDetailTextAreaTitle"><?php echo $GLOBALS["FREELESSON_PLAN_INPUT_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["FREELESSON_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->
                <div id="FreeLessonPlan3DetailTextArea-toolbar-container"></div>
                <div id="FreeLessonPlan3DetailTextArea"><?php echo $GLOBALS["FREELESSON_PLAN_INPUT_DETAIL_PLACEHOLDER"]; ?></div>
            </div>


        </div>
        <!-- mô tả ngắn gọn -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="FreeLessonPlan3SubDetailTextAreaTitle"><?php echo $GLOBALS["FREELESSON_PLAN_INPUT_SUB_DETAIL"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <textarea id="FreeLessonPlan3SubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["FREELESSON_PLAN_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
        </div>
    </div>

    <div class="manage-teacher-bottom-action">
        <input type="submit" name='FreeLessonPlan3Submit' value='<?php echo $GLOBALS["FREELESSON_PLAN_SUBMIT_ADD"]; ?>' id="FreeLessonPlan3Submit">
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script>
    let myCurrentFreeLessonPlan3 = {};
    let FreeLessonPlan3Description = "";
    window.onload = function() {
        myCurrentFreeLessonPlan3 = {};
        FreeLessonPlan3Description = "";
        //edit
        DecoupledEditor
            .create(document.querySelector('#FreeLessonPlan3DetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                FreeLessonPlan3Description = editor;
                let toolbarContainer = document.querySelector('#FreeLessonPlan3DetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        if (getCurrentACtion() == dictionaryKey.addStatus) {
            mobiscroll.datetime('#idFreeLessonPlan3Month', {
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
                if (item.id == "idFreeLessonPlan3Month") {
                    tempCheckExist = false;
                    return true;
                }
            });
            console.log("tempCheckExist", tempCheckExist);
            if (tempCheckExist) {
                tempArray.push({
                    id: "idFreeLessonPlan3Month",
                    lib: 'month'
                });
            }
        } else {
            tempArray = [];
            tempArray.push({
                id: "idFreeLessonPlan3Month",
                lib: 'month'
            });
        }

        localStorage.setItem('language', 'vietnam');
        localStorage.setItem('listScroll1', JSON.stringify(tempArray));

        mobiscroll.datetime('#idFreeLessonPlan3Month', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            //min: new Date(),
            dateFormat: 'd/mm/yy',
            //dateFormat:'d/mm/yyyy', 
            timeFormat: 'H:ii',
            display: 'bubble',
        });

        //myCurrentFreeLessonPlan3.month = new Date().getMonth() + 1;

        if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("FreeLessonPlan3Submit").value = '<?php echo $GLOBALS["FREELESSON_PLAN_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataFreeLessonPlan3(true);
            requestToSever(
                sunQRequestType.get,
                getURLFreeLessonPlan(ageID.freelesson3.type, getMonth()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataFreeLessonPlan3(false);
                    if (res.code === networkCode.success) {
                        myCurrentFreeLessonPlan3 = res.data.agePlan;
                        //month
                        let tempDatee = new Date();
                        tempDatee.setMonth(myCurrentFreeLessonPlan3.month - 1);
                        mobiscroll.datetime('#idFreeLessonPlan3Month', {
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
			tempDate.setMonth(myCurrentFreeLessonPlan3.month);
			let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
			let monthmonth = monthTemp[tempDate.getMonth()] + ",năm " + tempDate.getFullYear();
                        document.getElementById("idFreeLessonPlan3Month").value = monthmonth;
                        //title
                        document.getElementById("idTitleFreeLessonPlan3").value = myCurrentFreeLessonPlan3.title == null ? "" : myCurrentFreeLessonPlan3.title;

						if(myCurrentFreeLessonPlan3.thumbnailUrl){
						   document.getElementById("shortDescriptionImg").src = getHomeURL() + myCurrentFreeLessonPlan3.thumbnailUrl;
						   }
						
                        //description
                        FreeLessonPlan3Description.setData(myCurrentFreeLessonPlan3.description != null ? myCurrentFreeLessonPlan3.description : "");

                        //sub description
                        document.getElementById("FreeLessonPlan3SubDetailTextArea").value = myCurrentFreeLessonPlan3.shortDescription == null ? "" : myCurrentFreeLessonPlan3.shortDescription;

                        console.log(res.data);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataFreeLessonPlan3(dictionaryKey.ERR);
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

    function upLoadImage(file) {
        let dataLectureImgage = new FormData();
        dataLectureImgage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataFreeLessonPlan3(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataFreeLessonPlan3(false);
                //                 if (res.code === networkCode.success) {
                //                     console.log("success", res);
                // 					alert("successn");
                //                     myCurrentTeacher.imgUrl = res.data.urls[0];
                //                     //myCurrentTeacher.imgUrl
                //                 } else 
                //console.log(res);                 
                if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
                    myCurrentFreeLessonPlan3.thumbnailUrl = res.url;
                    //alert("loi cmn 123 " + JSON.stringify(res) +" "+res.code+" "+res.message);
                }
            },
            function(err) {
                //setLoadingDataTeacher(dictionaryKey.ERR);
                setLoadingDataFreeLessonPlan3(false);
                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_IMAGE_FAILED : dictionaryKey.UPLOAD_IMAGE_FAILED;
                SunQAlert()
                    .position('center')
                    .title(sunqalertfailed)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //webpageRedirect(window.location.href);
                    })
                    .show();
                console.log(dictionaryKey.ERR_INFO, err);
            },
            true,
        );
    }

    document.getElementById("idTitleFreeLessonPlan3").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonPlan3.title = tttValue.escape();
    });

    document.getElementById("idFreeLessonPlan3Month").addEventListener("change", function(e) {
        //e.target.value.split("/")[1] + "/" + e.target.value.split("/")[0] + "/" + e.target.value.split("/")[2]
		let tempDate = new Date(e.target.value.split("/")[1]+"/"+e.target.value.split("/")[0]+"/"+e.target.value.split("/")[2]);
		//tempDate.setMonth(Number.parseInt(e.target.value.split("/")[1])-1);
        let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
		if (getCurrentACtion() == dictionaryKey.editStatus){

        //console.log(myCurrentFreeLessonPlan3.month);
        SunQAlert()
            .position('center')
            .title(dictionaryKey.FREELESSON_PLAN_LIST_NO_NEED_TO_CHANGE_MONTH)
            .type('error')
            .confirmButtonColor("#3B4EDC")
            .confirmButtonText(dictionaryKey.AGREE)
            .callback((result) => {
                let ttdate = new Date();
                if (myCurrentFreeLessonPlan3.month) {
                    ttdate.setMonth(myCurrentFreeLessonPlan3.month - 1);
                    document.getElementById("idFreeLessonPlan3Month").value = monthTemp[ttdate.getMonth() + 1] + ",năm " + ttdate.getFullYear();
                } else {
                    document.getElementById("idFreeLessonPlan3Month").value = "";
                }
                //document.getElementById("idFreeLessonPlan3Month").value = myCurrentFreeLessonPlan3.month == null ? "" : monthTemp[tempDate.getMonth() + 1] + ",năm " + tempDate.getFullYear();
            })
            .show();
		} else {
        document.getElementById("idFreeLessonPlan3Month").value = monthTemp[tempDate.getMonth() + 1] + ",năm " + tempDate.getFullYear();
        myCurrentFreeLessonPlan3.month = tempDate.getMonth() + 1;
        }
    });

    document.getElementById("FreeLessonPlan3SubDetailTextArea").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonPlan3.shortDescription = tttValue.escape();
    });

    document.getElementById('uploadShortDescriptionImg').addEventListener("change", (evt) => {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        //upLoadImage(tgt.files[0]);
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById("shortDescriptionImg").src = fr.result;
                upLoadImage(files[0]);
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    });

    //submit form
    document.getElementById("FreeLessonPlan3Submit").addEventListener("click", function(e) {
        e.preventDefault();
        //console.log("email", myCurrentTeacher.email);
        myCurrentFreeLessonPlan3.description = FreeLessonPlan3Description.getData();
        /*
		if (myCurrentFreeLessonPlan3.descriptionImgUrl == "" || myCurrentFreeLessonPlan3.descriptionImgUrl == null) {
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
        if (myCurrentFreeLessonPlan3.title == "" || myCurrentFreeLessonPlan3.title == null) {
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
        } else if (myCurrentFreeLessonPlan3.month == "" || myCurrentFreeLessonPlan3.month == null) {
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
        } else if (myCurrentFreeLessonPlan3.description == "" || myCurrentFreeLessonPlan3.description == null) {
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
            console.log("data lên " + JSON.stringify(myCurrentFreeLessonPlan3));
            //alert("data lên " + JSON.stringify(myCurrentFreeLessonPlan3));
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
                        let tempmyCurrentFreeLessonPlan3 = Object.assign({},myCurrentFreeLessonPlan3);
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentFreeLessonPlan3.createAt;
                        delete tempmyCurrentFreeLessonPlan3.updateAt;
                        delete tempmyCurrentFreeLessonPlan3.id;
                        delete tempmyCurrentFreeLessonPlan3.serviceId;
                        delete tempmyCurrentFreeLessonPlan3.month;
                        delete tempmyCurrentFreeLessonPlan3.ageId;
                        delete tempmyCurrentFreeLessonPlan3.thumbnail;


                        setLoadingDataFreeLessonPlan3(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLListFreeLessonPlan(getCurrentEdit()) : getURLFreeLessonPlan(ageID.freelesson3.id, myCurrentFreeLessonPlan3.month),
                            tempmyCurrentFreeLessonPlan3,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataFreeLessonPlan3(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.FREELESSON_PLAN_EDIT_SUCCESS : dictionaryKey.FREELESSON_PLAN_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-freelessonplan3");
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
                                setLoadingDataFreeLessonPlan3(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.FREELESSON_PLAN_EDIT_FAILED : dictionaryKey.FREELESSON_PLAN_ADD_FAILED;
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