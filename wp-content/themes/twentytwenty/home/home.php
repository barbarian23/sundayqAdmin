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
					<i class="fa fa-dashboard" id="dashboardIcon"></i><a  href=<?php echo $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"]; ?>><?php echo $GLOBALS["nameDashboard"]; ?></a>
				</div>
				
				<div class="home-middle-left-menu">
					<i class="fa fa-mortar-board"></i><a href="?page=lecture"><?php echo $GLOBALS["manageLecture"]; ?></a>
				</div>

				<div class="home-middle-left-menu">
					<i class="fa fa-calendar"></i><a href="?page=schedule"><?php echo $GLOBALS["manageSchedule"]; ?></a>
				</div>

				<div class="home-middle-left-menu">
					<i class="fa fa-newspaper-o"></i><a href="?page=bill"><?php echo $GLOBALS["manageBill"]; ?></a>
				</div>

				<div class="home-middle-left-menu">
					<i class="fa fa-vcard"></i><a href="?page=account"><?php echo $GLOBALS["manageAccount"]; ?></a>
				</div>

				<div class="home-middle-left-menu">
					<i class="fa fa-users"></i><a href="?page=teacher"><?php echo $GLOBALS["manageTeacher"]; ?></a>
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
						<i class="fa fa-dashboard" id="dashboardIconSmall"></i><span><?php echo $GLOBALS["nameDashboard"]; ?></span>
					</div>

					<div class="home-middle-left-menu-small">
						<i class="fa fa-mortar-board"></i><a href="?page=lecture"><?php echo $GLOBALS["manageLecture"]; ?></a>
					</div>

					<div class="home-middle-left-menu-small">
						<i class="fa fa-calendar"></i><a href="?page=schedule"><?php echo $GLOBALS["manageSchedule"]; ?></a>
					</div>

					<div class="home-middle-left-menu-small">
						<i class="fa fa-newspaper-o"></i><a href="?page=bill"><?php echo $GLOBALS["manageBill"]; ?></a>
					</div>

					<div class="home-middle-left-menu-small">
						<i class="fa fa-vcard"></i><a href="?page=account"><?php echo $GLOBALS["manageAccount"]; ?></a>
					</div>

					<div class="home-middle-left-menu-small">
						<i class="fa fa-users"></i><a href="?page=teacher"><?php echo $GLOBALS["manageTeacher"]; ?></a>
					</div>	
				</div>
			</form>
		</div>
		
		
		<!-- home middle right -->
		<div class="home-middle-right">
			<?php
 				if(isset($_GET["page"]) ){
 					switch($_GET["page"]){
 						case "lecture":
							 include get_theme_file_path( "home/lecture/lecture.php" );
 							break;
 						case "schedule":
							include get_theme_file_path( "home/schedule/schedule.php" );
 							break;
 						case "bill":
							include get_theme_file_path( "home/contest/contest.php" );
 							break;
 						case "account":
							include get_theme_file_path( "home/account/account.php" );
 							break;
 						case "teacher":
							include get_theme_file_path( "home/account/teacher.php" );
 							break;
 						default:
 							break;
 					}
 				}
			?>
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