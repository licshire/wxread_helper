<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>我</title>
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="//res.wx.qq.com/open/libs/weui/1.1.2/weui.min.css"/>
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.1/weui.min.js"></script>
    <style>

        .ui-panel {
            overflow: hidden;
            margin-bottom: 10px;
        }
        .ui-grid-trisect {
            padding-left: 15px;
            padding-right: 10px;
            overflow: hidden;
            padding-top: 10px;
        }

        .ui-grid-trisect>li {
            width: 25%;
        }

        .ui-grid li, .ui-grid-trisect li, .ui-grid-halve li {
            padding-right: 12px;
            padding-bottom: 10px;
            float: left;
            position: relative;
            -webkit-box-sizing: border-box;
        }
        li {
            list-style: none;
        }
        .ui-border {
            border: 0px solid #e0e0e0;
        }
        .ui-grid-trisect-img, .ui-grid-halve-img {
            position: relative;
            width: 100%;
        }
        .ui-grid-trisect-img {
            padding-top: 149.47%;
            -webkit-box-shadow:0 0 5px #e0e0e0;
            -moz-box-shadow:0 0 5px #e0e0e0;
            box-shadow:0 0 5px #e0e0e0;
        }
        .ui-grid-trisect-img>span, .ui-grid-halve-img>span {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            background-repeat: no-repeat;
            -webkit-background-size: cover;
        }
        .ui-nowrap-multi {
            display: -webkit-box;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }
        .ui-grid-trisect h4 {
            position: relative;
            margin: 7px 0 3px;
            font-size: 12px;
            font-weight: normal;
        }
        .ui-nowrap {
            max-width: 100%;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .detail_review {
            position: relative;
            padding-top: 12px;
            background-color: #eeeff1;
            border-bottom: 1px solid #eeeff1;
        }
        .detail_review_title {
            height: 52px;
            line-height: 52px;
            padding: 0 16px;
            background-color: #fff;
        }

    </style>
</head>
<body>

<div class="container" id="container">
    <section style="text-align: center;background-color: white;color: black;padding-top: 20px;padding-bottom: 20px;">
        <h4>no13bus</h4>
        <div style="margin-top: 10px;">
            <img style="border-radius:50%; width:80px;height: 80px;" src="http://placeholder.qiniudn.com/190x284" alt="">
        </div>
        <p>男 天津 和平</p>
    </section>

    <section class="detail_review" id="js_review" style="display: block;">
        <div class="detail_review_title">
            <span class="wr_rankBar wr_rankBar_Yellow wr_rankBar_10"></span>
            <p class="detail_review_title_text">已订阅书籍
            </p>
        </div>
    </section>

    <section class="ui-panel">
        <ul class="ui-grid-trisect">
            <li>
                <div class="ui-border">
                    <div class="ui-grid-trisect-img">
                        <span style="background-image:url(http://placeholder.qiniudn.com/190x284)"></span>
                    </div>
                    <div>
                        <h4 class="ui-nowrap-multi">长书名长书名长书名长书名长书名长书名长书名</h4>
                    </div>
                </div>
            </li>
            <li>
                <div class="ui-border">
                    <div class="ui-grid-trisect-img">
                        <span style="background-image:url(http://placeholder.qiniudn.com/190x284)"></span>
                    </div>
                    <div>
                        <h4 class="ui-nowrap-multi">长书名长书名长书名长书名长书名长书名长书名</h4>
                    </div>
                </div>
            </li>
            <li>
                <div class="ui-border">
                    <div class="ui-grid-trisect-img">
                        <span style="background-image:url(http://placeholder.qiniudn.com/190x284)"></span>
                    </div>
                    <div>
                        <h4 class="ui-nowrap-multi">长书名长书名长书名长书名长书名长书名长书名</h4>
                    </div>
                </div>
            </li>
            <li>
                <div class="ui-border">
                    <div class="ui-grid-trisect-img">
                        <span style="background-image:url(http://placeholder.qiniudn.com/190x284)"></span>
                    </div>
                    <div>
                        <h4 class="ui-nowrap-multi">长书名长书名长书名长书名长书名长书名长书名</h4>
                    </div>
                </div>
            </li>
        </ul>
    </section>
    <section style="margin-top:20px; padding: 0px 15px;">
        <a href="javascript:;" class="weui-btn weui-btn_warn">退出登录</a>
    </section>
</div>

</body>
</html>