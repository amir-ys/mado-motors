<?php

namespace App\Services\Notification;

use App\Models\User;

class SendSmsToAdmins
{
    protected array $mobiles;

    public function __construct()
    {
        $this->mobiles = [
            "09101526570",
            "09128529050"
        ];
    }

    public function sendRequestNotification($device_title, $smsUser)
    {
        foreach ($this->mobiles as $mobile) {
            $user = User::query()->where('cell_number', $mobile)->first();
            if (empty($user)) {
                User::query()->create([
                    "name" => "admin",
                    "password" => bcrypt("12345678"),
                    "cell_number" => $mobile,
                ]);
            }
            $userCollection = User::query()->where('cell_number', $mobile);
            SmsNotification::to($userCollection)->isSystematic()->send(
                "کاربر " .
                $smsUser->name .
                " - " .
                $smsUser->cell_number .
                " درخواست خود را مربوط به دستگاه "
                . $device_title .
                " انجام داده است.",
                'service'
            );
        }
    }
}
