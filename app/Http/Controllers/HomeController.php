<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Cart;
use App\models\Order;
use App\models\Comment;
use App\models\Reply;
use Stripe;
use App\Models\Post;




class HomeController extends Controller
{
    public function redirect()
    {

        $usertype = Auth::user()->usertype; 

        if ($usertype == '1'|| $usertype == '2') {

            $total_products=Product::all()->count();
            $total_orders=Order::all()->count();
            $total_Customers=User::all()->count();
            $order=Order::all();
            $total_revenue = 0;
            foreach($order as $order){
                $total_revenue += $order->price;
            }
            $total_deliverd = order::where("delivery_status", "=", "Deliverd")->get()->count();
            $total_processing = order::where("delivery_status", "=", "Proccessing")->get()->count();

            return view('admin.home', compact("total_products",
            "total_orders", "total_Customers", "total_revenue", "total_deliverd", "total_processing"));

        } else {

            $product = Product::paginate();

            $comment = Comment::orderby('created_at', 'desc')->get();

            $reply = Reply::all();

            $user = Auth::user();

            if(auth::check()){
                $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');

            } else {
                $cart_items = 0;
            }


    
            return view('home.userpage', compact('product', 'comment', 'reply', 'cart_items'));
        }
    }


    public function index()
    {
        $product = Product::paginate(6);

        $comment = Comment::orderby('created_at', 'desc')->get();

        $reply = Reply::all();

        $user = Auth::user();
        
        if(auth::check()){
                $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');

            } else {
                $cart_items = 0;
            }

    

        return view('home.userpage', compact('product', 'comment', 'reply', 'cart_items'));

    }

    public function product_details($id)
    {
        $product = Product::find($id);

        $user = Auth::user();

        $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');
        
        return view('home.product_details', compact('product', 'cart_items'));
    }

    public function add_cart(Request $request,$id)
    {
        if (Auth::check()) {
            
            $user = Auth::user();

            $product = Product::find($id);

            $product_exist_id = Cart::where('product_id', '=', $id)
            ->where('user_id', '=', $user->id)->get('id')->first();

            if ($product_exist_id != null) {

                $cart = Cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;    
                $cart->quantity = $quantity + $request->quantity;
                $cart->save();
                return redirect()->back()->with('message', 'Product Added Successfully');

            } else {
                $cart = new Cart;

                $cart->name = $user->name;
                $cart->email = $user->email;
                $cart->phone = $user->phone;
                $cart->address = $user->address;
                $cart->user_id = $user->id;
    
                $cart->product_title = $product->title;
                    
                if($product->discount_price != null)
                {
                    $cart->price = $product->discount_price *  $request->quantity;
                
                }else{
    
                    $cart->price = $product->price *  $request->quantity;
                }
                
                $cart->image = $product->image;
                $cart->product_id = $product->id;
    
                $cart->quantity = $request->quantity;
    
                $cart->save();

                Alert::success('Product Added Successfully', 'We Have Added Your Product To The Cart');
    
                return redirect()->back()->with('message', 'Product Added Successfully');
    
            }

            
        } else {
            return redirect('login');
        }
    }



    public function show_cart()
    {
        if (Auth::id()) {

        $id = Auth::user()->id;

        $cart = Cart::where('user_id', '=', $id)->get();

        $cart_items = $cart->sum('quantity');

        return view('home.show_cart', compact('cart', 'cart_items'));

        } else {
            
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $product = Cart::find($id);
        $product->delete();
        return redirect()->back();
    }
    
    public function cash_order()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $data = Cart::where("user_id", "=", $user_id)->get();

        foreach($data as $data)
        {
            //make New Order

            $order = new Order;

            //user data

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            //product data

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            //payment data

            $order->payment_status = 'Cash On Delivry';
            $order->delivery_status = 'Proccessing';

            $order->save();

            //delete cart after order

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }

        return redirect()->back()->with('message', 'We have received your order. We will Contact with you soon');
        
    }


    //stripe payment

    public function stripe($total_price)
    {
        $cart_items = Cart::where('user_id', '=', Auth::user()->id)->sum('quantity');
        return view("home.stripe", compact("total_price", 'cart_items'));
    }
    
