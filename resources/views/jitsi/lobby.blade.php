<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jitsi Meet</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <form method="POST" action="{{ route('jitsi.authenticate') }}">
                    @csrf
                    <div class="card mt-5">
                        <div class="card-header">
                            <h5 class="h5">User Details</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name" class="label">Name</label>
                                <input type="text" id="name" class="form-control" name="name">
                            </div>
                            <div class="form-group mb-3">
                                <label for="email" class="label">Email</label>
                                <input type="email" id="email" class="form-control" name="email">
                            </div>
                            <div class="form-group mb-3">
                                <label for="avatar" class="label">Avatar</label>
                                <input type="text" id="avatar" class="form-control" name="avatar">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Join
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
