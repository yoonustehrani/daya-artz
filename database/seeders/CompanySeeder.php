<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        if ($user) {
            $company = new Company();
            $company->title = 'دیجی کالا';
            $company->title_en = 'Digikala';
            $company->phone_number = '02199887766';
            $company->address = 'تهران - خیابان جمهوری - کوچه ستارخان - پلاک ۷۳';
            $company->website = 'digikala.com';
            $company->market_type = 'modern';
            $company->intro = 'فروش محصولات به صورت اینترنتی';
            $user->company()->save($company);
        }
    }
}
