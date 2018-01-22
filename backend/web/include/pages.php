<?php
use yii\widgets\LinkPager;
?>
<style>
    .pagination {
        display: inline-block;
        padding-left: 0;
        margin: 20px 0;
        border-radius: 4px;
    }
    .pagination>li {
        display: inline;
    }
    .pagination>li>a, .pager>li>a, .pagination>li>span, .pager>li>span {
        border-width: 1px;
        border-radius: 0!important;
    }
    .pagination>li>a, .pagination>li>span {
        position: relative;
        float: left;
        padding: 6px 12px;
        margin-left: -1px;
        line-height: 1.428571429;
        text-decoration: none;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .pagination>li>a {
        color: #428bca;
        text-decoration: none;
    }
</style>
<?php
echo LinkPager::widget([
    'pagination' => $pages,
]);
?>