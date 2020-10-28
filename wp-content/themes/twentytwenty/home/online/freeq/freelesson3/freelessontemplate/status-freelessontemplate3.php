<?php ?>
<script>
var freeLessonTemplate3Status = {
		isFetchingFreeLessonTemplate3: false, //đang load danh sách liên lạc
        isGetFreeLessonTemplate3FromServerSuccess: false,
        isGetFreeLessonTemplate3FromServerLengthGreaterThanZero: false,
        currentSelectFreeLessonTemplate3: false,
        isUploadingDataFreeLessonTemplate3: false,
        currentFreeLessonTemplate3: 0, //trang load danh sách người đăng ký 
	//kit
	isChoosingKitFreeLessonTemplate3:false,
	isFetchingKitFreeLessonTemplate3:false,
	isKitGreaterThanZero:false,
	isKitFromServerSuccess:false,
	//video
	isChoosingVideoFreeLessonTemplate3:false,
	isFetchingVideoFreeLessonTemplate3:false,
	isVideoGreaterThanZero:false,
	isVideoFromServerSuccess:false
}

var  _isFetchingFreeLessonTemplate3 = false,
     _isGetFreeLessonTemplate3FromServerSuccess = false,
     _isGetFreeLessonTemplate3FromServerLengthGreaterThanZero = false,
     _currentSelectFreeLessonTemplate3 = false,
     _isUploadingDataFreeLessonTemplate3 = false,
     _currentFreeLessonTemplate3 = 0,
	//kit
	_isChoosingKitFreeLessonTemplate3=false,
	_isFetchingKitFreeLessonTemplate3=false,
	_isKitGreaterThanZero=false,
	_isKitFromServerSuccess=false,
	//video
	_isChoosingVideoFreeLessonTemplate3=false,
	_isFetchingVideoFreeLessonTemplate3=false,
	_isVideoGreaterThanZero=false,
	_isVideoFromServerSuccess=false;
	
	//fetching FreeLessonTemplate3
    Object.defineProperty(freeLessonTemplate3Status, "isFetchingFreeLessonTemplate3", {
        get() {
            return _isFetchingFreeLessonTemplate3;
        },
        set(val) {
            _isFetchingFreeLessonTemplate3 = val;
            val ? showProgressListFreeLessonTemplate3() : hideProgressListFreeLessonTemplate3();
        }
    });

    function seFetchingFreeLessonTemplate3(val) {
        freeLessonTemplate3Status.isFetchingFreeLessonTemplate3 = val;
    }

    function getFetchingFreeLessonTemplate3() {
        return freeLessonTemplate3Status.isFetchingFreeLessonTemplate3;
    }
	
	 //get FreeLessonTemplate3 from server
    Object.defineProperty(freeLessonTemplate3Status, "isGetFreeLessonTemplate3FromServerSuccess", {
        get() {
            return _isGetFreeLessonTemplate3FromServerSuccess;
        },
        set(val) {
            _isGetFreeLessonTemplate3FromServerSuccess = val;
            val ? getListFreeLessonTemplate3Success() : getListFreeLessonTemplate3Failed();
        }
    });


    function setIsGetFreeLessonTemplate3FromServerSuccess(val) {
        freeLessonTemplate3Status.isGetFreeLessonTemplate3FromServerSuccess = val;
    }

    function getIsGetFreeLessonTemplate3FromServerSuccess() {
        return freeLessonTemplate3Status.isGetFreeLessonTemplate3FromServerSuccess;
    }

	Object.defineProperty(freeLessonTemplate3Status, "isGetFreeLessonTemplate3FromServerLengthGreaterThanZero", {
        get() {
            return _isGetFreeLessonTemplate3FromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetFreeLessonTemplate3FromServerLengthGreaterThanZero = val;
            val ? getListFreeLessonTemplate3GreaterThanZero() : getListFreeLessonTemplate3EqualToZero();
        }
    });

    function setGetFreeLessonTemplate3FromServerLengthGreaterThanZero(val) {
        freeLessonTemplate3Status.isGetFreeLessonTemplate3FromServerLengthGreaterThanZero = val;
    }

    function getGetFreeLessonTemplate3FromServerLengthGreaterThanZero() {
        return freeLessonTemplate3Status.isGetFreeLessonTemplate3FromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentFreeLessonTemplate3
    Object.defineProperty(freeLessonTemplate3Status, "currentSelectFreeLessonTemplate3", {
        get() {
            return _currentSelectFreeLessonTemplate3;
        },
        set(val) {
            _currentSelectFreeLessonTemplate3 = val;
        }
    });

    function setCurrentSelectFreeLessonTemplate3(val) {
        freeLessonTemplate3Status.currentSelectFreeLessonTemplate3 = val;
    }

    function getCurrentSelectFreeLessonTemplate3() {
        return freeLessonTemplate3Status.currentSelectFreeLessonTemplate3;
    }
	
	  //loading data isUploadingDataFreeLessonTemplate3
    Object.defineProperty(freeLessonTemplate3Status, "isUploadingDataFreeLessonTemplate3", {
        get() {
            return _isUploadingDataFreeLessonTemplate3;
        },
        set(val) {
            _isUploadingDataFreeLessonTemplate3 = val;
            val == true ? loadingDataFreeLessonTemplate3Progress() : val == false ? loadingDataFreeLessonTemplate3Done() : loadingDataFreeLessonTemplate3Error();
        }
    });

    function setLoadingDataFreeLessonTemplate3(val) {
        freeLessonTemplate3Status.isUploadingDataFreeLessonTemplate3 = val;
    }

    function getLoadingDataFreeLessonTemplate3() {
        return freeLessonTemplate3Status.isUploadingDataFreeLessonTemplate3;
    }
	
	Object.defineProperty(freeLessonTemplate3Status, "currentFreeLessonTemplate3", {
        get() {
            return _currentFreeLessonTemplate3;
        },
        set(val) {
            _currentFreeLessonTemplate3 = val;

            let dataCurrentViewFreeLessonTemplate3 = {
				service: service.qvisit,
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingFreeLessonTemplate3(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLFreeLessonFromAgeMonth(parentName.age,ageID.freelesson3.id), dataCurrentViewFreeLessonTemplate3),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingFreeLessonTemplate3(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetFreeLessonTemplate3FromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListFreeLessonTemplate3();
                            listFreeLessonTemplate3 = listFreeLessonTemplate3.concat(res.data);
                            createListFreeLessonTemplate3(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingFreeLessonTemplate3(false);
                    setIsGetFreeLessonTemplate3FromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentFreeLessonTemplate3(val) {
        freeLessonTemplate3Status.currentFreeLessonTemplate3 = val;
    }

    function getCurrentFreeLessonTemplate3() {
        return freeLessonTemplate3Status.currentFreeLessonTemplate3;
    }
	
	//kit
	Object.defineProperty(freeLessonTemplate3Status, "isFetchingKitFreeLessonTemplate3", {
        get() {
            return _isFetchingKitFreeLessonTemplate3;
        },
        set(val) {
            _isFetchingKitFreeLessonTemplate3 = val;
            val ? showProgressKitFreeLessonTemplate3() : hideProgressKitFreeLessonTemplate3();
        }
    });

    function setFetchingKitFreeLessonTemplate3(val) {
        freeLessonTemplate3Status.isFetchingKitFreeLessonTemplate3 = val;
    }

    function getFetchingKitFreeLessonTemplate3() {
        return freeLessonTemplate3Status.isFetchingKitFreeLessonTemplate3;
    }

    Object.defineProperty(freeLessonTemplate3Status, "isKitFromServerSuccess", {
        get() {
            return _isKitFromServerSuccess;
        },
        set(val) {
            _isKitFromServerSuccess = val;
            val ? getKitFreeLessonTemplate3Success() : getKitFreeLessonTemplate3Failed();
        }
    });

    function setKitFromServerSuccess(val) {
        freeLessonTemplate3Status.isKitFromServerSuccess = val;
    }

    function getKitFromServerSuccess() {
        return freeLessonTemplate3Status.isKitFromServerSuccess;
    }

    Object.defineProperty(freeLessonTemplate3Status, "isKitGreaterThanZero", {
        get() {
            return _isKitGreaterThanZero;
        },
        set(val) {
            _isKitGreaterThanZero = val;
            val ? getKitFreeLessonTemplate3GreaterThanZero() : getKitFreeLessonTemplate3EqualThanZero();
        }
    });

    function setKitGreaterThanZero(val) {
        freeLessonTemplate3Status.isKitGreaterThanZero = val;
    }

    function getKitGreaterThanZero() {
        return freeLessonTemplate3Status.isKitGreaterThanZero;
    }

    Object.defineProperty(freeLessonTemplate3Status, "isChoosingKitFreeLessonTemplate3", {
        get() {
            return _isChoosingKitFreeLessonTemplate3;
        },
        set(val) {
            _isChoosingKitFreeLessonTemplate3 = val;
            val ? document.getElementById("listKit").style.display = "flex" : document.getElementById("listKit").style.display = "none";
        }
    });

    function setChoosingKitFreeLessonTemplate3(val) {
        freeLessonTemplate3Status.isChoosingKitFreeLessonTemplate3 = val;
    }

    function getChoosingKitFreeLessonTemplate3() {
        return freeLessonTemplate3Status.isChoosingKitFreeLessonTemplate3;
    }

    //video
   Object.defineProperty(freeLessonTemplate3Status, "isFetchingVideoFreeLessonTemplate3", {
        get() {
            return _isFetchingVideoFreeLessonTemplate3;
        },
        set(val) {
            _isFetchingVideoFreeLessonTemplate3 = val;
            val ? showProgressVideoFreeLessonTemplate3() : hideProgressVideoFreeLessonTemplate3();
        }
    });

    function setFetchingVideoFreeLessonTemplate3(val) {
        freeLessonTemplate3Status.isFetchingVideoFreeLessonTemplate3 = val;
    }

    function getFetchingVideoFreeLessonTemplate3() {
        return freeLessonTemplate3Status.isFetchingVideoFreeLessonTemplate3;
    }

    Object.defineProperty(freeLessonTemplate3Status, "isVideoFromServerSuccess", {
        get() {
            return _isVideoFromServerSuccess;
        },
        set(val) {
            _isVideoFromServerSuccess = val;
            val ? getVideoFreeLessonTemplate3Success() : getVideoFreeLessonTemplate3Failed();
        }
    });

    function setVideoFromServerSuccess(val) {
        freeLessonTemplate3Status.isVideoFromServerSuccess = val;
    }

    function getVideoFromServerSuccess() {
        return freeLessonTemplate3Status.isVideoFromServerSuccess;
    }

    Object.defineProperty(freeLessonTemplate3Status, "isVideoGreaterThanZero", {
        get() {
            return _isVideoGreaterThanZero;
        },
        set(val) {
            _isVideoGreaterThanZero = val;
            val ? getVideoFreeLessonTemplate3GreaterThanZero() : getVideoFreeLessonTemplate3EqualThanZero();
        }
    });

    function setVideoGreaterThanZero(val) {
        freeLessonTemplate3Status.isVideoGreaterThanZero = val;
    }

    function getVideoGreaterThanZero() {
        return freeLessonTemplate3Status.isVideoGreaterThanZero;
    }

    Object.defineProperty(freeLessonTemplate3Status, "isChoosingVideoFreeLessonTemplate3", {
        get() {
            return _isChoosingVideoFreeLessonTemplate3;
        },
        set(val) {
            _isChoosingVideoFreeLessonTemplate3 = val;
            val ? document.getElementById("listVideo").style.display = "flex" : document.getElementById("listVideo").style.display = "none";
        }
    });

    function setChoosingVideoFreeLessonTemplate3(val) {
        freeLessonTemplate3Status.isChoosingVideoFreeLessonTemplate3 = val;
    }

    function getChoosingVideoFreeLessonTemplate3() {
        return freeLessonTemplate3Status.isChoosingVideoFreeLessonTemplate3;
    }
</script>