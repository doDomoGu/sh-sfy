<div class="row-fluid">

        <form id="validation-form" class="form-horizontal" method="post" style="display: block;" novalidate="novalidate" action="">
            <div class="form-group <?=$model->hasErrors('title')?'has-error':''?>">
                <label for="title" class="control-label col-xs-12 col-sm-3 no-padding-right"><?=$model->getAttributeLabel('title')?></label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="text" class="col-xs-12 col-sm-6" id="title" name="form[title]" value="<?=$model->title?>" >
                    </div>
                    <?php if($model->hasErrors('title')):?>
                        <div id="title-error" class="help-block"><?=$model->getError('title')?></div>
                    <?php endif;?>
                </div>
            </div>

            <div class="form-group <?=$model->hasErrors('content')?'has-error':''?>">
                <label for="describe" class="control-label col-xs-12 col-sm-3 no-padding-right"><?=$model->getAttributeLabel('content')?></label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <input type="text" class="col-xs-12 col-sm-6" id="describe" name="form[content]" value="<?=$model->content?>" >
                    </div>
                    <?php if($model->hasErrors('content')):?>
                        <div id="content-error" class="help-block"><?=$model->getError('content')?></div>
                    <?php endif;?>
                </div>
            </div>

            <?php $attr_name='thumb';$attr_width=480;$attr_height=360;$attr_width2=240;$attr_height2=180;?>
            <div class="form-group <?=$model->hasErrors($attr_name)?'has-error':''?>" >
                <label for="<?=$attr_name?>" class="control-label col-xs-12 col-sm-3 no-padding-right"><?=$model->getAttributeLabel($attr_name)?>(<?=$attr_width?>x<?=$attr_height?>)
                </label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <div id="pickfile_container">
                            <div class="clearfix">
                                <img src="<?=$model->$attr_name!=''?$model->$attr_name:'/aceadmin/images/wutu.gif'?>" id="<?=$attr_name?>_preview" width="<?=$attr_width2?>" height="<?=$attr_height2?>" style="border: 1px solid #999;">
                            </div>
                            <!--<input type="file" id="id-input-file-2" />-->
                            <input type="file" id="pickfile">
                            <div class="clearfix">
                                <input type="hidden" id="<?=$attr_name?>" name="form[<?=$attr_name?>]" value="<?=$model->$attr_name?>" >
                            </div>
                            <div class="clearfix" id="<?=$attr_name?>_upload_txt"></div>
                        </div>
                    </div>
                    <?php if($model->hasErrors($attr_name)):?>
                        <div id="<?=$attr_name?>-error" class="help-block"><?=$model->getError($attr_name)?></div>
                    <?php endif;?>
                </div>
            </div>

            <div class="form-group <?=$model->hasErrors('ord')?'has-error':''?>">
                <label for="ord" class="control-label col-xs-12 col-sm-3 no-padding-right"><?=$model->getAttributeLabel('ord')?></label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <select name="form[ord]" id="ord" class="input-medium" >
                            <option <?=$model->ord==5?'selected="selected"':''?> value="5">5</option>
                            <option <?=$model->ord==4?'selected="selected"':''?> value="4">4</option>
                            <option <?=$model->ord==3?'selected="selected"':''?> value="3">3</option>
                            <option <?=$model->ord==2?'selected="selected"':''?> value="2">2</option>
                            <option <?=$model->ord==1?'selected="selected"':''?> value="1">1</option>
                        </select>
                    </div>

                <?php if($model->hasErrors('ord')):?>
                    <div id="ord-error" class="help-block"><?=$model->getError('ord')?></div>
                <?php endif;?>
                </div>
            </div>

            <div class="form-group <?=$model->hasErrors('status')?'has-error':''?>">
                <label for="status" class="control-label col-xs-12 col-sm-3 no-padding-right"><?=$model->getAttributeLabel('status')?></label>
                <div class="col-xs-12 col-sm-9">
                    <div class="clearfix">
                        <select name="form[status]" id="status" class="input-medium">
                            <option <?=$model->status==1?'selected="selected"':''?> value="1">启用</option>
                            <option <?=$model->status==0?'selected="selected"':''?> value="0">禁用</option>
                        </select>
                    </div>

                    <?php if($model->hasErrors('status')):?>
                        <div id="status-error" class="help-block"><?=$model->getError('status')?></div>
                    <?php endif;?>
                </div>
            </div>
            <div class="form-group <?=$model->hasErrors('status')?'has-error':''?>">
                <div class="col-xs-12 col-sm-3">
                </div>
                <div class="col-xs-12 col-sm-9">
                    <button type="submit" class="btn btn-success btn-sm">
                        保存
                        <!--<i class="ace-icon fa fa-arrow-right icon-on-right"></i>-->
                    </button>

                    <a class="btn btn-sm">返回列表</a>
                </div>
            </div>
        </form>

</div>
<div class="clearfix"></div>
<script src="/js/qiniu/plupload.full.min.js"></script>
<script src="/js/qiniu/qiniu.js"></script>
<script>
    var image_domain = '<?=Yii::app()->params['qiniu-domain']?>';
    var pickfileId = 'pickfile';
    var imgurlId = 'thumb';
</script>
<script src="/js/qiniu.main.js"></script>