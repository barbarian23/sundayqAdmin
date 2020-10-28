<?php ?>
<script>
var freeLessonTemplate1Status = {
		isFetchingFreeLessonTemplate1: false, //đang load danh sách liên lạc
        isGetFreeLessonTemplate1FromServerSuccess: false,
        isGetFreeLessonTemplate1FromServerLengthGreaterThanZero: false,
        currentSelectFreeLessonTemplate1: false,
        isUploadingDataFreeLessonTemplate1: false,
        currentFreeLessonTemplate1: 0, //trang load danh sách người đăng ký 
	//kit
	isChoosingKitFreeLessonTemplate1:false,
	isFetchingKitFreeLessonTemplate1:false,
	isKitGreaterThanZero:false,
	isKitFromServerSuccess:false,
	//video
	isChoosingVideoFreeLessonTemplate1:false,
	isFetchingVideoFreeLessonTemplate1:false,
	isVideoGreaterThanZero:false,
	isVideoFromServerSuccess:false
}

var  _isFetchingFreeLessonTemplate1 = false,
     _isGetFreeLessonTemplate1FromServerSuccess = false,
     _isGetFreeLessonTemplate1FromServerLengthGreaterThanZero = false,
     _currentSelectFreeLessonTemplate1 = false,
     _isUploadingDataFreeLessonTemplate1 = false,
     _currentFreeLessonTemplate1 = 0,
	//kit
	_isChoosingKitFreeLessonTemplate1=false,
	_isFetchingKitFreeLessonTemplate1=false,
	_isKitGreaterThanZero=false,
	_isKitFromServerSuccess=false,
	//video
	_isChoosingVideoFreeLessonTemplate1=false,
	_isFetchingVideoFreeLessonTemplate1=false,
	_isVideoGreaterThanZero=false,
	_isVideoFromServerSuccess=false;
	
	//fetching FreeLessonTemplate1
    Object.defineProperty(freeLessonTemplate1Status, "isFetchingFreeLessonTemplate1", {
        get() {
            return _isFetchingFreeLessonTemplate1;
        },
        set(val) {
            _isFetchingFreeLessonTemplate1 = val;
            val ? showProgressListFreeLessonTemplate1() : hideProgressListFreeLessonTemplate1();
        }
    });

    function seFetchingFreeLessonTemplate1(val) {
        freeLessonTemplate1Status.isFetchingFreeLessonTemplate1 = val;
    }

    function getFetchingFreeLessonTemplate1() {
        return freeLessonTemplate1Status.isFetchingFreeLessonTemplate1;
    }
	
	 //get FreeLessonTemplate1 from server
    Object.defineProperty(freeLessonTemplate1Status, "isGetFreeLessonTemplate1FromServerSuccess", {
        get() {
            return _isGetFreeLessonTemplate1FromServerSuccess;
        },
        set(val) {
            _isGetFreeLessonTemplate1FromServerSuccess = val;
            val ? getListFreeLessonTemplate1Success() : getListFreeLessonTemplate1Failed();
        }
    });


    function setIsGetFreeLessonTemplate1FromServerSuccess(val) {
        freeLessonTemplate1Status.isGetFreeLessonTemplate1FromServerSuccess = val;
    }

    function getIsGetFreeLessonTemplate1FromServerSuccess() {
        return freeLessonTemplate1Status.isGetFreeLessonTemplate1FromServerSuccess;
    }

	Object.defineProperty(freeLessonTemplate1Status, "isGetFreeLessonTemplate1FromServerLengthGreaterThanZero", {
        get() {
            return _isGetFreeLessonTemplate1FromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetFreeLessonTemplate1FromServerLengthGreaterThanZero = val;
            val ? getListFreeLessonTemplate1GreaterThanZero() : getListFreeLessonTemplate1EqualToZero();
        }
    });

    function setGetFreeLessonTemplate1FromServerLengthGreaterThanZero(val) {
        freeLessonTemplate1Status.isGetFreeLessonTemplate1FromServerLengthGreaterThanZero = val;
    }

    function getGetFreeLessonTemplate1FromServerLengthGreaterThanZero() {
        return freeLessonTemplate1Status.isGetFreeLessonTemplate1FromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentFreeLessonTemplate1
    Object.defineProperty(freeLessonTemplate1Status, "currentSelectFreeLessonTemplate1", {
        get() {
            return _currentSelectFreeLessonTemplate1;
        },
        set(val) {
            _currentSelectFreeLessonTemplate1 = val;
        }
    });

    function setCurrentSelectFreeLessonTemplate1(val) {
        freeLessonTemplate1Status.currentSelectFreeLessonTemplate1 = val;
    }

    function getCurrentSelectFreeLessonTemplate1() {
        return freeLessonTemplate1Status.currentSelectFreeLessonTemplate1;
    }
	
	  //loading data isUploadingDataFreeLessonTemplate1
    Object.defineProperty(freeLessonTemplate1Status, "isUploadingDataFreeLessonTemplate1", {
        get() {
            return _isUploadingDataFreeLessonTemplate1;
        },
        set(val) {
            _isUploadingDataFreeLessonTemplate1 = val;
            val == true ? loadingDataFreeLessonTemplate1Progress() : val == false ? loadingDataFreeLessonTemplate1Done() : loadingDataFreeLessonTemplate1Error();
        }
    });

    function setLoadingDataFreeLessonTemplate1(val) {
        freeLessonTemplate1Status.isUploadingDataFreeLessonTemplate1 = val;
    }

    function getLoadingDataFreeLessonTemplate1() {
        return freeLessonTemplate1Status.isUploadingDataFreeLessonTemplate1;
    }
	
	Object.defineProperty(freeLessonTemplate1Status, "currentFreeLessonTemplate1", {
        get() {
            return _currentFreeLessonTemplate1;
        },
        set(val) {
            _currentFreeLessonTemplate1 = val;

            let dataCurrentViewFreeLessonTemplate1 = {
				service: service.qvisit,
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingFreeLessonTemplate1(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLFreeLessonFromAgeMonth(parentName.age,ageID.freelesson1.id), dataCurrentViewFreeLessonTemplate1),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingFreeLessonTemplate1(false);
                    if (res.code === networkCode.success) {//alert(JSON.stringify(res.data));
                        if (res.data == null || res.data.length == 0) {
                            setGetFreeLessonTemplate1FromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListFreeLessonTemplate1();
                            listFreeLessonTemplate1 = listFreeLessonTemplate1.concat(res.data);
                            createListFreeLessonTemplate1(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingFreeLessonTemplate1(false);
                    setIsGetFreeLessonTemplate1FromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentFreeLessonTemplate1(val) {
        freeLessonTemplate1Status.currentFreeLessonTemplate1 = val;
    }

    function getCurrentFreeLessonTemplate1() {
        return freeLessonTemplate1Status.currentFreeLessonTemplate1;
    }
	
	//kit
	Object.defineProperty(freeLessonTemplate1Status, "isFetchingKitFreeLessonTemplate1", {
        get() {
            return _isFetchingKitFreeLessonTemplate1;
        },
        set(val) {
            _isFetchingKitFreeLessonTemplate1 = val;
            val ? showProgressKitFreeLessonTemplate1() : hideProgressKitFreeLessonTemplate1();
        }
    });

    function setFetchingKitFreeLessonTemplate1(val) {
        freeLessonTemplate1Status.isFetchingKitFreeLessonTemplate1 = val;
    }

    function getFetchingKitFreeLessonTemplate1() {
        return freeLessonTemplate1Status.isFetchingKitFreeLessonTemplate1;
    }

    Object.defineProperty(freeLessonTemplate1Status, "isKitFromServerSuccess", {
        get() {
            return _isKitFromServerSuccess;
        },
        set(val) {
            _isKitFromServerSuccess = val;
            val ? getKitFreeLessonTemplate1Success() : getKitFreeLessonTemplate1Failed();
        }
    });

    function setKitFromServerSuccess(val) {
        freeLessonTemplate1Status.isKitFromServerSuccess = val;
    }

    function getKitFromServerSuccess() {
        return freeLessonTemplate1Status.isKitFromServerSuccess;
    }

    Object.defineProperty(freeLessonTemplate1Status, "isKitGreaterThanZero", {
        get() {
            return _isKitGreaterThanZero;
        },
        set(val) {
            _isKitGreaterThanZero = val;
            val ? getKitFreeLessonTemplate1GreaterThanZero() : getKitFreeLessonTemplate1EqualThanZero();
        }
    });

    function setKitGreaterThanZero(val) {
        freeLessonTemplate1Status.isKitGreaterThanZero = val;
    }

    function getKitGreaterThanZero() {
        return freeLessonTemplate1Status.isKitGreaterThanZero;
    }

    Object.defineProperty(freeLessonTemplate1Status, "isChoosingKitFreeLessonTemplate1", {
        get() {
            return _isChoosingKitFreeLessonTemplate1;
        },
        set(val) {
            _isChoosingKitFreeLessonTemplate1 = val;
            val ? document.getElementById("listKit").style.display = "flex" : document.getElementById("listKit").style.display = "none";
        }
    });

    function setChoosingKitFreeLessonTemplate1(val) {
        freeLessonTemplate1Status.isChoosingKitFreeLessonTemplate1 = val;
    }

    function getChoosingKitFreeLessonTemplate1() {
        return freeLessonTemplate1Status.isChoosingKitFreeLessonTemplate1;
    }

    //video
   Object.defineProperty(freeLessonTemplate1Status, "isFetchingVideoFreeLessonTemplate1", {
        get() {
            return _isFetchingVideoFreeLessonTemplate1;
        },
        set(val) {
            _isFetchingVideoFreeLessonTemplate1 = val;
            val ? showProgressVideoFreeLessonTemplate1() : hideProgressVideoFreeLessonTemplate1();
        }
    });

    function setFetchingVideoFreeLessonTemplate1(val) {
        freeLessonTemplate1Status.isFetchingVideoFreeLessonTemplate1 = val;
    }

    function getFetchingVideoFreeLessonTemplate1() {
        return freeLessonTemplate1Status.isFetchingVideoFreeLessonTemplate1;
    }

    Object.defineProperty(freeLessonTemplate1Status, "isVideoFromServerSuccess", {
        get() {
            return _isVideoFromServerSuccess;
        },
        set(val) {
            _isVideoFromServerSuccess = val;
            val ? getVideoFreeLessonTemplate1Success() : getVideoFreeLessonTemplate1Failed();
        }
    });

    function setVideoFromServerSuccess(val) {
        freeLessonTemplate1Status.isVideoFromServerSuccess = val;
    }

    function getVideoFromServerSuccess() {
        return freeLessonTemplate1Status.isVideoFromServerSuccess;
    }

    Object.defineProperty(freeLessonTemplate1Status, "isVideoGreaterThanZero", {
        get() {
            return _isVideoGreaterThanZero;
        },
        set(val) {
            _isVideoGreaterThanZero = val;
            val ? getVideoFreeLessonTemplate1GreaterThanZero() : getVideoFreeLessonTemplate1EqualThanZero();
        }
    });

    function setVideoGreaterThanZero(val) {
        freeLessonTemplate1Status.isVideoGreaterThanZero = val;
    }

    function getVideoGreaterThanZero() {
        return freeLessonTemplate1Status.isVideoGreaterThanZero;
    }

    Object.defineProperty(freeLessonTemplate1Status, "isChoosingVideoFreeLessonTemplate1", {
        get() {
            return _isChoosingVideoFreeLessonTemplate1;
        },
        set(val) {
            _isChoosingVideoFreeLessonTemplate1 = val;
            val ? document.getElementById("listVideo").style.display = "flex" : document.getElementById("listVideo").style.display = "none";
        }
    });

    function setChoosingVideoFreeLessonTemplate1(val) {
        freeLessonTemplate1Status.isChoosingVideoFreeLessonTemplate1 = val;
    }

    function getChoosingVideoFreeLessonTemplate1() {
        return freeLessonTemplate1Status.isChoosingVideoFreeLessonTemplate1;
    }
</script>