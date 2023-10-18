<x-layout>

   
    <x-hero/>

   <x-single-blog :blog="$blog"/>


  @auth
  <div class="container">
    <div class="col-md-6 mx-auto">
      <form action="/blogs/{{$blog->slug}}/comments" method="POST">
        @csrf
        <label for="">Comment here</label>
        <textarea 
            name="body"  
            class="form-control"
            id="" 
            cols="30" 
            rows="10"
            ></textarea>
            <button class="btn btn-primary mt-3" type="submit">Comment</button>
      </form>
    </div>
   </div>
  @endauth

   <x-comments :comments="$blog->comments()->latest()->get()"/>

   <x-subscribe/>

   <x-blog-you-may-like :randomBlogs="$randomBlogs"/>

   
</x-layout>

   
    
    
   
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
