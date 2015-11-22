<h3>Quản lý Hình ảnh</h3>
<p class="align_r">
	<button type="button" class="btn btn-success btn-sm" ng-click="newalbum()">
		<span class="glyphicon glyphicon-plus"></span>
	</button>
</p>
<hr>
<div class="row">
  <div class="col-sm-3 col-md-3"  >
    <div class="thumbnail" ng-repeat="album in allalbum" ng-if="$index % 4 == 0" ng-class="{'alert-warning' : album.status == 0}">
      <img ng-show="album.cover" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/album/{{album.cover}}" alt="{{album.title}}">
      <div class="caption">
        <h4>{{album.title}}</h4>
        <p>{{album.desc}}</p>
        <p><span class="glyphicon glyphicon-user"></span> {{album.account.name}}</p>
        <div class="btn-group btn-group-sm" role="group">
	        <a class="btn btn-primary" role="button" ng-click="imagesalbum(album)">Hình</a>
			<div class="btn-group btn-group-sm" role="group" ng-if="album.account.id == <?php echo Yii::app()->user->id;?>">
			    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			      <span class="glyphicon glyphicon-cog"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
			    	<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="coveralbum(album)">Hình đại diện</a></li>
				    <li ng-show="album.status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesalbum(album,1)">Sử dụng</a></li>
					<li ng-show="album.status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesalbum(album,0)">Ngưng sử dụng</a></li>				
					<li role="presentation" class="divider"></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="editalbum(album)">cập nhật</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deletealbum(album)">xóa</a></li>
			    </ul>
		  	</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3 col-md-3"  >
    <div class="thumbnail" ng-repeat="album in allalbum" ng-if="$index % 4 == 1" ng-class="{'alert-warning' : album.status == 0}">
      <img ng-show="album.cover" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/album/{{album.cover}}" alt="{{album.title}}">
      <div class="caption">
        <h4>{{album.title}}</h4>
        <p>{{album.desc}}</p>
        <p><span class="glyphicon glyphicon-user"></span> {{album.account.name}}</p>
        <div class="btn-group btn-group-sm" role="group">
	        <a class="btn btn-primary" role="button" ng-click="imagesalbum(album)">Hình</a>
			<div class="btn-group btn-group-sm" role="group" ng-if="album.account.id == <?php echo Yii::app()->user->id;?>">
			    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			      <span class="glyphicon glyphicon-cog"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
				    <li role="presentation"><a role="menuitem" tabindex="-1" ng-click="coveralbum(album)">Hình đại diện</a></li>
				    <li ng-show="album.status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesalbum(album,1)">Sử dụng</a></li>
					<li ng-show="album.status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesalbum(album,0)">Ngưng sử dụng</a></li>				
					<li role="presentation" class="divider"></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="editalbum(album)">cập nhật</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deletealbum(album)">xóa</a></li>
			    </ul>
		  	</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3 col-md-3"  >
    <div class="thumbnail" ng-repeat="album in allalbum" ng-if="$index % 4 == 2" ng-class="{'alert-warning' : album.status == 0}">
      <img ng-show="album.cover" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/album/{{album.cover}}" alt="{{album.title}}">
      <div class="caption">
        <h4>{{album.title}}</h4>
        <p>{{album.desc}}</p>
        <p><span class="glyphicon glyphicon-user"></span> {{album.account.name}}</p>
        <div class="btn-group btn-group-sm" role="group">
	        <a class="btn btn-primary" role="button" ng-click="imagesalbum(album)">Hình</a>
			<div class="btn-group btn-group-sm" role="group" ng-if="album.account.id == <?php echo Yii::app()->user->id;?>">
			    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			      <span class="glyphicon glyphicon-cog"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
				    <li role="presentation"><a role="menuitem" tabindex="-1" ng-click="coveralbum(album)">Hình đại diện</a></li>
				    <li ng-show="album.status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesalbum(album,1)">Sử dụng</a></li>
					<li ng-show="album.status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesalbum(album,0)">Ngưng sử dụng</a></li>				
					<li role="presentation" class="divider"></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="editalbum(album)">cập nhật</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deletealbum(album)">xóa</a></li>
			    </ul>
		  	</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-3 col-md-3"  >
    <div class="thumbnail" ng-repeat="album in allalbum" ng-if="$index % 4 == 3" ng-class="{'alert-warning' : album.status == 0}">
      <img ng-show="album.cover" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/album/{{album.cover}}" alt="{{album.title}}">
      <div class="caption">
        <h4>{{album.title}}</h4>
        <p>{{album.desc}}</p>
        <p><span class="glyphicon glyphicon-user"></span> {{album.account.name}}</p>
        <div class="btn-group btn-group-sm" role="group">
	        <a class="btn btn-primary" role="button" ng-click="imagesalbum(album)">Hình</a>
			<div class="btn-group btn-group-sm" role="group" ng-if="album.account.id == <?php echo Yii::app()->user->id;?>">
			    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			      <span class="glyphicon glyphicon-cog"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
				    <li role="presentation"><a role="menuitem" tabindex="-1" ng-click="coveralbum(album)">Hình đại diện</a></li>
				    <li ng-show="album.status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesalbum(album,1)">Sử dụng</a></li>
					<li ng-show="album.status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesalbum(album,0)">Ngưng sử dụng</a></li>				
					<li role="presentation" class="divider"></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="editalbum(album)">cập nhật</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deletealbum(album)">xóa</a></li>
			    </ul>
		  	</div>
        </div>
      </div>
    </div>
  </div>
</div>