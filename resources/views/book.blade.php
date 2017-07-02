<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>{{ $title }}</title>
    <!-- 引入 WeUI -->
    <link rel="stylesheet" href="//res.wx.qq.com/open/libs/weui/1.1.2/weui.min.css"/>
    <script src="https://cdn.bootcss.com/zepto/1.2.0/zepto.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/libs/weuijs/1.1.1/weui.min.js"></script>
    <script src="//cdn.bootcss.com/echarts/3.6.2/echarts.min.js"></script>
    <style>

        .wr_bookInfoHeader {
            margin-bottom: 16px;
        }
        .wr_bookInfoHeader_coverWrap {
            position: relative;
            padding-top: 32px;
            margin-bottom: 17px;
        }
        .wr_bookInfoHeader_title {
            font-size: 22px;
            line-height: 31px;
            color: #49505a;
            margin: 0 25px 4px;
            text-align: center;
        }
        .wr_bookInfoHeader_author {
            font-size: 14px;
            line-height: 18px;
            color: #49505a;
            text-align: center;
        }
        .detail_intro {
            margin: 0 16px 16px;
        }
        .wr_limitHeightText {
            position: relative;
            font-size: 15px;
            color: #353c46;
            text-align: justify;
            overflow: hidden;
            line-height: 24px;
            max-height: 48px;
        }

        .wr_bookInfoHeader .wr_bookCover {
            position: relative;
            margin: 0 auto;
        }
        .wr_bookCover {
            border-style: solid;
            border-color: rgba(0,0,0,.1);
            border-width: 1px;
            border-radius: 0;
            display: block;
            width: 120px;
            height: 172px;
            box-shadow: 0 2px 16px rgba(0,0,0,.08);
            background: #fff;
            position: relative;
            overflow: hidden;
        }
        .wr_bookCover img, .wr_bookCover_img {
            vertical-align: top;
            width: 100%;
            height: 100%;
            background-color: #fff;
        }

        .detail_review {
            position: relative;
            padding-top: 12px;
            background-color: #eeeff1;
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
    <section id="js_book_info_header" class="wr_bookInfoHeader ">
        <div class="wr_bookInfoHeader_coverWrap">
            <div class="wr_bookCover" id="js_book_cover" data-src="http://wfqqreader.3g.qq.com/cover/626/858626/s_858626.jpg" data-alt="我们仨" data-loaded="true">
                <img src="http://wfqqreader.3g.qq.com/cover/626/858626/t4_858626.jpg" class="wr_bookCover_img" alt="我们仨">
            </div>
        </div>
        <p class="wr_bookInfoHeader_title">我们仨</p>
        <p class="wr_bookInfoHeader_author">杨绛</p>
    </section>
    <section class="detail_intro  wr_limitHeightText" id="js_intro">  1998年，钱锺书逝世，而他和杨绛唯一的女儿钱瑗已于此前（1997年）先他们而去。在人生的伴侣离去四年后，杨绛用心记述了他们这个特殊家庭63年的风风雨雨、点点滴滴，结成回忆录《我们仨》。
        <span class="wr_limitHeightText_Expand iscroll_click"></span>
    </section>

    <section class="detail_review" id="js_review" style="display: block;">
        <div class="detail_review_title">
            <span class="wr_rankBar wr_rankBar_Yellow wr_rankBar_10"></span>
            <p class="detail_review_title_text">历史价格
            </p>
        </div>
    </section>

    <section>
        <div id="main" style="width: 414px;height:300px;"></div>
        <script type="text/javascript">
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main'));

            // 指定图表的配置项和数据
            var option = {
                title: {
                    text: 'ECharts 入门示例'
                },
                tooltip: {},
                legend: {
                    data:['销量']
                },
                xAxis: {
                    data: ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子"]
                },
                yAxis: {},
                series: [{
                    name: '销量',
                    type: 'bar',
                    data: [5, 20, 36, 10, 10, 20]
                }]
            };

            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        </script>
    </section>
</div>

</body>
</html>