<h3>Quản Lý Nhóm</h3>
		<p class="align_r">
			<button type="button" class="btn btn-success btn-sm" ng-click="newgroup()">
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</p>
		<hr>
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