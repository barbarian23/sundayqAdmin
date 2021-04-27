<?php 

		
		class SunQDevHelper{
		static function requestGet($url,$inputData,$name,callable $callback){
			$url .= '?';
			//mỗi data trong method get cần thêm dấu & đăng trước cú pháp là &key=value
			$keys = array_keys($inputData);
			for($i=0; $i < count($keys); ++$i) {
				$url .= $keys[$i] . '=' . $inputData[$keys[$i]];
				if ($i < count($keys) - 1){
					$url .= '&';
				}
			}
		
			$response = wp_remote_post($url, array(
				'method' => 'GET',
				'timeout' => 45,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking' => true,
				'cookies' => array()
			));
			
			self::handleResponce($url, $response);
			
			$data =json_decode(json_decode(json_encode($response['body'],true),true),true);
			//return $data;
			$callback($data,$name);
			
		}
		
		static function requestPost($url,$inputData,callable $callback){
			$response = wp_remote_post($url, array(
				'method' => 'POST',
				'timeout' => 45,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking' => true,
				'headers' => array(
					'Content-Type' => 'application/json; charset=utf-8'
				),
				'body' => json_encode(
					$inputData
				),
				'cookies' => array()
			));
			self::handleResponce($url,$response);
			$data = json_decode(json_decode(json_encode($response['body'],true),true),true);
			$callback($data);
 		}
		
//cách sử dụng hàm callback
// self::requestGet($url,array(),$name,function($input,$name){ // 
//self::hideAirportsLoadingAfterReceive(); // 
//self::pushToArray($input['data']['airports'],$name); 
// });
		
		static function handleResponce($url, $response){
			//self::consoleLogPHP("=================");
			//self::consoleLogPHP($url);
			if ( is_wp_error( $response ) ) {
			   $error_message = $response->get_error_message();
			   self::consoleLogPHP('error ' . $error_message);
			} else {
			   $data = json_decode(json_decode(json_encode($response['body'],true),true),true);
			   //self::consoleLogPHP('Responce ' . $data['data']);
			}
			//self::consoleLogPHP("=================");
		}
		
		static function consoleLogPHP($stringLog){
			echo "<script>console.log('" . $stringLog . "');</script>";
		}
	
		static function callFunction($name,$param){
			//self::consoleLogPHP("call function");
			echo "<script>". $name . "(" . $param . ");</script>";
		}
	}
	
?>
