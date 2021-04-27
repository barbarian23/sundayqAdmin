<?php ?>
<script>
	//image
	function showProgressVideoQuestion() {
        document.getElementById("fetchVideoQuestion").style.display = "flex";
        document.getElementById("divVideoQuestion").style.display = "none";
    }

    function hideProgressVideoQuestion() {
        document.getElementById("fetchVideoQuestion").style.display = "none";
        document.getElementById("divVideoQuestion").style.display = "flex";
    }

    function getVideoQuestionGreaterThanZero() {
        document.getElementById("listQuestionEmpty").style.display = "none";
        document.getElementById("managaeVideoEmpty").style.display = "flex";
    }

    function getVideoQuestionEqualThanZero() {
        document.getElementById("listQuestionEmpty").style.display = "flex";
        document.getElementById("managaeVideoEmpty").style.display = "none";
    }

    function getVideoQuestionSuccess() {
        document.getElementById("managaeVideoError").style.display = "none";
        document.getElementById("divVideoQuestion").style.display = "flex";
    }

    function getVideoQuestionFailed() {
        document.getElementById("managaeVideoError").style.display = "flex";
        document.getElementById("divVideoQuestion").style.display = "none";
    }
	
function showProgressListQuestion(){
	document.getElementById("fetchListQuestionProgress").style.display = "flex" ;
}

function hideProgressListQuestion(){
	document.getElementById("fetchListQuestionProgress").style.display = "none" ;
}

function getListQuestionSuccess(){
	document.getElementById("listQuestionError").style.display = "none" ;
	document.getElementById("tableListQuestion").style.display = "flex" ;
}

function getListQuestionFailed(){
	document.getElementById("listQuestionError").style.display = "flex" ;
	document.getElementById("tableListQuestion").style.display = "none" ;
}
	
function getListQuestionGreaterThanZero(){
	document.getElementById("listQuestionEmpty").style.display = "none" ;
	document.getElementById("tableListQuestion").style.display = "flex" ;
	//fillTableListLecture();
}

function getListQuestionEqualToZero(){
	document.getElementById("listQuestionEmpty").style.display = "flex" ;
	document.getElementById("tableListQuestion").style.display = "none" ;
	emptyTableListQuestion();
}
	
function loadingDataQuestionProgress(){
	document.getElementById("Question-page-loading").style.display = "flex" ;
	document.getElementById("Question-page-loading-progress-error").style.display = "none" ;
	document.getElementById("Question-page-loading-progress").style.display = "block" ;
	document.getElementById("Question-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataQuestionDone(){
	document.getElementById("Question-page-loading").style.display = "none" ;
}
	
function loadingDataQuestionError(){
	document.getElementById("Question-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("Question-page-loading-progress").style.display = "none" ;
	document.getElementById("Question-page-loading-progress-span").style.display = "none" ;
}
	
function selectQuestionIndex(item){
	
}
	
function emptyTableListQuestion(){
	document.getElementById("tableListQuestion").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListQuestion(result){
	let list = result.data;
	
	if (!listVisitedQuestion.includes(getCurrentQuestion())){
			listVisitedQuestion.push(getCurrentQuestion());
	}
	
	let parent = document.getElementById("tableListQuestion");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["QUESTION_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["QUESTION_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["QUESTION_LIST_COL_3"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableQuestion(tbody,list,getCurrentQuestion());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-Question").style.display = "flex";
let parentPaging = document.getElementById("pagingListQuestion");
parentPaging.innerHTML="";
let maxPage = list.length;//result.total
let maxPerList = dictionaryKey.limitRequestRegister;
//let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
	let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
console.log("totalPage",totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentQuestion()){
       tempDivPaging.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
       }
    
    tempDivPaging.id="paging-index-"+pagingIndex;
    tempDivPaging.innerHTML = Number.parseInt(pagingIndex) + 1;
    
    tempDivPaging.addEventListener("click",function(e){
        for (let tI = 0 ; tI < totalPage ; tI++ ){
            let tDiv = document.getElementById("paging-index-"+tI);
                    if (tI != pagingIndex){
            //đặt cho các số khác là màu in nhạt	
                        tDiv.className="manage-list-lecture-list-register-paging-index";
                        } else {
            //đặt cho số đang chọnc là màu in đậm	
                        tDiv.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
                        }
            }
        if(!listVisitedQuestion.includes(pagingIndex)){//load cái mới	
           setCurrentQuestion(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ",pagingIndex);
            loadOldPageQuestion(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageQuestion(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listQuestion.slice(startIndex, endIndex);
		console.log(startIndex, endIndex,arrayOldPage);
		let parent = document.getElementById("tableListQuestion");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["QUESTION_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["QUESTION_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["QUESTION_LIST_COL_3"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableQuestion(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableQuestion(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.online,listScreen.online.question,dictionaryKey.editStatus,item.id) + "&idclass=" + getSteamqclassid() + "&category="+getSteamqpart();
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.content+"</td><td class='manage-list-teacher-table-detail-tr-modified'><div class='manage-list-teacher-table-detail-div-edit'><a href=\"" + tempAHref + "\">Chỉnh sửa</a></div><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteQuestion('"+item.id+"')\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
	
	function transctionToInitVideo(){
		
	}
	
	function transctionToQuestion(){
		
	}
	
</script>