<?php 
	include get_theme_file_path("home/online/steamq/APart/status-APart.php");
	include get_theme_file_path("home/online/steamq/APart/interact-ui-APart.php" ); 
?>

<script>
var listVisitedsteamq = [],liststeamq = [];
window.onload = function() {
		//get list ticket
		
	
	
	let inteRed = null;
	setTimeout(()=>{console.log("reeeeee",getSteamqpart());
				
	if(STEAMQ_CLASS == null || STEAMQ_CLASS.length == 0){
		inteRed = setInterval(()=>{
				if(STEAMQ_CLASS){
					clearInterval(inteRed);
					prepareRedirectSteamq();
				}	
		},500);
	} else {
		prepareRedirectSteamq();
	}
				   },1000);
	if(getSteamqpart() != null && getSteamqpart() != ""){
		listVisitedsteamq.push(0);
		setCurrentsteamq(0);
	}
		
		   
		if(document.getElementById(getSteamqpart())){
			console.log("steam part",getSteamqpart());
			document.getElementById(getSteamqpart()).style.cssText  = "background:#002546";
			document.getElementById(getSteamqpart()+"a").style.cssText  = "color:#fafafa";
		}
	//console.log(STEAMQ_CLASS);
	    //var currentClass = STEAMQ_CLASS[getSteamqclass()].description;
	    function prepareRedirectSteamq(){
		let needRedirectSteamqClass = null;
		let rrsp = null;
		let rrsc = null;
			//alert("getSteamqpart"+getSteamqpart()+" "+getSteamqpart() == ""+"getSteamqclassid"+getSteamqclassid());
		
			if(getSteamqpart() == null || getSteamqpart() == "" || getSteamqpart() == "null"){
		  rrsp = "science";
			rrsc = getSteamqclassid();
			if(getSteamqclassid() == null || getSteamqclassid() == "" || getSteamqclassid() == "null"){
				console.log("steamq",STEAMQ_CLASS);
		  	 rrsc=STEAMQ_CLASS[0].id;
		   		}
			let indexxx = 0;
			STEAMQ_CLASS.some((item,index)=>{
				if(item.id == rrsc){
					indexxx = index;
				   return true;
				}
			});
			needRedirectSteamqClass = "http://admin.sundayq.com/?mode=online&page=steamq-kit-class-"+indexxx+"&sclass="+indexxx+"&id="+rrsc+"&category="+rrsp;
				console.log(needRedirectSteamqClass);
		   }
	
		
	else if(getSteamqclassid() == null || getSteamqclassid() == "" || getSteamqclassid() == "null"){alert("class null");
		rrsp = getSteamqpart();
		//console.log("steamq",STEAMQ_CLASS[0]);
		rrsc=STEAMQ_CLASS[0].id;
		let indexxx = 0;
		needRedirectSteamqClass = "http://admin.sundayq.com/?mode=online&page=steamq-kit-class-"+rrsc+"&sclass="+indexxx+"&id="+rrsc+"&category="+rrsp;
	}
						if(needRedirectSteamqClass){
			 webpageRedirect(needRedirectSteamqClass);
		}
		
		
	
		
	}
    }

function deleteClass(){
	SunQAlert()
            .position('center')
            .title(dictionaryKey.REQUEST_DELETE_CLASS)
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
                    seFetchingsteamq(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLClass(getCurrentEdit()),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingsteamq(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.STEAMQ_CLASS_DELETE_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        webpageRedirect("http://admin.sundayq.com/?mode=online&page=steamq-kit-class-&sclass=&id=&category=");
                                    })
                                    .show();
                            }else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            } else {
								//alert("");
								SunQAlert()
										.position('center')
										.title(dictionaryKey.STEAMQ_CLASS_DELETE_FAILED)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {})
										.show();
							}
                        },
                        function(err) {
                            seFetchingsteamq(false);
                            setIsGetsteamqFromServerSuccess(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.STEAMQ_CLASS_DELETE_FAILED)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {
                                    //webpageRedirect(window.location.href);
                                })
                                .show();

                            console.log(dictionaryKey.ERR_INFO, err);

                        }
                    );

                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
            .show();
}

