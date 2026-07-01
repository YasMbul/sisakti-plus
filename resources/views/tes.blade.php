<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources\css\app.css', 'resources\js\app.js'])
</head>
<body>
    tes
    
    <div class="flex gap-3">
        <x-statecard
            title="Total SKP"
            value="20"
            label="80% Syarat SKP Terpenuhi"
            theme="green"
        > 
        </x-statecard>
        <x-statecard
            title="Total Peminjaman Masuk"
            value="20"
            label="Peminjaman"
            theme="green"
        > 
        </x-statecard>
        <x-statecard
            title="Total Peminjaman Masuk"
            value="20"
            label="Peminjaman"
            theme="green"
        > 
        </x-statecard>
        <x-statecard
            title="Total Peminjaman Masuk"
            value="20"
            label="Peminjaman"
            theme="green"
        > 
        </x-statecard>
    </div>
</body>
</html>