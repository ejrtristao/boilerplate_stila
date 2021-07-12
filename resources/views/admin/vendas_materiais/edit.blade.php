@extends('layouts.app')
@section('title')
    @lang('crud.edit') @lang('models/vendasMateriais.singular')
@endsection
@section('content')
    <section class="section">
            <div class="section-header">
                <h3 class="page__heading m-0">@lang('crud.edit') @lang('models/vendasMateriais.singular')</h3>
                <div class="filter-container section-header-breadcrumb row justify-content-md-end">
                    <a href="{{ route('admin.vendasMateriais.index') }}"  class="btn btn-primary">@lang('crud.back')</a>
                </div>
            </div>
  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-body ">
                                    {!! Form::model($vendasMateriais, ['route' => ['admin.vendasMateriais.update', $vendasMateriais->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('admin.vendas_materiais.fields')
                                        </div>

                                    {!! Form::close() !!}
                            </div>
                         </div>
                    </div>
                 </div>
              </div>
   </div>
  </section>
@endsection