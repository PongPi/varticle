<div ng-controller='SliderController'>
<?php
	$this->renderPartial('/slider/pages/slider_panel');
?>
	<?php
	$this->renderPartial('/slider/pages/slider_add_modal');
	$this->renderPartial('/slider/pages/slider_edit_modal');
	$this->renderPartial('/slider/pages/slider_delete_modal');
	?>
</div>