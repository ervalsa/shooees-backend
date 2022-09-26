<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(Request $request) {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $name = $request->input('name');
        $description = $request->input('description');
        $tags = $request->input('tags');
        $categories = $request->input('categories');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');

        if ($id) {
            $product = Product::with(['category', 'galleries'])->find($id);

            if ($product) {
                return ResponseFormatter::success(
                    $product,
                    'Data produk berhasil diambil.'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data produk tidak ada.',
                    404
                );
            }
        }

        $product = Product::with(['category', 'galleries']);

        if ($name) {
            $product->where('name', 'like', '%' . $name . '%');
        }

        if ($description) {
            $product->where('description', 'like', '%' . $name . '%');
        }

        if ($tags) {
            $product->where('tags', 'like', '%' . $name . '%');
        }

        if ($price_from) {
            $product->where('price', '>=', $price_from);
        }

        if ($price_to) {
            $product->where('price', '<=', $price_from);
        }

        if ($categories) {
            $product->where('categories', $price_from);
        }

        return ResponseFormatter::success(
            $product->paginate($limit),
            'Data produk berhasil diambil.'
        );
    }
}
