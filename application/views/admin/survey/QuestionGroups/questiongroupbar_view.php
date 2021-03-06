<?php
/**
 * Question group bar
 * Also used to Edit question
 */

?>

<!-- nquestiongroupbar -->
<div class='menubar surveybar' id="questiongroupbarid">
    <div class='row container-fluid'>

        <!-- Left Buttons -->
        <div class="col-md-12">
            <?php if(isset($questiongroupbar['buttons']['view'])):?>
                <!-- Buttons -->

                <span class="btntooltip" data-toggle="tooltip" data-placement="bottom" title="<?php if ($surveyIsActive) { echo eT("Cannot add questions while the survey is active"); } ?>" >
                   <a class="btn btn-default <?php if ($surveyIsActive) { echo "disabled"; } ?>" href="<?php echo $this->createUrl('admin/questions/sa/newquestion/surveyid/'.$surveyid.'/gid/'.$gid); ?>" role="button">
                       <span class="icon-add"></span>
                       <?php eT("Add new question to group");?>
                   </a>
               </span>

                <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','update')): ?>
                    <?php if (count($languagelist) > 1): ?>

                        <!-- Preview multilangue -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="icon-do"></span>
                            <?php eT("Preview this question group"); ?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" style="min-width : 252px;">
                              <?php foreach ($languagelist as $tmp_lang): ?>
                                  <li>
                                      <a target="_blank" href="<?php echo $this->createUrl("survey/index/action/previewgroup/sid/{$surveyid}/gid/{$gid}/lang/" . $tmp_lang); ?>" >
                                          <?php echo getLanguageNameFromCode($tmp_lang,false); ?>
                                      </a>
                                  </li>
                              <?php endforeach; ?>
                          </ul>
                        </div>
                    <?php else:?>

                        <!-- Preview simple langue -->
                        <a class="btn btn-default" href="<?php echo $this->createUrl("survey/index/action/previewgroup/sid/$surveyid/gid/$gid/"); ?>" role="button" target="_blank">
                            <span class="icon-do"></span>
                            <?php eT("Preview this question group");?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

                <!-- Edit button -->
                <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','update')): ?>
                    <a class="btn btn-default" href="<?php echo $this->createUrl('admin/questiongroups/sa/edit/surveyid/'.$surveyid.'/gid/'.$gid); ?>" role="button">
                        <span class="icon-edit"></span>
                        <?php eT("Edit current question group");?>
                    </a>
                <?php endif; ?>

                <!-- Check survey logic -->
                <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','read')): ?>
                    <a class="btn btn-default" href="<?php echo $this->createUrl("admin/expressions/sa/survey_logic_file/sid/{$surveyid}/gid/{$gid}/"); ?>" role="button">
                        <span class="icon-expressionmanagercheck"></span>
                        <?php eT("Check survey logic for current question group"); ?>
                    </a>
                <?php endif; ?>

                <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','delete')):?>

                    <!-- Delete -->
                    <?php if( ($sumcount4 == 0 && $activated != "Y") || $activated != "Y" ):?>

                        <!-- has question -->
                        <?php if(is_null($condarray)):?>

                            <!-- can delete group and question -->
                            <a class="btn btn-default" onclick="if (confirm('<?php eT("Deleting this group will also delete any questions and answers it contains. Are you sure you want to continue?","js"); ?>')) { window.open('<?php echo $this->createUrl("admin/questiongroups/sa/delete/surveyid/$surveyid/gid/$gid"); ?>','_top'); }" role="button">
                                <span class="glyphicon glyphicon-trash"></span>
                                <?php eT("Delete current question group"); ?>
                            </a>
                        <?php else: ?>

                            <!-- there is at least one question having a condition on its content -->
                            <a href='<?php echo $this->createUrl("admin/survey/sa/view/surveyid/$surveyid/gid/$gid"); ?>'  class="btn btn-default" onclick="alert('<?php eT("Impossible to delete this group because there is at least one question having a condition on its content","js"); ?>'); return false;">
                                <span class="glyphicon glyphicon-trash"></span>
                                <?php eT("Delete current question group"); ?>
                            </a>
                        <?php endif; ?>
                    <?php else:?>

                        <!-- Activated -->
                        <span class="btntooltip" data-toggle="tooltip" data-placement="bottom" title="<?php eT("Impossible to delete this group because there is at least one question having a condition on its content","js"); ?>" >
                            <button type="button" class="btn btn-default btntooltip" disabled="disabled">
                                <span class="glyphicon glyphicon-trash"></span>
                                <?php eT("Delete current question group"); ?>
                            </button>
                        </span>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','export')):?>

                    <!-- Export -->
                    <a class="btn btn-default" href="<?php echo $this->createUrl("admin/export/sa/group/surveyid/$surveyid/gid/$gid");?>" role="button">

                        <span class="icon-export"></span>
                        <?php eT("Export this question group"); ?>
                    </a>
                <?php endif; ?>
            <?php endif; ?>
        </div>

        <div class="col-sm-8">
            <!-- Previews while editing a question -->
            <?php if(isset($questiongroupbar['savebutton']['form'])&&isset($qid)):?>
                <?php if(Permission::model()->hasSurveyPermission($surveyid,'surveycontent','update')): ?>
                    <?php if (count($languagelist) > 1): ?>

                        <!-- preview question -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="icon-do"></span>
                            <?php eT("Preview"); ?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" style="min-width : 252px;">
                              <?php foreach ($languagelist as $tmp_lang): ?>
                                  <li>
                                      <a target="_blank" href='<?php echo $this->createUrl("survey/index/action/previewquestion/sid/" . $surveyid . "/gid/" . $gid . "/qid/" . $qid . "/lang/" . $tmp_lang); ?>' >
                                          <?php echo getLanguageNameFromCode($tmp_lang,false); ?>
                                      </a>
                                  </li>
                              <?php endforeach; ?>
                          </ul>
                        </div>


                        <!-- Preview multilangue -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="icon-do"></span>
                            <?php eT("Preview its question group"); ?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" style="min-width : 252px;">
                              <?php foreach ($languagelist as $tmp_lang): ?>
                                  <li>
                                      <a target="_blank" href="<?php echo $this->createUrl("survey/index/action/previewgroup/sid/{$surveyid}/gid/{$gid}/lang/" . $tmp_lang); ?>" >
                                          <?php echo getLanguageNameFromCode($tmp_lang,false); ?>
                                      </a>
                                  </li>
                              <?php endforeach; ?>
                          </ul>
                        </div>
                    <?php else:?>

                        <!-- preview question -->
                        <a class="btn btn-default" href='<?php echo $this->createUrl("survey/index/action/previewquestion/sid/" . $surveyid . "/gid/" . $gid . "/qid/" . $qid); ?>' role="button" target="_blank">
                            <span class="icon-do"></span>
                            <?php eT("Preview");?>
                        </a>

                        <!-- Preview simple langue -->
                        <a class="btn btn-default" href="<?php echo $this->createUrl("survey/index/action/previewgroup/sid/$surveyid/gid/$gid/"); ?>" role="button" target="_blank">
                            <span class="icon-do"></span>
                            <?php eT("Preview its question group");?>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>

            <?php endif;?>

        </div>

        <!-- Right Buttons -->
        <div class="col-sm-4 text-right">

            <?php if(isset($questiongroupbar['savebutton']['form'])):?>
                <!-- Save buttons -->
                <?php if(!isset($copying) || !$copying): ?>
                <a class="btn btn-success" href="#" role="button" id="save-button">
                    <span class="glyphicon glyphicon-ok"></span>
                    <?php eT("Save");?>
                </a>
            <?php endif; ?>

                <?php if(isset($questiongroupbar['saveandclosebutton'])):?>

                    <!-- Save and close -->
                    <a id="save-and-close-button" class="btn btn-default" role="button">
                        <span class="glyphicon glyphicon-saved"></span>
                        <?php eT("Save and close");?>
                    </a>
                <?php endif; ?>
            <?php endif;?>

            <?php if(isset($questiongroupbar['closebutton']['url'])):?>

                <!-- Close -->
                <a class="btn btn-danger" href="<?php echo $questiongroupbar['closebutton']['url']; ?>" role="button">
                    <span class="glyphicon glyphicon-close"></span>
                    <?php eT("Close");?>
                </a>
            <?php endif;?>

            <?php if(isset($questiongroupbar['returnbutton']['url'])):?>

                <!-- return -->
                <a class="btn btn-default" href="<?php echo $questiongroupbar['returnbutton']['url']; ?>" role="button">
                    <span class="glyphicon glyphicon-step-backward"></span>
                    <?php echo $questiongroupbar['returnbutton']['text'];?>
                </a>
            <?php endif;?>
        </div>
    </div>
</div>
