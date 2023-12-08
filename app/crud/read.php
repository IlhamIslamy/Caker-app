<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kategori</title>
    <!-- Add necessary CSS links for styling -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .back-button {
            display: block;
            margin-top: 20px; /* Adjust margin as needed */
            padding: 5px 10px; /* Adjust padding for smaller size */
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #2980b9;
        }

        @media screen and (max-width: 600px) {
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
<?php
 // Start the session (if not started already)
include('config.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Assuming you have a user ID stored in the session
    if (isset($_SESSION['id_akun'])) {
        $userId = $_SESSION['id_akun'];

        $query = mysqli_query($koneksi, "SELECT * FROM detail_post INNER JOIN kategori ON detail_post.id_kategori = kategori.id_kategori WHERE kategori.id_kategori = $id AND detail_post.id_akun = $userId");

        ?>
        <h2>Detail Post</h2>
        <table>
            <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Nama Tempat</th>
                <th>Nama Pekerjaan</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 0;
            // Check if there is data to display
            if (mysqli_num_rows($query) > 0) {
                while ($post = mysqli_fetch_assoc($query)) {
                    $no++;
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $post['kategori']; ?></td>
                        <td><?php echo $post['nama']; ?></td>
                        <td><?php echo $post['judul_post']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                // Display a row indicating no data
                ?>
                <tr>
                    <td colspan="4">belum ada postingan pekerjaan untuk kategori ini</td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <a href="#" onclick="history.back()" class="back-button btn btn-sm">Kembali</a>
        <?php
    } else {
        echo "User ID tidak valid.";
    }
} else {
    echo "ID post tidak valid.";
}
?>

</div>

</body>
</html>

