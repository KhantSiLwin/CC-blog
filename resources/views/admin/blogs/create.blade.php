<x-admin-layout>

    <form action="/admin/store" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="form-group">
          <label> Title</label>
          <input type="text" class="form-control" name="title" placeholder="Enter title">
            @error('title')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
        </div>

        <div class="form-group">
            <label > Slug</label>
            <input type="text" class="form-control" name="slug" placeholder="Enter slug">
            @error('slug')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
          </div>


          <div class="form-group">
            <label > Photo</label>
            <input type="file" accept="image/*" class="form-control" name="photo" placeholder="Enter photo">
            @error('photo')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
          </div>

        <div class="form-group">
            <label > Body</label>
           <textarea name="body" id="" cols="30" rows="10" class="form-control"></textarea>
            @error('body')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
          </div>

          <select class="form-control mt-3" name="category_id">
            @foreach ($categories as $cat)
             <option  value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
          </select>
          @error('category_id')
            <div class="text-danger text-sm">
                {{$message}}
              </div>
            @enderror
        <button type="submit" class="btn btn-primary mt-5">Create</button>
      </form>

</x-admin-layout>