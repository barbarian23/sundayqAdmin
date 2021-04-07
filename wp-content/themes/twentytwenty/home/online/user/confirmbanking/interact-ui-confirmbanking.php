<?php ?>
<script>
	
	function loadingDataConfirmBankingError(){
	document.getElementById("ConfirmBanking-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("ConfirmBanking-page-loading-progress").style.display = "none" ;
	document.getElementById("ConfirmBanking-page-loading-progress-span").style.display = "none" ;
}
	
function loadingDataConfirmBankingProgress(){
	document.getElementById("ConfirmBanking-page-loading").style.display = "flex" ;
	document.getElementById("ConfirmBanking-page-loading-progress-error").style.display = "none" ;
	document.getElementById("ConfirmBanking-page-loading-progress").style.display = "block" ;
	document.getElementById("ConfirmBanking-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataConfirmBankingDone(){
	document.getElementById("ConfirmBanking-page-loading").style.display = "none" ;
}
	
function getListConfirmBankingSuccess(){
	document.getElementById("listConfirmBankingError").style.display = "none" ;
	document.getElementById("tableListConfirmBanking").style.display = "flex" ;
	//fillTableListLecture();
}

function getListConfirmBankingFailed(){
	document.getElementById("listConfirmBankingError").style.display = "flex" ;
	document.getElementById("tableListConfirmBanking").style.display = "none" ;
	//emptyTableListLecture();
}

function getListConfirmBankingGreaterThanZero(){
	document.getElementById("listConfirmBankingEmpty").style.display = "none" ;
	document.getElementById("divConfirmBankingInLecture").style.display = "flex" ;
	//fillTableListLecture();
}

function getListConfirmBankingEqualToZero(){
	document.getElementById("listConfirmBankingEmpty").style.display = "flex" ;
	document.getElementById("tableListConfirmBanking").style.display = "none" ;
	emptyTableListConfirmBanking();
}
	
function showProgressListConfirmBanking(){
	document.getElementById("fetchListConfirmBankingProgress").style.display = "flex" ;
}

function hideProgressListConfirmBanking(){
	document.getElementById("fetchListConfirmBankingProgress").style.display = "none" ;
}

function emptyTableListConfirmBanking(){
	document.getElementById("tableListConfirmBanking").innerHTML = "";
	//listConfirmBanking.length = 0;
}

function emptyTableListConfirmBankingLecture(){
	document.getElementById("divConfirmBankingInLecture").innerHTML = "";
	
}
	
function createListConfirmBanking(result){
	let list = result.data;
	
	if (!listVisitedConfirmBanking.includes(getCurrentConfirmBanking())){
			listVisitedConfirmBanking.push(getCurrentConfirmBanking());
	}
	
	let parent = document.getElementById("tableListConfirmBanking");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableConfirmBanking(tbody,list,getCurrentConfirmBanking());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-ConfirmBanking").style.display = "flex";
let parentPaging = document.getElementById("pagingListConfirmBanking");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
//let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
	let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentConfirmBanking()){
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
        if(!listVisitedConfirmBanking.includes(pagingIndex)){//load cái mới	
           setCurrentConfirmBanking(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ");
            loadOldPageConfirmBanking(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageConfirmBanking(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listConfirmBanking.slice(startIndex, endIndex);
		
		let parent = document.getElementById("tableListConfirmBanking");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["CONFIRM_BANKING_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableConfirmBanking(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableConfirmBanking(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.online,listScreen.online.confirmBanking,dictionaryKey.editStatus,item.id);
		let status = item.status == confirmStatus.complete ? '<div class="manage-list-video-status-complete"><?php echo $GLOBALS["CONFIRM_BANKING_COMPLETE"]; ?></div>' : item.status == confirmStatus.pending ? '<div class="manage-list-video-status-upload"><?php echo $GLOBALS["CONFIRM_BANKING_PENDING"]; ?></div>' : item.status == confirmStatus.paid ? '<div class="manage-list-video-status-complete"><?php echo $GLOBALS["CONFIRM_BANKING_PAID"]; ?></div>' : '<div class="manage-list-video-status-error"><?php echo $GLOBALS["CONFIRM_BANKING_CANCEL"]; ?></div>';
	   let statusEdit = item.status == confirmStatus.pending ? "Chỉnh sửa" : "Xem chi tiết";
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+(item.phone != null ? item.phone : "Thiếu") +"</td><td>"+(status)+"</td>"
		+"<td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>"+statusEdit+"</div></a></td>";
		
		tboby.appendChild(trContent);
	});
	}
</script>