<h3>Bài viết</h3>
<p class="align_r">
	<button type="button" class="btn btn-success btn-sm" ng-click="newpost()">
		<span class="glyphicon glyphicon-plus"></span>
	</button>
</p>
<hr>
<table class="table table-hover table-bordered table-striped">
<thead>
	<tr>
		<th width="1%" class="center">#</th>
		<th width="7%" >Mã số</th>	 
		<th>Hình</th>       	
		<th>Tiêu đề</th>
		<th>Danh mục</th>
		<th>Loại</th>
		<th width="5%" class="center">Công cụ</th>
	</tr>
</thead>
	<tr ng-repeat="post in allpost" ng-class="{'warning' : post.post_status == 0}">
		<td>{{$index+1}}</td>
		<td>{{post.id}}</td>		
		<td>
			<!-- <div ng-show="post.post_img" class="thumbnail"> -->
	        <img width="128px" ng-show="post.post_img && post.post_img.indexOf('http://') != -1" ng-src="{{post.post_img}}" alt="{{post.post_title}}">        
	        <img width="128px" ng-show="post.post_img && post.post_img.indexOf('http://') == -1" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/article/{{post.post_img}}" alt="{{post.post_title}}">        
	        <!-- </div> -->


		</td>
				
		<td>{{post.post_title}} 
		<br>(<a href="<?php echo Yii::app()->createUrl('post', array('id'=>0)) ?>{{post.id}}">xem</a>)</td>
		<td>{{post.catalogue.cat_name}}</td>
		<td>
			<span ng-show="post.post_type == 'link'">Liên kết</span>
			<span ng-show="post.post_type == 'post'">Bài viết</span>
		</td>
		<td>
			<div class="dropdown">			
				<a class="btn btn-default btn-sm" role="button" data-toggle="dropdown" data-target="#post-{{post.id}}">
					<span class="glyphicon glyphicon-cog"></span>
				</a>
				<ul id="#post-{{post.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
				<li ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)" role="presentation"><a role="menuitem" tabindex="-1" ng-click="avatarpost(post)">Hình đại diện</a></li>
				<li ng-show="(role.indexOf('posts') != -1 || post.account.id == <?php echo Yii::app()->user->id;?>)"role="presentation"><a role="menuitem" tabindex="-1" ng-click="metapost(post)">Meta</a></li>
				<li ng-show="post.post_status == 0 && (role.indexOf('posts') != -1 || post.account.id == <?php echo Yii::app()->user->id;?>)"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usespost(post,1)">Sử dụng</a></li>
				<li ng-show="post.post_status == 1 && (role.indexOf('posts') != -1 || post.account.id == <?php echo Yii::app()->user->id;?>)"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usespost(post,0)">Ngưng sử dụng</a></li>				
				<li ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)" role="presentation" class="divider"></li>
				<li ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)" role="presentation"><a role="menuitem" tabindex="-1" ng-click="editpost(post)">cập nhật</a></li>
				<li ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)" role="presentation"><a role="menuitem" tabindex="-1" ng-click="deletepost(post)">xóa</a></li>				
				</ul>
			</div>
		</td>
	</tr>
</table>
<div >
	<nav class="fr">
	  <ul class="pagination">
	    <li><a ng-click="previouspagination()"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>
	    <li ng-repeat="i in getNumber(allpagination) track by $index" ng-repeat="allpagination" ng-class="{ 'active' : pagination == $index}"><a ng-click="customizablepagination($index)">{{$index+1}}</a></li>
	    <li><a ng-click="nextpagination()"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>
	  </ul>
	</nav>
</div>
<?php
	
?>