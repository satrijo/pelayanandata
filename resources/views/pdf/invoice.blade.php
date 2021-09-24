@inject('setting','App\Http\Controllers\SettingController')
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Export PDF</title>
<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    td {
        word-break: break-all;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }

    .gray {
        background-color: lightgray;

    }

    .abu {
        background-color: lightgray;
        padding-top: 10px;
        padding-bottom: 30px;
        margin-bottom: 40px;
    }

    .pdt{
        padding-top: 50px;
    }
</style>

</head>
<body>
  <table width="100%" class="abu">
    <tr>
        <td align="center"><img src="{{asset('images/logo_bmkg.png')}}" alt="" width="70" /></td>
        <td align="left">
            <h1>Badan Metorologi Klimatologi dan Geofisika</h1>

            <u>{{ $setting->kontak()->kontak }}</u><br>

                {{$setting->kontak()->alamat}} -
                {{$setting->kontak()->telp}} -
                {{$setting->kontak()->email}} -
                {{ url('/') }}


        </td>
    </tr>

  </table>


  <table width="100%">
    <thead>
        <tr>
            <td align="left"><strong>Invoice</strong> {{ $data->invoice }}</td>

            <td align="right"><strong>Informasi Pemohon</strong></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="left">Dibuat: {{ $data->created_at->isoFormat('dddd, D MMMM Y') }} </td>
            <td align="right">{{ $data->nama }}</td>
        </tr>
        <tr>
            <td align="left">Status: {{$data->status}} </td>
            <td align="right">{{ $data->instansi }}</td>
        </tr>
        <tr>
            <td align="left">Status: {{$data->jenispelayanan == "pnbp" ? "PNBP / Bertarif" : "Nol Rupiah"}} </td>
            <td align="right" class="spasi">{{ $data->alamat }} </td>
        </tr>
        <tr>
            <td align="left">Periode: {{$data->periodedari}} - {{$data->periodesampai}} </td>
            <td align="right">{{ $data->email }} - {{ $data->nohp }}</td>
        </tr>
        <tr>
            <td align="left">Metode Pembayaran: {{ucfirst($data->pembayaran)}} </td>
        </tr>
    </tbody>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Produk </th>
        <th>Jenis Layanan</th>
        <th>Periode / Satuan</th>
        <th>Tarif</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
        @foreach($produk as $p)
            <tr>
                <th scope="row">{{$loop->index + 1 }}</th>
                <td>{{ $p->namalayanan }}</td>
                <td align="center">{{ $p->jenislayanan }}</td>
                <td align="center">{{ $data->totalperiode }} @if ($p->satuan !== 'series')
                    {{  $p->satuan }} @else @php
                    $explode = explode(" ", $p->category->satuan);

                    @endphp
                    {{ $explode[1] }}
                    @endif
                </td>
                <td align="right">{{ number_format($p->tarif, 2,',','.') }}</td>
                <td align="right">Rp.{{ number_format($p->tarif * $data->totalperiode, 2, ',','.') }}</td>
            </tr>
        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td colspan="4"></td>
            <td align="right">Subtotal Rp.</td>
            <td align="right">{{ number_format($data->total,2,',','.') }}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right">Kode</td>
            <td align="right">-</td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="right">Total</td>
            <td align="right" class="gray">Rp.{{ number_format($data->total,2,',','.') }}</td>
        </tr>
    </tfoot>
  </table>
  <table>
       <tr>
            <td colspan="4"></td>
            <td align="center"></td>
            <td align="center"><strong>Digital Signature</strong></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="center"></td>
        <td align="center"><img src="{{$data->qrcode}}" width="80" /></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="center"></td>
            <td align="center">Diperbaharui: </td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td align="center"></td>
            <td align="center">{{ $data->updated_at->isoFormat('dddd, D MMMM Y') }}</td>
        </tr>

  </table>

  <hr>

</body>
</html>
