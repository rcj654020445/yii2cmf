<?php

use common\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $models array */
/* @var $pages array */
/* @var $hotTags array */
if(isset($category)) {
    $this->title = $category->title;
    $this->params['breadcrumbs'][] = $category->title;
    $this->registerMetaTag(['name' => 'keywords', 'content' => $category->title . ' ' . Yii::$app->config->get('SEO_SITE_KEYWORDS')]);
    $this->registerMetaTag(['name' => 'description', 'content' => $category->description . ' ' . Yii::$app->config->get('SEO_SITE_DESCRIPTION')]);
} elseif (isset($tag)) {
    $this->title = $tag->name;
    $this->params['breadcrumbs'][] = $tag->name;
}


?>
<div class="col-lg-8">
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item',
        'layout' => "{items}",
        'options' => ['class' => 'article-list'],
        'itemOptions' => ['class' => 'media']
    ]) ?>
    <?php if (!(new \Detection\MobileDetect())->isMobile()): ?>
    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination
    ]); ?>
    <?php else:?>
    <?= \yii\widgets\LinkPager::widget([
        'pagination' => $dataProvider->pagination,
        'nextPageLabel' => '下一页',
        'prevPageLabel' => '上一页',
        'maxButtonCount' => 0,
        'prevPageCssClass' => 'previous',
        'nextPageCssClass' => 'next',
        'options' => ['class' => 'pager'],
    ]); ?>
    <?php endif;?>
</div>
<div class="col-lg-4">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h5>热门标签</h5>
        </div>
        <div class="panel-body">
            <ul class="tag-list list-inline">
                <?php foreach($hotTags as $tag): ?>
                    <li><a class="label label-<?= $tag->level ?>" href="<?= \yii\helpers\Url::to(['article/tag', 'name' => $tag->name])?>"><?= $tag->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
