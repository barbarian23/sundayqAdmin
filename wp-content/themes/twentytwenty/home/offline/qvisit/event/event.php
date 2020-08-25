<?php
include get_theme_file_path("home/offline/qvisit/event/event-status.php");
include get_theme_file_path("home/offline/qvisit/event/event-interact-ui.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="event-page-loading">
        <span id="event-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="event-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="event-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["EVENT_NAME_INPUT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleEvent" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["EVENT_NAME_INPUT_PLACEHOLDER"]; ?>' required>
        </div>
        <hr class="manage-teacher-hr-between">
        <!-- mô tả -->
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="exhibitionSubDetailTextAreaTitle"><?php echo $GLOBALS["EVENT_DETAIL"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">
				<!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EVENT_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->
				<div id="eventDetailTextArea-toolbar-container"></div>
				<div id="eventDetailTextArea"><?php echo $GLOBALS["EVENT_DETAIL_PLACEHOLDER"]; ?></div>
			</div>
		</div>
        <!-- mô tả ngắn gọn -->
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="eventSubDetailTextAreaTitle"><?php echo $GLOBALS["EVENT_SUB_DETAIL"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">
				<textarea id="eventSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EVENT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
			</div>
		</div>
    </div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='eventSubmit' value='<?php echo $GLOBALS["EVENT_SUBMIT_ADD"]; ?>' id="eventSubmit">
    </div>
</form>
<script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script>
<script>
    window.onload = function() {
        myCurrentEvent = {};

        //edit
        DecoupledEditor
            .create(document.querySelector('#eventDetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                edd = editor;
                let toolbarContainer = document.querySelector('#eventDetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("eventSubmit").value = '<?php echo $GLOBALS["EVENT_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataEvent(true);
            requestToSever(
                sunQRequestType.get,
                getEvent(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataEvent(false);
                    if (res.code === networkCode.success) {
                        myCurrentEvent = res.data;
                        console.log(res.data);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataEvent(dictionaryKey.ERR);
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

    //submit form
    document.getElementById("eventSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        //console.log("email", myCurrentTeacher.email);
        if (myCurrentEvent.title == "" || myCurrentEvent.title == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EVENT_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        if (myCurrentEvent.description == "" || myCurrentEvent.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EVENT_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else {
            let titlleRequestEvent = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD + dictionaryKey.EVENT_NAME;
            console.log("data lên " + JSON.stringify(myCurrentEvent));
            //alert("data lên " + myCurrentTeacher.practiceAt);
            SunQAlert()
                .position('center')
                .title(titlleRequestEvent)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentEvent = myCurrentEvent;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentEvent.createAt;
                        delete tempmyCurrentEvent.updateAt;
                        delete tempmyCurrentEvent.id;
                        myCurrentEvent.description = teacherDesciption.getData();

                        setLoadingDataEvent(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getEvent(getCurrentEdit()) : postEvent(service.qvisit),
                            tempmyCurrentEvent,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataEvent(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.EVENT_EDIT_SUCCESS : dictionaryKey.EVENT_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-event");
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
                            function(err) {
                                setLoadingDataEvent(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.EVENT_EDIT_FAILED : dictionaryKey.EVENT_ADD_FAILED;
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