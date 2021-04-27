<?php ?>
<script>
var kitStatus = {
		isFetchingKit: false, //đang load danh sách liên lạc
        isGetKitFromServerSuccess: false,
        isGetKitFromServerLengthGreaterThanZero: false,
        currentSelectKit: false,
        isUploadingDataKit: false,
	    //load image
	    isChoosingVideoKit:false,
		isFetchingVideoKit:false,
		isVideoKitGreaterThanZero:false,
		isVideoKitFromServerSuccess:false,
	
        currentKit: 0, //trang load danh sách người đăng ký 
		stepUploadingVideo: 0,// 0 upload tên hoặc sửa tên, 1 upload video hoặc sửa tên video
	    currentStatusKit:0, //0 là đang ở trạng thái mới tạo video - 1 là trạng thái đã tạo xong video nhưng chưa upload - 2 là trạng thái đã hoàn thiện video
}

var  _isFetchingKit = false,
     _isGetKitFromServerSuccess = false,
     _isGetKitFromServerLengthGreaterThanZero = false,
     _currentSelectKit = false,
     _isUploadingDataKit = false,
     _currentKit = 0,
	_stepUploadingVideo = 0,
	_currentStatusKit = 0;;
	
	//fetching Upload video
    Object.defineProperty(kitStatus, "isFetchingKit", {
        get() {
            return _isFetchingKit;
        },
        set(val) {
            _isFetchingKit = val;
            val ? showProgressListKit() : hideProgressListKit();
        }
    });

    function seFetchingKit(val) {
        kitStatus.isFetchingKit = val;
    }

    function getFetchingKit() {
        return kitStatus.isFetchingKit;
    }
	
	 //get Kit from server
    Object.defineProperty(kitStatus, "isGetKitFromServerSuccess", {
        get() {
            return _isGetKitFromServerSuccess;
        },
        set(val) {
            _isGetKitFromServerSuccess = val;
            val ? getListKitSuccess() : getListKitFailed();
        }
    });


    function setIsGetKitFromServerSuccess(val) {
        kitStatus.isGetKitFromServerSuccess = val;
    }

    function getIsGetKitFromServerSuccess() {
        return kitStatus.isGetKitFromServerSuccess;
    }

	Object.defineProperty(kitStatus, "isGetKitFromServerLengthGreaterThanZero", {
        get() {
            return _isGetKitFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetKitFromServerLengthGreaterThanZero = val;
            val ? getListKitGreaterThanZero() : getListKitEqualToZero();
        }
    });

    function setGetKitFromServerSuccess(val) {
        kitStatus.isGetKitFromServerLengthGreaterThanZero = val;
    }

    function getGetKitFromServerSuccess() {
        return kitStatus.isGetKitFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentKit
    Object.defineProperty(kitStatus, "currentSelectKit", {
        get() {
            return _currentSelectKit;
        },
        set(val) {
            _currentSelectKit = val;
        }
    });

    function setCurrentSelectKit(val) {
        kitStatus.currentSelectKit = val;
    }

    function getCurrentSelectKit() {
        return kitStatus.currentSelectKit;
    }
	
	  //loading data isUploadingDataKit
    Object.defineProperty(kitStatus, "isUploadingDataKit", {
        get() {
            return _isUploadingDataKit;
        },
        set(val) {
            _isUploadingDataKit = val;
            val == true ? loadingDataKitProgress() : val == false ? loadingDataKitDone() : loadingDataKitError();
        }
    });

    function setLoadingDataKit(val) {
        kitStatus.isUploadingDataKit = val;
    }

    function getLoadingDataKit() {
        return kitStatus.isUploadingDataKit;
    }
	
	//image
	Object.defineProperty(kitStatus, "isFetchingVideoKit", {
        get() {
            return _isFetchingVideoKit;
        },
        set(val) {
            _isFetchingVideoKit = val;
            val ? showProgressVideoKit() : hideProgressVideoKit();
        }
    });

    function setFetchingVideoKit(val) {
        kitStatus.isFetchingVideoKit = val;
    }

    function getFetchingVideoKit() {
        return kitStatus.isFetchingVideoKit;
    }

    Object.defineProperty(kitStatus, "isVideoKitFromServerSuccess", {
        get() {
            return _isVideoKitFromServerSuccess;
        },
        set(val) {
            _isVideoKitFromServerSuccess = val;
            val ? getVideoKitSuccess() : getVideoKitFailed();
        }
    });

    function setVideoKitFromServerSuccess(val) {
        kitStatus.isVideoKitFromServerSuccess = val;
    }

    function getVideoKitFromServerSuccess() {
        return kitStatus.isVideoKitFromServerSuccess;
    }

    Object.defineProperty(kitStatus, "isKitGreaterThanZero", {
        get() {
            return _isKitGreaterThanZero;
        },
        set(val) {
            _isKitGreaterThanZero = val;
            val ? getVideoKitThanZero() : getVideoKitEqualThanZero();
        }
    });

    function setKitGreaterThanZero(val) {
        kitStatus.isKitGreaterThanZero = val;
    }

    function getKitGreaterThanZero() {
        return kitStatus.isKitGreaterThanZero;
    }

    Object.defineProperty(kitStatus, "isChoosingVideoKit", {
        get() {
            return _isChoosingVideoKit;
        },
        set(val) {
            _isChoosingVideoKit = val;
            val ? document.getElementById("listKit").style.display = "flex" : document.getElementById("listKit").style.display = "none";
        }
    });

    function setChoosingVideoKit(val) {
        kitStatus.isChoosingVideoKit = val;
    }

    function getChoosingVideoKit() {
        return kitStatus.isChoosingVideoKit;
    }

    //image

	Object.defineProperty(kitStatus, "currentKit", {
        get() {
            return _currentKit;
        },
        set(val) {
            _currentKit = val;

            let dataCurrentViewKit = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingKit(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLListKit(), dataCurrentViewKit),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingKit(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
							console.log("no video");
                            	setGetKitFromServerSuccess(false);
							
                        } else {
                            emptyTableListKit();
                            listKit = listKit.concat(res.data);
                            createListKit(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingKit(false);
                    setIsGetKitFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentKit(val) {
        kitStatus.currentKit = val;
    }

    function getCurrentKit() {
        return kitStatus.currentKit;
    }
	
	 //stepUploadingVideo
    Object.defineProperty(kitStatus, "stepUploadingVideo", {
        get() {
            return _stepUploadingVideo;
        },
        set(val) {
            _stepUploadingVideo = val;
			val == 0 ? transctionToInitVideo() : transctionToKit();
        }
    });

    function setStepUploadingVideo(val) {
        kitStatus.stepUploadingVideo = val;
    }

    function getStepUploadingVideo() {
        return kitStatus.stepUploadingVideo;
    }
	
	Object.defineProperty(kitStatus, "currentStatusKit", {
        get() {
            return _currentStatusKit;
        },
        set(val) {
            _currentStatusKit = val;
        }
    });

    function setCurrentStatusKit(val) {
        kitStatus.currentStatusKit = val;
    }

    function getCurrentStatusKit() {
        return kitStatus.currentStatusKit;
    }
	
</script>