<?php
return function(JAXL $client, XMPPStanza $msg, array $params) {
	if(empty($params)) {
		return "Usage: #lolcat <WORDZ, YO>";
	} else {

		$trans_table = array(
			'can i' => 'i can',
			'\bi\'ve' => 'i',
			'\ba\s+' => '', // nuke 'a'
			'cheese' => 'cheez',
			'\brock\b' => 'rawk',
			'ese\b' => 'ees',
			's\'s\b' => 's',
			'\'s\b' => 's',
			'er\b' => 'r',
			'ture\b' => 'chur',
			'day' => 'dai',
			'\bok\b' => 'k',
			'\boks\b' => 'ks',
			'boy' => 'boi',
			'tion' => 'shun',
			'ight' => 'ite',
			'innocent' => 'innozent',
			'ph' => 'f',
			'es' => 'ez',
			'ed\b' => 'd',
			'ns' => 'nz',
			'ks' => 'kz',
			'ds' => 'dz',
			'se' => 'ze',
			'zs' => 's',
			'sz' => 'z',
			'ss' => 's',
			'cc' => 'cs',
			'ck' => 'k',
			'oa' => 'o',
			'\bcat' => 'kat',
			'ive\b' => 'iv',
			'ake' => 'aek',
			'ed\b' => 'd',
			'ing\b' => 'in',
			'sion' => 'shun',
			'\bam\b' => 'iz',
			'\bhave\b' => 'has',
			'\bwho' => 'hoo',
			'\bwake\b' => 'waek',
			'\bone\b' => '1',
			'\btwo\b' => '2',
			'\bto\b' => '2',
			'\btoo\b' => '2',
			'\bthree\b' => '3',
			'\bfour\b' => '4',
			'\bfor\b' => '4',
			'\bfore\b' => '4',
			'\bfive\b' => '5',
			'\bsix\b' => '6',
			'\bseven\b' => '7',
			'\beight\b' => '8',
			'\bnine\b' => '9',
			'\bten\b' => '10',
			'god' => 'ceilin cat',
			'jezus' => 'jebus',
			'kitty' => 'kitteh',
			'saturdai' => 'katurdai',
			'allah' => 'invisible man',
			'delicious' => 'delishus',
			'\bdoctor\b' => 'docta',
			'\bdr\b' => 'docta',
			'\bgay\b' => 'ghey',
			'\bgood\b' => 'gud',
			'\bever' => 'evr',
			'\bpage\b' => 'paeg',
			'cheezburgr' => 'cheezburger', // fix up to canonical form
		);

		$str = strtolower(implode(" ", $params));

		foreach ($trans_table as $reg=>$repl) {
			$str = preg_replace("/$reg/", $repl, $str);
		}

		$str = str_replace("es", "ez", $str);

		$str = strtoupper($str);

		return $str;
	}
};
