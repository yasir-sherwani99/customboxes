@extends('admin')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/app-assets/fonts/simple-line-icons/style.min.css') }}">

@endsection

@section('breadcrums')
	
	<div class="content-header-left col-md-12 col-12 mb-2 breadcrumb-new">
      <h3 class="content-header-title mb-0 d-inline-block">Admin Dashboard</h3>
      <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a>
            </li>
            <li class="breadcrumb-item active">Dashboard
            </li>
          </ol>
        </div>
      </div> 
    </div>

@endsection

@section('content')

<div class="content-body">
    
    <div class="row">
      <div class="col-lg-4 col-12">
        <div class="card border-0">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body">
                  <h1 class="display-4">{{ $total_quotations }}</h1>
                  <span class="text-muted">Quotations</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-notebook font-large-2 blue-grey lighten-3"></i>
                </div>
              </div>
            </div>
            <div id="sp-line-total-cost"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="card border-0">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body">
                  <h1 class="display-4">{{ $total_messages }}</h1>
                  <span class="text-muted">Messages</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-envelope font-large-2 blue-grey lighten-3"></i>
                </div>
              </div>
            </div>
            <div id="sp-line-total-sales"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="card border-0">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body">
                  <h1 class="display-4">{{ $total_clients }}</h1>
                  <span class="text-muted">Clients</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-user font-large-2 blue-grey lighten-3"></i>
                </div>
              </div>
            </div>
            <div id="sp-line-total-revenue"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 col-12">
        <div class="card border-0">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body">
                  <h1 class="display-4">{{ $total_industry_products }}</h1>
                  <span class="text-muted">Industry Boxes Products</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-handbag font-large-2 blue-grey lighten-3"></i>
                </div>
              </div>
            </div>
            <div id="sp-line-total-cost"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="card border-0">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body">
                  <h1 class="display-4">{{ $total_style_products }}</h1>
                  <span class="text-muted">Style Boxes Products</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-social-dropbox font-large-2 blue-grey lighten-3"></i>
                </div>
              </div>
            </div>
            <div id="sp-line-total-sales"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-12">
        <div class="card border-0">
          <div class="card-content">
            <div class="card-body">
              <div class="media d-flex">
                <div class="media-body">
                  <h1 class="display-4">{{ $total_other_products }}</h1>
                  <span class="text-muted">Other Products</span>
                </div>
                <div class="align-self-center">
                  <i class="icon-puzzle font-large-2 blue-grey lighten-3"></i>
                </div>
              </div>
            </div>
            <div id="sp-line-total-revenue"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- Active Quotations -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Recent Quotations</h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
              <td>
                <a href="{{ route('admin.quotation.index') }}">
                  <button class="btn btn-sm round btn-danger btn-glow"> View all</button>
                </a>
              </td>
            </div>
          </div>
          <div class="card-content">
            <div class="table-responsive">
              <table class="table table-de mb-0">
                <thead>
                  <tr>
                    <th style="width: 15%;">Date</th>
                    <th style="width: 75%;">Client Details</th>
                    <th class="text-center" style="width: 10%;">Details</th>
                  </tr>
                </thead>
                <tbody>
                  @if(!$quotations->isEmpty())
                  @foreach($quotations as $quote)
                  <tr>
                    @php
                      $created = $quote->created_at;
                      $created_at = \Carbon\Carbon::parse($created);
                      $quote_date = $created_at->toFormattedDateString();
                    @endphp
                    <td style="vertical-align: middle;">{{ $quote_date }}</td>
                    <td style="vertical-align: middle;">
                        {{ $quote->full_name }}
                        <br/> 
                        {{ $quote->email }}
                    </td>
                    <td class="text-center" style="vertical-align: middle;">
                      <a href="{{ route('admin.quotation.show', $quote->id) }}">
                        <button class="btn btn-sm round btn-outline-danger"> Details</button>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="3">There is no quotation to show here...</td>
                  </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Active Orders -->
  </div>

@endsection

@section('script')
@endsection