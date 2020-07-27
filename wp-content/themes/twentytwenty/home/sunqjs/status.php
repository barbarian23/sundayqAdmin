<?php

?>
<script>
var sunqStatus = {
	mode:"none", //offline , online , account
	isOpenMenu:false,
	isChoosingSelectTeacherMain:false,
	isFetchingLecture:false,
	isGetLectureFromServerSuccess:false,
	isGetLectureFromServerLengthGreaterThanZero:false,
	isFetchingTeacher:false,
	isGetTeacherFromServerSuccess:false,
	isGetTeacherFromServerLengthGreaterThanZero:false,
	currentSelectTeacher:-1,
	isLEctureGetTeacherGreaterThanZero:false,
	isGetLectureTeacherFromServerSuccess:false,
	isFetchingTeacherLecture:false,
	currentACtion:"",
	currentEdit:"",
	logining:false,
	isloginfailed:false,
	isUploadingDataLecture:false,
	isUploadingDataTeacher:false,
	isChoosingMultiTeacher:false,
	currentView:0,//load danh sách người đăng ký 
	loadingCurrentView:false,
	currentTeacher:0,
	currentLecture:0,
}
var _mode = "none",
	_isOpenMenu = false,
	_isChoosingSelectTeacherMain = false,
	_isFetchingLecture = false,
	_isGetLectureFromServerSuccess = false,
	_isGetLectureFromServerLengthGreaterThanZero = false,
	_isFetchingTeacher = false,
	_isGetTeacherFromServerSuccess = false,
	_isGetTeacherFromServerLengthGreaterThanZero = false,
	_currentSelectTeacher = -1,
	_isLEctureGetTeacherGreaterThanZero = false,
	_isGetLectureTeacherFromServerSuccess = false,
	_isFetchingTeacherLecture = false,
	_currentACtion = "",
	_currentEdit = "",
	_logining = false,
	_isloginfailed = false,
	_isUploadingDataLecture = false,
	_isUploadingDataTeacher = false,
	_isChoosingMultiTeacher = false,
	_currentView = 0,
	_loadingCurrentView = false,
	_currentTeacher = 0,
	_currentLecture = 0;
	
//mode setting
Object.defineProperty(sunqStatus,"mode",{
	get(){
		return _mode;
	},
	set(val){
		_mode = val;
		handleChooseMode(val);
	}
});

//open menu
Object.defineProperty(sunqStatus,"isOpenMenu",{
	get(){
		return _isOpenMenu;
	},
	set(val){
		_isOpenMenu = val;
		val ? document.getElementById("menuContent").style.display = "flex" : document.getElementById("menuContent").style.display = "none" ;
	}
});

//open choose select main teacher
Object.defineProperty(sunqStatus,"isChoosingSelectTeacherMain",{
	get(){
		return _isChoosingSelectTeacherMain;
	},
	set(val){
		_isChoosingSelectTeacherMain = val;
		val ? document.getElementById("listMainTeacher").style.display = "flex" : document.getElementById("listMainTeacher").style.display = "none" ;
	}
});

//get lecture from server success
Object.defineProperty(sunqStatus,"isGetLectureFromServerLengthGreaterThanZero",{
	get(){
		return _isGetLectureFromServerLengthGreaterThanZero;
	},
	set(val){
		_isGetLectureFromServerLengthGreaterThanZero = val;
		val ? getListLectureGreaterThanZero() : getListLectureEqualToZero();
	}
});
	
//fetching lecture
Object.defineProperty(sunqStatus,"isFetchingLecture",{
	get(){
		return _isFetchingLecture;
	},
	set(val){
		_isFetchingLecture = val;
		val ? showProgressListLecture() : hideProgressListLecture();
	}
});

//get teacher from server success
Object.defineProperty(sunqStatus,"isGetTeacherFromServerLengthGreaterThanZero ",{
	get(){
		return _isGetTeacherFromServerLengthGreaterThanZero ;
	},
	set(val){
		_isGetTeacherFromServerLengthGreaterThanZero  = val;
		val ? getListLectureGreaterThanZero() : getListLectureEqualToZero();
	}
});
	
//fetching teacher
Object.defineProperty(sunqStatus,"isFetchingTeacher",{
	get(){
		return _isFetchingTeacher ;
	},
	set(val){
		_isFetchingTeacher  = val;
		val ? showProgressListTeacher() : hideProgressListTeacher();
	}
});_currentSelectTeacher

