<?php
defined('BASEPATH') or exit('No direct script access allowed');

$d = $data->row();

function tanggal_indo($tgl)
{
    $bulan  = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    $exp    = explode('-', date('d-m-Y', strtotime($tgl)));

    return $exp[0] . ' ' . $bulan[(int) $exp[1]] . ' ' . $exp[2];
}

?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-share"></i> Detail Barang Masuk</h4>
    </div>
</div>
<hr class="mt-0" />
<h6 class="mb-2">ID Barang Masuk</h6>
<p class="text-muted display-5 mt-1 mb-2">#<?= $d->id_pembelian; ?> ( <?= tanggal_indo($d->tgl_pembelian); ?> )</p>
<!-- <h6 class="mb-1 mt-2">Customer</h6> -->
<p class="text-muted display-5 mt-1 mb-2"><?= $d->nama_supplier; ?></p>
<h6 class="mb-1 mt-2">Petugas</h6>
<p class="text-muted display-5 mt-1 mb-4"><?= $d->fullname; ?></p>
<table class="table table-sm table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Kode Barang</th>
            <th scope="col" class="text-center">Nama Barang</th>
            <th scope="col" class="text-center">Satuan</th>
            <th scope="col" class="text-center">Qty</th>
            <th scope="col" class="text-center">Harga Satuan</th>
            <th scope="col" class="text-center">Harga Total</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $i = 1;
        $total_pengeluaran = 0;

        foreach ($data->result() as $dd) :
            $total = $dd->qty * $dd->harga;
            $total_pengeluaran += $total;
        ?>
            <tr>
                <td class="text-center"><?= $i++; ?></td>
                <td class="text-center"><?= $dd->kode_barang; ?></td>
                <td><?= $dd->nama_barang; ?></td>
                <td class="text-center"><?= $dd->brand; ?></td>
                <td class="text-center"><?= $dd->qty; ?></td>
                <td>
                    <span class="float-left">Rp.</span>
                    <span class="float-right pr-3">
                        <?= number_format($dd->harga, 0, ',', '.') . ',-'; ?>
                    </span>
                </td>
                <td>
                    <span class="float-left">Rp.</span>
                    <span class="float-right pr-3">
                        <?= number_format($total, 0, ',', '.') . ',-'; ?>
                    </span>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="6" class="text-center"><b>Biaya Total Barang Masuk</b></td>
            <td>
                <b>
                    <span class="float-left">Rp.</span>
                    <span class="float-right pr-3">
                        <?= number_format($total_pengeluaran, 0, ',', '.') . ',-'; ?>
                    </span>
                </b>
            </td>
        </tr>
    </tbody>
</table>
<div class="float-right">
    <button type="button" class="btn btn-light" onclick="window.history.back()">Kembali</button>
</div>