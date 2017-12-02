<?PHP

class Cache{

	var $cacheDir = "../cache/phpcache/";
	var $defaultCacheLife = "3600";
	
	function __construct() {
		$this->cacheDir = ROOT_PATH . $this->cacheDir;
	}

	/**
	 * Set($varId, $varValue) --
	 * Creates a file named "cache.VARID.TIMESTAMP"
	 * and fills it with the serialized value from $varValue.
	 * If a cache file with the same varId exists, Delete()
	 * will remove it.
	 * @param $varId
	 * @param $varValue
	 * @return int
	 */
	function Set($varId, $varValue) {
		global $config;
		
		if ($config ['debug'] == 1) {
			add_debug ( "recache: " . $varId . " = " . $varValue );
		}

		$file = $this->cacheDir . "cache." . $varId;
		$fileHandler = fopen ( $file, "w" );
		$s = fwrite ( $fileHandler, serialize ( $varValue ) );
		fclose ( $fileHandler );
		
		return $s;
	}

	/**
	 * Get($varID, $cacheLife) --
	 * Retrives the value inside a cache file
	 * specified by $varID if the expiration time
	 * (specified by $cacheLife) is not over.
	 * If expired, returns FALSE
	 * @param $varId
	 * @param string $cacheLife
	 * @return bool|mixed
	 */
	function Get($varId, $cacheLife = "") {
		global $config;


		if ($cacheLife !== false && $cacheLife != '0' && ! is_numeric ( $cacheLife )) {
			$cacheLife = $this->defaultCacheLife;
		}
		
		if($cacheLife == 0) {
			$cacheLife = false;
		}

		$file = $this->cacheDir . "cache." . $varId;

		if (file_exists ( $file ) && filesize ( $file ) > 0) {
			if ($cacheLife === false || (time () - filemtime ( $file )) <= $cacheLife) {
				$fileHandler = fopen ( $file, "r" );
				$varValueResult = fread ( $fileHandler, filesize ( $file ) );
				fclose ( $fileHandler );
				return unserialize ( $varValueResult );
			} else {
				return false;
			}
		} else {			
			if ($config ['debug'] == 1) {
				add_debug ( "cache file not exists! " . $varId );
			}
			return false;
		}
	}

	/**
	 * Delete($varId) --
	 * Loops through the cache directory and
	 * removes any cache files with the varId
	 * specified in $varID
	 * @param $varId
	 * @return bool
	 */
	function Delete($varId) {
		$file = $this->cacheDir . "cache." . $varId;
		if (file_exists ( $file )) {
			unlink ( $file );
			return true;
		}
		return false;
	}
	  
}