<div id="albums-image-modal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Hình</h4>
      </div>
      <div class="modal-body">
        <div class="row" nv-file-drop="" uploader="images_album" ng-if="album.account.id == <?php echo Yii::app()->user->id;?>">
        <div class="col-sm-12 col-md-12" >
          <div ng-show="images_album.isHTML5" class="fileinput-button btn btn-info" nv-file-over="" uploader="images_album">
              Thêm File
              <input type="file" nv-file-select="" uploader="images_album" multiple  /><br/>
          </div>
          </div>
          <div ng-show="images_album.queue.length > 0">
          <hr>
        <div class="col-sm-2 col-md-2" ng-repeat="item in images_album.queue">
          <div class="thumbnail" >
            <div ng-show="images_album.isHTML5" ng-thumb="{ file: item._file, width: 105 }"></div> 
            <div class="caption">
              <p ng-show="images_album.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</p>
              <div ng-show="images_album.isHTML5 && item.progress < 100">
                  <div class="progress" style="margin-bottom: 0;">
                      <div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
                  </div>
              </div>
              <p class="text-center" ng-show="item.progress == 100">
                  <button class="btn btn-success btn-xs" ng-show="item.isSuccess"><i class="glyphicon glyphicon-ok"></i></button>
                  <button class="btn btn-warning btn-xs" ng-show="item.isCancel"><i class="glyphicon glyphicon-ban-circle"></i></button>
                  <button class="btn btn-danger btn-xs" ng-show="item.isError"><i class="glyphicon glyphicon-remove"></i></button>
              </p>
              <p nowrap>
                <button type="button" class="btn btn-success btn-xs" ng-click="item.upload()" ng-hide="item.isReady || item.isUploading || item.isSuccess">
                    <span class="glyphicon glyphicon-upload"></span>
                </button>
                <button type="button" class="btn btn-warning btn-xs" ng-click="item.cancel()" ng-hide="!item.isUploading">
                    <span class="glyphicon glyphicon-ban-circle"></span>
                </button>
                <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()" ng-hide="!item.isUploading">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
              </p>
            </div>
          </div>
        </div>

                </div>
          </div>
          <hr ng-if="album.account.id == <?php echo Yii::app()->user->id;?>" >
          <div class="row">
            <div class="col-sm-3 col-md-3"  >
              <div class="thumbnail" ng-repeat="image in allimages" ng-if="$index % 4 == 0" ng-class="{'alert-warning' : image.status == 0}">
                <img ng-show="image.image" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/album/{{image.image}}" alt="{{album.title}}">
                <div class="caption">
                <div class="dropdown">    
                  <a><span class="glyphicon glyphicon-user"></span> {{image.account.name}}</a> 
                  <a ng-if="album.account.id == <?php echo Yii::app()->user->id;?>" class="btn btn-default btn-xs" role="button" data-toggle="dropdown" data-target="#image-{{image.id}}">
                    <span class="glyphicon glyphicon-cog"></span>
                  </a>
                  <ul id="#image-{{image.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
                    <li ng-show="image.status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesimage(image,1)">Hiện</a></li>
                    <li ng-show="image.status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesimage(image,0)">Ẩn</a></li>        
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deleteimage(image)">xóa</a></li>
                  </ul>
                </div>
                </div>
              </div>
            </div>
          <!-- </div> -->
          <div class="col-sm-3 col-md-3"  >
              <div class="thumbnail" ng-repeat="image in allimages" ng-if="$index % 4 == 1" ng-class="{'alert-warning' : image.status == 0}">
                <img ng-show="image.image" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/album/{{image.image}}" alt="{{album.title}}">
                <div class="caption">
                <div class="dropdown">    
                  <a><span class="glyphicon glyphicon-user"></span> {{image.account.name}}</a> 
                  <a ng-if="album.account.id == <?php echo Yii::app()->user->id;?>" class="btn btn-default btn-xs" role="button" data-toggle="dropdown" data-target="#image-{{image.id}}">
                    <span class="glyphicon glyphicon-cog"></span>
                  </a>
                  <ul id="#image-{{image.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
                    <li ng-show="image.status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesimage(image,1)">Hiện</a></li>
                    <li ng-show="image.status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesimage(image,0)">Ẩn</a></li>        
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deleteimage(image)">xóa</a></li>
                  </ul>
                </div>
                </div>
              </div>
            </div>
          <div class="col-sm-3 col-md-3"  >
              <div class="thumbnail" ng-repeat="image in allimages" ng-if="$index % 4 == 2" ng-class="{'alert-warning' : image.status == 0}">
                <img ng-show="image.image" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/album/{{image.image}}" alt="{{album.title}}">
                <div class="caption">
                <div class="dropdown">    
                  <a><span class="glyphicon glyphicon-user"></span> {{image.account.name}}</a> 
                  <a ng-if="album.account.id == <?php echo Yii::app()->user->id;?>" class="btn btn-default btn-xs" role="button" data-toggle="dropdown" data-target="#image-{{image.id}}">
                    <span class="glyphicon glyphicon-cog"></span>
                  </a>
                  <ul id="#image-{{image.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
                    <li ng-show="image.status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesimage(image,1)">Hiện</a></li>
                    <li ng-show="image.status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesimage(image,0)">Ẩn</a></li>        
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deleteimage(image)">xóa</a></li>
                  </ul>
                </div>
                </div>
              </div>
            </div>
          <div class="col-sm-3 col-md-3"  >
              <div class="thumbnail" ng-repeat="image in allimages" ng-if="$index % 4 == 3" ng-class="{'alert-warning' : image.status == 0}">
                <img ng-show="image.image" ng-src="<?php echo Yii::app()->request->baseUrl; ?>/statics/images/album/{{image.image}}" alt="{{album.title}}">
                <div class="caption">
                <div class="dropdown">    
                  <a><span class="glyphicon glyphicon-user"></span> {{image.account.name}}</a> 
                  <a ng-if="album.account.id == <?php echo Yii::app()->user->id;?>" class="btn btn-default btn-xs" role="button" data-toggle="dropdown" data-target="#image-{{image.id}}">
                    <span class="glyphicon glyphicon-cog"></span>
                  </a>
                  <ul id="#image-{{image.id}}" class="dropdown-menu dropdown-menu-right" role="menu">
                    <li ng-show="image.status == 0" role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesimage(image,1)">Hiện</a></li>
                    <li ng-show="image.status == 1"role="presentation"><a role="menuitem" tabindex="-1" ng-click="usesimage(image,0)">Ẩn</a></li>        
                    <li role="presentation" class="divider"></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" ng-click="deleteimage(image)">xóa</a></li>
                  </ul>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
          <!-- <button type="button" ng-click="savecatalogue()" class="btn btn-primary">Lưu</button> -->
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->