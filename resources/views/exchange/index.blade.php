@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
            <div class="card">
                <div class="row">
                    <div class="card-header col-md-6">My Listed Foreign Exchanges</div>
                <a href="{{url('exchanges/create')}}" class="btn btn-primary btn-outline float-right col-md-6">Create A New FX</a>
                </div>
                @include('partials.flash')
                
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Currency</th>
                        <th scope="col">Exchange Rate</th>
                        <th scope="col">Date Created</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($exchanges as $item)
                        <tr>
                        <th scope="row">{{$item->user->name}}</th>
                        <td>{{$item->currency}}</td>
                        <td>{{$item->exchange_rate}}</td>
                        <td>{{$item->created_at->toFormattedDateString()}}</td>
                        <td><a href="{{url("exchanges/$item->id/edit")}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form onsubmit="return confirm('Do you really want to delete?');"  action="{{ url("exchanges/$item->id")}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}
    
                                <button type="submit" class="btn btn-primary text-white">
                                        Delete </button>
                               
                            </form>
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
@endsection
