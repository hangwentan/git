
<script>
    $(document).ready(function(){
        //tab
        $(".admin_tab li a").click(function(){
            var liindex = $(".admin_tab li a").index(this);
            $(this).addClass("active").parent().siblings().find("a").removeClass("active");
            $(".admin_tab_cont").eq(liindex).fadeIn(150).siblings(".admin_tab_cont").hide();
        });
    });
</script>

<section>
    <ul class="admin_tab">
        <li><a class="active">商品详细</a></li>
        <li><a>商品属性</a></li>
        <li><a>商品图片</a></li>
    </ul>
    <!--tabCont-->
    <form action="index.php?r=goods/shop" method="post" enctype="multipart/form-data">
    <div class="admin_tab_cont" style="display:block;">
        <section>
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
        </section>
    </div>

    <!---商品属性--->
    <div class="admin_tab_cont">
        <section>
            <ul class="ulColumn2">
                <li>
                    <span class="item_name" style="width:120px;">商品属性：</span>
                    <a href="javascript:0;" class="id-add">添加</a>
                </li>
                    <span class="item_name" style="width:120px;"></span>
                    <input type="submit" class="link_btn" value="添加" />
                </li>
            </ul>
        </section>
    </div>
        <!----商品图片--->
    <div class="admin_tab_cont">
        <section>
            <ul class="ulColumn2">
                <li>
                    <span class="item_name" style="width:120px;">上传图片：</span>
                    <label class="uploadImg">
                        <input type="file" name="goods_img[]" />
                        <span>上传图片</span>
                    </label>
                    <a href="javascript:0;" id="img-add">[+]</a>
                </li>
                <li>
                    <span class="item_name" style="width:120px;"></span>
                    <input type="submit" class="link_btn" value="添加" />
                </li>
            </ul>
        </section>
    </div>
    </form>
</section>

<script src="login/js/jquery.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#set_shop_num").click(function(){
        $.ajax({
            'type':'type',
            'url':'index.php?r=goods/shop_num',
            success:function(res){
              $('#shop_num').val(res);
           }
        });
    });

    /*
    *商品属性
     */
    $(document).on('click','.id-add',function(){
        i++;
        var str = '<li id="'+i+'"><span class="item_name" style="width:120px;">属性名称：</span>' +
            '<input type="text" name="attr['+i+'][]" class="textbox" placeholder="属性名称..."/>' +
            '<a href="javascript:0;" class="id-del">【-】</a><a href="javascript:0;" class="id-zi">【+】</a></li>';
        $(this).parents('ul').append(str);
    });

    $(document).on('click','.id-zi',function(){
        var id = $(this).parent('li').attr('id');
        var str = '<li><span class="item_name" style="width:120px;">规格参数：</span>' +
            '<input type="text" name="attr_type['+id+'][]" class="textbox" placeholder="规格..."/>' +
            '<span class="item_name" style="width:120px;">价格参数：</span>' +
            '<input type="text" name="attr_price['+id+'][]" class="textbox" placeholder="价格..."/>' +
            '<a href="javascript:0;" class="id-zidel">【-】</a></li>';
        $(this).after(str);
    });

    $(document).on('click','.id-zidel',function () {
        $(this).parent('li').remove();
    });
    $(document).on('click','.id-del',function () {
        $(this).parent('li').remove();
    })
    /*
    商品图片
     */
    $(document).on('click','#img-add',function () {
        var str = '<li><span class="item_name" style="width:120px;">上传图片：</span> ' +
            '<label class="uploadImg"> <input type="file" name="goods_img[]" />' +
            ' <span>上传图片</span> </label> ' +
            '<a href="javascript:0;" id="img-del">[-]</a> </li>';
        $(this).after(str);
    });
    $(document).on('click','#img-del',function () {
        $(this).parent('li').remove();
    })
</script>
