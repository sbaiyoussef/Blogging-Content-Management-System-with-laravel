@extends('layouts.app')
@section('content')

    <div class="d-flex justify-content-end mb-2">
    <a href="{{route('categories.create')}}" class="btn btn-success">Add Categories</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
            @if ($categories->count()>0)
            <table class="table">
              <thead>
                  <th>Name</th>
                  <th>Posts Count</th>
                  <th></th>
              </thead>
              <tbody>
                  @foreach ($categories as $category)


                  <tr>
                      <td>
                          {{$category->name}}
                      </td>
                      <td>
                        {{$category->posts->count()}} 
                      </td>
                      <td>
                      <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>
                      <button  class="btn btn-danger btn-sm" onclick="handeldelete({{$category->id}})">Delete</button>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>

          @else
            <h3 class="text-center">No Categories Yet</h3>
            @endif
            <form action="#" method="POST" id="deleteCategoryForm">
               @csrf
               @method('DELETE')
                <div id='deleteModal' class="modal" tabindex="-1" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Delete Category</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want delete this Category.</p>
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
    var form=document.getElementById('deleteCategoryForm')
    form.action='/categories/'+id
    console.log('delete',form);
    $('#deleteModal').modal('show')

}
</script>

@endsection