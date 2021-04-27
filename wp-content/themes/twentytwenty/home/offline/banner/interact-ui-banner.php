<?php ?>
<script>
	function showProgressListbannerclass(){
	document.getElementById("fetchListbannerclassProgress").style.display = "flex" ;
}

function hideProgressListbannerclass(){
	document.getElementById("fetchListbannerclassProgress").style.display = "none" ;
}

function getListbannerclassSuccess(){
	document.getElementById("listbannerclassError").style.display = "none" ;
	document.getElementById("tableListbannerclass").style.display = "flex" ;
}

function getListbannerclassFailed(){
	document.getElementById("listbannerclassError").style.display = "flex" ;
	document.getElementById("tableListbannerclass").style.display = "none" ;
}
	
function getListbannerclassGreaterThanZero(){
	document.getElementById("listbannerclassEmpty").style.display = "none" ;
	document.getElementById("tableListbannerclass").style.display = "flex" ;
	//fillTableListLecture();
}

function getListbannerclassEqualToZero(){
	document.getElementById("listbannerclassEmpty").style.display = "flex" ;
	document.getElementById("tableListbannerclass").style.display = "none" ;
	emptyTableListbannerclass();
}
	
function loadingDatabannerclassProgress(){
	document.getElementById("bannerclass-page-loading").style.display = "flex" ;
	document.getElementById("bannerclass-page-loading-progress-error").style.display = "none" ;
	document.getElementById("bannerclass-page-loading-progress").style.display = "block" ;
	//document.getElementById("bannerclass-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDatabannerclassDone(){
	document.getElementById("bannerclass-page-loading").style.display = "none" ;
}
	
function loadingDatabannerclassError(){
	document.getElementById("bannerclass-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("bannerclass-page-loading-progress").style.display = "none" ;
	//document.getElementById("bannerclass-page-loading-progress-span").style.display = "none" ;
}
	
function selectbannerclassIndex(item){
	
}
	
function emptyTableListbannerclass(){
	document.getElementById("tableListbannerclass").innerHTML = "";
	//listRollGroup.length = 0;
}
		
	function transctionToInitVideo(){
		
	}
	
	function transctionTobannerclass(){
		
	}
	
</script>