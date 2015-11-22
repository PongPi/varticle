<div id="index-modal-permission" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Phân quyền</h4>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered table-hover" id="sample-table-2">
					<thead>
						<tr>
							<th width="1%">#</th>							
							<th>Quyền</th>
							<th width="5%">Trạng thái</th>							
						</tr>
					</thead>		
					<tr ng-repeat="role in allrole" tooltips>
						<td>
							{{$index+1}}
						</td>
						
						<td>
							{{role.name}}
						</td>
						<td>
							<a ng-show="role.select == true" ng-click="role.select = false" class="btn btn-success "><span class="glyphicon glyphicon-ok"></span></a>
							<a ng-show="role.select == false" ng-click="role.select = true" class="btn btn-default"><span class="glyphicon glyphicon-remove"></span></a>
						</td>								
					</tr>		
				</table>
			</div>
			<div class="modal-footer">
					<button type="button" class="btn btn-default btn-squared" data-dismiss="modal">Đóng</button>
					<button type="button" class="btn btn-primary btn-squared" ng-click="savepermission()">Lưu</button>
			</div>
		</div>
	</div>
</div>
