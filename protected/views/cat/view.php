<?php $this->title = 'Thư mục các danh mục'; ?>


<script>
jQuery(function () {
    jQuery('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    jQuery('.tree li.parent_li > span').on('click', function (e) {
        var children = jQuery(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            jQuery(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            jQuery(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});
</script>

<style type="text/css" media="screen">
.label,.badge{display:inline-block;padding:4px 6px;font-size:16px;font-weight:300;line-height:16px;color:#ffffff;vertical-align:baseline;white-space:nowrap;background-color:#999999; border:0 !important}
.label{-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;}
.badge{padding-left:9px;padding-right:9px;-webkit-border-radius:9px;-moz-border-radius:9px;border-radius:9px;}
.label:empty,.badge:empty{display:none;}
a.label:hover,a.label:focus,a.badge:hover,a.badge:focus{color:#ffffff;text-decoration:none;cursor:pointer;}
.label-important,.badge-important{background-color:#b94a48;}
.label-important[href],.badge-important[href]{background-color:#953b39;}
.label-warning,.badge-warning{background-color:#f89406;}
.label-warning[href],.badge-warning[href]{background-color:#c67605;}
.label-success,.badge-success{background-color:#468847;}
.label-success[href],.badge-success[href]{background-color:#356635;}
.label-info,.badge-info{background-color:#3a87ad;}
.label-info[href],.badge-info[href]{background-color:#2d6987;}
.label-inverse,.badge-inverse{background-color:#333333;}
.label-inverse[href],.badge-inverse[href]{background-color:#1a1a1a;}
.btn .label,.btn .badge{position:relative;top:-1px;}
.btn-mini .label,.btn-mini .badge{top:0;}	.tree {
    min-height:20px;
    padding:19px;
    margin-bottom:20px;
    background-color:#fbfbfb;
    border:1px solid #999;
    -webkit-border-radius:4px;
    -moz-border-radius:4px;
    border-radius:4px;
    -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
    -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
}
.tree li {
    list-style-type:none;
    margin:0;
    padding:10px 5px 0 5px;
    position:relative;
}
.tree li::before, .tree li::after {
    content:'';
    left:-20px;
    position:absolute;
    right:auto;
}
.tree li::before {
    border-left:1px solid #999;
    bottom:50px;
    height:100%;
    top:0;
    width:1px;
}
.tree li::after {
    border-top:1px solid #999;
    height:20px;
    top:25px;
    width:25px;
}
.tree li span {
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    border:1px solid #999;
    border-radius:5px;
    display:inline-block;
    padding:8px 8px;
    text-decoration:none;
}
.tree li.parent_li>span {
    cursor:pointer;
}
.tree>ul>li::before, .tree>ul>li::after {
    border:0;
}
.tree li:last-child::before {
    height:30px;
}
.tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
    
    border:1px solid #94a0b4;
   
}
</style>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span8 column_container">
			
			<h1 itemprop="name" class="entry-title td-page-title">
			<span>Các danh mục</span>
			</h1>

			<div>

				<div class="tree well">
				    <ul>
				        <li>
				            
				            	<span class="badge badge-success">
				            		<i class="icon-folder-open"></i> Danh mục chính
				            	</span>
				            
				            <ul>
				            	<li>
				            		<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>8)) ?>">
				            			<span class="badge badge-success"><i class="icon-minus-sign"></i> Giới thiệu</span>
				            		</a>
				            		<ul>
				                        <li>
				                        	<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>8)) ?>">
					                        	<span class="badge badge-warning"><i class="icon-leaf"></i> Giới thiệu chung</span>
					                        </a>
				                        </li>
				                        <li>
				                        	<a href="<?php echo Yii::app()->createUrl('p/maps') ?>">
					                        	<span class="badge badge-warning"><i class="icon-leaf"></i> Sơ đồ đuờng vào VNU</span>
					                        </a>
				                        </li>
				                        <li>
				                        	<a href="http://www.vnuhcm.edu.vn/Default.aspx?ModuleId=af0dd9fc-002d-494b-8ad4-b9ebf1943068">
					                        	<span class="badge badge-warning"><i class="icon-leaf"></i> Liên hệ</span>
					                        </a>
				                        </li>
				                        <li>
				                        	<a href="http://www.vnuhcm.edu.vn/Default.aspx?TopicId=ab69c12c-b302-4dd4-ab23-477f72a3494d">
					                        	<span class="badge badge-warning"	><i class="icon-leaf"></i> Các liên kết</span>
					                        </a>
				                        </li>
				                    </ul>
				            	</li>

				            	<li>
				            		<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>9)) ?>">
				            			<span class="badge badge-success"><i class="icon-minus-sign"></i> Tin tức - sự kiện</span>
				            		</a>
				            	</li>

				            	<li>
				            		<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>10)) ?>">
				            			<span class="badge badge-success"><i class="icon-minus-sign"></i> Hội nghị - hội thảo</span>
				            		</a>
				            	</li>

				            	<li>
				            		<span class="badge badge-success"><i class="icon-minus-sign"></i> Media</span>
				            		<ul>
				            			<li>
				            				<a href="<?php echo Yii::app()->createUrl('album') ?>">
					                        	<span class="badge badge-warning"><i class="icon-leaf"></i> Thư viện ảnh</span>
					                        </a>
				                        </li>
				                        <li>
				                        	<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>11)) ?>">
					                        	<span class="badge badge-warning"><i class="icon-leaf"></i> Sách VNU</span>
					                        </a>
				                        </li>
				                        <li>
				                        	<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>12)) ?>">
					                        	<span class="badge badge-warning"><i class="icon-leaf"></i> Phim VNU</span>
					                        </a>
				                        </li>
				            		</ul>
				            	</li>

				            	<li>
				            		<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>13)) ?>">
				            			<span class="badge badge-success"><i class="icon-minus-sign"></i> Chuyên đề</span>
				            		</a>
				            	</li>

				            	<li>
				            		<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>14)) ?>">
				            			<span class="badge badge-success"><i class="icon-minus-sign"></i> Bản tin - tạp chí KHCN</span>
				            		</a>
				            	</li>
				            </ul>
				        </li>

				        <li>
				        	<a href="<?php echo Yii::app()->createUrl('cat', array('id'=>18)) ?>">
								<span class="badge badge-success">
									<i class="icon-folder-open"></i> Hồ sơ lưu trữ
								</span>
							</a>
				        </li>

				    </ul>

				</div>


			</div>
			
		</div>
		
		<div class="span4 column_container">
			<div class="td_block_wrap td_popular_categories widget widget_categories">
					<h4 class="block-title"><span >Các chuyên mục</span></h4>
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
			
					
		</div>
	</div>
</div>