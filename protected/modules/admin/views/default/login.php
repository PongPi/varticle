<div class="main-login col-sm-4 col-sm-offset-4">
<div class="panel panel-default">
  <div class="panel-body">

			<div class="box-login">
				<h3>Đăng nhập</h3>
				<p>
					Hãy điền vào form dưới đây với các thông tin đăng nhập của bạn:
				</p>
					<div class="form">
					<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
					<fieldset>
						<div class="form-group">
							<!-- <span class="input-icon"> -->
								<!-- <input type="text" class="form-control" name="username" placeholder="Username"> -->
								<?php echo $form->textField($model,'username', array('class' => 'form-control',)); ?>
								<!-- <i class="fa fa-user"></i>  -->
							<!-- </span> -->
							<?php echo $form->error($model,'username'); ?>
						</div>
						<div class="form-group">
							<!-- <span class="input-icon"> -->
								
								<?php echo $form->passwordField($model,'password',array('class' => 'form-control',)); ?>
								<!-- <i class="fa fa-lock"></i>								 -->
								<!-- </span> -->
								
								<?php echo $form->error($model,'password'); ?>
						</div>
						<div>
							<label for="LoginForm_rememberMe" class="checkbox-inline">								
								<label>
								<?php echo $form->checkBox($model,'rememberMe'); ?>
								Ghi nhớ lần sau
								</label>
								<?php echo $form->error($model,'rememberMe'); ?>
							</label>
							
							<!-- <?php echo CHtml::submitButton('Đăng nhập'); ?> -->
						</div>
						<button type="submit" class="btn btn-info fr">
								Đăng nhập <i class="glyphicon glyphicon-circle-arrow-right"></i>
						</button>
					</fieldset>
					<?php $this->endWidget(); ?>
</div>
			</div>
			
		</div>
		</div>
		</div>