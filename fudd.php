<?php
return function(JAXL $client, XMPPStanza $msg, array $params) {
	if(empty($params)) {
		return "Usage: #fudd <wowds, yo>";
	} else {
		$str = implode(" ", $params);
		$str = preg_replace("/[rl]/", "w", $str);
		$str = preg_replace("/qu/", "qw", $str);
		$str = preg_replace("/th\b/", "f", $str);
		$str = preg_replace("/th\B/", "d", $str);
		$str = preg_replace("/n\./", "n, uh-hah-hah-hah. ", $str);
		$str = preg_replace("/[RL]/", "W", $str);
		$str = preg_replace("/Qu/", "Qw", $str);
		$str = preg_replace("/QU/", "QW", $str);
		$str = preg_replace("/TH\b/", "F", $str);
		$str = preg_replace("/TH\B/", "D", $str);
		$str = preg_replace("/Th/", "D", $str);
		$str = preg_replace("/N\./", "N, uh-hah-hah-hah.", $str);
		return $str;
	}
};
