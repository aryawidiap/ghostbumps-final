<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);

        $user->bookings()->create(
            [
                'location_id' => 1,
                'booking_date' => '2025-10-03',
                'booking_hour' => 13,
                'number_of_persons' => 3,
                'status' => 'confirmed',
                'ticket_price' => '150000'
            ]
        );
        $user->bookings()->create(
            [
                'location_id' => 2,
                'booking_date' => '2025-10-05',
                'booking_hour' => 16,
                'number_of_persons' => 5,
                'status' => 'refunded',
                'ticket_price' => '250000'
            ]
        );
        $user->bookings()->create(
            [
                'location_id' => 3,
                'booking_date' => '2025-08-20',
                'booking_hour' => 20,
                'number_of_persons' => 2,
                'status' => 'cancelled',
                'ticket_price' => '100000'
            ]
        );
        $user->bookings()->create(
            [
                'location_id' => 3,
                'booking_date' => '2025-06-01',
                'booking_hour' => 20,
                'number_of_persons' => 2,
                'status' => 'completed',
                'ticket_price' => '100000'
            ]
        );
    }
}
