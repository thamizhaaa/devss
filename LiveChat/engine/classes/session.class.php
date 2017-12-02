<?PHP
class Session{

	function __construct($expire_time = '') {
        session_start();
		return true;
	}
}