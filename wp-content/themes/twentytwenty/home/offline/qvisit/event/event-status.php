<?php ?>
<script>
var eventStatus = {
		isFetchingEvent: false, //đang load danh sách liên lạc
        isGetEventFromServerSuccess: false,
        isGetEventFromServerLengthGreaterThanZero: false,
        currentSelectEvent: false,
        isUploadingDataEvent: false,
        currentEvent: 0, //trang load danh sách người đăng ký 
}

var  _isFetchingEvent = false,
     _isGetEventFromServerSuccess = false,
     _isGetEventFromServerLengthGreaterThanZero = false,
     _currentSelectEvent = false,
     _isUploadingDataEvent = false,
     _currentEvent = 0;
	
	//fetching Event
    Object.defineProperty(eventStatus, "isFetchingEvent", {
        get() {
            return _isFetchingEvent;
        },
        set(val) {
            _isFetchingEvent = val;
            val ? showProgressListEvent() : hideProgressListEvent();
        }
    });

    function seFetchingEvent(val) {
        eventStatus.isFetchingEvent = val;
    }

    function getFetchingEvent() {
        return eventStatus.isFetchingEvent;
    }
	
	 //get Event from server
    Object.defineProperty(eventStatus, "isGetEventFromServerSuccess", {
        get() {
            return _isGetEventFromServerSuccess;
        },
        set(val) {
            _isGetEventFromServerSuccess = val;
            val ? getListEventSuccess() : getListEventFailed();
        }
    });


    function setIsGetEventFromServerSuccess(val) {
        eventStatus.isGetEventFromServerSuccess = val;
    }

    function getIsGetEventFromServerSuccess() {
        return eventStatus.isGetEventFromServerSuccess;
    }

	Object.defineProperty(eventStatus, "isGetEventFromServerLengthGreaterThanZero", {
        get() {
            return _isGetEventFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetEventFromServerLengthGreaterThanZero = val;
            val ? getListEventGreaterThanZero() : getListEventEqualToZero();
        }
    });

    function setGetEventFromServerSuccess(val) {
        eventStatus.isGetEventFromServerLengthGreaterThanZero = val;
    }

    function getGetEventFromServerSuccess() {
        return eventStatus.isGetEventFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentEvent
    Object.defineProperty(eventStatus, "currentSelectEvent", {
        get() {
            return _currentSelectEvent;
        },
        set(val) {
            _currentSelectEvent = val;
        }
    });

    function setCurrentSelectEvent(val) {
        eventStatus.currentSelectEvent = val;
    }

    function getCurrentSelectEvent() {
        return eventStatus.currentSelectEvent;
    }
	
	  //loading data isUploadingDataEvent
    Object.defineProperty(eventStatus, "isUploadingDataEvent", {
        get() {
            return _isUploadingDataEvent;
        },
        set(val) {
            _isUploadingDataEvent = val;
            val == true ? loadingDataEventProgress() : val == false ? loadingDataEventDone() : loadingDataEventError();
        }
    });

    function setLoadingDataEvent(val) {
        eventStatus.isUploadingDataEvent = val;
    }

    function getLoadingDataEvent() {
        return eventStatus.isUploadingDataEvent;
    }
	
	Object.defineProperty(eventStatus, "currentEvent", {
        get() {
            return _currentEvent;
        },
        set(val) {
            _currentEvent = val;

            let dataCurrentViewEvent = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingEvent(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListEvent(), dataCurrentViewEvent),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingEvent(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetEventFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListEvent();
                            listEvent = listEvent.concat(res.data);
                            createListEvent(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {alert(err);
                    seFetchingEvent(false);
                    setIsGetEventFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentEvent(val) {
        eventStatus.currentEvent = val;
    }

    function getCurrentEvent() {
        return eventStatus.currentEvent;
    }
	
</script>