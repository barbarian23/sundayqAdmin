<?php ?>
<script>
	function showProgressListUploadPdf(){
	document.getElementById("fetchListUploadPdfProgress").style.display = "flex" ;
}

function hideProgressListUploadPdf(){
	document.getElementById("fetchListUploadPdfProgress").style.display = "none" ;
}

function getListUploadPdfSuccess(){
	document.getElementById("listUploadPdfError").style.display = "none" ;
	document.getElementById("tableListUploadPdf").style.display = "flex" ;
}

function getListUploadPdfFailed(){
	document.getElementById("listUploadPdfError").style.display = "flex" ;
	document.getElementById("tableListUploadPdf").style.display = "none" ;
}
	
function getListUploadPdfGreaterThanZero(){
	document.getElementById("listUploadPdfEmpty").style.display = "none" ;
	document.getElementById("tableListUploadPdf").style.display = "flex" ;
	//fillTableListLecture();
}

function getListUploadPdfEqualToZero(){
	document.getElementById("listUploadPdfEmpty").style.display = "flex" ;
	document.getElementById("tableListUploadPdf").style.display = "none" ;
	emptyTableListUploadPdf();
}
	
function loadingDataUploadPdfProgress(){
	document.getElementById("UploadPdf-page-loading").style.display = "flex" ;
	document.getElementById("UploadPdf-page-loading-progress-error").style.display = "none" ;
	document.getElementById("UploadPdf-page-loading-progress").style.display = "block" ;
	document.getElementById("UploadPdf-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataUploadPdfDone(){
	document.getElementById("UploadPdf-page-loading").style.display = "none" ;
}
	
function loadingDataUploadPdfError(){
	document.getElementById("UploadPdf-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("UploadPdf-page-loading-progress").style.display = "none" ;
	document.getElementById("UploadPdf-page-loading-progress-span").style.display = "none" ;
}
	
function selectUploadPdfIndex(item){
	
}
	
function emptyTableListUploadPdf(){
	document.getElementById("tableListUploadPdf").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListUploadPdf(result){
	let list = result.data;
	
	if (!listVisitedUploadPdf.includes(getCurrentUploadPdf())){
			listVisitedUploadPdf.push(getCurrentUploadPdf());
	}
	
	let parent = document.getElementById("tableListUploadPdf");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["EXHIBITON_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUploadPdf(tbody,list,getCurrentUploadPdf());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-uploadPdf").style.display = "flex";
let parentPaging = document.getElementById("pagingListUploadPdf");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentUploadPdf()){
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
        if(!listVisitedUploadPdf.includes(pagingIndex)){//load cái mới	
           setCurrentUploadPdf(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ",pagingIndex);
            loadOldPageUploadPdf(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageUploadPdf(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listUploadPdf.slice(startIndex, endIndex);
		console.log(startIndex, endIndex,arrayOldPage);
		let parent = document.getElementById("tableListUploadPdf");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["EXHIBITON_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["EXHIBITON_LIST_COL_4"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUploadPdf(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableUploadPdf(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.offline,listScreen.online.uploadPdf,dictionaryKey.editStatus,item.id);
		
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.title+"</td><td>"+(item.shortDescription != null ? item.shortDescription : "Thiếu")+"</td><td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteUploadPdf("+(index-1)+")\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
	
	function transctionToInitPDF(){
		
	}
	
	function transctionToUploadPDF(){
		
	}
</script>