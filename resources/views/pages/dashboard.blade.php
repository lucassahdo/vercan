@extends('layout.base') 

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="row">
        <div class="col-lg-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="statistics statistics-horizontal">
                        <div class="info info-horizontal">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon icon-primary icon-circle">
                                        <i class="now-ui-icons business_badge"></i>
                                    </div>
                                </div>
                                <div class="col-7 text-right">
                                    <h3 class="info-title">{{ $pf_count or '0' }}</h3>
                                    <h6 class="stats-title">Pessoas Físicas</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="statistics statistics-horizontal">
                        <div class="info info-horizontal">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon icon-warning icon-circle">
                                        <i class="now-ui-icons business_bank"></i>
                                    </div>
                                </div>
                                <div class="col-7 text-right">
                                    <h3 class="info-title">{{ $pj_count or '0' }}</h3>
                                    <h6 class="stats-title">Pessoas Jurídicas</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Últimas Pessoas Físicas</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    CPF
                                </th>
                                <th>
                                    Nome
                                </th>
                                <th>
                                    E-mail
                                </th>
                                <th class="text-right">
                                    Cidade
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($pf_data as $item)
                                    <tr>
                                        <td>
                                            {{ $item['attributes']['cpf'] }}
                                        </td>
                                        <td>
                                            {{ $item['attributes']['nome'] }}
                                        </td>
                                        <td>
                                            {{ $item['attributes']['email'] }}
                                        </td>
                                        <td class="text-right">
                                            {{ $item['attributes']['cidade'] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Últimas Pessoas Jurídicas</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    CNPJ
                                </th>
                                <th>
                                    Razão Social
                                </th>
                                <th>
                                    E-mail
                                </th>
                                <th class="text-right">
                                    Cidade
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($pj_data as $item)
                                    <tr>
                                        <td>
                                            {{ $item['attributes']['cnpj'] }}
                                        </td>
                                        <td>
                                            {{ $item['attributes']['razao_social'] }}
                                        </td>
                                        <td>
                                            {{ $item['attributes']['email'] }}
                                        </td>
                                        <td class="text-right">
                                            {{ $item['attributes']['cidade'] }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection