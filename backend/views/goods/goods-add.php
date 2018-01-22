
<section>
    <h2><strong style="color:grey;">分列内容布局</strong></h2>
    <form action="index.php?r=goods/shop" method="post" enctype="multipart/form-data">
    <ul class="ulColumn2">
        <li>
            <span class="item_name" style="width:120px;">商品名称：</span>
            <input type="text" name="shop_name" class="textbox textbox_295" placeholder="商品名称..."/>
        </li>
        <li>
            <span class="item_name" style="width:120px;">商品货号：</span>
            <input type="text" id="shop_num" name="shop_num" readonly class="textbox textbox_295" />
            <button  type="button" id="set_shop_num">生成货号</button>
        </li>
        <li>
            <span class="item_name" style="width:120px;">商品分类：</span>
              <select name="shop_type" class="select">
                 <option>请选择...</option>
                <?php foreach ($shop_type as $key => $value):?>
                    <option  value="<?= $value['id']?>"><?= $value['category_name'];?></option>
                <?php endforeach;?>
             </select>
            <button>添加分类</button>
        </li>
        <li>
            <span class="item_name" style="width:120px;">商品品牌：</span>
              <select name="shop_pinpai" class="select">
                 <option>请选择...</option>
                <?php foreach ($shop_pinpai as $key => $value):?>
                    <option  value="<?= $value['id']?>"><?= $value['name'];?></option>
                <?php endforeach;?>
             </select>
            <button>添加品牌</button>
        </li>
        <li>
            <span class="item_name" style="width:120px;">商品价格：</span>
            <input type="text" name="shop_price" class="textbox textbox_295"/>
        </li>
        <li>
            <span class="item_name" style="width:120px;">促销价格：</span>
            <input type="text"  name="shop_cprice" class="textbox textbox_295"/>
        </li>
        <li>
            <span class="item_name" style="width:120px;">商品描述：</span>
            <textarea placeholder="摘要信息"  name="shop_desc" class="textarea" style="width:500px;height:100px;"></textarea>
        </li>
        <li>
            <span class="item_name" style="width:120px;">上传图片：</span>
            <label class="uploadImg">
                <input type="file" name="shop_img" />
                <span>上传图片</span>
            </label>
        </li>
        <li>
            <span class="item_name" style="width:120px;"></span>
            <input type="submit" class="link_btn" value="添加" />
        </li>
    </ul>
    </form>
</section>
<script src="login/js/jquery.js"></script>
<script type="text/javascript">
    $("#set_shop_num").click(function(){
        $.ajax({
            'type':'type',
            'url':'index.php?r=goods/shop_num',
            success:function(res){
              $('#shop_num').val(res);
           }
        });
    });
</script>
