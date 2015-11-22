<h3>Danh mục</h3>
<div class="">
	<!-- <button type="button" class="btn btn-success btn-sm fr" ng-click="newcatalogue()">
		<span class="glyphicon glyphicon-plus"></span>
	</button> -->
</div>
<hr>
<table class="table table-hover table-bordered table-striped">
<thead>
	<tr>
		<th>Mã số</th>	        	
		<th >Tên</th>
		<th width="5%" class="center">Công cụ</th>
	</tr>
</thead>
	<tr ng-repeat="catalogue in allcatalogue" ng-class="{'warning' : catalogue.cat_status == 0}">
		<td>{{catalogue.id}}</td>
		<td>{{catalogue.cat_name}}
			<!-- <img height="64px" ng-show="post.post_img" ng-src="{{post.post_img}}" alt="{{post.post_title}}">         -->
	        <img width="128px" ng-show="catalogue.cat_img" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/catalogue/{{catalogue.cat_img}}" alt="{{catalogue.cat_name}}">        
		</td>
		<td>
			<div class="dropdown">			
				<a class="btn btn-default btn-sm" role="button" data-toggle="dropdown" data-target="#catalogue-{{catalogue.id}}">
					<span class="glyphicon glyphicon-cog"></span>
				</a>
				<ul id="#catalogue-{{catalogue.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
				<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="avatarcatalogue(catalogue)">Hình đại diện</a></li>
				<li ng-show="catalogue.cat_status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usescatalogue(catalogue,1)">Sử dụng</a></li>
				<li ng-show="catalogue.cat_status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usescatalogue(catalogue,0)">Ngưng sử dụng</a></li>				
				<li role="presentation" class="divider"></li>
				<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="editcatalogue(catalogue)">cập nhật</a></li>
				<!-- <li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deletecatalogue(catalogue)">xóa</a></li>				 -->
				</ul>
			</div>
		</td>
	</tr>
</table>
<?php

// $this->renderPartial('/permissions/pages/index_modal_group');
// $this->renderPartial('/permissions/pages/index_modal_permission');
?>