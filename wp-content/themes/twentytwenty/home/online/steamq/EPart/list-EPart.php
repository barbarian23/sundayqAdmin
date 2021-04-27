<?php 
	include get_theme_file_path("home/online/steamq/EPart/status-EPart.php");
	include get_theme_file_path("home/online/steamq/EPart/interact-ui-EPart.php" ); 
?>
<div class="manage-list-lecture">
	<div class="manage-list-lecture-title-list-contain">
<!-- 		<div class="manage-list-lecture-title">
			<span><?php echo $GLOBALS["Question_LIST_TITLE"]; ?></span>
		</div> -->

		<div id="uploadingq" class="manage-list-lecture-title">
			<span id="questionUpload"></span>
		</div> 
		
		<div class="manage-list-steamq-category" id="classQuestion">
			
		</div>
		
		<div class="manage-list-steamq-category" id="categoryQuestion">
			<div id="science">
				<a id="sciencea" href=""><span>Science</span></a>
			</div>
			<div id="technology">
				<a id="technologya" href="javascript:void(0);"><span>Technology</span></a>
			</div>
			<div id="engineering">
				<a id="engineeringa" href="javascript:void(0);"><span>Engineering</span></a>
			</div>
			<div id="art">
				<a id="arta" href="javascript:void(0);"><span>Art</span></a>
			</div>
			<div id="math" >
				<a id="matha" href="javascript:void(0);"><span>Math</span></a>
			</div>
		</div>
		
	
		
		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListQuestionProgress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListQuestion">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="listQuestionEmpty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["Question_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="listQuestionError">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-Question"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListQuestion">
			
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a id="questionadd" href="?mode=online&page=steamq-question&action=add">
				<button>
					<span><?php echo $GLOBALS["QUESTION_SUBMIT_ADD"]; ?></span>
				</button>
			</a>
		</div>
		
		 <div class="class-editor">
			<div class="manage-list-lecture-add-new">
				<a href="javascript:void(0);">
					<button onClick = "makeExcel()">
						<span><?php echo $GLOBALS["QUESTION_SUBMIT_EXCEL_DOWNLOAD"]; ?></span>
					</button>
				</a>
			</div>

			 <div class="manage-section-detail-right-item-input-change" id="divExcelQuestion">
				<label class="manage-section-detail-right-item-input-change-label" id="uploadExcelQuestion" for="uploadDescriptionURL">
                    <span id="btnExcelQuestion"><?php echo $GLOBALS["QUESTION_SUBMIT_EXCEL_UPLOAD"] ; ?></span>
                    <input type="file" name="files[]" onclick="this.value=null;" id="uploadDescriptionURL" name="uploadDescriptionURL">
                </label>
				 <span id="fileUploadedName"></span>
			</div>	
		</div>

		<div class="class-editor" id="divQuestionUploadQuanlity">
			
		</div>
		
		<div class="popup-kit-video-steamq" id="divQuestionListsteamq">

        </div>
		
	</div>
</div>
<script src="wp-content/themes/twentytwenty/assets/js/jszip.js"></script>
<script src="wp-content/themes/twentytwenty/assets/js/xlsx.js"></script>
<script>
var listVisitedQuestion = [],listQuestion = [], currentQuestions = [], getClassInte = null, currentClass = null, currentCategory = null;
window.onload = function() {
		
	console.log("part",getSteamqclassid(),"category", getSteamqpart());
		currentCategory = getSteamqpart() == null || getSteamqpart() == ""  ? "science" : getSteamqpart();
	if(getSteamqpart() == null || getSteamqpart() == ""){
	setSteamqpart(currentCategory);
}
		currentClass = getSteamqclassid();
		
		
			getClassInte = setInterval(function(){
				if(STEAMQ_CLASS != null){
					
				   clearInterval(getClassInte);
										 createListClass();
				   } else {
					   
				   }
			},500);
		
		
    }

function createListClass(){
	let parent  = document.getElementById("classQuestion");
	STEAMQ_CLASS.forEach((item,index) => {//console.log(item);
		let divClass = document.createElement("div");
		divClass.id = item.id;
		
		let aClass = document.createElement("a");
		aClass.id = item.id+"a";
		aClass.href = "?mode=online&page=list-steamq-question&idclass=" +item.id  + "&category="+currentCategory;
		
		let sClass = document.createElement("span");
		sClass.innerHTML = item.description;
		
		aClass.appendChild(sClass);
		divClass.appendChild(aClass);
		parent.appendChild(divClass);
		
	});
	
	if(getSteamqclassid() == null || getSteamqclassid() == ""){
		if(STEAMQ_CLASS && STEAMQ_CLASS.length > 0){
	   currentClass = STEAMQ_CLASS[0].id;
			setSteamqclassid(currentClass);
		   }
	   }
	
	//class
	document.getElementById(currentClass).style.cssText  = "background:#002546";
	document.getElementById(currentClass+"a").style.cssText  = "color:#fafafa";
	
	//category
	document.getElementById(currentCategory).style.cssText  = "background:#002546";
	document.getElementById(currentCategory+"a").style.cssText  = "color:#fafafa";
	
	document.getElementById("sciencea").href = "?mode=online&page=list-steamq-question&idclass=" +currentClass  + "&category=science";
	document.getElementById("technologya").href = "?mode=online&page=list-steamq-question&idclass=" +currentClass  + "&category=technology";
	document.getElementById("engineeringa").href = "?mode=online&page=list-steamq-question&idclass=" +currentClass  + "&category=engineering";
	document.getElementById("arta").href = "?mode=online&page=list-steamq-question&idclass=" +currentClass  + "&category=art";
	document.getElementById("matha").href = "?mode=online&page=list-steamq-question&idclass=" +currentClass  + "&category=math";
	
	document.getElementById("questionadd").href = "?mode=online&page=steamq-question&action=add&idclass=" + currentClass + "&category=" + currentCategory;
	document.getElementById("questionadd").style.display = "flex";
	//get list ticket
		listVisitedQuestion.push(0);
		setCurrentQuestion(0);
}


document.getElementById('uploadDescriptionURL').addEventListener('change', handleFileSelect);
	
function handleFileSelect(evt) {
        //let excel = excelToJSON();
        let f = evt.target.files[0]; 
	let output = [];
    if (f) {
      var r = new FileReader();
      r.onload = function(e) { 
          let contents = e.target.result;
		  console.log(contents);
          //document.write("File Uploaded! <br />" + "name: " + f.name + "<br />" + "content: " + contents + "<br />" + "type: " + f.type + "<br />" + "size: " + f.size + " bytes <br />");
		document.getElementById("fileUploadedName").innerHTML = f.name;
          let lines = contents.split("\n");
          for (let i=1; i<lines.length; i++){
			  //console.log("line",i,lines[i]);
			  if(lines[i].length > 0 || lines[i]){
			  let tquestion = lines[i].split(",");
// 			  console.log("tquestion",tquestion[1]);
// 			  console.log("tquestion",tquestion[2]);
// 			  console.log("tquestion",tquestion[3]);
// 			  console.log("tquestion",tquestion[4]);
// 			  console.log("tquestion",tquestion[5]);
// 			  console.log("tquestion",tquestion[6]);
// 			  console.log("tquestion",tquestion[7]);
			  let tObject = {
				   id:i,
				  	content: tquestion[1], 
					a: tquestion[2],
					b: tquestion[3],
					c: tquestion[4],
					d: tquestion[5],
					answer: tquestion[6] ? tquestion[6].toLowerCase() : tquestion[6],
					interpretation: tquestion[7]
				}
            currentQuestions.push(tObject);
		  }
			  }
          
          
		  createListExcelQuestion();
     }
      r.readAsText(f, 'ISO-8859-1');
    } else { 
      SunQAlert()
                                .position('center')
                                .title(dictionaryKey.QUESTION_UPLOAD_QUESTION_FAILED)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.AGREE)
                                .callback((result) => {
                                    //webpageRedirect(window.location.href);
                                })
                                .show();
    }
        
    }
	
