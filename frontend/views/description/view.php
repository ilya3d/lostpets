<? use yii\helpers\Html;
use yii\widgets\DetailView;

\yii\bootstrap\BootstrapAsset::register($this);  ?>

<div class="description-view">
    <h1><?= Html::encode($description->title) ?></h1>
    <?= DetailView::widget([
        'model' => $description,
        'attributes' => [
            [
                'label'=>'photo',
                'format'=>'html',
                'value'=>Html::img('/uploads/'.$description->photo)
            ],
            'title',
            'description',
            'phone',
            'email',
            [
                'label'=>'print version',
                'format'=>'html',
                'value'=>Html::a('link','/print/'.$description->hash)
            ]
            /*
            'photo'=>function(){
                return ;
            }*/

        ],
    ]) ?>

</div>
