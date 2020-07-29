<?php
?>
<form class="manage-teacher-contain">
    <div class="manage-contain-teacher-loading" id="account-page-loading">
        <span id="teacher-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="account-page-loading-progress">

        </div>
        <div class="manage-contain-teacher-loading-err" id="account-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
    <div class="manage-teacher-contain-data">
        <div class="manage-teacher-contain-right">
            <div class="manage-teacher-contain-right-upper">
				<!-- name -->
                <span><?php echo $GLOBALS["ACCOUNT_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputAccountName" type="text" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_NAME_PLACEHOLDER"]; ?>' required>
				
				<!-- password -->
                <span><?php echo $GLOBALS["ACCOUNT_INPUT_PASSWORD"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputAccountPassword" type="text" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_PASSWORD_PLACEHOLDER"]; ?>' required>
				
				<!-- permission -->
				<span><?php echo $GLOBALS["ACCOUNT_INPUT_PERMISSION"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="inputTeacherDegree" type="text" placeholder='<?php echo $GLOBALS["ACCOUNT_INPUT_PERMISSION_PLACEHOLDER"]; ?>' required>
        </div>
    </div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='accountSubmit' value='<?php echo $GLOBALS["LECTURE_SUBMIT"]; ?>' id="accountSubmit">
    </div>
</form>
<script>
</script>