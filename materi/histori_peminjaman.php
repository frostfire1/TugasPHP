<?php 
    include "header.php";
?>
<h2>Histori Peminjaman Buku</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th><th>Tanggal Pinjam</th><th>Tanggal harus Kembali</th><th>Nama Buku</th><th>Status</th><th>Aksi</th>
    </thead>
    <tbody>
        <?php 
        include "koneksi.php";
        $qry_histori=mysqli_query($con,"select * from peminjaman_buku order by id_peminjaman desc");
        $no=0;
        while($dt_histori=mysqli_fetch_array($qry_histori)){
            $no++;

            $buku_dipinjam="<ol>";
            $qry_buku = mysqli_query($con, "SELECT * FROM detail_peminjaman_buku 
                                JOIN buku ON buku.id = detail_peminjaman_buku.id_buku 
                                WHERE id_peminjaman_buku = '" . $dt_histori['id_peminjaman'] . "'");
            while($dt_buku=mysqli_fetch_array($qry_buku)){
                $buku_dipinjam.="<li>".$dt_buku['nama']."</li>";
            }
            $buku_dipinjam.="</ol>";
            $qry_cek_kembali=mysqli_query($con,"select * from pengembalian_buku where id_peminjaman_buku = '".$dt_histori['id_peminjaman']."'");
            if(mysqli_num_rows($qry_cek_kembali)>0){
                $dt_kembali=mysqli_fetch_array($qry_cek_kembali);
                $denda="denda Rp. ".$dt_kembali['denda'];
                $status_kembali="<label class='alert alert-success'>Sudah kembali <br>".$denda."</label>";
                $button_kembali="";
            } else {
                $status_kembali="<label class='alert alert-danger'>Belum kembali</label>";
                $button_kembali="<a href='kembali.php?id=".$dt_histori['id_peminjaman']."' class='btn btn-warning' onclick='return confirm(\"hello\")'>Kembalikan</a>";
            }
        ?>
            <tr>
                <td><?=$no?></td><td><?=$dt_histori['tanggal_pinjam']?></td><td><?=$dt_histori['tanggal_kembali']?></td><td><?=$buku_dipinjam?></td><td><?=$status_kembali?></td><td><?=$button_kembali?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<?php 
    include "footer.php";
?>
