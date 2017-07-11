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
        }

        .wr_bookListItem:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            height: 200%;
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
        .qui_clear:after, .qui_tabNav:after, .wr_bookListItem_wrap:after {
            clear: both;
            content: ".";
            display: block;
            line-height: 0;
            font-size: 0;
            visibility: hidden;
            overflow: hidden;
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
        .qui_txtOverflow, .wr_bookListItem_wrap_info_author, .wr_bookListItem_wrap_info_title {
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
        .qui_txtOverflow, .wr_bookListItem_wrap_info_author, .wr_bookListItem_wrap_info_title {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            -o-text-overflow: ellipsis;
            word-break: break-all;
            word-wrap: normal;
        }

        .wr_bookListItem_wrap_info_tag {
            vertical-align: bottom;
            margin-left: 2px;
        }
        .wr_bookListItem_wrap_info_tag {
            display: inline-block;
            border-radius: 3px;
            color: #fff;
            background: #1b88ee;
            font-size: 12px;
            padding: 0 6px;
            height: 18px;
            line-height: 18px;
            -webkit-transform: scale(.75,.75);
            -moz-transform: scale(.75,.75);
            -ms-transform: scale(.75,.75);
            -o-transform: scale(.75,.75);
            transform: scale(.75,.75);
            -webkit-transform-origin: 0 0;
            -moz-transform-origin: 0 0;
            -ms-transform-origin: 0 0;
            transform-origin: 0 0;
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

<div class="container" id="container">
    <ul class="limitFree_list js_list">
        <li class="wr_bookListItem"><a href="javascript:" ontouchstart="" data-id="215951" class="wr_bookListItem_wrap js_book_scheme_link">
                <div class="wr_bookCover wr_bookCover_Tiny js_book_cover" data-src="http://wfqqreader.3g.qq.com/cover/951/215951/s_215951.jpg" data-alt="北京，北京：《春风十里不如你》原著" data-loaded="true">
                    <img src="http://wfqqreader.3g.qq.com/cover/951/215951/t4_215951.jpg" class="wr_bookCover_img" alt="北京，北京：《春风十里不如你》原著" />
                </div>
                <div class="wr_bookListItem_wrap_info iscroll_click">
                    <div class="wr_bookListItem_wrap_info_title iscroll_click">
                        北京，北京：《春风十里不如你》原著
                    </div>
                    <div class="wr_bookListItem_wrap_info_author iscroll_click">
                        冯唐
                    </div>
                    <p class="wr_bookListItem_wrap_info_desc iscroll_click"> 已改编成网剧《春风十里不如你》，周冬雨、张一山主演，7月21日优酷播出。“交值得交的朋友，喝值得喝的烈酒，睡值得操的姑娘”！由青春步入成熟，从萌动收获迷惘，浓重的男性荷尔蒙是冯唐作品一贯最大的特色。本书是冯唐“万物生长三部曲”第三部，和《十八岁给我一个姑娘》《万物生长》一起，构成一个松散的成长过程。这是冯唐作品中气势最猛烈，如草原野火般的一部。这位语言的魔术师，以汹涌澎湃、聪明灵动的语言，述说着自己的北京往事，讲述在他的认知中，人如何离开毛茸茸的状态，开始装逼，死挺，成为社会中坚。他一边说笑着，一边使坏着，当你惊叹着渐渐沉迷时，却突然发现巨大的悲伤悄然而至，漫天火焰消失，然后，只有淡淡的缕缕清烟。这是梦想中的书。嚣张，迅烈，胆大妄为。 </p>
                </div></a></li>
        <li class="wr_bookListItem"><a href="javascript:" ontouchstart="" data-id="758872" class="wr_bookListItem_wrap js_book_scheme_link">
                <div class="wr_bookCover wr_bookCover_Tiny js_book_cover" data-src="http://wfqqreader.3g.qq.com/cover/872/758872/s_758872.jpg" data-alt="北回归线" data-loaded="true">
                    <img src="http://wfqqreader.3g.qq.com/cover/872/758872/t4_758872.jpg" class="wr_bookCover_img" alt="北回归线" />
                </div>
                <div class="wr_bookListItem_wrap_info iscroll_click">
                    <div class="wr_bookListItem_wrap_info_title iscroll_click">
                        北回归线
                    </div>
                    <div class="wr_bookListItem_wrap_info_author iscroll_click">
                        亨利&middot;米勒
                    </div>
                    <p class="wr_bookListItem_wrap_info_desc iscroll_click"> 此书在美国被禁30年，历经50场官司，几乎遍及全国每个州，最后联邦最高法院以5：4多数裁决《北回归线》不是淫秽的，因为“它有社会价值”，此书才终获出版。《北回归线》是亨利&middot;米勒自传性三部曲之首，描写了米勒同几位作家、艺术家朋友旅居巴黎的生活经历，同时通过对工作、交谈、宴饮、嫖妓等夸张、变形的生活细节的描写，展现了穷困潦倒的艺术家们的内在精神世界，诘问了在这个杂乱无序、肮脏的世界生存的意义。该书出版后吸引了众多读者，1961年在美国解禁后更是成为畅销全球的文学名著，深刻影响了二战后的欧美文坛。 </p>
                </div></a></li>
        <li class="wr_bookListItem"><a href="javascript:" ontouchstart="" data-id="809763" class="wr_bookListItem_wrap js_book_scheme_link">
                <div class="wr_bookCover wr_bookCover_Tiny js_book_cover" data-src="http://wfqqreader.3g.qq.com/cover/763/809763/s_809763.jpg" data-alt="月亮和六便士" data-loaded="true">
                    <img src="http://wfqqreader.3g.qq.com/cover/763/809763/t4_809763.jpg" class="wr_bookCover_img" alt="月亮和六便士" />
                </div>
                <div class="wr_bookListItem_wrap_info iscroll_click">
                    <div class="wr_bookListItem_wrap_info_title iscroll_click">
                        月亮和六便士
                    </div>
                    <div class="wr_bookListItem_wrap_info_author iscroll_click">
                        威廉&middot;萨默塞特&middot;毛姆
                    </div>
                    <p class="wr_bookListItem_wrap_info_desc iscroll_click"> 文艺青年的梦想之书：满地都是六便士，他却抬头看见了月亮。《小王子》《追风筝的人》译者李继宏译作，白岩松、余华、村上春树、杨澜、蔡崇达、刘瑜、俞敏洪推荐。精神优于物质、个体大于社会——书中诠释的这种反世俗、反传统的立场，让几代读者为之潸然泪下。书中的主人公“我”是伦敦怀才不遇的作家，偶然间认识了一位证券经纪人，对方在人届中年后突然响应内心的呼唤，离经叛道舍弃一切，先是奔赴巴黎，后又到南太平洋的塔希提岛与土著人一起生活，全身心投入绘画，并在死后声名大噪。“我”在他成名后开始追溯与艺术家家曾经的来往与对方之后的人生经历。艺术家的故事以生极落魄、死备哀荣的法国后印象派画家高更的生平为基础。 </p>
                </div></a></li>
        <li class="wr_bookListItem"><a href="javascript:" ontouchstart="" data-id="840673" class="wr_bookListItem_wrap js_book_scheme_link">
                <div class="wr_bookCover wr_bookCover_Tiny js_book_cover" data-src="http://wfqqreader.3g.qq.com/cover/673/840673/s_840673.jpg" data-alt="鞋狗：耐克创始人菲尔&middot;奈特亲笔自传" data-loaded="true">
                    <img src="http://wfqqreader.3g.qq.com/cover/673/840673/t4_840673.jpg" class="wr_bookCover_img" alt="鞋狗：耐克创始人菲尔&middot;奈特亲笔自传" />
                </div>
                <div class="wr_bookListItem_wrap_info iscroll_click">
                    <div class="wr_bookListItem_wrap_info_title iscroll_click">
                        鞋狗：耐克创始人菲尔&middot;奈特亲笔自传
                    </div>
                    <div class="wr_bookListItem_wrap_info_author iscroll_click">
                        菲尔&middot;奈特
                    </div>
                    <p class="wr_bookListItem_wrap_info_desc iscroll_click"> 在《鞋狗》中，创始人菲尔&middot;奈特亲自讲述了耐克“从0到1”的过程：一个美国俄勒冈州的普通人，出于对跑步的热爱决定进入跑鞋销售领域，从50美元起步，带领一支个性古怪的“杂牌军”，游走于随时破产的边缘，却最终缔造了一个强大的体育商业帝国，让耐克标志成为少数几个可以被全世界人毫不费力认出的商标之一。创业过程中，合作伙伴的背叛、开户银行的翻脸、竞争对手的构陷、国家权力的紧逼、狡猾的融资技巧、粗犷放纵的企业文化、近乎不要命的扩张策略……菲尔&middot;奈特用朴实、幽默的语言，真实袒露了一群“鞋狗”创业路上的挚爱、执着与疯狂。 </p>
                </div></a></li>
        <li class="wr_bookListItem"><a href="javascript:" ontouchstart="" data-id="847748" class="wr_bookListItem_wrap js_book_scheme_link">
                <div class="wr_bookCover wr_bookCover_Tiny js_book_cover" data-src="http://wfqqreader.3g.qq.com/cover/748/847748/s_847748.jpg" data-alt="傅雷家书（经典译林）" data-loaded="true">
                    <img src="http://wfqqreader.3g.qq.com/cover/748/847748/t4_847748.jpg" class="wr_bookCover_img" alt="傅雷家书（经典译林）" />
                </div>
                <div class="wr_bookListItem_wrap_info iscroll_click">
                    <div class="wr_bookListItem_wrap_info_title iscroll_click">
                        傅雷家书（经典译林）
                    </div>
                    <div class="wr_bookListItem_wrap_info_author iscroll_click">
                        傅雷 朱梅馥 傅聪著 傅敏编
                    </div>
                    <p class="wr_bookListItem_wrap_info_desc iscroll_click"> “经典译林”版《傅雷家书》以傅雷长子傅聪的留学打拼经历、情感婚姻之路为主线，精心选编傅雷夫妇与傅聪及弥拉的往来家信，内容偏重“人伦日用”，突出傅雷“真诚待人，认真做事”的“做人”准则，少了文化艺术的长篇论述，多了日常生活的短小故事。这份两代人双向交流的文字实录，严肃不失亲切，深刻不离日常，以小见大，乐在其中。它不仅反映了亲子交流的重要，也利于青年学子在阅读中理解父辈、增进沟通。《傅雷家书》中珍贵照片、楼适夷初版代序、傅聪家信及英法文信为独家版权，2017年不随傅雷著作权进入公版，其他任何家书选本不能收录。 </p>
                </div></a></li>

    </ul>
</div>
</body>
</html>