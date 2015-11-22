<h3>Quản lý Slider chính</h3>
<p class="align_r">
	<button type="button" class="btn btn-success btn-sm" ng-click="newitem()">
		<span class="glyphicon glyphicon-plus"></span>
	</button>
</p>
<hr>
<div class="row">
  <div class="col-sm-4 col-md-4" ng-repeat="item in slider"> 
    <div class="thumbnail" style="border: 3px solid #ddd; height: 400px;">
      <img ng-src="{{item.img}}" alt="{{item.title}}">
      <div class="caption">
        <h4 style="height: 58px; overflow: hidden; text-overflow: ellipsis;">({{item.date}}) {{item.title}} </h4>
        <p ng-bind-html="item.description" style="display: block;height: 85px; overflow: hidden; text-overflow: ellipsis;"></p>
        <div class="btn-group btn-group-sm" role="group">
			<div class="btn-group btn-group-sm" role="group">
			    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
			      <span class="glyphicon glyphicon-cog"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
			    	<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="edititem(item)">cập nhật</a></li>
					<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deleteitem(item)">xóa</a></li>
			    </ul>
		  	</div>
        </div>
      </div>
    </div>
  </div>
 

  <div class="col-sm-4 col-md-4">
    <div class="thumbnail" style="border: 3px dashed #ddd; cursor: pointer; height: 400px;" ng-click="newitem()">
      <img src="http://placehold.it/250/1C6DA3/FFFFFF&text=add">
      <div class="caption">
        <h4><center>Thêm mới</center></h4>
        <p></p>
       
        <div class="btn-group btn-group-sm" role="group">
	       
        </div>
      </div>
    </div>
  </div>

</div>