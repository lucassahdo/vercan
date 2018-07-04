<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class MainController extends Controller {

    /**
     * 
     */
    public function home() {
        return view('pages.home', [
            'page' => 'home',
            'page_title' => 'Home'
        ]);
    }

    /**
     * 
     */
    public function notfound() {        
        return view('pages.errors.404');
    }    

    
    /**
     * 
     */
    public function dashboard() {        
        return view('pages.dashboard', [
            'page' => 'analytics_dashboard',
            'page_title' => 'Dashboard'
        ]);
    }   
}
