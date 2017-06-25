<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Models\WxUser;

class User extends Model
{
    //微信读书的书籍model层
    protected $connection = 'mysql';
    protected $table='user';
    protected $primaryKey='id';

    const UPDATED_AT = 'update_time';
    const CREATED_AT = 'create_time';

    protected $guarded = ['id'];


    public function wxUser()
    {
        return $this->hasOne('App\Http\Models\WxUser', 'openid', 'openid');
    }

    /**
     * 插入risk接口请求流水
     * @param $data
     */
    public function insertUser($data){
        $ins = User::create($data);
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
    public function updateUser($condition, $data){
        $ins = User::where($condition)->update($data);
        if($ins === false){
            throw new \Exception("update model failed");
        }
    }

    /**
     * 查找risk表的单一记录详细信息
     * @param $condition
     */
//    public function getUserByUid($uid, $column=['*'], $detail=false){
//        if($detail){
//            $user_info = User::where([])->first($column);
//        }else{
//            return User::where(['uid'=>$uid])->first($column);
//        }
//
//    }
}
