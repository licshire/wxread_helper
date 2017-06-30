<?php
/**
 * Created by PhpStorm.
 * User: no13bus
 * Date: 17/6/30
 * Time: 上午8:18
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SmsController extends Controller{
    /**
     * 下发通用验证码逻辑
     */
    protected function _smscode($mobile,$register) {
        $factory = JsonFactory::getInstance();
        // 不是有效的手机号码
        if (!Check::is_valid_mobile($mobile)) {
            $factory->set_error_code('ERR_LOG_INVALID_PHONE_NUMBER');
            $this->jsonReturn($factory);
        }

        //如果是注册流程判断号码是否已经注册
        if(!empty($register)){
            $user_info = M('User')->where(['mobile'=>$mobile])->field('mobile')->find();
            if (!empty($user_info)) {
                $factory->set_error_code('ERR_LOG_PHONE_NUMBER_EXIST');
                $this->jsonReturn($factory);
            }
        }

        // 生成验证码和校验码
        $vCode = $this->_create_rand_code();
        $cCode = uniqid();

        $rowData = M('Vcode')->where("mobile='%s' and status=0", $mobile)->find();
        if ($rowData) {
            if ($this->_is_expired($rowData['send_time'])) {
                // 更新数据
                M('Vcode')->where('id=%d', $rowData['id'])->save(['vcode' => $vCode, 'send_time' => time(), 'device_id'=>session('device_id'), 'status'=>0, 'ccode'=>$cCode]);
            } else {
                // 操作频率过快
                if ($this->_is_frequent($rowData['send_time'])) {
                    $factory->set_error_code('ERR_LOG_MOBILE_FREQUENT_SEND');
                    $this->jsonReturn($factory);
                } else {
                    // 再次下发验证码
                    $vCode = $rowData['vcode'];
                    $cCode = $rowData['ccode'];

                    // 更新数据
                    M('Vcode')->where('id=%d', $rowData['id'])->save(['send_time' => time(), 'device_id'=>session('device_id'), 'status'=>0]);
                }
            }
        } else {
            // 新增数据
            $data = array();
            $data['mobile'] = $mobile;
            $data['vcode'] = $vCode;
            $data['ccode'] = $cCode;
            $data['send_time'] = time();
            $data['status'] = 0;
            $data['device_id'] = session('device_id');

            M('Vcode')->add($data);
        }

        // 回显数据（手机号和校验码）
        $factory->insert_data('ccode', $cCode);
        $factory->insert_data('mobile', $mobile);

        // 短信下发验证码
        $this->sms_send($mobile,'SMS_8951452',['vcode' => $vCode]);
        $this->jsonReturn($factory);
    }
}