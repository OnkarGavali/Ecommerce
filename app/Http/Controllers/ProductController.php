<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::All();
        $i=0;
        
        return view('products.index',compact('products','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = SubCategory::all();
        return view('products.create',compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'Product_name' => 'required',
            'Product_description' => 'required',
            'Product_subcategory_id' => 'required',
            'Product_image_url1' => 'required',
            'Product_dimension' => 'required',
            'Product_color' => 'required',
            'Product_prize' => 'required',
        ]);

        $data=$request->all();
        if($request->hasfile('Product_image_url1'))
        {
            $name1 = $request->Product_name.'-1-'.'-'.uniqid().'-'.$request->Product_image_url1->extension();
            $request->Product_image_url1->storeAs('files',$name1,'public');
            $data['Product_image_url1']=$name1;
        }
        if($request->hasfile('Product_image_url2'))
        {
            $name2 = $request->Product_name.'-2-'.'-'.uniqid().'-'.$request->Product_image_url2->extension();
            $request->Product_image_url2->storeAs('files',$name2,'public');
            $data['Product_image_url2']=$name2;
        }
        if($request->hasfile('Product_image_url3'))
        {
            $name3 = $request->Product_name.'-3-'.'-'.uniqid().'-'.$request->Product_image_url3->extension();
            $request->Product_image_url3->storeAs('files',$name3,'public');
            $data['Product_image_url3']=$name3;
        }

        if($request->hasfile('Product_image_url4'))
        {
            $name4 = $request->Product_name.'-4-'.'-'.uniqid().'-'.$request->Product_image_url4->extension();
            $request->Product_image_url4->storeAs('files',$name4,'public');
            $data['Product_image_url4']=$name4;
        }
        if($request->hasfile('Product_image_url5'))
        {
            $name5 = $request->Product_name.'-5-'.'-'.uniqid().'-'.$request->Product_image_url5->extension();
            $request->Product_image_url5->storeAs('files',$name5,'public');
            $data['Product_image_url5']=$name5;
        }

        Product::create($data);
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $subcategories = SubCategory::all();
        $product_images = ['Product_image_url1','Product_image_url2','Product_image_url3','Product_image_url4','Product_image_url5'];
        return view('products.edit',compact('product','subcategories','product_images'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //return dd($request->all());
        request()->validate([
            'Product_name' => 'required',
            'Product_description' => 'required',
            'Product_subcategory_id' => 'required',
            'Product_dimension' => 'required',
            'Product_color' => 'required',
            'Product_prize' => 'required',
        ]);

        //$product->update($request->all());
        $data=$request->all();
        //
        //Image1
        if($request->Product_image_url1)
        {
            $extension = $request->Product_image_url1->getClientOriginalExtension();
            $name1 = $request->Product_name.'_1_'.time().'.'.$extension;
            if($product->Product_image_url1)
            {
                    Storage::delete('/public/files/'.$product->Product_image_url1);
            }
            $request->Product_image_url1->storeAs('files',$name1,'public');
            $data['Product_image_url1']=$name1;
        }
        else
        {
            if($request->Product_image_url11)
            {
                Storage::delete('/public/files/'.$product->Product_image_url1);
                $data['Product_image_url1']=NULL;
            }
            else
            {
                $name1 = $product->Product_image_url1;
                $data['Product_image_url1']=$name1;
            }
        }
        //
        //Image2
        if($request->Product_image_url2)
        {
            $extension = $request->Product_image_url2->getClientOriginalExtension();
            $name2 = $request->Product_name.'_2_'.time().'.'.$extension;
            if($product->Product_image_url2)
            {
                    Storage::delete('/public/files/'.$product->Product_image_url2);
            }
            $request->Product_image_url2->storeAs('files',$name2,'public');
            $data['Product_image_url2']=$name2;
        }
        else
        {
            if($request->Product_image_url22)
            {
                Storage::delete('/public/files/'.$product->Product_image_url2);
                $data['Product_image_url2']=NULL;
            }
            else
            {
                $name2 = $product->Product_image_url2;
                $data['Product_image_url2']=$name2;
            }

        }
        //
        //Image3
        if($request->Product_image_url3)
        {
            $extension = $request->Product_image_url3->getClientOriginalExtension();
            $name3 = $request->Product_name.'_3_'.time().'.'.$extension;
            if($product->Product_image_url3)
            {
                    Storage::delete('/public/files/'.$product->Product_image_url3);
            }
            $request->Product_image_url3->storeAs('files',$name3,'public');
            $data['Product_image_url3']=$name3;
        }
        else
        {
            if($request->Product_image_url33)
            {
                Storage::delete('/public/files/'.$product->Product_image_url3);
                $data['Product_image_url3']=NULL;
            }
            else
            {
                $name3 = $product->Product_image_url3;
                $data['Product_image_url3']=$name3;
            }

        }
        //
        //Image4
        if($request->Product_image_url4)
        {
            $extension = $request->Product_image_url4->getClientOriginalExtension();
            $name4 = $request->Product_name.'_4_'.time().'.'.$extension;
            if($product->Product_image_url4)
            {
                    Storage::delete('/public/files/'.$product->Product_image_url4);
            }
            $request->Product_image_url4->storeAs('files',$name4,'public');
            $data['Product_image_url4']=$name4;
        }
        else
        {
            if($request->Product_image_url44)
            {
                Storage::delete('/public/files/'.$product->Product_image_url4);
                $data['Product_image_url4']=NULL;
            }
            else
            {
                 $name4 = $product->Product_image_url4;
                $data['Product_image_url4']=$name4;
            }

        }
        //
        //Image5
        if($request->Product_image_url5)
        {
            $extension = $request->Product_image_url5->getClientOriginalExtension();
            $name5 = $request->Product_name.'_5_'.time().'.'.$extension;
            if($product->Product_image_url5)
            {
                    Storage::delete('/public/files/'.$product->Product_image_url5);
            }
            $request->Product_image_url5->storeAs('files',$name5,'public');
            $data['Product_image_url5']=$name5;
        }
        else
        {
            if($request->Product_image_url55)
            {
                Storage::delete('/public/files/'.$product->Product_image_url5);
                $data['Product_image_url5']=NULL;
            }
            else
            {
                $name5 = $product->Product_image_url5;
                $data['Product_image_url5']=$name5;
            }

        }


        $product->update($data);


        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //$product->delete();
        if( $product['Product_status']=='0')
        {
            $product['Product_status']='1';
            $product->update();
            return redirect()->route('products.index')
                        ->with('success','Product is Active now');
        }
        else
        {
            $product['Product_status']='0';
            $product->update();
            return redirect()->route('products.index')
                        ->with('success','Product is Inactive now');
        }
    }
}
