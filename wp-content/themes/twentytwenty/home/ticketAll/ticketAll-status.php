<?php ?>
<script>
var ticketAllStatus = {
		isFetchingticketAll: false, //đang load danh sách liên lạc
        isGetticketAllFromServerSuccess: false,
        isGetticketAllFromServerLengthGreaterThanZero: false,
        currentSelectticketAll: false,
        isUploadingDataticketAll: false,
        currentticketAll: 0, //trang load danh sách người đăng ký 
}

var  _isFetchingticketAll = false,
     _isGetticketAllFromServerSuccess = false,
     _isGetticketAllFromServerLengthGreaterThanZero = false,
     _currentSelectticketAll = false,
     _isUploadingDataticketAll = false,
     _currentticketAll = 0;
	
	//fetching ticketAll
    Object.defineProperty(ticketAllStatus, "isFetchingticketAll", {
        get() {
            return _isFetchingticketAll;``
        },
        set(val) {
            _isFetchingticketAll = val;
            val ? showProgressListticketAll() : hideProgressListticketAll();
        }
    });

    function seFetchingticketAll(val) {
        ticketAllStatus.isFetchingticketAll = val;
    }

    function getFetchingticketAll() {
        return ticketAllStatus.isFetchingticketAll;
    }
	
	 //get ticketAll from server
    Object.defineProperty(ticketAllStatus, "isGetticketAllFromServerSuccess", {
        get() {
            return _isGetticketAllFromServerSuccess;
        },
        set(val) {
            _isGetticketAllFromServerSuccess = val;
            val ? getListticketAllSuccess() : getListticketAllFailed();
        }
    });


    function setIsGetticketAllFromServerSuccess(val) {
        ticketAllStatus.isGetticketAllFromServerSuccess = val;
    }

    function getIsGetticketAllFromServerSuccess() {
        return ticketAllStatus.isGetticketAllFromServerSuccess;
    }

	Object.defineProperty(ticketAllStatus, "isGetticketAllFromServerLengthGreaterThanZero", {
        get() {
            return _isGetticketAllFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetticketAllFromServerLengthGreaterThanZero = val;
            val ? getListticketAllGreaterThanZero() : getListticketAllEqualToZero();
        }
    });

    function setGetticketAllFromServerLengthGreaterThanZero(val) {
        ticketAllStatus.isGetticketAllFromServerLengthGreaterThanZero = val;
    }

    function getGetticketAllFromServerLengthGreaterThanZero() {
        return ticketAllStatus.isGetticketAllFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentticketAll
    Object.defineProperty(ticketAllStatus, "currentSelectticketAll", {
        get() {
            return _currentSelectticketAll;
        },
        set(val) {
            _currentSelectticketAll = val;
        }
    });

    function setCurrentSelectticketAll(val) {
        ticketAllStatus.currentSelectticketAll = val;
    }

    function getCurrentSelectticketAll() {
        return ticketAllStatus.currentSelectticketAll;
    }
	
	  //loading data isUploadingDataticketAll
    Object.defineProperty(ticketAllStatus, "isUploadingDataticketAll", {
        get() {
            return _isUploadingDataticketAll;
        },
        set(val) {
            _isUploadingDataticketAll = val;
            val == true ? loadingDataticketAllProgress() : val == false ? loadingDataticketAllDone() : loadingDataticketAllError();
        }
    });

    function setLoadingDataticketAll(val) {
        ticketAllStatus.isUploadingDataticketAll = val;
    }

    function getLoadingDataticketAll() {
        return ticketAllStatus.isUploadingDataticketAll;
    }
	
	Object.defineProperty(ticketAllStatus, "currentticketAll", {
        get() {
            return _currentticketAll;
        },
        set(val) {
            _currentticketAll = val;

            let dataCurrentViewticketAll = {
				category: getticketAllpart(),
				month:0,
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingticketAll(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getURLListLesson(getCurrentEdit()), dataCurrentViewticketAll),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingticketAll(false);
                    if (res.code === networkCode.success) {//alert(JSON.stringify(res.data));
                        if (res.data == null || res.data.length == 0) {
                            setGetticketAllFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListticketAll();
                            listticketAll = listticketAll.concat(res.data);
                            createListticketAll(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingticketAll(false);
                    setIsGetticketAllFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentticketAll(val) {
        ticketAllStatus.currentticketAll = val;
    }

    function getCurrentticketAll() {
        return ticketAllStatus.currentticketAll;
    }
</script>