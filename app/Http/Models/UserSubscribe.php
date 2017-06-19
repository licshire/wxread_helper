<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UserSubscribe extends Model
{
    //微信读书的个人订阅信息
    protected $connection = 'mysql';
    protected $table='user_subscribe';
    protected $primaryKey='id';

    const UPDATED_AT = 'update_time';
    const CREATED_AT = 'create_time';

    protected $guarded = ['id'];

    const IS_SUBSCRIBE = 1;
    const NOT_SUBSCRIBE = 0;


    /**
     * 插入risk接口请求流水
     * @param $data
     */
    public function insertSubscribe($data){
        $ins = UserSubscribe::create($data);
        if(!$ins){
            //todo 统一处理exception行为
            throw new \Exception("add model failed");
        }
        return $ins;
    }

    /**
     * 更新risk接口请求流水
     * @param $data
     */
    public function updateSubscribe($condition, $data){
        $ins = UserSubscribe::where($condition)->update($data);
        if(!$ins){
            throw new \Exception("update model failed");
        }
    }

    /**
     * 查找risk表的单一记录详细信息
     * @param $condition
     */
    public function getSubscribe($condition, $column=['*']){
        return UserSubscribe::where($condition)->first($column);
    }
}
