<a class="mcd-deal-item <?= ( $this->mcd_settings['slider_shortcode_atts']['metadata'] == "true" ? '' : 'nometadata' ) ?>" href="<?= mcd_single_page_url('mycenterdeal').$slider_item['slug'] ?>">
	<span class="mcd-deal-image">
		<img src="<?= $slider_item['deal_image'] ?>">

		<span class="mcd-retailer-logo">
			<img src="<?= $slider_item['retailer_logo'] ?>">
		</span>
	</span>

	<?php if( $this->mcd_settings['slider_shortcode_atts']['metadata'] == "true" ) : ?>
	<span class="mcd-deal-content">
		<span class="mcd-deal-details">
			<span class="mcd-retailer-name"><?= $slider_item['retailer_name'] ?></span>
			<span class="mcd-sep"></span>
			<span class="mcd-deal-title"><?= $slider_item['deal_title'] ?></span>
			<span class="mcd-deal-end-date">Valid until <?= $slider_item['deal_end_date'] ?></span>
		</span>
	</span>
	<?php endif; ?>
</a>