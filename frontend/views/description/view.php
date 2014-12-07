<? use yii\helpers\Html;
use yii\widgets\DetailView;

$this->registerMetaTag([
    'name' => 'twitter:card',
    'content' => 'test'
]);

$this->registerMetaTag([
    'name' => 'twitter:site',
    'content' => '@lostpets'
]);

$this->registerMetaTag([
    'name' => 'twitter:image:src',
    'content' => 'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$description->photo
]);
$this->registerMetaTag([
    'name' => 'twitter:title',
    'content' => $description->title
]);
$this->registerMetaTag([
    'name' => 'twitter:description',
    'content' => 'Please help '
]);

$this->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Lost pets '
]);

$this->registerMetaTag([
    'property' => 'og:image',
    'content' => 'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$description->photo
]);
$this->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Lost pet'
]);



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

    <p>
        <script type="text/javascript">(function(w,doc) {
                if (!w.__utlWdgt ) {
                    w.__utlWdgt = true;
                    var d = doc, s = d.createElement('script'), g = 'getElementsByTagName';
                    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                    s.src = ('https:' == w.location.protocol ? 'https' : 'http')  + '://w.uptolike.com/widgets/v1/uptolike.js';
                    var h=d[g]('body')[0];
                    h.appendChild(s);
                }})(window,document);
        </script>
    <div data-share-size="30" data-like-text-enable="false" data-background-alpha="0.0" data-pid="1319194" data-mode="share" data-background-color="#ffffff" data-share-shape="round-rectangle" data-share-counter-size="12" data-icon-color="#ffffff" data-text-color="#000000" data-buttons-color="#ffffff" data-counter-background-color="#ffffff" data-share-counter-type="disable" data-orientation="horizontal" data-following-enable="false" data-sn-ids="fb.tw." data-selection-enable="true" data-exclude-show-more="true" data-share-style="1" data-counter-background-alpha="1.0" data-top-button="false" class="uptolike-buttons" ></div>

    </p>

</div>
