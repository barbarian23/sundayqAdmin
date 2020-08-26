<?php
include get_theme_file_path("home/admin/group/group-status.php");
include get_theme_file_path("home/admin/group/group-interact-ui.php");
?>
<script>
  var listRollGroup = [], listVisitedRollGroup = [];
  var listPermisionOnGroup ;
	window.onload = function(){
		listRollGroup = [];
		listVisitedRollGroup = [];
		setCurrentGroup(0);
	}
	
	function deleteGroup(mId){
		 SunQAlert()
            .position('center')
            .title(dictionaryKey.REQUEST_DELETE)//+" "+listRollGroup[mId].id)
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
                   setFetchingGroup(true);
                    requestToSever(
                        sunQRequestType.delete,
                        postRollGroup() + "/" + listRollGroup[mId].id,
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setFetchingGroup(false);
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
                            } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            }else {
								alert("thiếu");
							}
                        },
                        function(err) {alert("err"+err);
                            setFetchingGroup(false);
                            setGetGroupFromServerSuccess(false);
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
        <span><?php echo $GLOBALS["GROUP_LIST_TITLE"]; ?></span>
    </div>

    <div class="manage-list-teacher-table">
        <div class="sunq-process-contain" id="fetchListGroupProgress">
            <div class="sunq-process-contain-running">

            </div>
        </div>
        <table class="manage-list-teacher-table-detail" id="tableListGroup">

        </table>
        <div class="manage-list-teacher-table-no-list" id="listGroupEmpty">
            <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
            <span><?php echo $GLOBALS["GROUP_NO_LIST"]; ?></span>
        </div>

        <div class="manage-list-teacher-table-no-list" id="listGroupError">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-group"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListGroup">
			
		</div>
	
    <div class="manage-list-teacher-add-new">
        <a href="?mode=sa&page=group&action=add">
            <button>
                <span><?php echo $GLOBALS["GROUP_LIST_BUTTON_ADD_GROUP"]; ?></span>
            </button>
        </a>
    </div>
</div>