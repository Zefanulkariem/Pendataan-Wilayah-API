


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PWKB Page</title>
    <style>
        .dashboard-link {
            background-color: black;
            color: white !important;
            padding: 30px 20px;
            position: relative;
            display: inline-block;
            margin-right: -11px;
        }
      
        /* Arrow effect on the left */
        .dashboard-link::before {
            content: "";
            position: absolute;
            top: 0;
            left: -15px;
            width: 15px;
            height: 100%;
            background-color: black;
            clip-path: polygon(100% 0, 0 50%, 100% 100%);
        }
      </style>
</head>
<body>

    <!-- navbar start -->

    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="padding: 0px;">
      <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <!-- Left-aligned links -->
              <ul class="navbar-nav me-auto">
                  <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="{{route('login')}}">Sign in</a>
                  </li>
              </ul>
              <!-- Center-aligned links -->
              <ul class="navbar-nav mx-auto" style="padding-right: 30px;">
                  <li class="nav-item">
                      <a class="nav-link" href="/">Home</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/maps">Maps</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/tutorial">Tutorial</a>
                  </li>
              </ul>
              <!-- Right-aligned link -->
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                      <a class="nav-link dashboard-link" href="/dashboard">Dashboard</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  
    <!-- navbar end -->


    <!-- columns start -->

    <div class="container-fluid text-center bg-dark text-light" style="height: 100vh; background-image: url('https://i.ibb.co.com/QpVCFBw/sabil.jpg'); background-size: cover; background-position: center;">
        <div class="row align-items-start">
        
          <div class="col" style="margin: 25vh; ">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Lambang_Kabupaten_Bandung%2C_Jawa_Barat%2C_Indonesia.svg" alt="" 
            style="width:150px; margin-bottom: 5vh;">
            
            <h3>Selamat datang di website</h3>
            <p>Pendataan Wilayah Kabupaten Bandung</p>
            <button type="button" class="btn btn text-light" style="border-radius: 30px; margin-top: 15px; padding-top: 9px;padding-left: 20px; padding-right: 20px; padding-bottom: 10px; background-color: #FF0051; " >
              Selengkapnya 
            </button>
          </div>
        </div>
      </div>
      <div class="container-fluid text-center bg-light text-light" style="background-image: url(''); background-size: cover; background-position: center; background-repeat: no-repeat;">
        <div class="row align-items-start">
           
            <div class="col" style="margin: 38vh; ">
                <div class="card" style="border-radius: 30px; padding: 50px; background: rgba(0, 0, 0, 0.5); backdrop-filter: blur(10px); color: white;">
                    Dukung kesuksesan UMKM dan pendanaan yang tepat
                </div>
                
            </div>
         
        </div>
      </div>
    <!-- columns end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>