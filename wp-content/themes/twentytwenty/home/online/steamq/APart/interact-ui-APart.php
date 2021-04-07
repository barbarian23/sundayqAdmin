<?php ?>
<script>
    //loading kit
    function showProgressKitsteamq() {
        document.getElementById("fetchKitsteamq").style.display = "flex";
        document.getElementById("divKitsteamq").style.display = "none";
    }

    function hideProgressKitsteamq() {
        document.getElementById("fetchKitsteamq").style.display = "none";
        document.getElementById("divKitsteamq").style.display = "flex";
    }

    function getKitsteamqEqualThanZero() {
        document.getElementById("divKitsteamq").style.display = "none";
        document.getElementById("managaeKitEmpty").style.display = "flex";
    }

    function getKitsteamqGreaterThanZero() {
        document.getElementById("divKitsteamq").style.display = "flex";
        document.getElementById("managaeKitEmpty").style.display = "none";
    }

    function getKitsteamqSuccess() {
        document.getElementById("managaeKitError").style.display = "none";
        document.getElementById("divKitsteamq").style.display = "flex";
    }

    function getKitsteamqFailed() {
        document.getElementById("managaeKitError").style.display = "flex";
        document.getElementById("divKitsteamq").style.display = "none";
    }

    //loading video
    function showProgressVideosteamq() {
        document.getElementById("fetchVideosteamq").style.display = "flex";
        document.getElementById("divVideosteamq").style.display = "none";
    }

    function hideProgressVideosteamq() {
        document.getElementById("fetchVideosteamq").style.display = "none";
        document.getElementById("divVideosteamq").style.display = "flex";
    }

    function getVideosteamqEqualThanZero() {
        document.getElementById("divVideosteamq").style.display = "none";
        document.getElementById("managaeVideoEmpty").style.display = "flex";
    }

    function getVideosteamqGreaterThanZero() {
        document.getElementById("divVideosteamq").style.display = "flex";
        document.getElementById("managaeVideoEmpty").style.display = "none";
    }

    function getVideosteamqSuccess() {
        document.getElementById("managaeVideoError").style.display = "none";
        document.getElementById("divVideosteamq").style.display = "flex";
    }

    function getVideosteamqFailed() {
        document.getElementById("managaeVideoError").style.display = "flex";
        document.getElementById("divVideosteamq").style.display = "none";
    }

	//question
	function setQuestionFromServerSuccess(val) {
        steamqStatus.isQuestionFromServerSuccess = val;
    }

    function getQuestionFromServerSuccess() {
        return steamqStatus.isQuestionFromServerSuccess;
    }
	//loading Question
    function showProgressQuestionsteamq() {
        document.getElementById("fetchQuestionsteamq").style.display = "flex";
        document.getElementById("divQuestionsteamq").style.display = "none";
    }

    function hideProgressQuestionsteamq() {
        document.getElementById("fetchQuestionsteamq").style.display = "none";
        document.getElementById("divQuestionsteamq").style.display = "flex";
    }

    function getQuestionsteamqEqualThanZero() {
        document.getElementById("divQuestionsteamq").style.display = "none";
        document.getElementById("managaeQuestionEmpty").style.display = "flex";
    }

    function getQuestionsteamqGreaterThanZero() {
        document.getElementById("divQuestionsteamq").style.display = "flex";
        document.getElementById("managaeQuestionEmpty").style.display = "none";
    }

    function getQuestionsteamqSuccess() {
        document.getElementById("managaeQuestionError").style.display = "none";
        document.getElementById("divQuestionsteamq").style.display = "flex";
    }

    function getQuestionsteamqFailed() {
        document.getElementById("managaeQuestionError").style.display = "flex";
        document.getElementById("divQuestionsteamq").style.display = "none";
    }
	
	
    function showProgressListsteamq() {
        document.getElementById("fetchListsteamqProgress").style.display = "flex";
    }

    function hideProgressListsteamq() {
        document.getElementById("fetchListsteamqProgress").style.display = "none";
    }

    function getListsteamqSuccess() {
        document.getElementById("liststeamqError").style.display = "none";
        document.getElementById("tableListsteamq").style.display = "flex";
    }

    function getListsteamqFailed() {
        document.getElementById("liststeamqError").style.display = "flex";
        document.getElementById("tableListsteamq").style.display = "none";
    }

    function getListsteamqGreaterThanZero() {
        document.getElementById("liststeamqEmpty").style.display = "none";
        document.getElementById("tableListsteamq").style.display = "flex";
        //fillTableListLecture();
    }

	function emptyTableListsteamq(){
		document.getElementById("tableListsteamq").innerHTML = "";
	}
	
    function getListsteamqEqualToZero() {
        document.getElementById("liststeamqEmpty").style.display = "flex";
        document.getElementById("tableListsteamq").style.display = "none";
        //emptyTableListsteamq();
    }

    function loadingDatasteamqProgress() {
        document.getElementById("steamq-page-loading").style.display = "flex";
        document.getElementById("steamq-page-loading-progress-error").style.display = "none";
        document.getElementById("steamq-page-loading-progress").style.display = "block";
        //document.getElementById("steamq-page-loading-progress-span").style.display = "block";
    }

    function loadingDatasteamqDone() {
        document.getElementById("steamq-page-loading").style.display = "none";
    }

    function loadingDatasteamqError() {
        document.getElementById("steamq-page-loading-progress-error").style.display = "flex";
        document.getElementById("steamq-page-loading-progress").style.display = "none";
        //document.getElementById("steamq-page-loading-progress-span").style.display = "none";
    }

