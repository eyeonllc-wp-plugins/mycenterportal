<?php
$retailer_deals = array();
if( $this->mcd_settings['stores_single_deals'] ) {
	$req_url = MCD_API_RETAILER_DEALS.'?center='.$this->mcd_settings['center_id'].'&retailer='.$mycenterstore['id'].'&limit='.$this->mcd_settings['stores_single_deals_fetch'];
	$retailer_deals = mcd_api_data($req_url);
}
?>

<?php if( $this->mcd_settings['stores_single_deals'] && isset($retailer_deals['deals']) && count($retailer_deals['deals']) > 0 ) : ?>
	<div id="mcd-retailer-deals">
		<h3>Deals</h3>
		<div class="mcd-retailer-deals-wrapper grid<?= $this->mcd_settings['stores_single_deals_per_row'] ?>">
			<?php foreach ($retailer_deals['deals'] as $key => $deal) : ?>
			<a class="mcd-deal-item" href="<?= mcd_single_page_url('mycenterdeal').$deal['slug'] ?>">
				<span class="mcd-deal-image">
					<img src="<?= $deal['deal_image'] ?>" />
					<span class="mcd-retailer-logo">
						<img src="<?= $deal['retailer_logo'] ?>" />
					</span>
				</span>
				<span class="mcd-deal-content">
					<span class="mcd-deal-details">
						<span class="mcd-retailer-name"><?= $deal['retailer_name'] ?></span>
						<span class="mcd-sep"></span>
						<span class="mcd-deal-title"><?= $deal['deal_title'] ?></span>
						<span class="mcd-deal-end-date">Valid until <?= $deal['deal_end_date'] ?></span>
					</span>
				</span>
			</a>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>	
