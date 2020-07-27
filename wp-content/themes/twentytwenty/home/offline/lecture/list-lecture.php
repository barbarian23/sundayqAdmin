<?php

?>
<script>
	var listRegister = [],listVisited=[],listLecture=[],listVisitedLecture=[];
    window.onload = function() {
		
		//get list lecture
		listVisitedLecture.push(0);
		setCurrentLecture(0);
		
		//get list register
		listVisited.push(0);
		setCurrentView(0);
		
    }

    function deleteLecture(mId) {
        console.log("delete", listLecture[mId]);
		//alert(listLecture[mId]+listLecture[mId].id);
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
                    setFetchingLecture(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLecture() + "/" + listLecture[mId].id,
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setFetchingLecture(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.LECTURE_DELETE_SUCCESS)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        webpageRedirect(window.location.href);
                                    })
                                    .show();
                            } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            }
                        },
                        function(err) {
                            setFetchingLecture(false);
                            setIsGetLectureFromServerSuccess(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.LECTURE_DELETE_FAILED)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {
                                    webpageRedirect(window.location.href);
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
	
	<div class="manage-list-lecture-list-register">
		
		<div class="manage-section-helpdesk-title-table">
				<span id="tableRegisterTitle"><?php echo $GLOBALS["LECTURE_CUSTOMER_NEED_SUPPORT"]; ?></span>
		</div>
		
		<div class="sunq-process-contain" id="fetchListRegisterProgress">
            <span id="fetchListRegisterProgressText"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
            <div class="sunq-process-contain-running">

            </div>
        </div>
	
        <div class="manage-list-lecture-table-detail-no-list" id="listRegisterError">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
		
		<div class="manage-section-helpdesk" id="tableRegister">
			
			<div class="manage-section-helpdesk-table">
				<table class="manage-section-helpdesk-real-table" id="tableRegisterInside">

				</table>
			</div>
    	</div> 
		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-regisster"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingList">
			
		</div>
	</div>
	
	<div class="manage-list-lecture-title-list-contain">
		<div class="manage-list-lecture-title">
			<span><?php echo $GLOBALS["LECTURE_LIST_TITLE"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListLectureProgress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListLecture">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listLectureEmpty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["LECTURE_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listLectureError">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-lecture"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListLecture">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="?mode=offline&page=lecture&action=add">
				<button>
					<span><?php echo $GLOBALS["LECTURE_LIST_BUTTON_ADD_LECTURE"]; ?></span>
				</button>
			</a>
		</div>
	</div>
</div>