//selectTeacher
Object.defineProperty(sunqStatus,"currentSelectTeacher",{
	get(){
		return _currentSelectTeacher ;
	},
	set(val){
		_currentSelectTeacher  = val;
	}
});

//get teacher from lecture
Object.defineProperty(sunqStatus,"isLEctureGetTeacherGreaterThanZero",{
	get(){
		return _isLEctureGetTeacherGreaterThanZero ;
	},
	set(val){
		_isLEctureGetTeacherGreaterThanZero  = val;
		val ?  getListLectureTeacherGreaterThanZero() :getListLectureTeacherEqualThanZero();
	}
});

//get teacher from lecture
Object.defineProperty(sunqStatus,"isFetchingTeacherLecture",{
	get(){
		return _isFetchingTeacherLecture ;
	},
	set(val){
		_isFetchingTeacherLecture  = val;
		val ?  showProgressListTeacherLecture() : hideProgressListTeacherLecture();
	}
});

//current action 
Object.defineProperty(sunqStatus,"currentACtion",{
	get(){
		return _currentACtion ;
	},
	set(val){
		_currentACtion  = val;
	}
});

//get lecture from server
Object.defineProperty(sunqStatus,"isGetLectureFromServerSuccess",{
	get(){
		return _isGetLectureFromServerSuccess;
	},
	set(val){
		_isGetLectureFromServerSuccess = val;
		val ? getListLectureSuccess() : getListLectureFailed();
	}
});

//get teacher from server
Object.defineProperty(sunqStatus,"isGetTeacherFromServerSuccess",{
	get(){
		return _isGetTeacherFromServerSuccess;
	},
	set(val){
		_isGetTeacherFromServerSuccess = val;
		val ? getListTeacherSuccess() : getListTeacherFailed();
	}
});

//get teacher in lecture 
Object.defineProperty(sunqStatus,"isGetLectureTeacherFromServerSuccess",{
	get(){
		return _isGetLectureTeacherFromServerSuccess;
	},
	set(val){
		_isGetLectureTeacherFromServerSuccess = val;
		val ? getListLectureTeacherSuccess() : getListLectureTeacherFailed();
	}
});	_currentEdit

//current edit
Object.defineProperty(sunqStatus,"currentEdit",{
	get(){
		return _currentEdit;
	},
	set(val){
		_currentEdit = val;
	}
});	

//logging
Object.defineProperty(sunqStatus,"logining",{
	get(){
		return _logining;
	},
	set(val){
		_logining = val;
		val ? logging() : logDone();
	}
});	


//logging failed
Object.defineProperty(sunqStatus,"isloginfailed",{
	get(){
		return _isloginfailed;
	},
	set(val){
		_isloginfailed = val;
	}
});	

//loading data _isUploadingDataLecture
Object.defineProperty(sunqStatus,"isUploadingDataLecture",{
	get(){
		return _isUploadingDataLecture;
	},
	set(val){
		_isUploadingDataLecture = val;
		val == true ? loadingDataLectureProgress() : val == false ? loadingDataLectureDone() : loadingDataLectureError();
		//val ? loadingDataLectureProgress() : loadingDataLectureDone() ;
	}
});	

//loading data isUploadingDataTeacher
Object.defineProperty(sunqStatus,"isUploadingDataTeacher",{
	get(){
		return _isUploadingDataTeacher;
	},
	set(val){
		_isUploadingDataTeacher = val;
		val == true ? loadingDataTeacherProgress() : val == false ? loadingDataTeacherDone() : loadingDataTeacherError();
		
	}
});	

//choosemultiowner
Object.defineProperty(sunqStatus,"isChoosingMultiTeacher",{
	get(){
		return _isChoosingMultiTeacher;
	},
	set(val){
		_isChoosingMultiTeacher = val;
		val == true ? chooseMultiOwwner() : chooseSingleOwwner();
		
	}
});	

//loadingCurrentView
Object.defineProperty(sunqStatus,"loadingCurrentView",{
	get(){
		return _loadingCurrentView;
	},
	set(val){
		_loadingCurrentView = val;
		val == true ? loadingDataRegisterProgress() : val == false ? loadingDataRegisterDone() :  loadingDataRegisterError();
		
	}
});	

