<?php
include get_theme_file_path("home/online/steamq/EPart/status-EPart.php");
	include get_theme_file_path("home/online/steamq/EPart/interact-ui-EPart.php" ); 
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="Question-page-loading">
        <span id="Question-page-loading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="Question-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="Question-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>
	<div class="manage-list-lecture-title">
        <span><?php echo $GLOBALS["QUESTION_INPUT_TITLE"]; ?></span>
    </div>
    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper question-div-detail">
					<span><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TITLE"]; ?></span>
					<input id="idTitlesteamqlessontitle" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_TITLE_PLACEHOLDER"]; ?>' required>

					
					<span class="question-option-title"><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_ANSWER_LIST"]; ?></span>
				
					<div class="manage-teacher-contain-right-upper-rcontainer rcontainer">
						<span class="manage-teacher-contain-right-upper-rcontainer-postfix">A.</span><input class="rcontainer-input" id="idTitlesteamqquestion1" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_OPTION_PLACEHOLDER"]; ?>'>
					  <input id="idSteamqAnwser1" type="radio" checked="checked" name="radio">
					  <span class="manage-teacher-contain-right-upper-rcheckmark"></span>
					</div>

					<div class="manage-teacher-contain-right-upper-rcontainer rcontainer">
						<span class="manage-teacher-contain-right-upper-rcontainer-postfix">B.</span><input class="rcontainer-input"  id="idTitlesteamqquestion2" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_OPTION_PLACEHOLDER"]; ?>'>
					  <input id="idSteamqAnwser2" type="radio" name="radio">
					  <span class="manage-teacher-contain-right-upper-rcheckmark"></span>
					</div>

					<div class="manage-teacher-contain-right-upper-rcontainer rcontainer">
						<span class="manage-teacher-contain-right-upper-rcontainer-postfix">C.</span><input class="rcontainer-input"  id="idTitlesteamqquestion3" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_OPTION_PLACEHOLDER"]; ?>'>
					  <input id="idSteamqAnwser3" type="radio" name="radio">
					  <span class="manage-teacher-contain-right-upper-rcheckmark"></span>
					</div>

					<div class="manage-teacher-contain-right-upper-rcontainer rcontainer">
					 <span class="manage-teacher-contain-right-upper-rcontainer-postfix">D.</span> <input class="rcontainer-input"  id="idTitlesteamqquestion4" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_OPTION_PLACEHOLDER"]; ?>'>
					  <input id="idSteamqAnwser4" type="radio" name="radio">
					  <span class="manage-teacher-contain-right-upper-rcheckmark"></span>
					</div>

					<span class="question-right-answer" id="rightAwnser"><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?></span>
				
					
					<span><?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_ANSWER"]; ?></span>
					<div class="manage-section-detail-midlle-item question-right-answer">
						<textarea id="steamqlessonAnswerTextArea" cols="80" placeholder='<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_ANSWER_PLACEHOLDER"]; ?>' required></textarea>
					</div>
			
				
			</div>		

    </div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='QuestionSubmit' value='<?php echo $GLOBALS["QUESTION_SUBMIT_ADD"]; ?>' id="QuestionSubmit">
    </div>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script>
    var QuestionDescription = "";
	var arrayHeader = ["a","b","c","d"];
	var arrayHeaderCap = ["A.","B.","C.","D."];
    window.onload = function() {
        myCurrentQuestion = {};

       
        if (getCurrentACtion() == dictionaryKey.addStatus) {
            document.getElementById("QuestionSubmit").value = '<?php echo $GLOBALS["QUESTION_SUBMIT_ADD"] ?>';
			myCurrentQuestion.answer = "a";
			document.getElementById("rightAwnser").innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>"+" "+"A.";
        }
        if (getCurrentACtion() == dictionaryKey.editStatus) {
            document.getElementById("QuestionSubmit").value = '<?php echo $GLOBALS["QUESTION_SUBMIT_EDIT"] ?>';

            //fetch từ server
            setLoadingDataQuestion(true);
            requestToSever(
                sunQRequestType.get,
                getURLQuestion(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataQuestion(false);
                    if (res.code === networkCode.success) {
                        myCurrentQuestion = res.data;
                        document.getElementById("idTitlesteamqlessontitle").value = myCurrentQuestion.content == null ? "" : myCurrentQuestion.content;
						
                        document.getElementById("idTitlesteamqquestion1").value = myCurrentQuestion.a == null ? "" : myCurrentQuestion.a;
						
                        document.getElementById("idTitlesteamqquestion2").value = myCurrentQuestion.b == null ? "" : myCurrentQuestion.b;
						
                        document.getElementById("idTitlesteamqquestion3").value = myCurrentQuestion.c == null ? "" : myCurrentQuestion.c;
						
                        document.getElementById("idTitlesteamqquestion4").value = myCurrentQuestion.d == null ? "" : myCurrentQuestion.d;
						
						let indexx = 0;
						arrayHeader.some((item,index)=>{
							if(item == myCurrentQuestion.answer){
								indexx = index;
							   return true;
							   }
						});
						
						
						document.getElementById("rightAwnser").innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>"+" "+arrayHeaderCap[indexx];
						
						if(indexx > 0){
						document.getElementById("idSteamqAnwser"+(indexx+1)).checked = true;
						}
						
                        document.getElementById("steamqlessonAnswerTextArea").value = myCurrentQuestion.interpretation == null ? "" : myCurrentQuestion.interpretation;
                       
                        
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    //alert(err);
                    setLoadingDataQuestion(dictionaryKey.ERR);
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

    document.getElementById("idTitlesteamqlessontitle").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentQuestion.content = tttValue.escape();
    });

    document.getElementById("idTitlesteamqquestion1").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentQuestion.a = tttValue.escape();
    });

	document.getElementById("idTitlesteamqquestion2").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentQuestion.b = tttValue.escape();
    });
	
	document.getElementById("idTitlesteamqquestion3").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentQuestion.c = tttValue.escape();
    });
	
	document.getElementById("idTitlesteamqquestion4").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentQuestion.d = tttValue.escape();
    });
	
	document.getElementById("idSteamqAnwser1").addEventListener("change", function(e) {
        myCurrentQuestion.answer = "a";
		document.getElementById("rightAwnser").innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>"+" "+"A.";
    });
	
	document.getElementById("idSteamqAnwser2").addEventListener("change", function(e) {
        myCurrentQuestion.answer = "b";
		document.getElementById("rightAwnser").innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>"+" "+"B.";
    });
	
	document.getElementById("idSteamqAnwser3").addEventListener("change", function(e) {
        myCurrentQuestion.answer = "c";
		document.getElementById("rightAwnser").innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>"+" "+"C.";
    });
	
	document.getElementById("idSteamqAnwser4").addEventListener("change", function(e) {
        myCurrentQuestion.answer = "d";
		document.getElementById("rightAwnser").innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>"+" "+"D.";
    });
	
    document.getElementById("steamqlessonAnswerTextArea").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentQuestion.interpretation = tttValue.escape();
    });

    //submit form
    document.getElementById("QuestionSubmit").addEventListener("click", function(e) {
        e.preventDefault();
//         myCurrentQuestion.description = QuestionDescription.getData();
        
//         if (myCurrentQuestion.thumbnailUrls == "" || myCurrentQuestion.thumbnailUrls == null) {
//             SunQAlert()
//                 .position('center')
//                 .title(dictionaryKey.WRONG_Question_IMAGE)
//                 .type('error')
//                 .confirmButtonColor("#3B4EDC")
//                 .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                 .callback((result) => {
//                     window.scrollTo(0, 0);
//                 })
//                 .show();
//         }if (myCurrentQuestion.price == "" || myCurrentQuestion.price == null) {
//             SunQAlert()
//                 .position('center')
//                 .title(dictionaryKey.WRONG_Question_PRICE)
//                 .type('error')
//                 .confirmButtonColor("#3B4EDC")
//                 .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                 .callback((result) => {
//                     window.scrollTo(0, 0);
//                 })
//                 .show();
//         }
        if (myCurrentQuestion.content == "" || myCurrentQuestion.content == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.WRONG_QUESTION_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else{
//         if (myCurrentQuestion.description == "" || myCurrentQuestion.description == null) {
//             SunQAlert()
//                 .position('center')
//                 .title(dictionaryKey.WRONG_Question_DESCRIPTION)
//                 .type('error')
//                 .confirmButtonColor("#3B4EDC")
//                 .confirmButtonText(dictionaryKey.TRY_AGAIN)
//                 .callback((result) => {
//                     window.scrollTo(0, 0);
//                 })
//                 .show();
//         } else {
            let titlleRequestQuestion = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD;
			myCurrentQuestion.classId = getSteamqpart();
			myCurrentQuestion.category = getSteamqclassid();
            console.log("data lên " + JSON.stringify(myCurrentQuestion));
            //alert("data lên " + JSON.stringify(myCurrentQuestion));
            SunQAlert()
                .position('center')
                .title(titlleRequestQuestion)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentQuestion = {...myCurrentQuestion};
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }
                        delete tempmyCurrentQuestion.createAt;
                        delete tempmyCurrentQuestion.updateAt;
                        delete tempmyCurrentQuestion.id;
                        delete tempmyCurrentQuestion.classId;
                        delete tempmyCurrentQuestion.category;
                        setLoadingDataQuestion(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLQuestion(getCurrentEdit()) : postURLQuestion(),
                            tempmyCurrentQuestion,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataQuestion(false);
                                //edit - title - add
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.QUESTION_EDIT_SUCCESS : dictionaryKey.QUESTION_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-steamq-question");
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
                            function(err) {
                                alert(err);
                                setLoadingDataQuestion(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.QUESTION_EDIT_FAILED : dictionaryKey.QUESTION_ADD_FAILED;
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