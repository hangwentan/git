
<section>
    <h2><strong style="color:grey;">分类添加</strong></h2>
    <ul class="ulColumn2">
        <li>
            <span class="item_name" style="width:120px;">分类名称：</span>
            <input type="text" onblur="input()" name="brand" class="textbox textbox_295" placeholder="文本信息提示..."/>
            <span class="errorTips">内容不可为空...</span>
        </li>
        <li>
            <span class="item_name" style="width:120px;">所属商品分类：</span>
            <select name="type" class="select">
                <option value="0">请选择</option>
                <?php foreach ($brandcata as $k =>$v){?>
                <option value="<?=$v['brand_id']?>"><?=$v['brand_name']?></option>
                <?php }?>
            </select>
        </li>
        <li>
            <span class="item_name" style="width:120px;"></span>
            <input type="submit" class="link_btn"/>
        </li>
    </ul>
</section>
<script>
    $('.errorTips').hide();
    function input() {
        var brand = $('input[name=brand]').val();
        if(brand == ''){
            $('.errorTips').show();
            return false;
        }
        $('.errorTips').hide();return true;
    }

    $('.link_btn').click(function () {
        var brand = $('input[name=brand]').val();
        var type = $('select[name=type]').val();
        if (!input()){
            alert('内容不可为空');
            return false;
        }
        $.post('index.php?r=goods/brand-add',{brand:brand,type:type},function (msg) {
            if(msg == 1){
                alert('添加成功');
            }
        })
    })
</script>