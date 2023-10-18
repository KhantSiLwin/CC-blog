<x-layout>

    <form action="/register" method="POST">
        @csrf
        <div>
            <label for="">name</label>
            <input type="text" name="name" value="{{old('name')}}">
            @error('name')
                <p class="alert alert-danger">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="">username</label>
            <input type="text" name="username" value="{{old('username')}}">
            @error('username')
                <p class="alert alert-danger">{{$message}}</p>
            @enderror
        </div>
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
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation">
        </div>
        <div>
            <button type="submit">Submit</button>
        </div>
      
    </form>
</x-layout>