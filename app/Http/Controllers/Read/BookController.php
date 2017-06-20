<?php

namespace App\Http\Controllers\Read;

use App\Http\Models\BookHis;
use App\Http\Models\UserSubscribe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Utils\WereadSDK;
use App\Http\Models\Books;
use App\Http\Utils\JsonFactory;
use Illuminate\Support\Facades\Response;

class BookController extends Controller
{
    /**
     * 返回图书详情
     * @param Request $request
     */
    public function detail(Request $request){
        $json_factory = JsonFactory::getInstance();
        //先从数据库获取数据 如果有则直接返回 如果没有则存入数据库,再返回
        $book_id = $request->bookid;
        $book_ins = new Books;
        $book_info = $book_ins->getBook(['bookid'=>$book_id]);
        $sub_ins = new UserSubscribe;
        $sub_info = $sub_ins->getSubscribe(['uid'=>session('uid'), 'bookid'=>$book_id]);
        if(empty($sub_info)){
            $sub_info->is_subscribe = UserSubscribe::NOT_SUBSCRIBE;
        }else{
            $sub_info->is_subscribe = UserSubscribe::IS_SUBSCRIBE;
        }

        if(empty($book_info)){
            $book_from_weread = WereadSDK::getBookDetail($book_id);
            $book_info = [
                'bookid' => $book_from_weread['bookid'],
                'title' => $book_from_weread['title'],
                'author' => $book_from_weread['author'],
                'price' => $book_from_weread['price'],
                'status' => $book_from_weread['bookStatus'],
                'original_price' => $book_from_weread['originalPrice'],
                'isbn' => $book_from_weread['isbn'],
                'publisher' => $book_from_weread['publisher'],
                'publish_time' => $book_from_weread['publishTime'],
                'category' => $book_from_weread['category'],
                'source' => $book_from_weread['source'],
                'cover' => $book_from_weread['cover'],
                'intro' => $book_from_weread['intro'],
                'total_words' => $book_from_weread['totalWords'],
                'publish_price' => $book_from_weread['publishPrice'],
                'data' => json_encode($book_from_weread)
            ];
            $book_ins->insertBook($book_info);
            $book_info['is_subscribe'] = UserSubscribe::NOT_SUBSCRIBE;
        }
        //查找书籍的历史价格情况
        $book_his = $book_ins->getBookHis(['bookid'=>$book_id]);
        $book_his_ins = new BookHis;
        $book_his_ins->getBookHis(['bookid'=>$book_id]);
        $book_info['book_his'] = $book_his;
        $json_factory->set_data($book_info);
        return response()->json($json_factory->all_body());
    }

    /**
     * 订阅图书的降价通知
     * @param Request $request
     */
    public function subscribe(Request $request){
        $json_factory = JsonFactory::getInstance();
        $sub_ins = new UserSubscribe;
        $data = [
            'uid' => session('uid'),
            'bookid' => $request->bookid
        ];
        $sub_ins->insertSubscribe($data);
        return response()->json($json_factory->all_body());
    }
}
