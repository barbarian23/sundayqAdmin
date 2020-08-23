<?php 
	include ("home/offline/qvisit/exhibition/exhibition-status.php");
	include ("home/offline/qvisit/exhibition/exhibition-interact-ui.php" ); 
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="exhibition-page-loading">
        <span id="exhibition-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="exhibition-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="exhibition-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
	
	<div class="manage-teacher-contain-right">
            <div class="manage-teacher-contain-right-upper">
				<!-- title -->
                 <span><?php echo $GLOBALS["EXHIBITON_NAME_INPUT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idTitleExhibition" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["EXHIBITON_NAME_INPUT_PLACEHOLDER"]; ?>' required>
				
				<!-- age from -->
                <span><?php echo $GLOBALS["EXHIBITON_AGE_INPUT_FROM"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idAgeOfExhibitionFrom" name="lecture_age" type="text" placeholder='<?php echo $GLOBALS["EXHIBITON_AGE_INPUT_PLACEHOLDER"]; ?>' required>
				
				<!-- age to -->
				 <span><?php echo $GLOBALS["EXHIBITON_AGE_INPUT_TO"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <input id="idAgeOfExhibitionTo" name="lecture_age" type="text" placeholder='<?php echo $GLOBALS["EXHIBITON_AGE_INPUT_PLACEHOLDER"]; ?>' required>
            </div>
            <hr class="manage-teacher-hr-between">
            <div class="manage-teacher-contain-right-below">
				<span><?php echo $GLOBALS["EXHIBITON_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
              <!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EXHIBITON_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->
				<div id="exhibitionDetailTextArea-toolbar-container"></div>
				<div id="exhibitionDetailTextArea" ><?php echo $GLOBALS["EXHIBITON_DETAIL_PLACEHOLDER"]; ?></div>
				
				<span id="exhibitionSubDetailTextAreaTitle"><?php echo $GLOBALS["EXHIBITON_SUB_DETAIL"]; ?></span>
			<textarea id="exhibitionSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EXHIBITON_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
        </div>
	  <div class="manage-teacher-bottom-action">
        <input type="submit" name='exhibitionSubmit' value='<?php echo $GLOBALS["EXHIBITON_SUBMIT_ADD"]; ?>' id="exhibitionSubmit">
    </div>
</form>
<script>
var listExhibition = [];

	 window.onload = function() {
		myCurrentExhibition =  {};
		lectureDescription = "";
		
		 if (getCurrentACtion() == dictionaryKey.addStatus){
			  mobiscroll.number('#idAgeOfExhibitionFrom', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            value: 1,
            step: 1,
			defaultValue:1,
            min: 0,
            max: 18,
            display: 'bubble',
        });

        mobiscroll.number('#idAgeOfExhibitionTo', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            value: 1,
            step: 1,
			defaultValue:1,
            min: 0,
            max: 18,
            display: 'bubble',
        });
		 }
       
		
		//console.log(localStorage.getItem('listScroll1'));
		let tempArray = localStorage.getItem('listScroll1'); 
		if(tempArray){
		   tempArray = JSON.parse(tempArray);
			let tempCheckExist = true;
			tempArray.some((item,index)=>{
				if(item.id == "idAgeOfExhibitionFrom"){
					tempCheckExist = false;
				   return true;
				}
			});

			if (tempCheckExist){
				tempArray.push({id:"idAgeOfExhibitionFrom",lib:'number'});
			}

			tempCheckExist = true;
			tempArray.some((item,index)=>{
				if(item.id == "idAgeOfExhibitionTo"){
					tempCheckExist = false;
				   return true;
				}
			});

			if (tempCheckExist){
				tempArray.push({id:"idAgeOfExhibitionTo",lib:'number'});
			}
		} else {
			tempArray= [];
			tempArray.push({id:"idAgeOfExhibitionFrom",lib:'number'});
			tempArray.push({id:"idAgeOfExhibitionTo",lib:'number'});
		}
		
		console.log("array",tempArray);
		localStorage.setItem('language','vietnam');
		localStorage.setItem('listScroll1',JSON.stringify(tempArray));
		 
		  if (getCurrentACtion() == dictionaryKey.editStatus) {
			document.getElementById("exhibitionSubmit").value = '<?php echo $GLOBALS["EXHIBITON_SUBMIT_EDIT"] ?>';
		  }
	 }
</script>