<?php
include get_theme_file_path("home/online/parentcomment/status-parentcomment.php");
include get_theme_file_path("home/online/parentcomment/interact-ui-parentcomment.php");
?>
<script>
	let listVisitedparentComment=[];
	
    window.onload = function() {
		listparentComment=[];
       //get list register
		listVisitedparentComment.push(0);
		setCurrentparentComment(0);
    }

    function deleteparentComment(mId) {
        //console.log("delete", listparentComment[mId]);
		//alert("parentComment "+mId+listparentComment[mId].name);
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
                    setFetchingparentComment(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getComment(mId),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setFetchingparentComment(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.PARENT_COMMENT_DELETE_SUCCESS)
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
										.title(dictionaryKey.SERVER_INFO + res.message + " xóa " +listparentComment[mId].id + " vị trí "+ mId)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {})
										.show();
							}
                        },
                        function(err) {
                            setFetchingparentComment(false);
                            setIsGetparentCommentFromServerSuccess(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.PARENT_COMMENT_DELETE_FAILED)
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
    <div class="manage-list-lecture-title">
        <span><?php echo $GLOBALS["PARENT_COMMENT_LIST_TITLE"]; ?></span>
    </div>

    <div class="manage-list-lecture-table">
        <div class="sunq-process-contain" id="fetchListparentCommentProgress">
            <div class="sunq-process-contain-running">

            </div>
        </div>
        <table class="manage-list-lecture-table-detail" id="tableListparentComment">

        </table>
        <div class="manage-list-lecture-table-no-list" id="listparentCommentEmpty">
            <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
            <span><?php echo $GLOBALS["PARENT_COMMENT_NO_LIST"]; ?></span>
        </div>

        <div class="manage-list-parentComment-table-no-list" id="listparentCommentError">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-parentComment"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListparentComment">
			
		</div>
	
    <div class="manage-list-teacher-add-new">
        <a href="?mode=online&page=parentcomment&action=add">
            <button>
                <span><?php echo $GLOBALS["PARENT_COMMENTE_LIST_BUTTON_ADD_KIT"]; ?></span>
            </button>
        </a>
    </div>
</div>