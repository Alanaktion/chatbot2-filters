<?php
if(!function_exists('avast')) {
	function avast($match) {
		$shouts = array(
			", avast$match",
			"$match Ahoy!",
			", and a bottle of rum!",
			", by Blackbeard's sword$match",
			", by Davy Jones' locker$match",
			"$match Walk the plank!",
			"$match Aarrr!",
			"$match Yaaarrrrr!",
			", pass the grog!",
			", and dinna spare the whip!",
			", with a chest full of booty$match",
			", and a bucket o' chum$match",
			", we'll keel-haul ye!",
			"$match Shiver me timbers!",
			"$match And hoist the mainsail!",
			"$match And swab the deck!",
			", ye scurvey dog$match",
			"$match Fire the cannons!",
			", to be sure$match",
			", I'll warrant ye$match",
			"$match Arr, me hearty!",
		);
		if (rand(1,2) == 1) {
			return $shouts[array_rand($shouts)] . " ";
		}
		return $match;
	}
	function roll($match) {
		if(rand(1,2) == 1) {
			return str_repeat("r", rand(1, 5));
		}
		return "r";
	}
}

return function(JAXL $client, XMPPStanza $msg, array $params) {
	if(empty($params)) {
		return "Usage: #pirate <words, arr>";
	} else {

		$trans_table = array(
			'\bmy\b' => 'me',
			'\bboss\b' => 'admiral',
			'\bmanager\b' => 'admiral',
			'\b[Cc]aptain\b' => "Cap'n",
			'\bmyself\b' => 'meself',
			'\byour\b' => 'yer',
			'\byou\b' => 'ye',
			'\bfriend\b' => 'matey',
			'\bfriends\b' => 'maties',
			'\bco[-]?worker\b' => 'shipmate',
			'\bco[-]?workers\b' => 'shipmates',
			'\bearlier\b' => 'afore',
			'\bold\b' => 'auld',
			'\bthe\b' => "th'",
			'\bof\b' =>  "o'",
			'\bdon\'t\b' => "dern't",
			'\bdo not\b' => "dern't",
			'\bnever\b' => "no nay ne'er",
			'\bever\b' => "e'er",
			'\bover\b' => "o'er",
			'\bYes\b' => 'Aye',
			'\bNo\b' => 'Nay',
			'\bdon\'t know\b' => "dinna",
			'\bhadn\'t\b' => "ha'nae",
			'\bdidn\'t\b' =>  "di'nae",
			'\bwasn\'t\b' => "weren't",
			'\bhaven\'t\b' => "ha'nae",
			'\bfor\b' => 'fer',
			'\bbetween\b' => 'betwixt',
			'\baround\b' => "aroun'",
			'\bto\b' => "t'",
			'\bit\'s\b' => "'tis",
			'\bIt\'s\b' => 'It be',
			'\bwoman\b' => 'wench',
			'\blady\b' => 'wench',
			'\bwife\b' => 'lady',
			'\bgirl\b' => 'lass',
			'\bgirls\b' => 'lassies',
			'\bguy\b' => 'lubber',
			'\bman\b' => 'lubber',
			'\bfellow\b' => 'lubber',
			'\bdude\b' => 'lubber',
			'\bboy\b' => 'lad',
			'\bboys\b' => 'laddies',
			'\bchildren\b' => 'minnows',
			'\bkids\b' => 'minnows',
			'\bhim\b' => 'that scurvey dog',
			'\bher\b' => 'that comely wench',
			'\bhim\.\b' => 'that drunken sailor',
			'\bHe\b' => 'The ornery cuss',
			'\bShe\b' => 'The winsome lass',
			'\bhe\'s\b' => 'he be',
			'\bshe\'s\b' => 'she be',
			'\bwas\b' => "were bein'",
			'\bHey\b' => 'Avast',
			'\bher\.\b' => 'that lovely lass',
			'\bfood\b' => 'chow',
			'\broad\b' => 'sea',
			'\broads\b' => 'seas',
			'\bstreet\b' => 'river',
			'\bstreets\b' => 'rivers',
			'\bhighway\b' => 'ocean',
			'\bhighways\b' => 'oceans',
			'\bcar\b' => 'boat',
			'\bcars\b' => 'boats',
			'\btruck\b' => 'schooner',
			'\btrucks\b' => 'schooners',
			'\bSUV\b' => 'ship',
			'\bmachine\b' => 'contraption',
			'\bairplane\b' => 'flying machine',
			'\bjet\b' => 'flying machine',
			'\bdriving\b' => 'sailing',
			'\bdrive\b' => 'sail',
			'\bwith\b' => "wi'",
			'\bam\b' => 'be',
			'\bis\b' => 'be',
			'\bare\b' => 'be',
			'\bwas\b' => 'be',
			'\bwere\b' => 'be',
			'\bwere\b' => 'be',
		);

		$str = strtolower($str);

		foreach ($trans_table as $reg=>$repl) {
			$str = preg_replace($reg, $repl, $str);
		}

		$str = preg_replace("/ing\b/", "in'", $str);
		$str = preg_replace("/ings\b/", "in's", $str);
		$str = preg_replace_callback("/(\.( |\t|$))/", "avast", $str);
		$str = preg_replace_callback("/([!\?]( \t|$))/", "avast", $str); // Greater chance after exclamation
		$str = preg_replace("/\Br\B/", "roll", $str);

		return $str;
	}
};
