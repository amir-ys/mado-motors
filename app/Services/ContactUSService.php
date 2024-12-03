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
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_PHONE->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_PHONE)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_EMAIL->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_EMAIL)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_INSTAGRAM_LINK->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_INSTAGRAM_LINK)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_LINKEDIN_LINK->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_LINKEDIN_LINK)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_TELEGRAM_LINK->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_TELEGRAM_LINK)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_WHATSAPP_LINK->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_WHATSAPP_LINK)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_EITAA_LINK->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_EITAA_LINK)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_HEAD_OFFICE_ADDRESS->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_HEAD_OFFICE_ADDRESS)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_FACTORY_ADDRESS->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_FACTORY_ADDRESS)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_POSTAL_CODE->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_POSTAL_CODE)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_LATITUDE->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_LATITUDE)?->value,
            str_replace('contact_us_','',SettingKeyEnum::CONTACT_US_LONGITUDE->value) => SettingFacade::get(SettingKeyEnum::CONTACT_US_LONGITUDE)?->value,
        ];
    }
}
