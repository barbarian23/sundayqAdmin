<?php ?>
<script>
	var accountStatus = {
		isFetchingAccount: false, //đang load danh sách account hiện tại
        isGetAccountFromServerSuccess: false,
        isGetAccountFromServerLengthGreaterThanZero: false,
        currentSelectAccount: -1, //hiện đang load
        isUploadingDataAccount: false, //load account hện tại
        currentAccount: 0, //trang load danh sách account
	};
	var _isFetchingAccount = false, //đang load danh sách account hiện tại
        _isGetAccountFromServerSuccess = false,
        _isGetAccountFromServerLengthGreaterThanZero = false,
        _currentSelectAccount = -1, //hiện đang load
        _isUploadingDataAccount = false, //load account hện tại
        _currentAccount = 0; //trang load danh sách account
	
	  //<account>

    Object.defineProperty(accountStatus, "isFetchingAccount", {
        get() {
            return _isFetchingAccount;
        },
        set(val) {
            _isFetchingAccount = val;
            val ? showProgressListAccount() : hideProgressListAccount();
        }
    });

    function setFetchingAccount(val) {
        accountStatus.isFetchingAccount = val;
    }

    function getFetchingAccount() {
        return accountStatus.isFetchingAccount;
    }

    Object.defineProperty(accountStatus, "isGetAccountFromServerSuccess", {
        get() {
            return _isGetAccountFromServerSuccess;
        },
        set(val) {
            _isGetAccountFromServerSuccess = val;
            val ? getListAccountSuccess() : getListAccountFailed();
        }
    });

    function setIsGetAccountFromServerSuccess(val) {
        accountStatus.isGetAccountFromServerSuccess = val;
    }

    function getIsGetAccountFromServerSuccess() {
        return accountStatus.isGetAccountFromServerSuccess;
    }

    Object.defineProperty(accountStatus, "isGetAccountFromServerLengthGreaterThanZero ", {
        get() {
            return _isGetAccountFromServerLengthGreaterThanZero;
        },
        set(val) {
            _isGetAccountFromServerLengthGreaterThanZero = val;
            val ? getListAccountGreaterThanZero() : getListAccountEqualToZero();
        }
    });

    function setGetAccountFromServerLengthGreaterThanZero(val) {
        accountStatus.isGetAccountFromServerLengthGreaterThanZero = val;
    }

    function getGetAccountFromServerLengthGreaterThanZero() {
        return accountStatus.isGetAccountFromServerLengthGreaterThanZero;
    }

    Object.defineProperty(accountStatus, "currentSelectAccount", {
        get() {
            return _currentSelectAccount;
        },
        set(val) {
            _currentSelectAccount = val;
        }
    });

    function setCurrentSelectAccount(val, item) {
        accountStatus.currentSelectAccount = val;
        selectAccountIndex(item);
    }

    function getCurrentSelectAccount() {
        return accountStatus.currentSelectAccount;
    }

    Object.defineProperty(accountStatus, "isUploadingDataAccount", {
        get() {
            return _isUploadingDataAccount;
        },
        set(val) {
            _isUploadingDataAccount = val;
            val == true ? loadingDataAccountProgress() : val == false ? loadingDataAccountDone() : loadingDataAccountError();

        }
    });

    function setLoadingDataAccount(val) {
        accountStatus.isUploadingDataAccount = val;
    }

    function getLoadingDataAccount() {
        return accountStatus.isUploadingDataAccount;
    }

    Object.defineProperty(accountStatus, "currentAccount", {
        get() {
            return _currentAccount;
        },
        set(val) {
            _currentAccount = val;

            let dataCurrentViewAccount = {
                page: val,
                limit: dictionaryKey.limitRequestRegister,
            };
            //alert("currentTeacher",val);
            setFetchingAccount(true);
            requestToSever(
                sunQRequestType.get,
                prepareUrlForGetThatContainsBody(getListAccount(), dataCurrentViewAccount),
                null,
                getData(dictionary.MSEC),
                function(res) {
                    //console.log(res);
                    //console.log("pre listAccount",listAccount);
                    setFetchingAccount(false);
                    if (res.code === networkCode.success) {
                        if (res.data == null || res.data.length == 0) {
                            setGetAccountFromServerLengthGreaterThanZero(false);
                        } else {
                            emptyTableListAccount();
                            listAccount = listAccount.concat(res.data);
							//console.log("new listAccount",listAccount);
                            createListAccount(res);
                        }
                    }else if (res.code === networkCode.accessDenied){
									   makeAlertPermisionDenial();
									   } else if (res.code === networkCode.sessionTimeOut) {
                        makeAlertRedirect();
                    }
                },
                function(err) {
                    setFetchingAccount(false);
                    setIsGetAccountFromServerSuccess(false);
                    //alert(err);
                    console.log(dictionaryKey.ERR_INFO, err);
                }
            );
        }
    });

    function setCurrentAccount(val) {
        accountStatus.currentAccount = val;
    }

    function getCurrentAccount() {
        return accountStatus.currentAccount;
    }

	
</script>