<?php


namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index(){
        $title = '1kvik.ru - бесплатная доска объявлений в Челябинске';
        return view('home', compact('title'));
    }
}
