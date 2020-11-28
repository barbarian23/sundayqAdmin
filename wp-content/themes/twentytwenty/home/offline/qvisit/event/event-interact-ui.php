<?php ?>
<script>
	function showProgressListEvent(){
	document.getElementById("fetchListEventProgress").style.display = "flex" ;
}

function hideProgressListEvent(){
	document.getElementById("fetchListEventProgress").style.display = "none" ;
}

function getListEventSuccess(){
	document.getElementById("listEventError").style.display = "none" ;
	document.getElementById("tableListEvent").style.display = "flex" ;
}

function getListEventFailed(){
	document.getElementById("listEventError").style.display = "flex" ;
	document.getElementById("tableListEvent").style.display = "none" ;
}
	
function getListEventGreaterThanZero(){
	document.getElementById("listEventEmpty").style.display = "none" ;
	document.getElementById("tableListEvent").style.display = "flex" ;
	//fillTableListLecture();
}

function getListEventEqualToZero(){
	document.getElementById("listEventEmpty").style.display = "flex" ;
	document.getElementById("tableListEvent").style.display = "none" ;
	emptyTableListEvent();
}
	
function loadingDataEventProgress(){
	document.getElementById("event-page-loading").style.display = "flex" ;
	document.getElementById("event-page-loading-progress-error").style.display = "none" ;
	document.getElementById("event-page-loading-progress").style.display = "block" ;
	document.getElementById("event-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataEventDone(){
	document.getElementById("event-page-loading").style.display = "none" ;
}
	
function loadingDataEventError(){
	document.getElementById("event-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("event-page-loading-progress").style.display = "none" ;
	document.getElementById("event-page-loading-progress-span").style.display = "none" ;
}
	
function selectEventIndex(item){
	
}
	
function emptyTableListEvent(){
	document.getElementById("tableListEvent").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListEvent(result){
	let list = result.data;
	
	if (!listVisitedEvent.includes(getCurrentEvent())){
			listVisitedEvent.push(getCurrentEvent());
	}
	
	let parent = document.getElementById("tableListEvent");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["EVENT_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_5"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_6"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableEvent(tbody,list,getCurrentEvent());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-event").style.display = "flex";
let parentPaging = document.getElementById("pagingListEvent");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentEvent()){
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
        if(!listVisitedEvent.includes(pagingIndex)){//load cái mới	
           setCurrentEvent(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ");
            loadOldPageEvent(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageEvent(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listEvent.slice(startIndex, endIndex);
		
		let parent = document.getElementById("tableListEvent");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["EVENT_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_5"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EVENT_LIST_COL_6"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableEvent(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableEvent(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.offline,listScreen.offline.event,dictionaryKey.editStatus,item.id);
		
		trContent.innerHTML = "<td>"+(index)+"</td><td class='tdEventTitle'><div class='divEventTitle'>"+item.title+"</div></td><td>"+getDateString(new Date(item.startAt))+"</td><td>"+getDateString(new Date(item.finishAt))+"</td><td class='tdEventDescription'><div class='divEventDescription'>"+(item.shortDescription != null ? item.shortDescription : "Thiếu")+"</div></td><td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteEvent("+(index-1)+")\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
</script>