@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="card">
               @include('errors.list')
                    <div class="card-header col-md-6">Create A New FX</div>
              
            <form method="POST" action="{{url('exchanges')}}">
                @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">Select Exchange Currency</label>

                          <select name="currency" id="" class="form-control">
                         <option value="USD">USD</option>
                         <option value="EUR">EUR</option>
                         <option value="NGN">NGN</option>
                          </select>
                         
                          
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Enter your Exchange Rate</label>
                          <input type="text" class="form-control" name="exchange_rate">
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                
               
               
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
