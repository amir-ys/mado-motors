<?php

namespace App\Services;

use App\Contracts\Services\ContactUSServiceInterface;
use App\Enums\SettingKeyEnum;
use App\Facades\SettingFacade;

class ContactUSService implements ContactUSServiceInterface
{

    public function getContactUs(): array
    {
        return [
            'phone' => SettingFacade::get(SettingKeyEnum::CONTACT_US_PHONE)?->value,
            'email' => SettingFacade::get(SettingKeyEnum::CONTACT_US_EMAIL)?->value,
            'instagram_link' => SettingFacade::get(SettingKeyEnum::CONTACT_US_INSTAGRAM_LINK)?->value,
            'linkedin_link' => SettingFacade::get(SettingKeyEnum::CONTACT_US_LINKEDIN_LINK)?->value,
            'head_office_address' => SettingFacade::get(SettingKeyEnum::CONTACT_US_HEAD_OFFICE_ADDRESS)?->value,
            'postal_code' => SettingFacade::get(SettingKeyEnum::CONTACT_US_POSTAL_CODE)?->value,
            'latitude' => SettingFacade::get(SettingKeyEnum::CONTACT_US_LATITUDE)?->value,
            'longitude' => SettingFacade::get(SettingKeyEnum::CONTACT_US_LONGITUDE)?->value,
        ];
    }
}