function deletesteamq(mId){
	 //console.log("delete", liststeamq[mId]);
		//alert("teacher "+mId+listTeacher[mId].name);
        //alert hỏi
        SunQAlert()
            .position('center')
            .title(dictionaryKey.REQUEST_DELETE)
            .type('success')
            .confirmButtonColor("#3B4EDC")
            .cancelButtonColor("#a8b1f5")
            .confirmButtonText(dictionaryKey.AGREE)
            .cancelButtonText(dictionaryKey.CANCEL)
            .callback((result) => {
                if (result.value) {
                    seFetchingsteamq(true);
                    requestToSever(
                        sunQRequestType.delete,
                        getURLLesson(mId),
                        null,
                        getData(dictionary.MSEC),
                        function(res) {
                            //console.log(res);
                            seFetchingsteamq(false);
                            if (res.code === networkCode.success) {
                                SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.STEAMQ_CLASS_DELETE_SUCCESS)
                                    .type('success')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        webpageRedirect(window.location.href);
                                    })
                                    .show();
                            }else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   } else if (res.code === networkCode.sessionTimeOut) {
                                makeAlertRedirect();
                            } else {
								//alert("");
								SunQAlert()
										.position('center')
										.title(dictionaryKey.STEAMQ_CLASS_DELETE_FAILED)
										.type('error')
										.confirmButtonColor("#3B4EDC")
										.confirmButtonText(dictionaryKey.TRY_AGAIN)
										.callback((result) => {})
										.show();
							}
                        },
                        function(err) {
                            seFetchingsteamq(false);
                            setIsGetsteamqFromServerSuccess(false);
                            SunQAlert()
                                .position('center')
                                .title(dictionaryKey.STEAMQ_CLASS_DELETE_FAILED)
                                .type('error')
                                .confirmButtonColor("#3B4EDC")
                                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                .callback((result) => {
                                    //webpageRedirect(window.location.href);
                                })
                                .show();

                            console.log(dictionaryKey.ERR_INFO, err);

                        }
                    );

                } else if (result.dismiss === Swal.DismissReason.cancel) {

                }
            })
            .show();
}

</script>
<div class="manage-list-lecture">
	<div class="manage-list-lecture-title-list-contain">
		<div class="manage-list-steamq-category">
			<div id="science">
				<a id="sciencea" href="<?php echo "?mode=online&page=steamq-kit-class-" . $steamQClass . "&sclass=" . $steamQClass . "&id=" . $currentEdit . "&category=science"; ?>"><span>Science</span></a>
			</div>
			<div id="technology">
				<a id="technologya" href="<?php echo "?mode=online&page=steamq-kit-class-" . $steamQClass . "&sclass=" . $steamQClass . "&id=" . $currentEdit . "&category=technology"; ?>"><span>Technology</span></a>
			</div>
			<div id="engineering">
				<a id="engineeringa" href="<?php echo "?mode=online&page=steamq-kit-class-" . $steamQClass . "&sclass=" . $steamQClass . "&id=" . $currentEdit . "&category=engineering"; ?>"><span>Engineering</span></a>
			</div>
			<div id="art">
				<a id="arta" href="<?php echo "?mode=online&page=steamq-kit-class-" . $steamQClass . "&sclass=" . $steamQClass . "&id=" . $currentEdit . "&category=art"; ?>"><span>Art</span></a>
			</div>
			<div id="math" >
				<a id="matha" href="<?php echo "?mode=online&page=steamq-kit-class-" . $steamQClass . "&sclass=" . $steamQClass . "&id=" . $currentEdit . "&category=math"; ?>"><span>Math</span></a>
			</div>
		</div>
		
		<div class="manage-list-lecture-title">
			<span><?php echo $GLOBALS["STEAMQ_LIST_TITLE"]; ?></span>
		</div>

		<div class="manage-list-lecture-table">
			<div class="sunq-process-contain" id="fetchListsteamqProgress">
				<div class="sunq-process-contain-running">

				</div>
			</div>
			<table class="manage-list-lecture-table-detail" id="tableListsteamq">

			</table>
			<div class="manage-list-lecture-table-detail-no-list" id="liststeamqEmpty">
				<img src='<?php echo $GLOBALS["URI_EMPTY_BOX"]; ?>'>
				<span><?php echo $GLOBALS["FREELESSON_PLAN_NO_LIST"]; ?></span>
			</div>

			<div class="manage-list-lecture-table-detail-no-list" id="liststeamqError">
				<img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
				<span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
			</div>
		</div>

		
		
		<!-- paging -->
		<span class="manage-list-lecture-list-register-paging-span-title" id="span-title-steamq"><?php echo $GLOBALS["LECTURE_LIST_REGISTER_NUMBER_TITLE"]; ?></span>
		<div class="manage-list-lecture-list-register-paging" id="pagingListsteamq">
			
		</div>
		

		<div class="manage-list-lecture-add-new">
			<a href="<?php echo "?mode=online&page=steamq-kit-add-lesson-" . $steamQClass ."&action=add&category=" . $steamQCategory . "&sclass=" . $steamQClass . "&parentId=".$currentEdit  ; ?>">
				<button>
					<span><?php echo $GLOBALS["STEAMQ_PLAN_LIST_BUTTON_ADD_KIT"]; ?></span>
				</button>
			</a>
		</div>
       <div class="class-editor">
		<div class="manage-list-lecture-add-new">
			<a href="<?php echo "?mode=online&page=steamq-kit-add-class&action=edit&id=".$currentEdit."&category=" . $steamQCategory . "&sclass=" . $steamQClass . "&parentId=".$currentEdit; ?>">
				<button>
					<span><?php echo $GLOBALS["STEAMQ_CLASS_EDIT_TILE"]; ?></span>
				</button>
			</a>
		</div>
		
		<div class="manage-list-lecture-add-new">
			<a href="javascript:void(0);">
				<button onClick="deleteClass()">
					<span><?php echo $GLOBALS["STEAMQ_CLASS_DELETE_CLASS"]; ?></span>
				</button>
			</a>
		</div>			
		</div>
	</div>
</div>