<?php

?>
<div class="home-parent">
	<!-- home header -->
	<div class="home-header">
		
	</div>
	
	<!-- home middle -->
	<div class="home-middle" id="homeMiddle">

		<!-- home middle left -->
		<!--  large screen-->
		<div class="home-middle-left">
			<form action="get">
				<div class="home-middle-left-menu" id="dashboardName">
					<i class="fa fa-dashboard" id="dashboardIcon"></i><span class="home-middle-left-menu-text"><a  href=<?php echo $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"]; ?>><?php echo $GLOBALS["ADMIN_TITLE"]; ?></a></span>
				</div>
				<!-- Học online -->
				<div class="home-middle-left-menu">
					<i class="fa fa-mortar-board"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_ONLINE"]; ?></span>
					<div>

					</div>
				</div>
					
				<!-- Học offline -->
				<div class="home-middle-left-menu">
					<i class="fa fa-vcard"></i><span class="home-middle-left-menu-text"><?php echo $GLOBALS["ADMIN_OFFLINE"]; ?></span>
					
					<div>
						<div class="home-middle-left-menu">
							<i class="fa fa-calendar"></i><span class="home-middle-left-menu-text"><a href="?mode=offline&page=lecture"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_LECTURE"]; ?></a></span>
						</div>

						<div class="home-middle-left-menu">
							<i class="fa fa-newspaper-o"></i><span class="home-middle-left-menu-text"><a href="?mode=offline&page=teacher"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_TEACHER"]; ?></a></span>
						</div>
					</div>
				</div>
			</form>
		</div>

		<!--  small screen-->
		<div class="home-middle-left-small">
			<form action="get">
				<div class="home-middle-left-menu-small" id="dashboardIconTopSmallContent">
					<a id="dashboardIconTopSmallDivContain">
						<i class="fa fa-server" id="dashboardIconTopSmall"></i>
					</a>
				</div>
				<div class="home-middle-left-menu-small-content" id="menuContent">
					<div class="home-middle-left-menu-small" id="dashboardNameSmall">
						<i class="fa fa-dashboard" id="dashboardIconSmall"></i><span><?php echo $GLOBALS["ADMIN_TITLE"]; ?></span>
					</div>

					<!-- Học online -->
					<div class="home-middle-left-menu-small">
						<i class="fa fa-mortar-board"></i><span><?php echo $GLOBALS["ADMIN_ONLINE"]; ?></span>
					</div>

					<!-- Học offline -->
					<div class="home-middle-left-menu-small">
						<i class="fa fa-calendar"></i><span><?php echo $GLOBALS["ADMIN_OFFLINE"]; ?></span>
						<div>
							<div class="home-middle-left-menu-small">
								<i class="fa fa-newspaper-o"></i><a href="?mode=offline&page=lecture"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_LECTURE"]; ?></a>
							</div>

							<div class="home-middle-left-menu-small">
								<i class="fa fa-vcard"></i><a href="?mode=offline&page=teacher"><?php echo $GLOBALS["ADMIN_OFFLINE_MANAGE_TEACHER"]; ?></a>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		
		<!-- home middle right -->
		<div class="home-middle-right">
			<div class="home-middle-right-contain">
				<?php
					if(isset($_GET["mode"])){
						if($_GET["mode"] == "online"){
							if(isset($_GET["page"])){

							}
						} else if($_GET["mode"] == "offline"){
							if(isset($_GET["page"])){
								switch($_GET["page"]){
									case "lecture":
										 include get_theme_file_path( "home/offline/lecture/lecture.php" );
										break;
									case "teacher":
										include get_theme_file_path( "home/offline/teacher/teacher.php" );
										break;
									default:
										break;
								}
							}
						}
					}
				?>
			</div>
		</div>
	
	</div>
		
	<!-- home footer -->
	<div class="home-footer">
		
	</div>
</div>
<script>
// 	function showHideMenu(){alert("click");
// 		if(document.getElementById("menuContent").style.display == "none" || document.getElementById("menuContent").style.display == ""){
		
// 		document.getElementById("menuContent").style.display = "flex";
// 	} else {
		
// 		document.getElementById("menuContent").style.display = "none";
// 	}
// 	}
 	
// document.addEventListener('touchstart', function() {
//     document.getElementById("dashboardIconTopSmallDivContain").style.pointerEvents  = "auto";
// });

// document.addEventListener('touchmove', function(e) {
//     e.preventDefault();
//     document.getElementById("dashboardIconTopSmallDivContain").style.pointerEvents  = "auto";
// });

// document.addEventListener('touchend', function() {
//     setTimeout(function() {
//         document.getElementById("dashboardIconTopSmallDivContain").style.pointerEvents  = "none";
//     }, 0);
// });
	
document.getElementById("dashboardIconTopSmallDivContain").addEventListener("touchstart",function(){
	alert("123");
	if(document.getElementById("menuContent").style.display == "none" || document.getElementById("menuContent").style.display == ""){
		
		document.getElementById("menuContent").style.display = "flex";
	} else {
		
		document.getElementById("menuContent").style.display = "none";
	}
});
document.getElementById("homeMiddle").addEventListener("touchend",function(e){
	console.log(e.target.id);
	if(e.target.id != "dashboardIconTopSmall"){
		if(document.getElementById("menuContent").style.display != "none" && document.getElementById("menuContent").style.display != ""){

			document.getElementById("menuContent").style.display = "none";
		}
	}
});
</script>