<section>
    <div class="page_title">
        <h2 class="fl">品牌添加</h2>
        <a href="?r=goods/brand-list-add" class="fr top_rt_btn">添加品牌</a>
    </div>
    <table class="table">
        <tr>
            <th>品牌名称</th>
            <th>品牌分类</th>
            <th>操作</th>
        </tr>
        <?php foreach ($brand as $item =>$val) {?>
            <tr>
                <td style="width:265px;"><div class="cut_title ellipsis"><?=$val['name']?></div></td>
                <td style="width:265px;"><div class="cut_title ellipsis"><?=$val['brand_name']?></div></td>
                <td><center>
                        <a href="#">表内链接</a>
                        <a href="#" class="inner_btn">表内按钮</a></center>
                </td>
            </tr>
        <?php }?>
    </table>
    <aside class="paging">
        <a>第一页</a>
        <a>1</a>
        <a>2</a>
        <a>3</a>
        <a>…</a>
        <a>1004</a>
        <a>最后一页</a>
    </aside>
</section>