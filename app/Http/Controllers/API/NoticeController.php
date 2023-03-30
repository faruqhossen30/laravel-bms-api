<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function headerNotice()
    {
        $data = option('header_notice');
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $data
        ]);
    }
    public function footerNotice()
    {
        $data = option('footer_notice');
        return response()->json([
            'success' => true,
            'code' => 200,
            'data' => $data
        ]);
    }
}
