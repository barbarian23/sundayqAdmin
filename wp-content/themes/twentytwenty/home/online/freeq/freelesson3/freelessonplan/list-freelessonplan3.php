<?php 
	include get_theme_file_path("home/online/freeq/freelesson3/freelessonplan/status-freelessonplan3.php");
	include get_theme_file_path("home/online/freeq/freelesson3/freelessonplan/interact-ui-freelessonplan3.php" ); 
?>

<script>
var listVisitedFreeLessonPlan3 = [],listFreeLessonPlan3 = [];
window.onload = function() {
		//get list ticket
		listVisitedFreeLessonPlan3.push(0);
		setCurrentFreeLessonPlan3(0);

		
    }

function deleteFreeLessonPlan3(mId){
	 console.log("delete", listFreeLessonPlan3[mId]);
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
                    seFetchingFreeLessonPlan3(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLListFreeLessonPlan(listFreeLessonPlan3[mId].id),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingFreeLessonPlan3(false);
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
										.title(dictionaryKey.SERVER_INFO + res.message + " xóa " +listTeacher[mId].id + " vị trí "+ mId)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {})
										.show();
							}
                        },
                        function(err) {
                            seFetchingFreeLessonPlan3(false);
                            setIsGetFreeLessonPlan3FromServerSuccess(false);
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
			<span><?php echo $GLOBALS["FREELESSON_PLAN_LIST_TITLE"] . $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_3_TAILER"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListFreeLessonPlan3Progress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListFreeLessonPlan3">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listFreeLessonPlan3Empty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["FREELESSON_PLAN_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listFreeLessonPlan3Error">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-FreeLessonPlan3"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListFreeLessonPlan3">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="?mode=online&page=freelessonplan3&action=add">
				<button>
					<span><?php echo $GLOBALS["FREELESSON_PLAN_LIST_BUTTON_ADD_KIT"]; ?></span>
				</button>
			</a>
		</div>
        
	</div>
</div>