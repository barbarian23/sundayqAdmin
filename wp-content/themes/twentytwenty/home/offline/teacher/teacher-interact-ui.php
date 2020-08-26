<?php ?>
<script>
	function getListTeacherSuccess(){
	document.getElementById("listTeacherError").style.display = "none" ;
	document.getElementById("tableListTeacher").style.display = "flex" ;
	//fillTableListLecture();
}

function getListTeacherFailed(){
	document.getElementById("listTeacherError").style.display = "flex" ;
	document.getElementById("tableListTeacher").style.display = "none" ;
	//emptyTableListLecture();
}

function getListTeacherGreaterThanZero(){
	document.getElementById("listTeacherEmpty").style.display = "none" ;
	document.getElementById("divTeacherInLecture").style.display = "flex" ;
	//fillTableListLecture();
}

function getListTeacherEqualToZero(){
	document.getElementById("listTeacherEmpty").style.display = "flex" ;
	document.getElementById("tableListTeacher").style.display = "none" ;
	emptyTableListTeacher();
}
	
function showProgressListTeacher(){
	document.getElementById("fetchListTeacherProgress").style.display = "flex" ;
}

function hideProgressListTeacher(){
	document.getElementById("fetchListTeacherProgress").style.display = "none" ;
}

function emptyTableListTeacher(){
	document.getElementById("tableListTeacher").innerHTML = "";
	//listTeacher.length = 0;
}

function emptyTableListTeacherLecture(){
	document.getElementById("divTeacherInLecture").innerHTML = "";
	
}
	
function createListTeacher(result){
	let list = result.data;
	
	if (!listVisitedTeacher.includes(getCurrentTeacher())){
			listVisitedTeacher.push(getCurrentTeacher());
	}
	
	let parent = document.getElementById("tableListTeacher");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["TEACHER_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableTeacher(tbody,list,getCurrentTeacher());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-teacher").style.display = "flex";
let parentPaging = document.getElementById("pagingListTeacher");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentTeacher()){
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
        if(!listVisitedTeacher.includes(pagingIndex)){//load cái mới	
           setCurrentTeacher(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ");
            loadOldPageTeacher(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageTeacher(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listTeacher.slice(startIndex, endIndex);
		
		let parent = document.getElementById("tableListTeacher");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["TEACHER_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["TEACHER_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableTeacher(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableTeacher(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		let tempAHref = makeATagRedirect(sunQMode.offline,listScreen.offline.teacher,dictionaryKey.editStatus,item.id);
		
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+(item.name != null ? item.name : "Thiếu") +"</td><td>"+(item.specialist != null ? item.specialist : "Thiếu")+"</td><td>"+(item.university != null ? item.university : "Thiếu") +"</td>"
		+"<td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?"+tempAHref+"\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteTeacher("+(index-1)+")\">Xóa</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
</script>