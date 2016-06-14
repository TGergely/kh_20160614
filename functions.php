<?php
//szöveg rövidítése karakterlevágással
function cutText($string, $maxLength = 100, $template = '%1$s...')
{
	if (preg_match(sprintf('/\A(.{0,%d})\b/si', $maxLength), $string, $result)) {
		return sprintf($template, rtrim($result[0]));
	}
	return '';
}




?>