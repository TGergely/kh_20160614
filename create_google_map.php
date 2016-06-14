<?php

if (isset($street) &&
    trim($street) !='') {

$iframe_width = '350';
$iframe_height = '350';


$streetUTF = urlencode(iconv("windows-1250", "utf-8", "$street"));
$cityUTF = urlencode(iconv("windows-1250", "utf-8", "Košice"));
$countryUTF = urlencode(iconv("windows-1250", "utf-8", "Szlovákia"));
$locationString = "$streetUTF,+$streetnum,+$cityUTF,+$countryUTF";

echo "<iframe width=\"" .$iframe_width. "\" height=\"" .$iframe_height. "\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" src=\"http://maps.google.hu/maps?f=q&amp;source=s_q&amp;hl=hu&amp;geocode=&amp;q=" .$locationString. "&amp;aq=0&amp;oq=" .$locationString. "&amp;ie=UTF8&amp;hq=&amp;hnear=" .$locationString. "&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed\"></iframe>\n";

} else { echo "Nincs megjeleníthetõ cím!";}

?>
