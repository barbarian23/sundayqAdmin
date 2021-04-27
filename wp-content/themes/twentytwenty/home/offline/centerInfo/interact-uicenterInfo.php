<?php ?>
<script>
	function showProgressListcenterinfoclass(){
	document.getElementById("fetchListcenterinfoclassProgress").style.display = "flex" ;
}

function hideProgressListcenterinfoclass(){
	document.getElementById("fetchListcenterinfoclassProgress").style.display = "none" ;
}

function getListcenterinfoclassSuccess(){
	document.getElementById("listcenterinfoclassError").style.display = "none" ;
	document.getElementById("tableListcenterinfoclass").style.display = "flex" ;
}

function getListcenterinfoclassFailed(){
	document.getElementById("listcenterinfoclassError").style.display = "flex" ;
	document.getElementById("tableListcenterinfoclass").style.display = "none" ;
}
	
function getListcenterinfoclassGreaterThanZero(){
	document.getElementById("listcenterinfoclassEmpty").style.display = "none" ;
	document.getElementById("tableListcenterinfoclass").style.display = "flex" ;
	//fillTableListLecture();
}

function getListcenterinfoclassEqualToZero(){
	document.getElementById("listcenterinfoclassEmpty").style.display = "flex" ;
	document.getElementById("tableListcenterinfoclass").style.display = "none" ;
	emptyTableListcenterinfoclass();
}
	
function loadingDatacenterinfoProgress(){
	document.getElementById("centerinfo-page-loading").style.display = "flex" ;
	document.getElementById("centerinfo-page-loading-progress-error").style.display = "none" ;
	document.getElementById("centerinfo-page-loading-progress").style.display = "block" ;
	//document.getElementById("centerinfoclass-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDatacenterinfoDone(){
	document.getElementById("centerinfo-page-loading").style.display = "none" ;
}
	
function loadingDatacenterinfoError(){
	document.getElementById("centerinfo-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("centerinfo-page-loading-progress").style.display = "none" ;
	//document.getElementById("centerinfoclass-page-loading-progress-span").style.display = "none" ;
}
	
function selectcenterinfoclassIndex(item){
	
}
	
function emptyTableListcenterinfoclass(){
	document.getElementById("tableListcenterinfoclass").innerHTML = "";
	//listRollGroup.length = 0;
}
		
	function transctionToInitVideo(){
		
	}
	
	function transctionTocenterinfoclass(){
		
	}
	
</script>