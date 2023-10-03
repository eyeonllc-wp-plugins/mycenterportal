<style type="text/css">
:root {
	--mcdAccentColor: <?= $mcd_settings['accent_color'] ?>;
	--mcdDefaultColor: #444;
	--mcdLightGreyColor: #AAA;
}

<?php if( !empty($mcd_settings['default_page_width']) ) : ?>
.mycenterdeals-wrapper { max-width: <?= $mcd_settings['default_page_width'] ?>px; }
<?php endif; ?>

<?php if( $mcd_settings['deals_listing_page_width'] == 'fullwidth' ) : ?>
.mycenterdeals-wrapper.mycenterdeals { max-width: 100%; }
<?php endif; ?>

<?php if( $mcd_settings['deals_single_page_width'] == 'fullwidth' ) : ?>
.mycenterdeals-wrapper.mycenterdeal { max-width: 100%; }
<?php endif; ?>

<?php if( $mcd_settings['stores_listing_page_width'] == 'fullwidth' ) : ?>
.mycenterdeals-wrapper.mycenterstores { max-width: 100%; }
<?php endif; ?>

<?php if( $mcd_settings['stores_single_page_width'] == 'fullwidth' ) : ?>
.mycenterdeals-wrapper.mycenterstore { max-width: 100%; }
<?php endif; ?>

<?php if( $mcd_settings['events_listing_page_width'] == 'fullwidth' ) : ?>
.mycenterdeals-wrapper.mycenterevents { max-width: 100%; }
<?php endif; ?>

<?php if( $mcd_settings['events_single_page_width'] == 'fullwidth' ) : ?>
.mycenterdeals-wrapper.mycenterevent { max-width: 100%; }
<?php endif; ?>

<?php if( $mcd_settings['careers_listing_page_width'] == 'fullwidth' ) : ?>
.mycenterdeals-wrapper.mycentercareers { max-width: 100%; }
<?php endif; ?>

<?php if( $mcd_settings['careers_single_page_width'] == 'fullwidth' ) : ?>
.mycenterdeals-wrapper.mycentercareer { max-width: 100%; }
<?php endif; ?>

<?php if( $mcd_settings['instagram_page_width'] == 'fullwidth' ) : ?>
.mycenterdeals-wrapper.mcd_instagram_wrapper { max-width: 100%; }
<?php endif; ?>

<?php if( isset($mcd_settings['instagram_items_desktop']) ) : ?>
.mcd_instagram_gallery {
	grid-template-columns: repeat(<?= $mcd_settings['instagram_items_desktop'] ?>, 1fr) !important;
}
<?php endif; ?>


#mycenterdeals-wrapper.loading:after {
	background-image: url(<?= mcd_image_url('assets/img/loader.svg') ?>);
}
#mcd-load-more-div.loading {
	background-image: url(<?= mcd_image_url('assets/img/loader.svg') ?>);
}
#mcd-deal .mcd-deal-image-col .mcd-deal-image {
	background-image: url(<?= mcd_image_url('assets/img/placeholder.jpg') ?>);
}
ul.mcd-social-icons li a {
	background-image: url(<?= mcd_image_url('assets/img/social-icons.png') ?>);
}

#mcd-events-grid {
	grid-template-columns: repeat(<?= $mcd_settings['events_listing_events_per_row'] ?>, 1fr);
}

#mycentercareers {
	grid-template-columns: repeat(<?= $mcd_settings['careers_listing_careers_per_row'] ?>, 1fr);
}

#mycenterblog {
	grid-template-columns: repeat(<?= $mcd_settings['blog_listing_posts_per_row'] ?>, 1fr);
}
#mycenterblog.isotope .mcd-blog-post-item {
	width: <?= round(100/$mcd_settings['blog_listing_posts_per_row'], 2) ?>%;
}

/* Retailers List */
<?php if( isset($mcd_settings['stores_listing_store_background']) ) : ?>
.mcd-retailer-listing .mcd-retailer .mcd-retailer-image {
	background-color: <?= $mcd_settings['stores_listing_store_background'] ?> !important;
}
<?php endif; ?>

/* Single store products */
#mcd-retailer-products .products {
	grid-template-columns: repeat(<?= $mcd_settings['store_products_per_row'] ?>, 1fr);
	<?php if( $mcd_settings['store_products_per_row'] == 3 ) : ?>
		grid-gap: 60px 50px;
	<?php elseif( $mcd_settings['store_products_per_row'] == 4 ) : ?>
		grid-gap: 60px 30px;
	<?php elseif( $mcd_settings['store_products_per_row'] == 5 ) : ?>
		grid-gap: 50px 30px;
	<?php elseif( $mcd_settings['store_products_per_row'] == 6 ) : ?>
		grid-gap: 40px 20px;
	<?php endif; ?>
}


/* RESPONSIVENESS */
@media screen and (max-width: <?= ($mcd_settings['default_page_width']-1) ?>px) {
	.mycenterdeals-wrapper {
		padding: 0 10px;
	}
}
@media screen and (max-width: 768px) {
	.mcd_instagram_gallery {
		grid-template-columns: repeat(<?= $mcd_settings['instagram_items_tablet'] ?>, 1fr) !important;
	}
}

@media screen and (max-width: 480px) {
	.mcd_instagram_gallery {
		grid-template-columns: repeat(<?= $mcd_settings['instagram_items_mobile'] ?>, 1fr) !important;
	}
}
</style>

<script type="text/javascript">
window.MCD_CURRENT_THEME = '<?= mcd_current_theme_name() ?>';
window.MCP_BLANK_IMAGE_URL = '<?= mcd_image_url() ?>';
window.MCP_CENTER_ID = '<?= $mcd_settings['center_id'] ?>';
window.MCP_SHARERAILS_RETAILERS = '<?= MCP_SHARERAILS_RETAILERS ?>';
window.MCP_SINGLE_STORE_URL = '<?= mcd_single_page_url('mycenterstore') ?>';
window.MCP_SINGLE_ARTICLE_URL = '<?= mcd_single_page_url('mycenterarticle') ?>';

window.McpFriendlyUrl = function(str) {
	var encodedUrl = str.toString().toLowerCase();
	encodedUrl = encodedUrl.split(/\'/).join("");
	encodedUrl = encodedUrl.split(/’/).join("");
	encodedUrl = encodedUrl.split(/[^a-z0-9\-]/).join("-");
	encodedUrl = encodedUrl.split(/-+/).join("-");
	encodedUrl = encodedUrl.replace(/-$/, "");
	encodedUrl = encodedUrl.replace(/^-/, "");
	return encodedUrl; 
}
</script>