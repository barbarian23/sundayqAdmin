<?php

?>

	
<script>
		window.onload = function(){
		let sunqModeOfflineDiv = document.getElementById("divShowOffline");
		sunqModeOfflineDiv && sunqModeOfflineDiv.addEventListener("click",function(){
			setMode(sunQMode.offline);
		});
			
			
		let sunqModeOnlineDiv = document.getElementById("divShowOnline");
		sunqModeOnlineDiv && sunqModeOnlineDiv.addEventListener("click",function(){
			setMode(sunQMode.online);
		});
	}
</script>

