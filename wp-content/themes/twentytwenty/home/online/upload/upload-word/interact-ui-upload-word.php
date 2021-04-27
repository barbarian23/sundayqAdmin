<?php ?>
<script>
	function showProgressListUploadWord(){
	document.getElementById("fetchListUploadWordProgress").style.display = "flex" ;
}

function hideProgressListUploadWord(){
	document.getElementById("fetchListUploadWordProgress").style.display = "none" ;
}

function getListUploadWordSuccess(){
	document.getElementById("listUploadWordError").style.display = "none" ;
	document.getElementById("tableListUploadWord").style.display = "flex" ;
}

function getListUploadWordFailed(){
	document.getElementById("listUploadWordError").style.display = "flex" ;
	document.getElementById("tableListUploadWord").style.display = "none" ;
}
	
function getListUploadWordGreaterThanZero(){
	document.getElementById("listUploadWordEmpty").style.display = "none" ;
	document.getElementById("tableListUploadWord").style.display = "flex" ;
	//fillTableListLecture();
}

function getListUploadWordEqualToZero(){
	document.getElementById("listUploadWordEmpty").style.display = "flex" ;
	document.getElementById("tableListUploadWord").style.display = "none" ;
	emptyTableListUploadWord();
}
	
function loadingDataUploadWordProgress(){
	document.getElementById("UploadWord-page-loading").style.display = "flex" ;
	document.getElementById("UploadWord-page-loading-progress-error").style.display = "none" ;
	document.getElementById("UploadWord-page-loading-progress").style.display = "block" ;
	document.getElementById("UploadWord-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataUploadWordDone(){
	document.getElementById("UploadWord-page-loading").style.display = "none" ;
}
	
function loadingDataUploadWordError(){
	document.getElementById("UploadWord-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("UploadWord-page-loading-progress").style.display = "none" ;
	document.getElementById("UploadWord-page-loading-progress-span").style.display = "none" ;
}
	
function selectUploadWordIndex(item){
	
}
	
function emptyTableListUploadWord(){
	document.getElementById("tableListUploadWord").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListUploadWord(result){
	let list = result.data;
	
	if (!listVisitedUploadWord.includes(getCurrentUploadWord())){
			listVisitedUploadWord.push(getCurrentUploadWord());
	}
	
	let parent = document.getElementById("tableListUploadWord");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["VIDEO_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUploadWord(tbody,list,getCurrentUploadWord());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-UploadWord").style.display = "flex";
let parentPaging = document.getElementById("pagingListUploadWord");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentUploadWord()){
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
        if(!listVisitedUploadWord.includes(pagingIndex)){//load cái mới	
           setCurrentUploadWord(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ",pagingIndex);
            loadOldPageUploadWord(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageUploadWord(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listUploadWord.slice(startIndex, endIndex);
		console.log(startIndex, endIndex,arrayOldPage);
		let parent = document.getElementById("tableListUploadWord");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["VIDEO_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUploadWord(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableUploadWord(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.offline,listScreen.online.UploadWord,dictionaryKey.editStatus,item.id);
		
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.title+"</td><td>"+(item.shortDescription != null ? item.shortDescription : "Thiếu")+"</td><td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteUploadWord("+(index-1)+")\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
	
	function transctionToInitVideo(){
		
	}
	
	function transctionToUploadWord(){
		
	}
	
</script>