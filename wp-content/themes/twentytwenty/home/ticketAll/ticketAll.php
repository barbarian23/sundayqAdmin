<?php
include get_theme_file_path("home/ticketAll/ticketAll-status.php");
include get_theme_file_path("home/ticketAll/ticketAll-interact-ui.php");
?>
<form class="manage-contain">
    <div class="manage-contain-loading" id="ticketAll-page-loading">
        <span id="ticketAlllesson-pageloading-progress-span"><?php echo $GLOBALS["LOADING_DATA"]; ?></span>
        <div class="login-input-loading" id="ticketAll-page-loading-progress">

        </div>
        <div class="manage-contain-loading-err" id="ticketAll-page-loading-progress-error">
            <img src='<?php echo $GLOBALS["URI_ERROR_CONNECTION"]; ?>'>
            <span><?php echo $GLOBALS["ERROR_CONNECTION"]; ?></span>
        </div>
    </div>

	<div class="manage-list-lecture-title">
        <span id="currentTitle" style="text-transform:capitalists"><?php echo $GLOBALS["TICKET_ALL_TITLE"]; ?></span>
    </div>
	
	 <!-- price1 -->
    <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["TICKET_ALL_PLAN_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleticketAlllesson0" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["TICKET_ALL_PLAN_INPUT_NAME_PLACEHOLDER"]; ?>' required>

               <!-- price -->
            <span><?php echo $GLOBALS["TICKET_ALL_PLAN_PRICE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idPriceKit0" name="Kit_name" type="text" placeholder='<?php echo $GLOBALS["TICKET_ALL_PLAN_PRICE_PLACEHOLDER"]; ?>' required>
    </div>
	</div>
		 <!-- price 2 -->
	 <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["TICKET_ALL_PLAN_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleticketAlllesson1" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["TICKET_ALL_PLAN_INPUT_NAME_PLACEHOLDER"]; ?>' required>

               <!-- price -->
            <span><?php echo $GLOBALS["KIT_INPUT_PRICE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idPriceKit1" name="Kit_name" type="text" placeholder='<?php echo $GLOBALS["TICKET_ALL_PLAN_PRICE_PLACEHOLDER"]; ?>' required>
    </div>
		</div>
		
		 <!-- price 3 -->
		  <div class="manage-teacher-contain-right">
        <div class="manage-teacher-contain-right-upper">
            <!-- title -->
            <span><?php echo $GLOBALS["TICKET_ALL_PLAN_INPUT_NAME"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idTitleticketAlllesson2" name="lecture_name" type="text" placeholder='<?php echo $GLOBALS["TICKET_ALL_PLAN_INPUT_NAME_PLACEHOLDER"]; ?>' required>

               <!-- price -->
            <span><?php echo $GLOBALS["KIT_INPUT_PRICE"]; ?></span><span class="span-require"><?php echo $GLOBALS["FIELD_REQUIRE"]; ?></span>
            <input id="idPriceKit2" name="Kit_name" type="text" placeholder='<?php echo $GLOBALS["TICKET_ALL_PLAN_PRICE_PLACEHOLDER"]; ?>' required>
    </div>
		 </div>
    <div class="manage-teacher-bottom-action">
        <input type="submit" name='ticketAlllessonSubmit' value='<?php echo $GLOBALS["TICKET_ALL_SUBMIT_ADD"]; ?>' id="ticketAlllessonSubmit">
    </div>
</form>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/ckeditor5.js"></script> -->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/decoupled-document/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script> -->
<script>
    let myCurrentacaIntrolesson = [];
	
    window.onload = function() {
        myCurrentacaIntrolesson = [];
	
  if (getCurrentACtion() == dictionaryKey.editStatus) {

            //fetch từ server
            setLoadingDataticketAll(true);
            requestToSever(
                sunQRequestType.get,
                getHome(),
                null,
                getLocalStorage(dictionary.MSEC),
                function(res) {
                    setLoadingDataticketAll(false);
                    if (res.code === networkCode.success) {
                        myCurrentacaIntrolesson = [...res.data.prices];

						myCurrentacaIntrolesson.forEach((item,index)=>{
							 console.log(item);
							  //title
								document.getElementById("idTitleticketAlllesson"+index).value = item.text == null ? "" : item.text;

								//price
							   document.getElementById("idPriceKit"+index).value = item.value == null ? "" : item.value;

						});
                        console.log(res.data.prices);
                    } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setLoadingDataticketAll(dictionaryKey.ERR);
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

        } else{
			 //createQuestion(0);
			  }
		
		setInputFilter(document.getElementById("idPriceKit0"), function(value) {
		  return /^\d*?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
		});
			setInputFilter(document.getElementById("idPriceKit1"), function(value) {
		  return /^\d*?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
		});
			setInputFilter(document.getElementById("idPriceKit2"), function(value) {
		  return /^\d*?\d*$/.test(value); // Allow digits and '.' only, using a RegExp
		});
    }
	
	 //price
    document.getElementById("idTitleticketAlllesson0").addEventListener("input", function(e) {
       let tttValue = e.target.value;
        myCurrentacaIntrolesson[0].text = tttValue.escape();
    });

    document.getElementById("idPriceKit0").addEventListener("input", function(e) {
       let tttValue = e.target.value;
        myCurrentacaIntrolesson[0].value = Number.parseInt(tttValue.escape());
    });

	document.getElementById("idTitleticketAlllesson1").addEventListener("input", function(e) {
       let tttValue = e.target.value;
        myCurrentacaIntrolesson[1].text = tttValue.escape();
    });

    document.getElementById("idPriceKit1").addEventListener("input", function(e) {
       let tttValue = e.target.value;
        myCurrentacaIntrolesson[1].value = Number.parseInt(tttValue.escape());
    });
	
	document.getElementById("idTitleticketAlllesson2").addEventListener("input", function(e) {console.log(e.target.value);
       let tttValue = e.target.value;
        myCurrentacaIntrolesson[2].text = tttValue.escape();
    });

    document.getElementById("idPriceKit2").addEventListener("input", function(e) {
       let tttValue = e.target.value;
        myCurrentacaIntrolesson[2].value = Number.parseInt(tttValue.escape());
    });
    
	function checkNullInputt(val){
		return val == null || val == "";
	}
	
    //submit form
    document.getElementById("ticketAlllessonSubmit").addEventListener("click", function(e) {
        e.preventDefault();
            let titlleRequestFreeLesson = dictionaryKey.REQUEST_EDIT;
            //alert("data lên " + JSON.stringify(myCurrentticketAlllesson));
            if(checkNullInputt(myCurrentacaIntrolesson[0].text) || checkNullInputt(myCurrentacaIntrolesson[1].text) || checkNullInputt(myCurrentacaIntrolesson[2].text)){
			    SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.WRONG_TICKET_ALL_TEXT)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
			   } else if(checkNullInputt(myCurrentacaIntrolesson[0].value) || checkNullInputt(myCurrentacaIntrolesson[1].value) || checkNullInputt(myCurrentacaIntrolesson[2].value)){
				 SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.WRONG_TICKET_ALL_VALUE)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.TRY_AGAIN)
                                    .callback((result) => {
                                       
                                    })
                                    .show();
			} else{
            SunQAlert()
                .position('center')
                .title(titlleRequestFreeLesson)
                .type('success')
                .confirmButtonColor("#3B4EDC")
                .cancelButtonColor("#a8b1f5")
                .confirmButtonText(dictionaryKey.AGREE)
                .cancelButtonText(dictionaryKey.CANCEL)
                .callback((result) => {
                    if (result.value) {
                        window.scrollTo(0, 0);
                        let tempmyCurrentticketAlllesson = {};
						tempmyCurrentticketAlllesson.prices = [...myCurrentacaIntrolesson];
                        if (getCurrentACtion() == dictionaryKey.editStatus) {

                        }
						
            console.log("data lên " + JSON.stringify(tempmyCurrentticketAlllesson));
                        setLoadingDataticketAll(true);
                        requestToSever(
                            sunQRequestType.put ,
                            putPrices(),
                            tempmyCurrentticketAlllesson,
                            getLocalStorage(dictionary.MSEC),
                            function(res) {
                                setLoadingDataticketAll(false);
                                let sunqalertsuccess = dictionaryKey.TICKET_ALL_EDIT_SUCCESS;
                                if (res.code === networkCode.success) {
                                    //myCurrentTeacher = res.data;
                                    SunQAlert()
                                        .position('center')
                                        .title(sunqalertsuccess)
                                        .type('success')
                                        .confirmButtonColor("#3B4EDC")
                                        .confirmButtonText(dictionaryKey.AGREE)
                                        .callback((result) => {
										
                                            webpageRedirect(getAdminHomeURL() + "?mode=ticket&page=ticket&action=edit");
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
                                setLoadingDataticketAll(dictionaryKey.ERR);
                                let sunqalertfailed = dictionaryKey.TICKET_ALL_EDIT_FAILED;
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