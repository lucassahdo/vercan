<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PessoaFisica;
use App\Models\PessoaJuridica;

class PersonController extends Controller {

    /*
    ######################
    # View Methods
    ###################### 
    */
    
    /**
     * 
     */
    public function manage_natural() {    
        return view('pages.person.manage_natural', [
            'page' => 'person-manage-natural',
            'page_title' => 'Pessoa Física - Gerenciar'
        ]);
    } 

    /**
     * 
     */
    public function manage_legal() {  
        $items = PessoaJuridica::all();        
        return view('pages.person.manage_legal', [
            'page' => 'person-manage-legal',
            'page_title' => 'Pessoa Jurídica - Gerenciar',
            'items' => $items
        ]);
    } 

    /**
     * 
     */
    public function new() {        
        return view('pages.person.new', [
            'page' => 'person-new',
            'page_title' => 'Cadastro - Pessoa'
        ]);
    } 

    /**
     * 
     */
    public function edit($person_type, $person_id) {
        if ($person_type == 'natural')
            $person = PessoaFisica::find($person_id);     
        if ($person_type == 'legal')
            $person = PessoaJuridica::find($person_id);   

        return view('pages.person.new', [
            'page' => 'person-update',
            'page_title' => 'Editar - Pessoa',
            'person_type' => $person_type,
            'person' => $person
        ]);
    } 

    /*
    ######################
    # Post/Get Methods
    ###################### 
    */

    /**
     * 
     */
    public function create(Request $req) {          
        $data = $req->all();
        $result = [];
        $type = isset($data['type']) ? $data['type'] : false;

        if(!$type) 
            return response()->json([
                'status' => 'error',
                'message' => 'Selecione o tipo de pessoa'
            ]);  

        if ($req->type == 'legal') {
            unset($data['cpf']);
            unset($data['nome']);
            $result['redirect'] = '/person/manage/legal';
            $pj = PessoaJuridica::create($data);

            if ($pj) 
                $result['status'] = 'ok';
            else
                $result['status'] = 'error';
        }

        if ($req->type == 'natural') {
            unset($data['cnpj']);
            unset($data['razao-social']);
            unset($data['nome-fantasia']);
            $result['redirect'] = '/person/manage/natural';
            $pf = PessoaFisica::create($data);

            if ($pf) 
                $result['status'] = 'ok';
            else
                $result['status'] = 'error';
        }

        return response()->json($result);  
    } 

    /**
     * 
     */
    public function delete($person_type, $person_id) {  
        if ($person_type == 'natural')
            $person = PessoaFisica::find($person_id);     
        if ($person_type == 'legal')
            $person = PessoaJuridica::find($person_id);

        if ($person->delete())
            return response()->json([
                'status' => 'ok',
                'message' => 'success'
            ]);  
        else
            return response()->json([
                'status' => 'error',
                'message' => 'error'
            ]); 
    } 

    /**
     * 
     */
    public function update(Request $req, $person_type, $person_id) {   
        $result = [];        
        if ($person_type == 'natural') {
            $person = PessoaFisica::find($person_id);    
            $person->cpf            = $req->cpf; 
            $person->nome           = $req->nome;
            $result['redirect'] = '/person/manage/natural';
        }
        if ($person_type == 'legal') {
            $person = PessoaJuridica::find($person_id);  
            $person->cnpj           = $req->cnpj;
            $person->razao_social   = $req->razao_social;
            $person->nome_fantasia  = $req->nome_fantasia;
            $result['redirect'] = '/person/manage/legal';
        }

        $person->cep        = $req->cep;
        $person->rua        = $req->rua;
        $person->numero     = $req->numero;
        $person->bairro     = $req->bairro;
        $person->estado     = $req->estado;
        $person->cidade     = $req->cidade;
        $person->telefone   = $req->telefone;
        $person->email      = $req->email;

        if ($person->save()) 
            $result['status'] = 'ok';
        else
            $result['status'] = 'error';

        return response()->json($result);
    } 
}
