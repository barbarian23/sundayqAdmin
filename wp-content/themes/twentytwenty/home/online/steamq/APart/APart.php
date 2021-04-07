<?php
include get_theme_file_path("home/online/steamq/APart/status-APart.php");
include get_theme_file_path("home/online/steamq/APart/interact-ui-APart.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="steamq-page-loading">
        <span id="steamqlesson-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="steamq-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="steamq-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<div class="manage-list-lecture-title">
        <span id="currentTitle" style="text-transform:capitalists"></span>
    </div>
	
    <div class="manage-teacher-contain-left">
		<div class="manage-teacher-contain-right-upper">
			<label class="manage-teacher-contain-left-upload" for="uploadShortDescriptionImg">
				<span>
					<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_IMAGE"]; ?>
				</span>
				<span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
				<img id="shortDescriptionImg" class="manage-teacher-contain-left-img" src='<?php echo $GLOBALS["URI_ADD_NEW"]; ?>'>
				<input type="file" id="uploadShortDescriptionImg" name="uploadShortDescriptionImg" />
			</label>
		</div>
    </div>

    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitlesteamqlesson" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_NAME_PLACEHOLDER"]; ?>' required>

            <!-- tháng -->
            <span><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_MONTH"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idsteamqlessonMonth" name="steamqlesson_month" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_MONTH_PLACEHOLDER"]; ?>' readonly>

			 <!-- resource -->
            <span><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_RESOURCE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idSteamQVideo" name="FreeLessonTemplate1_Resource" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_RESOURCE_PLACEHOLDER"]; ?>' readonly>
			
			<span><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_LIST_VIDEO"]; ?></span>
            <div class="chosen-kit-video-FreeLessonTemplate1" id="currentListVideo">
                
            </div>
			
            <div class="manage-section-detail-left-list-parent" id="listVideo">
                <span class="manage-section-detail-left-list-close" id="listVideoClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchVideosteamq">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="manage-section-detail-left-list" id="divVideosteamq">

                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeVideoEmpty">
                    <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
                    <span><?php echo $GLOBALS["VIDEO_NO_LIST"]; ?></span>
                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeVideoError">
                    <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
                    <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
                </div>
            </div>

        </div>
        <!-- mô tả -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="exhibitionSubDetailTextAreaTitle"><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_DETAIL"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <!--  <textarea id="teacherDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_DETAIL_PLACEHOLDER"]; ?>' required></textarea>-->
                <div id="steamqlessonDetailTextArea-toolbar-container"></div>
                <div id="steamqlessonDetailTextArea"><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_DETAIL"]; ?></div>
            </div>
        </div>
        <!-- mô tả ngắn gọn -->
        <div class="manage-section-common-detail-midlle">
            <div class="manage-section-detail-midlle-span">
                <span id="steamqlessonSubDetailTextAreaTitle"><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_SUB_DETAIL"]; ?></span>
            </div>
            <div class="manage-section-detail-midlle-item">
                <textarea id="steamqlessonSubDetailTextArea" cols="80" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_SUB_DETAIL_PLACEHOLDER"]; ?>' required></textarea>
            </div>
        </div>
		
		<!-- question -->
		 <div class="manage-section-detail-midlle-span">
                <span id="steamqlessonSubDetailTextAreaTitle"><?php echo $GLOBALS["QUESTION_INPUT_TITLE"]; ?></span>
        </div>
		
		<input id="idSteamQQuestion" name="FreeLessonTemplate1_Kit" type="text" placeholder='<?php echo $GLOBALS["QUESTION_INPUT_TITLE_PLACEHOLDER"]; ?>' readonly>

<!--         <div class="chosen-kit-video-FreeLessonTemplate1" id="currentListQuestion">
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_KIT"]; ?></span>
        </div> -->
		
        <div class="manage-section-detail-midlle-span">
