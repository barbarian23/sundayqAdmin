<?php
include get_theme_file_path("home/online/freeq/freelesson1/freelessontemplate/status-freelessontemplate1.php");
include get_theme_file_path("home/online/freeq/freelesson1/freelessontemplate/interact-ui-freelessontemplate1.php");
?>
<script>
var listVisitedFreeLessonTemplate1 = [],listFreeLessonTemplate1 = [];
window.onload = function() {
		
		//get list ticket
		listVisitedFreeLessonTemplate1.push(0);
		setCurrentFreeLessonTemplate1(0);
    }

function deleteFreeLessonTemplate1(mId){
	 console.log("delete", mId);
		//alert("teacher "+mId+listTeacher[mId].name);
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
                    seFetchingFreeLessonTemplate1(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLFreeLesson(mId),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingFreeLessonTemplate1(false);
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
                            }else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            } else {
								//alert("");
								SunQAlert()
										.position('center')
										.title(dictionaryKey.LECTURE_DELETE_FAILED)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {})
										.show();
							}
                        },
                        function(err) {
                            seFetchingFreeLessonTemplate1(false);
                            setIsGetFreeLessonTemplate1FromServerSuccess(false);
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
<div class="manage-list-lecture">
	<div class="manage-list-lecture-title-list-contain">
		<div class="manage-list-lecture-title">
			<span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_TITLE"] . $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_1_TAILER"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListFreeLessonTemplate1Progress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListFreeLessonTemplate1">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listFreeLessonTemplate1Empty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["FREELESSON_TEMPLATE_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listFreeLessonTemplate1Error">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-FreeLessonTemplate1"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListFreeLessonTemplate1">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="?mode=online&page=freelessontemplate1&action=add">
				<button>
					<span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_BUTTON_ADD_KIT"]; ?></span>
				</button>
			</a>
		</div>
	</div>
</div>