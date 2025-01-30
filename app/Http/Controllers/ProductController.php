<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Cart; // Assuming you have a Cart model
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('products.index',compact('products'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validatae the input parameters
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $input = $request->all();

        if ($request->hasFile('image')) {
           // Generate a unique name for the image
        $imageName = time() . '.' . $request->image->extension();

        // Move the image to the 'public/images' directory
        $request->image->move(public_path('images'), $imageName);

        // Save the image name or path in the database
        $input['image'] = 'images/' . $imageName; // Use the relative path
        }

        //create a new product
        Product::create($input);

        //redirect the user and send friendly message
        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
         return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
             //validatae the input parameters
             $request->validate([
                'name' => 'required',
                'detail' => 'required',
                'price' => 'required|numeric',
                'quantity' => 'required|numeric',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $input = $request->all();

            if ($request->hasFile('image')) {
            // Generate a unique name for the image
            $imageName = time() . '.' . $request->image->extension();

            // Move the image to the 'public/images' directory
            $request->image->move(public_path('images'), $imageName);

            // Save the image name or path in the database
            $input['image'] = 'images/' . $imageName; // Use the relative path
            } else {

            $input['image'] = 'no-image.jpg';

            }


            //create a new product
            $product->update($input);
            //redirect the user and send friendly message
            return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //delete the product from storage
        $product->delete();
        //redirect and displat successful message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');

    }

  
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id', // Ensure the product exists
            'quantity' => 'required|integer|min:1', // Ensure the quantity is a positive integer
        ]);

        // Fetch the selected product from the database
        $product = Product::findOrFail($request->product_id);
        
        // Assuming the user is logged in and you want to store the cart in a session or database
        $cart = session()->get('cart', []); // Retrieve the current cart from the session

        // Check if the product is already in the cart
        if (isset($cart[$product->id])) {
            // If the product is already in the cart, update the quantity
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            // Otherwise, add the product with the selected quantity to the cart
            $cart[$product->id] = [
                'name' => $product->name,
                'quantity' => $request->quantity,
                'price' => $product->price, // Assuming the Product has a price attribute
            ];
        }

        // Store the updated cart in the session
        session()->put('cart', $cart);

        return redirect()->route('profile')->with('success', 'Product added to cart!');
    }

}
