<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use DB;

class J002_Twilio implements ShouldQueue {

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
     * @Description: 音声停止リクエストに通知先IDを渡し、実行する。
     * @Job: J002_Twilio
     * @Params: Request
     * @return void
     */
    public function handle() {

        if (!empty($this->request['id'])) {

            $phone = DB::table('phone_destinations')
                    ->where(['id' => $this->request['id']])
                    ->select('id', 'twilio_call_sid', 'status')
                    ->first();

            if (!empty($phone) && ($phone->status == 'TWILIO_CREATED' || $phone->status == 'RINGING')) {
                $twilio = new \App\Helpers\Twilio();
                $respond = $twilio->stopCall($phone);

                if (isset($respond['status'])) {
                    if ($respond['status'] == 'completed') {
                        DB::table('phone_destinations')
                                ->where(['id' => $this->request['id']])
                                ->update([
                                    'status' => config('master.TWILIO_STATUS.CANCELED'),
                                    'end_time' => date('Y-m-d H:i:m'),
                                    'call_time' => strtotime($respond['end_time']) - strtotime($respond['start_time']),
                        ]);
                    } elseif ($respond['status'] == 'failed' || $respond['status'] == 'canceled') {
                        \Log::error('Data is not correct');
                    }
                } else {
                    \Log::error('Request to twilio fail');
                }
            }
        }
    }

}
