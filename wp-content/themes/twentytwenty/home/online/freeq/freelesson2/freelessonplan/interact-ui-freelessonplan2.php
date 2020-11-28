<?php ?>
<script>
	function showProgressListFreeLessonPlan2(){
	document.getElementById("fetchListFreeLessonPlan2Progress").style.display = "flex" ;
}

function hideProgressListFreeLessonPlan2(){
	document.getElementById("fetchListFreeLessonPlan2Progress").style.display = "none" ;
}

function getListFreeLessonPlan2Success(){
	document.getElementById("listFreeLessonPlan2Error").style.display = "none" ;
	document.getElementById("tableListFreeLessonPlan2").style.display = "flex" ;
}

function getListFreeLessonPlan2Failed(){
	document.getElementById("listFreeLessonPlan2Error").style.display = "flex" ;
	document.getElementById("tableListFreeLessonPlan2").style.display = "none" ;
}
	
function getListFreeLessonPlan2GreaterThanZero(){
	document.getElementById("listFreeLessonPlan2Empty").style.display = "none" ;
	document.getElementById("tableListFreeLessonPlan2").style.display = "flex" ;
	//fillTableListLecture();
}

function getListFreeLessonPlan2EqualToZero(){
	document.getElementById("listFreeLessonPlan2Empty").style.display = "flex" ;
	document.getElementById("tableListFreeLessonPlan2").style.display = "none" ;
	emptyTableListFreeLessonPlan2();
}
	
function loadingDataFreeLessonPlan2Progress(){
	document.getElementById("FreeLessonPlan2-page-loading").style.display = "flex" ;
	document.getElementById("FreeLessonPlan2-page-loading-progress-error").style.display = "none" ;
	document.getElementById("FreeLessonPlan2-page-loading-progress").style.display = "block" ;
	//document.getElementById("FreeLessonPlan2-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataFreeLessonPlan2Done(){
	document.getElementById("FreeLessonPlan2-page-loading").style.display = "none" ;
}
	
function loadingDataFreeLessonPlan2Error(){
	document.getElementById("FreeLessonPlan2-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("FreeLessonPlan2-page-loading-progress").style.display = "none" ;
	//document.getElementById("FreeLessonPlan2-page-loading-progress-span").style.display = "none" ;
}
	
function selectFreeLessonPlan2Index(item){
	
}
	
function emptyTableListFreeLessonPlan2(){
	document.getElementById("tableListFreeLessonPlan2").innerHTML = "";
	//listRollGroup.length = 0;
}
	
function createListFreeLessonPlan2(result){
	let list = result.data.agePlans;
	
	if (!listVisitedFreeLessonPlan2.includes(getCurrentFreeLessonPlan2())){
			listVisitedFreeLessonPlan2.push(getCurrentFreeLessonPlan2());
	}
	
	let parent = document.getElementById("tableListFreeLessonPlan2");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableFreeLessonPlan2(tbody,list,getCurrentFreeLessonPlan2());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-FreeLessonPlan2").style.display = "flex";
let parentPaging = document.getElementById("pagingListFreeLessonPlan2");
parentPaging.innerHTML="";
let maxPage = list.length;//result.total
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log("totalPage",totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentFreeLessonPlan2()){
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
        if(!listVisitedFreeLessonPlan2.includes(pagingIndex)){//load cái mới	
           setCurrentFreeLessonPlan2(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ",pagingIndex);
            loadOldPageFreeLessonPlan2(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageFreeLessonPlan2(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listFreeLessonPlan2.slice(startIndex, endIndex);
		console.log(startIndex, endIndex,arrayOldPage);
		let parent = document.getElementById("tableListFreeLessonPlan2");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["FREELESSON_PLAN_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableFreeLessonPlan2(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableFreeLessonPlan2(tboby,input,number){
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
		let tempAHref = makeATagRedirect(sunQMode.online,listScreen.online.freelessonplan2,dictionaryKey.editStatus,item.id);
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.title+"</td><td>"+monthmonth+"</td><td class=\"tdShortDesscription\">"+(item.shortDescription != null ? item.shortDescription : "Thiếu")+"</td><td class='manage-list-teacher-table-detail-tr-modified'><div class='manage-list-teacher-table-detail-div-edit'><a href=\"" + tempAHref + "&month="+item.month+"\">Chỉnh sửa</a></div><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteFreeLessonPlan2("+(index-1)+")\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
	
	function transctionToInitVideo(){
		
	}
	
	function transctionToFreeLessonPlan2(){
		
	}
	
</script>