<?php

class Conditional {

	public static function render($attributes, $content, $full_data)  {

		$from = strtotime($attributes['fromDate'] ?? "1970-01-01");
		$to = strtotime($attributes['toDate'] ?? "2100-01-01");
		$now = time();

		$is_within = $now >= $from && $now <= $to;
		$hide = $attributes['hideWithinDateRange'] ? $is_within : ! $is_within;
		
		if($hide) return "";
		
		return $content;
		
	}

}