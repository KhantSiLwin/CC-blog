<x-admin-layout>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col" colspan="2">Action</th>
                      </tr> 
                    </thead>
                    <tbody>
                        @forelse ($blogs as $b)
                        <tr>
                            <th scope="row">{{$b->id}}</th>
                            <td>{{$b->title}}</td>
                            <td>{{$b->body}}</td>
                            <td><button class="btn btn-warning">
                               <a href="/admin/blogs/{{$b->slug}}/edit">Edit</a>
                            </button></td>
                           
                               <form action="/admin/blogs/{{$b->slug}}/destory" method="POST">
                                    @csrf
                                    @method('delete')
                                    <td> <button class="btn btn-danger">Delete</button></td>
                               </form>
                           
                          </tr>
                        @empty
                            There is no blog.
                        @endforelse
                       
                    </tbody>
                  </table>
                  {{$blogs->links()}}
                  
</x-admin-layout>