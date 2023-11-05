<?php

namespace App\Http\Controllers;

use App\Models\QueryBuilderBootExample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderBootExampleController extends Controller
{
    public function __invoke()
    {
        QueryBuilderBootExample::create([
            'name' => 'test',
        ]);

        DB::table('query_builder_boot_examples')->insert([
            'name' => 'test',
        ]);
        return response()->json([
            'queryBuilderBootExample' => QueryBuilderBootExample::all(),
        ]);
    }
}
