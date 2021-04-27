<?php ?>
<script>
	function showProgressListExhibition(){
	document.getElementById("fetchListExhibitionProgress").style.display = "flex" ;
}

function hideProgressListExhibition(){
	document.getElementById("fetchListExhibitionProgress").style.display = "none" ;
}

function getListExhibitionSuccess(){
	document.getElementById("listExhibitionError").style.display = "none" ;
	document.getElementById("tableListExhibition").style.display = "flex" ;
}

function getListExhibitionFailed(){
	document.getElementById("listExhibitionError").style.display = "flex" ;
	document.getElementById("tableListExhibition").style.display = "none" ;
}
	
function getListExhibitionGreaterThanZero(){
	document.getElementById("listExhibitionEmpty").style.display = "none" ;
	document.getElementById("tableListExhibition").style.display = "flex" ;
	//fillTableListLecture();
}

function getListExhibitionEqualToZero(){
	document.getElementById("listExhibitionEmpty").style.display = "flex" ;
	document.getElementById("tableListExhibition").style.display = "none" ;
	emptyTableListExhibition();
}
	
function loadingDataExhibitionProgress(){
	document.getElementById("exhibition-page-loading").style.display = "flex" ;
	document.getElementById("exhibition-page-loading-progress-error").style.display = "none" ;
	document.getElementById("exhibition-page-loading-progress").style.display = "block" ;
	document.getElementById("exhibition-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataExhibitionDone(){
	document.getElementById("exhibition-page-loading").style.display = "none" ;
}
	
function loadingDataExhibitionError(){
	document.getElementById("exhibition-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("exhibition-page-loading-progress").style.display = "none" ;
	document.getElementById("exhibition-page-loading-progress-span").style.display = "none" ;
}
	
function selectExhibitionIndex(item){
	
}
	
function emptyTableListExhibition(){
	document.getElementById("tableListExhibition").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListExhibition(result){
	let list = result.data;
	
	if (!listVisitedExhibition.includes(getCurrentExhibition())){
			listVisitedExhibition.push(getCurrentExhibition());
	}
	
	let parent = document.getElementById("tableListExhibition");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["EXHIBITON_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableExhibition(tbody,list,getCurrentExhibition());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-exhibition").style.display = "flex";
let parentPaging = document.getElementById("pagingListExhibition");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
//let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentExhibition()){
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
        if(!listVisitedExhibition.includes(pagingIndex)){//load cái mới	
           setCurrentExhibition(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ",pagingIndex);
            loadOldPageExhibition(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageExhibition(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listExhibition.slice(startIndex, endIndex);
		console.log(startIndex, endIndex,arrayOldPage);
		let parent = document.getElementById("tableListExhibition");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["EXHIBITON_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableExhibition(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableExhibition(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.offline,listScreen.offline.exhibition,dictionaryKey.editStatus,item.id);
		
		trContent.innerHTML = "<td>"+(index)+"</td><td class='tdExhibitionTitle'><div class='divExhibitionTitle'>"+item.title+"</div></td><td class='tdExhibitionDescription'><div class='divExhibitionDescription'>"+(item.shortDescription != null ? item.shortDescription : "Thiếu")+"</div></td><td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteExhibition('"+item.id+"')\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
</script>