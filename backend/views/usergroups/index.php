<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\UsergroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กลุ่มผู้ใช้งาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usergroups-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //echo Html::a('Create Usergroups', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
         'panel'=>[
            'type'=>GridView::TYPE_SUCCESS,
            'heading'=>$this->render('_search', ['model' => $searchModel]),
        ],
        'toolbar'=>[
            ['content'=>Html::a('สร้างใหม่', ['create'], ['class' => 'btn btn-primary'])],
            '{toggleData}','{export}',
        ],
        'columns' => [
          ['class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'headerOptions' => ['style' => 'text-align: center'],
                'contentOptions' => ['style' => 'text-align: center']
            ],
           // 'recid',
            'groupname',
            'description',
            'createdate',

            [

                'header' => 'Action',
                'headerOptions' => ['style' => 'width: 160px;text-align:center;','class' => 'activity-view-link',],
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align: center'],
                'buttons' => [
                    'view' => function($url, $data, $index) {
                        $options = [
                            'title' => Yii::t('yii', 'View'),
                            'aria-label' => Yii::t('yii', 'View'),
                            'data-pjax' => '0',
                        ];
                        return Html::a(
                                        '<span class="glyphicon glyphicon-eye-open btn btn-default"></span>', $url, $options);
                    },
                        'update' => function($url, $data, $index) {
                        $options = array_merge([
                            'title' => Yii::t('yii', 'Update'),
                            'aria-label' => Yii::t('yii', 'Update'),
                            'data-pjax' => '0',
                            'id'=>'modaledit',
                        ]);
                        return Html::a(
                                        '<span class="glyphicon glyphicon-pencil btn btn-default"></span>', $url, [
                                            'id' => 'activity-view-link',
                                            //'data-toggle' => 'modal',
                                           // 'data-target' => '#modal',
                                            'data-id' => $index,
                                            'data-pjax' => '0'
                                        ]);
                    },
                            'delete' => function($url, $data, $index) {
                        $options = array_merge([
                            'title' => Yii::t('yii', 'Delete'),
                            'aria-label' => Yii::t('yii', 'Delete'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                                ]);
                        return Html::a('<span class="glyphicon glyphicon-trash btn btn-default"></span>', $url, $options);
                    }
                        ]
                    ],
        ],
    ]); ?>

</div>
<div class="pagename"  <?php echo "id=$pagename"; ?>></div>
<?php 
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/leftmenu.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>