<?php
/**
 * This file render the list of user groups
 * It use the Label Sets model search method to build the data provider.
 *
 * @var $model  obj    the UserGroup model
 */
?>
<?php $pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);?>
<div class="col-lg-12">
	<h3><?php eT('User Groups list'); ?></h3>

	<div class="row">
        <div class="col-lg-12 content-right">
            <?php
                $this->widget('bootstrap.widgets.TbGridView', array(
                    'dataProvider' => $model->search(),

                    // Number of row per page selection
                    'id' => 'usergroups-grid',
                    'summaryText'=>gT('Displaying {start}-{end} of {count} result(s).').' '. sprintf(gT('%s rows per page'),
                        CHtml::dropDownList(
                            'pageSize',
                            $pageSize,
                            Yii::app()->params['pageSizeOptions'],
                            array('class'=>'changePageSize form-control', 'style'=>'display: inline; width: auto'))),

                    'columns' => array(

                    	array(
                            'header' => gT('User Group ID'),
                            'name' => 'usergroup_id',
                            'value'=>'$data->ugid',
                            'htmlOptions' => array('class' => 'col-md-1'),
                        ),

                        array(
                            'header' => gT('Name'),
                            'name' => 'name',
                            'value'=>'$data->name',
                            'htmlOptions' => array('class' => 'col-md-1'),
                        ),

                        array(
                            'header' => gT('Description'),
                            'name' => 'description',
                            'value'=> '$data->description',
                            'type' => 'LongText',
                            'htmlOptions' => array('class' => 'col-md-5'),
                        ),

                        array(
                            'header' => gT('Owner'),
                            'name' => 'owner',
                            'value'=> '$data->owner->users_name',
                            'htmlOptions' => array('class' => 'col-md-1'),
                        ),

                        array(
                            'header' => gT('Members'),
                            'name' => 'members',
                            'value'=> 'count($data->Users)',
                            'htmlOptions' => array('class' => 'col-md-1'),
                        ),

                        array(
                            'header'=>'',
                            'name'=>'actions',
                            'type'=>'raw',
                            'value'=>'$data->buttons',
                            'htmlOptions' => array('class' => 'col-md-2 col-xs-1 text-right'),
                        ),

                    ),

                    'htmlOptions'=>array('style'=>'cursor: pointer;', 'class'=>'hoverAction'),
                    'selectionChanged'=>"function(id){window.location='" . Yii::app()->urlManager->createUrl('admin/usergroups/sa/view/ugid' ) . '/' . "' + $.fn.yiiGridView.getSelection(id.split(',', 1));}",
                    'ajaxUpdate' => true,
                   ));
            ?>
        </div>
    </div>

</div>

<!-- To update rows per page via ajax -->
<script type="text/javascript">
jQuery(function($) {
jQuery(document).on("change", '#pageSize', function(){
    $.fn.yiiGridView.update('usergroups-grid',{ data:{ pageSize: $(this).val() }});
    });
});
</script>