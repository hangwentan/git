
<section>
    <h2><strong style="color:grey;">品牌添加</strong></h2>
    <form action="?r=goods/brand-type-show" method="post" enctype="multipart/form-data">
    <ul class="ulColumn2">
        <li>
            <span class="item_name" style="width:120px;">品牌名称：</span>
            <input type="hidden" name="id" value="<?=$brand['id']?>">
            <input type="text" onblur="input()" name="brand" value="<?=$brand['name']?>" class="textbox textbox_295" placeholder="文本信息提示..."/>
            <span class="errorTips">内容不可为空...</span>
        </li>
        <li>
            <span class="item_name" style="width:120px;">排序：</span>
            <input type="text" name="sort" value="<?=$brand['sort']?>" class="textbox textbox_295" placeholder="文本信息提示..."/>
        </li>
        <li>
            <span class="item_name" style="width:120px;">上传图片：</span>
            <label class="uploadImg">
                <input name="file" type="file"/>
                <span>上传图片</span>
            </label>
        </li>
        <li>
            <span class="item_name" style="width:120px;">所属品牌分类：</span>
            <select name="type" class="select">
                <option value="<?=$category['brand_id']?>"><?=$category['brand_name']?></option>
                <?php foreach ($brandcate as $k =>$v){?>
                <option value="<?=$v['brand_id']?>"><?=$v['brand_name']?></option>
                <?php }?>
            </select>
        </li>
        <li>
            <span class="item_name" style="width:120px;">描述：</span>
            <textarea placeholder="摘要信息" name="description" class="textarea" style="width:500px;height:100px;"></textarea>
        </li>
        <li>
            <span class="item_name" style="width:120px;"></span>
            <input type="submit" class="link_btn"/>
        </li>
    </ul>
    </form>
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
        var type = $('select[name=type]').val();
        if (!input() || type == 0){
            alert('内容不可为空');
            return false;
        }
    })
</script>