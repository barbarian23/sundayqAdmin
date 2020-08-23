<?php ?>
<script>
var ExhibitionStatus = {
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
    Object.defineProperty(ExhibitionStatus, "isFetchingExhibition", {
        get() {
            return _isFetchingExhibition;
        },
        set(val) {
            _isFetchingExhibition = val;
            val ? showProgressListExhibition() : hideProgressListExhibition();
        }
    });

    function seFetchingExhibition(val) {
        ExhibitionStatus.isFetchingExhibition = val;
    }

    function getFetchingExhibition() {
        return ExhibitionStatus.isFetchingExhibition;
    }
	
	 //get Exhibition from server
    Object.defineProperty(ExhibitionStatus, "isGetExhibitionFromServerSuccess", {
        get() {
            return _isGetExhibitionFromServerSuccess;
        },
        set(val) {
            _isGetExhibitionFromServerSuccess = val;
            val ? getListLectureExhibition() : getListExhibitionFailed();
        }
    });


    function setIsGetExhibitionFromServerSuccess(val) {
        ExhibitionStatus.isGetExhibitionFromServerSuccess = val;
    }

    function getIsGetExhibitionFromServerSuccess() {
        return ExhibitionStatus.isGetExhibitionFromServerSuccess;
    }

	Object.defineProperty(ExhibitionStatus, "isGetExhibitionFromServerLengthGreaterThanZero", {
        get() {
            return _isGetExhibitionFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetExhibitionFromServerLengthGreaterThanZero = val;
            val ? getListExhibitionGreaterThanZero() : getListExhibitionEqualToZero();
        }
    });

    function setGetExhibitionFromServerSuccess(val) {
        ExhibitionStatus.isGetExhibitionFromServerLengthGreaterThanZero = val;
    }

    function getGetExhibitionFromServerSuccess() {
        return ExhibitionStatus.isGetExhibitionFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentExhibition
    Object.defineProperty(ExhibitionStatus, "currentSelectExhibition", {
        get() {
            return _currentSelectExhibition;
        },
        set(val) {
            _currentSelectExhibition = val;
        }
    });

    function setCurrentSelectExhibition(val) {
        ExhibitionStatus.currentSelectExhibition = val;
    }

    function getCurrentSelectExhibition() {
        return ExhibitionStatus.currentSelectExhibition;
    }
	
	  //loading data isUploadingDataExhibition
    Object.defineProperty(ExhibitionStatus, "isUploadingDataExhibition", {
        get() {
            return _isUploadingDataExhibition;
        },
        set(val) {
            _isUploadingDataExhibition = val;
            val == true ? loadingDataExhibitionProgress() : val == false ? loadingDataExhibitionDone() : loadingDataExhibitionError();
        }
    });

    function setLoadingDataExhibition(val) {
        ExhibitionStatus.isUploadingDataExhibition = val;
    }

    function getLoadingDataExhibition() {
        return ExhibitionStatus.isUploadingDataExhibition;
    }
	
	Object.defineProperty(ExhibitionStatus, "currentExhibition", {
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
        ExhibitionStatus.currentExhibition = val;
    }

    function getCurrentExhibition() {
        return ExhibitionStatus.currentExhibition;
    }
	
</script>