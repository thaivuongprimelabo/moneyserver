<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;

class J001_Twilio implements ShouldQueue {

    use Dispatchable,
        InteractsWithQueue,
        Queueable,
        SerializesModels;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request) {
        $this->request = $request;
    }

    /**
     * @Description: 音声発信リクエストに通知先IDを渡し、実行する。
     * @Job: J001_Twilio
     * @Params: Request
     * @return void
     * @File: A101 - 6.
     */
    public function handle() {

        #File: J001_Twilio (2.)
        if ($this->request['id']) {

            $id = $this->request['id'];
            $phone = DB::table('phone_destinations')
                    ->where(['phone_destinations.id' => $this->request['id']])
                    ->join('calls', 'phone_destinations.call_id', '=', 'calls.id')
                    ->select('phone_destinations.id', 'phone_number', 'call_number')
                    ->first();

            if (!empty($phone)) {
                $twilio = new \App\Helpers\Twilio();
                $respond = $twilio->makingCall($phone);

                if(isset($respond['sid'])) {
                    $status = config('master.TWILIO_STATUS.TWILIO_CREATED');
                    DB::table('phone_destinations')
                        ->where(['id' => $id])
                        ->update(['status' => $status, 'twilio_call_sid' => $respond['sid']]);
                }
                elseif(isset($respond['code'])) {
                    DB::table('phone_destinations')
                        ->where(['id' => $id])
                        ->update(['status' => config('master.TWILIO_STATUS.FAILED')]);
                }
                else {
                    DB::table('phone_destinations')
                        ->where(['id' => $id])
                        ->update(['status' => config('master.TWILIO_STATUS.TWILIO_FAILED')]);
                }
            } else {
                echo '-Not Found-';
            }
        }
    }

}
