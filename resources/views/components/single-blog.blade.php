<div class="container">
    <div class="row">
      <div class="col-md-6 mx-auto text-center">
        <img
          src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
          class="card-img-top"
          alt="..."
        />
        <h3 class="my-3">{{$blog->title}}</h3>

        @auth

        <form action="{{route('blogs.toggle',$blog->slug)}}" method="POST">
            @csrf
          @if ($blog->isSubscribed())
          <button class="btn btn-danger rounded-pill">Unsubscribe</button>
    
          @else
          <button class="btn btn-warning rounded-pill">subscribe</button>
  
          @endif
        </form>

        @endauth

        <p class="fs-6 text-secondary">
          <a href="authors/{{$blog->author->name}}">{{$blog->author->name}}</a>
          <span class="mx-5"> {{$blog->created_at->diffForHumans()}}</span>
        </p>
        <div class="tags my-3">
          
          <span class="badge bg-success"><a href="categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></span>
        </div>
        <p class="lh-md">
            {{$blog->body}}
        </p>
      </div>
    </div>
  </div>