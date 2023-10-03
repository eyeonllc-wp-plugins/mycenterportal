<?php
$mycentercareer = $this->mcd_settings['mycentercareer'];

$career_url = mcd_single_page_url('mycentercareer');
$prev_url = '';
$next_url = '';

if( isset($mycentercareer['prev']) ) {
	$prev_url = $career_url.$mycentercareer['prev']['slug'];
}
if( isset($mycentercareer['next']) ) {
	$next_url = $career_url.$mycentercareer['next']['slug'];
}
?>

<?php if( is_array($mycentercareer) ) : ?>

<div class="mycenterdeals-wrapper mycentercareer">
	<?php if( isset( $mycentercareer['error'] ) ) : ?>
		<div class="mcd-alert"><?= $mycentercareer['error'] ?></div>
	<?php else: ?>
		<div id="mcd-career" class="clearfix">
			<div class="mcd-prev-next-nav">
				<?php if( !empty($this->mcd_settings['careers_listing_page']) ) : ?>
					<a href="<?= get_permalink($this->mcd_settings['careers_listing_page']) ?>" class="item back">Back to Careers</a>
				<?php endif; ?>
				<a <?= (!empty($prev_url)?'href="'.$prev_url.'"':'') ?> class="item prev <?= (empty($prev_url)?'disabled':'') ?>"><i class="fas fa-chevron-left"></i><span>Prev</span></a>
				<a <?= (!empty($next_url)?'href="'.$next_url.'"':'') ?> class="item next <?= (empty($next_url)?'disabled':'') ?>"><span>Next</span><i class="fas fa-chevron-right"></i></a>
			</div>

			<div class="mcd-career-cols">
				<div class="mcd-career-image-col">
					<div class="mcd-retailer-image">
						<img src="<?= $mycentercareer['retailer_logo'] ?>" />
					</div>
					<div class="mcd-retailer-name mcd-hide"><?= $mycentercareer['retailer_name'] ?></div>
				</div>

				<div class="mcd-career-details">
					<div class="mcd-career-title"><?= $mycentercareer['career_title'] ?></div>
					<div class="mcd-career-description editor_output"><?= $mycentercareer['description'] ?></div>
					<div class="mcd-career-center-location"><span class="mcd-label">Retailer Location:</span> <?= $mycentercareer['retailer_location'] ?></div>

					<?php if( !empty($mycentercareer['apply_link']) ) : ?>
					<div class="mcd-apply-link"><a href="<?= $mycentercareer['apply_link'] ?>" class="mcp_btn rounded" target="_blank">Apply Now</a></div>
					<?php endif; ?>

					<?php if( !empty($mycentercareer['contact_name']) || !empty($mycentercareer['contact_email']) || !empty($mycentercareer['contact_phone']) ) : ?>
					<div class="mcd-contact-details">
						<span class="mcd-label">Contact Details:</span>
						<?php if( !empty($mycentercareer['contact_name']) ) : ?>
							<div class="mcd-contact-detail"><?= $mycentercareer['contact_name'] ?></div>
						<?php endif; ?>
						<?php if( !empty($mycentercareer['contact_email']) ) : ?>
							<div class="mcd-contact-detail"><?= $mycentercareer['contact_email'] ?></div>
						<?php endif; ?>
						<?php if( !empty($mycentercareer['contact_phone']) ) : ?>
							<div class="mcd-contact-detail"><?= $mycentercareer['contact_phone'] ?></div>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<?php if( isset($mycentercareer['start_date']) || isset($mycentercareer['end_date']) ) :?>
					<div class="mcd-career-dates">
						<?php if( isset($mycentercareer['start_date']) ) :?>
						<div class="mcd-start-date"><span class="mcd-label">Start Date:</span> <?= $mycentercareer['start_date'] ?></div>
						<?php endif; ?>
						<?php if( isset($mycentercareer['end_date']) ) :?>
						<div class="mcd-end-date"><span class="mcd-label">End Date:</span> <?= $mycentercareer['end_date'] ?></div>
						<?php endif; ?>
					</div>
					<?php endif; ?>

					<?php if( $this->mcd_settings['careers_single_social_share'] ) : ?>
					<div class="mcd-career-share clearfix">
						<ul class="mcd-social-icons">
							<li class="twitter"><a href="http://twitter.com/share?text=<?= urlencode($mycentercareer['career_title']) ?>&url=<?= get_current_url() ?>" target="_blank">Twitter</a></li>
							<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?= get_current_url() ?>&quote=<?= urlencode($mycentercareer['career_title']) ?>" target="_blank">Facebook</a></li>
							<!-- <li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?= get_current_url() ?>&media=<?= $mycentercareer['retailer_logo'] ?>&description=<?= $mycentercareer['career_title'] ?>" target="_blank">Pinterest</a></li> -->
							<li class="email"><a href="mailto:?subject=<?= $mycentercareer['retailer_name'] ?> - <?= $mycentercareer['career_title'] ?>&body=Hi,%0D%0A%0D%0ACheckout this Job! - <?= urlencode(get_current_url()) ?>%0D%0A%0D%0A<?= $mycentercareer['career_title'] ?>%0D%0A%0D%0A<?= strip_tags($mycentercareer['description']) ?>%0D%0A%0D%0AStore: <?= $mycentercareer['retailer_name'] ?>%0D%0ACenter Location: <?= $mycentercareer['center_name'] ?>, <?= $mycentercareer['center_location'] ?>%0D%0APhone: <?= $mycentercareer['retailer_phone'] ?>%0D%0A%0D%0A">Email</a></li>
						</ul>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<script type="text/javascript">
		jQuery(document).ready(function($) {
			ga_event_tracking('CareersSingle', $('.mcd-career-title').text()+' ('+$('.mcd-retailer-name').text()+')');
		});
		</script>

	<?php endif; ?>
</div>

<?php endif; ?>

