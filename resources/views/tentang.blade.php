<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    {{-- font --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Informasi Layanan</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', Arial, Helvetica, sans-serif;
            background-color: white;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* Agar tombol dapat diposisikan relatif terhadap body */
        }
        .container {
            width: 60%;
            line-height: 1.8;
        }
        .section {
            text-align: left;  /* Mengatur teks agar dimulai dari kiri */
            margin-bottom: 50px;
        }
        .section p:first-child {
            font-weight: 500;
            margin-bottom: 20px;
        }
        .section p {
            margin: 0;
            font-size: 16px;
        }
        .section:last-child {
            margin-top: 80px;
        }

        /* Tombol Kembali */
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #000000;
            color: white;
            font-size: 16px;
            font-weight: 500;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none; /* Hilangkan garis bawah pada link */
        }

        /* Tombol Hover */
        .back-button:hover {
            background-color: #000000;
        }
    </style>
</head>
<body>
    <!-- Tombol Kembali -->
    <a href="{{ url('/') }}" class="back-button"><i class="fa fa-sharp fa-light fa-arrow-left"></i> Kembali</a>

    <div class="container">
        <div class="section">
            <p>Kami menyediakan layanan yang mempermudah beberapa proses seperti :</p>
            <p>mempermudah proses pendataan UMKM, pengajuan pendanaan, dan</p>
            <p>pembaruan status legalitas secara efisien dan terstruktur</p>
        </div>
        <div class="section">
            <p>Dengan menggabungkan teknologi modern dan kebutuhan pelaku usaha kecil,</p>
            <p>aplikasi ini menjadi jembatan yang menghubungkan UMKM dengan berbagai</p>
            <p>peluang pendanaan.</p>
        </div>
    </div>
</body>
</html>