// 	function showTextQuestion(state,add){
// 		add ? document.getElementById("statusquestionAdded").innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_QUESTION_ADD"]; ?>" : document.getElementById("statusquestionAdded").innerHTML = "<?php echo $GLOBALS["STEAMQ_PLAN_QUESTION_DELETE"]; ?>";
// 		state == true ? document.getElementById("statusquestionAdded").style.display = "flex" : setTimeout(()=>{document.getElementById("statusquestionAdded").style.display = "none"},500);
// 	}
	
    function emptyTableKitListsteamq(item) {
		//document.getElementById("divKitsteamq").innerHTML = "";
    }

    //chỉ chọn được 1 bộ KIT
    function createListKit(list) {
        let parent1 = document.getElementById("divKitsteamq");
        parent1.innerHTML = "";
		listKitFromServer = listKitFromServer.concat(list);
        list.forEach((item, index) => {
			//console.log("kit",item);
            let div1 = document.createElement("div");
            div1.className = "mbsc-card";

			let divImg = document.createElement("div");
			divImg.className = "mbsc-card-list-img";
			
			item.thumbnailUrls.forEach((itemi,indexi)=>{
				let img = document.createElement("img");
            	img.src = getHomeURL() + itemi;
				//console.log("img",img);
				divImg.appendChild(img);
			});
            if(item.thumbnailUrls == null || item.thumbnailUrls.length == 0){
			   let img = document.createElement("img");
			   img.src = '<?php echo $GLOBALS['URI_ADD_NEW']; ?>';
				div1.appendChild(img);
		   }
			//console.log("divImg",divImg);
			//console.log("div1",div1)

            let divTitle = document.createElement("div");
            divTitle.className = "mbsc-card-header";
            let h2 = document.createElement("h2");
            h2.className = "mbsc-card-title";
            h2.innerHTML = item.title;
            divTitle.appendChild(h2);

            let divContent = document.createElement("div");
            divContent.className = "mbsc-card-content";
        	divContent.innerHTML = index.shortDescription == null ? "Thiếu mô tả" : index.shortDescription;

            div1.appendChild(divImg);
            div1.appendChild(divTitle);
            div1.appendChild(divContent);
            div1.addEventListener("click", function() {
                let duppp = false;
				if(currentKit){
				   if(currentKit == item.id){
					   SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.FREELESSON_TEMPLATE_KIT_ALREADY_ADDED)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        // webpageRedirect(window.location.href);
										setChoosingKitsteamq(false);
                                    })
                                    .show();
					    duppp = true;
				   }
				   }
				
                if (duppp == false) {
                    //console.log("check", item);
					currentKit = item.id;
					selectKitIndex(currentKit);
					//close cửa sổ
					setChoosingKitsteamq(false);
                }
            });
			//console.log("kit inside",parent1);
            parent1.appendChild(div1);
			//console.log("kit div1",div1.innerHTML);
			//console.log("kit outside",parent1);
        });
		//console.log("kit outside",parent1);
		
    }

    function selectKitIndex(id) {
		let index = listKitFromServer.filter(item => item.id == id);
		console.log("found",index,id);
		index = index[0];
		console.log("found",index,id);
		if(index){
        let parent = document.getElementById("currentListKit");
        let divFirst = document.createElement("div");
        divFirst.className = "mbsc-card";
        divFirst.id = "kit_" + index.id;

        let divClose = document.createElement("div");
        divClose.className = "manage-section-detail-left-item-inside-close";
        divClose.innerHTML = "x";

        divClose.addEventListener("click", function() {
            let deletIndexl
            currentKit = "";
            document.getElementById("kit_" + index.id).remove();
        });

        let divImg = document.createElement("div");
		divImg.className = "mbsc-card-list-img";
			
		index.thumbnailUrls.forEach((item,index)=>{
				let img = document.createElement("img");
            	img.src = getHomeURL() + item;
				divImg.appendChild(img);
			});
		
		if(index.thumbnailUrls == null || index.thumbnailUrls.length == 0){
		   let img = document.createElement("img");
		   img.src = '<?php echo $GLOBALS['URI_ADD_NEW']; ?>';
			divFirst.appendChild(img);
		   }
       
        let divTitle = document.createElement("div");
        divTitle.className = "mbsc-card-header";
        let h2 = document.createElement("h2");
        h2.className = "mbsc-card-title";
        h2.innerHTML = index.title;
        divTitle.appendChild(h2);

        let divContent = document.createElement("div");
        divContent.className = "mbsc-card-content";
        divContent.innerHTML = index.shortDescription == null ? "Thiếu mô tả" : index.shortDescription;

        divFirst.appendChild(divClose);
        divFirst.appendChild(divImg);
        divFirst.appendChild(divTitle);
        divFirst.appendChild(divContent);

        parent.appendChild(divFirst);
	}
    }

    function createListVideo(list) {
        let parent = document.getElementById("divVideosteamq");
        parent.innerHTML = "";
		listVideoFromServer = list;
        list.forEach((item, index) => {//console.log(item);
			if(item.status == "complete"){
            let div1 = document.createElement("div");
            div1.className = "mbsc-card";

            let img = document.createElement("img");
            img.src = item.thumbnailUrl == null ? "" : getHomeURL() + item.thumbnailUrl;

            let divTitle = document.createElement("div");
            divTitle.className = "mbsc-card-header";
            let h2 = document.createElement("h2");
            h2.className = "mbsc-card-title";
            h2.innerHTML = item.title;
            divTitle.appendChild(h2);

            let divContent = document.createElement("div");
            divContent.className = "mbsc-card-content";
            divContent.innerHTML = item.shortDescription;

            div1.appendChild(img);
            div1.appendChild(divTitle);
            div1.appendChild(divContent);
            div1.addEventListener("click", function() {
                let duppp = false;
                //console.log("check", currentVideos);
                currentVideos.some((itemT, indexT) => {
                    //console.log("some", itemT);
                    if (itemT == item.id) {
                        //console.log("dup", item.name);
                         			SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.FREELESSON_TEMPLATE_VIDEO_ALREADY_ADDED)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        // webpageRedirect(window.location.href);
										setChoosingVideosteamq(false);
                                    })
                                    .show();
                        duppp = true;
                        return;
                    }
                });
                if (duppp == false) {
                    //console.log("no dupp");
                    currentVideos.unshift(item.id);
                    selectVideoIndex(item.id);
					//close cửa sổ
					setChoosingVideosteamq(false);
                }
            });
					//console.log("video div",div1);
		//console.log("video insside",parent);
            parent.appendChild(div1);
				//console.log("video outside",parent);
		}
        });
    }

    function selectVideoIndex(id) {
		let index = listVideoFromServer.filter(item => item.id == id);
		index = index[0];
		if(index){
        console.log("found",index,id);
        let parent = document.getElementById("currentListVideo");
        let divFirst = document.createElement("div");
        divFirst.className = "mbsc-card-list";
        divFirst.id = "video_" + index.id;
        let divClose = document.createElement("div");
        divClose.className = "manage-section-detail-left-item-inside-close";
        divClose.innerHTML = "x";

		let spanTitle = document.createElement("span");
        spanTitle.innerHTML = index.title;
		
		let shortDes = document.createElement("span");
		shortDes.className="mbsc-card-sub-description";
        shortDes.innerHTML = index.shortDescription;
		
		let video = document.createElement("video");
		video.muted="muted";
		video.style.margin="0px auto";
		video.width = "275";
		video.height = "250";
		
		if (Hls.isSupported()) {
                                console.log("Hls support");
                               
                                var hls = new Hls({
                                    xhrSetup: xhr => {
                                        xhr.setRequestHeader('Authorization', "Bearer " + getLocalStorage(dictionary.MSEC))
                                    }
                                });
                                hls.loadSource(getHomeURL() + index.fileUrl);
                                hls.attachMedia(video);
                                hls.on(Hls.Events.MANIFEST_PARSED, function() {
                                    video.play();
                                });
                            }
		
        divClose.addEventListener("click", function() {
            let deletIndexl;
            currentVideos.some((item, indexinside) => {
                if (item.shortId == index.id) {
                    deletIndexl = indexinside;
                    //console.log("delete", indexinside);
                    return true;
                }
            });
            currentVideos.splice(deletIndexl, 1)
            document.getElementById("video_" + index.id).remove();
        });

        divFirst.appendChild(divClose);
        divFirst.appendChild(spanTitle);
        divFirst.appendChild(shortDes);
        divFirst.appendChild(video);
        parent.appendChild(divFirst);
		}
    }

    function emptyTableVideoListsteamq() {
        document.getElementById("divVideosteamq").innerHTML = "";
        //listRollGroup.length = 0;
    }

	function createListQuestion(list) {console.log("list",list);
        let parent = document.getElementById("divQuestionsteamq");
         parent.innerHTML = "";
		if(list == null || list.length == 0){
			let spanNotFound= document.createElement("span");
			spanNotFound.className="question-span-not-found";
			spanNotFound.innerHTML = "<?php ;echo $GLOBALS["QUESTION_NO_LIST_FOUND"]; ?>";
			parent.appendChild(spanNotFound);
		   return;
		   }
// 		listQuestionFromServer = list;
        list.forEach((item, index) => {
            let divQuestion = document.createElement("div");
            divQuestion.id = "lQuestion"+index;
            divQuestion.className = "manage-teacher-contain-right-upper question-div";
			
			let divQuestionDetail = document.createElement("div");
			divQuestionDetail.className = "question-div";

			let divQuestionSpanTitleInput= document.createElement("span");
			divQuestionSpanTitleInput.className="question-div-detail-name";
			divQuestionSpanTitleInput.innerHTML = item.content ? item.content : "";
			divQuestionDetail.appendChild(divQuestionSpanTitleInput);
			
			let arrayHeader = ["A.", "B.", "C.", "D."];
			let arrayHeaderObject = ["a", "b", "c", "d"];
			
			//tìm ra index
			let correctAnswerIndex = null;
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
		divQuestionSpanAnwser.innerHTML = item.answer ?  "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>" + " " + rightAnwserText : "";
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
				
            divQuestion.addEventListener("click", function() {
                let duppp = false;
                //console.log("check", currentQuestions);
                currentQuestions.some((itemT, indexT) => {
                    //console.log("some", itemT);
                    if (itemT == item.id) {
                        //console.log("dup", item.name);
                         			SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.FREELESSON_TEMPLATE_QUESTION_ALREADY_ADDED)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        // webpageRedirect(window.location.href);
										setChoosingQuestionsteamq(false);
                                    })
                                    .show();
                        duppp = true;
                        return;
                    }
                });
                if (duppp == false) {
                    //console.log("no dupp");
                    currentQuestions.unshift(item.id);
                    selectQuestionIndex(item.id);
					//close cửa sổ
					setChoosingQuestionsteamq(false);
                }
            });
			//console.log(divQuestion);
            parent.appendChild(divQuestion);
        });
    }

    function selectQuestionIndex(id) {
		let index = listQuestionFromServer.filter(item => item.id == id);
		index = index[0];
		if(index){
        console.log("found",index,id);
        let parent = document.getElementById("currentListQuestion");
			
			let divClose = document.createElement("div");
		divClose.className = "question-close";
		let divCloseSpan = document.createElement("span");
		divCloseSpan.innerHTML = "X";
		divClose.appendChild(divCloseSpan);
			
			 divClose.addEventListener("click", function() {
            let deletIndexl;
            currentQuestions.some((item, indexinside) => {
                if (item.shortId == index.id) {
                    deletIndexl = indexinside;
                    //console.log("delete", indexinside);
                    return true;
                }
            });
            currentQuestions.splice(deletIndexl, 1);
            document.getElementById("question" + index.id).remove();
        });
			
		let divQuestion = document.createElement("div");
            divQuestion.id = "question"+index.id;
            divQuestion.className = "manage-teacher-contain-right-upper question-div";
			
			let divQuestionDetail = document.createElement("div");
			divQuestionDetail.className = "question-div";
			divQuestionDetail.appendChild(divClose);

			let divQuestionSpanTitleInput= document.createElement("span");
			divQuestionSpanTitleInput.className="question-div-detail-name";
			divQuestionSpanTitleInput.innerHTML = index.content ? index.content : "";
			divQuestionDetail.appendChild(divQuestionSpanTitleInput);
			
			let arrayHeader = ["A.", "B.", "C.", "D."];
			let arrayHeaderObject = ["a", "b", "c", "d"];
			
			//tìm ra index
			let correctAnswerIndex = null;
			if(index.answer){
			arrayHeaderObject.some((itemj,indexj)=>{
				if(itemj == index.answer){
					correctAnswerIndex = indexj;
					return true;
				}
			});
			}
			
			for(let indexx = 0; indexx < 4; indexx++){
				let divQuestionSpan = document.createElement("div");
				divQuestionSpan.className = "manage-teacher-contain-right-upper-rcontainer";

				let divQuestionspanHeader = document.createElement("span");
				divQuestionspanHeader.className="manage-teacher-contain-right-upper-rcontainer-postfix";
				divQuestionspanHeader.innerHTML=arrayHeader[indexx];

				let divQuestionInputDetailAnswer =  document.createElement("span");
				divQuestionInputDetailAnswer.className = "manage-teacher-contain-right-upper-rcontainer-prefix";
				divQuestionInputDetailAnswer.innerHTML = index[arrayHeaderObject[indexx]];

				let divQuestionInputDetailAnswerCheckbox = document.createElement("input");
				divQuestionInputDetailAnswerCheckbox.type = "radio";
				divQuestionInputDetailAnswerCheckbox.name = "questionanser"+index.id;
					if(indexx == correctAnswerIndex){
						divQuestionInputDetailAnswerCheckbox.checked =true;
					}
				divQuestionInputDetailAnswerCheckbox.disabled = true;

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
		divQuestionSpanAnwser.innerHTML = index.answer ?  "<?php echo $GLOBALS["STEAMQ_PLAN_INPUT_QUESTION_CORRECT_ANSWER_IS"]; ?>" + " " + rightAnwserText : "";
		divQuestionDetail.appendChild(divQuestionSpanAnwser);
			
			let divQuestionSpanExplain = document.createElement("span");
			divQuestionDetail.appendChild(divQuestionSpanExplain);
				
			let divQuestionDivExplain = document.createElement("div");
			divQuestionDivExplain.className = "manage-section-detail-midlle-item question-right-answer";
				
			let divQuestionDivTextareaExplain = document.createElement("textarea");
			divQuestionDivTextareaExplain.cols = 80;
			divQuestionDivTextareaExplain.value = index.interpretation ? index.interpretation : "<?php  echo $GLOBALS["QUESTION_NO_ANWSER"]; ?>";
			divQuestionDivTextareaExplain.readOnly  = true;
				
			
			divQuestionDivExplain.appendChild(divQuestionDivTextareaExplain)
			divQuestionDetail.appendChild(divQuestionDivExplain);
				
			divQuestion.appendChild(divQuestionDetail);
			divQuestion.appendChild(divClose);
        
		
      
        parent.appendChild(divQuestion);
		}
    }
	
    function createListsteamq(result) {
        let list = result.data;

        if (!listVisitedsteamq.includes(getCurrentsteamq())) {
            listVisitedsteamq.push(getCurrentsteamq());
        }

        let parent = document.getElementById("tableListsteamq");
        parent.innerHTML = "";
        let tbody = document.createElement("tbody");
        let trFirst = document.createElement("tr");
        trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_1"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_2"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_3"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_4"]; ?>' + "</th><th>"+'<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_5"]; ?>'+"</th>";
        tbody.appendChild(trFirst);
        createTablesteamq(tbody, list, getCurrentsteamq());
        parent.appendChild(tbody);

        //paging
        document.getElementById("span-title-steamq").style.display = "flex";
        let parentPaging = document.getElementById("pagingListsteamq");
        parentPaging.innerHTML = "";
        let maxPage = result.total;
        let maxPerList = dictionaryKey.limitRequestRegister;
        let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
        console.log(totalPage);
        for (let pagingIndex = 0; pagingIndex < totalPage; pagingIndex++) {
            let tempDivPaging = document.createElement("span");
            tempDivPaging.className = "manage-list-lecture-list-register-paging-index";
            if (pagingIndex == getCurrentsteamq()) {
                tempDivPaging.className = "manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
            }

            tempDivPaging.id = "paging-index-" + pagingIndex;
            tempDivPaging.innerHTML = Number.parseInt(pagingIndex) + 1;

            tempDivPaging.addEventListener("click", function(e) {
                for (let tI = 0; tI < totalPage; tI++) {
                    let tDiv = document.getElementById("paging-index-" + tI);
                    if (tI != pagingIndex) {
                        //đặt cho các số khác là màu in nhạt	
                        tDiv.className = "manage-list-lecture-list-register-paging-index";
                    } else {
                        //đặt cho số đang chọnc là màu in đậm	
                        tDiv.className = "manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
                    }
                }
                if (!listVisitedsteamq.includes(pagingIndex)) { //load cái mới	
                    setCurrentsteamq(pagingIndex);
                } else { //load lại cái cũ
                    console.log("load lại cái cũ");
                    loadOldPagesteamq(pagingIndex);
                }
            });

            parentPaging.appendChild(tempDivPaging);
        }
    }

    function loadOldPagesteamq(number) {
        let startIndex = number * dictionaryKey.limitRequestRegister;
        let endIndex = (number + 1) * dictionaryKey.limitRequestRegister;
        let arrayOldPage = liststeamq.slice(startIndex, endIndex);

        let parent = document.getElementById("tableListsteamq");
        parent.innerHTML = "";
        let tbody = document.createElement("tbody");
        let trFirst = document.createElement("tr");
        trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_1"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_2"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_3"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_4"]; ?>' + "</th><th>"+'<?php echo $GLOBALS["STEAMQ_PLAN_LIST_COL_5"]; ?>'+"</th>";
        tbody.appendChild(trFirst);
        createTablesteamq(tbody, arrayOldPage, number);
        parent.appendChild(tbody);
    }

    function createTablesteamq(tboby, input, number) {
        input.forEach((item, index) => {
            index = number * dictionaryKey.limitRequestRegister + index + 1;
            //console.log(index);
            let trContent = document.createElement("tr");
            if (index % 2 != 0) {
                trContent.className = 'manage-list-teacher-table-detail-strong';
            }
            let tempAHref = makeATagRedirect(sunQMode.online, listScreen.online.addLesson+getSteamqclass(), dictionaryKey.editStatus, item.id);
			tempAHref = tempAHref+"&category="+getSteamqpart()+"&sclass="+getSteamqclass()+"&parentId="+getCurrentEdit();
			let tempDate = new Date();
			tempDate.setMonth(item.month);
			let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
			let monthmonth = monthTemp[tempDate.getMonth()] + ",năm " + tempDate.getFullYear();
			
            trContent.innerHTML = "<td>" + (index) + "</td><td>" + item.title + "</td><td>" + monthmonth + "</td><td class=\"tdShortDesscription\">" + (item.shortDescription != null ? item.shortDescription : "Thiếu") + "</td><td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?" + tempAHref + "\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deletesteamq(" + (index - 1) + ")\">Xóa</div></td>";

            tboby.appendChild(trContent);
        });
    }
</script>