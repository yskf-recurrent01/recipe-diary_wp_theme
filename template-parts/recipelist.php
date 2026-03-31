<?php
$the_query = $args[0];
?>

<li class="recipe-list-item">
	<div class="recipe-list-img-wrap">
		<?php if (has_post_thumbnail()) : the_post_thumbnail('large', array('class' => 'recipe-list-img')); ?>
		<?php else: ?>
			<img src="https://placehold.jp/bfbfbf/ffffff/600x750.jpg?text=No%20Photo" alt="" class="recipe-list-img" />
		<?php endif; ?>
	</div>

	<div class="recipe-list-info">
		<?php
		// カスタム投稿のカテゴリを取得するときはget_the_terms()を使う
		$cats = get_the_terms(get_the_ID(), 'recipe_category');
		if ($cats && !is_wp_error($cats)):
			$current_cat = '';
			if (is_tax('recipe_category')) {
				// レシピに登録されているカテゴリーの中から、現在のアーカイブページのカテゴリーとマッチするものだけ抽出して表示する
				// use()...コールバック関数のスコープ外で定義された変数を利用する
				$current_cat = array_find($cats, function ($obj) use ($the_query) {
					if ($obj->slug === $the_query->slug) return $obj;
				});
			}
		?>
			<ul class="recipe-category">
				<?php
				$permalink = home_url('/').'recipe_category/';
				$cat_name='';
				if (empty($current_cat)) {
					$permalink .= $cats[0]->slug;
					$cat_name = $cats[0]->name;
				} else {
					$permalink .= $current_cat->slug;
					$cat_name = $current_cat->name;
				}
				?>
				<li>
					<a href="<?php echo esc_url($permalink);?>"><?php echo $cat_name; ?></a>
				</li>
			</ul>
		<?php endif; ?>
		<h2 class="recipe-list-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>
</li>