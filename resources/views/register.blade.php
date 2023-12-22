@include('layout.cdn')
<title>Register</title>

<div class="container">
    <form action="#" method="post">
<div class="container mt-5">
   <div class="row justify-content-center">
       <div class="col-md-6">
           <div class="card">
               <div class="card-header">
                   Register
               </div>
               <div class="card-body">
                   <form>
                    @csrf
                    <div class="form-group">
                        <label for="username">Name:</label>
                        <input name="name" type="text" class="form-control" id="username" placeholder="Enter your email">
                        @error('name')<small style="color:red">{{$message}}</small> @enderror
                    </div>
                       <div class="form-group">
                           <label for="username">Email:</label>
                           <input name="email" type="text" class="form-control" id="username" placeholder="Enter your email">
                           @error('email')<small style="color:red">{{$message}}</small> @enderror
                       </div>
                       <div class="form-group">
                           <label for="password">Password:</label>
                           <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password">
                           @error('password')<small style="color:red">{{$message}}</small> @enderror
                       </div>
                       <div class="form-group">
                        <label for="password">Password Confirm:</label>
                        <input name="password_confirm" type="password" class="form-control" id="password" placeholder="Enter your password">
                        @error('password_confirm')<small style="color:red">{{$message}}</small> @enderror
                    </div>
                       <button type="submit" class="btn btn-primary">Register</button>
                       <a class="btn btn-primary" href="{{route('login')}}" >Back To Home</a>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>

    </form>
   </div>
