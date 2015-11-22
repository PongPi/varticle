<div id="index-modal-role" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Quyền</h4>
      </div>
      <div class="modal-body">
        <div role="form" ng-form="form_role">           
            <div class="form-group">
              <label for="">Tên</label>
              <input ng-title="Tên" type="text" class="form-control" name="name" ng-model="role.name" placeholder="Tên" required>
            </div>
            <div class="form-group">
              <label for="">Khoá</label>
              <input ng-title="Khoá" type="text" class="form-control" name="key" ng-model="role.key" placeholder="Khoá" required>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <button type="button" ng-click="saverole()" class="btn btn-primary">Lưu</button>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->