    public function stripePost(Request $request, $total_price)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    

        Stripe\Charge::create ([

                "amount" => $total_price * 100, // 100 = 1$ becouse  stripe use cents

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Thanks For Payments" 

        ]);

        $user = Auth::user();
        $user_id = $user->id;
        $data = Cart::where("user_id", "=", $user_id)->get();

        foreach($data as $data)
        {
            //make New Order

            $order = new Order;

            //user data

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;

            //product data

            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            //payment data

            $order->payment_status = 'Paid';
            $order->delivery_status = 'Proccessing';

            $order->save();

            //delete cart after order

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }


        session()->flash('success', 'Payment successful!');


        return back();

    }

    public function show_order()
    {
        if (Auth::check())
        {
            $user = Auth::user();
            $user_id = $user->id;
            $order = Order::where('user_id', '=', $user_id)->get();


            $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');

            return view('home.order', compact('order', 'cart_items'));

        } else {
            return redirect('login');
        }
    }

    public function cansel_order($id)
    {
        $order = Order::find($id);

        $order->delivery_status = "You canseled the order";

        $order->save();

        return redirect()->back();
    }

    public function add_comment(Request $request)
    {
        if (Auth::id()) {

            if($request->comment != null){

            $user = Auth::user();
            $comment = new Comment;
            $comment->name = $user->name;
            $comment->comment = $request->comment;
            $comment->user_id = $user->id;

            $comment->save();

            return redirect()->back();
            } else {
                return redirect()->back();
            }

        } else {

            return redirect('login');
        }
    }

    public function add_reply(Request $request)
    {
        if (Auth::id()) {

            $user = Auth::user();
            $reply = new Reply;
            $reply->name = $user->name;
            $reply->user_id = $user->id;
            $reply->reply = $request->reply;
            $reply->comment_id = $request->commentId;

            $reply->save();

            return redirect()->back();

        } else {

            return redirect('login');
        }
    }

    public function delete_comment($id)

    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->back();
    } 
    
    public function delete_reply($id)

    {
        $reply = Reply::find($id);
        $reply->delete();
        return redirect()->back();
    }

    public function product_search(Request $request)
    {
        $searchdata = $request->search;

        $product = Product::where('title', 'LIKE', "%$searchdata%")
        ->orwhere('category', 'LIKE', "%$searchdata%")->paginate((10));

        $comment = Comment::orderby('created_at', 'desc')->get();

        $reply = Reply::all();

        $user = Auth::user();

        $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');

        return view("home.userpage", compact('product', 'comment', 'reply', 'cart_items'));
    }

    public function products(Request $request)
    {
        
        $product = Product::paginate();
        $comment = Comment::orderby('created_at', 'desc')->get();
        $reply = Reply::all();
        
        $user = Auth::user();

        $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');

        return view('home.all_products', ['scroll' => 'top'])
        ->with(compact('product', 'comment', 'reply', 'cart_items'));

    }

    public function search_product(Request $request)
    {
        $searchdata = $request->search;

        $product = Product::where('title', 'LIKE', "%$searchdata%")
        ->orwhere('category', 'LIKE', "%$searchdata%")->paginate((10));

        $comment = Comment::orderby('created_at', 'desc')->get();

        $reply = Reply::all();

        $user = Auth::user();

        $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');

        return view('home.all_products', compact('product', 'comment', 'reply', 'cart_items'));
    }

    public function blog()
    {
        $user = Auth::user();

        $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');

        $posts = Post::all();

        return view('home.blog', compact('cart_items', 'posts'));
    }

    public function contact()
    {
        $user = Auth::user();

        $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');

        return view('home.contact',  compact('cart_items'));;
    }

    public function single_post($id)
    {

        $user = Auth::user();

        $cart_items = Cart::where('user_id', '=', $user->id)->sum('quantity');

        $post = Post::find($id);

        $auther = User::where('id', '=', $post->user_id)->get('name');

        return view('home.single_post', compact('post', 'cart_items', 'auther'));
    }
}