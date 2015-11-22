<div id="albums-cover-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Hình đại diện</h4>
      </div>
      <div class="modal-body">
        <div nv-file-drop="" uploader="cover_album">
        <div ng-show="album.cover" class="thumbnail">
          <img ng-show="album.cover" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/album/{{album.cover}}" alt="{{album.title}}">           
        </div>
        <div ng-show="catalogue.cat_img" class="thumbnail">
        <img ng-show="catalogue.cat_img" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/catalogue/{{catalogue.cat_img}}" alt="{{catalogue.cat_name}}">        
        </div>
          <div class="thumbnail" ng-repeat="item in cover_album.queue">
            <div ng-show="cover_album.isHTML5" ng-thumb="{ file: item._file, width: 558 }"></div> 
            <div class="caption">
              <h4>{{ item.file.name }}</h4>
              <p ng-show="cover_album.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</p>
            </div>
          </div>
          <!-- <div> -->
          <div class="progress" style="">
              <div class="progress-bar" role="progressbar" ng-style="{ 'width': cover_album.progress + '%' }"></div>
          </div>
          <!-- </div> -->
          
          </div>
        </div>
        <div class="modal-footer">         
          <!-- <div> -->
          <div ng-show="cover_album.isHTML5" class="fileinput-button btn btn-info" nv-file-over="" uploader="cover_album">
              Thêm File
              <input type="file" nv-file-select="" uploader="cover_album" multiple  /><br/>
          </div>   
          <button type="button" class="btn btn-success btn-s" ng-click="cover_album.uploadAll()" ng-hide="!cover_album.getNotUploadedItems().length">
              <span class="glyphicon glyphicon-upload"></span> Upload
          </button>
          <button type="button" class="btn btn-warning btn-s" ng-click="cover_album.cancelAll()" ng-hide="!cover_album.isUploading">
              <span class="glyphicon glyphicon-ban-circle"></span> Cancel
          </button>
          <button type="button" class="btn btn-danger btn-s" ng-click="cover_album.clearQueue()" ng-hide="!cover_album.queue.length">
              <span class="glyphicon glyphicon-trash"></span> Remove
          </button>
          <!-- </div> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

