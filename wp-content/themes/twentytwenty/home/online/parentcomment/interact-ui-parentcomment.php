<?php ?>
<script>
	
	function loadingDataparentCommentProgress(){
	document.getElementById("parentComment-page-loading").style.display = "flex" ;
	document.getElementById("parentComment-page-loading-progress-error").style.display = "none" ;
	document.getElementById("parentComment-page-loading-progress").style.display = "block" ;
}
	
function loadingDataparentCommentDone(){
	document.getElementById("parentComment-page-loading").style.display = "none" ;
}
	
function loadingDataparentCommentError(){
	document.getElementById("parentComment-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("parentComment-page-loading-progress").style.display = "none" ;
}
	
	function getListparentCommentSuccess(){
	document.getElementById("listparentCommentError").style.display = "none" ;
	document.getElementById("tableListparentComment").style.display = "flex" ;
	//fillTableListLecture();
}

function getListparentCommentFailed(){
	document.getElementById("listparentCommentError").style.display = "flex" ;
	document.getElementById("tableListparentComment").style.display = "none" ;
	//emptyTableListLecture();
}

function getListparentCommentGreaterThanZero(){
	document.getElementById("listparentCommentEmpty").style.display = "none" ;
	document.getElementById("divparentCommentInLecture").style.display = "flex" ;
	//fillTableListLecture();
}

function getListparentCommentEqualToZero(){
	document.getElementById("listparentCommentEmpty").style.display = "flex" ;
	document.getElementById("tableListparentComment").style.display = "none" ;
	emptyTableListparentComment();
}
	
function showProgressListparentComment(){
	document.getElementById("fetchListparentCommentProgress").style.display = "flex" ;
}

function hideProgressListparentComment(){
	document.getElementById("fetchListparentCommentProgress").style.display = "none" ;
}

function emptyTableListparentComment(){
	document.getElementById("tableListparentComment").innerHTML = "";
	//listparentComment.length = 0;
}

function emptyTableListparentCommentLecture(){
	document.getElementById("divparentCommentInLecture").innerHTML = "";
	
}
	
function createListparentComment(result){
	let list = result.data;
	
	if (!listVisitedparentComment.includes(getCurrentparentComment())){
			listVisitedparentComment.push(getCurrentparentComment());
	}
	
	let parent = document.getElementById("tableListparentComment");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["PARENT_COMMENT_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["PARENT_COMMENT_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["PARENT_COMMENT_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["PARENT_COMMENT_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableparentComment(tbody,list,getCurrentparentComment());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-parentComment").style.display = "flex";
let parentPaging = document.getElementById("pagingListparentComment");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
//let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
	let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentparentComment()){
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
        if(!listVisitedparentComment.includes(pagingIndex)){//load cái mới	
           setCurrentparentComment(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ");
            loadOldPageparentComment(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageparentComment(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listparentComment.slice(startIndex, endIndex);
		
		let parent = document.getElementById("tableListparentComment");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["PARENT_COMMENT_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["PARENT_COMMENT_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["PARENT_COMMENT_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["PARENT_COMMENT_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableparentComment(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableparentComment(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.online,listScreen.online.parentComment,dictionaryKey.editStatus,item.id);
		
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+(item.name != null ? item.name : "Thiếu") +"</td><td class='tdparentCommentSpecialist'><div class='divparentCommentSpecialist'>"+(item.role != null ? item.role : "Thiếu")+"</div></td>"
		+"<td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteparentComment('"+item.id+"')\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
</script>