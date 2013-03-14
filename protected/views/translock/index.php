<?php
$this->breadcrumbs=array(
	'Translocks',
);
$pageSize=Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>
<script type="text/javascript">
function deletedata(value)
{
<?php echo CHtml::ajax(array(
			'url'=>array('translock/delete'),
            'data'=> array('id'=>'js:value'),
            'type'=>'post',
            'dataType'=>'json',
            'success'=>"function(data)
            {
document.getElementById('messages').innerHTML = '';
                if (data.status == 'success')
                {
                    js:$.fn.yiiGridView.update('datagrid');
                }
                else
                {
                    document.getElementById('messages').innerHTML = data.div;
                }
            } ",
            ))?>;
return false;}
</script>
<script type="text/javascript">
function refreshdata()
{$.fn.yiiGridView.update('datagrid');return false;}
</script>
<script type="text/javascript">
function helpdata(value) {
	$('#helpdialog').dialog('open');
    return false;
}
</script>
<script type="text/javascript">
function searchdata()
{
	$('#searchdialog').dialog('open');
    return false;
}
</script>
<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'helpdialog',
    'options'=>array(
        'title'=>'Help',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>'auto',
        'height'=>'auto',
    ),
));?>
<?php echo $this->renderPartial('_help'); ?>
<?php $this->endWidget();?>
<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array( // the dialog
    'id'=>'searchdialog',
    'options'=>array(
        'title'=>'Search Dialog',
        'autoOpen'=>false,
        'modal'=>true,
        'width'=>'auto',
        'height'=>'auto',
    ),
));?>
<?php echo $this->renderPartial('_search'); ?>
<?php $this->endWidget();?>
<h1><?php echo Catalogsys::model()->GetCatalog('translock') ?></h1>
		<?php
$this->widget('ToolbarButton',array('isCreate'=>true,
	'isUpload'=>true,'UrlUpload'=>'index.php?r=translock/upload',
	'isSearch'=>true,
	'isDownload'=>true,'isRefresh'=>true,
	'isHelp'=>true,'OnClick'=>"{helpdata(1)}",
	'isRecordPage'=>true,'PageSize'=>$pageSize,'OnChange'=>"$.fn.yiiGridView.update('datagrid',{data:{pageSize: $(this).val() }})"));
?>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'datagrid',
	'dataProvider'=>$model->search(),
	'hideHeader'=>true,
'selectableRows'=>1,
	'template'=>'{pager}<br>{items}{pager}',
	'columns'=>array(
		array(            
            'name'=>'translogid',
            'type'=>'raw', 
            'value'=>array($this,'gridData'), 
        ),		
	), 
));?>