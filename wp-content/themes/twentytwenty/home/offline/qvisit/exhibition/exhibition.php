<?php
include get_theme_file_path("home/offline/qvisit/exhibition/exhibition-status.php");
include get_theme_file_path("home/offline/qvisit/exhibition/exhibition-interact-ui.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="exhibition-page-loading">
        <span id="exhibition-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="exhibition-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="exhibition-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	 <div class="manage-teacher-contain-left">
            <label class="manage-teacher-contain-left-upload" for="uploadShortDescriptionImg">
                <span>
                    <?php echo $GLOBALS["EXHIBITON_SHORT_DESCRIPTION_IMG"]; ?>
                </span>
				<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <img id="shortDescriptionImg" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                <input type="file" id="uploadShortDescriptionImg" name="uploadShortDescriptionImg" />
            </label>
     </div>
	
    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["EXHIBITON_NAME_INPUT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleExhibition" name="exhibition_name" type="text" placeholder='<?php echo $GLOBALS["EXHIBITON_NAME_INPUT_PLACEHOLDER"]; ?>' required>

            <!-- age from -->
            <span><?php echo $GLOBALS["EXHIBITON_AGE_INPUT_FROM"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idAgeOfExhibitionFrom" name="exhibition_age_from" type="text" placeholder='<?php echo $GLOBALS["EXHIBITON_AGE_INPUT_PLACEHOLDER"]; ?>' required>

            <!-- age to -->
            <span><?php echo $GLOBALS["EXHIBITON_AGE_INPUT_TO"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idAgeOfExhibitionTo" name="exhibition_age_to" type="text" placeholder='<?php echo $GLOBALS["EXHIBITON_AGE_INPUT_PLACEHOLDER"]; ?>' required>
        </div>
        <hr class="manage-teacher-hr-between">
        <!-- mô tả -->
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="exhibitionSubDetailTextAreaTitle"><?php echo $GLOBALS["EXHIBITON_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">
				<!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EXHIBITON_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->

				<div id="exhibitionDetailTextArea-toolbar-container"></div>
				<div id="exhibitionDetailTextArea"><?php echo $GLOBALS["EXHIBITON_DETAIL_PLACEHOLDER"]; ?></div>

			</div>
		</div>
        <!-- mô tả ngắn gọn -->
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="exhibitionSubDetailTextAreaTitle"><?php echo $GLOBALS["EXHIBITON_SUB_DETAIL"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">
				<textarea id="exhibitionSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EXHIBITON_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
			</div>
		</div>
    </div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='exhibitionSubmit' value='<?php echo $GLOBALS["EXHIBITON_SUBMIT_ADD"]; ?>' id="exhibitionSubmit">
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script>
    var exhibitionDescription = "";
    window.onload = function() {
        myCurrentExhibition = {};
		exhibitionDescription = "";
        //edit
        DecoupledEditor
            .create(document.querySelector('#exhibitionDetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                exhibitionDescription = editor;
                let toolbarContainer = document.querySelector('#exhibitionDetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        if (getCurrentACtion() == dictionaryKey.addStatus) {
            mobiscroll.number('#idAgeOfExhibitionFrom', {
                theme: 'ios',
                themeVariant: 'light',
                layout: 'fixed',
                value: 1,
                step: 1,
                defaultValue: 1,
                min: 0,
                max: 18,
                display: 'bubble',
            });

            mobiscroll.number('#idAgeOfExhibitionTo', {
                theme: 'ios',
                themeVariant: 'light',
                layout: 'fixed',
                value: 1,
                step: 1,
                defaultValue: 1,
                min: 0,
                max: 18,
                display: 'bubble',
            });
        }


        //console.log(localStorage.getItem('listScroll1'));
        let tempArray = localStorage.getItem('listScroll1');
        if (tempArray) {
            tempArray = JSON.parse(tempArray);
            let tempCheckExist = true;
            tempArray.some((item, index) => {
                if (item.id == "idAgeOfExhibitionFrom") {
                    tempCheckExist = false;
                    return true;
                }
            });

            if (tempCheckExist) {
                tempArray.push({
                    id: "idAgeOfExhibitionFrom",
                    lib: 'number'
                });
            }

            tempCheckExist = true;
            tempArray.some((item, index) => {
                if (item.id == "idAgeOfExhibitionTo") {
                    tempCheckExist = false;
                    return true;
                }
            });

            if (tempCheckExist) {
                tempArray.push({
                    id: "idAgeOfExhibitionTo",
                    lib: 'number'
                });
            }
        } else {
            tempArray = [];
            tempArray.push({
                id: "idAgeOfExhibitionFrom",
                lib: 'number'
            });
            tempArray.push({
                id: "idAgeOfExhibitionTo",
                lib: 'number'
            });
        }

        console.log("array", tempArray);
        localStorage.setItem('language', 'vietnam');
        localStorage.setItem('listScroll1', JSON.stringify(tempArray));

        if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("exhibitionSubmit").value = '<?php echo $GLOBALS["EXHIBITON_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataExhibition(true);
            requestToSever(
                sunQRequestType.get,
                getExhibition(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataExhibition(false);
                    if (res.code === networkCode.success) {
                        myCurrentExhibition = res.data;
                        console.log(res.data);
                        document.getElementById("idTitleExhibition").value = myCurrentExhibition.title == null ? "" : myCurrentExhibition.title;
                        mobiscroll.number('#idAgeOfExhibitionFrom', {
							theme: 'ios',
							themeVariant: 'light',
							layout: 'fixed',
							value: 1,
							step: 1,
							defaultValue: myCurrentExhibition.minTargetAge,
							min: 0,
							max: 18,
							display: 'bubble',
						});

						mobiscroll.number('#idAgeOfExhibitionTo', {
							theme: 'ios',
							themeVariant: 'light',
							layout: 'fixed',
							value: 1,
							step: 1,
							defaultValue: myCurrentExhibition.maxTargetAge,
							min: 0,
							max: 18,
							display: 'bubble',
						});
						document.getElementById("idAgeOfExhibitionFrom").value = myCurrentExhibition.minTargetAge == null ? "" : myCurrentExhibition.minTargetAge;
						document.getElementById("idAgeOfExhibitionTo").value = myCurrentExhibition.maxTargetAge == null ? "" : myCurrentExhibition.maxTargetAge;
						document.getElementById("shortDescriptionImg").src = myCurrentExhibition.descriptionImgUrl != null ? getHomeURL() + myCurrentExhibition.descriptionImgUrl : '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>';
						exhibitionDescription.setData(myCurrentExhibition.description != null ? myCurrentExhibition.description : "");
						
						document.getElementById("exhibitionSubDetailTextArea").value = myCurrentExhibition.shortDescription == null ? "" : myCurrentExhibition.shortDescription;
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
					//alert(err);
                    setLoadingDataExhibition(dictionaryKey.ERR);
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
        let dataExhibitionImage = new FormData();
        dataExhibitionImage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataExhibition(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataExhibitionImage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataExhibition(false);
					if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					 myCurrentExhibition.descriptionImgUrl = res.urls[0];
				}
            },
            function(err) {
				setLoadingDataExhibition(false);
                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_IMAGE_FAILED : dictionaryKey.UPLOAD_IMAGE_FAILED;
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
            },
            true,
        );
    }
	
	//on input
	 document.getElementById("idTitleExhibition").addEventListener("input", function(e) {
		let tttValue = e.target.value;
        myCurrentExhibition.title = tttValue.escape();
    });

    document.getElementById("idAgeOfExhibitionFrom").addEventListener("change", function(e) {
        myCurrentExhibition.minTargetAge = e.target.value;
    });
    document.getElementById("idAgeOfExhibitionTo").addEventListener("change", function(e) {
        myCurrentExhibition.maxTargetAge = e.target.value;
    });

	document.getElementById("exhibitionSubDetailTextArea").addEventListener("input", function(e) {
		   let tttValue = e.target.value;
        myCurrentExhibition.shortDescription = tttValue.escape();
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
    document.getElementById("exhibitionSubmit").addEventListener("click", function(e) {
        e.preventDefault();
				myCurrentExhibition.description = exhibitionDescription.getData();
 				myCurrentExhibition.maxTargetAge = Number.parseInt(myCurrentExhibition.maxTargetAge);
 				myCurrentExhibition.minTargetAge = Number.parseInt(myCurrentExhibition.minTargetAge);
        //console.log("email", myCurrentTeacher.email);
        /*
        if (myCurrentExhibition.descriptionImgUrl == "" || myCurrentExhibition.descriptionImgUrl == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_IMG_EVENT)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
		*/
        if (myCurrentExhibition.title == "" || myCurrentExhibition.title == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EXHIBITION_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        if (myCurrentExhibition.minTargetAge == "" || myCurrentExhibition.minTargetAge == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EXHIBITION_MINTARGETAGE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        if (myCurrentExhibition.maxTargetAge == "" || myCurrentExhibition.maxTargetAge == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EXHIBITION_MAXTARGETAGE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        if (myCurrentExhibition.description == "" || myCurrentExhibition.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EXHIBITION_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else {
            let titlleRequestExhibition = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD + dictionaryKey.EXHIBITION_NAME;
            console.log("data lên " + JSON.stringify(myCurrentExhibition));
            //alert("data lên " + JSON.stringify(myCurrentExhibition));
            SunQAlert()
                .position('center')
                .title(titlleRequestExhibition)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentExhibition = myCurrentExhibition;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentExhibition.createAt;
                        delete tempmyCurrentExhibition.updateAt;
                        delete tempmyCurrentExhibition.id;
						
                        setLoadingDataExhibition(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getExhibition(getCurrentEdit()) : postExhibition(),
                            tempmyCurrentExhibition,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataExhibition(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.EXHIBITION_EDIT_SUCCESS : dictionaryKey.EXHIBITION_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-exhibition");
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
                            function(err) {alert(err);
                                setLoadingDataTeacher(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.EXHIBITION_EDIT_FAILED : dictionaryKey.EXHIBITION_ADD_FAILED;
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