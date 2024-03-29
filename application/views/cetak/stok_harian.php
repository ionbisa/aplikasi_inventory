<?php
defined('BASEPATH') or exit('No direct script access allowed');

function tanggal_indo($tgl)
{
    $bulan  = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $exp    = explode('-', date('d-m-Y', strtotime($tgl)));

    return $exp[0] . ' ' . $bulan[(int) $exp[1]] . ' ' . $exp[2];
}
?>

<img src="<?= base_url('assets/img/logo.png'); ?>" class="logo" />
<h6 class="display-5 text-center mt-2 mb-0"><b>PT. Dash Garment Indoensia</b></h6>
<h6 class="display-6 text-center mt-2 mb-0">Laporan Stok Barang Harian</h6>
<!-- <p class="text-center display-6 mt-0"><?= tanggal_indo($tanggal); ?></p> -->
<hr class="mt-0" />
<table class="table table-sm table-bordered table-striped mt-3">
    <thead>
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Kode Barang</th>
            <th scope="col" class="text-center">Nama Barang</th>
            <th scope="col" class="text-center">Satuan</th>
            <th scope="col" class="text-center">Stok Barang</th>
            <th scope="col" class="text-center">Qty Barang Keluar</th>
            <th scope="col" class="text-center">Qty Barang Masuk</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        if ($data->num_rows() > 0) {
            foreach ($data->result() as $dt) {
                $penjualan = ($dt->qty_penjualan_new != '') ? $dt->qty_penjualan_new : 0;
                $pembelian = ($dt->qty_pembelian_new != '') ? $dt->qty_pembelian_new : 0;

                echo '<tr>';
                echo '<td class="text-center">' . $i++ . '</td>';
                echo '<td class="text-center">' . $dt->kode_barang . '</td>';
                echo '<td>' . $dt->nama_barang . '</td>';
                echo '<td class="text-center">' . $dt->brand . '</td>';
                echo '<td class="text-center">' . (($dt->stok + $penjualan) - $pembelian) . '</td>';
                echo '<td class="text-center">' . (($dt->qty_penjualan != '') ? $dt->qty_penjualan : 0) . '</td>';
                echo '<td class="text-center">' . (($dt->qty_pembelian != '') ? $dt->qty_pembelian : 0) . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="7" class="text-center">Data tidak ditemukan</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<br>
<p class="text-right display-6 mt-0">Bandung, <?= tanggal_indo($tanggal); ?></p>
<br><br><br>
<p class="text-right display-6 mt-1"><b>( Manager Operasional )</b></p>