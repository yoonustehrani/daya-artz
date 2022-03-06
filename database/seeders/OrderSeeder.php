<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $services = Service::all();
        $statuses = collect(OrderItem::STATUS);
        if ($user && $services->count()) {
            $items = OrderItem::factory(3)
            ->sequence(fn() => [
                'service_id' => $services->random(),
                'status' => $statuses->random()
            ])->count(3);
            Order::factory()->count(2)->state([
                'user_id' => $user
            ])->has($items, 'items')
                ->hasInvoice(['user_id' => $user->getKey(), 'active' => true])
                ->create();
            Order::factory()->count(2)->state([
                'user_id' => $user
            ])->has($items, 'items')
                ->hasInvoice(['user_id' => $user->getKey(), 'active' => false])
                ->create();
        }
    }
}
