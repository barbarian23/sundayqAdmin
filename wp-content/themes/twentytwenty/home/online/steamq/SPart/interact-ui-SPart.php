<?php ?>
<script>
	function showProgressListsteamqclass(){
	document.getElementById("fetchListsteamqclassProgress").style.display = "flex" ;
}

function hideProgressListsteamqclass(){
	document.getElementById("fetchListsteamqclassProgress").style.display = "none" ;
}

function getListsteamqclassSuccess(){
	document.getElementById("liststeamqclassError").style.display = "none" ;
	document.getElementById("tableListsteamqclass").style.display = "flex" ;
}

function getListsteamqclassFailed(){
	document.getElementById("liststeamqclassError").style.display = "flex" ;
	document.getElementById("tableListsteamqclass").style.display = "none" ;
}
	
function getListsteamqclassGreaterThanZero(){
	document.getElementById("liststeamqclassEmpty").style.display = "none" ;
	document.getElementById("tableListsteamqclass").style.display = "flex" ;
	//fillTableListLecture();
}

function getListsteamqclassEqualToZero(){
	document.getElementById("liststeamqclassEmpty").style.display = "flex" ;
	document.getElementById("tableListsteamqclass").style.display = "none" ;
	emptyTableListsteamqclass();
}
	
function loadingDatasteamqclassProgress(){
	document.getElementById("steamqclass-page-loading").style.display = "flex" ;
	document.getElementById("steamqclass-page-loading-progress-error").style.display = "none" ;
	document.getElementById("steamqclass-page-loading-progress").style.display = "block" ;
	//document.getElementById("steamqclass-page-loading-progress-span").style.display = "block" ;
}
	
function loadingDatasteamqclassDone(){
	document.getElementById("steamqclass-page-loading").style.display = "none" ;
}
	
function loadingDatasteamqclassError(){
	document.getElementById("steamqclass-page-loading-progress-error").style.display = "flex" ;
	document.getElementById("steamqclass-page-loading-progress").style.display = "none" ;
	//document.getElementById("steamqclass-page-loading-progress-span").style.display = "none" ;
}
	
function selectsteamqclassIndex(item){
	
}
	
function emptyTableListsteamqclass(){
	document.getElementById("tableListsteamqclass").innerHTML = "";
	//listRollGroup.length = 0;
}
		
	function transctionToInitVideo(){
		
	}
	
	function transctionTosteamqclass(){
		
	}
	
</script>