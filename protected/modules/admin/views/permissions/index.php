<div ng-controller='PermissionsController'>
	<div class="col-md-6">
		<h3>Quản Lý Nhóm</h3>
		<div class="">
			<button type="button" class="btn btn-success btn-sm fr" ng-click="newgroup()">
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</div>
		<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th width="1%" class="center">#</th>
				<th width="7%" >Mã số</th>	        	
				<th >Tên</th>
				<th width="5%" class="center">Công cụ</th>
			</tr>
		</thead>
			<tr ng-repeat="group in allgroup">
				<td>{{$index+1}}</td>
				<td>{{group.id}}</td>				
				<td>{{group.group_name}}</td>
				<td>
					<div class="dropdown">			
						<a class="btn btn-default btn-sm" role="button" data-toggle="dropdown" data-target="#group-{{group.id}}">
							<span class="glyphicon glyphicon-cog"></span>
						</a>
						<ul id="#group-{{group.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
						<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="permissionsgroup(group)">Phân Quyền</a></li>
						<li role="presentation" class="divider"></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="editgroup(group)">cập nhật</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deletegroup(group)">xóa</a></li>				
						</ul>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<h3>Quản Lý Quyền</h3>
		<div class="">
			<button type="button" class="btn btn-success btn-sm fr" ng-click="newrole()">
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</div>
		<table class="table table-hover table-bordered table-striped">
		<thead>
			<tr>
				<th width="1%" class="center">#</th>
				<th>Mã số</th>	        	
				<th >Tên</th>
				<th >Khoá</th>
				<th width="5%" class="center">Công cụ</th>
			</tr>
		</thead>
			<tr ng-repeat="role in allrole">
				<td>{{$index+1}}</td>
				<td>{{role.id}}</td>
				<td>{{role.name}}</td>
				<td>{{role.key}}</td>
				<td>
					<div class="dropdown">			
						<a class="btn btn-default btn-sm" role="button" data-toggle="dropdown" data-target="#role-{{role.id}}">
							<span class="glyphicon glyphicon-cog"></span>
						</a>
						<ul id="#role-{{role.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
						<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="editrole(role)">cập nhật</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deleterole(role)">xóa</a></li>				
						</ul>
					</div>
				</td>
			</tr>
		</table>
	</div>
	<?php
	$this->renderPartial('/permissions/pages/index_modal_role');
	$this->renderPartial('/permissions/pages/index_modal_group');
	$this->renderPartial('/permissions/pages/index_modal_permission');
	?>
</div>