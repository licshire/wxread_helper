<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>搜索</title>
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="//res.wx.qq.com/open/libs/weui/1.1.2/weui.min.css"/>
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.1/weui.min.js"></script>


    <link rel="stylesheet" href="//g.alicdn.com/msui/sm/0.6.2/css/sm.min.css">
    <script type='text/javascript' src='//g.alicdn.com/sj/lib/zepto/zepto.min.js' charset='utf-8'></script>
    <script type='text/javascript' src='//g.alicdn.com/msui/sm/0.6.2/js/sm.min.js' charset='utf-8'></script>

    <style>

        .page__hd {
            padding: 40px;
        }
        .page__title {
            text-align: center;
            font-size: 30px;
            font-weight: 400;
            color: #3CC51F
        }
        .bar{
            position: static;
        }

    </style>
</head>
<body>

<div class="container" id="container">
    <div class="page__hd">
        <h1 class="page__title">微读小助</h1>
    </div>

    <div class="bar bar-header-secondary">
        <form id="search-form">
            <div class="searchbar">
                <a class="searchbar-cancel">取消</a>
                <div class="search-input">
                    <label class="icon icon-search" for="search"></label>
                    <input type="search" id='search' placeholder='输入关键字...'/>
                </div>
            </div>
        </form>

    </div>



</div>

<div class="weui-footer weui-footer_fixed-bottom">
    <p class="weui-footer__links">
        <a href="javascript:home();" class="weui-footer__link">微读小助</a>
    </p>
    <p class="weui-footer__text">Copyright &copy; 2017 read.no13bus.com</p>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#search-form').submit(function (e) {
            var search_val = $('#search').val();
            if(search_val){
                location.href = '/read/searchList?q=' + search_val;
                return false;
            }else{
                weui.alert('请填写搜索内容');
                return false;
            }
        });
    });

</script>
<!-- 使用 -->
<!--<a href="javascript:;" class="weui-btn weui-btn_primary">绿色按钮</a>-->
</body>
</html>