<div ng-controller='ArticleController'>

 <?php
	if(in_array('catalogue', Yii::app()->user->role)){
 ?>
	<div class="col-md-8">
	<?php
		$this->renderPartial('/article/pages/article_post_panel');
	?>
	</div>
	<div class="col-md-4">
	<?php
		$this->renderPartial('/article/pages/article_catalogue_panel');
	?>
	</div>
	<?php }else{
		$this->renderPartial('/article/pages/article_post_panel');
	}?>
	<?php
	if(in_array('catalogue', Yii::app()->user->role)){
		$this->renderPartial('/article/pages/article_catalogue_modal');
	}
	$this->renderPartial('/article/pages/article_post_modal');
	$this->renderPartial('/article/pages/article_post_avatar_modal');
	$this->renderPartial('/article/pages/article_post_meta_modal');
	?>
</div>