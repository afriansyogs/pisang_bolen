<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Saran</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- link font awasome -->
    <script src="https://kit.fontawesome.com/f9189b0d8d.js" crossorigin="anonymous"></script>

</head>
<body>
    <h1 class="text-center mt-3">Data Saran</h1>

    @foreach ($saran as $saranList)
        <div class="w-full h-auto mx-3 my-4 bg-warning border border-dark rounded-3 ">
            <div class="my-2 mx-2">
                <h1 class="mb-0">{{ $saranList->nama_user }}</h1>
                <p class="text-secondary mb-2">{{ date('d-m-Y', strtotime($saranList->tanggal)) }}</p>
                <p>{{ $saranList->saran }}</p>
            </div>
        </div>
    @endforeach

    <x-footer></x-footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
