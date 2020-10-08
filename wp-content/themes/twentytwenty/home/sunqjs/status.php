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
    }
    var _mode = "none",
		_page = "none",
        _isOpenMenu = false,
        
        _currentACtion = "",
        _currentEdit = "",
        _logining = false,
        _isloginfailed = false
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

	function setPage(val) {
        sunqStatus.page = val;
    }

    function getPage() {
        return sunqStatus.page;
    }
	
	function handleChoosePage(val){
		
	}
	
    function handleChooseMode(val) {
        console.log("handleChooseMode", val);
        switch (val) {
            case sunQMode.online:
                showOnLineMode();
                hideOffLineMode();
                hideAccountMode();
                break;
            case sunQMode.offline:
                hideOnLineMode();
                showOffLineMode();
                hideAccountMode();
                break;
			case sunQMode.qacademy:
				showQAcademy();
                hideOnLineMode();
                showOffLineMode();
                hideAccountMode();
                break;
			case sunQMode.qvisit:
				showQVisit();
                hideOnLineMode();
                showOffLineMode();
                hideAccountMode();
                break;
            case sunQMode.sa:
                hideOnLineMode();
                hideOffLineMode();
                showAccountMode();
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