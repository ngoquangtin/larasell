<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use App\Product;

class PageController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
    	// return view('page.trangchu', ['slide' => $slide]);
        
        $new_product = Product::where('new', 1)->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);
        return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai')); 
    }

    public function getLoaiSp()
    {
    	return view('page.loai_sanpham');
    }

    public function getChitiet()
    {
    	return view('page.chitiet_sanpham');
    }

    public function getLienhe()
    {
    	return view('page.lienhe');
    }

    public function getGioithieu()
    {
    	return view('page.gioithieu');
    }

}
