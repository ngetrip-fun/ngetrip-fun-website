<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\FrontService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    public function index()
    {
        $testimonials = [
            [
                'name' => 'Budi Santoso',
                'trip' => 'Bromo Adventure',
                'review' => 'Pengalaman luar biasa! Sunrise di Bromo tidak terlupakan, sangat direkomendasikan.',
                'stars' => 5,
                'image' => 'photo-1.png',
            ],
            [
                'name' => 'Siti Aisyah',
                'trip' => 'Labuan Bajo',
                'review' => 'Pemandangan Pulau Komodo benar-benar menakjubkan, pengalaman yang tidak bisa dilupakan.',
                'stars' => 5,
                'image' => 'photo-2.png',
            ],
            [
                'name' => 'Andi Wijaya',
                'trip' => 'Jogja Heritage Tour',
                'review' => 'Berkunjung ke Candi Borobudur dan Prambanan sangat menyenangkan, pengaturannya sangat baik!',
                'stars' => 5,
                'image' => 'photo-3.png',
            ],
            [
                'name' => 'Rina Kusuma',
                'trip' => 'Bali Getaway',
                'review' => 'Pantai di Bali benar-benar indah, akomodasi yang disediakan juga nyaman.',
                'stars' => 5,
                'image' => 'photo-4.png',
            ],
            [
                'name' => 'Ahmad Fauzi',
                'trip' => 'Lombok Paradise',
                'review' => 'Gili Trawangan sangat menakjubkan! Air lautnya jernih sekali.',
                'stars' => 5,
                'image' => 'photo-5.png',
            ],
            [
                'name' => 'Dewi Larasati',
                'trip' => 'Bandung Culinary Tour',
                'review' => 'Makanannya luar biasa lezat, terutama makanan khas Sunda yang segar dan enak!',
                'stars' => 5,
                'image' => 'photo-1.png',
            ],
            [
                'name' => 'Rizky Aditya',
                'trip' => 'Karimunjawa Escape',
                'review' => 'Pulau yang sangat tenang dengan pantai yang bersih dan pasir putih, luar biasa!',
                'stars' => 5,
                'image' => 'photo-2.png',
            ],
            [
                'name' => 'Maya Sari',
                'trip' => 'Tana Toraja Expedition',
                'review' => 'Budaya dan tradisi Tana Toraja sangat unik, pemandu wisatanya sangat informatif!',
                'stars' => 5,
                'image' => 'photo-3.png',
            ],
            [
                'name' => 'Wawan Saputra',
                'trip' => 'Medan Culinary Trip',
                'review' => 'Kuliner Medan seperti durian dan mie sop sungguh memanjakan lidah!',
                'stars' => 5,
                'image' => 'photo-4.png',
            ],
            [
                'name' => 'Laila Anindya',
                'trip' => 'Raja Ampat Discovery',
                'review' => 'Keindahan bawah laut Raja Ampat benar-benar surga bagi para penyelam!',
                'stars' => 5,
                'image' => 'photo-5.png',
            ],
            [
                'name' => 'Fahmi Hidayat',
                'trip' => 'Semarang Heritage Walk',
                'review' => 'Kota Lama Semarang memberikan suasana yang unik dan bersejarah!',
                'stars' => 5,
                'image' => 'photo-1.png',
            ],
            [
                'name' => 'Aulia Putri',
                'trip' => 'Malang Flower City',
                'review' => 'Kota Malang yang penuh bunga memberikan suasana yang menenangkan!',
                'stars' => 5,
                'image' => 'photo-2.png',
            ],
        ];

        $data = $this->frontService->getFrontPageData();
        $data['testimonials'] = $testimonials;
        return view('front.index', $data);
    }

    public function details(Product $product)
    {
        $tax = 0.12;
        $price = $product->price_per_person;
        $totalTaxAmount = $price * $tax;
        $totalAmount = $price + $totalTaxAmount;
        return view('front.details', compact('product', 'totalAmount', 'totalTaxAmount'));
    }
}
