<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Pembayaran</title>
  <link rel="stylesheet" href="assets/css/stylepay.css">
</head>
<body>

<h2>Formulir Pembayaran</h2>

<!-- <form action="koneksi.php" method="post"> -->
  <label for="nama">Nama:</label>
  <input type="text" id="nama" name="nama" required><br><br>

  <label for="nomor_kartu">Nomor Kartu:</label>
  <input type="text" id="nomor_kartu" name="nomor_kartu" required><br><br>

  <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
  <input type="text" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" required><br><br>

  <label for="cvv">CVV:</label>
  <input type="text" id="cvv" name="cvv" required><br><br>

  <label for="bank">Pilih Bank:</label>
  <select id="bank" name="bank">
    <option value="BCA">BCA</option>
    <option value="BNI">BNI</option>
    <option value="BRI">BRI</option>
    <option value="Mandiri">Mandiri</option>
    <option value="CIMB Niaga">CIMB Niaga</option>
  </select><br><br>

  <!-- <button type="submit" class="pay__btn">Bayar</button> -->
  <input type="submit" value="Bayar">
</form>

</body>
</html>
