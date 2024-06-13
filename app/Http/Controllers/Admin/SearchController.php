<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'searchType' => 'required|string',
            'query' => 'required|string',
        ]);
        $searchTerm = $request->input('query');
        $searchType = $request->input('searchType');

        switch ($searchType) {
            case 'Product':
                $products = Product::where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhereHas('brand', function($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('category', function($query) use ($searchTerm) {
                        $query->where('name', 'LIKE', "%{$searchTerm}%");
                    })
                    ->get();
                return view('admin.product', compact('products'));
            case 'User':
                // Assuming you have a view for the user search results
                $users = User::where('first_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('id', 'LIKE', "%{$searchTerm}%")
                    ->get();
                return view('admin.users', compact('users'));
            case 'Course':
                // Assuming you have a view for the course search results
                $courses = Course::where('name', 'LIKE', "%{$searchTerm}%")->get();
                return view('admin.courses', compact('courses'));
            case 'Order':
                // Assuming you have a view for the order search results
                $orders = Order::where('id', 'LIKE', "%{$searchTerm}%")->get();
                return view('admin.order', compact('orders'));
            default:
                return redirect()->back()->withInput()->with('error', 'Invalid search type');
        }
    }
}