<!--             <span><?php echo $GLOBALS["STEAMQ_PLAN_TEMPLATE_INPUT_KIT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span> -->
            <div class="manage-section-detail-left-list-parent" id="listQuestion">
				<div class="question-util">
					<span class="manage-section-detail-left-list-close" id="listQuestionClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
					<input type="text" class="question-search" id="questionSearch" placeholder="<?php echo $GLOBALS["STEAMQ_PLAN_TEMPLATE_INPUT_SEARCH_NAME"]; ?>">
				</div>
                <div class="sunq-process-contain" id="fetchQuestionsteamq">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="popup-kit-video-steamq" id="divQuestionsteamq">

                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeQuestionEmpty">
                    <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
                    <span><?php echo $GLOBALS["QUESTION_NO_LIST"]; ?></span>
                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeQuestionError">
                    <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
                    <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
                </div>
            </div>
        </div>
        
		<div class="chosen-kit-video-FreeLessonTemplate1" id="currentListQuestion">
            <span id="steamqQuestionTitleUnder"><?php echo $GLOBALS["STEAMQ_PLAN_QUESTION_KIT"]; ?></span>
        </div>
		
		<!--
        <div class="manage-section-common-detail-midlle" id="listQuestion">
			<span id="statusquestionAdded">done</span>
            <div class="manage-section-detail-midlle-span">
                <span id="steamqlessonSubDetailTextAreaTitle"><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION"]; ?></span>
            </div>
           <div class="manage-teacher-contain-right-upper question-div question-div" id="question1">
				<div class="question-close" id="question-close">
					<span>X</span>
				</div>
				<div class="question-div">
					
					<span><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TIMES"]; ?></span></br>

					
					<span><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TITLE"]; ?></span>
					<input id="idTitlesteamqlessontitle" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TITLE_PLACEHOLDER"]; ?>' required>

					
					<span class="question-option-title"><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_ANSWER_LIST"]; ?></span>
				
					<div class="manage-teacher-contain-right-upper-rcontainer">
						<span class="manage-teacher-contain-right-upper-rcontainer-postfix">A.</span><input id="idTitlesteamqquestion" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_OPTION_PLACEHOLDER"]; ?>'>
					  <input type="radio" checked="checked" name="radio">
					  <span class="manage-teacher-contain-right-upper-rcheckmark"></span>
					</div>

					<div class="manage-teacher-contain-right-upper-rcontainer">
						<span class="manage-teacher-contain-right-upper-rcontainer-postfix">B.</span><input id="idTitlesteamqquestion" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_OPTION_PLACEHOLDER"]; ?>'>
					  <input type="radio" checked="checked" name="radio">
					  <span class="manage-teacher-contain-right-upper-rcheckmark"></span>
					</div>

					<div class="manage-teacher-contain-right-upper-rcontainer">
						<span class="manage-teacher-contain-right-upper-rcontainer-postfix">C.</span><input id="idTitlesteamqquestion" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_OPTION_PLACEHOLDER"]; ?>'>
					  <input type="radio" checked="checked" name="radio">
					  <span class="manage-teacher-contain-right-upper-rcheckmark"></span>
					</div>

					<div class="manage-teacher-contain-right-upper-rcontainer">
					 <span class="manage-teacher-contain-right-upper-rcontainer-postfix">D.</span> <input id="idTitlesteamqquestion" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_OPTION_PLACEHOLDER"]; ?>'>
					  <input type="radio" checked="checked" name="radio">
					  <span class="manage-teacher-contain-right-upper-rcheckmark"></span>
					</div>

					<span class="question-right-answer"><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?></span>
				
					
					<span><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_ANSWER"]; ?></span>
					<div class="manage-section-detail-midlle-item question-right-answer">
						<textarea id="steamqlessonAnswerTextArea" cols="80" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_ANSWER_PLACEHOLDER"]; ?>' required></textarea>
					</div>
				</div>
				
			</div>		 
        </div>
		
		 <input type="submit" name='steamqlessonAdd' value='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_ADD_QUESTION"]; ?>' id="steamqlessonAdd">
	-->
		<!-- kit -->
        <div class="manage-section-detail-midlle-span">
            <span><?php echo $GLOBALS["STEAMQ_PLAN_TEMPLATE_INPUT_KIT"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <div class="manage-section-detail-left-list-parent" id="listKit">
                <span class="manage-section-detail-left-list-close" id="listKitClose"><?php echo $GLOBALS["CLOSE"]; ?></span>
                <div class="sunq-process-contain" id="fetchKitsteamq">
                    <div class="sunq-process-contain-running">

                    </div>
                </div>
                <div class="popup-kit-video-steamq" id="divKitsteamq">

                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeKitEmpty">
                    <img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
                    <span><?php echo $GLOBALS["KIT_NO_LIST"]; ?></span>
                </div>
                <div class="manage-section-detail-left-list-empty" id="managaeKitError">
                    <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
                    <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
                </div>
            </div>
        </div>
        <input id="idSteamQKit" name="FreeLessonTemplate1_Kit" type="text" placeholder='<?php echo $GLOBALS["FREELESSON_TEMPLATE_INPUT_KIT_PLACEHOLDER"]; ?>' readonly>

        <div class="chosen-kit-video-FreeLessonTemplate1" id="currentListKit">
            <span><?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_KIT"]; ?></span>
        </div>
		
    </div>

    <div class="manage-teacher-bottom-action">
        <input type="submit" name='steamqlessonSubmit' value='<?php echo $GLOBALS["STEAMQ_PLAN_SUBMIT_ADD"]; ?>' id="steamqlessonSubmit">
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script>
<script>
    let myCurrentsteamqlesson = {}
    , steamqlessonDescription = ""
	, myQuestionListener = []
	, currentKit = null,
		currentQuestions = [],
		listQuestionFromServer = [],
        currentVideos = [], listKitFromServer = [], listVideoFromServer = [];
	let getTileinte = "";
	
    window.onload = function() {
        myCurrentsteamqlesson = {};
        steamqlessonDescription = "";
		steamqQuestion = {};
	
			
		
		getTileinte = setInterval(()=>{
			if(STEAMQ_CLASS[getSteamqclass()]){
			document.getElementById("currentTitle").innerHTML = getSteamqpart() + " - " + STEAMQ_CLASS[getSteamqclass()].description;
				clearInterval(getTileinte);
			}
		},500);
		
		//alert(getSteamqpart() + " - " + STEAMQ_CLASS[getSteamqclass()].description);
        //edit
        DecoupledEditor
            .create(document.querySelector('#steamqlessonDetailTextArea'), {
                extraPlugins: [myCustomUploadAdapterPlugin],
            })
            .then(editor => {
                steamqlessonDescription = editor;
                let toolbarContainer = document.querySelector('#steamqlessonDetailTextArea-toolbar-container');

                toolbarContainer.appendChild(editor.ui.view.toolbar.element);
            })
            .catch(error => {
                console.error(error);
            });

        if (getCurrentACtion() == dictionaryKey.addStatus) {
            mobiscroll.datetime('#idsteamqlessonMonth', {
                theme: 'ios',
                themeVariant: 'light',
                layout: 'fixed',
                value: 1,
                step: 1,
                min: 0,
                max: 30,
                display: 'bubble',
            });
        }

        let tempArray = localStorage.getItem('listScroll1');

        if (tempArray) {
            tempArray = JSON.parse(tempArray);
            console.log("tempArray", tempArray);
            let tempCheckExist = true;
            tempArray.some((item, index) => {
                if (item.id == "idsteamqlessonMonth") {
                    tempCheckExist = false;
                    return true;
                }
            });
            console.log("tempCheckExist", tempCheckExist);
            if (tempCheckExist) {
                tempArray.push({
                    id: "idsteamqlessonMonth",
                    lib: 'month'
                });
            }
        } else {
            tempArray = [];
            tempArray.push({
                id: "idsteamqlessonMonth",
                lib: 'month'
            });
        }

        localStorage.setItem('language', 'vietnam');
        localStorage.setItem('listScroll1', JSON.stringify(tempArray));
        
        mobiscroll.datetime('#idsteamqlessonMonth', {
            theme: 'ios',
            themeVariant: 'light',
            layout: 'fixed',
            //min: new Date(),
            dateFormat: 'd/mm/yy',
            //dateFormat:'d/mm/yyyy', 
            timeFormat: 'H:ii',
            display: 'bubble',
        });

        //myCurrentsteamqlesson.month = new Date().getMonth() + 1;

		//thứ tự kit -> video -> bài giảng hiện tại
		progressLoadKit();
		//createQuestion(0);
		
        
    }

	function setTitle(){
		
	}
	
	function upLoadImage(file) {
        let dataLectureImgage = new FormData();
        dataLectureImgage.append('file', file);
        window.scrollTo(0, 0);
        setLoadingDatasteamq(true);
        requestToSever(
            sunQRequestType.post,
            getURLUploadImage(),
            dataLectureImgage,
            getLocalStorage(dictionary.MSEC),
            function(res) {
                setLoadingDatasteamq(false);
//                 if (res.code === networkCode.success) {
//                     console.log("success", res);
// 					alert("successn");
//                     myCurrentTeacher.imgUrl = res.data.urls[0];
//                     //myCurrentTeacher.imgUrl
//                 } else 
					//console.log(res);                 
					if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                } else {
                    myCurrentsteamqlesson.thumbnailUrl = res.url;
					//alert("loi cmn 123 " + JSON.stringify(res) +" "+res.code+" "+res.message);
				}
            },
            function(err) {
                //setLoadingDataTeacher(dictionaryKey.ERR);
				setLoadingDatasteamq(false);
                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.UPLOAD_IMAGE_FAILED : dictionaryKey.UPLOAD_IMAGE_FAILED;
                SunQAlert()
                    .position('center')
                    .title(sunqalertfailed)
                    .type('error')
                    .confirmButtonColor("#3B4EDC")
                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                    .callback((result) => {
                        //webpageRedirect(window.location.href);
                    })
                    .show();
                console.log(dictionaryKey.ERR_INFO, err);
            },
            true,
        );
    }
	
	function progressLoadKit(){
		 setFetchingKitsteamq(true);
        requestToSever(
            sunQRequestType.get,
            getURLListKit(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingKitsteamq(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setKitGreaterThanZero(false);
                    } else {
                        
						emptyTableKitListsteamq();
                        createListKit(res.data);
                    }
					//load video
					progressLoadVideo();
                } else if (res.code === networkCode.accessDenied) {
                    makeAlertPermisionDenial();
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setFetchingKitsteamq(false);
                setKitFromServerSuccess(false);
                console.log(dictionaryKey.ERR_INFO, err);
                // 			if(res){
                // 			if (res.code === networkCode.sessionTimeOut){
                // 					makeAlertRedirect();
                // 			} else {
                // 				//console.log("123cxzczxc");

                // 			}
                //			}
            }
        );
	}
	
	function progressLoadVideo(){
		setFetchingVideosteamq(true);
        requestToSever(
            sunQRequestType.get,
            getListVideo(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingVideosteamq(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setVideoGreaterThanZero(false);
                    } else {
                        emptyTableKitListsteamq();
						//console.log("video",res.data);
                        createListVideo(res.data);
                    }
					progressLoadQuestion();
                } else if (res.code === networkCode.accessDenied) {
                    makeAlertPermisionDenial();
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setFetchingVideosteamq(false);
                setVideoFromServerSuccess(false);
                console.log(dictionaryKey.ERR_INFO, err);
                // 			if(res){
                // 			if (res.code === networkCode.sessionTimeOut){
                // 					makeAlertRedirect();
                // 			} else {
                // 				//console.log("123cxzczxc");

                // 			}
                //			}
            }
        );
	}
	
	function progressLoadQuestion(){
		setFetchingQuestionsteamq(true);
		let dataCurrentViewQuestion = {
				classId:getSteamqclassid(),
				category:getSteamqpart(),
            };
        requestToSever(
            sunQRequestType.get,
            prepareUrlForGetThatContainsBody(getListURLQuestion(), dataCurrentViewQuestion),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingQuestionsteamq(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setQuestionGreaterThanZero(false);
                    } else {
                        //emptyTableQuestionListsteamq();
						//console.log("Question",res.data);
						listQuestionFromServer = res.data;
                        createListQuestion(res.data);
						document.getElementById("questionSearch").style.display="flex";
						document.getElementById("questionSearch").addEventListener("input",function(e){
							console.log(e.target.value);
							searchQuestion(e.target.value);
						});
                    }
					progressLoadCurrentLesson();
                } else if (res.code === networkCode.accessDenied) {
                    makeAlertPermisionDenial();
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setFetchingQuestionsteamq(false);
                setQuestionFromServerSuccess(false);
                console.log(dictionaryKey.ERR_INFO, err);
                // 			if(res){
                // 			if (res.code === networkCode.sessionTimeOut){
                // 					makeAlertRedirect();
                // 			} else {
                // 				//console.log("123cxzczxc");

                // 			}
                //			}
            }
        );
	}
	
	function searchQuestion(e){
		let searchArray = null;
		if(e == ""){
			searchArray = listQuestionFromServer;
		} else{
		if(listQuestionFromServer != null || listQuestionFromServer.length > 0){
// 			listQuestionFromServer.filter((item,index) =>{ if(item.content.includes(e)){
// 				console.log("find",item.content);}});
			searchArray = listQuestionFromServer.filter((item,index) => item.content.includes(e));
		}
		}
		createListQuestion(searchArray);
	}
	
	function progressLoadCurrentLesson(){
		if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("steamqlessonSubmit").value = '<?php echo $GLOBALS["STEAMQ_PLAN_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDatasteamq(true);
            requestToSever(
                sunQRequestType.get,
                getURLLesson(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDatasteamq(false);
                    if (res.code === networkCode.success) {
                        myCurrentsteamqlesson = res.data.lesson;
                        //month
                        let tempDatee = new Date();
                        tempDatee.setMonth(myCurrentsteamqlesson.month - 1);
                        mobiscroll.datetime('#idsteamqlessonMonth', {
                            theme: 'ios',
                            themeVariant: 'light',
                            layout: 'fixed',
                            //minDate: tempDatee,
                            dateFormat: 'd/mm/yy',
                            //dateFormat:'d/mm/yyyy', 
                            timeFormat: 'H:ii',
                            display: 'bubble',
                        });
						let tempDate = new Date();
			tempDate.setMonth(myCurrentsteamqlesson.month);
			let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
			let monthmonth = monthTemp[tempDate.getMonth()] + ",năm " + tempDate.getFullYear();
						
						
                        document.getElementById("shortDescriptionImg").src =  myCurrentsteamqlesson.thumbnailUrl != null ? getHomeURL() + myCurrentsteamqlesson.thumbnailUrl : '<?php echo $GLOBALS["URI_ADD_NEW"]; ?>';
						
                        document.getElementById("idsteamqlessonMonth").value = monthmonth;
                        //title
                        document.getElementById("idTitlesteamqlesson").value = myCurrentsteamqlesson.title == null ? "" : myCurrentsteamqlesson.title;

                        //description
                        steamqlessonDescription.setData(myCurrentsteamqlesson.description != null ? myCurrentsteamqlesson.description : "");

                        //sub description
                        document.getElementById("steamqlessonSubDetailTextArea").value = myCurrentsteamqlesson.shortDescription == null ? "" : myCurrentsteamqlesson.shortDescription;

						 //KIT
                        currentKit = myCurrentsteamqlesson.kitId;
                        selectKitIndex(currentKit);

                        //resource
                         myCurrentsteamqlesson.resources && myCurrentsteamqlesson.resources.forEach((item, index) => {
							 console.log("video id", item);
							 if(item){
                            selectVideoIndex(item.id);
                            currentVideos.push(item.id);
							 }
                            //console.log("video", currentOwners);
                        });
						
						//quesstion
						if(myCurrentsteamqlesson.questions != null){
							myCurrentsteamqlesson.questions.forEach((item,index)=>{console.log("quesstion chooosen",item);
								selectQuestionIndex(item.id);
                            	currentQuestions.push(item.id);
								//number,title,a1,a2,a3,a4,correct,explain
								//createQuestion(index,item.content,item.a,item.b,item.c,item.d,item.answer,item.answer);
							})
						}
						
                        console.log(res.data);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDatasteamq(dictionaryKey.ERR);
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

        } else{
			 //createQuestion(0);
			  }
	}
	
// 	function deleteQuestion(number){
// 		showTextQuestion(true,false);
// 		showTextQuestion(false,false);
// 		let parent = document.getElementById("listQuestion");
// 		let child = document.getElementById("question"+number);
// 		parent.removeChild(child);
// 		let tLength = myCurrentsteamqlesson.questions.length;
// 		console.log("---------------------------");
// 		console.log("delete",number,"length",tLength);
// 		let tneedChange = number < tLength - 1;
// 		myCurrentsteamqlesson.questions.splice(number,1);
// 		//remove listener
// 		myQuestionListener.splice(number,1);
		
// 		console.log("length after remove",myCurrentsteamqlesson.questions.length);
// 		if(tneedChange){
// 			for(let indexx = number; indexx < myCurrentsteamqlesson.questions.length; indexx++){
// 				//console.log("change question",indexx);
// 		   		updateQuestionAfterRemove(indexx+1);
// 			}
// 		}
// 		console.log("---------------------------");
// 	}
	
// 	function updateQuestionAfterRemove(number){
// 		console.log("update question",number);
		
// 		let afterNumber = number-1;
// 		document.getElementById("question"+number).id="question"+afterNumber;
		
// 		let tClose = document.getElementById("questionClose"+number);
// 		tClose.id="questionClose"+afterNumber;
// 		tClose.addEventListener("click",()=>{
// 			myQuestionListener[afterNumber].close = function(){
// 			deleteQuestion(afterNumber);
// 			}
// 		});
		
// 		let ttitle = document.getElementById("idTitlesteamqlessontitle"+number);
// 		 document.getElementById("questionName"+number).innerHTML="<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TIMES"]; ?>" + "  " + number;
// 		ttitle.innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TIMES"]; ?>" + "  " + afterNumber;
// 		ttitle.addEventListener('input', (event) => {
// 			myQuestionListener[afterNumber].content = function(){
// 				myCurrentsteamqlesson.questions[afterNumber].content = event.target.value;
// 			}
// 			myQuestionListener[afterNumber].content();
// 			});
		
// 		//4 cau tra loi
// 		let arrayHeader = ["A.", "B.", "C.", "D."];
// 		let arrayHeaderObject = ["a", "b", "c", "d"];
// 		for(let indexx = 0; indexx < 4; indexx++){
	
// 			let tdAnswer = document.getElementById("idTitlesteamqQuestionAnswer"+number+indexx+arrayHeaderObject[indexx]);
// 			//console.log("idTitlesteamqQuestionAnswer"+number+indexx+arrayHeaderObject[indexx]);
// 			tdAnswer.id="idTitlesteamqQuestionAnswer"+afterNumber+indexx;
// 			//console.log("tdAnswer",tdAnswer);
// 			tdAnswer.addEventListener('input', (event) => {
// 				myQuestionListener[afterNumber][arrayHeaderObject[indexx]] = function(){
// 					myCurrentsteamqlesson.questions[afterNumber][arrayHeaderObject[indexx]] = event.target.value;
// 				}
// 				myQuestionListener[afterNumber][arrayHeaderObject[indexx]]();
// 			});
// 			//console.log("idTitlesteamqQuestionAnswerCheckbox"+number+indexx+arrayHeaderObject[indexx]);
// 			let tACheckbox = document.getElementById("idTitlesteamqQuestionAnswerCheckbox"+number+indexx+arrayHeaderObject[indexx]);
// 			//console.log("tACheckbox",tACheckbox);
// 			tACheckbox.id = "idTitlesteamqQuestionAnswerCheckbox"+afterNumber+indexx+arrayHeaderObject[indexx];
// 			tACheckbox.name = "questionanser"+number;
// 			tACheckbox.addEventListener('change', (event) => {
// 				myQuestionListener[afterNumber].answer = function(){
// 				myCurrentsteamqlesson.questions[afterNumber].answer=arrayHeaderObject[indexx];
// 				}
// 				myQuestionListener[afterNumber].answer();
// 			});
// 		}
		
// 		let tanswer = document.getElementById("questionRightAnswer"+number);
// 		tanswer.id="questionRightAnswer"+afterNumber;
		
// 		let texta = document.getElementById("steamqlessonAnswerTextArea"+number);
// 		texta.id="steamqlessonAnswerTextArea"+afterNumber;
// 		texta.addEventListener('input', (event) => {
// 			myQuestionListener[afterNumber].interpretation = function(){
// 				myCurrentsteamqlesson.questions[afterNumber].interpretation = event.target.value;
// 			}
// 			myQuestionListener[afterNumber].interpretation();
// 			});
		
// 	}
	
// 	function createQuestion(number,title,a1,a2,a3,a4,correct,explain){	
// 		if(myCurrentsteamqlesson.questions == null){
// 			myCurrentsteamqlesson.questions = [];
// 		}
// 			myCurrentsteamqlesson.questions[number] = {};
// 		myQuestionListener[number] = {};
		
// 		console.log("cindex",myCurrentsteamqlesson.questions.length);
// 		let parent = document.getElementById("listQuestion");
		
// 		let divQuestion = document.createElement("div");
// 		divQuestion.id = "question"+number;
// 		divQuestion.className = "manage-teacher-contain-right-upper question-div";
		
// 		let divClose = document.createElement("div");
// 		divClose.className = "question-close";
// 		divClose.id = "questionClose"+number;
// 		let divCloseSpan = document.createElement("span");
// 		divCloseSpan.innerHTML = "X";
// 		divClose.appendChild(divCloseSpan);
		
// 		divClose.addEventListener("click",()=>{
// 			//let question = deleteQuestion(number);
// 			myQuestionListener[number].close = function(){
// 				deleteQuestion(number);
// 			}
// 			myQuestionListener[number].close();
// 		});
		
// 		let divQuestionDetail = document.createElement("div");
// 		divQuestionDetail.className = "question-div";
		
// 		divQuestionDetail.appendChild(divClose);
		
// 		let divQuestionSpanTitle = document.createElement("span");
// 		divQuestionSpanTitle.id = "questionName"+number;
// 		divQuestionSpanTitle.innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TIMES"]; ?>" + "  " + (number + 1);
// 		divQuestionDetail.appendChild(divQuestionSpanTitle);
		
// 		let divQuestionSpanTitleName = document.createElement("span");
// 		divQuestionSpanTitleName.innerHTML = title != null && title != "" ? title : "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TITLE"]; ?>";
// 		divQuestionDetail.appendChild(divQuestionSpanTitleName);
		
// 		let divQuestionSpanTitleInput= document.createElement("input");
// 		divQuestionSpanTitleInput.className="question-div-detail-name";
// 		divQuestionSpanTitleInput.id = "idTitlesteamqlessontitle"+number;
// 		divQuestionSpanTitleInput.type = "text";
// 		divQuestionSpanTitleInput.placeholder = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TITLE_PLACEHOLDER"]; ?>";
// 		divQuestionSpanTitleInput.addEventListener('input', (event) => {
			
// 				myQuestionListener[number].content = function(){
// 					myCurrentsteamqlesson.questions[number].content =  event.target.value
// 				};
			
// 			myQuestionListener[number].content();
// 				//myCurrentsteamqlesson.questions[number].content = event.target.value;
// 			});
// 		divQuestionDetail.appendChild(divQuestionSpanTitleInput);
		
// 		let divQuestionSpanOption = document.createElement("span");
// 		divQuestionSpanOption.innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_ANSWER_LIST"]; ?>";
// 		divQuestionDetail.appendChild(divQuestionSpanOption);
		
// 		//4 cau tra loi
// 		let arrayHeader = ["A.", "B.", "C.", "D."];
// 		let arrayHeaderObject = ["a", "b", "c", "d"];
// 		//timf index cua cau hoi
// 		let correctAnswerIndex = null;
// 		if(correct){
// 		arrayHeaderObject.some((itemj,indexj)=>{
// 			if(itemj == correct){
// 			   	correctAnswerIndex = indexj;
// 				return true;
// 			}
// 		});
// 		}
// 		for(let indexx = 0; indexx < 4; indexx++){
// 			let divQuestionSpan = document.createElement("div");
// 			divQuestionSpan.className = "manage-teacher-contain-right-upper-rcontainer";
			
// 			let divQuestionspanHeader = document.createElement("span");
// 			divQuestionspanHeader.className="manage-teacher-contain-right-upper-rcontainer-postfix";
// 			divQuestionspanHeader.innerHTML=arrayHeader[indexx];
			
// 			let divQuestionInputDetailAnswer =  document.createElement("input");
// 			divQuestionInputDetailAnswer.type = "text";
// 			divQuestionInputDetailAnswer.id = "idTitlesteamqQuestionAnswer"+number+indexx+arrayHeaderObject[indexx];
// 			divQuestionInputDetailAnswer.placeholder = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_OPTION_PLACEHOLDER"]; ?>";
// 			divQuestionInputDetailAnswer.addEventListener('input', (event) => {
// 				myQuestionListener[number][arrayHeaderObject[indexx]] = function(){
// 					myCurrentsteamqlesson.questions[number][arrayHeaderObject[indexx]] = event.target.value;
// 				};
// 				myQuestionListener[number][arrayHeaderObject[indexx]]();
// 			});
			
// 			let divQuestionInputDetailAnswerCheckbox = document.createElement("input");
// 			divQuestionInputDetailAnswerCheckbox.type = "radio";
// 			divQuestionInputDetailAnswerCheckbox.name = "questionanser"+number;
// 			divQuestionInputDetailAnswerCheckbox.id = "idTitlesteamqQuestionAnswerCheckbox"+number+indexx+arrayHeaderObject[indexx];
// 			divQuestionInputDetailAnswerCheckbox.addEventListener('change', (event) => {
// 				myQuestionListener[number].answer = function(){
// 			 	document.getElementById("questionRightAnswer"+number).innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>" + " " + arrayHeader[indexx];
// 				myCurrentsteamqlesson.questions[number].answer=arrayHeaderObject[indexx];
// 				//console.log(event.target.id);
// 				}
// 				myQuestionListener[number].answer();
// 			});
// 			if(indexx === 0 && correct == null){
// 			   	divQuestionInputDetailAnswerCheckbox.checked = true;
// 				myCurrentsteamqlesson.questions[number].answer=arrayHeaderObject[indexx];
// 			   }
// 			if(correct != null && correctAnswerIndex != null){
// 			   if(indexx == correctAnswerIndex){
// 				  divQuestionInputDetailAnswerCheckbox.checked = true;
// 				   myCurrentsteamqlesson.questions[number].answer=arrayHeaderObject[indexx];
// 				  }
// 			   }
			
			
// 			let divQuestionspanFooter = document.createElement("span");
// 			divQuestionspanFooter.className="manage-teacher-contain-right-upper-rcheckmark";
			
// 			divQuestionSpan.appendChild(divQuestionspanHeader);	
// 			divQuestionSpan.appendChild(divQuestionInputDetailAnswer);	
// 			divQuestionSpan.appendChild(divQuestionInputDetailAnswerCheckbox);			
// 			divQuestionSpan.appendChild(divQuestionspanFooter);
// 			divQuestionDetail.appendChild(divQuestionSpan);
// 		}
		
		
		
// 		let divQuestionSpanAnwser = document.createElement("span");
// 		divQuestionSpanAnwser.className = "question-right-answer";
// 		divQuestionSpanAnwser.id = "questionRightAnswer"+number;
// 		divQuestionSpanAnwser.innerHTML = correct != null && correct != "" ?  "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>" + " " + arrayHeaderObject[correctAnswerIndex] : "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>" + " " + arrayHeader[0];
// 		divQuestionDetail.appendChild(divQuestionSpanAnwser);
		
// 		let divQuestionSpanExplain = document.createElement("span");
// 		divQuestionSpanExplain.innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_ANSWER"]; ?>";
// 		divQuestionDetail.appendChild(divQuestionSpanExplain);
		
// 		let divQuestionDivExplain = document.createElement("div");
// 		divQuestionDivExplain.className = "manage-section-detail-midlle-item question-right-answer";
		
// 		let divQuestionDivTextareaExplain = document.createElement("textarea");
// 		divQuestionDivTextareaExplain.id = "steamqlessonAnswerTextArea"+number;
// 		divQuestionDivTextareaExplain.cols = 80;
// 		divQuestionDivTextareaExplain.placeholder = explain != null && explain != "" ? "" : "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_ANSWER_PLACEHOLDER"]; ?>";
// 		divQuestionDivTextareaExplain.value = explain != null && explain != "" ? explain : "";
// 		divQuestionDivTextareaExplain.addEventListener('input', (event) => {
// 			myQuestionListener[number].interpretation = function(){
// 				myCurrentsteamqlesson.questions[number].interpretation = event.target.value;
// 			}
// 			myQuestionListener[number].interpretation();
// 			});
		
// 		divQuestionDivExplain.appendChild(divQuestionDivTextareaExplain)
// 		divQuestionDetail.appendChild(divQuestionDivExplain);
		
// 		divQuestion.appendChild(divClose);
// 		divQuestion.appendChild(divQuestionDetail);
		
// 		parent.appendChild(divQuestion);
// 		showTextQuestion(false,true);
// 	}
	
    document.getElementById("idTitlesteamqlesson").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentsteamqlesson.title = tttValue.escape();
    });

