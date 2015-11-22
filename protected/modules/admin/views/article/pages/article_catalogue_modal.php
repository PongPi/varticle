<div id="article-catalogue-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Danh mục</h4>
      </div>
      <div class="modal-body">
        <div role="form" ng-form="form_catalogue">           
            <div class="form-group">
              <label for="">Tên</label>
              <input ng-title="Tên" type="text" class="form-control" name="cat_name" ng-model="catalogue.cat_name" placeholder="Tên" required>
            </div>
            <div class="form-group">
              <label for="">Từ khóa</label>
              <input ng-title="Từ khóa" type="text" class="form-control" name="cat_key" ng-model="catalogue.cat_key" placeholder="Từ khóa" required>
            </div>
            <div class="form-group">
              <label for="">Miêu tả</label>
              <!-- <input ng-title="Khoá" type="text" class="form-control" name="key" ng-model="catalogue.key" placeholder="Khoá" required> -->
              <textarea ng-title="Miêu tả" rows="5" class="form-control" name="cat_description" ng-model="catalogue.cat_description" placeholder="Miêu tả" required></textarea>
            </div>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <button type="button" ng-click="savecatalogue()" class="btn btn-primary">Lưu</button>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->