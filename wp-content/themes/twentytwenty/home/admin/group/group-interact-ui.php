<?php ?>
<script>
//group
function showProgressListGroup(){
	document.getElementById("fetchListGroupProgress").style.display = "flex" ;
}

function hideProgressListGroup(){
	document.getElementById("fetchListGroupProgress").style.display = "none" ;
}

function getListGroupSuccess(){
	document.getElementById("listGroupError").style.display = "none" ;
	document.getElementById("tableListGroup").style.display = "flex" ;
}

function getListGroupFailed(){
	document.getElementById("listGroupError").style.display = "flex" ;
	document.getElementById("tableListGroup").style.display = "none" ;
}
	
function getListGroupGreaterThanZero(){
	document.getElementById("listGroupEmpty").style.display = "none" ;
	document.getElementById("tableListGroup").style.display = "flex" ;
	//fillTableListLecture();
}

function getListGroupEqualToZero(){
	document.getElementById("listGroupEmpty").style.display = "flex" ;
	document.getElementById("tableListGroup").style.display = "none" ;
	emptyTableListLecture();
}
	
function loadingDataGroupProgress(){
	document.getElementById("group-page-loading").style.display = "flex" ;
	document.getElementById("group-page-loading-progress-error").style.display = "none" ;
	document.getElementById("group-page-loading-progress").style.display = "block" ;
	document.getElementById("group-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataGroupDone(){
	document.getElementById("group-page-loading").style.display = "none" ;
}
	
function loadingDataGroupError(){
	document.getElementById("group-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("group-page-loading-progress").style.display = "none" ;
	document.getElementById("group-page-loading-progress-span").style.display = "none" ;
}
	
function selectGroupIndex(item){
	
}
	
function emptyTableListGroup(){
	document.getElementById("tableListGroup").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListGroup(result){
	let list = result.data;
	console.log("lisst lec",listRollGroup);
	if (!listVisitedRollGroup.includes(getCurrentGroup())){
			listVisitedRollGroup.push(getCurrentGroup());
		}
	let parent = document.getElementById("tableListGroup");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["GROUP_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["GROUP_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["GROUP_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["GROUP_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	loadTableGroup(tbody,list,getCurrentGroup());
	parent.appendChild(tbody);
	
	//paging
document.getElementById("span-title-group").style.display = "flex";
let parentPaging = document.getElementById("pagingListGroup");
parentPaging.innerHTML="";
let maxPage = result.total ? result.total : list.length ;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentGroup()){
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
        if(!listVisitedRollGroup.includes(pagingIndex)){//load cái mới	
           setCurrentGroup(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ");
            loadOldPageGroup(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
}
}

function loadOldPageGroup(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listRollGroup.slice(startIndex, endIndex);
		
		let parent = document.getElementById("tableListGroup");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["GROUP_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["GROUP_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["GROUP_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["GROUP_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	loadTableGroup(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
		
	}
	
	function loadTableGroup(tbody,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-lecture-table-detail-strong';
		} 
		
		//console.log(item.id);
		
		let dateGroup = new Date(item.updateAt);
		
		let tempAHref = makeATagRedirect(sunQMode.sa,listScreen.account.group,dictionaryKey.editStatus,item.id);
		let modified = item.name == "root" ? "<td></td>" : "<td class='manage-list-lecture-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-lecture-table-detail-div-delete' onclick=\"deleteGroup("+(index-1)+")\">Xóa</div></td>";
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.name+"</td><td>"+(dateGroup.getDate()+"/"+dateGroup.getMonth()+"/"+dateGroup.getFullYear())+"</td>"
		+ modified;
		
		tbody.appendChild(trContent);
	});
	}
</script>