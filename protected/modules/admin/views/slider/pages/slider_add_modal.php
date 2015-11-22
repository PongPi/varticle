<div id="slider-add-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">New Item</h4>
      </div>
      <div class="modal-body">
        <div role="form" ng-form="form_slider"> 
            <div class="form-group">
              <label for="">Tiêu đề</label>
              <input ng-title="Tiêu đề" type="text" class="form-control" name="title" ng-model="item.title" placeholder="Tiêu đề" required>
            </div>

            <div class="form-group">
              <label for="">Hình ảnh</label>
              <input ng-title="Hình ảnh" rows="5" class="form-control" name="img" ng-model="item.img" placeholder="Hình ảnh" required>
            </div>

            <div class="form-group">
              <label for="">Thời gian</label>
              <input ng-title="Thời gian" type="date" rows="5" class="form-control" ng-model="item.date" placeholder="Thời gian" required>
            </div>

            <div class="form-group">
              <label for="">Miêu tả</label>
              <textarea ng-title="Miêu tả" ckeditorsmall="editorOptions" rows="5"  class="form-control" name="desc" ng-model="item.description" placeholder="Miêu tả" required></textarea>
            </div>

            <div class="form-group">
              <label for="">Liên kết</label>
              <input ng-title="Liên kết" rows="5" class="form-control" name="link" ng-model="item.link" placeholder="Liên kết" required>
            </div>

        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <button type="button" ng-click="itemAction(0)" class="btn btn-primary">Lưu</button>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->