<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
function index(){
echo "Dassshboard";
return view('admin.dashboard');
}
}
