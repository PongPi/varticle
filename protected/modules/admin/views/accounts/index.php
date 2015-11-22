
<div ng-controller='AccountsController'>
 <?php
	if(in_array('permissions', Yii::app()->user->role)){
 ?>
	<div class="col-md-8">
	<?php
		$this->renderPartial('/accounts/pages/account_user_panel');
	?>
	</div>
	<div class="col-md-4">
	<?php
		$this->renderPartial('/accounts/pages/account_group_panel');
	?>
	</div>
<?php }else{
	$this->renderPartial('/accounts/pages/account_user_panel');
}?>
	<?php
	if(in_array('permissions', Yii::app()->user->role)){
		$this->renderPartial('/accounts/pages/account_group_modal');
		$this->renderPartial('/accounts/pages/account_permission_modal');
	}
	$this->renderPartial('/accounts/pages/account_accounts_modal');
	$this->renderPartial('/accounts/pages/account_accountgroup_modal');
	?>
</div>