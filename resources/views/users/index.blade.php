@extends('layouts.app')

@section('title')
Liste des @lang('models/users.plural')
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">@lang('models/users.plural')</li>
@endsection

@section('content')
{{ csrf_field() }}
<section class="content-header">
    <h1>Liste des @lang('models/users.plural')</h1>
</section>
<div class="container-fluid">
    <div class="modal fade" id="crudModal" tabindex="-1" aria-labelledby="crudModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>
    <div class="animated fadeIn">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i>
                        Users
                    </div>
                    <div class="card-body">
                        @include('users.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection