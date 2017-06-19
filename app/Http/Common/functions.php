<?php
/**
 * Created by PhpStorm.
 * User: lio
 * Date: 2017/05/06
 * Time: 下午3:54
 * Tp 里的公共函数.
 */


function time_format($time){
    if(is_numeric($time)){
        return date('Y-m-d H:i:s',$time);
    };
    return date('Y-m-d H:i:s',strtotime($time));
}


/**
 * 获取客户端IP地址
 * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
 * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
 * @return mixed
 */
function get_client_ip($type = 0,$adv=false) {
    $type       =  $type ? 1 : 0;
    static $ip  =   NULL;
    if ($ip !== NULL) return $ip[$type];
    if($adv){
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos    =   array_search('unknown',$arr);
            if(false !== $pos) unset($arr[$pos]);
            $ip     =   trim($arr[0]);
        }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip     =   $_SERVER['HTTP_CLIENT_IP'];
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
    }elseif (isset($_SERVER['REMOTE_ADDR'])) {
        $ip     =   $_SERVER['REMOTE_ADDR'];
    }
    // IP地址合法验证
    $long = sprintf("%u",ip2long($ip));
    $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}


/**
 * 记录和统计时间（微秒）和内存使用情况
 * 使用方法:
 * <code>
 * G('begin'); // 记录开始标记位
 * // ... 区间运行代码
 * G('end'); // 记录结束标签位
 * echo G('begin','end',6); // 统计区间运行时间 精确到小数后6位
 * echo G('begin','end','m'); // 统计区间内存使用情况
 * 如果end标记位没有定义，则会自动以当前作为标记位
 * 其中统计内存使用需要 MEMORY_LIMIT_ON 常量为true才有效
 * </code>
 * @param string $start 开始标签
 * @param string $end 结束标签
 * @param integer|string $dec 小数位或者m
 * @return mixed
 */
function G($start,$end='',$dec=4) {
    static $_info       =   array();
    static $_mem        =   array();
    if(is_float($end)) { // 记录时间
        $_info[$start]  =   $end;
    }elseif(!empty($end)){ // 统计时间和内存使用
        if(!isset($_info[$end])) $_info[$end]       =  microtime(TRUE);
        return number_format(($_info[$end]-$_info[$start]),$dec);
    }else{ // 记录时间和内存使用
        $_info[$start]  =  microtime(TRUE);
    }
    return null;
}


function get_rbac_config(){
    return config('database.connections.mysql');
}

function is_ajax(){
    return ((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) ? true : false;
}

//获取最后的一个查询sql语句
function last_query(){
    return Cache::get('last_query', '空');
}

//将collection内的元素全部转化为array
function objects2array($data){
    $ret = array_map(function($object){
        return (array) $object;
    }, $data);
    return $ret;
}

function idCardInfo($ic_number)
{
    $ic_number = trim($ic_number);
    $birth     = strlen($ic_number) == 15 ? ('19' . substr($ic_number, 6, 6)) : substr($ic_number, 6, 8);
    $sex       = substr($ic_number, (strlen($ic_number) == 15 ? -2 : -1), 1) % 2 ? '1' : '2';

    return [
        'birth' => $birth,
        'sex' => $sex
    ];
}