<?php 
	include get_theme_file_path("home/offline/qvisit/exhibition/exhibition-status.php");
	include get_theme_file_path("home/offline/qvisit/exhibition/exhibition-interact-ui.php" ); 
?>

<script>
var listVisitedExhibition = [],listExhibition = [];
window.onload = function() {
		
		//get list ticket
		listVisitedExhibition.push(0);
		setCurrentExhibition(0);

		
    }

function deleteExhibition(mId){
	 //console.log("delete", listExhibition[mId]);
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
                    seFetchingExhibition(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getExhibition(mId),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingExhibition(false);
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
                            seFetchingExhibition(false);
                            setIsGetExhibitionFromServerSuccess(false);
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
			<span><?php echo $GLOBALS["EXHIBITON_LIST_TITLE"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListExhibitionProgress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListExhibition">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listExhibitionEmpty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["EXHIBITON_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listExhibitionError">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-exhibition"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListExhibition">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="?mode=offline&page=exhibition&action=add">
				<button>
					<span><?php echo $GLOBALS["EXHIBITON_LIST_BUTTON_ADD_ACCOUNT"]; ?></span>
				</button>
			</a>
		</div>
	</div>
</div>