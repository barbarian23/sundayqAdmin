<?php
include get_theme_file_path("home/online/user/account/status-account.php");
include get_theme_file_path("home/online/user/account/interact-ui-account.php");
?>
<script>
	let listVisitedUserAccount=[];
	
    window.onload = function() {
		listUserAccount=[];
       //get list register
		listVisitedUserAccount.push(0);
		setCurrentUserAccount(0);
    }
	
	function changeAccountPassword(email){
		 SunQAlert()
            .position('center')
            .title(dictionaryKey.REQUEST_PASSWORD_CHANGE)
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
                    setFetchingUserAccount(true);
                    requestToSever(
                        sunQRequestType.post,
                        getPasswordChange(),
						{email:email},
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            setFetchingUserAccount(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.REQUEST_CHANGE_PASWORD_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        //webpageRedirect(window.location.href);
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
										.title(dictionaryKey.REQUEST_CHANGE_PASWORD_FAILED)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {})
										.show();
							}
                        },
                        function(err) {
                            setFetchingUserAccount(false);
                            setIsGetUserAccountFromServerSuccess(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.REQUEST_CHANGE_PASWORD_FAILED)
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
<div class="manage-list-teacher">
    <div class="manage-list-teacher-title">
        <span><?php echo $GLOBALS["ACCOUNT_USER_LIST_TITLE"]; ?></span>
    </div>

    <div class="manage-list-teacher-table">
        <div class="sunq-process-contain" id="fetchListUserAccountProgress">
            <div class="sunq-process-contain-running">

            </div>
        </div>
        <table class="manage-list-teacher-table-detail" id="tableListUserAccount">

        </table>
        <div class="manage-list-teacher-table-no-list" id="listUserAccountEmpty">
            <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
            <span><?php echo $GLOBALS["ACCOUNT_USER_NO_LIST"]; ?></span>
        </div>

        <div class="manage-list-teacher-table-no-list" id="listUserAccountError">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-UserAccount"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListUserAccount">
			
		</div>
</div>