<?php ?>
<script>
    //loading kit
    function showProgressKitFreeLessonTemplate1() {
        document.getElementById("fetchKitFreeLessonTemplate1").style.display = "flex";
        document.getElementById("divKitFreeLessonTemplate1").style.display = "none";
    }

    function hideProgressKitFreeLessonTemplate1() {
        document.getElementById("fetchKitFreeLessonTemplate1").style.display = "none";
        document.getElementById("divKitFreeLessonTemplate1").style.display = "flex";
    }

    function getKitFreeLessonTemplate1EqualThanZero() {
        document.getElementById("divKitFreeLessonTemplate1").style.display = "none";
        document.getElementById("managaeKitEmpty").style.display = "flex";
    }

    function getKitFreeLessonTemplate1GreaterThanZero() {
        document.getElementById("divKitFreeLessonTemplate1").style.display = "flex";
        document.getElementById("managaeKitEmpty").style.display = "none";
    }

    function getKitFreeLessonTemplate1Success() {
        document.getElementById("managaeKitError").style.display = "none";
        document.getElementById("divKitFreeLessonTemplate1").style.display = "flex";
    }

    function getKitFreeLessonTemplate1Failed() {
        document.getElementById("managaeKitError").style.display = "flex";
        document.getElementById("divKitFreeLessonTemplate1").style.display = "none";
    }

    //loading video
    function showProgressVideoFreeLessonTemplate1() {
        document.getElementById("fetchVideoFreeLessonTemplate1").style.display = "flex";
        document.getElementById("divVideoFreeLessonTemplate1").style.display = "none";
    }

    function hideProgressVideoFreeLessonTemplate1() {
        document.getElementById("fetchVideoFreeLessonTemplate1").style.display = "none";
        document.getElementById("divVideoFreeLessonTemplate1").style.display = "flex";
    }

    function getVideoFreeLessonTemplate1EqualThanZero() {
        document.getElementById("divVideoFreeLessonTemplate1").style.display = "none";
        document.getElementById("managaeVideoEmpty").style.display = "flex";
    }

    function getVideoFreeLessonTemplate1GreaterThanZero() {
        document.getElementById("divVideoFreeLessonTemplate1").style.display = "flex";
        document.getElementById("managaeVideoEmpty").style.display = "none";
    }

    function getVideoFreeLessonTemplate1Success() {
        document.getElementById("managaeVideoError").style.display = "none";
        document.getElementById("divVideoFreeLessonTemplate1").style.display = "flex";
    }

    function getVideoFreeLessonTemplate1Failed() {
        document.getElementById("managaeVideoError").style.display = "flex";
        document.getElementById("divVideoFreeLessonTemplate1").style.display = "none";
    }

    function showProgressListFreeLessonTemplate1() {
        document.getElementById("fetchListFreeLessonTemplate1Progress").style.display = "flex";
    }

    function hideProgressListFreeLessonTemplate1() {
        document.getElementById("fetchListFreeLessonTemplate1Progress").style.display = "none";
    }

    function getListFreeLessonTemplate1Success() {
        document.getElementById("listFreeLessonTemplate1Error").style.display = "none";
        document.getElementById("tableListFreeLessonTemplate1").style.display = "flex";
    }

    function getListFreeLessonTemplate1Failed() {
        document.getElementById("listFreeLessonTemplate1Error").style.display = "flex";
        document.getElementById("tableListFreeLessonTemplate1").style.display = "none";
    }

    function getListFreeLessonTemplate1GreaterThanZero() {
        document.getElementById("listFreeLessonTemplate1Empty").style.display = "none";
        document.getElementById("tableListFreeLessonTemplate1").style.display = "flex";
        //fillTableListLecture();
    }

	function emptyTableListFreeLessonTemplate1(){
		document.getElementById("tableListFreeLessonTemplate1").innerHTML = "";
	}
	
    function getListFreeLessonTemplate1EqualToZero() {
        document.getElementById("listFreeLessonTemplate1Empty").style.display = "flex";
        document.getElementById("tableListFreeLessonTemplate1").style.display = "none";
        //emptyTableListFreeLessonTemplate1();
    }

    function loadingDataFreeLessonTemplate1Progress() {
        document.getElementById("FreeLessonTemplate1-page-loading").style.display = "flex";
        document.getElementById("FreeLessonTemplate1-page-loading-progress-error").style.display = "none";
        document.getElementById("FreeLessonTemplate1-page-loading-progress").style.display = "block";
        //document.getElementById("FreeLessonTemplate1-page-loading-progress-span").style.display = "block";
    }

    function loadingDataFreeLessonTemplate1Done() {
        document.getElementById("FreeLessonTemplate1-page-loading").style.display = "none";
    }

    function loadingDataFreeLessonTemplate1Error() {
        document.getElementById("FreeLessonTemplate1-page-loading-progress-error").style.display = "flex";
        document.getElementById("FreeLessonTemplate1-page-loading-progress").style.display = "none";
        //document.getElementById("FreeLessonTemplate1-page-loading-progress-span").style.display = "none";
    }

    function emptyTableKitListFreeLessonTemplate1(item) {
		document.getElementById("divKitFreeLessonTemplate1").innerHTML = "";
    }

    //chỉ chọn được 1 bộ KIT
    function createListKit(list) {
        let parent = document.getElementById("divKitFreeLessonTemplate1");
        parent.innerHTML = "";
		listKitFromServer = listKitFromServer.concat(list);
        list.forEach((item, index) => {
			console.log("kit",item);
            let div1 = document.createElement("div");
            div1.className = "mbsc-card";

			let divImg = document.createElement("div");
			divImg.className = "mbsc-card-list-img";
			
			item.thumbnailUrls.forEach((item,index)=>{
				let img = document.createElement("img");
            	img.src = getHomeURL() + item;
				divImg.appendChild(img);
			});
			
            if(item.thumbnailUrls == null || item.thumbnailUrls.length == 0){
			   let img = document.createElement("img");
			   img.src = '<?php echo $GLOBALS['URI_ADD_NEW']; ?>';
				div1.appendChild(img);
		   }

            let divTitle = document.createElement("div");
            divTitle.className = "mbsc-card-header";
            let h2 = document.createElement("h2");
            h2.className = "mbsc-card-title";
            h2.innerHTML = item.title;
            divTitle.appendChild(h2);

            let divContent = document.createElement("div");
            divContent.className = "mbsc-card-content";
        	divContent.innerHTML = index.shortDescription == null ? "Thiếu mô tả" : index.shortDescription;

            div1.appendChild(divImg);
            div1.appendChild(divTitle);
            div1.appendChild(divContent);
            div1.addEventListener("click", function() {
                let duppp = false;
                //console.log("check", item);
                currentKit = item.id;
                selectKitIndex(currentKit);
					//close cửa sổ
					setChoosingKitFreeLessonTemplate1(false);
            });
            parent.appendChild(div1);
        });
    }

    function selectKitIndex(id) {
		let index = listKitFromServer.filter(item => item.id == id);
		console.log("found",index,id);
		index = index[0];
		console.log("found",index,id);
		if(index){
        let parent = document.getElementById("currentListKit");
        let divFirst = document.createElement("div");
        divFirst.className = "mbsc-card";
        divFirst.id = "kit_" + index.id;

        let divClose = document.createElement("div");
        divClose.className = "manage-section-detail-left-item-inside-close";
        divClose.innerHTML = "x";

        divClose.addEventListener("click", function() {
            let deletIndexl
            currentKit = "";
            document.getElementById("kit_" + index.id).remove();
        });

        let divImg = document.createElement("div");
		divImg.className = "mbsc-card-list-img";
			
		index.thumbnailUrls.forEach((item,index)=>{
				let img = document.createElement("img");
            	img.src = getHomeURL() + item;
				divImg.appendChild(img);
			});
		
		if(index.thumbnailUrls == null || index.thumbnailUrls.length == 0){
		   let img = document.createElement("img");
		   img.src = '<?php echo $GLOBALS['URI_ADD_NEW']; ?>';
			divFirst.appendChild(img);
		   }
       
        let divTitle = document.createElement("div");
        divTitle.className = "mbsc-card-header";
        let h2 = document.createElement("h2");
        h2.className = "mbsc-card-title";
        h2.innerHTML = index.title;
        divTitle.appendChild(h2);

        let divContent = document.createElement("div");
        divContent.className = "mbsc-card-content";
        divContent.innerHTML = index.shortDescription == null ? "Thiếu mô tả" : index.shortDescription;

        divFirst.appendChild(divClose);
        divFirst.appendChild(divImg);
        divFirst.appendChild(divTitle);
        divFirst.appendChild(divContent);

        parent.appendChild(divFirst);
	}
    }

    function createListVideo(list) {
        let parent = document.getElementById("divVideoFreeLessonTemplate1");
        parent.innerHTML = "";
		listVideoFromServer = list;
        list.forEach((item, index) => {//console.log(item);
			if(item.status == "complete"){
            let div1 = document.createElement("div");
            div1.className = "mbsc-card";

            let img = document.createElement("img");
            img.src = item.thumbnailUrl == null ? "" : getHomeURL() + item.thumbnailUrl;

            let divTitle = document.createElement("div");
            divTitle.className = "mbsc-card-header";
            let h2 = document.createElement("h2");
            h2.className = "mbsc-card-title";
            h2.innerHTML = item.title;
            divTitle.appendChild(h2);

            let divContent = document.createElement("div");
            divContent.className = "mbsc-card-content";
            divContent.innerHTML = item.shortDescription;

            div1.appendChild(img);
            div1.appendChild(divTitle);
            div1.appendChild(divContent);
            div1.addEventListener("click", function() {
                let duppp = false;
                //console.log("check", currentVideos);
                currentVideos.some((itemT, indexT) => {
                    //console.log("some", itemT);
                    if (itemT == item.id) {
                        //console.log("dup", item.name);
                         			SunQAlert()
                                    .position('center')
                                    .title(dictionaryKey.FREELESSON_TEMPLATE_VIDEO_ALREADY_ADDED)
                                    .type('error')
                                    .confirmButtonColor("#3B4EDC")
                                    .confirmButtonText(dictionaryKey.AGREE)
                                    .callback((result) => {
                                        // webpageRedirect(window.location.href);
										setChoosingVideoFreeLessonTemplate1(false);
                                    })
                                    .show();
                        duppp = true;
                        return;
                    }
                });
                if (duppp == false) {
                    //console.log("no dupp");
                    currentVideos.unshift(item.id);
                    selectVideoIndex(item.id);
					//close cửa sổ
					setChoosingVideoFreeLessonTemplate1(false);
                }
            });
            parent.appendChild(div1);
		}
        });
    }

    function selectVideoIndex(id) {
		let index = listVideoFromServer.filter(item => item.id == id);
		index = index[0];
		if(index){
        console.log("found",index,id);
        let parent = document.getElementById("currentListVideo");
        let divFirst = document.createElement("div");
        divFirst.className = "mbsc-card-list";
        divFirst.id = "video_" + index.id;
        let divClose = document.createElement("div");
        divClose.className = "manage-section-detail-left-item-inside-close";
        divClose.innerHTML = "x";

		let spanTitle = document.createElement("span");
        spanTitle.innerHTML = index.title;
		
		let shortDes = document.createElement("span");
		shortDes.className="mbsc-card-sub-description";
        shortDes.innerHTML = index.shortDescription;
		
		let video = document.createElement("video");
		video.muted="muted";
		video.style.margin="0px auto";
		video.width = "275";
		video.height = "250";
		
		if (Hls.isSupported()) {
                                console.log("Hls support");
                               
                                var hls = new Hls({
                                    xhrSetup: xhr => {
                                        xhr.setRequestHeader('Authorization', "Bearer " + getLocalStorage(dictionary.MSEC))
                                    }
                                });
                                hls.loadSource(getHomeURL() + index.fileUrl);
                                hls.attachMedia(video);
                                hls.on(Hls.Events.MANIFEST_PARSED, function() {
                                    video.play();
                                });
                            }
		
        divClose.addEventListener("click", function() {
            let deletIndexl;
            currentVideos.some((item, indexinside) => {
                if (item.shortId == index.id) {
                    deletIndexl = indexinside;
                    //console.log("delete", indexinside);
                    return true;
                }
            });
            currentVideos.splice(deletIndexl, 1)
            document.getElementById("video_" + index.id).remove();
        });

        divFirst.appendChild(divClose);
        divFirst.appendChild(spanTitle);
        divFirst.appendChild(shortDes);
        divFirst.appendChild(video);
        parent.appendChild(divFirst);
		}
    }

    function emptyTableVideoListFreeLessonTemplate1() {
        document.getElementById("divVideoFreeLessonTemplate1").innerHTML = "";
        //listRollGroup.length = 0;
    }

    function createListFreeLessonTemplate1(result) {
        let list = result.data;

        if (!listVisitedFreeLessonTemplate1.includes(getCurrentFreeLessonTemplate1())) {
            listVisitedFreeLessonTemplate1.push(getCurrentFreeLessonTemplate1());
        }

        let parent = document.getElementById("tableListFreeLessonTemplate1");
        parent.innerHTML = "";
        let tbody = document.createElement("tbody");
        let trFirst = document.createElement("tr");
        trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_1"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_2"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_3"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_4"]; ?>' + "</th><th>"+'<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_5"]; ?>'+"</th>";
        tbody.appendChild(trFirst);
        createTableFreeLessonTemplate1(tbody, list, getCurrentFreeLessonTemplate1());
        parent.appendChild(tbody);

        //paging
        document.getElementById("span-title-FreeLessonTemplate1").style.display = "flex";
        let parentPaging = document.getElementById("pagingListFreeLessonTemplate1");
        parentPaging.innerHTML = "";
        let maxPage = result.total;
        let maxPerList = dictionaryKey.limitRequestRegister;
        let totalPage = maxPage <= maxPerList ? 1 : Number.parseInt(maxPage / maxPerList) < 0 ? Number.parseInt(maxPage / maxPerList) : Number.parseInt(maxPage / maxPerList) + 1;
        console.log(totalPage);
        for (let pagingIndex = 0; pagingIndex < totalPage; pagingIndex++) {
            let tempDivPaging = document.createElement("span");
            tempDivPaging.className = "manage-list-lecture-list-register-paging-index";
            if (pagingIndex == getCurrentFreeLessonTemplate1()) {
                tempDivPaging.className = "manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
            }

            tempDivPaging.id = "paging-index-" + pagingIndex;
            tempDivPaging.innerHTML = Number.parseInt(pagingIndex) + 1;

            tempDivPaging.addEventListener("click", function(e) {
                for (let tI = 0; tI < totalPage; tI++) {
                    let tDiv = document.getElementById("paging-index-" + tI);
                    if (tI != pagingIndex) {
                        //đặt cho các số khác là màu in nhạt	
                        tDiv.className = "manage-list-lecture-list-register-paging-index";
                    } else {
                        //đặt cho số đang chọnc là màu in đậm	
                        tDiv.className = "manage-list-lecture-list-register-paging-index manage-list-lecture-list-register-paging-index-selected";
                    }
                }
                if (!listVisitedFreeLessonTemplate1.includes(pagingIndex)) { //load cái mới	
                    setCurrentFreeLessonTemplate1(pagingIndex);
                } else { //load lại cái cũ
                    console.log("load lại cái cũ");
                    loadOldPageFreeLessonTemplate1(pagingIndex);
                }
            });

            parentPaging.appendChild(tempDivPaging);
        }
    }

    function loadOldPageFreeLessonTemplate1(number) {
        let startIndex = number * dictionaryKey.limitRequestRegister;
        let endIndex = (number + 1) * dictionaryKey.limitRequestRegister;
        let arrayOldPage = listFreeLessonTemplate1.slice(startIndex, endIndex);

        let parent = document.getElementById("tableListFreeLessonTemplate1");
        parent.innerHTML = "";
        let tbody = document.createElement("tbody");
        let trFirst = document.createElement("tr");
        trFirst.innerHTML = "<th>" + '<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_1"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_2"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_3"]; ?>' + "</th><th>" + '<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_4"]; ?>' + "</th><th>"+'<?php echo $GLOBALS["FREELESSON_TEMPLATE_LIST_COL_5"]; ?>'+"</th>";
        tbody.appendChild(trFirst);
        createTableFreeLessonTemplate1(tbody, arrayOldPage, number);
        parent.appendChild(tbody);
    }

    function createTableFreeLessonTemplate1(tboby, input, number) {
        input.forEach((item, index) => {
            index = number * dictionaryKey.limitRequestRegister + index + 1;
            //console.log(index);
            let trContent = document.createElement("tr");
            if (index % 2 != 0) {
                trContent.className = 'manage-list-teacher-table-detail-strong';
            }
            let tempAHref = makeATagRedirect(sunQMode.online, listScreen.online.freelessontemplate1, dictionaryKey.editStatus, item.id);
			
			let tempDate = new Date();
			tempDate.setMonth(item.month);
			let monthTemp = ["Tháng 0", "Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"];
			let monthmonth = monthTemp[tempDate.getMonth()] + ",năm " + tempDate.getFullYear();
			
            trContent.innerHTML = "<td>" + (index) + "</td><td>" + item.title + "</td><td>" + monthmonth + "</td><td class=\"tdShortDesscription\">" + (item.shortDescription != null ? item.shortDescription : "Thiếu") + "</td><td class='manage-list-teacher-table-detail-tr-modified'><a href=\"?" + tempAHref + "\"><div class='manage-list-teacher-table-detail-div-edit'>Chỉnh sửa</div></a><div class='manage-list-teacher-table-detail-div-delete' onclick=\"deleteFreeLessonTemplate1(" + (index - 1) + ")\">Xóa</div></td>";

            tboby.appendChild(trContent);
        });
    }
</script>