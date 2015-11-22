<div id="index-modal-accounts" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tài khoản</h4>
      </div>
      <div class="modal-body">
        <div role="form" ng-form="form_account">           
          <div class="form-group">
            <label for="">Tài khoản</label>
            <input ng-title="Tài khoản" type="text" class="form-control" name="username" ng-model="account.username" placeholder="Tài khoản" required>
          </div>
          <div class="form-group">
            <label for="">Tên</label>
            <input ng-title="Tên" type="text" class="form-control" name="name" ng-model="account.name" placeholder="Tên" required>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input ng-title="Email" type="text" class="form-control" name="email" ng-model="account.email" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input ng-title="Password" type="password" class="form-control" name="password" ng-model="account.password" placeholder="password" ng-required="account.control == 0">
          </div>          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" ng-click="saveaccount()" class="btn btn-primary">Lưu</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->