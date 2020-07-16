<?php

?>
<script>
    window.onload = function() {
        setFetchingTeacher(true);
        requestToSever(
            sunQRequestType.get,
            getURLAllTeacher(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                //console.log(res);
                setFetchingTeacher(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setGetTeacherFromServerSuccess(false);
                    } else {
                        emptyTableListTeacher();
                        listTeacher = res.data;
                        createListTeacher(res.data);
                    }
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setFetchingTeacher(false);
                setIsGetTeacherFromServerSuccess(false);
                console.log(dictionaryKey.ERR_INFO, err);
                // 			if(res != undefined){
                // 			if (res.code === networkCode.sessionTimeOut){
                // 				makeAlertRedirect();
                // 			}
                // 			}
            }
        );
    }

    function deleteTeacher(mId) {
        console.log("delete", listTeacher[mId]);
        //alert hỏi
        SunQAlert()
            .position('center')
            .title(dictionaryKey.REQUEST_DELETE)
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
                    setFetchingTeacher(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLTeacher() + "/" + listTeacher[mId].id,
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setFetchingTeacher(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.LECTURE_DELETE_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        webpageRedirect(window.location.href);
                                    })
                                    .show();
                            } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            } else {
								//alert("");
								SunQAlert()
										.position('center')
										.title(dictionaryKey.SERVER_INFO + res.message + " xóa " +listTeacher[mId].id + " vị trí "+ mId)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {})
										.show();
							}
                        },
                        function(err) {
                            setFetchingTeacher(false);
                            setIsGetTeacherFromServerSuccess(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.LECTURE_DELETE_FAILED)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {
                                    //webpageRedirect(window.location.href);
                                })
                                .show();

                            console.log(dictionaryKey.ERR_INFO, err);

                        }
                    );

                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
            .show();
    }
</script>
<div class="manage-list-teacher">
    <div class="manage-list-teacher-title">
        <span><?php echo $GLOBALS["TEACHER_LIST_TITLE"]; ?></span>
    </div>

    <div class="manage-list-teacher-table">
        <div class="sunq-process-contain" id="fetchListTeacherProgress">
            <div class="sunq-process-contain-running">

            </div>
        </div>
        <table class="manage-list-teacher-table-detail" id="tableListTeacher">

        </table>
        <div class="manage-list-teacher-table-no-list" id="listTeacherEmpty">
            <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
            <span><?php echo $GLOBALS["TEACHER_NO_LIST"]; ?></span>
        </div>

        <div class="manage-list-teacher-table-no-list" id="listTeacherError">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

    <div class="manage-list-teacher-add-new">
        <a href="?mode=offline&page=teacher&action=add">
            <button>
                <span><?php echo $GLOBALS["TEACHER_LIST_BUTTON_ADD_TEACHER"]; ?></span>
            </button>
        </a>
    </div>
</div>