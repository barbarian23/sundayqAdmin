<?php
include get_theme_file_path("home/online/user/confirmbanking/status-confirmbanking.php");
include get_theme_file_path("home/online/user/confirmbanking/interact-ui-confirmbanking.php");
?>
<script>
	let listVisitedConfirmBanking=[];
	
    window.onload = function() {
		listConfirmBanking=[];
       //get list register
		listVisitedConfirmBanking.push(0);
		setCurrentConfirmBanking(0);
    }
</script>
<div class="manage-list-teacher">
    <div class="manage-list-teacher-title">
        <span><?php echo $GLOBALS["CONFIRM_BANKING_LIST_TITLE"]; ?></span>
    </div>

    <div class="manage-list-teacher-table">
        <div class="sunq-process-contain" id="fetchListConfirmBankingProgress">
            <div class="sunq-process-contain-running">

            </div>
        </div>
        <table class="manage-list-teacher-table-detail" id="tableListConfirmBanking">

        </table>
        <div class="manage-list-teacher-table-no-list" id="listConfirmBankingEmpty">
            <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
            <span><?php echo $GLOBALS["CONFIRM_BANKING_NO_LIST"]; ?></span>
        </div>

        <div class="manage-list-teacher-table-no-list" id="listConfirmBankingError">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-ConfirmBanking"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListConfirmBanking">
			
		</div>
</div>