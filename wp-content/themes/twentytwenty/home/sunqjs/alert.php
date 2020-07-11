<?php
?>
<script>
	var SunQAlert = function(){
		let pos = "",
            icon = "",
            imageUrl = "",
            footer = "",
            title = "",
            text = "",
            html = "",
            type = "",
            confirmButtonColor = "",
            cancelButtonColor = "",
            confirmButtonText = "",
            cancelButtonText = "",
            callback = "",
            callbackOnclose = () => {},
            showCancelButton = false,
            input = "",
            allowOutsideClick = false,
            inputOptions = {},
            inputValidator = () => {};
        var obj = {
            position(_pos) {
                pos = _pos;
                return this;
            },
            icon(_icon) {
                icon = _icon;
                return this;
            },
            imageUrl(_imageUrl) {
                imageUrl = _imageUrl;
                return this;
            },
            title(_title) {
                title = _title;
                return this;
            },
            input(_input) {
                input = _input;
                return this;
            },
            inputOptions(_inputOptions) {
                inputOptions = _inputOptions;
                return this;
            },
            inputValidator(_inputValidator) {
                inputValidator = _inputValidator;
                return this;
            },
            text(_text) {
                text = _text;
                return this;
            },
            html(_html) {
                html = _html;
                return this;
            },
            clickOutSide(_val) {
                allowOutsideClick = _val;
                return this;
            },
            type(_type) {
                type = _type;
                return this;
            },
            footer(_footer) {
                footer = _footer;
                return this;
            },
            confirmButtonColor(_confirmButtonColor) {
                confirmButtonColor = _confirmButtonColor;
                return this;
            },
            cancelButtonColor(_cancelButtonColor) {
                cancelButtonColor = _cancelButtonColor;
                return this;
            },
            confirmButtonText(_confirmButtonText) {
                confirmButtonText = _confirmButtonText;
                return this;
            },
            cancelButtonText(_cancelButtonText) {
                cancelButtonText = _cancelButtonText;
                showCancelButton = true;
                return this;
            },
            callback(inputCallback) {
                callback = inputCallback;
                return this;
            },
            callbackClose(inputCallback) {
                callbackOnclose = inputCallback;
                return this;
            },
            show() {
                if (input == "") {
                    Swal.fire({
                        position: pos,
                        title: title,
                        text: text,
                        type: type,
                        allowOutsideClick: allowOutsideClick,
                        showCancelButton: showCancelButton,
                        confirmButtonColor: confirmButtonColor,
                        cancelButtonColor: cancelButtonColor,
                        cancelButtonText: cancelButtonText,
                        confirmButtonText: confirmButtonText,
                        onClose: callbackOnclose,
                    }).then(callback);
                } else {
                    Swal.fire({
                        position: pos,
                        title: title,
                        input: input,
                        inputOptions: inputOptions,
                        inputValidator: inputValidator,
                        text: text,
                        type: type,
                        allowOutsideClick: allowOutsideClick,
                        showCancelButton: showCancelButton,
                        confirmButtonColor: confirmButtonColor,
                        cancelButtonColor: cancelButtonColor,
                        cancelButtonText: cancelButtonText,
                        confirmButtonText: confirmButtonText,
                        onClose: callbackOnclose,
                    }).then(callback);
                }

            }
        }
        return obj;
	}
	
// 	SunQAlert()
//                         .position('center')
//                         .title(clickMarkerAlertTitle)
//                         .type('success')
//                         .confirmButtonColor("#3B4EDC")
//                         .cancelButtonColor("#a8b1f5")
//                         .confirmButtonText(clickMarkerAlertAgree)
//                         .cancelButtonText(clickMarkerAlertCancelButtonText)
//                         .callback((result) => {
//                             if (result.value) {
//                                 showStationChosen(item._id, item.id, item.address);
//                                 clickOnMarkerToChooseStation();
//                             } else if (result.dismiss === Swal.DismissReason.cancel) {
//                                 window.open(item.url);
//                             }
//                         })
//                         .show();
</script>