<?php ?>
<script>
	function getListUserAccountSuccess(){
	document.getElementById("listUserAccountError").style.display = "none" ;
	document.getElementById("tableListUserAccount").style.display = "flex" ;
	//fillTableListLecture();
}

function getListUserAccountFailed(){
	document.getElementById("listUserAccountError").style.display = "flex" ;
	document.getElementById("tableListUserAccount").style.display = "none" ;
	//emptyTableListLecture();
}

function getListUserAccountGreaterThanZero(){
	document.getElementById("listUserAccountEmpty").style.display = "none" ;
	document.getElementById("divUserAccountInLecture").style.display = "flex" ;
	//fillTableListLecture();
}

function getListUserAccountEqualToZero(){
	document.getElementById("listUserAccountEmpty").style.display = "flex" ;
	document.getElementById("tableListUserAccount").style.display = "none" ;
	emptyTableListUserAccount();
}
	
function showProgressListUserAccount(){
	document.getElementById("fetchListUserAccountProgress").style.display = "flex" ;
}

function hideProgressListUserAccount(){
	document.getElementById("fetchListUserAccountProgress").style.display = "none" ;
}

function emptyTableListUserAccount(){
	document.getElementById("tableListUserAccount").innerHTML = "";
	//listUserAccount.length = 0;
}

function emptyTableListUserAccountLecture(){
	document.getElementById("divUserAccountInLecture").innerHTML = "";
	
}
	
function createListUserAccount(result){console.log("result",result);
	let list = result.data;
	
	if (!listVisitedUserAccount.includes(getCurrentUserAccount())){
			listVisitedUserAccount.push(getCurrentUserAccount());
	}
	
	let parent = document.getElementById("tableListUserAccount");
				parent.innerHTML ="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUserAccount(tbody,list,getCurrentUserAccount());
	parent.appendChild(tbody);
	
	//paging
	document.getElementById("span-title-UserAccount").style.display = "flex";
let parentPaging = document.getElementById("pagingListUserAccount");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentUserAccount()){
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
        if(!listVisitedUserAccount.includes(pagingIndex)){//load cái mới	
           setCurrentUserAccount(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ");
            loadOldPageUserAccount(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
	}
}

	function loadOldPageUserAccount(number){
		let startIndex = number*dictionaryKey.limitRequestRegister;
		let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
		let arrayOldPage = listUserAccount.slice(startIndex, endIndex);
		
		let parent = document.getElementById("tableListUserAccount");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_USER_LIST_COL_5"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableUserAccount(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
	}
	
	function createTableUserAccount(tboby,input,number){
		input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-teacher-table-detail-strong';
		} 
		//let tempAHref = makeATagRedirect(sunQMode.offline,listScreen.offline.UserAccount,dictionaryKey.editStatus,item.id);
		let dateCre = item.createAt == null ? "" : fromDateToString(item.createAt);
		let dateCreate = item.createAt == null ? "Thiếu" : dateCre ;
		
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+(item.email != null ? item.email : "Thiếu") +"</td><td>"+(item.phone != null ? item.phone : "Thiếu")+"</td><td>"+dateCre +"</td>"+"<td class='manage-list-teacher-table-detail-tr-modified'><div class='manage-list-lecture-table-detail-div-edit' onclick=\"changeAccountPassword('"+item.email+"')\">Đổi mật khẩu</div></td>";
		
		tboby.appendChild(trContent);
	});
	}
</script>