<?PHP
class Users{

	public $foundRows = 0;

	public function login() {
		global $config;

		if(!isset($_POST['username']) || !isset($_POST['password'])) {
			return 'error_invalid_username_or_password';
		}

		$PDO = PDO_CONNECT();

		$command = "SELECT * FROM `users` WHERE `username` = '".sql_quote($_POST['username'])."' AND `password` = '".md5(md5($_POST['password']))."' ";
		$result = $PDO->prepare($command);
		$result->execute();

		if($result->rowCount() == 0) {
			return 'error_invalid_username_or_password';
		}

		$user = $result->fetch(PDO::FETCH_ASSOC);
				
		if($user['last_login_datetime'] == '' || $user['last_login_datetime'] == '0000-00-00 00:00:00') {
			$user['first_login'] = 'yes';
		}
				
		$_SESSION['user'] = $user;
		unset($_SESSION['user']['password']);
		$_SESSION['user']['last_action'] = time();
						
		$verKey = md5(rand(0,9999999).time().$user['user_id']);
		setcookie("user_id", $user['user_id'], time()+2592000, "/", ".".$config['domain']);
        setcookie("verifyKey", $verKey, time()+2592000, "/", ".".$config['domain']);

		$command="
			UPDATE `users`
			SET `last_login_datetime` = UTC_TIMESTAMP(),
					`ip_address` = '".sql_quote($_SERVER['REMOTE_ADDR'])."', 
					`remember_key` = '".sql_quote($verKey)."',
					`active_session` = '".sql_quote('sess_'.$_COOKIE['PHPSESSID'])."',
					`status` = '".sql_quote($_SESSION['user']['last_action'])."'
			WHERE `user_id` = '".intval($user['user_id'])."'
			LIMIT 1
		";

		$result = $PDO->prepare($command);
		$result->execute();


		if (!isset($_SESSION['global_settings']) || $_SESSION['global_settings'] == ''){
			$dataConfig = file_get_contents(ROOT_PATH.'data/config/presets/config.json');
			$data = json_decode($dataConfig, true);
			foreach ($data as $key=>$d){
				$_SESSION['global_settings'][$key] = $data[$key];
			}
		}

		return true;
	}
	

	public function logout() {

		$PDO = PDO_CONNECT();
		$time = time()-120;

		$command = "UPDATE `users` SET `status` = $time WHERE `user_id` = '".sql_quote($_SESSION['user']['user_id'])."' LIMIT 1";
		$result = $PDO->prepare($command);
		$result->execute();

		unset($_SESSION);
		session_unset();
		session_destroy();

		return true;

	}

	public function getAll() {


		$PDO = PDO_CONNECT();

		$command = "SELECT * FROM `users` ORDER BY `date_added`";
		$result = $PDO->prepare($command);
		$result->execute();


		if ($result->rowCount() == 0) {
			return false;
		}

		$return = array();
		while ($d = $result->fetch(PDO::FETCH_ASSOC)) {
			$return[$d['user_id']] = $d;
			unset($return[$d['user_id']]['password']);
			unset($return[$d['user_id']]['active_session']);
		}

		$this->foundRows = $result->rowCount();
		return $return;
	}

	public function get($userID) {


		$PDO = PDO_CONNECT();

		$command = "SELECT * FROM `users` WHERE `user_id` = '".sql_quote($userID)."' LIMIT 1";
		$result = $PDO->prepare($command);
		$result->execute();

		$return = array();
		while ($d = $result->fetch(PDO::FETCH_ASSOC)) {
			$return[] = $d;
		}

		return $return;
	}


