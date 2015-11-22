	<h3>Quản Lý Người Dùng</h3>
	<p class="align_r">
		<button type="button" class="btn btn-success btn-sm" ng-click="newaccount()">
			<span class="glyphicon glyphicon-plus"></span>
		</button>
	</p>
	<hr>
	<table class="table table-hover table-bordered table-striped">
	<thead>
		<tr>
			<th width="1%" class="center">#</th>
			<th width="7%" >Mã số</th>
        	<th >Tài khoản</th>
			<th >Tên</th>
			<th >Email</th>
			<th width="5%" class="center">Công cụ</th>
		</tr>
	</thead>
		<tr ng-repeat="account in allaccount" ng-class="{'warning' : account.status == 0}">
			<td>{{$index+1}}</td>
			<td>{{account.id}}</td>
			<td>{{account.username}}</td>
			<td>{{account.name}}</td>
			<td>{{account.email}}</td>
			<td>
				<div class="dropdown">			
					<a class="btn btn-default btn-sm" role="button" data-toggle="dropdown" data-target="#account-{{account.id}}">
						<span class="glyphicon glyphicon-cog"></span>
					</a>
					<ul id="#account-{{account.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
						<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="accountgroupshow(account)">Phân Nhóm</a></li>
						<li ng-show="account.status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesaccount(account,1)">Kích hoạt</a></li>
						<li ng-show="account.status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesaccount(account,0)">Khóa</a></li>
						<li role="presentation" class="divider"></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="editaccount(account)">cập nhật</a></li>
						<li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deleteaccount(account)">xóa</a></li>				
					</ul>
				</div>
			</td>
		</tr>
	</table>