<?php
$mycenterblogpost = $this->mcd_settings['mycenterblogpost'];
$mcd_latest_posts = $this->mcd_settings['mcd_latest_posts'];

$blog_post_url = mcd_single_page_url('mycenterblogpost');
$prev_url = '';
$next_url = '';

if( isset($mycenterblogpost['prev']) ) {
	$prev_url = $blog_post_url.$mycenterblogpost['prev']['slug'];
}
if( isset($mycenterblogpost['next']) ) {
	$next_url = $blog_post_url.$mycenterblogpost['next']['slug'];
}
?>

<?php if( is_array($mycenterblogpost) ) : ?>

<div class="mycenterdeals-wrapper mycenterblogpost">
	<?php if( isset( $mycenterblogpost['error'] ) ) : ?>
		<div class="mcd-alert"><?= $mycenterblogpost['error'] ?></div>
	<?php else: ?>
		<div id="mcd-blog-post" class="clearfix">
			<div class="mcd-prev-next-nav">
				<?php if( !empty($this->mcd_settings['blog_listing_page']) ) : ?>
					<a href="<?= get_permalink($this->mcd_settings['blog_listing_page']) ?>" class="item back">Back to Blog</a>
				<?php endif; ?>
				<a <?= (!empty($prev_url)?'href="'.$prev_url.'"':'') ?> class="item prev <?= (empty($prev_url)?'disabled':'') ?>"><i class="fas fa-chevron-left"></i><span>Prev</span></a>
				<a <?= (!empty($next_url)?'href="'.$next_url.'"':'') ?> class="item next <?= (empty($next_url)?'disabled':'') ?>"><span>Next</span><i class="fas fa-chevron-right"></i></a>
			</div>

			<div class="mcd-post-cols">
				<div class="mcd-post-image-col">
					<div class="mcd-post-title show-on-mob"><?= $mycenterblogpost['post_title'] ?></div>
					<div class="mcd-post-featured-image mcd_shadow_img">
						<span class="mcd-post-date">
							<span class="mcd-day"><?= $mycenterblogpost['post_date_day'] ?></span>
							<span class="mcd-month"><?= $mycenterblogpost['post_date_month'] ?></span>
						</span>
						<img src="<?= $mycenterblogpost['featured_image'] ?>" />
					</div>
					<div class="mcd-post-metadata">
						<?php if( $this->mcd_settings['blog_single_show_author'] ) : ?>
							<div class="mcd-posted-by">Posted by <?= $mycenterblogpost['author'] ?></div>
						<?php endif; ?>

						<div class="mcd-posted-on">Posted on <?= $mycenterblogpost['post_date'] ?></div>
						
						<?php if( $this->mcd_settings['blog_single_show_categories'] ) : ?>
							<?php if( count($mycenterblogpost['categories']) > 0 ) : ?>
								<div class="mcd-categories">
									<strong>Categories:</strong>
									<span><?= implode(', ', $mycenterblogpost['categories']) ?></span>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>

				<div class="mcd-post-details-col">
					<div class="mcd-post-title hide-on-mob"><?= $mycenterblogpost['post_title'] ?></div>
					<div class="mcd-post-content editor_output"><?= $mycenterblogpost['post_content'] ?></div>
				</div>

				<div class="mcd-post-sidebar-col">
					<?php if( $this->mcd_settings['blog_single_social_share'] ) : ?>
					<div class="mcd-post-share clearfix">
						<h4 class="mcd-heading">Share</h4>
						<ul class="mcd-social-icons">
							<li class="twitter"><a href="http://twitter.com/share?text=<?= urlencode($mycenterblogpost['post_title']) ?>&url=<?= get_current_url() ?>" target="_blank">Twitter</a></li>
							<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=<?= get_current_url() ?>&quote=<?= urlencode($mycenterblogpost['post_title']) ?>" target="_blank">Facebook</a></li>
							<!-- <li class="pinterest"><a href="http://pinterest.com/pin/create/button/?url=<?= get_current_url() ?>&media=<?= $mycenterblogpost['featured_image'] ?>&description=<?= $mycenterblogpost['post_title'] ?>" target="_blank">Pinterest</a></li> -->
							<li class="email"><a href="mailto:?subject=<?= $mycenterblogpost['post_title'] ?>&body=Hi,%0D%0A%0D%0ACheck this out! - <?= urlencode(get_current_url()) ?>%0D%0A%0D%0A<?= $mycenterblogpost['post_title'] ?>%0D%0A%0D%0A<?= strip_tags($mycenterblogpost['post_content']) ?>%0D%0A%0D%0A">Email</a></li>
						</ul>
					</div>
					<?php endif; ?>
					
					<?php if( count($mcd_latest_posts) > 0 ) : ?>
					<div class="mcd-latest-posts">
						<h4 class="mcd-heading">Latest Posts</h4>
						<div class="mcd-posts">
							<?php foreach($mcd_latest_posts as $post) : ?>
							<a class="mcd-post" href="<?= mcd_single_page_url('mycenterblogpost').$post['slug'] ?>">
								<span class="mcd-image mcd_shadow_img">
									<img src="<?= $post['featured_image'] ?>" alt="<?= $post['post_title'] ?>">
								</span>
								<span class="mcd-title">
									<span><?= $post['post_title'] ?></span>
								</span>
							</a>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<script type="text/javascript">
		jQuery(document).ready(function($) {
			ga_event_tracking('BlogSingle', $('.mcd-post-image-col .mcd-post-title').text());
		});
		</script>

	<?php endif; ?>	
</div>

<?php endif; ?>

