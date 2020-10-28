<?php ?>
<script>
var freeLessonTemplate2Status = {
		isFetchingFreeLessonTemplate2: false, //đang load danh sách liên lạc
        isGetFreeLessonTemplate2FromServerSuccess: false,
        isGetFreeLessonTemplate2FromServerLengthGreaterThanZero: false,
        currentSelectFreeLessonTemplate2: false,
        isUploadingDataFreeLessonTemplate2: false,
        currentFreeLessonTemplate2: 0, //trang load danh sách người đăng ký 
	//kit
	isChoosingKitFreeLessonTemplate2:false,
	isFetchingKitFreeLessonTemplate2:false,
	isKitGreaterThanZero:false,
	isKitFromServerSuccess:false,
	//video
	isChoosingVideoFreeLessonTemplate2:false,
	isFetchingVideoFreeLessonTemplate2:false,
	isVideoGreaterThanZero:false,
	isVideoFromServerSuccess:false
}

var  _isFetchingFreeLessonTemplate2 = false,
     _isGetFreeLessonTemplate2FromServerSuccess = false,
     _isGetFreeLessonTemplate2FromServerLengthGreaterThanZero = false,
     _currentSelectFreeLessonTemplate2 = false,
     _isUploadingDataFreeLessonTemplate2 = false,
     _currentFreeLessonTemplate2 = 0,
	//kit
	_isChoosingKitFreeLessonTemplate2=false,
	_isFetchingKitFreeLessonTemplate2=false,
	_isKitGreaterThanZero=false,
	_isKitFromServerSuccess=false,
	//video
	_isChoosingVideoFreeLessonTemplate2=false,
	_isFetchingVideoFreeLessonTemplate2=false,
	_isVideoGreaterThanZero=false,
	_isVideoFromServerSuccess=false;
	
	//fetching FreeLessonTemplate2
    Object.defineProperty(freeLessonTemplate2Status, "isFetchingFreeLessonTemplate2", {
        get() {
            return _isFetchingFreeLessonTemplate2;
        },
        set(val) {
            _isFetchingFreeLessonTemplate2 = val;
            val ? showProgressListFreeLessonTemplate2() : hideProgressListFreeLessonTemplate2();
        }
    });

    function seFetchingFreeLessonTemplate2(val) {
        freeLessonTemplate2Status.isFetchingFreeLessonTemplate2 = val;
    }

    function getFetchingFreeLessonTemplate2() {
        return freeLessonTemplate2Status.isFetchingFreeLessonTemplate2;
    }
	
	 //get FreeLessonTemplate2 from server
    Object.defineProperty(freeLessonTemplate2Status, "isGetFreeLessonTemplate2FromServerSuccess", {
        get() {
            return _isGetFreeLessonTemplate2FromServerSuccess;
        },
        set(val) {
            _isGetFreeLessonTemplate2FromServerSuccess = val;
            val ? getListFreeLessonTemplate2Success() : getListFreeLessonTemplate2Failed();
        }
    });


    function setIsGetFreeLessonTemplate2FromServerSuccess(val) {
        freeLessonTemplate2Status.isGetFreeLessonTemplate2FromServerSuccess = val;
    }

    function getIsGetFreeLessonTemplate2FromServerSuccess() {
        return freeLessonTemplate2Status.isGetFreeLessonTemplate2FromServerSuccess;
    }

	Object.defineProperty(freeLessonTemplate2Status, "isGetFreeLessonTemplate2FromServerLengthGreaterThanZero", {
        get() {
            return _isGetFreeLessonTemplate2FromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetFreeLessonTemplate2FromServerLengthGreaterThanZero = val;
            val ? getListFreeLessonTemplate2GreaterThanZero() : getListFreeLessonTemplate2EqualToZero();
        }
    });

    function setGetFreeLessonTemplate2FromServerLengthGreaterThanZero(val) {
        freeLessonTemplate2Status.isGetFreeLessonTemplate2FromServerLengthGreaterThanZero = val;
    }

    function getGetFreeLessonTemplate2FromServerLengthGreaterThanZero() {
        return freeLessonTemplate2Status.isGetFreeLessonTemplate2FromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentFreeLessonTemplate2
    Object.defineProperty(freeLessonTemplate2Status, "currentSelectFreeLessonTemplate2", {
        get() {
            return _currentSelectFreeLessonTemplate2;
        },
        set(val) {
            _currentSelectFreeLessonTemplate2 = val;
        }
    });

    function setCurrentSelectFreeLessonTemplate2(val) {
        freeLessonTemplate2Status.currentSelectFreeLessonTemplate2 = val;
    }

    function getCurrentSelectFreeLessonTemplate2() {
        return freeLessonTemplate2Status.currentSelectFreeLessonTemplate2;
    }
	
	  //loading data isUploadingDataFreeLessonTemplate2
    Object.defineProperty(freeLessonTemplate2Status, "isUploadingDataFreeLessonTemplate2", {
        get() {
            return _isUploadingDataFreeLessonTemplate2;
        },
        set(val) {
            _isUploadingDataFreeLessonTemplate2 = val;
            val == true ? loadingDataFreeLessonTemplate2Progress() : val == false ? loadingDataFreeLessonTemplate2Done() : loadingDataFreeLessonTemplate2Error();
        }
    });

    function setLoadingDataFreeLessonTemplate2(val) {
        freeLessonTemplate2Status.isUploadingDataFreeLessonTemplate2 = val;
    }

    function getLoadingDataFreeLessonTemplate2() {
        return freeLessonTemplate2Status.isUploadingDataFreeLessonTemplate2;
    }
	
	Object.defineProperty(freeLessonTemplate2Status, "currentFreeLessonTemplate2", {
        get() {
            return _currentFreeLessonTemplate2;
        },
        set(val) {
            _currentFreeLessonTemplate2 = val;

            let dataCurrentViewFreeLessonTemplate2 = {
				service: service.qvisit,
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingFreeLessonTemplate2(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLFreeLessonFromAgeMonth(parentName.age,ageID.freelesson2.id), dataCurrentViewFreeLessonTemplate2),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingFreeLessonTemplate2(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetFreeLessonTemplate2FromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListFreeLessonTemplate2();
                            listFreeLessonTemplate2 = listFreeLessonTemplate2.concat(res.data);
                            createListFreeLessonTemplate2(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingFreeLessonTemplate2(false);
                    setIsGetFreeLessonTemplate2FromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentFreeLessonTemplate2(val) {
        freeLessonTemplate2Status.currentFreeLessonTemplate2 = val;
    }

    function getCurrentFreeLessonTemplate2() {
        return freeLessonTemplate2Status.currentFreeLessonTemplate2;
    }
	
	//kit
	Object.defineProperty(freeLessonTemplate2Status, "isFetchingKitFreeLessonTemplate2", {
        get() {
            return _isFetchingKitFreeLessonTemplate2;
        },
        set(val) {
            _isFetchingKitFreeLessonTemplate2 = val;
            val ? showProgressKitFreeLessonTemplate2() : hideProgressKitFreeLessonTemplate2();
        }
    });

    function setFetchingKitFreeLessonTemplate2(val) {
        freeLessonTemplate2Status.isFetchingKitFreeLessonTemplate2 = val;
    }

    function getFetchingKitFreeLessonTemplate2() {
        return freeLessonTemplate2Status.isFetchingKitFreeLessonTemplate2;
    }

    Object.defineProperty(freeLessonTemplate2Status, "isKitFromServerSuccess", {
        get() {
            return _isKitFromServerSuccess;
        },
        set(val) {
            _isKitFromServerSuccess = val;
            val ? getKitFreeLessonTemplate2Success() : getKitFreeLessonTemplate2Failed();
        }
    });

    function setKitFromServerSuccess(val) {
        freeLessonTemplate2Status.isKitFromServerSuccess = val;
    }

    function getKitFromServerSuccess() {
        return freeLessonTemplate2Status.isKitFromServerSuccess;
    }

    Object.defineProperty(freeLessonTemplate2Status, "isKitGreaterThanZero", {
        get() {
            return _isKitGreaterThanZero;
        },
        set(val) {
            _isKitGreaterThanZero = val;
            val ? getKitFreeLessonTemplate2GreaterThanZero() : getKitFreeLessonTemplate2EqualThanZero();
        }
    });

    function setKitGreaterThanZero(val) {
        freeLessonTemplate2Status.isKitGreaterThanZero = val;
    }

    function getKitGreaterThanZero() {
        return freeLessonTemplate2Status.isKitGreaterThanZero;
    }

    Object.defineProperty(freeLessonTemplate2Status, "isChoosingKitFreeLessonTemplate2", {
        get() {
            return _isChoosingKitFreeLessonTemplate2;
        },
        set(val) {
            _isChoosingKitFreeLessonTemplate2 = val;
            val ? document.getElementById("listKit").style.display = "flex" : document.getElementById("listKit").style.display = "none";
        }
    });

    function setChoosingKitFreeLessonTemplate2(val) {
        freeLessonTemplate2Status.isChoosingKitFreeLessonTemplate2 = val;
    }

    function getChoosingKitFreeLessonTemplate2() {
        return freeLessonTemplate2Status.isChoosingKitFreeLessonTemplate2;
    }

    //video
   Object.defineProperty(freeLessonTemplate2Status, "isFetchingVideoFreeLessonTemplate2", {
        get() {
            return _isFetchingVideoFreeLessonTemplate2;
        },
        set(val) {
            _isFetchingVideoFreeLessonTemplate2 = val;
            val ? showProgressVideoFreeLessonTemplate2() : hideProgressVideoFreeLessonTemplate2();
        }
    });

    function setFetchingVideoFreeLessonTemplate2(val) {
        freeLessonTemplate2Status.isFetchingVideoFreeLessonTemplate2 = val;
    }

    function getFetchingVideoFreeLessonTemplate2() {
        return freeLessonTemplate2Status.isFetchingVideoFreeLessonTemplate2;
    }

    Object.defineProperty(freeLessonTemplate2Status, "isVideoFromServerSuccess", {
        get() {
            return _isVideoFromServerSuccess;
        },
        set(val) {
            _isVideoFromServerSuccess = val;
            val ? getVideoFreeLessonTemplate2Success() : getVideoFreeLessonTemplate2Failed();
        }
    });

    function setVideoFromServerSuccess(val) {
        freeLessonTemplate2Status.isVideoFromServerSuccess = val;
    }

    function getVideoFromServerSuccess() {
        return freeLessonTemplate2Status.isVideoFromServerSuccess;
    }

    Object.defineProperty(freeLessonTemplate2Status, "isVideoGreaterThanZero", {
        get() {
            return _isVideoGreaterThanZero;
        },
        set(val) {
            _isVideoGreaterThanZero = val;
            val ? getVideoFreeLessonTemplate2GreaterThanZero() : getVideoFreeLessonTemplate2EqualThanZero();
        }
    });

    function setVideoGreaterThanZero(val) {
        freeLessonTemplate2Status.isVideoGreaterThanZero = val;
    }

    function getVideoGreaterThanZero() {
        return freeLessonTemplate2Status.isVideoGreaterThanZero;
    }

    Object.defineProperty(freeLessonTemplate2Status, "isChoosingVideoFreeLessonTemplate2", {
        get() {
            return _isChoosingVideoFreeLessonTemplate2;
        },
        set(val) {
            _isChoosingVideoFreeLessonTemplate2 = val;
            val ? document.getElementById("listVideo").style.display = "flex" : document.getElementById("listVideo").style.display = "none";
        }
    });

    function setChoosingVideoFreeLessonTemplate2(val) {
        freeLessonTemplate2Status.isChoosingVideoFreeLessonTemplate2 = val;
    }

    function getChoosingVideoFreeLessonTemplate2() {
        return freeLessonTemplate2Status.isChoosingVideoFreeLessonTemplate2;
    }
</script>