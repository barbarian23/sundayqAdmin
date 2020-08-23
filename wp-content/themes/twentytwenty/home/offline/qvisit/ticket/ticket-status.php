<?php ?>
<script>
var TicketStatus = {
		isFetchingTicket: false, //đang load danh sách liên lạc
        isGetTicketFromServerSuccess: false,
        isGetTicketFromServerLengthGreaterThanZero: false,
        currentSelectTicket: false,
        isUploadingDataTicket: false,
        currentTicket: 0, //trang load danh sách người đăng ký 
}

var  _isFetchingTicket = false,
     _isGetTicketFromServerSuccess = false,
     _isGetTicketFromServerLengthGreaterThanZero = false,
     _currentSelectTicket = false,
     _isUploadingDataTicket = false,
     _currentTicket = 0;
	
	//fetching Ticket
    Object.defineProperty(TicketStatus, "isFetchingTicket", {
        get() {
            return _isFetchingTicket;
        },
        set(val) {
            _isFetchingTicket = val;
            val ? showProgressListTicket() : hideProgressListTicket();
        }
    });

    function seFetchingTicket(val) {
        TicketStatus.isFetchingTicket = val;
    }

    function getFetchingTicket() {
        return TicketStatus.isFetchingTicket;
    }
	
	 //get Ticket from server
    Object.defineProperty(TicketStatus, "isGetTicketFromServerSuccess", {
        get() {
            return _isGetTicketFromServerSuccess;
        },
        set(val) {
            _isGetTicketFromServerSuccess = val;
            val ? getListLectureTicket() : getListTicketFailed();
        }
    });


    function setIsGetTicketFromServerSuccess(val) {
        TicketStatus.isGetTicketFromServerSuccess = val;
    }

    function getIsGetTicketFromServerSuccess() {
        return TicketStatus.isGetTicketFromServerSuccess;
    }

	Object.defineProperty(TicketStatus, "isGetTicketFromServerLengthGreaterThanZero", {
        get() {
            return _isGetTicketFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetTicketFromServerLengthGreaterThanZero = val;
            val ? getListTicketGreaterThanZero() : getListTicketEqualToZero();
        }
    });

    function setGetTicketFromServerSuccess(val) {
        TicketStatus.isGetTicketFromServerLengthGreaterThanZero = val;
    }

    function getGetTicketFromServerSuccess() {
        return TicketStatus.isGetTicketFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentTicket
    Object.defineProperty(TicketStatus, "currentSelectTicket", {
        get() {
            return _currentSelectTicket;
        },
        set(val) {
            _currentSelectTicket = val;
        }
    });

    function setCurrentSelectTicket(val) {
        TicketStatus.currentSelectTicket = val;
    }

    function getCurrentSelectTicket() {
        return TicketStatus.currentSelectTicket;
    }
	
	  //loading data isUploadingDataTicket
    Object.defineProperty(TicketStatus, "isUploadingDataTicket", {
        get() {
            return _isUploadingDataTicket;
        },
        set(val) {
            _isUploadingDataTicket = val;
            val == true ? loadingDataTicketProgress() : val == false ? loadingDataTicketDone() : loadingDataTicketError();
        }
    });

    function setLoadingDataTicket(val) {
        TicketStatus.isUploadingDataTicket = val;
    }

    function getLoadingDataTicket() {
        return TicketStatus.isUploadingDataTicket;
    }
	
	Object.defineProperty(TicketStatus, "currentTicket", {
        get() {
            return _currentTicket;
        },
        set(val) {
            _currentTicket = val;

            let dataCurrentViewTicket = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentGroup",val);
            seFetchingTicket(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListTicket(), dataCurrentViewTicket),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    console.log(res);
                    seFetchingTicket(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetTicketFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListTicket();
                            listTicket = listTicket.concat(res.data);
                            createListTicket(res);
                        }
                    } else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   }else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    seFetchingTicket(false);
                    setIsGetTicketFromServerSuccess(false);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentTicket(val) {
        TicketStatus.currentTicket = val;
    }

    function getCurrentTicket() {
        return TicketStatus.currentTicket;
    }
	
</script>