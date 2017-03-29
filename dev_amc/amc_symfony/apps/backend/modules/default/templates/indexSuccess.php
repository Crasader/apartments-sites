<h5>Property Website Administration</h5>
<table style="border-spacing: 5px; border-collapse: separate;">
<tr>
	<td valign="top">
		<table class="hstats">
		<tr>
			<th>Missing Photos</th>
		</tr>
		<?php while($row = $stPhotos->fetch()):?>
			<tr><td><?php echo $row['name']?></td></tr>
		<?php endwhile;?>
		</table>
	</td>
	<td valign="top">
		<table class="hstats">
		<tr>
			<th>Missing Floorplans</th>
		</tr>
		<?php while($row = $stFloorplans->fetch()):?>
			<tr><td><?php echo $row['name']?></td></tr>
		<?php endwhile;?>
		</table>
	</td>
	<td valign="top">
		<table class="hstats">
		<tr>
			<th>Missing Apartment Features</th>
		</tr>
		<?php while($row = $stAptFeatures->fetch()):?>
			<tr><td><?php echo $row['name']?></td></tr>
		<?php endwhile;?>
		</table>
	</td>
	<td valign="top">
		<table class="hstats">
		<tr>
			<th>Missing Community Features</th>
		</tr>
		<?php while($row = $stComFeatures->fetch()):?>
			<tr><td><?php echo $row['name']?></td></tr>
		<?php endwhile;?>
		</table>
	</td>
	<td valign="top">
		<table class="hstats">
		<tr>
			<th>Missing</th><th>description</th><th>directions</th><th>logo</th><th>application</th><th>special</th>
			<th>address</th><th>city</th><th>state</th><th>zip</th><th>phone</th><th>fax</th>
		</tr>
		<?php while($row = $stTemplate->fetch()):?>
			<tr><td><?php echo $row['name']?></td><td><?php echo $row['description']?></td><td><?php echo $row['directions']?></td>
			<td><?php echo $row['logo_image']?></td><td><?php echo $row['application']?></td><td><?php echo $row['special']?></td>
			<td><?php echo $row['address']?></td><td><?php echo $row['city']?></td><td><?php echo $row['state_id']?></td>
			<td><?php echo $row['zip']?></td><td><?php echo $row['phone']?></td><td><?php echo $row['fax']?></td>
			</tr>
		<?php endwhile;?>
		</table>
	</td>
</tr>
</table>