<?php

class NaverLogin
{
	private $db;
	
	private $clientId = '';
	private $secret = '';
	private $redirectUri = 'http://code-factory.co.kr/member/login_callback.php';
	
	
	public function __construct()
	{
		$this->db = $GLOBALS['db'];
	}
	
	/**
	* code 발급 요청 URL
	*
	* @return String
	*/
	public function getCodeURL()
	{
		$params = [
			'response_type' => 'code',
			'client_id' => $this->clientId,
			'redirect_uri' => $this->redirectUri,
			'state' => md5(uniqid()),
		];
		
		$url = "https://nid.naver.com/oauth2.0/authorize?".http_build_query($params);
		
		return $url;
	}
	
	/**
	* access_token 발급 요청 
	*
	* @param String $code 발급받은 접속 토큰
	* @param String $state 위변조 방지 예방 토큰
	* 
	* @return String AccessToken 
	*/
	public function getAccessToken($code, $state)
	{
		$params = [
			'grant_type' => 'authorization_code',
			'client_id' => $this->clientId,
			'client_secret' => $this->secret,
			'code' => $code,
			'state' => $state,
		];
		$params = http_build_query($params);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://nid.naver.com/oauth2.0/token");
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		
		$data = json_decode($data, true);
		$accessToken = isset($data['access_token'])?$data['access_token']:"";
		
		return $accessToken;
	}
	
	/**
	* 회원정보 조회 
	* 
	* @params String $accessToken 
	* @return Array
	*/
	public function getProfile($accessToken)
	{
		$headers = [
			'Authorization: Bearer '.$accessToken, 
		];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://openapi.naver.com/v1/nid/me');
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		
		$data = json_decode($data, true);
		$data = ($data['resultcode'] == '00')?$data['response']:[];
		
		return $data;
	}
	
	/**
	* 네이버 로그인 회원 가입이 이미 되어있는지 여부 체크 
	*  
	* @param String $code 발급받은 토큰 
	* @param String $state 
	*
	* @return Boolean
	*/
	public function checkExists($code, $state) 
	{
		/**
		1. acccess_token 발급  - O 
		2. profile 정보를 추출 - O
		3. profile 정보를 session에 담아서 보관 - O
		4. member 테이블에 profile['id'] 정보와 snsType 이 'naver'인 정보가 있으면 
			이미 회원가입, 없으면 미 가입
		5. 회원 가입이 되어 있으면 true, false - O 
		*/
		$isExists = false;
		$accessToken = $this->getAccessToken($code, $state);
		if ($accessToken) {
			$profile = $this->getProfile($accessToken);
			if ($profile) {
				$_SESSION['naverProfile'] = $profile;
				
				/** DB에서 체크 */
				$sql = "SELECT COUNT(*) as cnt FROM member WHERE snsType='naver' AND snsId = :snsId";
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(":snsId", $profile['id'], PDO::PARAM_STR);
				$result = $stmt->execute();
				if ($result) {
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					if ($row['cnt'] > 0) $isExists = true;
				}
			} 
		} // endif 
		
		return $isExists;
	}
	
	/**
	* 네이버 로그인 처리 
	*
	*/
	public function login()
	{
		if (!isset($_SESSION['naverProfile']) || !$_SESSION['naverProfile'])
			return false;
		
		/**
		* 1. snsType - naver, snsId - $_SESSION['naverProfile']['id'] 일치하는 회원 조회
		* 2. $_SESSION에 memNo 회원 추가 하여 로그인 처리 
		*/
		
		$sql = "SELECT * FROM member WHERE snsType='naver' AND snsId = :snsId";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(":snsId", $_SESSION['naverProfile']['id'], PDO::PARAM_STR);
		$result = $stmt->execute();
		if ($result) {
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			if ($row) { // 회원 정보가 있으면 로그인 처리 
				$_SESSION['memNo'] = $row['memNo'];
				unset($_SESSION['naverProfile']);
				return true;
			}
		}
		
		return false;
	}
}
