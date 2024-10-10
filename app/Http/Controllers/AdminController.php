<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\models\Order;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Notification;

use App\Notifications\SendEmailNotification;

use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category()
    {
        if(Auth::check()) {
        $data = Category::all();
        return view('admin.category', compact('data'));
        } else {
            return redirect('login');
        }
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product()
    {
        $category = Category::all();
        return view('admin.product', compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;

        $image = $request->image;

        $imagename = time() . '.' . $image->getClientOriginalExtension();

        $request->image->move('product', $imagename);

        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function add_category(Request $request)
    {
        $data = new Category;

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }


    public function update_product($id)
    {
        $product = Product::find($id);

        $category = Category::all();

        return view('admin.update_product', compact('product', 'category'));
    }


    public function update_product_confirm(Request $request, $id)
    {
        if(Auth::check()) {
            $product = Product::find($id);

            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->discount_price = $request->discount_price;
            $product->category = $request->category;
            $product->quantity = $request->quantity;
    
            $image = $request->image;
    
            if ($image) {
    
                $imagename = time() . '.' . $image->getClientOriginalExtension();
    
                $request->image->move('product', $imagename);
    
                $product->image = $imagename;
            }
    
            $product->save();
    
            return redirect()->back()->with('message', 'Product Updated Successfully');
            
            } else {

                return redirect('login');
            }
        
    }

    public function view_order()
    {
        $order = Order::all();
        return view("admin.order", compact("order"));
    }

    public function delivered($id)
    {
        $order = Order::find($id);

        $order->delivery_status = "Deliverd";

        $order->save();

        return redirect()->back();
    }

    public function print_pdf($id)
    {

        $data = Order::find($id);

        $pdf = Pdf::loadView('admin.pdf', compact('data'));

        // Download the generated PDF
        return $pdf->download('order_details.pdf');
    }


    public function Send_email($id)
    {
        $order = Order::find($id);
        return view('admin.email_info', compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order = Order::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'emailbody' => $request->emailbody,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        // Send notification to the user
        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back();
    }


    public function searchdata(Request $request)
    {
        $searchdata = $request->search;

        $order = order::where('name', 'LIKE', "%$searchdata%")
            ->orwhere('phone', 'LIKE', "%$searchdata%")
            ->orwhere('email', 'LIKE', "%$searchdata%")
            ->orwhere('product_title', 'LIKE', "%$searchdata%")->get();

        return view("admin.order", compact('order'));
    }
}
