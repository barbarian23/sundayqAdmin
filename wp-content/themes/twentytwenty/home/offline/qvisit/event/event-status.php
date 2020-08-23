<?php ?>
<script>
var EventStatus = {
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
    Object.defineProperty(EventStatus, "isFetchingEvent", {
        get() {
            return _isFetchingEvent;
        },
        set(val) {
            _isFetchingEvent = val;
            val ? showProgressListEvent() : hideProgressListEvent();
        }
    });

    function seFetchingEvent(val) {
        EventStatus.isFetchingEvent = val;
    }

    function getFetchingEvent() {
        return EventStatus.isFetchingEvent;
    }
	
	 //get Event from server
    Object.defineProperty(EventStatus, "isGetEventFromServerSuccess", {
        get() {
            return _isGetEventFromServerSuccess;
        },
        set(val) {
            _isGetEventFromServerSuccess = val;
            val ? getListLectureEvent() : getListEventFailed();
        }
    });


    function setIsGetEventFromServerSuccess(val) {
        EventStatus.isGetEventFromServerSuccess = val;
    }

    function getIsGetEventFromServerSuccess() {
        return EventStatus.isGetEventFromServerSuccess;
    }

	Object.defineProperty(EventStatus, "isGetEventFromServerLengthGreaterThanZero", {
        get() {
            return _isGetEventFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetEventFromServerLengthGreaterThanZero = val;
            val ? getListEventGreaterThanZero() : getListEventEqualToZero();
        }
    });

    function setGetEventFromServerSuccess(val) {
        EventStatus.isGetEventFromServerLengthGreaterThanZero = val;
    }

    function getGetEventFromServerSuccess() {
        return EventStatus.isGetEventFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentEvent
    Object.defineProperty(EventStatus, "currentSelectEvent", {
        get() {
            return _currentSelectEvent;
        },
        set(val) {
            _currentSelectEvent = val;
        }
    });

    function setCurrentSelectEvent(val) {
        EventStatus.currentSelectEvent = val;
    }

    function getCurrentSelectEvent() {
        return EventStatus.currentSelectEvent;
    }
	
	  //loading data isUploadingDataEvent
    Object.defineProperty(EventStatus, "isUploadingDataEvent", {
        get() {
            return _isUploadingDataEvent;
        },
        set(val) {
            _isUploadingDataEvent = val;
            val == true ? loadingDataEventProgress() : val == false ? loadingDataEventDone() : loadingDataEventError();
        }
    });

    function setLoadingDataEvent(val) {
        EventStatus.isUploadingDataEvent = val;
    }

    function getLoadingDataEvent() {
        return EventStatus.isUploadingDataEvent;
    }
	
	Object.defineProperty(EventStatus, "currentEvent", {
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
                function(err) {
                    seFetchingEvent(false);
                    setIsGetEventFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentEvent(val) {
        EventStatus.currentEvent = val;
    }

    function getCurrentEvent() {
        return EventStatus.currentEvent;
    }
	
</script>