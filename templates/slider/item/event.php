<?php
$event_url = $slider_item['event_url'];
if( empty($event_url) ) {
	$event_url = mcd_single_page_url('mycenterevent').$slider_item['slug'];
}
?>

<a class="mcd-event-item" href="<?= $event_url ?>">
	<img src="<?= $slider_item['event_image'] ?>" />

	<?php if( $this->mcd_settings['slider_shortcode_atts']['metadata'] == "true" ) : ?>
	<span class="mcd-event-details">
		<span class="mcd-event-name"><?= $slider_item['event_title'] ?></span>
		<span class="mcd-event-date-time">
			<span class="mcd-event-dates">
				<i class="far fa-calendar-alt"></i>&nbsp;
				<?= $slider_item['event_start_date'].' - '.$slider_item['event_end_date'] ?>
			</span>

			<span class="mcd-event-times">
			<?php if( !empty($slider_item['event_start_time']) && !$slider_item['all_day_event'] ) : ?>
				<i class="far fa-clock"></i>&nbsp;
				<?= $slider_item['event_start_time'] ?> - <?= $slider_item['event_end_time'] ?>
			<?php else : ?>
				&nbsp;
			<?php endif; ?>
			</span>
		</span>
	</span>
	<?php endif; ?>
</a>
