<?php ?>
<script>
	function getListacaIntroSuccess(){
	document.getElementById("listacaIntroError").style.display = "none" ;
	document.getElementById("tableListacaIntro").style.display = "flex" ;
	//fillTableListLecture();
}

function getListacaIntroFailed(){
	document.getElementById("listacaIntroError").style.display = "flex" ;
	document.getElementById("tableListacaIntro").style.display = "none" ;
	//emptyTableListLecture();
}

function loadingDataacaIntroProgress(){
	document.getElementById("acaIntro-page-loading").style.display = "flex" ;
	document.getElementById("acaIntro-page-loading-progress-error").style.display = "none" ;
	document.getElementById("acaIntro-page-loading-progress").style.display = "block" ;
}
	
function loadingDataacaIntroDone(){
	document.getElementById("acaIntro-page-loading").style.display = "none" ;
}
	
function loadingDataacaIntroError(){
	document.getElementById("acaIntro-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("acaIntro-page-loading-progress").style.display = "none" ;
}
	
function getListacaIntroGreaterThanZero(){
	document.getElementById("listacaIntroEmpty").style.display = "none" ;
	document.getElementById("divacaIntroInLecture").style.display = "flex" ;
	//fillTableListLecture();
}

function getListacaIntroEqualToZero(){
	document.getElementById("listacaIntroEmpty").style.display = "flex" ;
	document.getElementById("tableListacaIntro").style.display = "none" ;
	emptyTableListacaIntro();
}
	
function showProgressListacaIntro(){
	document.getElementById("fetchListacaIntroProgress").style.display = "flex" ;
}

function hideProgressListacaIntro(){
	document.getElementById("fetchListacaIntroProgress").style.display = "none" ;
}

function emptyTableListacaIntro(){
	document.getElementById("tableListacaIntro").innerHTML = "";
	//listacaIntro.length = 0;
}

function emptyTableListacaIntroLecture(){
	document.getElementById("divacaIntroInLecture").innerHTML = "";
	
}
	
function createListacaIntro(result){
	let list = result.data;
	
	if (!listVisitedacaIntro.includes(getCurrentacaIntro())){
			listVisitedacaIntro.push(getCurrentacaIntro());
	}
	
	let parent = document.getElementById("tableListacaIntro");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["QVISIT_ARTICLE_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["QVISIT_ARTICLE_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["QVISIT_ARTICLE_LIST_COL_3"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableacaIntro(tbody,list,getCurrentacaIntro());
	parent.appendChild(tbody);
	
	//paging - bỏ comment nếu có phân trang
// 	document.getElementById("span-title-acaIntro").style.display = "flex";
// let parentPaging = document.getElementById("pagingListacaIntro");
// parentPaging.innerHTML="";
// let maxPage = result.total;
// let maxPerList = dictionaryKey.limitRequestRegister;
// //let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
// 	let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
// console.log(totalPage);
// for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
//     let tempDivPaging = document.createElement("span");
//     tempDivPaging.className="manage-list-lecture-list-register-paging-index";
//     if(pagingIndex == getCurrentacaIntro()){
//        tempDivPaging.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
//        }
    
//     tempDivPaging.id="paging-index-"+pagingIndex;
//     tempDivPaging.innerHTML = Number.parseInt(pagingIndex) + 1;
    
//     tempDivPaging.addEventListener("click",function(e){
//         for (let tI = 0 ; tI < totalPage ; tI++ ){
//             let tDiv = document.getElementById("paging-index-"+tI);
//                     if (tI != pagingIndex){
//             //đặt cho các số khác là màu in nhạt	
//                         tDiv.className="manage-list-lecture-list-register-paging-index";
//                         } else {
//             //đặt cho số đang chọnc là màu in đậm	
//                         tDiv.className="manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
//                         }
//             }
//         if(!listVisitedacaIntro.includes(pagingIndex)){//load cái mới	
//            setCurrentacaIntro(pagingIndex);
//         } else {//load lại cái cũ
//             console.log("load lại cái cũ");
//             loadOldPageacaIntro(pagingIndex);
//         }
//     });
    
//     parentPaging.appendChild(tempDivPaging);
// 	}
}

	function loadOldPageacaIntro(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listacaIntro.slice(startIndex, endIndex);
		
		let parent = document.getElementById("tableListacaIntro");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["QVISIT_ARTICLE_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["QVISIT_ARTICLE_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["QVISIT_ARTICLE_LIST_COL_3"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableacaIntro(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableacaIntro(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.offline,listScreen.offline.article,dictionaryKey.editStatus,item.code);
		
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+(item.name != null ? item.name : "Thiếu") +"</td>"
		+"<td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a></td>";
		
		tboby.appendChild(trContent);
	});
	}
</script>