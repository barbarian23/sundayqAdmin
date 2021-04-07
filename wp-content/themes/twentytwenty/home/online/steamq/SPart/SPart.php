<?php
include get_theme_file_path("home/online/steamq/SPart/status-SPart.php");
include get_theme_file_path("home/online/steamq/SPart/interact-ui-SPart.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="steamqclass-page-loading">
        <span id="steamqclass-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="steamqclass-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="steamqclass-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<div class="manage-list-lecture-title">
        <span id="title-class-edit-add"><?php echo $GLOBALS["STEAMQ_CLASS_ADD_TILE"] ; ?></span>
    </div>
	
    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["STEAMQ_CLASS_DESCRIPTION"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitlesteamqclass" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["STEAMQ_CLASS_DESCRIPTION_PLACEHOLDER"]; ?>' required>
        </div>
    </div>

    <div class="manage-teacher-bottom-action">
        <input type="submit" name='steamqclassSubmit' value='<?php echo $GLOBALS["STEAMQ_CLASS_CREATE"]; ?>' id="steamqclassSubmit">
    </div>
</form>
<script>
	let myCurrentsteamqclass = {};
    let steamqclassDescription = "";
    window.onload = function() {
        myCurrentsteamqclass = {};
        steamqclassDescription = "";
  	//alert(getAdminHomeURL() + "?mode=online&page=steamq-kit-class-" + getSteamqclass() + "&sclass=" + getSteamqclass() + "&id=" + getCurrentEdit() + "&category=" + getSteamqpart());
  	//
  	
        if (getCurrentACtion() == dictionaryKey.editStatus) {
			document.getElementById("title-class-edit-add").innerHTML = "<?php echo $GLOBALS["STEAMQ_CLASS_EDIT_TILE"] ; ?>"
			console.log(getSteamqclass());
			let interTitle = null;
			setInterval(()=>{
				if(document.getElementById("title-manage-steamq-add-class-"+getSteamqclass())){
					document.getElementById("title-manage-steamq-add-class").style.color = "rgba(240,245,250,0.7)";
					document.getElementById("title-manage-steamq-add-class").style.fontWeight = "500";
					document.getElementById("title-manage-steamq-add-class-"+getSteamqclass()).style.color = "rgb(250, 250, 250)";
					document.getElementById("title-manage-steamq-add-class-"+getSteamqclass()).style.fontWeight = "800";
				   clearInterval(interTitle);
				   }
			},500);
			
			
		document.getElementById("steamqclassSubmit").value = '<?php echo $GLOBALS["STEAMQ_CLASS_UPDATE"]; ?>';
            //fetch từ server
            setLoadingDatasteamqclass(true);
            requestToSever(
                sunQRequestType.get,
                getURLClass(getCurrentEdit()),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDatasteamqclass(false);
                    if (res.code === networkCode.success) {
                        myCurrentsteamqclass = res.data.class;
                        
                        //title
                        document.getElementById("idTitlesteamqclass").value = myCurrentsteamqclass.description == null ? "" : myCurrentsteamqclass.description;


                        console.log(res.data);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDatasteamqclass(dictionaryKey.ERR);
                    console.log(dictionaryKey.ERR_INFO, err);
                    SunQAlert()
                        .position('center')
                        .title(dictionaryKey.ERROR_API_MESSAGE)
                        .type('error')
                        .confirmButtonColor("#3B4EDC")
                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                        .callback((result) => {
                            webpageRedirect(window.location.href);
                        })
                        .show();
                }
            );

        }
    }

	 document.getElementById("idTitlesteamqclass").addEventListener("input", function(e) {
        let tttValue = e.target.value;
        myCurrentsteamqclass.description = tttValue.escape();
    });
	
	
    //submit form
    document.getElementById("steamqclassSubmit").addEventListener("click", function(e) {
        e.preventDefault();
        if (myCurrentsteamqclass.description == "" || myCurrentsteamqclass.description == null) {
            SunQAlert()
                .position('center')
                .title(dictionaryKey.STEAMQ_CLASS_TITLE)
                .type('error')
                .confirmButtonColor("#3B4EDC")
                .confirmButtonText(dictionaryKey.TRY_AGAIN)
                .callback((result) => {
                    window.scrollTo(0, 0);
                })
                .show();
        } else {
            console.log("data lên " + JSON.stringify(myCurrentsteamqclass));
            //alert("data lên " + JSON.stringify(myCurrentsteamqclass));
             let titlleRequestClass = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.REQUEST_EDIT : dictionaryKey.REQUEST_ADD;
            SunQAlert()
                .position('center')
                .title(titlleRequestClass)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentsteamqclass = Object.assign({},myCurrentsteamqclass);

						delete tempmyCurrentsteamqclass.id;
						delete tempmyCurrentsteamqclass.serviceId;
						delete tempmyCurrentsteamqclass.type;
						//newRequest(getLocalStorage(dictionary.MSEC));
                        setLoadingDatasteamqclass(true);
                        requestToSever(
                            getCurrentACtion() == dictionaryKey.editStatus ? sunQRequestType.put : sunQRequestType.post,
                            getCurrentACtion() == dictionaryKey.editStatus ? getURLClass(getCurrentEdit()) : getURLClass(sunqOnlineType.steamq),
                            tempmyCurrentsteamqclass,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDatasteamqclass(false);
                                let sunqalertsuccess = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.STEAMQ_CLASS_EDIT_SUCCESS : dictionaryKey.STEAMQ_CLASS_ADD_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
										
                                            webpageRedirect(getAdminHomeURL() + "?mode=online&page=steamq-kit-class-" + getSteamqclass() + "&sclass=" + getSteamqclass() + "&id=" + getCurrentEdit() + "&category=" + getSteamqpart());
                                        })
                                        .show();
                                } else if (res.code === networkCode.accessDenied) {
                                    makeAlertPermisionDenial();
                                } else if (res.code === networkCode.sessionTimeOut) {
                                    makeAlertRedirect();
                                } else {
                                    //alert("loi"+JSON.stringify(res));
                                    SunQAlert()
                                        .position('center')
                                        .title(dictionaryKey.SERVER_INFO + res.message)
                                        .type('error')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                        .callback((result) => {})
                                        .show();
                                }
                            },
                            function(err) { //alert("err");
                                setLoadingDatasteamqclass(dictionaryKey.ERR);
                                let sunqalertfailed = getCurrentACtion() == dictionaryKey.editStatus ? dictionaryKey.STEAMQ_CLASS_EDIT_FAILED : dictionaryKey.STEAMQ_CLASS_ADD_FAILED;
                                SunQAlert()
                                    .position('center')
                                    .title(sunqalertfailed)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                        // webpageRedirect(window.location.href);
                                    })
                                    .show();
                                console.log(dictionaryKey.ERR_INFO, err);
                            }
                        );
                    }
                })
                .show();
        }
    });
</script>