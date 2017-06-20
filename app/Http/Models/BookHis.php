<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class BookHis extends Model
{
    //微信读书的书籍历史记录model层
    protected $connection = 'mysql';
    protected $table='books_his';
    protected $primaryKey='id';

    const UPDATED_AT = 'update_time';
    const CREATED_AT = 'create_time';

    protected $guarded = ['id'];
}
