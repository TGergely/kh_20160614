<div class="c2">
			<div class="c2_2">
				<form method="get" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>">
					<?php	
					// dátum meghatározása
					$month = (int) ($_GET['month'] ? $_GET['month'] : date('m'));
					$year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));
					?>
                </form>
                <div class="year-switcher">
                    <a href="?sort&year=2013&month=1"<?php if($year == '2013') { echo ' class="on"'; } ?>>2013</a>
                    <a href="?sort&year=2014&month=1"<?php if($year == '2014') { echo ' class="on"'; } ?>>2014</a>
                    <a href="?sort&year=2015&month=1"<?php if($year == '2015') { echo ' class="on"'; } ?>>2015</a>
                    <a href="?sort&year=2016&month=1"<?php if($year == '2016') { echo ' class="on"'; } ?>>2016</a>
                    <a href="?sort&year=2017&month=1"<?php if($year == '2017') { echo ' class="on"'; } ?>>2017</a>
                </div>
				<div class="month-switcher">
                    <a href="?sort&year=<?php echo $year; ?>&month=1"<?php if($month == '01') { echo ' class="on"'; } ?>>JAN</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=2"<?php if($month == '02') { echo ' class="on"'; } ?>>FEB</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=3"<?php if($month == '03') { echo ' class="on"'; } ?>>MÁR</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=4"<?php if($month == '04') { echo ' class="on"'; } ?>>ÁPR</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=5"<?php if($month == '05') { echo ' class="on"'; } ?>>MÁJ</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=6"<?php if($month == '06') { echo ' class="on"'; } ?>>JÚN</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=7"<?php if($month == '07') { echo ' class="on"'; } ?>>JÚL</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=8"<?php if($month == '08') { echo ' class="on"'; } ?>>AUG</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=9"<?php if($month == '09') { echo ' class="on"'; } ?>>SZEP</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=10"<?php if($month == '10') { echo ' class="on"'; } ?>>OKT</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=11"<?php if($month == '11') { echo ' class="on"'; } ?>>NOV</a>
                    <a href="?sort&year=<?php echo $year; ?>&month=12"<?php if($month == '12') { echo ' class="on"'; } ?>>DEC</a>
                </div>
                <!--
                <div>
                <a href="https://www.facebook.com/events/1215262845154652/" target="_blank"><img src="cover.png" alt="MAGYAR BÁL" style="width:829px;"></a>
                </div>
                -->
				<?php
                $timestamp = date(Ymd);
				$runselect = mysql_query($sqlselect) or die( "SQL database SELECT failed!" .mysql_error() );
				while($row = mysql_fetch_array($runselect))
				{
				$id = $row['eventid'];	
				$title = $row['title'];
				$details = $row['details'];
				$category = $row['category'];
				$locale = $row['locale'];
                $street = $row['addr_street'];
                $streetnum = $row['addr_num'];
				$contact = $row['contact'];
                $media = $row['media'];
				$date = $row['date'];
				$datab_year = substr($date,0,4);
				$datab_month = substr($date,5,2);
				$datab_day = substr($date,8,2);
                $datab_date = $datab_year.$datab_month.$datab_day;
				$begin = substr ($row['begin_time'],0,5);
				$end = substr ($row['end_time'],0,5);
                $admission = $row['admission'];
                $admission1name = $row['admission1name'];
                $admission1euro = $row['admission1euro'];
                $admission2name = $row['admission2name'];
                $admission2euro = $row['admission2euro'];
                $admission3name = $row['admission3name'];
                $admission3euro = $row['admission3euro'];
				
				echo "<a href=\"javascript:void(0);\" class=\"openmodalbox\">\n";
                if ($timestamp < $datab_date) { echo "<div class=\"event\">\n"; }
                if ($timestamp == $datab_date) { echo "<div class=\"event_actual\">\n"; }
                if ($timestamp > $datab_date) { echo "<div class=\"event_last\">\n"; }
                
                echo "<div class=\"e1\"><span class=\"day_num";
                if ($timestamp == $datab_date) { echo " blink"; }
                if ($timestamp > $datab_date) { echo " last"; }

                echo "\">" .$datab_day. "</span><span class=\"day_txt";
                if ($timestamp > $datab_date) { echo " last"; }
                if ($timestamp == $datab_date) { echo " blink"; }
                
                echo "\"> " .strftime("%A", strtotime($date)) ."</span></div>\n";

                echo "<div class=\"e2\"><span class=\"event_title";
                if ($timestamp > $datab_date) { echo " last"; }
                echo "\">" .$title. "</span></div>";

                echo "<div class=\"e3\"><span class=\"event_place";
                if ($timestamp > $datab_date) { echo " last"; }
                echo "\">" .$locale. "</span></div>\n";

				echo "<div class=\"e4\"><span class=\"time_num";
                if ($timestamp > $datab_date) { echo " last"; }
                echo "\">".$begin."</span></div>\n";
                
                echo "<span class=\"modalboxContent\">\n";
                echo "<object><table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\" class=\"jqtable\">\n";
                echo "<tr><td style=\"font-weight:bold;font-size:13px;\">".$title. "</td><td rowspan=\"9\">\n";
                include "create_google_map.php";
                echo "</td></tr>\n";
                echo "<tr><td><strong>" .$txt_where. ":</strong> " .$locale. " (" .$street. "&nbsp;" .$streetnum. ")</td></tr>\n";
                echo "<tr><td><strong>" .$txt_start. ":</strong> " .$begin. "</td></tr>\n";
                echo "<tr><td><strong>" .$txt_end. ":</strong> " .$end. "</td></tr>\n";
                echo "<tr><td><strong>" .$txt_admission. ":</strong> ";
                if ($admission ==0) echo "" .$txt_none. "</td></tr>\n";
                if ($admission ==1) {
                    if (trim($admission1name !='')) { echo "<br />" .$admission1name. " - " .$admission1euro. " &euro;\n"; }
                    if (trim($admission2name !='')) { echo "<br />" .$admission2name. " - " .$admission2euro. " &euro;\n"; }
                    if (trim($admission3name !='')) { echo "<br />" .$admission3name. " - " .$admission3euro. " &euro;\n"; }
                echo "</td></tr>";
                }
                echo "<tr><td><strong>" .$txt_details. ":</strong> " .$details. "</td></tr>\n";
                echo "<tr><td><strong>" .$txt_organiz. ":</strong> <a href=\"http://" .$contact. "\"> " .$contact. "</a></td></tr>\n";
                echo "<tr><td><strong>" .$txt_download. ":</strong></td></tr>\n";
                echo "<tr><td><a href=\"" .$main_url. "/media/upload/" .$media. "\" target=\"_blank\"><img src=\"" .$main_url. "/media/upload/" .$media. "\" style=\"width:100px;\" /></a></td></tr>\n";
                echo "</table></object></span>\n";
                
                echo "</div>\n"; // <-- event end
                echo "</a>\n";
                
                }
				?>
			</div>
		</div><!-- c2 END -->
			<div class="right_lane"><img src="images/holmi_08.png" alt="holmi" border="0" /></div>
	</div> <!-- content END -->
	<div class="clear"></div>