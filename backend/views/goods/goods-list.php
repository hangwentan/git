<section>
    <h2><strong style="color:grey;">页面标题及表格/分页（根据具体情况列入重点，切勿放置可扩展内容不定的数据）</strong></h2>
    <div class="page_title">
        <h2 class="fl">例如产品详情标题</h2>
        <a class="fr top_rt_btn">右侧按钮</a>
    </div>
    <table class="table">
        <tr>
            <th>商品名称</th>
            <th>商品货号</th>
            <th>商品类型</th>
            <th>商品品牌</th>
            <th>促销价格</th>
            <th>商品价格</th>
            <th>商品描述</th>
        </tr>
    <?php foreach($data as $val):?>
             <tr style="height:100px;">
                <td width='200px;'><?= $val['shop_name'];?></td>
                <td width='200px;'><?= $val['shop_num'];?></td>
                <td width='200px;'><?= $val['category_name'];?></td>
                <td width='200px;'><?= $val['name'];?></td>
                <td width='200px;'><?= $val['shop_cprice'];?>元</td>
                <td width='200px;'><?= $val['shop_price']?>元</td>
                <td width='200px;'><?= $val['shop_desc']?></td>
            </tr>
    <?php endforeach;?>
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