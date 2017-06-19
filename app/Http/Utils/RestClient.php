<?php

namespace App\Http\Utils;


use Illuminate\Support\Facades\Log;

class RestClient
{
    // GET REQUEST
    public static function get(
        $url,
        $parameters = [],
        $headers = [],
        $locate = 'RestClient GET',
        $protocol='HTTP'
    ) {
        return self::execute($url, 'GET', $parameters, $headers, $locate,$protocol);
    }

    // POST REQUEST
    public static function post(
        $url,
        $parameters = [],
        $headers = [],
        $locate = 'RestClient POST',
        $protocol='HTTP'
    ) {
        return self::execute($url, 'POST', $parameters, $headers, $locate,$protocol);
    }

    // PUT REQUEST
    public static function put(
        $url,
        $parameters = [],
        $headers = [],
        $locate = 'RestClient PUT',
        $protocol='HTTP'
    ) {
        return self::execute($url, 'PUT', $parameters, $headers, $locate,$protocol);
    }

    // DELETE REQUEST
    public static function delete(
        $url,
        $parameters = [],
        $headers = [],
        $locate = 'RestClient DELETE',
        $protocol='HTTP'
    ) {
        return self::execute($url, 'DELETE', $parameters, $headers, $locate,$protocol);
    }

    public static function execute(
        $url,
        $method = 'GET',
        $parameters = [],
        $headers = null,
        $locate = 'RestClient execute',
        $protocol='HTTP'
    ) {
        // 初始化一个cURL会话
        $ch = curl_init();

        // 设置cURL的请求地址
        curl_setopt($ch, CURLOPT_URL, $url);

        // 设置cURL的请求方式
        $upper_method = strtoupper($method);
        if ($upper_method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        } elseif ($upper_method != 'GET') {
            curl_setopt($ch, CURLOPT_HTTPGET, true);
        } elseif ($upper_method != 'PUT') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        } elseif ($upper_method != 'DELETE') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        }
        if($protocol=="HTTPS"){
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, TRUE);
        }
        // cURL的请求内容
        $data_json = json_encode($parameters);

        // 设置cURL的请求头字段
        if ($headers === NULL) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json', 'Content-Length: ' . strlen($data_json)]);
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        G('start_time');
        $response = curl_exec($ch);
        G('end_time');

        // 请求耗时
        $time = intval(G('start_time', 'end_time', 6) * 1000);

        // cURL操作的错误码
        $curl_error = curl_errno($ch);
        switch ($curl_error) {
            case 7:  // 无法连接到主机
                Log::error($locate, ['time'=>$time, 'url'=>$url, 'parameters'=>$parameters, 'result'=>$curl_error, 'error_code'=>'CURLE_COULDNT_CONNECT']);
                //CLog::rerror($locate, $time, $url, $parameters, $curl_error, 'CURLE_COULDNT_CONNECT'); // TODO 错误码表
                break;
            case 28: // 访问超时
                Log::error($locate, ['time'=>$time, 'url'=>$url, 'parameters'=>$parameters, 'result'=>$curl_error, 'error_code'=>'CURLE_OPERATION_TIMEDOUT']);
                //CLog::rerror($locate, $time, $url, $parameters, $curl_error, 'CURLE_OPERATION_TIMEDOUT'); // TODO 错误码表
                break;
        }

        // http_code
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code != 200) {
            Log::error($locate, ['time'=>$time, 'url'=>$url, 'parameters'=>$parameters, 'result'=>$http_code, 'error_code'=>'HTTP_REQUEST_FAILED']);
            //CLog::rerror($locate, $time, $url, $parameters, $http_code, 'HTTP_REQUEST_FAILED'); // TODO 状态码表
        }

        curl_close($ch);
        return $response;
    }

    /**
     * 发送post请求
     * @param string $url 请求地址
     * @param array $post_data post键值对数据
     * @return string
     */
    public static function send_post($url, $post_data) {

        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 20 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    public function post_risk($url, $parameters = array(), $headers = array())
    {
        return $this->execute_risk($url, 'POST', $parameters, $headers);
    }

    public function execute_risk($url, $method = 'GET', $parameters = array(), $headers = array())
    {
        $ch = curl_init();
        $data_json = json_encode($parameters);
        curl_setopt($ch, CURLOPT_URL, $url);
        $upper_method = strtoupper($method);
        if ($upper_method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
        } else if ($upper_method != 'GET') {
            curl_setopt($ch, CURLOPT_HTTPGET, true);
        } else if ($upper_method != 'PUT') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        } else if ($upper_method != 'DELETE') {
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        }
        if ($headers === NULL) {
            curl_setopt($ch,
                CURLOPT_HTTPHEADER,
                array('Content-Type: application/json',
                    'Content-Length: ' . strlen($data_json)));
        } else {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        G('newrisk_start_time');
        $content = curl_exec($ch);
        $httpCode = curl_getinfo($ch);
        $curl_errno = curl_errno($ch);

        $time = intval(G('newrisk_start_time','newrisk_end_time', 6) * 1000);
        if($curl_errno) {
            switch ($curl_errno) {
                case 7:
                case 28:
                    G('newrisk_end_time');
                    Log::error('http request is error.', ['time'=>$time, 'url'=>$url, 'parameters'=>$parameters, 'result'=>$curl_errno, 'error_code'=>'ALERT_NEWRISK_000001']);
                    //Log::rerror('NEWRISK', $time, $url, $parameters, $curl_errno, 'ALERT_NEWRISK_000001');
                    break;
                default:
                    break;
            }
        }

        //HTTP错误
        if($httpCode['http_code']) {
            if ($httpCode['http_code'] != 200) {
                G('newrisk_end_time');
                Log::error('http request is error.', ['time'=>$time, 'url'=>$url, 'parameters'=>$parameters, 'result'=>$content, 'error_code'=>'ALERT_NEWRISK_000002']);
                //CLog::rerror('NEWRISK', $time, $url, $parameters, $content, 'ALERT_NEWRISK_000002');
            }
        }
        curl_close($ch);
        return $content;
    }

}