Object.defineProperty(sunqStatus,"currentView",{
		get(){
			return _currentView;
		},
		set(val){
			_currentView = val;
			console.log(val);
			let dataCurrentViewRegister = {
				page:val,
				limit:dictionaryKey.limitRequestRegister,
			};
			setLoadingCurrentView(true);
			requestToSever(
            sunQRequestType.get,
            prepareUrlForGetThatContainsBody(getURLListAccountAdvice(),dataCurrentViewRegister),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setLoadingCurrentView(false);
                if (res.code === networkCode.success) {
                    createListRegister(res,true);
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setLoadingCurrentView(dictionaryKey.ERR);
                console.log(dictionaryKey.ERR_INFO, err);
            }
        );
			
		}
	});
	
	Object.defineProperty(sunqStatus,"currentTeacher",{
		get(){
			return _currentView;
		},
		set(val){
			_currentTeacher = val;
			
			let dataCurrentViewTeacher= {
				page:val,
				limit:dictionaryKey.limitRequestRegister,
			};
			//alert("currentTeacher",val);
		setFetchingTeacher(true);
        requestToSever(
            sunQRequestType.get,
			prepareUrlForGetThatContainsBody(getURLAllTeacher(),dataCurrentViewTeacher),
            //getURLAllTeacher(),
            null,
            getData(dictionary.MSEC),
            function(res) {
                //console.log(res);
                setFetchingTeacher(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setGetTeacherFromServerSuccess(false);
                    } else {
                        emptyTableListTeacher();
                        listTeacher = listTeacher.concat(res.data);
                        createListTeacher(res);
                    }
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setFetchingTeacher(false);
                setIsGetTeacherFromServerSuccess(false);
				//alert(err);
                console.log(dictionaryKey.ERR_INFO, err);
            }
        );
		}
	});
	
	Object.defineProperty(sunqStatus,"currentLecture",{
		get(){
			return _currentLecture;
		},
		set(val){
			_currentLecture = val;
			
			let dataCurrentViewLecture= {
				page:val,
				limit:dictionaryKey.limitRequestRegister,
			};
			
			setFetchingLecture(true);
        	requestToSever(
            sunQRequestType.get,
            //getURLAllLecture(),
            prepareUrlForGetThatContainsBody(getURLAllLecture(),dataCurrentViewLecture),
            null,
            getData(dictionary.MSEC),
            function(res) {
                setFetchingLecture(false);
                if (res.code === networkCode.success) {
                    if (res.data == null || res.data.length == 0) {
                        setGetLectureFromServerSuccess(false);
                    } else {
                        //setGetLectureFromServerSuccess(true);
                        emptyTableListLecture();
                        listLecture = listLecture.concat(res.data);
                        createListLEcture(res);
                    }
                } else if (res.code === networkCode.sessionTimeOut) {
                    makeAlertRedirect();
                }
            },
            function(err) {
                setFetchingLecture(false);
                console.log(dictionaryKey.ERR_INFO, err);
                setIsGetLectureFromServerSuccess(false);

            }
        );
			
		}
	});
	
function setLoadingCurrentView(val){
	sunqStatus.loadingCurrentView = val;
}
	
function getLoadingCurrentView(){
	return sunqStatus.loadingCurrentView;
}

	function getCurrentLecture(){
		return sunqStatus.currentLecture;
	}
	
function setCurrentLecture(val){
		sunqStatus.currentLecture = val;
	}
	
function setCurrentTeacher(val){
		sunqStatus.currentTeacher = val;
	}
	
function getCurrentTeacher(){
		return sunqStatus.currentTeacher;
	}
	
function setCurrentView(val){
		sunqStatus.currentView = val;
	}
	
function getCurrentView(){
		return sunqStatus.currentView;
	}
	
function setChoosingMultiTeacher(val){
	sunqStatus.isChoosingMultiTeacher = val;
}

function getChoosingMultiTeacher(){
	return sunqStatus.isChoosingMultiTeacher;
}
	
function setLoadingDataTeacher(val){
	sunqStatus.isUploadingDataTeacher = val;
}

function getLoadingDataTeacher(){
	return sunqStatus.isUploadingDataTeacher;
}
	
function setLoadingDataLEcture(val){
	sunqStatus.isUploadingDataLecture = val;
}

