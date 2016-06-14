<?php
include ("header.php");
include ("left_col.php");
?>
<div class="c2">
			<div class="c2_2">
				<div class="cheader_center">AKTUÁLIS - hírek, beszámolók</div>
				<?php
                $newsid = $_GET['read'];
                $qnews = "SELECT * FROM news WHERE id='$newsid'";
				$rnews = mysql_query($qnews) or die( "SQL SELECT failed!" .mysql_error() );
				while($r = mysql_fetch_array($rnews))
				{
					$title = $r['title'];
					$text = $r['text'];
					echo "<div class=\"title\">" .$title. "</div>";
					echo "<br />";
                    echo "<div class=\"text\">" .$text. "</div>";  
				}
                ?>	
			</div>
		</div><!-- c2 END -->
			<div class="right_lane"><img src="images/holmi_08.png" alt="holmi" border="0" /></div>
	</div> <!-- content END -->
	<div class="clear"></div>
<?php
include ("footer.php");
?>