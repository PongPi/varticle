<?php $static = Yii::app()->getBaseUrl() . '/statics/slider'; ?>

<!DOCTYPE html>
<html>
<head>
<title>Timeline</title>
<meta name="description" content="Content Timeline HTML5/jQuery plugin">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,500&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
<link href="<?php echo $static ?>/css/dark.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $static ?>/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $static ?>/css/lightbox.css" rel="stylesheet" type="text/css" />

<!--[if lt IE 9]>
<link href="css/ie8fix.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript" src="<?php echo $static ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $static ?>/js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="<?php echo $static ?>/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo $static ?>/js/jquery.timeline.min.js"></script>
<script type="text/javascript" src="<?php echo $static ?>/js/image.js"></script>
<script type="text/javascript" src="<?php echo $static ?>/js/lightbox.js"></script>


<script type="text/javascript">
	$(window).load(function() {

		$('.timeline').timeline({
			left_symbol:"+",
			'startItem': '20/11/2014',
			'categories' : ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'], 
		});
		
	});	
</script>
</head>
<body>

<div class="timelineLoader">
	<img src="<?php echo $static ?>/images/loadingAnimation.gif" />
</div>
<!-- BEGIN DARK -->
<div class="timeline tl">
		<?php foreach ($sliders as $item): ?>
			<?php $item['date'] = date('d/m/Y', strtotime($item['date'])); ?>
			<div class="item" data-id="<?php echo (string) $item['date'] ?>" data-description="<?php echo $item['title'] ?>">
				<img src="<?php echo $item['img'] ?>" alt=""/>
				<h2>Tháng <?php echo date('m/Y', strtotime($item['date'])) ?></h2>
				<span><?php echo $item['title'] ?></span>
			</div>
			<div class="item_open" data-id="<?php echo (string) $item['date'] ?>">
				<div class="item_open_cwrapper" style="position: relative;">
					<div class="t_close" data-count="3" data-id="<?php echo (string) $item['date'] ?>">Close</div>
					<div class="item_open_content">
						<div class="timeline_open_content">
							<?php echo htmlspecialchars_decode($item['description']) ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		

</div> <!-- END DARK -->

</body>
</html>