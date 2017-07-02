<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>WeUI</title>
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="//res.wx.qq.com/open/libs/weui/1.1.2/weui.min.css"/>
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.1/weui.min.js"></script>
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

    </style>
</head>
<body>

<div class="container" id="container">
    <div class="page__hd">
        <h1 class="page__title">微读小助</h1>
    </div>
    <div class="weui-search-bar" id="search_bar">
        <form class="weui-search-bar__form">
            <div class="weui-search-bar__box">
                <i class="weui-icon-search"></i>
                <input type="search" class="weui-search-bar__input" id="search_input" placeholder="搜索" />
                <a href="javascript:" class="weui-icon-clear" id="search_clear"></a>
            </div>
            <label for="search_input" class="weui-search-bar__label" id="search_text">
                <i class="weui-icon-search"></i>
                <span>搜索</span>
            </label>
        </form>
        <a href="javascript:" class="weui-search-bar__cancel-btn" id="search_cancel">取消</a>
    </div>
</div>

<div class="weui-footer weui-footer_fixed-bottom">
    <p class="weui-footer__links">
        <a href="javascript:home();" class="weui-footer__link">微读小助</a>
    </p>
    <p class="weui-footer__text">Copyright &copy; 2017 read.no13bus.com</p>
</div>

<script type="text/javascript">
    weui.searchBar('#search_bar');
</script>
<!-- 使用 -->
<!--<a href="javascript:;" class="weui-btn weui-btn_primary">绿色按钮</a>-->
</body>
</html>