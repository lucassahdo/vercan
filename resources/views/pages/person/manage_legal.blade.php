@extends('layout.base') 

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="col-md-12">
    <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Pessoa Jurídica</h4>
                </div>
                <div class="card-body">
                    <div class="toolbar">
                    </div>
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>CNPJ</th>
                                <th>Razão Social</th>
                                <th>Nome Fantasia</th>
                                <th>CEP</th>
                                <th>Rua</th>
                                <th>Número</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th class="disabled-sorting text-right">Ações</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>N</th>
                                <th>CNPJ</th>
                                <th>Razão Social</th>
                                <th>Nome Fantasia</th>
                                <th>CEP</th>
                                <th>Rua</th>
                                <th>Número</th>
                                <th>Bairro</th>
                                <th>Cidade</th>
                                <th>Estado</th>
                                <th>Telefone</th>
                                <th>E-mail</th>
                                <th class="disabled-sorting text-right">Ações</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($items as $i => $item)
                                @php
                                    $data = $item['attributes'];
                                    $position = $i + 1;
                                @endphp                           
                                <tr>
                                    <td>{{ $position }}</td>
                                    <td>{{ $data['cnpj'] }}</td>
                                    <td>{{ $data['razao_social'] }}</td>
                                    <td>{{ $data['nome_fantasia'] }}</td>           
                                    <td>{{ $data['cep'] }}</td>   
                                    <td>{{ $data['rua'] }}</td>      
                                    <td>{{ $data['numero'] }}</td>      
                                    <td>{{ $data['bairro'] }}</td>      
                                    <td>{{ $data['estado'] }}</td>      
                                    <td>{{ $data['cidade'] }}</td>      
                                    <td>{{ $data['telefone'] }}</td>    
                                    <td>{{ $data['email'] }}</td>                     
                                    <td class="actions text-right">
                                        <a href="/person/edit/legal/{{ $data['id'] }}" class="btn btn-round btn-warning btn-icon btn-sm edit">
                                            <i class="fas fa-edit"></i>                                        
                                        </a>
                                        <a href="/person/delete/legal/{{ $data['id'] }}" class="btn btn-round btn-danger btn-icon btn-sm remove">
                                            <i class="fas fa-minus"></i>                                        
                                        </a>
                                    </td>       
                                </tr>                     
                            @endforeach
                        </tbody>
                    </table>
                    {!! $items->links() !!}
                </div>
                <!-- end content-->
            </div>
            <!--  end card  -->
        </div>
        <!-- end col-md-12 -->
    </div>
</div>
@endsection

@section('scripts')
<script src="/cdn/jquery/jquery.dataTables.min.js"></script>
<script src="/js/pages/person_manage_legal.js"></script>
@endsection