// 	document.getElementById("steamqlessonAdd").addEventListener("click", function(e) {
// 		e.preventDefault();
// 		showTextQuestion(true,true);
// 		//console.log(myCurrentsteamqlesson.questions.length);
// 		 let tempIndex = myCurrentsteamqlesson.questions == undefined || myCurrentsteamqlesson.questions.length == 0 ? 0 : myCurrentsteamqlesson.questions.length;
//         createQuestion(tempIndex);
//     });
	
	 //video
    document.getElementById("idSteamQVideo").addEventListener("click", function(e) {
        getChoosingVideosteamq() ? setChoosingVideosteamq(false) : setChoosingVideosteamq(true);
    });

    document.getElementById("listVideoClose").addEventListener("click", function(e) {
        getChoosingVideosteamq() ? setChoosingVideosteamq(false) : setChoosingVideosteamq(true);
    });

    //kit
    document.getElementById("idSteamQKit").addEventListener("click", function(e) {
        getChoosingKitsteamq() ? setChoosingKitsteamq(false) : setChoosingKitsteamq(true);
    });

    document.getElementById("listKitClose").addEventListener("click", function(e) {
        getChoosingKitsteamq() ? setChoosingKitsteamq(false) : setChoosingKitsteamq(true);
    });
	
	 //question
    document.getElementById("idSteamQQuestion").addEventListener("click", function(e) {
        getChoosingQuestionsteamq() ? setChoosingQuestionsteamq(false) : setChoosingQuestionsteamq(true);
    });

    document.getElementById("listQuestionClose").addEventListener("click", function(e) {
        getChoosingQuestionsteamq() ? setChoosingQuestionsteamq(false) : setChoosingQuestionsteamq(true);
    });
	
    document.getElementById("idsteamqlessonMonth").addEventListener("change", function(e) {
		//e.target.value.split("/")[1] + "/" + e.target.value.split("/")[0] + "/" + e.target.value.split("/")[2]
		let tempDate = new Date(e.target.value.split("/")[1]+"/"+e.target.value.split("/")[0]+"/"+e.target.value.split("/")[2]);
		//tempDate.setMonth(1);
		//console.log("month change",e.target.value,Number.parseInt(e.target.value.split("/")[1])-1);
        let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
// 		if (getCurrentACtion() == dictionaryKey.editStatus){
		
// 		 SunQAlert()
//             .position('center')
//             .title(dictionaryKey.FREELESSON_PLAN_LIST_NO_NEED_TO_CHANGE_MONTH)
//             .type('error')
//             .confirmButtonColor("#3B4EDC")
//             .confirmButtonText(dictionaryKey.AGREE)
//             .callback((result) => {
//                 let ttdate = new Date();
//                 if (myCurrentsteamqlesson.month) {
//                     ttdate.setMonth(myCurrentsteamqlesson.month-1);
					
//                     document.getElementById("idsteamqlessonMonth").value = monthTemp[ttdate.getMonth() + 1] + ",năm " + ttdate.getFullYear();
//                 } else {
//                     document.getElementById("idsteamqlessonMonth").value = "";
//                 }
//                 //document.getElementById("idsteamqlessonMonth").value = myCurrentsteamqlesson.month == null ? "" : monthTemp[tempDate.getMonth() + 1] + ",năm " + tempDate.getFullYear();
//             })
//             .show();
// 		} else {
			
					console.log("month",myCurrentsteamqlesson.month,tempDate.getMonth(), monthTemp[tempDate.getMonth() + 1]);
        document.getElementById("idsteamqlessonMonth").value = monthTemp[tempDate.getMonth() + 1] + ",năm " + tempDate.getFullYear();
        myCurrentsteamqlesson.month = tempDate.getMonth() + 1;
//         }
    });

    document.getElementById("steamqlessonSubDetailTextArea").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentsteamqlesson.shortDescription = tttValue.escape();
    });

	document.getElementById('uploadShortDescriptionImg').addEventListener("change", (evt) => {
        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;
        //upLoadImage(tgt.files[0]);
        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function() {
                document.getElementById("shortDescriptionImg").src = fr.result;
                upLoadImage(files[0]);
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    });
	
    //submit form
    document.getElementById("steamqlessonSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        //console.log("email", myCurrentTeacher.email);
        myCurrentsteamqlesson.description = steamqlessonDescription.getData();
		myCurrentsteamqlesson.kitId = currentKit;
        myCurrentsteamqlesson.resources = currentVideos;
		myCurrentsteamqlesson.category = getSteamqpart();
		myCurrentsteamqlesson.isSampleLesson = false;
		myCurrentsteamqlesson.questionIds = currentQuestions;
        /*
		if (myCurrentsteamqlesson.descriptionImgUrl == "" || myCurrentsteamqlesson.descriptionImgUrl == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_IMG_FreeLesson)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } 
		*/
        if (myCurrentsteamqlesson.title == "" || myCurrentsteamqlesson.title == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_PLAN_KIT_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else if (myCurrentsteamqlesson.month == "" || myCurrentsteamqlesson.month == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_PLAN_KIT_IMAGE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else if (myCurrentsteamqlesson.description == "" || myCurrentsteamqlesson.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.FREELESSON_PLAN_KIT_DESCRIPTION)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else {
            let titlleRequestFreeLesson = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD;
            console.log("data lên " + JSON.stringify(myCurrentsteamqlesson));
            //alert("data lên " + JSON.stringify(myCurrentsteamqlesson));
            SunQAlert()
                .position('center')
                .title(titlleRequestFreeLesson)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentsteamqlesson = Object.assign({},myCurrentsteamqlesson);
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }

                        delete tempmyCurrentsteamqlesson.createAt;
                        delete tempmyCurrentsteamqlesson.updateAt;
                        delete tempmyCurrentsteamqlesson.id;
                        delete tempmyCurrentsteamqlesson.serviceId;
                        delete tempmyCurrentsteamqlesson.thumbnail;
                        delete tempmyCurrentsteamqlesson.questions;
                        delete tempmyCurrentsteamqlesson.kit;
                        delete tempmyCurrentsteamqlesson.questions;
                        delete tempmyCurrentsteamqlesson.classId;
                        //delete tempmyCurrentsteamqlesson.questionIds;

						console.log(getCurrentACtion(),dictionaryKey.editStatus);
                        setLoadingDatasteamq(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLLesson(getCurrentEdit()) : postURLLesson(getSteamqParentId()),
                            tempmyCurrentsteamqlesson,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDatasteamq(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.STEAMQ_CLASS_EDIT_SUCCESS : dictionaryKey.STEAMQ_CLASS_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
										
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=steamq-kit-class-" + getSteamqclass() + "&sclass=" + getSteamqclass() + "&id=" + getSteamqParentId() + "&category=" + getSteamqpart());
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
                            function(err) { //alert("err");
                                setLoadingDatasteamq(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.STEAMQ_CLASS_EDIT_FAILED : dictionaryKey.STEAMQ_CLASS_ADD_FAILED;
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