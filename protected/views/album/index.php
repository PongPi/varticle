<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl() ?>/statics/css/tiled-gallery.css">
<?php /*
<script src="<?php echo Yii::app()->getBaseUrl() ?>/statics/js/tiled-gallery.js"></script>
*/ ?>
<div class="container-fluid">
	<div class="row-fluid ">
		<div class="span12 column_container td-post-content">
			<h1>
				Thư viện ảnh VNU20
			</h1>
		</div>
	</div>
</div>


<div class="container-fluid">
<div class="row-fluid ">
<div class="span12 column_container td-post-content">




<div class="tiled-gallery-album type-rectangular" style="min-height:400px;">

	<div class="gallery-row">

		<div class="gallery-group images-2" >

			<?php foreach ($albums as $albumItem): ?>

				<div class="tiled-gallery-item tiled-gallery-item-small">
					<a href="<?php echo Yii::app()->createUrl('album', array('id'=>$albumItem->id)) ?>">
						<img 
							<?php if (!preg_match('/^http/i', $albumItem->cover)) { $albumItem->cover = Yii::app()->getBaseUrl() . '/statics/images/album/' . $albumItem->cover; } ?>
							data-attachment-id="<?php echo $albumItem->id ?>" 
							data-orig-file="<?php echo $albumItem->cover ?>" 
							data-orig-size="" 
							data-comments-opened="1" 
							data-image-meta="{'aperture':'0','credit':'','camera':'','caption':'<?php echo $albumItem->desc ?>','created_timestamp':'0','copyright':'VNU','focal_length':'0','iso':'0','shutter_speed':'0','title':''}" 
							data-image-title="<?php echo $albumItem->title ?>" 
							data-image-description="<?php echo $albumItem->desc ?>" 
							data-medium-file="<?php echo $albumItem->cover ?>" 
							data-large-file="<?php echo $albumItem->cover ?>" 
							src="<?php echo $albumItem->cover ?>" 
							style="height: 250px;" 
							align="center" 
							title="<?php echo $albumItem->title ?>" 
							alt="" data-recalc-dims="1" />
					</a>

					<div class="tiled-gallery-caption" style="display:block">
						<?php echo $albumItem->title ?>
					</div>
				</div>

			<?php endforeach; ?>

		</div>
	</div>
</div>


</div>
</div>
</div>