<?php

namespace App\Helpers;
use Twilio as Twilio_App;
use Twilio\Rest\Client;

class Twilio {

    public static function getStatus($key = null, $lang = 'ja') {
        $arr = [
            'en' => [
                'CALLING' => 'CALLING',
                'WAITING' => 'WAITING',
                'TWILIO_CREATED' => 'TWILIO CREATED',
                'RINGING' => 'RINGING',
                'IN_PROGRESS' => 'IN PROGRESS',
                'FINISHED' => 'FINISHED',
                'TIMEOUT' => 'TIMEOUT',
                'CANCELED' => 'CANCELED',
                'FAILED' => 'FAILED',
                'DENIED' => 'DENIED',
                'SUCCESS' => 'SUCCESS',
                'TWILIO_FAILED' => 'TWILIO FAILED'
            ],
            'ja' => [
                'CALLING' => 'CALLING',
                'WAITING' => 'WAITING',
                'TWILIO_CREATED' => 'TWILIO CREATED',
                'RINGING' => 'RINGING',
                'IN_PROGRESS' => 'IN PROGRESS',
                'FINISHED' => 'FINISHED',
                'TIMEOUT' => 'TIMEOUT',
                'CANCELED' => 'CANCELED',
                'FAILED' => 'FAILED',
                'DENIED' => 'DENIED',
                'SUCCESS' => 'SUCCESS',
                'TWILIO_FAILED' => 'TWILIO FAILED'
            ]
        ];
        if ($key) {
            if(isset($arr[$lang][$key])) {
                return $arr[$lang][$key];
            }
        } else {
            return $arr[$lang];
        }
    }

    public static function getTypes($key = null, $lang = 'ja') {
        $arr = [
            'en' => [
                'SAME_TIME' => 'SAME_TIME',
                'ORDER' => 'ORDER',
            ],
            'ja' => [
                'SAME_TIME' => '同報',
                'ORDER' => '順次',
            ]
        ];
        if ($key) {
            if(isset($arr[$lang][$key])) {
                return $arr[$lang][$key];
            }
        } else {
            return $arr[$lang];
        }
    }

    /*
     * $header:  default | json
     */
    public function curl($method = 'post', $url = "", $params = [], $authen = [], $header = 'default')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);

        // neu ko dung POST, mac dinh method cua curl la GET
        if($method == 'post') {
            if($header == 'default') {
                // ko dung header, mac dinh header la application/x-www-form-urlencoded
                curl_setopt($ch, CURLOPT_POST, true);
                $vars = '';
                foreach($params as $key=>$value) {
                    if(is_array($value)) {
                        foreach($value as $k=>$v) {
                            $vars .= 'StatusCallbackEvent=' . $v . '&';
                        }
                    } else {
                        $vars .= $key . '=' . $value . '&';
                    }
                }
                curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
            }
            elseif($header == 'json') {
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
            }
        }

        if(!empty($authen)) {
            curl_setopt($ch, CURLOPT_USERPWD, $authen['username'] . ":" . $authen['password']);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        }

        $result = curl_exec($ch);
        if (curl_errno($ch) !== 0) {
            \Log::Info('cURL error when connecting to ' . $url . ': ' . curl_error($ch));
        }

        curl_close($ch);
        return $result;
    }

    public function makingCall($phone)
    {
        $accountSid = config('master.TWILIO_ACCOUNT_SID');
        $authToken = config('master.TWILIO_AUTH_TOKEN');
        $authen = ['username' => $accountSid, 'password' => $authToken];
        $url = 'https://api.twilio.com/2010-04-01/Accounts/'. $accountSid . '/Calls.json';

        $params = [
            'To' => $phone->phone_number,
            'From' => $phone->call_number,
            'Url' => 'http://67a88888.ngrok.io/api/twilio/call/' . $phone->id,
            'StatusCallback' => 'http://67a88888.ngrok.io/api/twilio/status-event/' . $phone->id,
            'StatusCallbackEvent' => ['initiated' , 'ringing', 'answered', 'completed'],
//            'Timeout' => 1,
        ];
        
        // Config if server has base auth
        if(config('master.SERVER_BASE_AUTH')) {
            $baseUser = config('master.SERVER_BASE_AUTH_USERNAME');
            $basePass = config('master.SERVER_BASE_AUTH_PASSWORD');
            $params['Url']              = str_replace('://','://'. $baseUser .':' . $basePass . '@', $params['Url']);
            $params['StatusCallback']   = str_replace('://','://'. $baseUser .':' . $basePass . '@', $params['StatusCallback']);
        }

        $result = $this->curl('post', $url, $params, $authen);
        return json_decode($result,1);
    }

    public function stopCall($phone)
    {
        $accountSid = config('master.TWILIO_ACCOUNT_SID');
        $authToken = config('master.TWILIO_AUTH_TOKEN');
        $authen = ['username' => $accountSid, 'password' => $authToken];
        $url = 'https://api.twilio.com/2010-04-01/Accounts/'. $accountSid . '/Calls/'.$phone->twilio_call_sid.'.json';

        $params = [
            'Status' => 'canceled',
            'CallSid' => $phone->twilio_call_sid,
        ];

        $result = $this->curl('post', $url, $params, $authen);
        return json_decode($result,1);
    }
    
    public static function subStringBreakline($string, $start, $count) {
        $string = str_replace("\r", "", $string);
        $string = str_replace("\n", "", $string);
        return mb_substr($string, $start, $count, 'UTF-8');
    }

}
