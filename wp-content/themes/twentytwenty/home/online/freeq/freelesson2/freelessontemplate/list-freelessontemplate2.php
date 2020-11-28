<?php
include get_theme_file_path("home/online/freeq/freelesson2/freelessontemplate/status-freelessontemplate2.php");
include get_theme_file_path("home/online/freeq/freelesson2/freelessontemplate/interact-ui-freelessontemplate2.php");
?>
<script>
var listVisitedFreeLessonTemplate2 = [],listFreeLessonTemplate2 = [];
window.onload = function() {
		
		//get list ticket
		listVisitedFreeLessonTemplate2.push(0);
		setCurrentFreeLessonTemplate2(0);
    }

function deleteFreeLessonTemplate2(mId){
	 console.log("delete", listFreeLessonTemplate2[mId]);
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
                    seFetchingFreeLessonTemplate2(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLFreeLesson(listFreeLessonTemplate2[mId].id),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingFreeLessonTemplate2(false);
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
                            seFetchingFreeLessonTemplate2(false);
                            setIsGetFreeLessonTemplate2FromServerSuccess(false);
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
			<span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_TITLE"] . $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_2_TAILER"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListFreeLessonTemplate2Progress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListFreeLessonTemplate2">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listFreeLessonTemplate2Empty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["FREELESSON_TEMPLATE_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listFreeLessonTemplate2Error">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-FreeLessonTemplate2"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListFreeLessonTemplate2">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="?mode=online&page=freelessontemplate2&action=add">
				<button>
					<span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_BUTTON_ADD_KIT"]; ?></span>
				</button>
			</a>
		</div>
	</div>
</div>