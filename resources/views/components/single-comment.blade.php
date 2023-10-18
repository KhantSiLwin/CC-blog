<div class="card d-flex p-3 my-3 shadow-sm">
    <div class="d-flex">
        <div>
            <img src="https://i.pravatar.cc/300" width="50" height="50" class="rounded-circle" alt="">
        </div>
        <div class="ms-3 w-100">
          <div class="d-flex justify-content-between align-items-center">
            <h6>  {{$comment->user->name }}</h6>
           <div class="d-flex justify-content-between">
            @can('edit',$comment)
            <button class="btn btn-warning mx-3">
             <a class="text-decoration-none text-white" href="/comment/edit/{{$comment->id}}">Edit</a>
          </button>
                
            @endcan
            @can('delete',$comment)
                <form action="/comment/delete/{{$comment->id}}" method="POST">
                     @csrf
                     @method('delete')
                     <td> <button class="btn btn-danger">Delete</button></td>
                 </form>
             @endcan
           </div>
          </div>
            <p class="text-secondary">  {{$comment->created_at->diffForHumans()}}</p>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</div>