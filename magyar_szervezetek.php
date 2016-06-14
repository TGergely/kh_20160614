<?php
include ("header.php");
include ("left_col.php");
?>
<div class="c2">
			<div class="c2_2">
				<div class="cheader_center">KASSAI MAGYAR SZERVEZETEK LISTÁJA</div>
                <br /><br />
                <table width="100%" cellpadding="0" cellspacing="0" border="0" class="userslist">
                    <thead><tr>
                        <th><?php echo $txt_thead_orgname ?></th>
                        <th><?php echo $txt_thead_prsname ?></th>
                        <th><?php echo $txt_thead_tel ?></th>
                        <th><?php echo $txt_thead_email ?></th>
                        <th><?php echo $txt_thead_web ?></th>
                    </tr></thead>
                    <tbody>
                    <?php
                    $getusers = "SELECT * FROM users WHERE ugroup='3' AND ustatus='1' ORDER BY orgname ASC";
                    $rgetusers = mysql_query($getusers) or die( "SQL SELECT failed!" .mysql_error() );
                    while($row = mysql_fetch_array($rgetusers))
				        { 
				        $orgname = $row['orgname'];
                        $prsname = $row['prsname'];
                        $tel = $row['tel'];
                        $email = $row['email'];
                        $email_repl = str_replace("@","[kukac]",$email);
                        $web = $row['web'];
                        echo "<tr><td>" .$orgname. "</td><td>" .$prsname. "</td><td>" .$tel. "</td><td>" .$email_repl. "</td><td>" .$web. "</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
                <br /><br /> 
			</div>
		</div><!-- c2 END -->
			<div class="right_lane"><img src="images/holmi_08.png" alt="holmi" border="0" /></div>
	</div> <!-- content END -->
	<div class="clear"></div>
<?php
include ("footer.php");
?>