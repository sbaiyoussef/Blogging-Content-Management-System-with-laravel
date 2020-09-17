@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-success">Add Posts</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
         @if ($users->count()>0)
         <table class="table">
            <div class="thead">
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th></th>
                
            </div>
            <div class="tbody">
                @foreach ($users as $user)
                  <tr>
                   <td>
                        <img width="50px" height="50px" style="border-radius: 50%" src="{{Gravatar::src($user->email)}}" alt="">
                   </td> 
                  {{-- <td>{{$user->image}}</td> --}}
                    <td>
                           {{$user->name}}           
                    </td>
                   
                     <td>{{$user->email}}</td>     
                     @if (!$user->isAdmin())
                     <td>
                         <form action={{route('user.make-admin',$user->id)}} method="POST">
                             @csrf
                            <button type="submit" class="btn btn-success">Make Admin</button></td> 
                        
                        </form>                
                     @endif
                  </tr>
                  
                @endforeach   
            </div>
        </table>
             
         @else

         <h3 class="text-center">No Users Yet</h3>
             
         @endif
        </div>
    </div>


@endsection