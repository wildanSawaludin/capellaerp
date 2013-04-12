<?php
$this->widget('ToolbarButton',array('cssToolbar'=>'buttongrid','isEdit'=>true,'id'=>$model->productpurchaseid,
	'isDelete'=>true,'isDownload'=>true));
?>
<div id="tabledata">
<div class="rowdata">
	<span class="cell">ID</span>
    <span class="cell"><?php echo $model->productpurchaseid;?></span>
</div>
<div class="rowdata">
	<span class="cell">Material Master / Service</span>
    <span class="cell"><?php echo ($model->product!==null)?$model->product->productname:'';?></span>
</div>
<div class="rowdata">
	<span class="cell">Plant</span>
    <span class="cell"><?php echo ($model->plant!==null)?$model->plant->description:'';?></span>
</div>
<div class="rowdata">
	<span class="cell">Order Unit</span>
    <span class="cell"><?php echo ($model->orderunit0!==null)?$model->orderunit0->description:'';?></span>
</div>
<div class="rowdata">
	<span class="cell">Status</span>
    <span class="cell"><?php echo ($model->recordstatus==1)?Catalogsys::model()->getcatalog("active"):Catalogsys::model()->getcatalog("notactive");?></span>
</div>
</div>