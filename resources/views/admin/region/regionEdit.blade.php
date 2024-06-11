<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <title>Edit Data Post - SantriKoding.com</title> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('region.update', $region->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <div class="form-group">
                                <label class="font-weight-bold">Provinsi</label>
                                <input type="text" class="form-control" name="provinsi" value="{{ $region->provinsi }}" placeholder="Masukkan provinsi">
                            
                                <!-- error message untuk title -->
                                
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kota</label>
                                <input type="text" class="form-control" name="kota" value="{{ $region->kota }}" placeholder="Masukkan Judul kota">
                            
                                <!-- error message untuk title -->
                                
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Ongkir</label>
                                <input type="text" class="form-control" name="ongkir" value="{{ $region->ongkir }}" placeholder="Masukkan Judul ongkir">
                            
                                <!-- error message untuk title -->
                                
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>