<?php
$is_list = $args[0];
$cats = get_the_category();
if ($cats):
?>
	<ul class="news-category">
		<?php
		if ($is_list):
			foreach ($cats as $cat):
		?>
				<li>
					<a href="<?php echo esc_url(home_url('/') . 'category/' . $cat->slug . '/') ?>">
						<?php echo $cat->name; ?>
					</a>
				</li>
			<?php
			endforeach;
		else:
			?>
			<li>
				<a href="<?php echo esc_url(home_url('/') . 'category/' . $cats[0]->slug . '/') ?>">
					<?php echo $cats[0]->name; ?>
				</a>
			</li>
		<?php endif; ?>
	</ul>
<?php endif; ?>