<?php
include get_theme_file_path("home/online/freeq/freelesson2/freelessonplan/status-freelessonplan2.php");
include get_theme_file_path("home/online/freeq/freelesson2/freelessonplan/interact-ui-freelessonplan2.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="FreeLessonPlan2-page-loading">
        <span id="FreeLessonPlan2-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="FreeLessonPlan2-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="FreeLessonPlan2-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<div class="manage-list-lecture-title">
        <span><?php echo $GLOBALS["FREELESSON_PLAN_REAL_TITLE"] . $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_2_TAILER"] ; ?></span>
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
            <input id="idTitleFreeLessonPlan2" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_PLAN_INPUT_NAME_PLACEHOLDER"]; ?>' required>

            <!-- tháng -->
            <span><?php echo $GLOBALS["FREELESSON_PLAN_INPUT_MONTH"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idFreeLessonPlan2Month" name="FreeLessonPlan2_month" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_PLAN_INPUT_MONTH_PLACEHOLDER"]; ?>' readonly>

            <div class="manage-section-detail-left-list-parent" id="listVideo">
                <span class="manage-section-detail-left-list-close" id="listVideoClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchVideoFreeLessonPlan2">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="manage-section-detail-left-list" id="divVideoFreeLessonPlan2">

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
                <div id="FreeLessonPlan2DetailTextArea-toolbar-container"></div>
                <div id="FreeLessonPlan2DetailTextArea"><?php echo $GLOBALS["FREELESSON_PLAN_INPUT_DETAIL_PLACEHOLDER"]; ?></div>
            </div>
        </div>
        <!-- mô tả ngắn gọn -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="FreeLessonPlan2SubDetailTextAreaTitle"><?php echo $GLOBALS["FREELESSON_PLAN_INPUT_SUB_DETAIL"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <textarea id="FreeLessonPlan2SubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["FREELESSON_PLAN_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
        </div>
    </div>

    <div class="manage-teacher-bottom-action">
        <input type="submit" name='FreeLessonPlan2Submit' value='<?php echo $GLOBALS["FREELESSON_PLAN_SUBMIT_ADD"]; ?>' id="FreeLessonPlan2Submit">
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script>
    let myCurrentFreeLessonPlan2 = {};
    let FreeLessonPlan2Description = "";
    window.onload = function() {
        myCurrentFreeLessonPlan2 = {};
        FreeLessonPlan2Description = "";
        //edit
        DecoupledEditor
            .create(document.querySelector('#FreeLessonPlan2DetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                FreeLessonPlan2Description = editor;
                let toolbarContainer = document.querySelector('#FreeLessonPlan2DetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        if (getCurrentACtion() == dictionaryKey.addStatus) {
            mobiscroll.datetime('#idFreeLessonPlan2Month', {
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
                if (item.id == "idFreeLessonPlan2Month") {
                    tempCheckExist = false;
                    return true;
                }
            });
            console.log("tempCheckExist", tempCheckExist);
            if (tempCheckExist) {
                tempArray.push({
                    id: "idFreeLessonPlan2Month",
                    lib: 'month'
                });
            }
        } else {
            tempArray = [];
            tempArray.push({
                id: "idFreeLessonPlan2Month",
                lib: 'month'
            });
        }

        localStorage.setItem('language', 'vietnam');
        localStorage.setItem('listScroll1', JSON.stringify(tempArray));
        
        mobiscroll.datetime('#idFreeLessonPlan2Month', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            //min: new Date(),
            dateFormat: 'd/mm/yy',
            //dateFormat:'d/mm/yyyy', 
            timeFormat: 'H:ii',
            display: 'bubble',
        });

        //myCurrentFreeLessonPlan2.month = new Date().getMonth() + 1;

        if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("FreeLessonPlan2Submit").value = '<?php echo $GLOBALS["FREELESSON_PLAN_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataFreeLessonPlan2(true);
            requestToSever(
                sunQRequestType.get,
                getURLFreeLessonPlan(ageID.freelesson2.type,getMonth()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataFreeLessonPlan2(false);
                    if (res.code === networkCode.success) {
                        myCurrentFreeLessonPlan2 = res.data.agePlan;
                        //month
                        let tempDatee = new Date();
                        tempDatee.setMonth(myCurrentFreeLessonPlan2.month - 1);
                        mobiscroll.datetime('#idFreeLessonPlan2Month', {
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
			tempDate.setMonth(myCurrentFreeLessonPlan2.month);
			let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
			let monthmonth = monthTemp[tempDate.getMonth()] + ",năm " + tempDate.getFullYear();
                        document.getElementById("idFreeLessonPlan2Month").value = monthmonth;
                        //title
                        document.getElementById("idTitleFreeLessonPlan2").value = myCurrentFreeLessonPlan2.title == null ? "" : myCurrentFreeLessonPlan2.title;

							if(myCurrentFreeLessonPlan2.thumbnailUrl){
						   document.getElementById("shortDescriptionImg").src = getHomeURL() + myCurrentFreeLessonPlan2.thumbnailUrl;
						   }
						
                        //description
                        FreeLessonPlan2Description.setData(myCurrentFreeLessonPlan2.description != null ? myCurrentFreeLessonPlan2.description : "");

                        //sub description
                        document.getElementById("FreeLessonPlan2SubDetailTextArea").value = myCurrentFreeLessonPlan2.shortDescription == null ? "" : myCurrentFreeLessonPlan2.shortDescription;

                        console.log(res.data);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataFreeLessonPlan2(dictionaryKey.ERR);
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
        setLoadingDataFreeLessonPlan2(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataFreeLessonPlan2(false);
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
                    myCurrentFreeLessonPlan2.thumbnailUrl = res.url;
					//alert("loi cmn 123 " + JSON.stringify(res) +" "+res.code+" "+res.message);
				}
            },
            function(err) {
                //setLoadingDataTeacher(dictionaryKey.ERR);
				setLoadingDataFreeLessonPlan2(false);
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
	
    document.getElementById("idTitleFreeLessonPlan2").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonPlan2.title = tttValue.escape();
    });

    document.getElementById("idFreeLessonPlan2Month").addEventListener("change", function(e) {
		//e.target.value.split("/")[1] + "/" + e.target.value.split("/")[0] + "/" + e.target.value.split("/")[2]
		let tempDate = new Date(e.target.value.split("/")[1]+"/"+e.target.value.split("/")[0]+"/"+e.target.value.split("/")[2]);
		//tempDate.setMonth(Number.parseInt(e.target.value.split("/")[1])-1);
        let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
		if (getCurrentACtion() == dictionaryKey.editStatus){
		 SunQAlert()
            .position('center')
            .title(dictionaryKey.FREELESSON_PLAN_LIST_NO_NEED_TO_CHANGE_MONTH)
            .type('error')
            .confirmButtonColor("#3B4EDC")
            .confirmButtonText(dictionaryKey.AGREE)
            .callback((result) => {
                let ttdate = new Date();
                if (myCurrentFreeLessonPlan2.month) {
                    ttdate.setMonth(myCurrentFreeLessonPlan2.month-1);
                    document.getElementById("idFreeLessonPlan2Month").value = monthTemp[ttdate.getMonth() + 1] + ",năm " + ttdate.getFullYear();
                } else {
                    document.getElementById("idFreeLessonPlan2Month").value = "";
                }
                //document.getElementById("idFreeLessonPlan2Month").value = myCurrentFreeLessonPlan2.month == null ? "" : monthTemp[tempDate.getMonth() + 1] + ",năm " + tempDate.getFullYear();
            })
            .show();
		} else {
        document.getElementById("idFreeLessonPlan2Month").value = monthTemp[tempDate.getMonth() + 1] + ",năm " + tempDate.getFullYear();
        myCurrentFreeLessonPlan2.month = tempDate.getMonth() + 1;
        }
    });

    document.getElementById("FreeLessonPlan2SubDetailTextArea").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentFreeLessonPlan2.shortDescription = tttValue.escape();
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
    document.getElementById("FreeLessonPlan2Submit").addEventListener("click", function(e) {
        e.preventDefault();
        //console.log("email", myCurrentTeacher.email);
        myCurrentFreeLessonPlan2.description = FreeLessonPlan2Description.getData();
        /*
		if (myCurrentFreeLessonPlan2.descriptionImgUrl == "" || myCurrentFreeLessonPlan2.descriptionImgUrl == null) {
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
        if (myCurrentFreeLessonPlan2.title == "" || myCurrentFreeLessonPlan2.title == null) {
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
        } else if (myCurrentFreeLessonPlan2.month == "" || myCurrentFreeLessonPlan2.month == null) {
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
        } else if (myCurrentFreeLessonPlan2.description == "" || myCurrentFreeLessonPlan2.description == null) {
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
            console.log("data lên " + JSON.stringify(myCurrentFreeLessonPlan2));
            //alert("data lên " + JSON.stringify(myCurrentFreeLessonPlan2));
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
                        let tempmyCurrentFreeLessonPlan2 = Object.assign({},myCurrentFreeLessonPlan2);
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentFreeLessonPlan2.createAt;
                        delete tempmyCurrentFreeLessonPlan2.updateAt;
                        delete tempmyCurrentFreeLessonPlan2.id;
                        delete tempmyCurrentFreeLessonPlan2.serviceId;
                        delete tempmyCurrentFreeLessonPlan2.month;
                        delete tempmyCurrentFreeLessonPlan2.ageId;
                        delete tempmyCurrentFreeLessonPlan2.thumbnail;


                        setLoadingDataFreeLessonPlan2(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLListFreeLessonPlan(getCurrentEdit()) : getURLFreeLessonPlan(ageID.freelesson2.id,myCurrentFreeLessonPlan2.month),
                            tempmyCurrentFreeLessonPlan2,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataFreeLessonPlan2(false);
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
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-freelessonplan2");
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
                                setLoadingDataFreeLessonPlan2(dictionaryKey.ERR);
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