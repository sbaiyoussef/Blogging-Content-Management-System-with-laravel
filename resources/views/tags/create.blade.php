@extends('layouts.app')
@section('content')
<div class="card card-default">
<div class="card-header">
   {{isset($tag) ? 'Edit Tag' : 'Create Tag'}} 
</div>
<div class="card-body">

    @if($errors->any())
    <div class="alert alert-danger">

        <ul class="list-group">
        @foreach ($errors->all() as $error)
          
        <li class="list-group-item text-danger">
            
         {{$error}}

        </li>
        
        @endforeach
    
        </ul>
     </div>     
        
 
 @endif
   <form action="{{isset($tag) ? route('tags.update',$tag->id) : route('tags.store')}}" method="POST">
        @csrf
        @if(isset($tag))
           @method('PUT')
        @endif
         <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{isset($tag) ? $tag->name : ''}}"/>
       <button type="submit" class="btn btn-success mt-2">{{isset($tag) ? 'Edit Tag' : 'Create Tag'}}</button>
    </form>
</div>

</div>

@endsection