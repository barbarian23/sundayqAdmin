<?php ?>
<script>
var steamqStatus = {
		isFetchingsteamq: false, //đang load danh sách liên lạc
        isGetsteamqFromServerSuccess: false,
        isGetsteamqFromServerLengthGreaterThanZero: false,
        currentSelectsteamq: false,
        isUploadingDatasteamq: false,
        currentsteamq: 0, //trang load danh sách người đăng ký 
	//kit
	isChoosingKitsteamq:false,
	isFetchingKitsteamq:false,
	isKitGreaterThanZero:false,
	isKitFromServerSuccess:false,
	//video
	isChoosingVideosteamq:false,
	isFetchingVideosteamq:false,
	isVideoGreaterThanZero:false,
	isVideoFromServerSuccess:false,
	//question
	isChoosingQuestionsteamq:false,
	isFetchingQuestionsteamq:false,
	isQuestionGreaterThanZero:false,
	isQuestionFromServerSuccess:false,
}

var  _isFetchingsteamq = false,
     _isGetsteamqFromServerSuccess = false,
     _isGetsteamqFromServerLengthGreaterThanZero = false,
     _currentSelectsteamq = false,
     _isUploadingDatasteamq = false,
     _currentsteamq = 0,
	//kit
	_isChoosingKitsteamq=false,
	_isFetchingKitsteamq=false,
	_isKitGreaterThanZero=false,
	_isKitFromServerSuccess=false,
	//video
	_isChoosingVideosteamq=false,
	_isFetchingVideosteamq=false,
	_isVideoGreaterThanZero=false,
	_isVideoFromServerSuccess=false,
	//question
	_isChoosingQuestionsteamq=false,
	_isFetchingQuestionsteamq=false,
	_isQuestionGreaterThanZero=false,
	_isQuestionFromServerSuccess=false;
	
	//fetching steamq
    Object.defineProperty(steamqStatus, "isFetchingsteamq", {
        get() {
            return _isFetchingsteamq;
        },
        set(val) {
            _isFetchingsteamq = val;
            val ? showProgressListsteamq() : hideProgressListsteamq();
        }
    });

    function seFetchingsteamq(val) {
        steamqStatus.isFetchingsteamq = val;
    }

    function getFetchingsteamq() {
        return steamqStatus.isFetchingsteamq;
    }
	
	 //get steamq from server
    Object.defineProperty(steamqStatus, "isGetsteamqFromServerSuccess", {
        get() {
            return _isGetsteamqFromServerSuccess;
        },
        set(val) {
            _isGetsteamqFromServerSuccess = val;
            val ? getListsteamqSuccess() : getListsteamqFailed();
        }
    });


    function setIsGetsteamqFromServerSuccess(val) {
        steamqStatus.isGetsteamqFromServerSuccess = val;
    }

    function getIsGetsteamqFromServerSuccess() {
        return steamqStatus.isGetsteamqFromServerSuccess;
    }

	Object.defineProperty(steamqStatus, "isGetsteamqFromServerLengthGreaterThanZero", {
        get() {
            return _isGetsteamqFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetsteamqFromServerLengthGreaterThanZero = val;
            val ? getListsteamqGreaterThanZero() : getListsteamqEqualToZero();
        }
    });

    function setGetsteamqFromServerLengthGreaterThanZero(val) {
        steamqStatus.isGetsteamqFromServerLengthGreaterThanZero = val;
    }

    function getGetsteamqFromServerLengthGreaterThanZero() {
        return steamqStatus.isGetsteamqFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentsteamq
    Object.defineProperty(steamqStatus, "currentSelectsteamq", {
        get() {
            return _currentSelectsteamq;
        },
        set(val) {
            _currentSelectsteamq = val;
        }
    });

    function setCurrentSelectsteamq(val) {
        steamqStatus.currentSelectsteamq = val;
    }

    function getCurrentSelectsteamq() {
        return steamqStatus.currentSelectsteamq;
    }
	
	  //loading data isUploadingDatasteamq
    Object.defineProperty(steamqStatus, "isUploadingDatasteamq", {
        get() {
            return _isUploadingDatasteamq;
        },
        set(val) {
            _isUploadingDatasteamq = val;
            val == true ? loadingDatasteamqProgress() : val == false ? loadingDatasteamqDone() : loadingDatasteamqError();
        }
    });

    function setLoadingDatasteamq(val) {
        steamqStatus.isUploadingDatasteamq = val;
    }

    function getLoadingDatasteamq() {
        return steamqStatus.isUploadingDatasteamq;
    }
	
	Object.defineProperty(steamqStatus, "currentsteamq", {
        get() {
            return _currentsteamq;
        },
        set(val) {
            _currentsteamq = val;

            let dataCurrentViewsteamq = {
				category: getSteamqpart(),
				month:0,
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingsteamq(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLListLesson(getCurrentEdit()), dataCurrentViewsteamq),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingsteamq(false);
                    if (res.code === networkCode.success) {//alert(JSON.stringify(res.data));
                        if (res.data == null || res.data.length == 0) {
                            setGetsteamqFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListsteamq();
                            liststeamq = liststeamq.concat(res.data);
                            createListsteamq(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingsteamq(false);
                    setIsGetsteamqFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentsteamq(val) {
        steamqStatus.currentsteamq = val;
    }

    function getCurrentsteamq() {
        return steamqStatus.currentsteamq;
    }
	
	//kit
	Object.defineProperty(steamqStatus, "isFetchingKitsteamq", {
        get() {
            return _isFetchingKitsteamq;
        },
        set(val) {
            _isFetchingKitsteamq = val;
            val ? showProgressKitsteamq() : hideProgressKitsteamq();
        }
    });

    function setFetchingKitsteamq(val) {
        steamqStatus.isFetchingKitsteamq = val;
    }

    function getFetchingKitsteamq() {
        return steamqStatus.isFetchingKitsteamq;
    }

    Object.defineProperty(steamqStatus, "isKitFromServerSuccess", {
        get() {
            return _isKitFromServerSuccess;
        },
        set(val) {
            _isKitFromServerSuccess = val;
            val ? getKitsteamqSuccess() : getKitsteamqFailed();
        }
    });

    function setKitFromServerSuccess(val) {
        steamqStatus.isKitFromServerSuccess = val;
    }

    function getKitFromServerSuccess() {
        return steamqStatus.isKitFromServerSuccess;
    }

    Object.defineProperty(steamqStatus, "isKitGreaterThanZero", {
        get() {
            return _isKitGreaterThanZero;
        },
        set(val) {
            _isKitGreaterThanZero = val;
            val ? getKitsteamqGreaterThanZero() : getKitsteamqEqualThanZero();
        }
    });

    function setKitGreaterThanZero(val) {
        steamqStatus.isKitGreaterThanZero = val;
    }

    function getKitGreaterThanZero() {
        return steamqStatus.isKitGreaterThanZero;
    }

    Object.defineProperty(steamqStatus, "isChoosingKitsteamq", {
        get() {
            return _isChoosingKitsteamq;
        },
        set(val) {
            _isChoosingKitsteamq = val;
            val ? document.getElementById("listKit").style.display = "flex" : document.getElementById("listKit").style.display = "none";
        }
    });

    function setChoosingKitsteamq(val) {
        steamqStatus.isChoosingKitsteamq = val;
    }

    function getChoosingKitsteamq() {
        return steamqStatus.isChoosingKitsteamq;
    }

    //video
   Object.defineProperty(steamqStatus, "isFetchingVideosteamq", {
        get() {
            return _isFetchingVideosteamq;
        },
        set(val) {
            _isFetchingVideosteamq = val;
            val ? showProgressVideosteamq() : hideProgressVideosteamq();
        }
    });

    function setFetchingVideosteamq(val) {
        steamqStatus.isFetchingVideosteamq = val;
    }

    function getFetchingVideosteamq() {
        return steamqStatus.isFetchingVideosteamq;
    }

    Object.defineProperty(steamqStatus, "isVideoFromServerSuccess", {
        get() {
            return _isVideoFromServerSuccess;
        },
        set(val) {
            _isVideoFromServerSuccess = val;
            val ? getVideosteamqSuccess() : getVideosteamqFailed();
        }
    });

    function setVideoFromServerSuccess(val) {
        steamqStatus.isVideoFromServerSuccess = val;
    }

    function getVideoFromServerSuccess() {
        return steamqStatus.isVideoFromServerSuccess;
    }

    Object.defineProperty(steamqStatus, "isVideoGreaterThanZero", {
        get() {
            return _isVideoGreaterThanZero;
        },
        set(val) {
            _isVideoGreaterThanZero = val;
            val ? getVideosteamqGreaterThanZero() : getVideosteamqEqualThanZero();
        }
    });

    function setVideoGreaterThanZero(val) {
        steamqStatus.isVideoGreaterThanZero = val;
    }

    function getVideoGreaterThanZero() {
        return steamqStatus.isVideoGreaterThanZero;
    }

    Object.defineProperty(steamqStatus, "isChoosingVideosteamq", {
        get() {
            return _isChoosingVideosteamq;
        },
        set(val) {
            _isChoosingVideosteamq = val;
            val ? document.getElementById("listVideo").style.display = "flex" : document.getElementById("listVideo").style.display = "none";
        }
    });

    function setChoosingVideosteamq(val) {
        steamqStatus.isChoosingVideosteamq = val;
    }

    function getChoosingVideosteamq() {
        return steamqStatus.isChoosingVideosteamq;
    }
	
	//question
	Object.defineProperty(steamqStatus, "isChoosingQuestionsteamq", {
        get() {
            return _isChoosingQuestionsteamq;
        },
        set(val) {
            _isChoosingQuestionsteamq = val;
            val ? document.getElementById("listQuestion").style.display = "flex" : document.getElementById("listQuestion").style.display = "none";
        }
    });

    function setChoosingQuestionsteamq(val) {
        steamqStatus.isChoosingQuestionsteamq = val;
    }

    function getChoosingQuestionsteamq() {
        return steamqStatus.isChoosingQuestionsteamq;
    }
	
	Object.defineProperty(steamqStatus, "isFetchingQuestionsteamq", {
        get() {
            return _isFetchingQuestionsteamq;
        },
        set(val) {
            _isFetchingQuestionsteamq = val;
            val ? showProgressQuestionsteamq() : hideProgressQuestionsteamq();
        }
    });

    function setFetchingQuestionsteamq(val) {
        steamqStatus.isFetchingQuestionsteamq = val;
    }

    function getFetchingQuestionsteamq() {
        return steamqStatus.isFetchingQuestionsteamq;
    }
	
	 Object.defineProperty(steamqStatus, "isQuestionGreaterThanZero", {
        get() {
            return _isQuestionGreaterThanZero;
        },
        set(val) {
            _isQuestionGreaterThanZero = val;
            val ? getQuestionsteamqGreaterThanZero() : getQuestionsteamqEqualThanZero();
        }
    });

    function setQuestionGreaterThanZero(val) {
        steamqStatus.isQuestionGreaterThanZero = val;
    }

    function getQuestionGreaterThanZero() {
        return steamqStatus.isQuestionGreaterThanZero;
    }
	
	Object.defineProperty(steamqStatus, "isQuestionFromServerSuccess", {
        get() {
            return _isQuestionFromServerSuccess;
        },
        set(val) {
            _isQuestionFromServerSuccess = val;
            val ? getQuestionsteamqSuccess() : getQuestionsteamqFailed();
        }
    });

    function setQuestionFromServerSuccess(val) {
        steamqStatus.isQuestionFromServerSuccess = val;
    }

    function getQuestionFromServerSuccess() {
        return steamqStatus.isQuestionFromServerSuccess;
    }
	
</script>