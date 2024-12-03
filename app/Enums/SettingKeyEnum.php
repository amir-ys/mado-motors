<?php

namespace App\Enums;

enum SettingKeyEnum: string
{
    case CONTACT_US_PHONE = 'contact_us_phone';
    case CONTACT_US_EMAIL = 'contact_us_email';
    case CONTACT_US_INSTAGRAM_LINK = 'contact_us_instagram_link';
    case CONTACT_US_LINKEDIN_LINK = 'contact_us_linkedin_link';
    case CONTACT_US_HEAD_OFFICE_ADDRESS = 'contact_us_head_office_address';
    case CONTACT_US_POSTAL_CODE = 'contact_us_postal_code';
    case CONTACT_US_LATITUDE = 'contact_us_latitude';
    case CONTACT_US_LONGITUDE = 'contact_us_longitude';
}
