<?php ?>
<script>
	function showProgressListUploadMp3(){
	document.getElementById("fetchListUploadMp3Progress").style.display = "flex" ;
}

function hideProgressListUploadMp3(){
	document.getElementById("fetchListUploadMp3Progress").style.display = "none" ;
}

function getListUploadMp3Success(){
	document.getElementById("listUploadMp3Error").style.display = "none" ;
	document.getElementById("tableListUploadMp3").style.display = "flex" ;
}

function getListUploadMp3Failed(){
	document.getElementById("listUploadMp3Error").style.display = "flex" ;
	document.getElementById("tableListUploadMp3").style.display = "none" ;
}
	
function getListUploadMp3GreaterThanZero(){
	document.getElementById("listUploadMp3Empty").style.display = "none" ;
	document.getElementById("tableListUploadMp3").style.display = "flex" ;
	//fillTableListLecture();
}

function getListUploadMp3EqualToZero(){
	document.getElementById("listUploadMp3Empty").style.display = "flex" ;
	document.getElementById("tableListUploadMp3").style.display = "none" ;
	emptyTableListUploadMp3();
}
	
function loadingDataUploadMp3Progress(){
	document.getElementById("UploadMp3-page-loading").style.display = "flex" ;
	document.getElementById("UploadMp3-page-loading-progress-error").style.display = "none" ;
	document.getElementById("UploadMp3-page-loading-progress").style.display = "block" ;
	document.getElementById("UploadMp3-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataUploadMp3Done(){
	document.getElementById("UploadMp3-page-loading").style.display = "none" ;
}
	
function loadingDataUploadMp3Error(){
	document.getElementById("UploadMp3-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("UploadMp3-page-loading-progress").style.display = "none" ;
	document.getElementById("UploadMp3-page-loading-progress-span").style.display = "none" ;
}
	
function selectUploadMp3Index(item){
	
}
	
function emptyTableListUploadMp3(){
	document.getElementById("tableListUploadMp3").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListUploadMp3(result){
	let list = result.data;
	
	if (!listVisitedUploadMp3.includes(getCurrentUploadMp3())){
			listVisitedUploadMp3.push(getCurrentUploadMp3());
	}
	
	let parent = document.getElementById("tableListUploadMp3");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["VIDEO_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUploadMp3(tbody,list,getCurrentUploadMp3());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-UploadMp3").style.display = "flex";
let parentPaging = document.getElementById("pagingListUploadMp3");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentUploadMp3()){
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
        if(!listVisitedUploadMp3.includes(pagingIndex)){//load cái mới	
           setCurrentUploadMp3(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ",pagingIndex);
            loadOldPageUploadMp3(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageUploadMp3(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listUploadMp3.slice(startIndex, endIndex);
		console.log(startIndex, endIndex,arrayOldPage);
		let parent = document.getElementById("tableListUploadMp3");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["VIDEO_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUploadMp3(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableUploadMp3(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.offline,listScreen.online.UploadMp3,dictionaryKey.editStatus,item.id);
		
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.title+"</td><td>"+(item.shortDescription != null ? item.shortDescription : "Thiếu")+"</td><td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteUploadMp3("+(index-1)+")\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
	
	function transctionToInitVideo(){
		
	}
	
	function transctionToUploadMp3(){
		
	}
	
</script>