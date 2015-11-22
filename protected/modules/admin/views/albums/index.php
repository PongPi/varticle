<div ng-controller='AlbumsController'>
<?php
	$this->renderPartial('/albums/pages/albums_album_panel');
?>
	<?php
	$this->renderPartial('/albums/pages/albums_album_modal');
	$this->renderPartial('/albums/pages/albums_image_modal');
	$this->renderPartial('/albums/pages/albums_cover_modal');
	?>
</div>