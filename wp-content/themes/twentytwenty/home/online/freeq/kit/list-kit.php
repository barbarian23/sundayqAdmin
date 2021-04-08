<?php 
	include get_theme_file_path("home/online/freeq/kit/status-kit.php");
	include get_theme_file_path("home/online/freeq/kit/interact-ui-kit.php" ); 
?>

<script>
var listVisitedKit = [],listKit = [];
window.onload = function() {
		
		//get list ticket
		listVisitedKit.push(0);
		setCurrentKit(0);

		
    }

function deleteKit(mId){
	 //console.log("delete", listKit[mId]);
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
                    seFetchingKit(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLKit(mId),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingKit(false);
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
                            seFetchingKit(false);
                            setIsGetKitFromServerSuccess(false);
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
			<span><?php echo $GLOBALS["KIT_LIST_TITLE"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListKitProgress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListKit">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listKitEmpty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["KIT_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listKitError">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-Kit"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListKit">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="?mode=online&page=kit&action=add">
				<button>
					<span><?php echo $GLOBALS["KIT_SUBMIT_ADD"]; ?></span>
				</button>
			</a>
		</div>
	</div>
</div>