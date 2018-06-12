<?php

return [
    #GLOBAL
    'API' => false,
    'Home_Title' => 'Zenrin Call System',
    # Target_List = +18316756175
    # 'TWILIO_ACCOUNT_SID' => 'AC999655102e6299c3150c547a29745a19',
    # 'TWILIO_AUTH_TOKEN' => '40e37e2ae4c6f63b08cbe7634ea4668c',

    # Target_List = +15806702718
    'TWILIO_ACCOUNT_SID' => 'AC4a154aa85667495b119f0ce7669dd210',
    'TWILIO_AUTH_TOKEN' => '845772bc2f1d5a906dd22712b46bf5d7',

    'TYPE' => [
        'SAME_TIME' => 'SAME_TIME',
        'ORDER' => 'ORDER'
    ],
    'EMPTY_ITEM' => '指定なし',
    'ROW_PER_PAGE' => 10,
    'CONTENT_LENGTH' => 10,
    /**
     * @Description: SETTINGS
     * @Author:
     * @Date:
     */
    'SETTINGS' => [
        'DEFAULT_RETRY' => 'default_retry',
        'DEFAULT_CALL_TIME' => 'default_call_time',
        'RETRY_MIN' => 0,
        'RETRY_MAX' => 3,
        'CALL_TIME_MIN' => 0,
        'CALL_TIME_MAX' => 120
    ],
    /**
     * @Description: TWILIO STATUS
     * @Author:
     * @Date:
     */
    'TWILIO_STATUS' => [
        'CALLING' => 'CALLING',
        'WAITING' => 'WAITING',
        'TWILIO_CREATED' => 'TWILIO_CREATED',
        'RINGING' => 'RINGING',
        'IN_PROGRESS' => 'IN_PROGRESS',
        'FINISHED' => 'FINISHED',
        'TIMEOUT' => 'TIMEOUT',
        'CANCELED' => 'CANCELED',
        'FAILED' => 'FAILED',
        'DENIED' => 'DENIED',
        'SUCCESS' => 'SUCCESS',
        'TWILIO_FAILED' => 'TWILIO_FAILED'
    ],
    /**
     * @Description: MESSAGE NOTIFICATION
     * @Author:
     * @Date:
     */
    'MESSAGE_NOTIFICATION' => [
        'MSG_001' => 'この項目は必須入力です。', // The input field is require
        'MSG_002' => '電話番号は必須です。', // Telephone number is require
        'MSG_003' => '説明は必須です。', // Desciption field is require
        'MSG_004' => '255文字以下', // 255 characters or less
        'MSG_005' => '数字とハイフンのみ', // Only numbers and hyphens
        'MSG_006' => 'ユーザー名は必須です。', // User name is required.
        'MSG_007' => 'ログインIDは必須です。', // Login ID is required.
        'MSG_008' => 'パスワードは8文字以上の英数字で入力してください。', // Please enter a password with at least 8 alphanumeric characters.
        'MSG_009' => '英数字	', // Alphameric characters
        'MSG_010' => 'ログインIDがすでに存在します。', // Login Id already exist
        'MSG_011' => 'エラーが発生しました。', // An error occurred.
        'MSG_012' => 'ユーザーを削除します。', // Delete the user.
        'MSG_013' => '電話番号は必須です。', // Telephone number is require
        'MSG_014' => '説明は必須です。', // Description is require
        'MSG_015' => '電話番号がすでに存在します。', // The phone number is already exist
        'MSG_016' => '{電話番号, 説明}が正しく反映されました', // {Phone number, explanation} correctly reflected
        'MSG_017' => '発信元番号を削除します。',        // Delete the source number.
        'MSG_018' => 'パスワード が正しく反映されました',  // Password was reflected correctly
        'MSG_019' => 'ユーザー情報 が正しく反映されました',  // User information was reflected correctly
        'MSG_020' => ' を作成しました。',                   // is created.
        'MSG_021' => ' が削除されました。',                   // has been deleted.
        'MSG_022' => ' 15文字以下',                   // 15 characters or less
        'MSG_023' => ' 128文字以下',                   // 128 characters or less
    ],
    /**
     * @Description: MESSAGE API NOTIFICATION
     * @Author: ThanhBinh-PrimeLabo
     * @Date: 02-05-18
     */
    'MESSAGE_API_NOTIFICATION' => [
        'MSG_001' => 'failed_authentication', // failed_authentication (ログインIDまたはパスワードが違います。)
        'MSG_002' => 'invalid_key', // invalid_key
        'MSG_003' => 'no_source_phone_number', // no_source_phone_number
        'MSG_004' => 'invalid_request_parameter', // invalid_request_parameter
        'MSG_005' => 'call_is_already_finished', // call_is_already_finished
        'MSG_006' => 'call_not_found', // call_not_found
        'MSG_007' => 'call_is_in_progress', // call_is_in_progress
    ],
    'TWILIO_SAY'    =>  [
        'BUTTON_PATERN'    =>  '押下された数字は無効です。初めからやり直してください。',
        'REPEAT'           =>  'もう一度再生します。',
        'SETTING'          =>  ['voice' =>  'alice','language'  =>  'ja-JP']
    ],
    'SERVER_BASE_AUTH'             =>  true,
    'SERVER_BASE_AUTH_USERNAME'    =>  'ps',
    'SERVER_BASE_AUTH_PASSWORD'    =>  '66xQbEsh'
];
