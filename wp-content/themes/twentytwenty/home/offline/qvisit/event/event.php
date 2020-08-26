<?php
include get_theme_file_path("home/offline/qvisit/event/event-status.php");
include get_theme_file_path("home/offline/qvisit/event/event-interact-ui.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="event-page-loading">
        <span id="event-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="event-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="event-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	 <div class="manage-teacher-contain-left">
            <label class="manage-teacher-contain-left-upload" for="uploadShortDescriptionImg">
                <span>
                    <?php echo $GLOBALS["EVENT_SHORT_DESCRIPTION_IMG"]; ?>
                </span>
				<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
                <img id="shortDescriptionImg" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
                <input type="file" id="uploadShortDescriptionImg" name="uploadShortDescriptionImg" />
            </label>
     </div>
	
    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["EVENT_NAME_INPUT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleEvent" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["EVENT_NAME_INPUT_PLACEHOLDER"]; ?>' required>
			
			<!-- ngày bắt đầu -->
			<span><?php echo $GLOBALS["EVENT_START_AT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idEventStartAt" name="event_start_at" type="text" placeholder='<?php echo $GLOBALS["EVENT_START_AT_PLACEHOLDER"]; ?>' required>
			
			<!-- ngày kết thúc -->
			<span><?php echo $GLOBALS["EVENT_FINISH_AT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idEventFinishAt" name="event_finish_at" type="text" placeholder='<?php echo $GLOBALS["EVENT_FINISH_AT_PLACEHOLDER"]; ?>' required>
        </div>
        <hr class="manage-teacher-hr-between">
        <!-- mô tả -->
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="exhibitionSubDetailTextAreaTitle"><?php echo $GLOBALS["EVENT_DETAIL"]; ?></span>><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">
				<!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EVENT_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->
				<div id="eventDetailTextArea-toolbar-container"></div>
				<div id="eventDetailTextArea"><?php echo $GLOBALS["EVENT_DETAIL_PLACEHOLDER"]; ?></div>
			</div>
		</div>
        <!-- mô tả ngắn gọn -->
		<div class="manage-section-common-detail-midlle">
			<div class="manage-section-detail-midlle-span">
				<span id="eventSubDetailTextAreaTitle"><?php echo $GLOBALS["EVENT_SUB_DETAIL"]; ?></span>
			</div>
			<div class="manage-section-detail-midlle-item">
				<textarea id="eventSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["EVENT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
			</div>
		</div>
    </div>
	
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='eventSubmit' value='<?php echo $GLOBALS["EVENT_SUBMIT_ADD"]; ?>' id="eventSubmit">
    </div>
</form>
<script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script>
<script>
	let myCurrentEvent = {};
	let eventDescription = "";
    window.onload = function() {
        myCurrentEvent = {};
		eventDescription = "";
        //edit
        DecoupledEditor
            .create(document.querySelector('#eventDetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                eventDescription = editor;
                let toolbarContainer = document.querySelector('#eventDetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });
		if(getCurrentACtion() == dictionaryKey.addStatus){
			mobiscroll.datetime('#idEventStartAt', {
                theme: 'ios',
                themeVariant: 'light',
                layout: 'fixed',
				min: new Date(),
                   dateFormat: 'd/mm/yy',
				//dateFormat:'d/mm/yyyy', 
				timeFormat:'H:ii',
                display: 'bubble',
            });

            mobiscroll.datetime('#idEventFinishAt', {
                theme: 'ios',
                themeVariant: 'light',
                layout: 'fixed',
				min: new Date(),
                 dateFormat: 'd/mm/yy',
				//dateFormat:'d/mm/yyyy', 
				timeFormat:'H:ii', 
                display: 'bubble',
            });
			myCurrentEvent.startAt = correctDate(new Date());
			myCurrentEvent.finishAt = correctDate(new Date());
			document.getElementById("idEventStartAt").value = getDateString(new Date());
			document.getElementById("idEventFinishAt").value = getDateString(new Date());
			
		} else if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("eventSubmit").value = '<?php echo $GLOBALS["EVENT_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataEvent(true);
            requestToSever(
                sunQRequestType.get,
                getEvent(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataEvent(false);
                    if (res.code === networkCode.success) {
                        myCurrentEvent = res.data;
						//img
						document.getElementById("shortDescriptionImg").src = myCurrentEvent.descriptionImgUrl != null ? getHomeURL() + myCurrentEvent.descriptionImgUrl : '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>';
						
						//start date
							mobiscroll.datetime('#idEventStartAt', {
								theme: 'ios',
								themeVariant: 'light',
								layout: 'fixed',
								minDate: new Date(myCurrentEvent.startAt),
								   dateFormat: 'd/mm/yy',
								//dateFormat:'d/mm/yyyy', 
								timeFormat:'H:ii',
								display: 'bubble',
							});

          
						//end date
						
						 mobiscroll.datetime('#idEventFinishAt', {
							theme: 'ios',
							themeVariant: 'light',
							layout: 'fixed',
							minDate: new Date(myCurrentEvent.finishAt),
							 dateFormat: 'd/mm/yy',
							//dateFormat:'d/mm/yyyy', 
							timeFormat:'H:ii', 
							display: 'bubble',
						});
						
						 myCurrentEvent.startAt = correctDate(new Date(myCurrentEvent.startAt));
			document.getElementById("idEventStartAt").value = getDateString(new Date(myCurrentEvent.startAt));
						
			myCurrentEvent.finishAt = correctDate(new Date(myCurrentEvent.finishAt));
			document.getElementById("idEventFinishAt").value = getDateString(new Date(myCurrentEvent.finishAt));
						
						//title
						document.getElementById("idTitleEvent").value = myCurrentEvent.title == null ? "" : myCurrentEvent.title;
						
						//description
						eventDescription.setData(myCurrentEvent.description != null ? myCurrentEvent.description : "");
						
						//sub description
						document.getElementById("eventSubDetailTextArea").value = myCurrentEvent.shortDescription == null ? "" : myCurrentEvent.shortDescription;
						
                        console.log(res.data);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataEvent(dictionaryKey.ERR);
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
		
		let tempArray = localStorage.getItem('listScroll1'); 
		if(tempArray){
		   tempArray = JSON.parse(tempArray);
			let tempCheckExist = true;
			tempArray.some((item,index)=>{
				if(item.id == "idEventStartAt"){
					tempCheckExist = false;
				   return true;
				}
			});

			if (tempCheckExist){
				tempArray.push({id:"idEventStartAt",lib:'date'});
			}

			tempCheckExist = true;
			tempArray.some((item,index)=>{
				if(item.id == "idEventFinishAt"){
					tempCheckExist = false;
				   return true;
				}
			});

			if (tempCheckExist){
				tempArray.push({id:"idEventFinishAt",lib:'date'});
			}
		} else {
			tempArray= [];
			tempArray.push({id:"idEventStartAt",lib:'date'});
			tempArray.push({id:"idEventFinishAt",lib:'date'});
		}
		 localStorage.setItem('language', 'vietnam');
        localStorage.setItem('listScroll1', JSON.stringify(tempArray));
    }

	function upLoadImage(file) {
        let dataEventImgage = new FormData();
        dataEventImgage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDataEvent(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataEventImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDataEvent(false);
					if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
					 myCurrentEvent.descriptionImgUrl = res.urls[0];
				}
            },
            function(err) {
				setLoadingDataEvent(false);
                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_IMAGE_FAILED : dictionaryKey.UPLOAD_IMAGE_FAILED;
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
            },
            true,
        );
    }
	
	 document.getElementById("idTitleEvent").addEventListener("input", function(e) {
		let tttValue = e.target.value;
        myCurrentEvent.title = tttValue.escape();
    });

	 document.getElementById("idEventStartAt").addEventListener("change", function(e) {
		let datePart = e.target.value.split(" ")[0];
		document.getElementById("idEventStartAt").value = datePart;
		  let tempDate = corectDateForOnlyDate(e.target.value);
        myCurrentEvent.startAt = tempDate;
		if(isStartAtGreaterThanFinishAt(myCurrentEvent.startAt,myCurrentEvent.finishAt)){
			  myCurrentEvent.finishAt = myCurrentEvent.startAt;document.getElementById("idEventFinishAt").value = getDateString(new Date(myCurrentEvent.startAt));
		}
    });
	
	 document.getElementById("idEventFinishAt").addEventListener("change", function(e) {
		let datePart = e.target.value.split(" ")[0];
		 document.getElementById("idEventFinishAt").value = datePart;
		 let tempDate = corectDateForOnlyDate(e.target.value);
         myCurrentEvent.finishAt = tempDate;
		 if(isStartAtGreaterThanFinishAt(myCurrentEvent.startAt,myCurrentEvent.finishAt)){
			  myCurrentEvent.finishAt = myCurrentEvent.startAt;
			  document.getElementById("idEventFinishAt").value = getDateString(new Date(myCurrentEvent.startAt));
		 }
    });
	
	function isStartAtGreaterThanFinishAt(start,finish){
		return new Date(start).getTime() > new Date(finish).getTime();
	}
	
	document.getElementById("eventSubDetailTextArea").addEventListener("input", function(e) {
		   let tttValue = e.target.value;
           myCurrentEvent.shortDescription = tttValue.escape();
    });
	
    //submit form
    document.getElementById("eventSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        //console.log("email", myCurrentTeacher.email);
        myCurrentEvent.description = eventDescription.getData();
		/*
		if (myCurrentEvent.descriptionImgUrl == "" || myCurrentEvent.descriptionImgUrl == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_IMG_EVENT)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } 
		*/
         if (myCurrentEvent.title == "" || myCurrentEvent.title == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EVENT_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }
        else if (myCurrentEvent.startAt == "" || myCurrentEvent.startAt == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EVENT_START_AT)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else if (myCurrentEvent.finishAt == "" || myCurrentEvent.finishAt == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EVENT_FINISH_AT)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }else if (myCurrentEvent.description == "" || myCurrentEvent.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_EVENT_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        }else {
            let titlleRequestEvent = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD + dictionaryKey.EVENT_NAME;
            console.log("data lên " + JSON.stringify(myCurrentEvent));
			//alert("data lên " + JSON.stringify(myCurrentEvent));
            SunQAlert()
                .position('center')
                .title(titlleRequestEvent)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentEvent = myCurrentEvent;
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentEvent.createAt;
                        delete tempmyCurrentEvent.updateAt;
                        delete tempmyCurrentEvent.id;
                        delete tempmyCurrentEvent.serviceId;
                        

                        setLoadingDataEvent(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getEvent(getCurrentEdit()) : postEvent(service.qvisit),
                            tempmyCurrentEvent,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataEvent(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.EVENT_EDIT_SUCCESS : dictionaryKey.EVENT_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=offline&page=list-event");
                                        })
                                        .show();
                                } else if (res.code === networkCode.accessDenied) {
                                    makeAlertPermisionDenial();
                                } else if (res.code === networkCode.sessionTimeOut) {
                                    makeAlertRedirect();
                                } else {
                                    //alert("loi"+JSON.stringify(res));
                                    SunQAlert()
                                        .position('center')
                                        .title(dictionaryKey.SERVER_INFO + res.message)
                                        .type('error')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                        .callback((result) => {})
                                        .show();
                                }
                            },
                            function(err) {//alert("err");
                                setLoadingDataEvent(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.EVENT_EDIT_FAILED : dictionaryKey.EVENT_ADD_FAILED;
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