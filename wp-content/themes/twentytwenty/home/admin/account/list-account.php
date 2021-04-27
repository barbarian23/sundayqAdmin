<?php
include get_theme_file_path("home/admin/account/account-status.php");
include get_theme_file_path("home/admin/account/account-interact-ui.php");
?>
<script>
	 var listAccount = [], listVisitedAccount = [];
		
	window.onload = function(){
		listAccount = [];
		listVisitedAccount = [];
		setCurrentAccount(0);
	}
	
	function deleteAccount(mId){
// 		 SunQAlert()
//             .position('center')
//             .title(dictionaryKey.REQUEST_DELETE)
//             .type('success')
//             .confirmButtonColor("#3B4EDC")
//             .cancelButtonColor("#a8b1f5")
//             .confirmButtonText(dictionaryKey.AGREE)
//             .cancelButtonText(dictionaryKey.CANCEL)
//             .callback((result) => {
//                 if (result.value) {
//                    setFetchingGroup(true);
//                     requestToSever(
//                         sunQRequestType.delete,
//                         getURLecture() + "/" + listLecture[mId].id,
//                         null,
//                         getData(dictionary.MSEC),
//                         function(res) {
//                             //console.log(res);
//                             setFetchingGroup(false);
//                             if (res.code === networkCode.success) {
//                                 SunQAlert()
//                                     .position('center')
//                                     .title(dictionaryKey.LECTURE_DELETE_SUCCESS)
//                                     .type('error')
//                                     .confirmButtonColor("#3B4EDC")
//                                     .confirmButtonText(dictionaryKey.AGREE)
//                                     .callback((result) => {
//                                         webpageRedirect(window.location.href);
//                                     })
//                                     .show();
//                             } else if (res.code === networkCode.sessionTimeOut) {
//                                 makeAlertRedirect();
//                             }
//                         },
//                         function(err) {
//                             setFetchingGroup(false);
//                             setGetGroupFromServerSuccess(false);
                        

//                             console.log(dictionaryKey.ERR_INFO, err);

//                         }
//                     );

//                 } else if (result.dismiss === Swal.DismissReason.cancel) {

//                 }
//             })
//             .show();
	}
	
	function changeState(mId){
		let currentstate = listAccount[mId].state;
		currentstate =  document.getElementById(mId).checked == true ? "active" : "deactive" ;
		 SunQAlert()
            .position('center')
            .title(currentstate == "active" ? dictionaryKey.REQUEST_ACTIVE : dictionaryKey.REQUEST_DEACTIVE )
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
                   setFetchingAccount(true);
					let tempData = {
						 state: currentstate
					}
                    requestToSever(
                        sunQRequestType.put,
                        putAccountState(listAccount[mId].id),
                        tempData,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setFetchingAccount(false);
                            if (res.code === networkCode.success) {
								//cập nhật giao diện
								currentstate == "active" ? document.getElementById(mId).checked = true : document.getElementById(mId).checked = false;
                                SunQAlert()
                                    .position('center')
                                    .title(currentstate == "active" ? dictionaryKey.REQUEST_ACTIVE_SUCCESS : dictionaryKey.REQUEST_DEACTIVE_SUCCESS)
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
								 SunQAlert()
                                    .position('center')
                                    .title(currentstate == "active" ? dictionaryKey.REQUEST_ACTIVE_SUCCESS : dictionaryKey.REQUEST_DEACTIVE_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        webpageRedirect(window.location.href);
                                    })
                                    .show();
							}
                        },
                        function(err) {alert("err");
                            setFetchingAccount(false);
                            setIsGetAccountFromServerSuccess(false);
							 SunQAlert()
                                    .position('center')
                                    .title(currentstate == "active" ? dictionaryKey.REQUEST_ACTIVE_FAILED : dictionaryKey.REQUEST_DEACTIVE_FAILED)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
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
<div class="manage-list-teacher">
    <div class="manage-list-teacher-title">
        <span><?php echo $GLOBALS["ACCOUNT_LIST_TITLE"]; ?></span>
    </div>

    <div class="manage-list-teacher-table">
        <div class="sunq-process-contain" id="fetchListAccountProgress">
            <div class="sunq-process-contain-running">

            </div>
        </div>
        <table class="manage-list-teacher-table-detail" id="tableListAccount">

        </table>
        <div class="manage-list-teacher-table-no-list" id="listAccountEmpty">
            <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
            <span><?php echo $GLOBALS["ACCOUNT_NO_LIST"]; ?></span>
        </div>

        <div class="manage-list-teacher-table-no-list" id="listAccountError">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-account"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListAccount">
			
		</div>
	
    <div class="manage-list-teacher-add-new">
        <a href="?mode=sa&page=account&action=add">
            <button>
                <span><?php echo $GLOBALS["ACCOUNT_LIST_BUTTON_ADD_ACCOUNT"]; ?></span>
            </button>
        </a>
    </div>
</div>