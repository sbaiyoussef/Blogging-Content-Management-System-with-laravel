@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-end mb-2">
<a href="{{route('tags.create')}}" class="btn btn-success">Create Tags</a>    
</div>

<div class="card card-default">
    <div class="card-header">Tags</div>
    <div class="card-body">
        @if ($tags->count()>0)
            
       
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Posts count</th>
                <th></th>
            </thead>
            <tbody>
             @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->name}}</td>
                    <td>{{$tag->posts->count()}}</td>
                    <td>
                    <a href="{{route('tags.edit',$tag)}}" class="btn btn-info btn-sm">Edit</a>
                    <button class="btn btn-danger btn-sm" onclick="handeldelete({{$tag->id}})">Delete</button>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
      
        @else
        <div class="div text-center">No Tags Yet</div>
        @endif
       
       <form action="#" method="POST" id="deleteTagForm">
        @csrf
        @method('DELETE')
         <div id='deleteModal' class="modal" tabindex="-1" role="dialog">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title">Delete Tag</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>
                 <div class="modal-body">
                   <p>Are you sure you want delete this Tag.</p>
                 </div>
                 <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">No,go back</button>
                   <button type="submit" class="btn btn-danger">Yes,Delete</button>
                 </div>
               </div>
             </div>
           </div>
        </div>
     
     </form>
</div>

@endsection

@section('script')

<script>
    function handeldelete(id){
        var form=document.getElementById('deleteTagForm')
        form.action='/tags/'+id
        console.log('delete',form);
        $('#deleteModal').modal('show')
    
    }
    </script>
    
@endsection