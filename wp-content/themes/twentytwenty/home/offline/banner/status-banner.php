<?php ?>
<script>
var bannerStatus = {
		isFetchingbanner: false, //đang load danh sách liên lạc
        isGetbannerFromServerSuccess: false,
        isGetbannerFromServerLengthGreaterThanZero: false,
        currentSelectbanner: false,
        isUploadingDatabanner: false,
        currentbanner: 0, //trang load danh sách người đăng ký 
	//kit
	isChoosingKitbanner:false,
	isFetchingKitbanner:false,
	isKitGreaterThanZero:false,
	isKitFromServerSuccess:false,
	//video
	isChoosingVideobanner:false,
	isFetchingVideobanner:false,
	isVideoGreaterThanZero:false,
	isVideoFromServerSuccess:false,
	//question
	isChoosingQuestionbanner:false,
	isFetchingQuestionbanner:false,
	isQuestionGreaterThanZero:false,
	isQuestionFromServerSuccess:false,
}

var  _isFetchingbanner = false,
     _isGetbannerFromServerSuccess = false,
     _isGetbannerFromServerLengthGreaterThanZero = false,
     _currentSelectbanner = false,
     _isUploadingDatabanner = false,
     _currentbanner = 0,
	//kit
	_isChoosingKitbanner=false,
	_isFetchingKitbanner=false,
	_isKitGreaterThanZero=false,
	_isKitFromServerSuccess=false,
	//video
	_isChoosingVideobanner=false,
	_isFetchingVideobanner=false,
	_isVideoGreaterThanZero=false,
	_isVideoFromServerSuccess=false,
	//question
	_isChoosingQuestionbanner=false,
	_isFetchingQuestionbanner=false,
	_isQuestionGreaterThanZero=false,
	_isQuestionFromServerSuccess=false;
	
	//fetching banner
    Object.defineProperty(bannerStatus, "isFetchingbanner", {
        get() {
            return _isFetchingbanner;
        },
        set(val) {
            _isFetchingbanner = val;
            val ? showProgressListbanner() : hideProgressListbanner();
        }
    });

    function seFetchingbanner(val) {
        bannerStatus.isFetchingbanner = val;
    }

    function getFetchingbanner() {
        return bannerStatus.isFetchingbanner;
    }
	
	 //get banner from server
    Object.defineProperty(bannerStatus, "isGetbannerFromServerSuccess", {
        get() {
            return _isGetbannerFromServerSuccess;
        },
        set(val) {
            _isGetbannerFromServerSuccess = val;
            val ? getListbannerSuccess() : getListbannerFailed();
        }
    });


    function setIsGetbannerFromServerSuccess(val) {
        bannerStatus.isGetbannerFromServerSuccess = val;
    }

    function getIsGetbannerFromServerSuccess() {
        return bannerStatus.isGetbannerFromServerSuccess;
    }

	Object.defineProperty(bannerStatus, "isGetbannerFromServerLengthGreaterThanZero", {
        get() {
            return _isGetbannerFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetbannerFromServerLengthGreaterThanZero = val;
            val ? getListbannerGreaterThanZero() : getListbannerEqualToZero();
        }
    });

    function setGetbannerFromServerLengthGreaterThanZero(val) {
        bannerStatus.isGetbannerFromServerLengthGreaterThanZero = val;
    }

    function getGetbannerFromServerLengthGreaterThanZero() {
        return bannerStatus.isGetbannerFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentbanner
    Object.defineProperty(bannerStatus, "currentSelectbanner", {
        get() {
            return _currentSelectbanner;
        },
        set(val) {
            _currentSelectbanner = val;
        }
    });

    function setCurrentSelectbanner(val) {
        bannerStatus.currentSelectbanner = val;
    }

    function getCurrentSelectbanner() {
        return bannerStatus.currentSelectbanner;
    }
	
	  //loading data isUploadingDatabanner
    Object.defineProperty(bannerStatus, "isUploadingDatabanner", {
        get() {
            return _isUploadingDatabanner;
        },
        set(val) {
            _isUploadingDatabanner = val;
            val == true ? loadingDatabannerProgress() : val == false ? loadingDatabannerDone() : loadingDatabannerError();
        }
    });

    function setLoadingDatabanner(val) {
        bannerStatus.isUploadingDatabanner = val;
    }

    function getLoadingDatabanner() {
        return bannerStatus.isUploadingDatabanner;
    }
	
	Object.defineProperty(bannerStatus, "currentbanner", {
        get() {
            return _currentbanner;
        },
        set(val) {
            _currentbanner = val;

            let dataCurrentViewbanner = {
				category: getbannerpart(),
				month:0,
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingbanner(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLListLesson(getCurrentEdit()), dataCurrentViewbanner),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingbanner(false);
                    if (res.code === networkCode.success) {//alert(JSON.stringify(res.data));
                        if (res.data == null || res.data.length == 0) {
                            setGetbannerFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListbanner();
                            listbanner = listbanner.concat(res.data);
                            createListbanner(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingbanner(false);
                    setIsGetbannerFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentbanner(val) {
        bannerStatus.currentbanner = val;
    }

    function getCurrentbanner() {
        return bannerStatus.currentbanner;
    }
	
	//kit
	Object.defineProperty(bannerStatus, "isFetchingKitbanner", {
        get() {
            return _isFetchingKitbanner;
        },
        set(val) {
            _isFetchingKitbanner = val;
            val ? showProgressKitbanner() : hideProgressKitbanner();
        }
    });

    function setFetchingKitbanner(val) {
        bannerStatus.isFetchingKitbanner = val;
    }

    function getFetchingKitbanner() {
        return bannerStatus.isFetchingKitbanner;
    }

    Object.defineProperty(bannerStatus, "isKitFromServerSuccess", {
        get() {
            return _isKitFromServerSuccess;
        },
        set(val) {
            _isKitFromServerSuccess = val;
            val ? getKitbannerSuccess() : getKitbannerFailed();
        }
    });

    function setKitFromServerSuccess(val) {
        bannerStatus.isKitFromServerSuccess = val;
    }

    function getKitFromServerSuccess() {
        return bannerStatus.isKitFromServerSuccess;
    }

    Object.defineProperty(bannerStatus, "isKitGreaterThanZero", {
        get() {
            return _isKitGreaterThanZero;
        },
        set(val) {
            _isKitGreaterThanZero = val;
            val ? getKitbannerGreaterThanZero() : getKitbannerEqualThanZero();
        }
    });

    function setKitGreaterThanZero(val) {
        bannerStatus.isKitGreaterThanZero = val;
    }

    function getKitGreaterThanZero() {
        return bannerStatus.isKitGreaterThanZero;
    }

    Object.defineProperty(bannerStatus, "isChoosingKitbanner", {
        get() {
            return _isChoosingKitbanner;
        },
        set(val) {
            _isChoosingKitbanner = val;
            val ? document.getElementById("listKit").style.display = "flex" : document.getElementById("listKit").style.display = "none";
        }
    });

    function setChoosingKitbanner(val) {
        bannerStatus.isChoosingKitbanner = val;
    }

    function getChoosingKitbanner() {
        return bannerStatus.isChoosingKitbanner;
    }

    //video
   Object.defineProperty(bannerStatus, "isFetchingVideobanner", {
        get() {
            return _isFetchingVideobanner;
        },
        set(val) {
            _isFetchingVideobanner = val;
            val ? showProgressVideobanner() : hideProgressVideobanner();
        }
    });

    function setFetchingVideobanner(val) {
        bannerStatus.isFetchingVideobanner = val;
    }

    function getFetchingVideobanner() {
        return bannerStatus.isFetchingVideobanner;
    }

    Object.defineProperty(bannerStatus, "isVideoFromServerSuccess", {
        get() {
            return _isVideoFromServerSuccess;
        },
        set(val) {
            _isVideoFromServerSuccess = val;
            val ? getVideobannerSuccess() : getVideobannerFailed();
        }
    });

    function setVideoFromServerSuccess(val) {
        bannerStatus.isVideoFromServerSuccess = val;
    }

    function getVideoFromServerSuccess() {
        return bannerStatus.isVideoFromServerSuccess;
    }

    Object.defineProperty(bannerStatus, "isVideoGreaterThanZero", {
        get() {
            return _isVideoGreaterThanZero;
        },
        set(val) {
            _isVideoGreaterThanZero = val;
            val ? getVideobannerGreaterThanZero() : getVideobannerEqualThanZero();
        }
    });

    function setVideoGreaterThanZero(val) {
        bannerStatus.isVideoGreaterThanZero = val;
    }

    function getVideoGreaterThanZero() {
        return bannerStatus.isVideoGreaterThanZero;
    }

    Object.defineProperty(bannerStatus, "isChoosingVideobanner", {
        get() {
            return _isChoosingVideobanner;
        },
        set(val) {
            _isChoosingVideobanner = val;
            val ? document.getElementById("listVideo").style.display = "flex" : document.getElementById("listVideo").style.display = "none";
        }
    });

    function setChoosingVideobanner(val) {
        bannerStatus.isChoosingVideobanner = val;
    }

    function getChoosingVideobanner() {
        return bannerStatus.isChoosingVideobanner;
    }
	
	//question
	Object.defineProperty(bannerStatus, "isChoosingQuestionbanner", {
        get() {
            return _isChoosingQuestionbanner;
        },
        set(val) {
            _isChoosingQuestionbanner = val;
            val ? document.getElementById("listQuestion").style.display = "flex" : document.getElementById("listQuestion").style.display = "none";
        }
    });

    function setChoosingQuestionbanner(val) {
        bannerStatus.isChoosingQuestionbanner = val;
    }

    function getChoosingQuestionbanner() {
        return bannerStatus.isChoosingQuestionbanner;
    }
	
	Object.defineProperty(bannerStatus, "isFetchingQuestionbanner", {
        get() {
            return _isFetchingQuestionbanner;
        },
        set(val) {
            _isFetchingQuestionbanner = val;
            val ? showProgressQuestionbanner() : hideProgressQuestionbanner();
        }
    });

    function setFetchingQuestionbanner(val) {
        bannerStatus.isFetchingQuestionbanner = val;
    }

    function getFetchingQuestionbanner() {
        return bannerStatus.isFetchingQuestionbanner;
    }
	
	 Object.defineProperty(bannerStatus, "isQuestionGreaterThanZero", {
        get() {
            return _isQuestionGreaterThanZero;
        },
        set(val) {
            _isQuestionGreaterThanZero = val;
            val ? getQuestionbannerGreaterThanZero() : getQuestionbannerEqualThanZero();
        }
    });

    function setQuestionGreaterThanZero(val) {
        bannerStatus.isQuestionGreaterThanZero = val;
    }

    function getQuestionGreaterThanZero() {
        return bannerStatus.isQuestionGreaterThanZero;
    }
	
	Object.defineProperty(bannerStatus, "isQuestionFromServerSuccess", {
        get() {
            return _isQuestionFromServerSuccess;
        },
        set(val) {
            _isQuestionFromServerSuccess = val;
            val ? getQuestionbannerSuccess() : getQuestionbannerFailed();
        }
    });

    function setQuestionFromServerSuccess(val) {
        bannerStatus.isQuestionFromServerSuccess = val;
    }

    function getQuestionFromServerSuccess() {
        return bannerStatus.isQuestionFromServerSuccess;
    }
	
</script>