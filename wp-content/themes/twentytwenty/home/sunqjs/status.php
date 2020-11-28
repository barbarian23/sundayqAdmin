<?php

?>
<script>
    var sunqStatus = {
        mode: "none", //offline , online , account
		page: "none",
        isOpenMenu: false,
        isChoosingSelectTeacherMain: false,
        currentACtion: "",
        currentEdit: "",
        logining: false,
        isloginfailed: false,
		month: 0
    }
    var _mode = "none",
		_page = "none",
        _isOpenMenu = false,
        
        _currentACtion = "",
        _currentEdit = "",
        _logining = false,
        _isloginfailed = false,
		_month = 0
       ;

    //mode setting
    Object.defineProperty(sunqStatus, "mode", {
        get() {
            return _mode;
        },
        set(val) {
            _mode = val;
            handleChooseMode(val);
        }
    });

	//page select
    Object.defineProperty(sunqStatus, "page", {
        get() {
            return _page;
        },
        set(val) {
            _page = val;
        }
    });
	
    //open menu
    Object.defineProperty(sunqStatus, "isOpenMenu", {
        get() {
            return _isOpenMenu;
        },
        set(val) {
            _isOpenMenu = val;
            val ? document.getElementById("menuContent").style.display = "flex" : document.getElementById("menuContent").style.display = "none";
        }
    });

    //end

    //current action 
    Object.defineProperty(sunqStatus, "currentACtion", {
        get() {
            return _currentACtion;
        },
        set(val) {
            _currentACtion = val;
        }
    });

    //current edit
    Object.defineProperty(sunqStatus, "currentEdit", {
        get() {
            return _currentEdit;
        },
        set(val) {
            _currentEdit = val;
        }
    });

    //logging
    Object.defineProperty(sunqStatus, "logining", {
        get() {
            return _logining;
        },
        set(val) {
            _logining = val;
            val ? logging() : logDone();
        }
    });


    //logging failed
    Object.defineProperty(sunqStatus, "isloginfailed", {
        get() {
            return _isloginfailed;
        },
        set(val) {
            _isloginfailed = val;
        }
    });

    function setLogInFailed(val, iText) {
        sunqStatus.isloginfailed = val;
        val ? logginFailed(iText) : loginSuccess();
    }

    function getLogInFailed() {
        return sunqStatus.isloginfailed;
    }

    function setLogging(val) {
        sunqStatus.logining = val;
    }

    function getLogging() {
        return sunqStatus.logining;
    }

    function setCurrentEdit(val) {
        sunqStatus.currentEdit = val;
    }

    function getCurrentEdit() {
        return sunqStatus.currentEdit;
    }

    function setCurrentACtion(val) {
        sunqStatus.currentACtion = val;
    }

    function getCurrentACtion() {
        return sunqStatus.currentACtion;
    }

    function setChoosingSelectTeacherMain(val) {
        sunqStatus.isChoosingSelectTeacherMain = val;
    }

    function getChoosingSelectTeacherMain() {
        return sunqStatus.isChoosingSelectTeacherMain;
    }

    function setOpenMenu(val) {
        sunqStatus.isOpenMenu = val;
    }

    function getOpenMenu() {
        return sunqStatus.isOpenMenu;
    }

    function setMode(val) {
        sunqStatus.mode = val;
    }

    function getMode() {
        return sunqStatus.mode;
    }

	function getMonth() {
        return sunqStatus.month;
    }

	function setMonth(val) {
        sunqStatus.month = val;
    }
	
	function setPage(val) {
        sunqStatus.page = val;
    }

    function getPage() {
        return sunqStatus.page;
    }
	
	function handleChoosePage(val){
		
	}
	
	var functionOnOff = [
		{
		    token:"online",
			on: showOnLineMode,
			off: hideOnLineMode
		},
        {
		    token:"offline",
		    on: showOffLineMode,
			off: hideOffLineMode
		},
        {
		    token:"sa",
		    on: showAccountMode,
			off: hideAccountMode
		},
        {
		    token:"chat",
		    on: showChatMode,
			off: hideChatMode
		}
	]
	
	function showThenHideMode(mode){
		functionOnOff.map(item => {
				console.log("showThenHideMode",item.token);
			if(item.token == mode){
				console.log(typeof item.on);
				item.on();
				return true;
			}else{
				item.off();
			}
		});
	}
	
    function handleChooseMode(val) {
        console.log("handleChooseMode", val);
        switch (val) {
            case sunQMode.online:
				showThenHideMode(sunQMode.online);
                break;
			case sunQMode.manageaccount:
				showManageAccount();
				showThenHideMode(sunQMode.online);
				break;
			case sunQMode.confirmbanking:
				showConfirmBanking();
				showThenHideMode(sunQMode.online);
				break;
			case sunQMode.useraccount:
				showAccountUser();
				showThenHideMode(sunQMode.online); 
				break;
			case sunQMode.upload:
				showUpload();
				showThenHideMode(sunQMode.online);
                break;	
			case sunQMode.freeq://kit
				showFreeQ();
				showThenHideMode(sunQMode.online);
                break;
				//lesson1
			case sunQMode.freeqlesson1:
				showFreeQLesson1();
				showThenHideMode(sunQMode.online);
                break
				//lesson2
			case sunQMode.freeqlesson2:
				showFreeQLesson2();
				showThenHideMode(sunQMode.online);
                break
				//lesson3
			case sunQMode.freeqlesson3:
				showFreeQLesson3();
				showThenHideMode(sunQMode.online);
                break
            case sunQMode.offline:
				showThenHideMode(sunQMode.offline);
                break;
			case sunQMode.qacademy:
				showQAcademy();
				showThenHideMode(sunQMode.offline);
                break;
			case sunQMode.qvisit:
				showQVisit();
				showThenHideMode(sunQMode.offline);
                break;
            case sunQMode.sa:
                showThenHideMode(sunQMode.sa);
				break;
            case sunQMode.chat:
                showThenHideMode(sunQMode.chat);
                break;
            default:
                break;
        }
        /*
        if (val == sunQMode.offline){
        	showOffLineMode();
        	} else {
        		hideOnlineMode()
        	}
        */
        // ? (showOffLineMode(), hideOnlineMode()) :  (hideOfflineMode(), showOnlineMode());
    }
</script>