<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<url><loc><?php echo url_for('default/index','absolute')?></loc></url>
<url><loc><?php echo url_for('community/index','absolute')?></loc></url>
<url><loc><?php echo url_for('contact/index','absolute')?></loc></url>
<url><loc><?php echo url_for('features/index','absolute')?></loc></url>
<url><loc><?php echo url_for('floorplans/index','absolute')?></loc></url>
<url><loc><?php echo url_for('photos/index','absolute')?></loc></url>
<url><loc><?php echo url_for('privacy-policy/index','absolute')?></loc></url>
<url><loc><?php echo url_for('terms-of-use/index','absolute')?></loc></url>
<url><loc><?php echo url_for('ourpage/'.$propertyTemplate->getCustomPagePermaLink(),'absolute')?></loc></url>
<?php foreach($property->getPropertyBlogArticles() as $blogarticle):?>
<url><loc><?php echo url_for('blog/'.$blogarticle->getPermaLink(),'absolute')?></loc></url>
<?php endforeach;?>
</urlset>
