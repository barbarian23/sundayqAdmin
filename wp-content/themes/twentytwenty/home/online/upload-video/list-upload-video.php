<?php 
	include get_theme_file_path("home/online/upload-video/status-upload-video.php");
	include get_theme_file_path("home/online/upload-video/interact-ui-upload-video.php" ); 
?>

<script>
var listVisitedUploadVideo = [],listUploadVideo = [];
window.onload = function() {
		
		//get list ticket
		listVisitedUploadVideo.push(0);
		setCurrentUploadVideo(0);

		
    }

function deleteUploadVideo(mId){
	 console.log("delete", listUploadVideo[mId]);
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
                    seFetchingUploadVideo(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getUploadVideo(listUploadVideo[mId].id),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingUploadVideo(false);
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
                            seFetchingUploadVideo(false);
                            setIsGetUploadVideoFromServerSuccess(false);
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
			<span><?php echo $GLOBALS["VIDEO_LIST_TITLE"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListUploadVideoProgress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListUploadVideo">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listUploadVideoEmpty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["VIDEO_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listUploadVideoError">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-uploadVideo"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListUploadVideo">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="?mode=online&page=video&action=title">
				<button>
					<span><?php echo $GLOBALS["VIDEO_LIST_BUTTON_ADD_ACCOUNT"]; ?></span>
				</button>
			</a>
		</div>
	</div>
</div>