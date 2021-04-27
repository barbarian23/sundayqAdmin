<?php ?>
<script>
	//image
	function showProgressVideoKit() {
        document.getElementById("fetchVideoKit").style.display = "flex";
        document.getElementById("divVideoKit").style.display = "none";
    }

    function hideProgressVideoKit() {
        document.getElementById("fetchVideoKit").style.display = "none";
        document.getElementById("divVideoKit").style.display = "flex";
    }

    function getVideoKitGreaterThanZero() {
        document.getElementById("divVideoKit").style.display = "none";
        document.getElementById("managaeVideoEmpty").style.display = "flex";
    }

    function getVideoKitEqualThanZero() {
        document.getElementById("divVideoKit").style.display = "flex";
        document.getElementById("managaeVideoEmpty").style.display = "none";
    }

    function getVideoKitSuccess() {
        document.getElementById("managaeVideoError").style.display = "none";
        document.getElementById("divVideoKit").style.display = "flex";
    }

    function getVideoKitFailed() {
        document.getElementById("managaeVideoError").style.display = "flex";
        document.getElementById("divVideoKit").style.display = "none";
    }
	
function showProgressListKit(){
	document.getElementById("fetchListKitProgress").style.display = "flex" ;
}

function hideProgressListKit(){
	document.getElementById("fetchListKitProgress").style.display = "none" ;
}

function getListKitSuccess(){
	document.getElementById("listKitError").style.display = "none" ;
	document.getElementById("tableListKit").style.display = "flex" ;
}

function getListKitFailed(){
	document.getElementById("listKitError").style.display = "flex" ;
	document.getElementById("tableListKit").style.display = "none" ;
}
	
function getListKitGreaterThanZero(){
	document.getElementById("listKitEmpty").style.display = "none" ;
	document.getElementById("tableListKit").style.display = "flex" ;
	//fillTableListLecture();
}

function getListKitEqualToZero(){
	document.getElementById("listKitEmpty").style.display = "flex" ;
	document.getElementById("tableListKit").style.display = "none" ;
	emptyTableListKit();
}
	
function loadingDataKitProgress(){
	document.getElementById("Kit-page-loading").style.display = "flex" ;
	document.getElementById("Kit-page-loading-progress-error").style.display = "none" ;
	document.getElementById("Kit-page-loading-progress").style.display = "block" ;
	document.getElementById("Kit-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataKitDone(){
	document.getElementById("Kit-page-loading").style.display = "none" ;
}
	
function loadingDataKitError(){
	document.getElementById("Kit-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("Kit-page-loading-progress").style.display = "none" ;
	document.getElementById("Kit-page-loading-progress-span").style.display = "none" ;
}
	
function selectKitIndex(item){
	
}
	
function emptyTableListKit(){
	document.getElementById("tableListKit").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListKit(result){
	let list = result.data;
	
	if (!listVisitedKit.includes(getCurrentKit())){
			listVisitedKit.push(getCurrentKit());
	}
	
	let parent = document.getElementById("tableListKit");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["VIDEO_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableKit(tbody,list,getCurrentKit());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-Kit").style.display = "flex";
let parentPaging = document.getElementById("pagingListKit");
parentPaging.innerHTML="";
let maxPage = list.length;//result.total
let maxPerList = dictionaryKey.limitRequestRegister;
//let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
console.log("totalPage",totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentKit()){
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
        if(!listVisitedKit.includes(pagingIndex)){//load cái mới	
           setCurrentKit(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ",pagingIndex);
            loadOldPageKit(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageKit(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listKit.slice(startIndex, endIndex);
		console.log(startIndex, endIndex,arrayOldPage);
		let parent = document.getElementById("tableListKit");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["VIDEO_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableKit(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableKit(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.online,listScreen.online.kit,dictionaryKey.editStatus,item.id);
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.title+"</td><td class=\"tdShortDesscription\">"+(item.shortDescription != null ? item.shortDescription : "Thiếu")+"</td><td class='manage-list-teacher-table-detail-tr-modified'><div class='manage-list-teacher-table-detail-div-edit'><a href=\"" + tempAHref + "\">Chỉnh sửa</a></div><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteKit('"+item.id+"')\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
	
	function transctionToInitVideo(){
		
	}
	
	function transctionToKit(){
		
	}
	
</script>