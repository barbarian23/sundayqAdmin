<script>
    window.onload = function() {
	
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
        <a href="?mode=offline&page=account&action=add">
            <button>
                <span><?php echo $GLOBALS["ACCOUNT_LIST_BUTTON_ADD_ACCOUNT"]; ?></span>
            </button>
        </a>
    </div>
</div>