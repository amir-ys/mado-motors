<?php

namespace Database\Seeders;

use App\Models\Agent;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\City;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetail;
use App\Models\ProductReview;
use App\Models\ProductReviewPoint;
use App\Models\ProductVariant;
use App\Models\ReviewPoint;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        ProductCategory::factory(5)->create();
        Product::factory(20)->create();
        City::factory(10)->create();
        UserAddress::factory(10)->create();
        Agent::factory(5)->create();
        Order::factory(15)->create();
        OrderItem::factory(15)->create();
        Cart::factory(10)->create();
        CartItem::factory(30)->create();
        Payment::factory(10)->create();
        ReviewPoint::factory(10)->create();
        ProductReview::factory(10)->create();
        Comment::factory(20)->create();
        ProductDetail::factory(10)->create();
        Setting::factory(5)->create();
        Attribute::factory(5)->create();
        AttributeValue::factory(5)->create();
        ProductVariant::factory(20)->create();

        $this->insertSetting();
    }

    private function insertSetting(): void
    {
        DB::table('settings')->insert([
            ['key' => 'contact_us_phone', 'value' => '+1234567890', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_us_email', 'value' => 'info@example.com', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_us_instagram_link', 'value' => 'https://instagram.com/example', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_us_linkedin_link', 'value' => 'https://linkedin.com/in/example', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_us_head_office_address', 'value' => '123 Example Street, City, Country', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_us_postal_code', 'value' => '123456', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_us_latitude', 'value' => '37.7749', 'created_at' => now(), 'updated_at' => now()],
            ['key' => 'contact_us_longitude', 'value' => '-122.4194', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
