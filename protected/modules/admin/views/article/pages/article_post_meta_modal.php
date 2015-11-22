<div id="article-post-meta-modal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Meta</h4>
      </div>
      <div class="modal-body">
	      <table class="table table-hover table-bordered table-striped">
			<thead>
				<tr>
					<th width="1%" class="center">#</th>  
					<th>Tên</th>       	
					<th>Nội dung</th>
					<th width="30%">Đường dẫn</th>
					<th width="5%" class="center" ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)">Công cụ</th>
				</tr>
			</thead>
				<tr ng-repeat="meta in allmeta" ng-class="{'warning' : meta.meta_status == 0}">
					<td>{{$index+1}}</td>
					<td>{{meta.meta_name}}</td>		
					<td>{{meta.meta_text}}</td>							
					<td>{{meta.meta_link}}</td>					
					<td ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)">
						<div class="dropdown">			
							<a class="btn btn-default btn-sm" role="button" data-toggle="dropdown" data-target="#meta-{{meta.id}}">
								<span class="glyphicon glyphicon-cog"></span>
							</a>
							<ul id="#meta-{{meta.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
								<li ng-show="meta.meta_status == 0 && (post.account.id == <?php echo Yii::app()->user->id;?>)"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesmeta(meta,1)">Sử dụng</a></li>
								<li ng-show="meta.meta_status == 1 && (post.account.id == <?php echo Yii::app()->user->id;?>)"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesmeta(meta,0)">Ngưng sử dụng</a></li>				
								<li ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)" role="presentation" class="divider"></li>
								<li ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)" role="presentation"><a role="menuitem" tabindex="-1" ng-click="editmeta(meta)">cập nhật</a></li>
								<li ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)" role="presentation"><a role="menuitem" tabindex="-1" ng-click="deletemeta(meta)">xóa</a></li>				
							</ul>
						</div>
					</td>
				</tr>
			</table>
			
				<hr ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)">
				<p class="align_r" ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)">
					<button type="button" class="btn btn-success btn-sm" ng-click="newmeta()">
						<span class="glyphicon glyphicon-plus"></span> Thêm
					</button>
				</p>
				<div id="article-post-meta-form" class="fadein fadeou" ng-show="form_meta_active">
				<hr ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)">
				<div role="form" ng-form="form_meta" class="form-horizontal" ng-show="(post.account.id == <?php echo Yii::app()->user->id;?>)">          
		            <div class="form-group">
		              <label class="col-sm-2 control-label" for="">Tên</label>
		              <div class="col-sm-10">
		              <input ng-title="Tên" type="text" class="form-control" name="meta_name" ng-model="meta.meta_name" placeholder="Tên" required>
		              </div>
		            </div>
		            <div class="form-group">
		              <label class="col-sm-2 control-label" for="">Nội dung</label>
		            <div class="col-sm-10">
		              <textarea ng-title="Nội dung" rows="5" class="form-control" name="meta_text" ng-model="meta.meta_text" placeholder="Nội dung" required></textarea>
		            </div>
		            </div>
		            <div class="form-group">
		              <label class="col-sm-2 control-label" for="">Đường dẫn</label>
		              <!-- <input ng-title="Khoá" type="text" class="form-control" name="key" ng-model="catalogue.key" placeholder="Khoá" required> -->
		            <div class="col-sm-10">
		              <textarea ng-title="Đường dẫn" rows="5" class="form-control" name="meta_link" ng-model="meta.meta_link" placeholder="Đường dẫn" required></textarea>
		            </div>
		            </div>
		            <p class="align_c">
		            	<button type="button" class="btn btn-default" ng-click="hidemeta()">Đóng</button>
	          			<button type="button" ng-click="savemeta()" class="btn btn-primary">Lưu</button>
		        	</p>
		        </div>
	        </div>
      </div>
	    <div class="modal-footer">         
	      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	    </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->