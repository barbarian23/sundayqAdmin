<?php ?>
<script>
var ticketStatus = {
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
    Object.defineProperty(ticketStatus, "isFetchingTicket", {
        get() {
            return _isFetchingTicket;
        },
        set(val) {
            _isFetchingTicket = val;
            val ? showProgressListTicket() : hideProgressListTicket();
        }
    });

    function seFetchingTicket(val) {
        ticketStatus.isFetchingTicket = val;
    }

    function getFetchingTicket() {
        return ticketStatus.isFetchingTicket;
    }
	
	 //get Ticket from server
    Object.defineProperty(ticketStatus, "isGetTicketFromServerSuccess", {
        get() {
            return _isGetTicketFromServerSuccess;
        },
        set(val) {
            _isGetTicketFromServerSuccess = val;
            val ? getListTicketSuccess() : getListTicketFailed();
        }
    });


    function setIsGetTicketFromServerSuccess(val) {
        ticketStatus.isGetTicketFromServerSuccess = val;
    }

    function getIsGetTicketFromServerSuccess() {
        return ticketStatus.isGetTicketFromServerSuccess;
    }

	Object.defineProperty(ticketStatus, "isGetTicketFromServerLengthGreaterThanZero", {
        get() {
            return _isGetTicketFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetTicketFromServerLengthGreaterThanZero = val;
            val ? getListTicketGreaterThanZero() : getListTicketEqualToZero();
        }
    });

    function setGetTicketFromServerSuccess(val) {
        ticketStatus.isGetTicketFromServerLengthGreaterThanZero = val;
    }

    function getGetTicketFromServerSuccess() {
        return ticketStatus.isGetTicketFromServerLengthGreaterThanZero;
    }
	
	 //loadingCurrentTicket
    Object.defineProperty(ticketStatus, "currentSelectTicket", {
        get() {
            return _currentSelectTicket;
        },
        set(val) {
            _currentSelectTicket = val;
        }
    });

    function setCurrentSelectTicket(val) {
        ticketStatus.currentSelectTicket = val;
    }

    function getCurrentSelectTicket() {
        return ticketStatus.currentSelectTicket;
    }
	
	  //loading data isUploadingDataTicket
    Object.defineProperty(ticketStatus, "isUploadingDataTicket", {
        get() {
            return _isUploadingDataTicket;
        },
        set(val) {
            _isUploadingDataTicket = val;
            val == true ? loadingDataTicketProgress() : val == false ? loadingDataTicketDone() : loadingDataTicketError();
        }
    });

    function setLoadingDataTicket(val) {
        ticketStatus.isUploadingDataTicket = val;
    }

    function getLoadingDataTicket() {
        return ticketStatus.isUploadingDataTicket;
    }
	
	Object.defineProperty(ticketStatus, "currentTicket", {
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
                            setGetTicketFromServerSuccess(false);
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
        ticketStatus.currentTicket = val;
    }

    function getCurrentTicket() {
        return ticketStatus.currentTicket;
    }
	
</script>