function getLoadingDataLEcture(){
	return sunqStatus.isUploadingDataLecture;
}
	
function setLogInFailed(val,iText){
	sunqStatus.isloginfailed = val;
	val ? logginFailed(iText) : loginSuccess();
}

function getLogInFailed(){
	return sunqStatus.isloginfailed;
}
	
function setLogging(val){
	sunqStatus.logining = val;
}

function getLogging(){
	return sunqStatus.logining;
}
	
function setCurrentEdit(val){
	sunqStatus.currentEdit = val;
}

function getCurrentEdit(){
	return sunqStatus.currentEdit;
}
	
function setIsGetLectureTeacherFromServerSuccess(val){
	sunqStatus.isGetLectureTeacherFromServerSuccess = val;
}

function getIsGetLectureTeacherFromServerSuccess(){
	return sunqStatus.isGetLectureTeacherFromServerSuccess;
}
	
function setIsGetTeacherFromServerSuccess(val){
	sunqStatus.isGetTeacherFromServerSuccess = val;
}

function getIsGetTeacherFromServerSuccess(){
	return sunqStatus.isGetTeacherFromServerSuccess;
}
	
function setIsGetLectureFromServerSuccess(val){
	sunqStatus.isGetLectureFromServerSuccess = val;
}

function getIsGetLectureFromServerSuccess(){
	return sunqStatus.isGetLectureFromServerSuccess;
}
	
function setCurrentACtion(val){
	sunqStatus.currentACtion = val;
}

function getCurrentACtion(){
	return sunqStatus.currentACtion;
}
	
function setFetchingTeacherLecture(val){
	sunqStatus.isFetchingTeacherLecture = val;
}

function getFetchingTeacherLecture(){
	return sunqStatus.isFetchingTeacherLecture;
}
	
function setLectureGetTeacherThanZero(val){
	sunqStatus.isLEctureGetTeacherGreaterThanZero = val;
}

function getLectureGetTeacherThanZero(){
	return sunqStatus.isLEctureGetTeacherGreaterThanZero;
}
	
function setCurrentSelectTeacher(val,item){
	sunqStatus.currentSelectTeacher = val;
	selectTeacherIndex(item);
}

function getCurrentSelectTeacher(){
	return sunqStatus.currentSelectTeacher;
}
	
function setGetTeacherFromServerLengthGreaterThanZero(val){
	sunqStatus.isGetTeacherFromServerLengthGreaterThanZero = val;
}

function getGetTeacherFromServerLengthGreaterThanZero(){
	return sunqStatus.isGetTeacherFromServerLengthGreaterThanZero;
}
	
function setFetchingTeacher(val){
	sunqStatus.isFetchingTeacher = val;
}

function getFetchingTeacher(){
	return sunqStatus.isFetchingTeacher;
}
	
function setFetchingLecture(val){
	sunqStatus.isFetchingLecture = val;
}

function getFetchingLecture(){
	return sunqStatus.isFetchingLecture;
}	

function setGetLectureFromServerSuccess(val){
	sunqStatus.isGetLectureFromServerLengthGreaterThanZero = val;
}

function getGetLectureFromServerSuccess(){
	return sunqStatus.isGetLectureFromServerLengthGreaterThanZero;
}	

function setChoosingSelectTeacherMain(val){
	sunqStatus.isChoosingSelectTeacherMain = val;
}

function getChoosingSelectTeacherMain(){
	return sunqStatus.isChoosingSelectTeacherMain;
}	
	
function setOpenMenu(val){
	sunqStatus.isOpenMenu = val;
}

function getOpenMenu(){
	return sunqStatus.isOpenMenu;
}
	
function setMode(val){
	sunqStatus.mode = val;
}

function getMode(){
	return sunqStatus.mode;
}
	
function handleChooseMode(val){
	console.log("handleChooseMode",val);
	switch(val){
		   case sunQMode.online:
		        showOnLineMode();
		   		hideOffLineMode();
		   		hideAccountMode();
		   break;
		   case sunQMode.offline:
				hideOnLineMode();
				showOffLineMode();
				hideAccountMode()
		   break;
		   case sunQMode.account:
				hideOnLineMode();
				hideOffLineMode();
				showAccountMode();
		   break;
		   case sunQMode.group:
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
