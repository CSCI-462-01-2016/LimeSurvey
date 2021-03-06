<?php
/* @var $this BoxesController */
/* @var $model Boxes */
/* @var $form CActiveForm */
/* @var $icons_length interger */
/* @var $icons array */
?>

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'boxes-form',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
                'htmlOptions'=>array(
                    'class'=>"form-horizontal",
                )
            )); ?>
                <p class="note">Fields with <span class="required">*</span> are required.</p>


                <?php echo $form->errorSummary($model); ?>

                <div class="form-group">
                    <label class='control-label col-sm-2'><?php echo $form->labelEx($model,'position'); ?></label>
                    <div class='col-sm-2'>
                        <?php echo $form->numberField($model,'position', array('class' => 'form-control')); ?>
                    </div>
                    <div class='col-sm-2'>
                        <?php echo $form->error($model,'position'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class='control-label col-sm-2'><?php echo $form->labelEx($model,'url'); ?></label>
                    <div class='col-sm-2'>
                        <?php echo $form->textField($model,'url',array('class' => 'form-control')); ?>
                    </div>
                    <div class='col-sm-2'>
                        <?php echo $form->error($model,'url'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class='control-label col-sm-2'><?php echo $form->labelEx($model,'title'); ?></label>
                    <div class='col-sm-2'>
                        <?php echo $form->textField($model,'title',array('class' => 'form-control')); ?>
                    </div>
                    <div class='col-sm-2'>
                        <?php echo $form->error($model,'title'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class='control-label col-sm-2'><?php echo $form->labelEx($model,'ico'); ?></label>
                    <div class='col-sm-2'>
                        <div class='btn-group'>
                            <button type='button' class='btn btn-default dropdown-toggle limebutton form-control' data-toggle='dropdown' aria-hashpopup='true' aria-expanded='false'>
                                Icon
                                <span class='caret'></span>
                            </button>
                            <ul class='dropdown-menu'>
                                <li>
                                <div class='row' style='width: 400px;'>
                                    <div class='col-sm-4'>
                                        <ul class='list-unstyled'>
                                            <?php for ($i = 0; $i < $icons_length / 3; $i++): ?>
                                                <li class='icon-'><a href="#"><span data-icon='<?php echo $icons[$i]; ?>' class='option-icon <?php echo $icons[$i]; ?>'></span></a></li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                    <div class='col-sm-4'>
                                        <ul class='list-unstyled'>
                                            <?php for ($i = $icons_length / 3; $i < $icons_length / 3 + $icons_length / 3; $i++): ?>
                                                <li class='icon-'><a href="#"><span data-icon='<?php echo $icons[$i]; ?>' class='option-icon <?php echo $icons[$i]; ?>'></span></a></li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                    <div class='col-sm-4'>
                                        <ul class='list-unstyled'>
                                            <?php for ($i = $icons_length / 3 + $icons_length / 3; $i < $icons_length; $i++): ?>
                                                <li class='icon-'><a href="#"><span data-icon='<?php echo $icons[$i]; ?>' class='option-icon <?php echo $icons[$i]; ?>'></span></a></li>
                                            <?php endfor; ?>
                                        </ul>
                                    </div>
                                </div>
                                </li>
                            </ul>
                        </div>
                        <span>&nbsp;<?php echo eT('Chosen icon:'); ?></span>&nbsp;<span id='chosen-icon'></span>
                        <?php echo $form->textField($model,'ico',array('size'=>60,'maxlength'=>255, 'class' => 'form-control hidden')); ?>
                    </div>
                    <div class='col-sm-2'>
                        <?php echo $form->error($model,'ico'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class='control-label col-sm-2'><?php echo $form->labelEx($model,'desc'); ?></label>
                    <div class='col-sm-4'>
                        <?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50, 'class' => 'form-control')); ?>
                    </div>
                    <div class='col-sm-4'>
                        <?php echo $form->error($model,'desc'); ?>
                    </div>
                </div>

                <!-- Page -->
                <div class="form-group">
                    <?php if($action=='create'): ?>
                        <input name="Boxes[page]" id="Boxes_page" type="hidden" value="welcome">
                    <?php else:?>
                        <?php echo $form->hiddenField($model,'page',array()); ?>
                    <?php endif;?>
                </div>

                <div class="form-group">
                    <label class='control-label col-sm-2'><?php echo $form->labelEx($model,'usergroup'); ?></label>
                    <div class='col-sm-2'>
                        <?php
                            $options_array = CHtml::listData(UserGroup::model()->findAll(), 'ugid', 'name');
                            $options_array[-1]=gT('Everybody');
                            $options_array[-2]=gT('Only admin');
                        ?>
                        <?php echo $form->dropDownList(
                            $model,
                            'usergroup',
                            $options_array,
                            array(
                                'class' => 'form-control',
                                'options' => array(
                                    $model['usergroup'] => array('selected' => true)
                                )
                            )
                        ); ?>
                    </div>
                    <div class='col-sm-2'>
                        <?php echo $form->error($model,'usergroup'); ?>
                    </div>
                </div>

                <div class="form-group buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'form-control hidden')); ?>
                </div>

            <?php $this->endWidget(); ?>
