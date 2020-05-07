@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="card">
                
                    <div class="card-header">Foreign Exchanges Details</div>
               
              
                @include('partials.flash')
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    
                        <span>Name of Owner:</span> {{$details->user->name}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      
                      <span>  FX Exchange Rate:</span>  {{$details->exchange_rate}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Currency:</span> {{$details->currency}}
                    
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>Date Listed:</span> {{$details->created_at->toFormattedDateString()}}
                    
                    </li>
                  </ul> <br><br>
                  @if ($details->user->id != Auth::user()->id)
                  <form onsubmit="return confirm('Do you really want to delete?');"  action="{{ url("request-fx/$details->id")}}" method="POST">
                    {{ csrf_field() }}
                   

                    <button type="submit" class="btn btn-primary">
                         Request to Buy FX </button>
                   
                </form>
                 
                  @else
                <span class="alert alert-info">The FX Listing Belongs to you</span>
                  @endif

                
                
              
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
