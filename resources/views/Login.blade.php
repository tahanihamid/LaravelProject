<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Login - Glow Beauty</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <style>
       body {
           background: linear-gradient(135deg, #f8b4c8, #fde8f0);
           min-height: 100vh;
           display: flex;
           align-items: center;
       }
       .card {
           border-radius: 20px;
           border: none;
       }
       .btn-danger {
           background-color: #e75480;
           border: none;
       }
       .emoji-bg {
           font-size: 2rem;
           opacity: 0.3;
           position: fixed;
       }
   </style>
</head>
<body>

<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-4">
           <div class="text-center mb-4">
               <h2 style="color:#e75480;">💄 Glow Beauty</h2>
               <p class="text-muted">Made by Tahani</p>
           </div>
           <div class="card shadow-lg p-4">
               <h4 class="text-center mb-4">Login</h4>
               @if($errors->any())
                   <div class="alert alert-danger">{{ $errors->first() }}</div>
               @endif
               <form action="{{ route('login.post') }}" method="POST">
                   @csrf
                   <div class="mb-3">
                       <label>Email</label>
                       <input type="email" name="email" class="form-control" required>
                   </div>
                   <div class="mb-3">
                       <label>Password</label>
                       <input type="password" name="password" class="form-control" required>
                   </div>
                   <button type="submit" class="btn btn-danger w-100">Login</button>
               </form>
           </div>
       </div>
   </div>
</div>

</body>
</html>