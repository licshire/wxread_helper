<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //微信读书的书籍model层
    protected $connection = 'mysql';
    protected $table='books';
    protected $primaryKey='id';

    const UPDATED_AT = 'update_time';
    const CREATED_AT = 'create_time';

    protected $guarded = ['id'];


    /**
     * 插入risk接口请求流水
     * @param $data
     */
    public function insertBook($data){
        $ins = Books::create($data);
        if($ins === false){
            //todo 统一处理exception行为
            throw new \Exception("add model failed");
        }
        return $ins;
    }

    /**
     * 更新risk接口请求流水
     * @param $data
     */
    public function updateBook($condition, $data){
        $ins = Books::where($condition)->update($data);
        if(!$ins){
            throw new \Exception("update model failed");
        }
    }

    /**
     * 查找risk表的单一记录详细信息
     * @param $condition
     */
    public function getBook($condition, $column=['*']){
        return Books::where($condition)->first($column);
    }


    public function bookHis(){
        return $this->hasMany('App\Http\Models\BookHis', 'bookid', 'bookid');
    }

    public function getBookHis($condition){
        return Books::where($condition)->bookHis;
    }
}
