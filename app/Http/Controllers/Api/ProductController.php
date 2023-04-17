<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;

class ProductController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200'
        ]);

        $search = $request->input('name');

        // 🍰 Tip: Use Heredoc/Nowdoc for long strings
        $query = <<<SQL
            SELECT id, name
            FROM products
            WHERE REPLACE(LOWER(name), '-', '') LIKE '%$search%' LIMIT 1
        SQL;

        //die($query);

        return collect(DB::select($query))->first();
    }

    public function index(Request $request)
    {
        $query = Product::query();

        if ($sortBy = $request->input('sort')) {
            $query->orderByRaw($sortBy);
        }

        return $query->paginate(20, ['id', 'name']);
    }
}
