<html>
    <head>
        <title>Cetak Laporan</title>
    </head>
    <style>
        table {
            border-collapse: collapse;
            }

            table, th, td {
            border: 1px solid black;
        }
    </style>
    <script>
        window.print()
    </script>
    <body align="center">
        <h1>Halaman Laporan</h1>
        <table align="center">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>
            <?php
                $no=0;
                foreach($data->result_array() as $tampilkan):
                $no++;
                $id = $tampilkan['id'];
                $nama = $tampilkan['nama'];
                $harga = $tampilkan['harga'];
                $jumlah = $tampilkan['jumlah'];
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $harga; ?></td>
                <td><?php echo $jumlah; ?></td>
            </tr>
                <?php endforeach; ?>
        </table>
    </body>
</html>