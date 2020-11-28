<?php ?>
<script>
	var confirmBankingStatus = {
		 isFetchingConfirmBanking: false, //đang load danh sách ConfirmBanking hiện tại
        isGetConfirmBankingFromServerSuccess: false,
        isGetConfirmBankingFromServerLengthGreaterThanZero: false,
        currentSelectConfirmBanking: -1,
        isFetchingConfirmBankingLecture: false,
        isUploadingDataConfirmBanking: false, //load ConfirmBanking hiện tại
        currentConfirmBanking: 0, //trang load danh sách ConfirmBanking
	};
	
	var _isFetchingConfirmBanking = false,
		_isChoosingSelectConfirmBankingMain = false,
        _isGetConfirmBankingFromServerSuccess = false,
        _isGetConfirmBankingFromServerLengthGreaterThanZero = false,
        _currentSelectConfirmBanking = -1,
        _isFetchingConfirmBankingLecture = false, 
		_isUploadingDataConfirmBanking = false,
		_currentConfirmBanking = 0;

	//<ConfirmBanking>
    //fetching ConfirmBanking
    Object.defineProperty(confirmBankingStatus, "isFetchingConfirmBanking", {
        get() {
            return _isFetchingConfirmBanking;
        },
        set(val) {
            _isFetchingConfirmBanking = val;
            val ? showProgressListConfirmBanking() : hideProgressListConfirmBanking();
        }
    });

    function setFetchingConfirmBanking(val) {
        confirmBankingStatus.isFetchingConfirmBanking = val;
    }

    function getFetchingConfirmBanking() {
        return confirmBankingStatus.isFetchingConfirmBanking;
    }

    //get ConfirmBanking from server
    Object.defineProperty(confirmBankingStatus, "isGetConfirmBankingFromServerSuccess", {
        get() {
            return _isGetConfirmBankingFromServerSuccess;
        },
        set(val) {
            _isGetConfirmBankingFromServerSuccess = val;
            val ? getListConfirmBankingSuccess() : getListConfirmBankingFailed();
        }
    });

    function setGetConfirmBankingFromServerSuccess(val) {
        confirmBankingStatus.isGetConfirmBankingFromServerSuccess = val;
    }

    function getGetConfirmBankingFromServerSuccess() {
        return confirmBankingStatus.isGetConfirmBankingFromServerSuccess;
    }

    //get ConfirmBanking from server success
    Object.defineProperty(confirmBankingStatus, "isGetConfirmBankingFromServerLengthGreaterThanZero ", {
        get() {
            return _isGetConfirmBankingFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetConfirmBankingFromServerLengthGreaterThanZero = val;
            val ? getListLectureGreaterThanZero() : getListLectureEqualToZero();
        }
    });

    function setGetConfirmBankingFromServerLengthGreaterThanZero(val) {
        confirmBankingStatus.isGetConfirmBankingFromServerLengthGreaterThanZero = val;
    }

    function getGetConfirmBankingFromServerLengthGreaterThanZero() {
        return confirmBankingStatus.isGetConfirmBankingFromServerLengthGreaterThanZero;
    }

    //selectConfirmBanking
    Object.defineProperty(confirmBankingStatus, "currentSelectConfirmBanking", {
        get() {
            return _currentSelectConfirmBanking;
        },
        set(val) {
            _currentSelectConfirmBanking = val;
        }
    });

    function setCurrentSelectConfirmBanking(val, item) {
        confirmBankingStatus.currentSelectConfirmBanking = val;
        selectConfirmBankingIndex(item);
    }

    function getCurrentSelectConfirmBanking() {
        return confirmBankingStatus.currentSelectConfirmBanking;
    }

    //get ConfirmBanking from lecture
    Object.defineProperty(confirmBankingStatus, "isFetchingConfirmBankingLecture", {
        get() {
            return _isFetchingConfirmBankingLecture;
        },
        set(val) {
            _isFetchingConfirmBankingLecture = val;
            val ? showProgressListConfirmBankingLecture() : hideProgressListConfirmBankingLecture();
        }
    });

    function setFetchingConfirmBankingLecture(val) {
        confirmBankingStatus.isFetchingConfirmBankingLecture = val;
    }

    function getFetchingConfirmBankingLecture() {
        return confirmBankingStatus.isFetchingConfirmBankingLecture;
    }

    //loading data isUploadingDataConfirmBanking
    Object.defineProperty(confirmBankingStatus, "isUploadingDataConfirmBanking", {
        get() {
            return _isUploadingDataConfirmBanking;
        },
        set(val) {
            _isUploadingDataConfirmBanking = val;
            val == true ? loadingDataConfirmBankingProgress() : val == false ? loadingDataConfirmBankingDone() : loadingDataConfirmBankingError();

        }
    });

    function setLoadingDataConfirmBanking(val) {
        confirmBankingStatus.isUploadingDataConfirmBanking = val;
    }

    function getLoadingDataConfirmBanking() {
        return confirmBankingStatus.isUploadingDataConfirmBanking;
    }

    Object.defineProperty(confirmBankingStatus, "currentConfirmBanking", {
        get() {
            return _currentConfirmBanking;
        },
        set(val) {
            _currentConfirmBanking = val;

            let dataCurrentViewConfirmBanking = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentConfirmBanking",val);
            setFetchingConfirmBanking(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListURLOrder(), dataCurrentViewConfirmBanking),
                //getURLAllConfirmBanking(),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    setFetchingConfirmBanking(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetConfirmBankingFromServerSuccess(false);
                        } else {
                            emptyTableListConfirmBanking();
                            listConfirmBanking = listConfirmBanking.concat(res.data);
                            createListConfirmBanking(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setFetchingConfirmBanking(false);
                    setIsGetConfirmBankingFromServerSuccess(false);
                    //alert(err);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentConfirmBanking(val) {
        confirmBankingStatus.currentConfirmBanking = val;
    }

    function getCurrentConfirmBanking() {
        return confirmBankingStatus.currentConfirmBanking;
    }

</script>