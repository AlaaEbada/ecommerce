<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\models\Order;

use App\Models\Post;

use App\Models\User;

use App\Models\PostCategory;

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

    //Add Post Function 

    public function add_post_page()
    {
        $category = PostCategory::all();
        return view('admin.add_post', compact('category'));
    }
    public function post_category()
    {
        if(Auth::check()) {
            $data = PostCategory::all();
            return view('admin.post_category', compact('data'));
            } else {
                return redirect('login');
            }
    }

    public function add_post_category(Request $request)
    {
        $data = new PostCategory;

        $data->category_name = $request->category;

        $data->save();

        return redirect()->back();
    }

    public function add_new_post(Request $request)
{
    

    $post = new Post;

    // Set the post properties
    $post->title = $request->title;
    $post->content = $request->content;
    $post->slug = $request->slug;
    $post->user_id = auth::user()->id; // Assuming you are using auth
    $post->category = $request->category; // Store the category ID

    // Handle the file upload if there is a featured image
    if ($request->hasFile('featured_image')) {
        $imagename = time() . '.' . $request->featured_image->getClientOriginalExtension();
        $request->featured_image->move('post', $imagename);
        $post->featured_image = $imagename; // Save the file name to the database
    }

    // Save the post to the database
    $post->save();

    return redirect()->back()->with('message', 'Post created successfully!');
}


public function show_posts()
{
    $posts = Post::all(); // جلب كل البوستات من قاعدة البيانات
    return view('admin.show_posts', compact('posts'));
}

public function destroy($id)
{
    $post = Post::find($id);

    if ($post) {
        $post->delete();
        return redirect()->route('posts.index')->with('message', 'Post deleted successfully.');
    } else {
        return redirect()->route('posts.index')->with('error', 'Post not found.');
    }
}

public function edit_post($id)
{
    $post = Post::find($id);

    $category = PostCategory::all();

    return view('admin.edit_post', compact('post', 'category'));
}

public function update_post(Request $request, $id)
    
{
    if(Auth::check()) {

        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->slug = $request->slug;
        $post->category = $request->category; // Store the ca

        $featured_image = $request->featured_image;

        if ($featured_image) {

            $imagename = time() . '.' . $featured_image->getClientOriginalExtension();

            $request->featured_image->move('post', $imagename);

            $post->featured_image = $imagename;
        }

        $post->save();

        return redirect()->back()->with('message', 'Post Updated Successfully');
        
        } else {

            return redirect('login');
        }
}

public function view_users()
{
    $users = User::all();
    return view('admin.view_users', compact('users'));
}

public function add_user()
{
    $user = User::all();
    return view('admin.add_user', compact('user'));
}

public function store_user(Request $request)
{
    if(Auth::check())
    {
        $user = new User;
        $user->name = $request->name;
        
        $exist_email = User::where('email', '=',  $request->email)->exists();
        
        if(!$exist_email){
            $user->email = $request->email;
        } else 
        {
            return redirect()->back()->with('message', 'Email already exists');
        }
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->address = $request->address;
        if($request->role == "admin")
        {
            $user->usertype = 1;

        }elseif($request->role == "editor")
        {
            $user->usertype = 2;

        }
        $user->save();

        return redirect()->back()->with('message', 'User added Successfully');

    }
}

public function edit_user($id)
{
    $user = User::find($id);

    return view('admin.edit_user', compact('user'));
}

public function update_user(Request $request ,$id)
{
    if(Auth::check()) {

        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = $request->password;
        $user->address = $request->address;

        if($request->role == "admin")
        {
            $user->usertype = 1;

        }
        $user->save();

        return redirect()->back()->with('message', 'Post Updated Successfully');
        
        } else {

            return redirect('login');
        }
}

public function delete_user($id)
{

    $admin = User::where('usertype', '=', 1 );

    if($admin){

    $user = User::find($id);

    $user->delete();

    return redirect()->back()->with('message', 'User Deleted Successfully');

    } else {
        
        return redirect()->back()->with('message', 'You Cant Delete This User');;
    }

}

}
