@extends('layouts.app')
@section('content')
<div class="card card-default">
    <div class="card-header">{{isset($post)? 'Edit Post' : 'Create Post'}}</div>
    <div class="card-body">
    <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
         @csrf

         @if (isset($post))
             @method('PUT')
         @endif
            <div class="form-group">
                <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{isset($post)? $post->title : ''}}"/>
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
            <textarea name="description" id="Description" cols="5" rows="5" class="form-control">{{isset($post) ? $post->description : ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value={{isset($post) ? $post->content : ''}}>
                  <trix-editor input="content"></trix-editor>

            </div>
            @if (isset($post))
                <div class="form-group">
                  <img src="{{asset($post->image)}}" alt="" style="width:100%">
                </div>
            @endif
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control">

                    @foreach ($categories as $category)
                <option value="{{$category->id}}"
                     @if(isset($post)) 
                       @if($category->id==$post->category_id)
                           selected
                       @endif

                     @endif 
                    
                    >

                    {{$category->name}}
                </option>
                    @endforeach
                    
                </select>
            </div>
                   @if($tags->count()>0)
                 <div class="form-group">
                     <label for="tags">Tags</label>
                     <select  id="tags" name="tags[]" class="form-control selector" multiple>
                         @foreach ($tags as $tag)

                           <option value="{{ $tag->id }}"
                            @if (isset($post))

                              @if ($post->hastag($tag->id))
                                
                                   selected

                              @endif
                                
                            @endif
                            
                            >

                               {{ $tag->name }}

                           </option>

                         @endforeach  

                    </select>

                 </div>
                 @endif

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image"/>
            </div>

            <div class="form-group">
            <button type="submit" class="btn btn-success">{{isset($post)? 'Edit Post' : 'Create Post'}}</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.selector').select2();
    });
</script>

@endsection

@section('css')
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css">
@endsection
