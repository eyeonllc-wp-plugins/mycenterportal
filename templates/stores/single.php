<?php
$mycenterstore = $this->mcd_settings['mycenterstore'];
$map_config = $this->mcd_settings['map_config'];

$social_links = array('affiliate_url', 'website', 'facebook', 'instagram', 'pinterest', 'twitter', 'youtube');

$store_url = mcd_single_page_url('mycenterstore');
$prev_url = '';
$next_url = '';

if( isset($mycenterstore['prev']) ) {
	$prev_url = $store_url.$mycenterstore['prev']['slug'];
}
if( isset($mycenterstore['next']) ) {
	$next_url = $store_url.$mycenterstore['next']['slug'];
}
?>

<?php if( is_array($mycenterstore) ) : ?>

<div class="mycenterdeals-wrapper mycenterstore">
	<?php if( isset( $mycenterstore['error'] ) ) : ?>
		<div class="mcd-alert"><?= $mycenterstore['error'] ?></div>
	<?php else: ?>
		<div id="mcd-retailer" class="clearfix">
			<div class="mcd-prev-next-nav">
				<?php if( !empty($this->mcd_settings['stores_listing_page']) ) : ?>
					<a href="<?= get_permalink($this->mcd_settings['stores_listing_page']) ?>" class="item back">Back to Stores</a>
				<?php endif; ?>
				<a <?= (!empty($prev_url)?'href="'.$prev_url.'"':'') ?> class="item prev <?= (empty($prev_url)?'disabled':'') ?>"><i class="fas fa-chevron-left"></i><span>Prev</span></a>
				<a <?= (!empty($next_url)?'href="'.$next_url.'"':'') ?> class="item next <?= (empty($next_url)?'disabled':'') ?>"><span>Next</span><i class="fas fa-chevron-right"></i></a>
			</div>

			<div class="mcd-store-cols">
				<div class="mcd-retailer-image-col">
					<div class="mcd-retailer-image">
						<img src="<?= $mycenterstore['retailer_logo'] ?>" />
					</div>
				</div>

				<div class="mcd-retailer-details">
					<div class="mcd-retailer-name"><?= $mycenterstore['retail_name'] ?></div>
					<div class="mcd-retailer-location"><span class="mcd-label">Location:</span> <?= $mycenterstore['location'] ?></div>
					<?php if( !empty($mycenterstore['retailer_phone']) ) : ?>
						<div class="mcd-retailer-phone"><span class="mcd-label">Phone:</span> <?= $mycenterstore['retailer_phone'] ?></div>
					<?php endif; ?>
					<?php if( !empty($mycenterstore['parking_zone']) ) : ?>
						<div class="mcd-parking-zone"><span class="mcd-label">Parking Zone:</span> <?= $mycenterstore['parking_zone'] ?></div>
					<?php endif; ?>
					<div class="mcd-retailer-description editor_output"><?= $mycenterstore['retailer_description'] ?></div>
					
					<?php if( !empty($mycenterstore['vs_link']) ) : ?>
					<div class="mcd-vs-link">
						<a href="<?= $mycenterstore['vs_link'] ?>" target="_blank">
							<img src="<?= mcd_image_url('assets/img/virtual-shopper-button.png') ?>" />
						</a>
					</div>
					<?php endif; ?>

					<?php if( $this->mcd_settings['stores_single_social_links'] ) : ?>
						<?php
						$social_links_html = '';
							foreach ($social_links as $link) {
								if( !empty($mycenterstore[$link]) ) {
									$social_links_html .= '<li class="'.$link.'"><a href="'.$mycenterstore[$link].'" target="_blank">'.$link.'</a></li>';
								}
							}
						?>
						<?php if( !empty($social_links_html) ) : ?>
						<div class="mcd-social-links">
							<ul class="mcd-social-icons"><?= $social_links_html ?></ul>
						</div>
						<?php endif; ?>
					<?php endif; ?>

					<?php if( !empty($this->mcd_settings['map_page']) || !empty($map_config['map_url']) ) :
						$new_tab = false;
						$map_url = get_permalink($this->mcd_settings['map_page']).$mycenterstore['slug'];
						if( !empty($map_config['map_url']) ) {
							$new_tab = true;
							$map_url = $map_config['map_url'];
						}
						?>
						<a href="<?= $map_url ?>" <?= ($new_tab?'target="blank"':'') ?> class="mcd_mapit_link">Find IT</a>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php if( !empty($this->mcd_settings['sharerails_api_key']) && $mycenterstore['sharerail_retailer_id'] != null ) : ?>
			<div ng-app="MyCenterPortalApp">
				<?php include(MCD_PLUGIN_PATH.'templates/stores/single/products.php') ?>
			</div>
		<?php endif; ?>

		<?php include(MCD_PLUGIN_PATH.'templates/stores/single/deals.php') ?>

		<script type="text/javascript">
		jQuery(document).ready(function($) {
			var retail_name = $('#mcd-retailer .mcd-retailer-details .mcd-retailer-name').text();
			ga_event_tracking('StoresSingle', retail_name);
			<?php if( isset($_GET['ref']) && $_GET['ref']=='shop' ) : ?>
				ga_event_tracking('StoresSingleFromShop', retail_name);
			<?php endif; ?>
		});
		</script>
	<?php endif; ?>
</div>

<?php endif; ?>

