<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller {

    /**
     *
     */
    public function profile($user_id) {
        return view('pages.settings.profile', [
            'user_id' => $user_id,
            'page' => 'settings-profile',
            'page_title' => 'Perfil'
        ]);
    }

    /**
     * 
     */
    public function users() {
        return view('pages.settings.users', [
            'page' => 'settings-users',
            'page_title' => 'Usuários'
        ]);
    }

    /**
     * 
     */
    public function preferences() {        
        return view('pages.settings.preferences', [
            'page' => 'settings-preferences',
            'page_title' => 'Preferências'
        ]);
    }
}
