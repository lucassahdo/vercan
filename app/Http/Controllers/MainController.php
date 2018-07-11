<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PessoaFisica;
use App\Models\PessoaJuridica;

class MainController extends Controller 
{

    /**
     * 
     */
    public function home() 
    {
        return view('pages.home', [
            'page' => 'home',
            'page_title' => 'Home'
        ]);
    }

    /**
     * 
     */
    public function notfound() 
    {        
        return view('pages.errors.404');
    }    

    /**
     * 
     */
    public function about() 
    {        
        return view('pages.about', [
            'page' => 'about',
            'page_title' => 'Sobre'
        ]);
    }    
    
    /**
     * 
     */
    public function dashboard() 
    {    
        $pj_data = PessoaJuridica::orderBy('created_at','desc')->take(10)->get();  
        $pf_data = PessoaFisica::orderBy('created_at','desc')->take(10)->get();
        $pj_count = PessoaJuridica::count();
        $pf_count = PessoaFisica::count();

        return view('pages.dashboard', [
            'page' => 'analytics_dashboard',
            'page_title' => 'Dashboard',
            'pj_data' => $pj_data,
            'pf_data' => $pf_data,
            'pj_count' => $pj_count,
            'pf_count' => $pf_count
        ]);
    }   
}
