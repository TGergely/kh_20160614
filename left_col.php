<div id="content">
		<div class="left_lane"><img src="images/holmi_05.png" alt="holmi" border="0" /></div>
			<div class="c1">
				<br /><br /><br /><br /><br /><br />
				<div class="cheader1_left" title="Aktuális">AKTUÁLIS</div>
				<div class="cheader2_left">
				<div style="text-align:justify;padding:5px;">
				<?php
				$qnews = "SELECT * FROM news ORDER BY date DESC";
				$rnews = mysql_query($qnews) or die( "SQL SELECT failed!" .mysql_error() );
				while($r = mysql_fetch_array($rnews))
				{
					$newsid = $r['id'];
					$title = $r['title'];
					$text = $r['text'];
					echo "<span style=\"font-weight:bold;\">$title</span>"
					.	 "<br />".cutText($text, '180', '%1$s...')."<br /><br /><a href=\"aktualis-$newsid\" class=\"more\"><img src=\"images/b_more.png\" alt=\"$more_txt\" /></a><br /><br />";
				}
				?>
				</div>
				</div>
				
                <br />
				
				<br />
				<div class="cheader1_left" title="Kassai Magyar Szervezetek">MAGYAR SZERVEZETEK</div>
				<div class="cheader2_left">
                    <ul>
					<?php
                    $getusers = "SELECT * FROM users WHERE ugroup='3' AND ustatus='1' ORDER BY orgname ASC LIMIT 10";
                    $rgetusers = mysql_query($getusers) or die( "SQL SELECT failed!" .mysql_error() );
                    while($row = mysql_fetch_array($rgetusers))
				        {
				            
				        $orgname = $row['orgname'];
                        $web = $row['web'];
                        if (isset($web) && trim($web) != '') { echo "<li><a href=\"http://" .$web. "\" target=\"_blank\">" .$orgname. "</a></li>"; }
                        else { echo "<li><span>" .$orgname. "</span></li>"; }
                           
                        }
                    ?>
                    </ul>
                    <a href="kassai-magyar-szervezetek-listaja" class="more"><img src="images/b_more.png" alt="<?php echo $more_txt ?>" /></a><br /><br />
				</div>
                
                <br />
				<div class="cheader1_left" title="Kassai Felsõottatási Intézmények">FELSÕOKTATÁS</div>
				<div class="cheader2_left">
                    <ul>
					<li><a href="muszaki-egyetem-kassa">MÛSZAKI EGYETEM KASSA</a></li>
				    <li><a href="pavoljozefsafarik-egyetem-kassa">PAVOL JOZEF ŠAFÁRIK EGYETEM</a></li>
					<li><a href="allatorvosi-egyetem-kassa">KASSAI ÁLLATORVOSI EGYETEM</a></li>
					<li class="show-hide"><a href="pozsonyi-kozgaz-egyetem-kassa">POZSONYI KÖZGAZDASÁGTUDOMÁNYI EGYETEM</a></li>
					<li class="show-hide"><a href="rozsahegyi-egyetem-kassa">RÓZSAHEGYI KATOLIKUS EGYETEM</a></li>
                    <li class="show-hide"><a href="eperjesi-egyetem">EPERJESI EGYETEM</a></li>
                    <li class="show-hide"><a href="biztonsagmenedzsment-foiskola-kassa">BIZTONSÁGMENEDZSMENT FÕISKOLA</a></li>
                    </ul>
                    <a class="showhide"><img src="images/b_open.png" alt="<?php echo $open_txt ?>" /></a><br /><br />
				</div>
				
				<br />
				<div class="cheader1_left" title="Kassa városáról">KASSA VÁROSA</div>
				<div class="cheader2_left">
                    <ul>
					<li><a href="kassa-tortenete">KASSA TÖRTÉNETE</a></li>
					<li><a href="kassa-latnivaloi">KASSA FÕBB LÁTNIVALÓI</a></li>
					<li><a href="kassa-hires-szulottei">KASSA HÍRES SZÜLÖTTEI</a></li>
					<li><a href="#">KASSA TÉRKÉPE</a></li>
                    </ul>
				</div>		
				<br /><br />	
			</div> <!-- c1 END -->