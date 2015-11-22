<div id="index-modal-group" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Nhóm</h4>
      </div>
      <div class="modal-body">
        <div group="form" ng-form="form_group">           
          <div class="form-group">
            <label for="">Tên</label>
            <input ng-title="Tên" type="text" class="form-control" name="group_name" ng-model="group.group_name" placeholder="Tên" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" ng-click="savegroup()" class="btn btn-primary">Lưu</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->