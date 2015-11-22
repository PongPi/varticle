<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8 column_container">
			
			<h1 itemprop="name" class="entry-title td-page-title">
			<span><?php echo $catInfo->cat_name ?></span>
			</h1>
			<?php $i = 0; ?>
			<?php foreach ($posts as $post): $i++; ?>
			<?php if ($i % 2 == 1):  ?><div class="wpb_row row-fluid"><?php endif; ?>
				<?php $post_url = Yii::app()->createUrl('post', array('id'=>$post->id)) ?>
				<div class="span6">
					<div class="td_mod5 td_mod_wrap " itemscope="" itemtype="http://schema.org/Article">
						<div class="thumb-wrap">
							<a href="<?php echo $post_url ?>" rel="bookmark" title="<?php echo $post->post_title ?>">
								<img width="326" height="159" itemprop="image" class="entry-thumb" src="<?php echo $post->post_img ?>" alt="">
							</a>
						</div>
						<h3 itemprop="name" class="entry-title">
						<a itemprop="url" href="<?php echo $post_url ?>" rel="bookmark" title="<?php echo $post->post_title ?>">
							<?php echo $post->post_title ?>
						</a>
						</h3>
						<div class="meta-info">
							<time itemprop="dateCreated" class="entry-date updated" datetime="<?php echo $post->post_date ?>">
							<?php echo date('d/m/Y', strtotime($post->post_date)) ?>
							</time>
							<div class="entry-comments-views">
								<?php echo $catInfo->cat_name ?>
							</div>
						</div>
						<div class="td-post-text-excerpt">
							<?php echo $post->post_desc ?>
						</div>
					</div>
					</div> <!-- ./span6 -->
					<?php if ($i % 2 == 0): ?></div><!--./row-fluid--><?php endif; ?>
					<?php endforeach; ?>
				<?php if ($i % 2 == 1):  echo '</div>'; endif; ?>
			</div>
			<div class="span4 column_container">
				<div class="td_block_wrap td_popular_categories widget widget_categories">
					<h4 class="block-title">
						<a href="<?php echo Yii::app()->createUrl('cat/view') ?>"><span>Các chuyên mục</span></a>
					</h4>
					<ul>
						<li>
							<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>1)) ?>">Giới thiệu<span class="td-cat-no"></span></a>
						</li>
						<li>
							<a href="">Tin tức - sự kiện<span class="td-cat-no"></span></a>
						</li>
						<li>
							<a href="">Hội nghị - hội thảo<span class="td-cat-no"></span></a>
						</li>
						<li>
							<a href="">Album ảnh<span class="td-cat-no"></span></a>
						</li>
						<li>
							<a href="">Chuyên đề<span class="td-cat-no"></span></a>
						</li>
						<li>
							<a href="">Bản tin tạp chí KHCN<span class="td-cat-no"></span></a>
						</li>
						
					</ul>
				</div> <!-- ./block -->
				<div class="td_block_wrap td_block4">
					<h4 class="block-title">
					<span>Bài viết khác</span>
					</h4>
					<?php foreach($newsEvent as $post): ?>
					<?php $post_url = Yii::app()->createUrl('post', array('id'=>$post->id)); ?>
					<div class="td_block_inner">
						<div class="td_mod3 td_mod_wrap " itemscope="" itemtype="http://schema.org/Article">
							<div class="thumb-wrap">
								<a href="<?php echo $post_url ?>">
									<img width="100" height="65" class="entry-thumb" src="<?php echo !empty($post->post_img) ? $post->post_img : (Yii::app()->getBaseUrl() . '/statics/images/logo/vnu20.jpg') ?>" alt="">
								</a>
							</div>
							<div class="item-details">
								
								<h3 itemprop="name" class="entry-title">
								<a itemprop="url" href="<?php echo $post_url ?>" rel="bookmark">
									<?php echo $post->post_title ?>
								</a>
								</h3>
								<div class="meta-info">
									
									<time itemprop="dateCreated" class="entry-date updated" datetime="<?php echo $post->post_date ?>">
									<?php echo date('d/m/Y', strtotime($post->post_date)); ?>
									</time>
									<span>
									
									<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>$post->id)) ?>">
										<?php echo isset($post->post_cat->cat_name) ? $post->post_cat->cat_name : ''; ?>
									</a>
									</span>
								</div>
							</div>
						</div>
						</div><!-- ./block1 -->
						<?php endforeach; ?>
					</div>
					
				</div>
			</div>
		</div>