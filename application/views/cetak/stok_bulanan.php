<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<img src="<?= base_url('assets/img/logo.png'); ?>" class="logo" />
<h6 class="display-5 text-center mt-2 mb-0">Laporan Bulanan Stok Barang</h6>
<p class="text-center display-6 mt-0"><?= 'Bulan ' . ucwords($bulan) . ' Tahun ' . $tahun; ?></p>
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
<p class="text-right display-6 mt-0"><?= 'Bandung, ' . ucwords($bulan) . '  ' . $tahun; ?></p>
<br><br><br>
<p class="text-right display-6 mt-1"><b>( Manager Operasional )</b></p>