	public function add() {

		$_POST['selected_avatar'] = str_replace("data/", "",$_POST['selected_avatar']);
		
		$permissions = 0;

		if (isset($_POST['username']) && $_POST['username'] == ''){
			$error['username'] = 'Please enter a username.';
		}
		
		if($this->isExistUsername($_POST['username'])) {
			$error['username'] = 'This user name is  already taken.';
		}

		if (isset($_POST['email']) &&  $_POST['email'] == ''){
			$error['email'] = 'Please enter a valid email address.';
		}
		
		if($this->check_email($_POST['email']) == false) {
			$error['email'] = 'Please enter a valid email address.';
		}

		if($this->isExistEmail($_POST['email'])) {
			$error['email'] = 'This email address already exists.';
		}
				
		if (isset($_POST['firstname']) &&  $_POST['firstname'] == ''){
			$error['firstname'] = 'Please enter your first name.';
		}
		
		if (isset($_POST['lastname']) &&  $_POST['lastname'] == ''){
			$error['lastname'] = 'Please enter your lastname name.';
		}
		
		if (isset($_POST['password']) &&  $_POST['password'] == ''){
			$error['password'] = 'Please enter a password.';
		}

		if(isset($error)) {
			return $error;
		}

		$PDO = PDO_CONNECT();

		$command = "
			INSERT INTO `users` (
				`username`,
				`password`,
				`email`,
				`firstname`,
				`lastname`,
				`avatar`,
				`date_added`,
				`ip_address`,
				`permissions`
								
			)
			VALUES (
				'".sql_quote($_POST['username'])."',
				'".md5(md5($_POST['password']))."',
				'".sql_quote($_POST['email'])."',
				'".sql_quote($_POST['firstname'])."',
				'".sql_quote($_POST['lastname'])."',
				'".sql_quote($_POST['selected_avatar'])."',
				UTC_TIMESTAMP(),
				'".sql_quote($_SERVER['REMOTE_ADDR'])."',
				'".sql_quote($permissions)."'
				
			)
		";


		$result = $PDO->prepare($command);
		$result->execute();

		return true;
	}

	public function delete($userID) {

		$PDO = PDO_CONNECT();

		$command = "DELETE FROM `users` WHERE user_id = '".sql_quote($userID)."'";
		$result = $PDO->prepare($command);
		$result->execute();
		return true;
	}


	public function edit($data, $userID) {

		if ($data['username'] != $_POST['username']){
			if($this->isExistUsername($_POST['username'])) {
				$error['username'] = 'This user name is  already taken.';
			}
		}

		if ($data['email'] != $_POST['email']){
			if($this->isExistEmail($_POST['email'])) {
				$error['email'] = 'This email address already exists.';
			}
		}

		if(isset($error)) {
			return $error;
		}
		
		$permissions = 0;
		if (isset($_POST['role']) && $_POST['role'] == 'admin'){
			$permissions = 1;
		}

		if (isset($_POST['avatar']) && $_POST['avatar'] != ''){
			$_POST['avatar'] = str_replace("data/", "",$_POST['avatar']);
		}

		$setQuery = "";
		$setQuery .= " `username` = '".sql_quote($_POST['username'])."' ";
		$setQuery .= " , `email` = '".sql_quote($_POST['email'])."' ";
		if(isset($_POST['password']) && $_POST['password'] !=''){
			$setQuery .= " , `password` = '".sql_quote(md5(md5($_POST['password'])))."' ";
		}
		$setQuery .= " , `firstname` = '".sql_quote($_POST['firstname'])."' ";
		$setQuery .= " , `lastname` = '".sql_quote($_POST['lastname'])."' ";
		$setQuery .= " , `avatar` = '".sql_quote($_POST['avatar'])."' ";

		$setQuery .= " , `permissions` = '".sql_quote($permissions)."' ";

		$PDO = PDO_CONNECT();

		$command = "UPDATE `users` SET $setQuery WHERE `user_id` = '".intval($userID)."' LIMIT 1 ";
		$result = $PDO->prepare($command);
		$result->execute();
		
		if ($_POST['avatar'] == ''){
			$_SESSION['user']['avatar'] = "";
		}

		return true;
	}

	public function isExistEmail($email) {

		$PDO = PDO_CONNECT();

		$command = "SELECT * FROM `users` WHERE `email` = '".sql_quote($email)."'";
		$result = $PDO->prepare($command);
		$result->execute();

		if($result->rowCount() == 0) {
			return false;
		}

		return true;
	}

	public function isExistUsername($username) {

		$PDO = PDO_CONNECT();

		$command = "SELECT * FROM `users` WHERE `username` = '".sql_quote($username)."'";
		$result = $PDO->prepare($command);
		$result->execute();

		if($result->rowCount() == 0) {
			return false;
		}

		return true;
	}
	
	public function check_email($address) {
		return (preg_match ( '/^[-!#$%&\'*+\\.\/0-9=?A-Z^_`{|}~]+' . '@' . '([-0-9A-Z]+\.)+' . '([0-9A-Z]){2,4}$/i', trim ( $address ) ));
	}

}