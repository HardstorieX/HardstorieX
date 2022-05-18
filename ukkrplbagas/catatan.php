<?php   
    
session_start();

    
    include "header.php";

    $user = $_SESSION['username'];
    $datauser = "catatan/$user.txt";

    if (!file_exists($datauser)) {
        die('<center>kamu belum mempunyai catatan</center>');
    }else{
        $file = fopen($datauser, "r");  
    }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
 </head>
 <body>
 
    <table border="1" align="center" width="50%">
        <td>
            <a href="">Urutkan Berdasarkan</a>
            <select id="urut" onclick="urutkan(this)">
                <option value="0">tanggal</option>
                <option value="1">waktu</option>
                <option value="2">lokasi</option>
                <option value="3">suhu</option>
            </select>
            <input type="submit" value="urutkan" name="">
        </td>   
    </table>

    <br>
    <table border="1" align="center" width="50%" height="40%">
        <td>
            <table align="center" border="1" width="80%" id="myTable">
                <tr>
                    <th>tanggal</th>
                    <th>waktu</th>
                    <th>lokasi yang dikunjungi</th>
                    <th>suhu tubuh</th>
                </tr>
                <?php   
                    while(($row = fgets($file)) !=false) {
                        $col = explode(',', $row);
                        foreach ($col as $data)  {
                            echo "<td>". trim($data)."</td>";
                        }
                    }
                 ?> 
            </table>
        </td>
        
    </table>
    <script src="main.js"></script>
 </body>
 </html>