<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotels = [
            [
                'name' => 'Hôtel Terrou-Bi',
                'email' => 'info@terroubi.com',
                'price_per_night' => 25000,
                'address' => 'Boulevard Martin Luther King, Dakar',
                'phone' => '+221 33 821 21 21',
                'currency' => 'F XOF',
                'image_url' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&h=600&fit=crop'
            ],
            [
                'name' => 'King Fahd Palace',
                'email' => 'reservations@kingfahdpalace.sn',
                'price_per_night' => 30000,
                'address' => 'Route des Almadies, Dakar',
                'phone' => '+221 33 869 00 00',
                'currency' => 'F XOF',
                'image_url' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800&h=600&fit=crop'
            ],
            [
                'name' => 'Radisson Blu Hotel',
                'email' => 'info.dakar@radissonblu.com',
                'price_per_night' => 35000,
                'address' => 'Route de la Corniche Ouest, Dakar',
                'phone' => '+221 33 869 33 33',
                'currency' => 'F XOF',
                'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&h=600&fit=crop'
            ],
            [
                'name' => 'Pullman Dakar Teranga',
                'email' => 'reservations@pullman-dakar.com',
                'price_per_night' => 30000,
                'address' => 'Place de l\'Indépendance, 10 Rue PL 29, Dakar',
                'phone' => '+221 33 889 00 00',
                'currency' => 'F XOF',
                'image_url' => 'https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=800&h=600&fit=crop'
            ],
            [
                'name' => 'Hotel Savana',
                'email' => 'info@savana.sn',
                'price_per_night' => 20000,
                'address' => 'Avenue Léopold Sédar Senghor, Dakar',
                'phone' => '+221 33 821 30 30',
                'currency' => 'F XOF',
                'image_url' => 'https://images.unsplash.com/photo-1551882547-ff40c63fe5fa?w=800&h=600&fit=crop'
            ],
            [
                'name' => 'Hotel du Phare',
                'email' => 'contact@hotelduphare.sn',
                'price_per_night' => 28000,
                'address' => 'Corniche Ouest, Dakar',
                'phone' => '+221 33 821 40 40',
                'currency' => 'F XOF',
                'image_url' => 'https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=800&h=600&fit=crop'
            ],
            [
                'name' => 'Hotel Al Afifa',
                'email' => 'info@alafifa.sn',
                'price_per_night' => 22000,
                'address' => 'Avenue Cheikh Anta Diop, Dakar',
                'phone' => '+221 33 825 50 50',
                'currency' => 'F XOF',
                'image_url' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=800&h=600&fit=crop'
            ],
            [
                'name' => 'Hotel Ngor Diarama',
                'email' => 'reservations@ngordiarama.sn',
                'price_per_night' => 26000,
                'address' => 'Ngor, Dakar',
                'phone' => '+221 33 820 60 60',
                'currency' => 'F XOF',
                'image_url' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=800&h=600&fit=crop'
            ]
        ];

        foreach ($hotels as $hotel) {
            Hotel::create($hotel);
        }
    }
}
