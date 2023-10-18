<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug, $selectedColor = null){
        $product = EcommerceProduct::where('slug', $slug)->where('status', 1)->first();
        .
        .
        .
        .


            // Push product ID to session
            if ($firstColor != null){
                foreach ($product->orderedProductImages as $image){
                    if ($image->style_color_id == $firstColor->id){
                        $p_image = $image->image;
                        break;
                    }
                }
            }else{
                $p_image = $product->featured_image;
            }

            $session_datas = session()->get('recently_viewed');
            $empty_array = [];
            $item = [];
            if ($session_datas != null) {
                foreach ($session_datas as $data){
                    array_push($empty_array, $data['id']);
                }

                if(!in_array($product->id, $empty_array)){
                    if(count($session_datas) >= 6){
                        array_shift($session_datas);
                        session()->forget('recently_viewed');
                        foreach($session_datas as $redata){
                            session()->push('recently_viewed',$redata);
                        }
                    }
                    $item = [
                        'id' => $product->id,
                        'product_name' => $product->product_name,
                        'slug' => $product->slug,
                        'p_image' => $p_image,
                        'time' => Carbon::now()
                    ];
                    session()->push('recently_viewed',$item);
                }
            }else{
                    $item = [
                        'id' => $product->id,
                        'product_name' => $product->product_name,
                        'slug' => $product->slug,
                        'p_image' => $p_image,
                        'time' => Carbon::now()
                    ];
                session()->push('recently_viewed',$item);
            }


            return view('product.index', compact('products'));

    }






}