function convertToCSV(objArray) {
    var array = typeof objArray != 'object' ? JSON.parse(objArray) : objArray;
    var str = '';

    for (var i = 0; i < array.length; i++) {
        var line = '';
        for (var index in array[i]) {
            if (line != '') line += ','

            line += array[i][index];
        }

        str += line + '\r\n';
    }

    return str;
}

function makeExcel(){
	
	let sampleData = [
		{
			stt:"Số thứ tự",
		content: 'Nội dung câu hỏi', 
		a: "Đáp án A",
		b: "Đáp án B",
		c: "Đáp án C",
		d: "Đáp án D",
		answer: "Đáp án đúng(Viết đáp án bằng chữ in thường)",
		interpretation: "Lời giải"
	},
		{
			stt:"1",
			content: 'Trái đất quay từ hướng nào qua hướng nào?', 
			a: "Từ Đông qua Tây",
			b: "Từ Tây qua Đông",
			c: "Từ Bắc xuống Nam",
			d: "Từ Nam xuống Bắc",
			answer: "b",
			interpretation: "Trái đất quay từ Tây qua Đông nên ở trái đất mặt trời mọc đằng Đông và lặn đằng Tây"
		},
		{
			stt:"2",
			content: 'Việt Nam nằm ở châu lục nào??', 
			a: "Châu Á",
			b: "Châu Âu",
			c: "Châu Phi",
			d: "Châu chấu",
			answer: "a",
			interpretation: "Việt Nam nằm tại phía Đông Nam cảu Châu Á"
		}
	];
	
	let jsonObject = JSON.stringify(sampleData);
	
	 let csv = convertToCSV(jsonObject);

	
	let exportedFilename = 'Vi du danh sach cau hoi trac nghiem.csv';
	
	let blob = new Blob(["\uFEFF"+csv], { type: 'text/csv;charset=utf-8;' });
	
	if (navigator.msSaveBlob) { // IE 10+
        navigator.msSaveBlob(blob, exportedFilename);
    } else {
        let link = document.createElement("a");
        if (link.download !== undefined) { // feature detection
            // Browsers that support HTML5 download attribute
            let url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", exportedFilename);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }
	
}
	
function deleteQuestion(mId){
	 //console.log("delete", listQuestion[mId]);
		//alert("teacher "+mId+listTeacher[mId].name);
        //alert hỏi
        SunQAlert()
            .position('center')
            .title(dictionaryKey.REQUEST_DELETE)
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
                    seFetchingQuestion(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLQuestion(mId),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingQuestion(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.QUESTION_DELETE_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        webpageRedirect(window.location.href);
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
										.title(dictionaryKey.SERVER_INFO + res.message + " xóa " +listQuestion[mId].id + " vị trí "+ mId)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {})
										.show();
							}
                        },
                        function(err) {
                            seFetchingQuestion(false);
                            setIsGetQuestionFromServerSuccess(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.QUESTION_DELETE_FAILED)
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
	
	function uploadQuestionToServer(){
		//nhớ xóa id
		SunQAlert()
                .position('center')
                .title(dictionaryKey.REQUEST_ADD)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
			document.getElementById("uploadingq").style.display = "flex";
		currentQuestions.forEach((item,index)=>{
			console.log("uploading",index);
			let tempmyCurrentQuestion = {...item};
			delete tempmyCurrentQuestion.id;
			seFetchingQuestion(true);
			document.getElementById("questionUpload").style.display = dictionaryKey.QUESTION_UPLOAD_QUANLITY + " " + (index+1);
                        requestToSever(
                            sunQRequestType.post,
                            postURLQuestion()+"?classId="+getSteamqclassid()+"&category="+getSteamqpart(),
                            tempmyCurrentQuestion,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                seFetchingQuestion(false);
                                //edit - title - add
                                let sunqalertsuccess = dictionaryKey.QUESTION_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=list-steamq-question" + "&idclass=" + getSteamqclassid() + "&category="+getSteamqpart());
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
								document.getElementById("uploadingq").style.display = "none";
                                seFetchingQuestion(dictionaryKey.ERR);
                                let sunqalertfailed = dictionaryKey.QUESTION_ADD_FAILED;
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
		});
	}})
                .show();
		}
	
	function createListExcelQuestion() {
        let parent = document.getElementById("divQuestionListsteamq");
		let quanlity = document.getElementById("divQuestionUploadQuanlity");
         parent.innerHTML = "";
		quanlity.innerHTML = "";
		
		if(currentQuestions == null || currentQuestions.length == 0){
			let spanNotFound= document.createElement("span");
			spanNotFound.className="question-span-not-found";
			spanNotFound.innerHTML = "<?php ;echo $GLOBALS["QUESTION_NO_LIST"]; ?>";
			parent.appendChild(spanNotFound);
		   return;
		   }
		
		let buttonUpload = document.createElement("div");
		 buttonUpload.className = "manage-list-lecture-add-new";
		let aUpload = document.createElement("a");
		aUpload.href="javascript:void(0);";
		let bUpload = document.createElement("button");
		let sUpload = document.createElement("span");
			sUpload.innerHTML = "<?php ;echo $GLOBALS["QUESTION_UPLOAD"]; ?>";
			bUpload.appendChild(sUpload);
			aUpload.appendChild(bUpload);
			buttonUpload.appendChild(aUpload);
			quanlity.appendChild(buttonUpload);
			
		buttonUpload.addEventListener("click",function(e){
			uploadQuestionToServer();
		})
		
		let divQuantity = document.createElement("div");
		divQuantity.className = "manage-list-lecture-add-new";
		
			let spanQuantity = document.createElement("span");
			spanQuantity.id="questionQuantity";
			spanQuantity.innerHTML = dictionaryKey.QUESTION_QUANTITY + " " + currentQuestions.length;
			divQuantity.appendChild(spanQuantity);
			quanlity.appendChild(divQuantity);
// 		listQuestionFromServer = list;
        currentQuestions.forEach((item, index) => {
			
			
			
			
			let divClose = document.createElement("div");
			divClose.className = "question-close";
			let divCloseSpan = document.createElement("span");
			divCloseSpan.innerHTML = "X";
			divClose.appendChild(divCloseSpan);

		    divClose.addEventListener("click", function() {
				let deletIndexl;
				currentQuestions.some((itemx, indexinside) => {
					if (itemx == item.id) {
						deletIndexl = indexinside;
						//console.log("delete", indexinside);
						return true;
					}
				});
				currentQuestions.splice(deletIndexl, 1);
				document.getElementById("llQuestion" + item.id).remove();
					 
					document.getElementById("questionQuantity").innerHTML = dictionaryKey.QUESTION_QUANTITY + " " + currentQuestions.length;
				if(currentQuestions.length == 0){
				   parent.innerHTML = "";
					quanlity.innerHTML = "";
					document.getElementById("fileUploadedName").innerHTML = "";
				   }
			});
			
            let divQuestion = document.createElement("div");
            divQuestion.id = "llQuestion"+item.id;
            divQuestion.className = "manage-teacher-contain-right-upper question-div quesstion-quesstion";
			
			let divQuestionDetail = document.createElement("div");
			divQuestionDetail.className = "question-div";
			divQuestionDetail.appendChild(divClose);
			
			let divQuestionSpanTitleInput= document.createElement("span");
			divQuestionSpanTitleInput.className="question-div-detail-name";
			divQuestionSpanTitleInput.innerHTML = item.content ? item.content : "";
			divQuestionDetail.appendChild(divQuestionSpanTitleInput);
			
			let arrayHeader = ["A.", "B.", "C.", "D."];
			let arrayHeaderObject = ["a", "b", "c", "d"];
			
			//tìm ra index
			let correctAnswerIndex = null;
			console.log(item.answer);
			if(item.answer){
			arrayHeaderObject.some((itemj,indexj)=>{
				if(itemj == item.answer){
					correctAnswerIndex = indexj;
					return true;
				}
			});
			}
			//console.log("dap an "+ correctAnswerIndex + "  " + arrayHeaderObject[correctAnswerIndex] + "  " + arrayHeader[correctAnswerIndex] )
			for(let indexx = 0; indexx < 4; indexx++){
			let divQuestionSpan = document.createElement("div");
			divQuestionSpan.className = "manage-teacher-contain-right-upper-rcontainer";
			
			let divQuestionspanHeader = document.createElement("span");
			divQuestionspanHeader.className="manage-teacher-contain-right-upper-rcontainer-postfix";
			divQuestionspanHeader.innerHTML=arrayHeader[indexx];
			
			let divQuestionInputDetailAnswer =  document.createElement("span");
			divQuestionInputDetailAnswer.innerHTML = item[arrayHeaderObject[indexx]];
			
			let divQuestionInputDetailAnswerCheckbox = document.createElement("input");
			divQuestionInputDetailAnswerCheckbox.type = "radio";
			divQuestionInputDetailAnswerCheckbox.name = "questionanser"+item.id;
			divQuestionInputDetailAnswerCheckbox.disabled = true;
				if(indexx == correctAnswerIndex){
					//console.log("corect anwser is",indexx);
					divQuestionInputDetailAnswerCheckbox.checked =true;
				}
			//divQuestionInputDetailAnswerCheckbox.disabled = true;
			
			let divQuestionspanFooter = document.createElement("span");
			divQuestionspanFooter.className="manage-teacher-contain-right-upper-rcheckmark";
			
			divQuestionSpan.appendChild(divQuestionspanHeader);	
			divQuestionSpan.appendChild(divQuestionInputDetailAnswer);	
			divQuestionSpan.appendChild(divQuestionInputDetailAnswerCheckbox);			
			divQuestionSpan.appendChild(divQuestionspanFooter);
			divQuestionDetail.appendChild(divQuestionSpan);
		}
			
			let rightAnwserText = "";
			if(correctAnswerIndex){
			   rightAnwserText = arrayHeaderObject[correctAnswerIndex]
			   }
			
			let divQuestionSpanAnwser = document.createElement("span");
		divQuestionSpanAnwser.className = "question-right-answer";
		divQuestionSpanAnwser.innerHTML = item.answer ?  "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>" + " " + rightAnwserText.toUpperCase() : "";
		divQuestionDetail.appendChild(divQuestionSpanAnwser);
			
			let divQuestionSpanExplain = document.createElement("span");
			divQuestionDetail.appendChild(divQuestionSpanExplain);

			let divQuestionDivExplain = document.createElement("div");
			divQuestionDivExplain.className = "manage-section-detail-midlle-item question-right-answer";
				
			let divQuestionDivTextareaExplain = document.createElement("textarea");
			divQuestionDivTextareaExplain.cols = 80;
			divQuestionDivTextareaExplain.value = item.interpretation ? item.interpretation : "<?php  echo $GLOBALS["QUESTION_NO_ANWSER"]; ?>";
			divQuestionDivTextareaExplain.readOnly  = true;
				
			divQuestionDivExplain.appendChild(divQuestionDivTextareaExplain)
			divQuestionDetail.appendChild(divQuestionDivExplain);
				
			divQuestion.appendChild(divQuestionDetail);
				
           
			//console.log(divQuestion);
            parent.appendChild(divQuestion);
        });
    }
	
</script>