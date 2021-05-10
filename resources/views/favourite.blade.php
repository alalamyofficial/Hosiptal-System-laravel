@extends('layouts.app')
@section('content')
    <div class="container"><br><br>
        <h1 class="text-center">Favorite Services</h1><br><br>
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th width="50%">Service Title</th>
                    <th width="10%">Description</th>
                    <th width="8%">Quantity</th>
                    <th width="10%"></th>
                </tr>
                </thead>
                <tbody>
                @php $total = 0; @endphp
                @if(session('cart'))
                    @foreach(session('favourite') as $id => $Service)
                        <tr>
                            <td>
                                <img src="{{$Service['icon']}}" alt="{{$Service['title']}}" class="img-fluid" width="150"
                                >
                                <span>{{$Service['title']}}</span>
                            </td>
                            <td>${{$Service['description']}}</td>
                            <td>
                                <form action="{{route('change_qty', $id)}}" class="d-flex">
                                    <button type="submit" value="down" name="change_to" class="btn btn-danger">

                                        @if($Service['quantity'] === 1) 
                                            x 
                                        @else
                                            - 
                                        @endif

                                    </button>

                                    <input type="number" value="{{$Service['quantity']}}" disabled>
                                    <button type="submit" value="up" name="change_to" class="btn btn-success">
                                        +
                                    </button>
                                    
                                </form>
                            </td>

                        </tr>
                    @endforeach
                @endif
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>
@endsection