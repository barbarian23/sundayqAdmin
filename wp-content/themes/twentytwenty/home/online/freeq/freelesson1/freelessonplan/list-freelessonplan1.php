<?php 
	include get_theme_file_path("home/online/freeq/freelesson1/freelessonplan/status-freelessonplan1.php");
	include get_theme_file_path("home/online/freeq/freelesson1/freelessonplan/interact-ui-freelessonplan1.php" ); 
?>

<script>
var listVisitedFreeLessonPlan1 = [],listFreeLessonPlan1 = [];
window.onload = function() {
		//get list ticket
		listVisitedFreeLessonPlan1.push(0);
		setCurrentFreeLessonPlan1(0);

		
    }

function deleteFreeLessonPlan1(mId){
	 console.log("delete", listFreeLessonPlan1[mId]);
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
                    seFetchingFreeLessonPlan1(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLListFreeLessonPlan(listFreeLessonPlan1[mId].id),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingFreeLessonPlan1(false);
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
                            seFetchingFreeLessonPlan1(false);
                            setIsGetFreeLessonPlan1FromServerSuccess(false);
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
			<span><?php echo $GLOBALS["FREELESSON_PLAN_LIST_TITLE"] . $GLOBALS["ADMIN_ONLINE_FREEQ_FREELESSON_1_TAILER"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListFreeLessonPlan1Progress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListFreeLessonPlan1">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listFreeLessonPlan1Empty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["FREELESSON_PLAN_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listFreeLessonPlan1Error">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-FreeLessonPlan1"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListFreeLessonPlan1">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="?mode=online&page=freelessonplan1&action=add">
				<button>
					<span><?php echo $GLOBALS["FREELESSON_PLAN_LIST_BUTTON_ADD_KIT"]; ?></span>
				</button>
			</a>
		</div>
       
	</div>
</div>