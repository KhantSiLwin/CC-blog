{{-- @props(['blog']) --}}
<div class="card">
    <img
      @if ($blog->photo)
          src="{{asset('/storage/'.$blog->photo)}}"
          
       @else
          src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
      @endif
      class="card-img-top"
      alt="..."
    />
    <div class="card-body">
      <h3 class="card-title">{{$blog->title}}</h3>
      <p class="fs-6 text-secondary">
        <a href="?author={{$blog->author->name}}{{request('search') ? "&search=".request('search'):''}}{{request('category') ? "&category=".request('category'):''}}">{{$blog->author->name}}</a>
        <span> {{$blog->created_at->diffForHumans()}}</span>
      </p>
      <div class="tags my-3">
        
        <span class="badge bg-success"><a href="?category={{$blog->category->slug}}">{{$blog->category->name}}</a></span>
       
      </div>
      <p class="card-text">
       {{$blog->body}}
      </p>
      <a href="{{url('blogs',$blog->slug)}}" class="btn btn-primary">Read More</a>
    </div>
  </div>