<?php 
?>
<!-- <script src="wp-content/themes/twentytwenty/assets/js/crypto.js" integrity="sha256-/H4YS+7aYb9kJ5OKhFYPUjSJdrtV6AeyJOtTkw6X72o=" crossorigin="anonymous"></script> -->
<script>

	function requestToSever(type,url,data,token,onSuccess,onError,isForm){
		console.log("url",url);
		console.log("data",data);
		if (data == null) {
			fetch(url, {
                method: type,
                headers: {
                    'Content-type': 'application/json',
					 'Authorization': 'Bearer ' + token
                }
            })
            .then(response => {
                return response.json()
            })
            .then(res => {
                onSuccess(res);
            })
            .catch(err => {
                onError(err);
            });
		} else if(token == null){
			 fetch(url, {
                method: type,
                headers: {
                    'Content-type': 'application/json',
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                return response.json()
            })
            .then(res => {
                onSuccess(res);
            })
            .catch(err => {
                onError(err);
            });
			 
		}
		else if(isForm){
				fetch(url, {
                method: type,
                headers: {
	
          'Content-Type': undefined,
					 'Authorization': 'Bearer ' + token
                }
            })
            .then(response => {
                return response.json()
            })
            .then(res => {
                onSuccess(res);
            })
            .catch(err => {
                onError(err);
            });
				}
		else{
			fetch(url, {
                method: type,
                headers: {
                    'Content-type': 'application/json',
					 'Authorization': 'Bearer ' + token,
                },
                body: JSON.stringify(data)
            })
            .then(response => {
                return response.json()
            })
            .then(res => {
                onSuccess(res);
            })
            .catch(err => {
                onError(err);
            });
		}
		
	}
	
	 function checkMobile() {
        const toMatch = [
            /Android/i,
            /webOS/i,
            /iPhone/i,
            /iPad/i,
            /iPod/i,
            /BlackBerry/i,
            /Windows Phone/i
        ];
        return toMatch.some((toMatchItem) => {
            return navigator.userAgent.match(toMatchItem);
        });
    }

    function checkMobileIOS() {
        const toMatch = [
            /webOS/i,
            /iPhone/i,
            /iPad/i,
            /iPod/i,
        ];
        return toMatch.some((toMatchItem) => {
            return navigator.userAgent.match(toMatchItem);
        });
    }
	
	async function saveFunction(inp) {
		let formData = new FormData();
		let photo = inp.files[0];      

		formData.append("photo", photo);
		formData.append("user", JSON.stringify(user));  

		requestToSever(sunQRequestType.post,);
		try {
		   let r = await fetch('/upload/image', {method: "POST", body: formData}); 
		   console.log('HTTP response code:',r.status); 
		} catch(e) {
		   console.log('Huston we have problem...:', e);
		}
	}
</script>