<?php 
	include get_theme_file_path("home/offline/qvisit/exhibition/exhibition-status.php");
	include get_theme_file_path("home/offline/qvisit/exhibition/exhibition-interact-ui.php" ); 
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
	 window.onload = function() {
		myCurrentExhibition =  {};
		
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
			  
			//fetch từ server
            setLoadingDataExhibition(true);
            requestToSever(
                sunQRequestType.get,
                getExhibition(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataExhibition(false);
                    if (res.code === networkCode.success) {
                        myCurrentExhibition = res.data;
                        console.log(res.data);
                        
						 mobiscroll.number('#', {
							theme: 'ios',
							themeVariant: 'light',
							layout: 'fixed',
							value: 1,
							defaultValue:yearEXP,
							step: 1,
							min: 0,
							max: 30,
							display: 'bubble',
						});
				
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataExhibition(dictionaryKey.ERR);
                    console.log(dictionaryKey.ERR_INFO, err);
                    SunQAlert()
                        .position('center')
                        .title(dictionaryKey.ERROR_API_MESSAGE)
                        .type('error')
                        .confirmButtonColor("#3B4EDC")
                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                        .callback((result) => {
                            webpageRedirect(window.location.href);
                        })
                        .show();
                }
            );
			  
		  }
	 }
	 
	 
	  //submit form
    document.getElementById("exhibitionSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        //console.log("email", myCurrentTeacher.email);
        if (myCurrentExhibition.title == "" || myCurrentExhibition.title == null ){
			SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EXHIBITION_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0,0);
                })
                .show();
		}if (myCurrentExhibition.minTargetAge == "" || myCurrentExhibition.minTargetAge == null ){
			SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EXHIBITION_MINTARGETAGE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0,0);
                })
                .show();
		} if (myCurrentExhibition.maxTargetAge == "" || myCurrentExhibition.maxTargetAge == null ){
			SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EXHIBITION_MAXTARGETAGE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0,0);
                })
                .show();
		} if (myCurrentExhibition.description == "" || myCurrentExhibition.description == null ){
			SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EXHIBITION_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0,0);
                })
                .show();
		}  else {
            let titlleRequestExhibition = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT: dictionaryKey.REQUEST_ADD + dictionaryKey.LECTURE_NAME;
			console.log("data lên " + JSON.stringify(myCurrentExhibition);
			//alert("data lên " + myCurrentTeacher.practiceAt);
            SunQAlert()
                .position('center')
                .title(titlleRequestExhibition)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentExhibition = myCurrentExhibition;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        } 

                        delete tempmyCurrentExhibition.createAt;
                        delete tempmyCurrentExhibition.updateAt;
                        delete tempmyCurrentExhibition.id;
						myCurrentExhibition.description = teacherDesciption.getData();
                       
                        setLoadingDataExhibition(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getExhibition(getCurrentEdit()),
                            tempmyCurrentTeacher,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataExhibition(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.EXHIBITION_EDIT_SUCCESS : dictionaryKey.EXHIBITION_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-exhibition");
                                        })
                                        .show();
                                } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                                    makeAlertRedirect();
                                } else {
									//alert("loi"+JSON.stringify(res));
									SunQAlert()
										.position('center')
										.title(dictionaryKey.SERVER_INFO + res.message)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {								
										})
										.show();  
								}
                            },
                            function(err) {
                                setLoadingDataTeacher(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.EXHIBITION_EDIT_FAILED : dictionaryKey.EXHIBITION_ADD_FAILED;
                                SunQAlert()
                                    .position('center')
                                    .title(sunqalertfailed)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       // webpageRedirect(window.location.href);
                             
                                    })
                                    .show();
                                console.log(dictionaryKey.ERR_INFO, err);
                            }
                        );
                    }
                })
                .show();
        }
    });
	 
</script>