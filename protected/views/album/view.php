<style type="text/css" media="screen">
@font-face{font-family:'newspaper';src:url('images/icons/newspaper.eot?4');src:url('images/icons/newspaper.eot?4#iefix') format('embedded-opentype'),url('images/icons/newspaper.woff?4') format('woff'),url('images/icons/newspaper.ttf?4') format('truetype'),url('images/icons/newspaper.svg?4#newspaper') format('svg');font-weight:normal;font-style:normal;}	
</style>

<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl() ?>/statics/modal/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo Yii::app()->getBaseUrl() ?>/statics/css/tiled-gallery.css">
<script src="<?php echo Yii::app()->getBaseUrl() ?>/statics/js/tiled-gallery.js"></script>
<script src="<?php echo Yii::app()->getBaseUrl() ?>/statics/modal/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

<script>
	document.onmousedown = function(event) {
	  if (event.button==2) {
	     return false;    
	   }
	}
</script>

<div class="container-fluid">
	<div class="row-fluid ">
		<div class="span11 column_container td-post-content">
			<h1>
				<a href="<?php echo Yii::app()->createUrl('album') ?>">Thư viện ảnh</a> / <?php echo $albumInfo->title ?>
			</h1>
		</div>
		<div class="span1">
			<a href="javascript:;" data-toggle="modal" data-target="#share-modal">chia sẻ</a>
		</div>
	</div>
</div>


<div class="container-fluid">
<div class="row-fluid ">
<div class="span12 column_container td-post-content">




<div class="tiled-gallery type-rectangular" style="min-height:400px;">

	<div class="gallery-row" style="width: 980px;">

			<?php foreach ($photos as $photo): ?>
				<?php if (!preg_match('/^http/i', $photo->image)) { $photo->image = Yii::app()->getBaseUrl() . '/statics/images/album/' . $photo->image; } ?>
				<div class="gallery-group images-<?php echo rand(1,2) ?>">
				<div class="tiled-gallery-item tiled-gallery-item-small">
					<a href="<?php echo $photo->image ?>">
						<img 
						
							data-attachment-id="<?php echo $photo->id ?>" 
							data-orig-file="<?php echo $photo->image ?>" 
							data-orig-size="" 
							data-comments-opened="1" 
							data-image-meta="{'aperture':'0','credit':'','camera':'','caption':'','created_timestamp':'0','copyright':'VNU','focal_length':'0','iso':'0','shutter_speed':'0','title':''}" 
							data-image-title="" 
							data-image-description="" 
							data-medium-file="<?php echo $photo->image ?>" 
							data-large-file="<?php echo $photo->image ?>" 
							src="<?php echo $photo->image ?>" 
							style="height:<?php echo rand(200, 200) ?>px" 
							align="center" 
							title="" 
							alt="" data-recalc-dims="1" />
					</a>

					
				</div>
			</div>
			<?php endforeach; ?>

		
	</div>
</div>


</div>
</div>
</div>


<div class="modal fade" id="share-modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Chia sẻ album</h4>
      </div>
      <div class="modal-body">
      
        	<div class="row-fluid">
	        	<div class="form-group">
					<label>Liên kết</label>
					<input type="text" class="form-control" style="width:90%" value="<?php echo Yii::app()->createAbsoluteUrl('album', array('id'=>$albumInfo->id)) ?>" />
				</div>
        	</div>

        	<div class="row-fluid">
	        	<div class="form-group">
					<label>Mã HTML</label>
					<input type="text" class="form-control" style="width:90%" value="&lt;a href=&quot;<?php echo Yii::app()->createAbsoluteUrl('album', array('id'=>$albumInfo->id)) ?>&quot; title=&quot;<?php echo htmlspecialchars($albumInfo->title) ?>&quot;&gt;<?php echo htmlspecialchars($albumInfo->title) ?>&lt;/a&gt;" />
				</div>
        	</div>
			

       
      </div>
     
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->