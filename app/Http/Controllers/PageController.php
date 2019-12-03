<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use App\Product;
use App\ProductType;

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

    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id', $type)->first();
    	return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
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
