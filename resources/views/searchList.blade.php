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
    <style>


        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .wr_bookListItem {
            position: relative;
            border: none;
            border-radius: 0;
            overflow: hidden;
        }

        .wr_bookListItem:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 0;
            border-style: solid;
            border-color: #dee0e2;
            border-width: 0 0 1px;
            box-sizing: border-box;
            pointer-events: none;
            margin-left: 16px;
        }

        a:hover {
            text-decoration: none;
        }
        .wr_bookListItem_wrap {
            display: block;
            padding: 12px 16px 10px;
        }


        .wr_bookListItem_wrap .wr_bookCover {
            float: left;
            margin-top: 2px;
            margin-right: 12px;
            overflow: hidden;
        }
        .wr_bookCover_Tiny {
            width: 56px;
            height: 80px;
            box-shadow: 0 1px 8px rgba(0,0,0,.08);
        }

        .wr_bookCover img, .wr_bookCover_img {
            vertical-align: top;
            width: 100%;
            height: 100%;
            background-color: #fff;
        }

        .wr_bookListItem_wrap_info_title {
            color: #49505a;
            line-height: 20px;
            font-size: 17px;
            margin-bottom: 4px;
        }
        .wr_bookListItem_wrap_info_author, .wr_bookListItem_wrap_info_title {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            -o-text-overflow: ellipsis;
            word-break: break-all;
            word-wrap: normal;
        }

        .wr_bookListItem_wrap_info_author {
            display: inline-block;
            max-width: 11em;
            vertical-align: top;
        }
        .wr_bookListItem_wrap_info_author {
            height: 17px;
            line-height: 17px;
            color: #717882;
            font-size: 14px;
            margin-bottom: 3px;
        }
        .wr_bookListItem_wrap_info_author, .wr_bookListItem_wrap_info_title {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            -o-text-overflow: ellipsis;
            word-break: break-all;
            word-wrap: normal;
        }

        .wr_bookListItem_wrap_info_desc {
            color: #5d646e;
            font-size: 14px;
            line-height: 21px;
            overflow: hidden;
            height: 42px;
            display: -webkit-box;
            display: -moz-box;
            display: box;
            text-overflow: ellipsis;
            -webkit-line-clamp: 2;
            -moz-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            -moz-box-orient: vertical;
            box-orient: vertical;
        }


    </style>
</head>
<body>

<div class="container" id="container" style="position: relative;">
</div>


<script id="tpl" type="text/template">
    <ul class="limitFree_list js_list">
        [[each books as it,index]]
        <li class="wr_bookListItem">
            <a href="/read/book?bookid=<=it.bookInfo.bookId=>" class="wr_bookListItem_wrap js_book_scheme_link">
                <div class="wr_bookCover wr_bookCover_Tiny js_book_cover">
                    <img src="<=it.bookInfo.cover=>" class="wr_bookCover_img" alt="<=it.bookInfo.title=>" />
                </div>
                <div class="wr_bookListItem_wrap_info iscroll_click">
                    <div class="wr_bookListItem_wrap_info_title iscroll_click">
                        <=it.bookInfo.title=>
                    </div>
                    <div class="wr_bookListItem_wrap_info_author iscroll_click">
                        <=it.bookInfo.author=>
                    </div>
                    <p class="wr_bookListItem_wrap_info_desc iscroll_click"> <=it.bookInfo.intro=> </p>
                </div>
            </a>
        </li>
        [[/each]]
    </ul>
</script>

<script type="text/javascript" src="{{ URL::asset('/') }}js/juicer-min.js"></script>
<script type="application/javascript">
    $(document).on('ready', function(){
        juicer.set({
            'tag::operationOpen': '[[',
            'tag::operationClose': ']]',
            'tag::interpolateOpen': '<=',
            'tag::interpolateClose': '=>',
            'tag::noneencodeOpen': '$${',
            'tag::noneencodeClose': '}',
            'tag::commentOpen': '{#',
            'tag::commentClose': '}'
        });

        $.ajax({
            type:'POST',
            url:'/read/searchSubmit',
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: JSON.stringify({"q": "{{ Request::input("q") }}"}),
            success:function(response,status,xhr){
                var data = {
                    list: [
                        {aa:{name:"h"},name:' guokai', show: true},
                        {aa:{name:"j"},name:' benben', show: false},
                        {aa:{name:"k"},name:' dierbaby', show: true}
                    ]
                };

                var tpl = document.getElementById('tpl').innerHTML;
                var html = juicer(tpl, response);
                console.log(response.books);
                document.getElementById('container').innerHTML = html;
            },
            error:function () {

            }
        });






    });

</script>

</body>
</html>