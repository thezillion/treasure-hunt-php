<?php

	function go($lnk) { return header("location:".$lnk); }

	function ukey($len) {
		if ($len && $len <= 61) {
			$a = array_merge(range('a', 'z'), range(0, 9), range('A', 'Z'));
			shuffle($a);
			$b = substr(implode("", $a), 0, $len);
			return $b;
		} else {
			return false;
		}
	}

?>