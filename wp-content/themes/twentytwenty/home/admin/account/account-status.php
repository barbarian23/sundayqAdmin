<?php ?>
<script>
//account
function showProgressListAccount(){
	document.getElementById("fetchListAccountProgress").style.display = "flex" ;
}

function hideProgressListAccount(){
	document.getElementById("fetchListAccountProgress").style.display = "none" ;
}

function getListAccountSuccess(){
	document.getElementById("listAccountpError").style.display = "none" ;
	document.getElementById("tableListAccount").style.display = "flex" ;
}

function getListAccountFailed(){
	document.getElementById("listAccountError").style.display = "flex" ;
	document.getElementById("tableListAccount").style.display = "none" ;
}
	
function getListAccountGreaterThanZero(){
	document.getElementById("listAccountEmpty").style.display = "none" ;
	document.getElementById("tableListAccount").style.display = "flex" ;
	//fillTableListLecture();
}

function getListAccountEqualToZero(){
	document.getElementById("listAccountEmpty").style.display = "flex" ;
	document.getElementById("tableListAccount").style.display = "none" ;
	emptyTableListLecture();
}
	
function loadingDataAccountProgress(){
	document.getElementById("account-page-loading").style.display = "flex" ;
	document.getElementById("account-page-loading-progress-error").style.display = "none" ;
	document.getElementById("account-page-loading-progress").style.display = "block" ;
	document.getElementById("account-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDataAccountDone(){
	document.getElementById("account-page-loading").style.display = "none" ;
}
	
function loadingDataAccountError(){
	document.getElementById("account-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("account-page-loading-progress").style.display = "none" ;
	document.getElementById("account-page-loading-progress-span").style.display = "none" ;
}
	
function selectAccountIndex(item){
	
}
	
function emptyTableListAccount(){
	document.getElementById("tableListAccount").innerHTML = "";
	//listAccount.length = 0;
}
	
function createListAccount(result){
	let list = result.data;
	console.log("lisst lec",listAccount);
	if (!listVisitedAccount.includes(getCurrentAccount())){
			listVisitedAccount.push(getCurrentAccount());
		}
	let parent = document.getElementById("tableListAccount");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["ACCOUNT_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_5"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_6"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableAccount(tbody,list,getCurrentAccount());
	parent.appendChild(tbody);
	
	//paging
document.getElementById("span-title-account").style.display = "flex";
let parentPaging = document.getElementById("pagingListAccount");
parentPaging.innerHTML="";
let maxPage = result.total;
let maxPerList = dictionaryKey.limitRequestRegister;
let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage/maxPerList) < 0 ? Number.parseInt(maxPage/maxPerList) : Number.parseInt(maxPage/maxPerList) + 1;
console.log(totalPage);
for (let pagingIndex = 0 ; pagingIndex < totalPage ; pagingIndex++ ){
    let tempDivPaging = document.createElement("span");
    tempDivPaging.className="manage-list-lecture-list-register-paging-index";
    if(pagingIndex == getCurrentAccount()){
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
        if(!listVisitedAccount.includes(pagingIndex)){//load cái mới	
           setCurrentAccount(pagingIndex);
        } else {//load lại cái cũ
            console.log("load lại cái cũ");
            loadOldPageAccount(pagingIndex);
        }
    });
    
    parentPaging.appendChild(tempDivPaging);
}
}
	
function loadOldPageAccount(number){
	let startIndex = number*dictionaryKey.limitRequestRegister;
	let endIndex = (number+1)*dictionaryKey.limitRequestRegister;
	let arrayOldPage = listAccount.slice(startIndex, endIndex);
	console.log(arrayOldPage,startIndex, endIndex,listAccount);
	let parent = document.getElementById("tableListAccount");
		parent.innerHTML="";
	let tbody = document.createElement("tbody");
	let trFirst = document.createElement("tr");
	trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["ACCOUNT_LIST_COL_1"]; ?>' +"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_2"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_3"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_4"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_5"]; ?>'+"</th><th>"+'<?php echo $GLOBALS["ACCOUNT_LIST_COL_6"]; ?>'+"</th>";
	tbody.appendChild(trFirst);
	createTableAccount(tbody,arrayOldPage,number);
	parent.appendChild(tbody);
}
	
function createTableAccount(tbody,input,number){
	input.forEach((item,index) => {
		index = number * dictionaryKey.limitRequestRegister + index + 1;
		//console.log(index);
		let trContent = document.createElement("tr");
		if (index % 2 != 0){
			trContent.className = 'manage-list-lecture-table-detail-strong';
		} 
		let isChecked = item.state=="active"?"checked":"";
		let switchState = "<label class='manage-list-lecture-table-detail-switch'><input onchange='changeState("+(index-1)+")' id='"+(index-1)+"' type='checkbox' " + isChecked + "><span class='manage-list-lecture-table-detail-slider'></span></label>";
		
		let tempAHref = item.accountType == "admin" ? makeATagRedirect(sunQMode.sa,listScreen.account.account,dictionaryKey.editStatus,item.id) 
			: item.accountType == "teacher" ? makeATagRedirect(sunQMode.offline,listScreen.offline.teacher,dictionaryKey.editStatus,item.id)
			: "";
		
		let isModifiable = item.accountType == "admin" ? 
			"<td id=\"tdGroup3Option\" class='manage-list-lecture-table-detail-tr-modified'><a href=\""+tempAHref+"&addition=edit\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa</div></a><a href=\""+tempAHref+"&addition=password\"><div class='manage-list-lecture-table-detail-div-edit'>Đổi mật khẩu</div></a><a href=\""+tempAHref+"&addition=permission\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa quyền</div></a></td>" 
			: item.accountType == "teacher" ? "<td id=\"tdGroup3Option\" class='manage-list-lecture-table-detail-tr-modified'><a href=\""+tempAHref+"\"><div class='manage-list-lecture-table-detail-div-edit'>Chỉnh sửa</div></a></td>" 
			: "<td></td>";
	
		if(item.email === "admin@sunq.com"){
		   isModifiable = "<td></td>";
			switchState = "";
		  }
	
		trContent.innerHTML = "<td>"+(index)+"</td><td>"+item.accountType+"</td><td>"+item.email+"</td><td>" +( item.phone == null ? dictionaryKey.LACK_TEACHER : item.phone )+
		"</td><td>"+switchState+"</td>"+isModifiable;
		tbody.appendChild(trContent);
	});
}
</script>