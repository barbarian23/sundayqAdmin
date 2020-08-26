<?php ?>
<script>
var exhibitionStatus = {
		isFetchingExhibition: false, //đang load danh sách liên lạc
        isGetExhibitionFromServerSuccess: false,
        isGetExhibitionFromServerLengthGreaterThanZero: false,
        currentSelectExhibition: false,
        isUploadingDataExhibition: false,
        currentExhibition: 0, //trang load danh sách người đăng ký 
}

var  _isFetchingExhibition = false,
     _isGetExhibitionFromServerSuccess = false,
     _isGetExhibitionFromServerLengthGreaterThanZero = false,
     _currentSelectExhibition = false,
     _isUploadingDataExhibition = false,
     _currentExhibition = 0;
	
	//fetching Exhibition
    Object.defineProperty(exhibitionStatus, "isFetchingExhibition", {
        get() {
            return _isFetchingExhibition;
        },
        set(val) {
            _isFetchingExhibition = val;
            val ? showProgressListExhibition() : hideProgressListExhibition();
        }
    });

    function seFetchingExhibition(val) {
        exhibitionStatus.isFetchingExhibition = val;
    }

    function getFetchingExhibition() {
        return exhibitionStatus.isFetchingExhibition;
    }
	
	 //get Exhibition from server
    Object.defineProperty(exhibitionStatus, "isGetExhibitionFromServerSuccess", {
        get() {
            return _isGetExhibitionFromServerSuccess;
        },
        set(val) {
            _isGetExhibitionFromServerSuccess = val;
            val ? getListExhibitionSuccess() : getListExhibitionFailed();
        }
    });


    function setIsGetExhibitionFromServerSuccess(val) {
        exhibitionStatus.isGetExhibitionFromServerSuccess = val;
    }

    function getIsGetExhibitionFromServerSuccess() {
        return exhibitionStatus.isGetExhibitionFromServerSuccess;
    }

	Object.defineProperty(exhibitionStatus, "isGetExhibitionFromServerLengthGreaterThanZero", {
        get() {
            return _isGetExhibitionFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetExhibitionFromServerLengthGreaterThanZero = val;
            val ? getListExhibitionGreaterThanZero() : getListExhibitionEqualToZero();
        }
    });

    function setGetExhibitionFromServerSuccess(val) {
        exhibitionStatus.isGetExhibitionFromServerLengthGreaterThanZero = val;
    }

    function getGetExhibitionFromServerSuccess() {
        return exhibitionStatus.isGetExhibitionFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentExhibition
    Object.defineProperty(exhibitionStatus, "currentSelectExhibition", {
        get() {
            return _currentSelectExhibition;
        },
        set(val) {
            _currentSelectExhibition = val;
        }
    });

    function setCurrentSelectExhibition(val) {
        exhibitionStatus.currentSelectExhibition = val;
    }

    function getCurrentSelectExhibition() {
        return exhibitionStatus.currentSelectExhibition;
    }
	
	  //loading data isUploadingDataExhibition
    Object.defineProperty(exhibitionStatus, "isUploadingDataExhibition", {
        get() {
            return _isUploadingDataExhibition;
        },
        set(val) {
            _isUploadingDataExhibition = val;
            val == true ? loadingDataExhibitionProgress() : val == false ? loadingDataExhibitionDone() : loadingDataExhibitionError();
        }
    });

    function setLoadingDataExhibition(val) {
        exhibitionStatus.isUploadingDataExhibition = val;
    }

    function getLoadingDataExhibition() {
        return exhibitionStatus.isUploadingDataExhibition;
    }
	
	Object.defineProperty(exhibitionStatus, "currentExhibition", {
        get() {
            return _currentExhibition;
        },
        set(val) {
            _currentExhibition = val;

            let dataCurrentViewExhibition = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingExhibition(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListExhibition(), dataCurrentViewExhibition),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingExhibition(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetExhibitionFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListExhibition();
                            listExhibition = listExhibition.concat(res.data);
                            createListExhibition(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingExhibition(false);
                    setIsGetExhibitionFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentExhibition(val) {
        exhibitionStatus.currentExhibition = val;
    }

    function getCurrentExhibition() {
        return exhibitionStatus.currentExhibition;
    }
	
</script>