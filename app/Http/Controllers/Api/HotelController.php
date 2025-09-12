<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Hotel::query();

        // Filtrage par ville
        if ($request->has('city')) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }

        // Filtrage par prix
        if ($request->has('min_price')) {
            $query->where('price_per_night', '>=', $request->min_price);
        }

        if ($request->has('max_price')) {
            $query->where('price_per_night', '<=', $request->max_price);
        }

        // Recherche par nom
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $hotels = $query->where('is_active', true)->paginate(12);

        // Convertir les chemins d'images relatifs en URLs complètes
        $hotels->getCollection()->transform(function ($hotel) {
            if ($hotel->image_url) {
                $hotel->image_url = url("storage/{$hotel->image_url}");
            }
            return $hotel;
        });

        return response()->json($hotels);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'price_per_night' => 'required|numeric|min:0',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'currency' => 'nullable|string|max:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // max 5MB
        ]);
    
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
    
            // Générer un nom unique
            $imageName = Str::uuid() . '.' . $image->getClientOriginalExtension();
    
            // Stocker dans storage/app/public/hotels
            $imagePath = $image->storeAs('hotels', $imageName, 'public');
        }
    
        $hotel = Hotel::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'price_per_night' => $validated['price_per_night'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
            'currency' => $validated['currency'] ?? null,
            'image_url' => $imagePath, // chemin relatif ex: hotels/xxx.jpg
        ]);
    
        // Retourner le chemin complet utilisable dans React
        $hotel->image_url = url("storage/{$hotel->image_url}");
    
        return response()->json($hotel, 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $hotel = Hotel::findOrFail($id);
        return response()->json($hotel);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $hotel = Hotel::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|max:255',
            'price_per_night' => 'sometimes|numeric|min:0',
            'address' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:20',
            'currency' => 'nullable|string|max:10',
            'image_url' => 'nullable|url|max:500',
        ]);

        $hotel->update($validated);

        return response()->json($hotel);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return response()->json(['message' => 'Hôtel supprimé avec succès']);
    }
}
