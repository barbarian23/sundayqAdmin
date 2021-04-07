<?php ?>
<script>
	function showProgressListUploadVideo(){
	document.getElementById("fetchListUploadVideoProgress").style.display = "flex" ;
}

function hideProgressListUploadVideo(){
	document.getElementById("fetchListUploadVideoProgress").style.display = "none" ;
}

function getListUploadVideoSuccess(){
	document.getElementById("listUploadVideoError").style.display = "none" ;
	document.getElementById("tableListUploadVideo").style.display = "flex" ;
}

function getListUploadVideoFailed(){
	document.getElementById("listUploadVideoError").style.display = "flex" ;
	document.getElementById("tableListUploadVideo").style.display = "none" ;
}
	
function getListUploadVideoGreaterThanZero(){
	document.getElementById("listUploadVideoEmpty").style.display = "none" ;
	document.getElementById("tableListUploadVideo").style.display = "flex" ;
	//fillTableListLecture();
}

function getListUploadVideoEqualToZero(){
	document.getElementById("listUploadVideoEmpty").style.display = "flex" ;
	document.getElementById("tableListUploadVideo").style.display = "none" ;
	emptyTableListUploadVideo();
}
	
function loadingDataUploadVideoProgress(){
	document.getElementById("uploadVideo-page-loading").style.display = "flex" ;
	document.getElementById("uploadVideo-page-loading-progress-error").style.display = "none" ;
	document.getElementById("uploadVideo-page-loading-progress").style.display = "block" ;
	document.getElementById("uploadVideo-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataUploadVideoDone(){
	document.getElementById("uploadVideo-page-loading").style.display = "none" ;
}
	
function loadingDataUploadVideoError(){
	document.getElementById("uploadVideo-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("uploadVideo-page-loading-progress").style.display = "none" ;
	document.getElementById("uploadVideo-page-loading-progress-span").style.display = "none" ;
}
	
function selectUploadVideoIndex(item){
	
}
	
function emptyTableListUploadVideo(){
	document.getElementById("tableListUploadVideo").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListUploadVideo(result){
	let list = result.data;
	
	if (!listVisitedUploadVideo.includes(getCurrentUploadVideo())){
			listVisitedUploadVideo.push(getCurrentUploadVideo());
	}
	
	let parent = document.getElementById("tableListUploadVideo");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["VIDEO_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUploadVideo(tbody,list,getCurrentUploadVideo());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-uploadVideo").style.display = "flex";
let parentPaging = document.getElementById("pagingListUploadVideo");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
//let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
	let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
console.log("totalPage",totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentUploadVideo()){
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
        if(!listVisitedUploadVideo.includes(pagingIndex)){//load cái mới	
           setCurrentUploadVideo(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ",pagingIndex);
            loadOldPageUploadVideo(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageUploadVideo(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listUploadVideo.slice(startIndex, endIndex);
		console.log(startIndex, endIndex,arrayOldPage);
		let parent = document.getElementById("tableListUploadVideo");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["VIDEO_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["VIDEO_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUploadVideo(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableUploadVideo(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
			//edit là tải lại video, title là chỉnh sửa tiêu đề video
		let editAHref = makeATagRedirect(sunQMode.online,listScreen.online.uploadVideo,dictionaryKey.editStatus,item.id);
		let titleAHref = makeATagRedirect(sunQMode.online,listScreen.online.uploadVideo,dictionaryKey.titleStatus,item.id);

		let editVideo =	item.status == videoStatus.complete ? 
			"<a class='manage-list-teacher-table-detail-tr-modified-a-video' href=\""+titleAHref+"\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa thông tin video</div></a><a class='manage-list-teacher-table-detail-tr-modified-a-video' href=\""+editAHref+"\"><div class='manage-list-lecture-table-detail-div-edit'>Tải lại video</div></a>"
			: 
		    "<a class='manage-list-teacher-table-detail-tr-modified-a-video' href=\""+titleAHref+"\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa thông tin video</div></a><a class='manage-list-teacher-table-detail-tr-modified-a-video' href=\""+editAHref+"\"><div class='manage-list-lecture-table-detail-div-edit'>Tải video lên</div></a>"
		;
			let status = item.status == videoStatus.complete ? '<div class="manage-list-video-status-complete"><?php echo $GLOBALS["VIDEO_STATUS_COMPLETE"]; ?></div>' : item.status == videoStatus.uploading ? '<div class="manage-list-video-status-upload"><?php echo $GLOBALS["VIDEO_STATUS_UPLOAD"]; ?></div>' : item.status == videoStatus.create ? '<div class="manage-list-video-status-error"><?php echo $GLOBALS["VIDEO_STATUS_CREATE"]; ?></div>' : '<div class="manage-list-video-status-error"><?php echo $GLOBALS["VIDEO_STATUS_ERROR"]; ?></div>' ;
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.title+"</td><td class=\"tdShortDesscription\"><div class=\"divShortDesscription\">"+(item.shortDescription != null ? item.shortDescription : "Thiếu")+"</div></td><td class=\"tdVideoStatus\">"+status+"</td><td class='manage-list-teacher-table-detail-tr-modified'>" + editVideo + "<div class='manage-list-teacher-table-detail-div-delete manage-list-teacher-table-detail-div-delete-video' onclick=\"deleteUploadVideo("+(index-1)+")\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
	
	function transctionToInitVideo(){
		
	}
	
	function transctionToUploadVideo(){
		
	}
	
</script>