<?php

function snakeToCamel($input)
{
	return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
}
function camelCase($input) {
	$pattern = '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!';
	preg_match_all($pattern, $input, $matches);
	$ret = $matches[0];
	foreach ($ret as &$match) {
	$match = $match == strtoupper($match) ?
		strtolower($match) :
		lcfirst($match);
	}
	return implode('_', $ret);
}

function RemoveSpecialChar($str)
{
	$res = preg_replace('/[\@\.\;\,\"\-]+/', '', $str);
	$res = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE',$res);
	return $res;
}
function dr() {
	return dd(request()->all());
}

