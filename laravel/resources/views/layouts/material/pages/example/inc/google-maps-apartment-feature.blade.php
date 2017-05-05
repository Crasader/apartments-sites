<div class="container overlap-ds box-shadow--2dp hidden-sm hidden-xs">
	<div class="location">
		<b><?php echo $entity->getText('google-maps-feature-apartment-title',['oneshot' => $site->getEntity()->getLegacyProperty()->name]); ?></b>
		<p>
			<?php echo $entity->getStreet() . '<br>';
			echo $entity->getCity() . ', ' . $entity->getAbbreviatedState() . ' ';
			echo $entity->getZipCode() . '<br>';
			echo $entity->getPhone();
			?>
		</p>
	</div>
	<div class="hours">
		<b>Office Hours</b>
		<p>
			<?php echo $entity->getText('google-script-hours');?>
		</p>
	</div>
</div>
