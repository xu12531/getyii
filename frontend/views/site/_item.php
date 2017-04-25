<?php

use yii\helpers\Html;
?>
<li class="list-group-item media col-sm-6 mt0">
    <?php if($model['comment_count']==0){ $class="badge bodge-circle badge-reply-count" ;}else{$class="badge bodge-circle badge-reply-count-new"; } ?>
    <?= Html::a(Html::tag('span', $model['comment_count'], ['class' => $class]),
        ['/topic/default/view', 'id' => $model->id, '#' => 'comment' . $model['comment_count']], ['class' => 'pull-right']
    ); ?>

    <div class="avatar pull-left">
        <?= Html::a(Html::img($model->user->userAvatar, ['class' => 'media-object']),
            ['/user/default/show', 'username' => $model->user['username']]
        ); ?>
    </div>

    <div class="infos">

        <div class="media-heading <?= ($model->recommend == 1) ?  "recommend" : null ?> ">
            <?= Html::a($model->title,
                ['/topic/default/view', 'id' => $model->id], ['title' => $model->title]
            ); ?>
            <?= ($model->top == 1) ? Html::tag('i', '', ['class' => 'fa fa-arrow-up icon-top']) : null ?>
            <?= ($model->recommend == 1) ? Html::tag('i', '', ['class' => 'fa fa-plane icon-recommend']) : null ?>
            <?= ($model->status == 2) ? Html::tag('i', '', ['class' => 'fa fa-trophy icon-excellent']) : null ?>
        </div>
        <div class="media-body meta title-info">
            <?php
            if ($model->like_count) {
                echo Html::a(Html::tag('span', ' ' . $model->like_count . ' ', ['class' => 'fa fa-thumbs-o-up']),
                    ['/topic/default/view', 'id' => $model->id], ['class' => 'remove-padding-left']
                ), '•';
            }
            echo Html::a(
                $model->category->name,
                ['/topic/default/index', 'node' => $model->category->alias],
                ['class' => 'node']
            ), '•',
            Html::a(
                $model->user['username'],
                ['/user/default/show', 'username' => $model->user['username']]
            ), '•',
            Html::tag('span', Yii::$app->formatter->asRelativeTime($model->created_at));
            ?>
        </div>

    </div>

</li>