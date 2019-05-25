
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/style.css">
    <title>login</title>
</head>

<body>

<div class="w3-center">

    <img src="http://tahfizselangor.unisel.edu.my/unisel.png" alt="Universiti Selangor" class="top-logo">
    <img src="http://hafizhizers.000webhostapp.com/eComplaint/img/icon.JPG" alt="" class="top-logo">
</div>
<br>

<div class="w3-container">
    <div class="w3-bar w3-light-grey w3-card-2">
        <a href="dashboard.php" class="w3-bar-item w3-button w3-border-right">Home</a>
        <a href="complaint_list.php" class="w3-bar-item w3-button w3-border-right">Senarai Aduan</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-right w3-border-left">Logout</a>
    </div>
    <br>

</div>
<div class="w3-container">
    <div class="w3-cell-row">

        <div class="w3-container w3-cell">


            <table class="w3-table w3-border">
                <tbody>
                <tr>
                    <th>Nama: </th>
                    <td width="50%">Manisha Sritharan</td>
                    <th>No.ID: </th>
                    <td>4171002151</td>
                </tr>
                <tr>
                    <th>Jawatan: </th>
                    <td>Student</td>
                    <th>Pejabat/Jabatan/Fakulti: </th>
                    <td>FASBIO</td>
                </tr>
                <tr>
                    <th>No.Telefon: </th>
                    <td>018-2560441</td>
                    <th>No.Telefon(Pejabat): </th>
                    <td>-</td>
                </tr>
                <tr>
                    <th>Aduan Kerosakan: </th>
                    <td colspan="3">Elektrikal</td>
                </tr>
                <tr>
                    <th>Masalah/Ulasan: </th>
                    <td colspan="3">Sinki pecah di kedua-dua bilik mandi. Tidak ada handle unutk almari. Tidak ada penutup di mangkuk tandas. Ada fungi di dinding bilik.</td>
                </tr>
                <tr>
                <th>Gambar: </th>
                <td colspan="3"><img src="../images/1.jpg" alt="" width="100px" height="100px" class="w3-hover-opacity"><img src="../images/1.jpg" alt="" width="100px" height="100px" class="w3-hover-opacity"></td>
                </tr>
            </tbody>
            </table>
            <br>
            <table class="w3-table w3-border">
                <tbody>
                <tr>
                    <th>Bangunan: </th>
                    <td>F1-GF-U4</td>
                    <th>Tarikh Temuduga: </th>
                    <td>22/4/19</td>
                </tr>
                <tr>
                    <th>Masa: </th>
                    <td>9.00 am-10.00 am</td>
                    <th>Keutamaam: </th>
                    <td>Segera</td>
                </tr>
                <tr>
                    <th>Status: </th>
                    <td colspan="3"><select name="status" id="" class="w3-input">
                            <option value="kiv">KIV</option>
                            <option value="pending">Pending</option>
                            <option value="closed">Closed</option>
                        </select></td>
                </tr>
                </tbody>
            </table>
            <br>
            <table class="w3-table w3-border">
                <tbody>
                <tr>
                    <th>user: </th>
                    <td>Barang tidak mencukupi</td>
                </tr>
                <tr>
                    <th>user: </th>
                    <td>Baik</td>
                </tr>
                <tr>
                    <td colspan="2">
                        <form action="" method="post">
                        <input type="text" class="w3-input w3-border" placeholder="Mesej">
                        <input type="submit" class="w3-button w3-light-gray" value="Hantar">
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
        <div class="w3-container w3-cell" style="width: 200px;">

            <ul class="w3-ul">
                <li><a href="#"><img
                            src="https://cdn1.iconfinder.com/data/icons/seo-internet-marketing-4-3/64/x-01-2-512.png"
                            width="30px" height="30px" alt="">Maklum Balas</a></li>
                <li><a href="#"><img src="https://static.thenounproject.com/png/461886-200.png" alt="" width="30px"
                                     height="30px">Manual</a></li>
            </ul>

        </div>
    </div>


    <br>


</div>

<div class="w3-container">
    <?php require_once "include/footer.php"?>
</div>




</body>

<style>

</style>

</html>