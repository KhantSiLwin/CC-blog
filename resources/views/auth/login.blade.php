<x-layout>

    <form action="/login" method="POST">
        @csrf
       
         <div>
            <label for="">email</label>
            <input type="email" name="email" value="{{old('email')}}">
            @error('email')
            <p class="alert alert-danger">{{$message}}</p>
        @enderror
        </div>
        <div>
            <label for="">password</label>
            <input type="password" name="password">
            @error('password')
            <p class="alert alert-danger">{{$message}}</p>
            @enderror
        </div>
       
        <div>
            <button type="submit">Submit</button>
        </div>
      
    </form>
</x-layout>