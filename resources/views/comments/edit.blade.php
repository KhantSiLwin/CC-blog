<x-admin-layout>

    <form action="/comment/update/{{$comment->id}}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
          
          <input type="text" class="form-control" value="{{old('comment',$comment->body)}}" name="body" placeholder="Enter new comment">
            @error('body ')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
        </div>

     
        <button type="submit" class="btn btn-primary mt-5">Update</button>
      </form>
</x-admin-layout>