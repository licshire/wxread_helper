<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class WxUser extends Model
{
    //微信读书的书籍model层
    protected $connection = 'mysql';
    protected $table='wechat_user';
    protected $primaryKey='id';

    const UPDATED_AT = 'update_time';
    const CREATED_AT = 'create_time';

    protected $guarded = ['id'];


    /**
     * 插入risk接口请求流水
     * @param $data
     */
    public function insertWxUser($data){
        $ins = WxUser::create($data);
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
    public function updateWxUser($condition, $data){
        $ins = WxUser::where($condition)->update($data);
        if($ins === false){
            throw new \Exception("update model failed");
        }
    }

    /**
     * 查找risk表的单一记录详细信息
     * @param $condition
     */
    public function getWxUser($condition, $column=['*']){
        return WxUser::where($condition)->first($column);
    }
}
