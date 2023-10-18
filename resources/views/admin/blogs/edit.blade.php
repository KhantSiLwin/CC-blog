<x-admin-layout>

    <form action="/admin/blogs/{{$blog->slug}}/update" method="POST">
        @csrf
        @method('patch')
        <div class="form-group">
          <label> Title</label>
          <input type="text" class="form-control" value="{{old('title',$blog->title)}}" name="title" placeholder="Enter title">
            @error('title')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="form-group">
            <label > Slug</label>
            <input type="text" class="form-control" value="{{old('title',$blog->slug)}}" name="slug" placeholder="Enter slug">
            @error('slug')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
          </div>

        <div class="form-group">
            <label > Body</label>
           <textarea name="body" id="" cols="30" rows="10" class="form-control">{{old('title',$blog->body)}}</textarea>
            @error('body')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
          </div>

          <select class="form-control mt-3" name="category_id">
            @foreach ($categories as $cat)
             <option {{$cat->id == old('title',$blog->category_id) ? 'selected' : ''}}  value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
          </select>
          @error('category_id')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
        <button type="submit" class="btn btn-primary mt-5">Update</button>
      </form>

</x-admin-layout>