<?php

use common\helpers\Html;
use yii\helpers\Url;
/**
 * Created by PhpStorm.
 * User: yidashi
 * Date: 16/4/7
 * Time: 下午6:13
 */
$this->title = '个人中心';
?>
<div class="panel panel-default">
    <div class="panel-body" style="background: url(http://www.yiichina.com/images/user-bg.jpg); background-size:100% 120px; background-repeat:no-repeat;">
        <div class="user">
            <a href="<?= Url::to(['/my/profile']) ?>" title="" data-toggle="tooltip" data-original-title="点击修改头像">
                <?= Html::img($user->profile->avatar, ['class' => 'avatar']) ?>
            </a>
            <h1><?= $user->username?></h1>
            <p><?= $user->profile->signature?></p>
            <ul class="stat">
                <li>余额<h3><?= $user->profile->money ?></h3></li>
                <li>关注<h3>120</h3></li>
                <li>粉丝<h3>4365</h3></li>
            </ul>
        </div>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">个人信息</div>
        <span class="pull-right"><a href="<?= Url::to(['/my/profile']) ?>" title="" data-toggle="tooltip" data-original-title="点击修改个人信息"><i class="fa fa-cog"></i> </a></span>
    </div>
    <div class="panel-body">
        <ul class="user-info">
            <li><i class="fa fa-calendar fa-fw"></i> 注册时间：<?= Yii::$app->formatter->asDatetime($user->created_at) ?></li>
            <li><i class="fa fa-sign-in fa-fw"></i> 最后登录：<?= Yii::$app->formatter->asRelativeTime($user->login_at) ?></li>
<!--            <li><i class="fa fa-clock-o fa-fw"></i> 在线时长：37小时24分</li>-->
            <li><i class="fa fa-map-marker fa-fw"></i> <?= $user->profile->signature ?></li>
            <li><i class="fa fa-envelope-o fa-fw"></i> <?= $user->email ?></li>
            <li><i class="fa fa-group fa-fw"></i> 未设置</li>
        <ul>
        </ul></ul>
    </div>
</div>