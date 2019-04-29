<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\buku;
use App\member;
use App\transaksi;
use Carbon\Carbon;
use Auth;
use DB;
use Excel;
use PDF;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buku()
    {
       return view('laporan.buku');
    }

    public function bukuPDF()
    {
        $buku = buku::all();
        $pdf = PDF::loadView('laporan.buku_pdf', compact('buku'));
        return $pdf->download('laporan_buku_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function bukuExcel(Request $request)
    {
        $buku = 'laporan.buku'.date('Y-m-d_H-i-s');
        Excel::create($buku, function ($excel) use ($request) {
            $excel->sheet('Laporan Data Buku', function ($sheet) use ($request){

                $sheet->mergeCells('A1:H1');

                // $sheet->setAllBorders('thin');
                $sheet->row(1, function ($row) {
                    $row->setFontFamily('Calibri');
                    $row->setFontSize(11);
                    $row->setAlignment('center');
                    $row->setFontWeight('bold');
                });

                $sheet->row(1, array('LAPORAN DATA BUKU'));

                $sheet->row(2, function ($row) {
                    $row->setFontFamily('Calibri');
                    $row->setFontSize(11);
                    $row->setFontWeight('bold');
                });

                $buku = buku::all();

                $sheet->row($sheet->getHighestRow(), function ($row) {
                    $row->setFontWeight('bold');
                });

                $datasheet = array();
                $datasheet[0]  =   array("NO", "JUDUL", "ISBN", "PENGARANG",  "PENERBIT","TAHUN TERBIT","JUMLAH BUKU", "LOKASI");
                $i=1;

                foreach ($buku as $buku) {

                // $sheet->appendrow($data);
                $datasheet[$i] = array($i,
                    $buku['judul'],
                    $buku['isbn'],
                    $buku['pengarang'],
                    $buku['penerbit'],
                    $buku['thn_terbit'],
                    $buku['jmlh_buku'],
                    $buku['lokasi']
                );
                $i++;
                }
                $sheet->fromArray($datasheet);
            });
        })->export('xls');
    }


    //


    public function transaksi()
    {
        return view ('laporan.transaksi');
    }

    public function transaksiPDF(Request $request)
    {
        $q = transaksi::query();

        if ($request->get('status')) {
            if ($request->get('status') == 'pinjam') {
                $q->where('status', 'pinjam');
            } else {
                $q->where('status', 'kembali');
            }
        }

        if (Auth::user()->level == 'user') {
            $q->where('member_id', Auth::user()->member->id);
        }

        $transaksi = $q->get();

        $pdf = PDF::loadView('laporan.transaksi_pdf', compact('transaksi'));
        return $pdf->download('laporan_transaksi_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function transaksiExcel(Request $request)
    {
        $transaksi = 'laporan_transaksi_'.date('Y-m-d_H-i-s');
        Excel::create($transaksi, function ($excel) use ($request){
            $excel->sheet('Laporan Data Transaksi', function ($sheet) use ($request){

                $sheet->mergeCells('A1:H1');

                $sheet->row(1, function ($row) {
                    $row->setFontFamily('Calibri');
                    $row->setFontSize(11);
                    $row->setAlignment('center');
                    $row->setFontWeight('bold');
                });

                $sheet->row(1, array('LAPORAN DATA TRANSAKSI'));

                $sheet->row(2, function ($row) {
                    $row->setFontFamily('Calibri');
                    $row->setFontSize(11);
                    $row->setFontWeight('bold');
                });

                $q = transaksi::query();

                if($request->get('status')) 
                {
                     if($request->get('status') == 'pinjam') {
                        $q->where('status', 'pinjam');
                    } else {
                        $q->where('status', 'kembali');
                    }
                }

                if(Auth::user()->level == 'user')
                {
                    $q->where('member_id', Auth::user()->member->id);
                }

                $transaksi = $q->get();

                $sheet->row($sheet->getHighestRow(), function ($row) {
                    $row->setFontWeight('bold');
                });

                $datasheet = array();
                $datasheet[0]  =   array("NO", "KODE TRANSAKSI", "BUKU", "PEMINJAM",  "TGL PINJAM","TGL KEMBALI","STATUS", "KET");
                $i=1;

                foreach ($transaksi as $transaksi) {
                    $datasheet[$i] = array($i,
                            $transaksi['kd_trans'],
                            $transaksi->buku->judul,
                            $transaksi->member->nama,
                            date('d/m/y', strtotime($transaksi['tgl_pinjam'])),
                            date('d/m/y', strtotime($transaksi['tgl_kembali'])),
                            $transaksi['status'],
                            $transaksi['ket']
                        );
                $i++;
                }
                $sheet->fromArray($datasheet);
           });
        })->export('xls');
    }
}
