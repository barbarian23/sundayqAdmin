<?php ?>
<script>
	function showProgressListFreeLessonPlan3(){
	document.getElementById("fetchListFreeLessonPlan3Progress").style.display = "flex" ;
}

function hideProgressListFreeLessonPlan3(){
	document.getElementById("fetchListFreeLessonPlan3Progress").style.display = "none" ;
}

function getListFreeLessonPlan3Success(){
	document.getElementById("listFreeLessonPlan3Error").style.display = "none" ;
	document.getElementById("tableListFreeLessonPlan3").style.display = "flex" ;
}

function getListFreeLessonPlan3Failed(){
	document.getElementById("listFreeLessonPlan3Error").style.display = "flex" ;
	document.getElementById("tableListFreeLessonPlan3").style.display = "none" ;
}
	
function getListFreeLessonPlan3GreaterThanZero(){
	document.getElementById("listFreeLessonPlan3Empty").style.display = "none" ;
	document.getElementById("tableListFreeLessonPlan3").style.display = "flex" ;
	//fillTableListLecture();
}

function getListFreeLessonPlan3EqualToZero(){
	document.getElementById("listFreeLessonPlan3Empty").style.display = "flex" ;
	document.getElementById("tableListFreeLessonPlan3").style.display = "none" ;
	emptyTableListFreeLessonPlan3();
}
	
function loadingDataFreeLessonPlan3Progress(){
	document.getElementById("FreeLessonPlan3-page-loading").style.display = "flex" ;
	document.getElementById("FreeLessonPlan3-page-loading-progress-error").style.display = "none" ;
	document.getElementById("FreeLessonPlan3-page-loading-progress").style.display = "block" ;
	//document.getElementById("FreeLessonPlan3-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataFreeLessonPlan3Done(){
	document.getElementById("FreeLessonPlan3-page-loading").style.display = "none" ;
}
	
function loadingDataFreeLessonPlan3Error(){
	document.getElementById("FreeLessonPlan3-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("FreeLessonPlan3-page-loading-progress").style.display = "none" ;
	//document.getElementById("FreeLessonPlan3-page-loading-progress-span").style.display = "none" ;
}
	
function selectFreeLessonPlan3Index(item){
	
}
	
function emptyTableListFreeLessonPlan3(){
	document.getElementById("tableListFreeLessonPlan3").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListFreeLessonPlan3(result){
	let list = result.data.agePlans;
	
	if (!listVisitedFreeLessonPlan3.includes(getCurrentFreeLessonPlan3())){
			listVisitedFreeLessonPlan3.push(getCurrentFreeLessonPlan3());
	}
	
	let parent = document.getElementById("tableListFreeLessonPlan3");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableFreeLessonPlan3(tbody,list,getCurrentFreeLessonPlan3());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-FreeLessonPlan3").style.display = "flex";
let parentPaging = document.getElementById("pagingListFreeLessonPlan3");
parentPaging.innerHTML="";
let maxPage = list.length;//result.total
let maxPerList = dictionaryKey.limitRequestRegister;
//let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
	let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage % maxPerList) <= 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
console.log("totalPage",totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentFreeLessonPlan3()){
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
        if(!listVisitedFreeLessonPlan3.includes(pagingIndex)){//load cái mới	
           setCurrentFreeLessonPlan3(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ",pagingIndex);
            loadOldPageFreeLessonPlan3(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageFreeLessonPlan3(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listFreeLessonPlan3.slice(startIndex, endIndex);
		console.log(startIndex, endIndex,arrayOldPage);
		let parent = document.getElementById("tableListFreeLessonPlan3");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableFreeLessonPlan3(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableFreeLessonPlan3(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
			let tempDate = new Date();
			tempDate.setMonth(item.month);
			let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
			let monthmonth = monthTemp[tempDate.getMonth()] + ",năm " + tempDate.getFullYear();
		let tempAHref = makeATagRedirect(sunQMode.online,listScreen.online.freelessonplan3,dictionaryKey.editStatus,item.id);
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.title+"</td><td>"+monthmonth+"</td><td class=\"tdShortDesscription\">"+(item.shortDescription != null ? item.shortDescription : "Thiếu")+"</td><td class='manage-list-teacher-table-detail-tr-modified'><div class='manage-list-teacher-table-detail-div-edit'><a href=\"" + tempAHref + "&month="+item.month+"\">Chỉnh sửa</a></div><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteFreeLessonPlan3("+(index-1)+")\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
	
	function transctionToInitVideo(){
		
	}
	
	function transctionToFreeLessonPlan3(){
		
	}
	
</script>