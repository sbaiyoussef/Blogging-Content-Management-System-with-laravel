@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('posts.create')}}" class="btn btn-success">Add Posts</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Posts</div>
        <div class="card-body">
         @if ($posts->count()>0)
         <table class="table">
            <div class="thead">
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                 
            </div>
            <div class="tbody">
                @foreach ($posts as $post)
                
                  <tr>
                   <td>
                    <img src="{{asset( $post->image ) }}" alt="image"  width="100px" height="60px">

                   </td> 
                    <td>
                           {{$post->title}}           
                    </td>
                   
                    <td><a href="{{route('categories.edit',$post->category->id)}}">{{$post->category->name}}</a></td>
                   @if($post->trashed())
                    <td>
                    
                    <form action="{{route('restore',$post->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-info btn-sm">Restore</button>
                    </form>
                    </td>
                    @else
                    <td>
                        <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm">Edit</a>
                   </td>                           
                   @endif
                 
                   <td>
                   <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                          {{$post->trashed() ? 'Delete' :'Trash'}}
                      </button>
                  </form>
                  </td>
                                     
                  </tr>
                  
                @endforeach   
            </div>
        </table>
             
         @else

         <h3 class="text-center">No Posts Yet</h3>
             
         @endif
        </div>

    </div>


@endsection