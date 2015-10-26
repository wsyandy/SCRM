<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Empresa', 'url'=>array('list')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#empresa-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Empresas</h1>

<p>
Nota:
</p>

<?php 
        $this->widget('booster.widgets.TbGridView', array(
            'id' => 'dispositivo-grid-list',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(                                                       
                array(
                    'name' => 'cuit',
                    'header'=>'CUIT'
                ),
                array(
                    'name' => 'razonsocial',
                    'header'=>'Razon Social'
                ),                                                
                array(
                    'class' => 'booster.widgets.TbButtonColumn',
                   // 'htmlOptions' => array('width' => '10'), //ancho de la columna
                    'template' => '{view}{update}{delete}', // botones a mostrar
                    'buttons' => array(
                        'view' => array(
                            'label' => 'Detalles',                                                         
                            'url'=> 'Yii::app()->createUrl("empresa/view?cuit=$data->cuit")'
                        ),  
                        'delete' => array
                        (
                            'label'=>'Eliminar',
                            'icon'=>'glyphicon glyphicon-trash',

                            'click' => 'function(){return confirm("Desea eliminar la empresa?");}',
                            'url'=> 'Yii::app()->createUrl("empresa/delete?cuit=$data->cuit")',                                                    
                            
                        ),                        
                        'update' => array(
                            'label' => 'Actualizar',                                                         
                            'url'=> 'Yii::app()->createUrl("empresa/update?cuit=$data->cuit")'
                        ),
                    ),
                    //'htmlOptions'=>array('style'=>'width: 120px'),
                    ),
            ),

        ));
    ?> 