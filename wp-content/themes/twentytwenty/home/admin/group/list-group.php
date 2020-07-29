<script>
    window.onload = function() {
	
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
        <a href="?mode=offline&page=group&action=add">
            <button>
                <span><?php echo $GLOBALS["GROUP_LIST_BUTTON_ADD_GROUP"]; ?></span>
            </button>
        </a>
    </div>
</div>