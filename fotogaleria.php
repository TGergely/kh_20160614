<?php
include ("header.php");
include ("left_col.php");
?>
<div class="c2">
			<div class="c2_2">
				<div class="cheader_center">FOTÓGALÉRIA</div>
                <br /><br />
                <div class="text">
                <?php
                $album = $_GET['album'];
                if(isset($album) &&
                   trim($album) != '') {
                echo "<table>\n";
                   
                    $qalbum = "SELECT * FROM media WHERE id='" . $album . "' AND status='1'";
                    $getalbum = mysql_query($qalbum) or die( "SQL SELECT failed!" .mysql_error() );
                    $row = mysql_fetch_array($getalbum);
                    $mid = $row['id'];
                    $folder = $row['folder'];
                    $directory = "media/". $folder ."";
                    $i = 0;   
                    if ($handle = opendir($directory)) {
                        while (false !== ($file = readdir($handle))) {
                            if ($file != "." && $file != ".." && $file != "upload") {
                                if ($i % 4 == 0) {
                                echo '<tr>'. "\n";
                                }
                                echo '<td><a href="'. $directory .'/'. $file .'" rel="lightbox['. $mid .']"><img src="'. $directory .'/'. $file .'" alt="'. $file .'" class="thumb" /></a></td>'. "\n";
                                if ($i % 4 == 3) {
                                echo '</tr>'. "\n";
                                }
                                $i++; 
                                
                                
                                
                            }
                        }
                        if ($i % 4 != 0) {
                        echo '</tr>' . "\n";
                        }
                    closedir($handle);
                    }
                echo "</table>\n";
                } else {
                ?>
                <ul>
               	<?php
                   $listalbums = "SELECT * FROM media WHERE status='1'";
                   $rlist = mysql_query($listalbums) or die( "SQL SELECT failed!" .mysql_error() );
                   while ($row = mysql_fetch_array($rlist)) {
                    $mid = $row['id'];
				    $albumname = $row['albumname'];
                    
                echo '<li><a href="fotogaleria.php?album='. $mid .'">'. $albumname .'</a></li>';    
                }
                
                ?>
                </ul>
                <?php } ?>
                </div>
	
			</div>
		</div><!-- c2 END -->
			<div class="right_lane"><img src="images/holmi_08.png" alt="holmi" border="0" /></div>
	</div> <!-- content END -->
	<div class="clear"></div>
<?php
include ("footer.php");
?>