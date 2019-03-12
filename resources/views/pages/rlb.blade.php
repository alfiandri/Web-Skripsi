@extends('layouts.default')

@section('title', ' - Regresi Linear Berganda')

@section('contents')
@if (session('error'))
  {!! session('error') !!}
@endif
  <div class="container">
    <div class="row">
      <div class="right-align"><h6><a href="{{ url('/') }}" class="grey-text">Home</a> / <a href="{{ route('dataemas.index') }}" class="grey-text">Data Emas</a> / RLB</h6></div>
    </div>
  </div>
  <div class="row">
    <!-- datatable -->
    <div class="_data-table-overflow-x _push-t-d">
      <table id="rlb" class="display" style="width:100%">
        @csrf
        <thead>
          <tr>
            <th>#</th>
            <th>Y</th>
            <th>X1</th>
            <th>X2</th>
            <th>X3</th>
            <th>YX1</th>
            <th>YX2</th>
            <th>YX3</th>
            <th>X1X2</th>
            <th>X1X3</th>
            <th>X2X3</th>
            <th>X1^2</th>
            <th>X2^2</th>
            <th>X3^2</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1; 
            $y = $x1 = $x2 = $x3 = $yx1 = $yx2 = $yx3 = $x1x2 = $x1x3 = $x2x3 = $x12 = $x22 = $x32 = 0;
          @endphp
          @forelse($emas as $row)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $row->hargaemas/100 }}</td> <!-- Y -->
              <td>{{ $row->inflasi/100 }}</td> <!-- X1 -->
              <td>{{ $row->kursdollar/100 }}</td> <!-- X2 -->
              <td>{{ $row->sukubunga/100 }}</td> <!-- X3 -->
              <td>{{ ($row->hargaemas/100)*($row->inflasi/100) }}</td> <!-- YX1 -->
              <td>{{ ($row->hargaemas/100)*($row->kursdollar/100) }}</td> <!-- YX2 -->
              <td>{{ ($row->hargaemas/100)*($row->sukubunga/100) }}</td> <!-- YX3 -->
              <td>{{ ($row->inflasi/100)*($row->kursdollar/100) }}</td> <!-- X1X2 -->
              <td>{{ number_format(($row->inflasi/100)*($row->sukubunga/100),6) }}</td> <!-- X1X3 -->
              <td>{{ ($row->kursdollar/100)*($row->sukubunga/100) }}</td> <!-- X2X3 -->
              <td>{{ number_format(pow($row->inflasi/100,2),6) }}</td> <!-- X1^2 -->
              <td>{{ number_format(pow($row->kursdollar/100,2),6) }}</td> <!-- X2^2 -->
              <td>{{ number_format(pow($row->sukubunga/100,2),6) }}</td> <!-- X3^2 -->
            </tr>
            @php
              $y   += $row->hargaemas/100;
              $x1  += $row->inflasi/100;
              $x2  += $row->kursdollar/100;
              $x3  += $row->sukubunga/100;
              $yx1 += ($row->hargaemas/100)*($row->inflasi/100);
              $yx2 += $row->hargaemas/100*$row->kursdollar/100;
              $yx3 += ($row->hargaemas/100)*($row->sukubunga/100);
              $x1x2+= ($row->inflasi/100)*($row->kursdollar/100);
              $x1x3+= number_format(($row->inflasi/100)*($row->sukubunga/100),6);
              $x2x3+= ($row->kursdollar/100)*($row->sukubunga/100);
              $x12 += pow($row->inflasi/100,2);
              $x22 += pow($row->kursdollar/100,2);
              $x32 += pow($row->sukubunga/100,2);

            @endphp
          @empty
            <tr>
              <td colspan="14" class="center">Data tidak ditemukan</td>
            </tr>
          @endforelse
        </tbody>
        <tfoot>
          <tr>
            <th>n = {{ $data }}</th>
            <th>{{ $y }}</th>
            <th>{{ $x1 }}</th>
            <th>{{ $x2 }}</th>
            <th>{{ $x3 }}</th>
            <th>{{ $yx1 }}</th>
            <th>{{ $yx2 }}</th>
            <th>{{ $yx3 }}</th>
            <th>{{ $x1x2 }}</th>
            <th>{{ $x1x3 }}</th>
            <th>{{ $x2x3 }}</th>
            <th>{{ $x12 }}</th>
            <th>{{ $x22 }}</th>
            <th>{{ $x32 }}</th>
          </tr>
        </tfoot>
      </table> 
    </div>
    <!-- end datatable -->
  </div>
  <div class="container">
    <div class="row">
      <div class="col s4">
        <div class="input-field col s12">
          <input id="s1" type="text" class="validate" placeholder="Persamaan (1)">
          <label for="s1" class="black-text">Persamaan (1)</label>
        </div>
      </div>
      <div class="col s4">
        <div class="input-field col s12">
          <input id="s2" type="text" class="validate" placeholder="Persamaan (2)">
          <label for="s2" class="black-text">Persamaan (2)</label>
        </div>
      </div>
      <div class="col s4">
        <div class="input-field col s12">
          <input id="s3" type="text" class="validate" placeholder="Persamaan (3)">
          <label for="s3" class="black-text">Persamaan (3)</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s4">
        <div class="input-field col s12">
          <input id="s4" type="text" class="validate" placeholder="Persamaan (4)">
          <label for="s4" class="black-text">Persamaan (4)</label>
        </div>
      </div>
      <div class="col s4">
        <div class="input-field col s12">
          <input id="s5" type="text" class="validate" placeholder="Persamaan (5)">
          <label for="s5" class="black-text">Persamaan (5)</label>
        </div>
      </div>
      <div class="col s4">
        <div class="input-field col s12">
          <input id="s6" type="text" class="validate" placeholder="Persamaan (6)">
          <label for="s6" class="black-text">Persamaan (6)</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s4">
        <div class="input-field col s12">
          <input id="s7" type="text" class="validate" placeholder="Persamaan (7)">
          <label for="s7" class="black-text">Persamaan (7)</label>
        </div>
      </div>
      <div class="col s4">
        <div class="input-field col s12">
          <input id="s8" type="text" class="validate" placeholder="Persamaan (8)">
          <label for="s8" class="black-text">Persamaan (8)</label>
        </div>
      </div>
      <div class="col s4">
        <div class="input-field col s12">
          <input id="s9" type="text" class="validate" placeholder="Persamaan (9)">
          <label for="s9" class="black-text">Persamaan (9)</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col s6">
        <form class="input-field col s4" action="{{ route('rlb.store') }}" method="POST">
          @csrf
          Nilai B0 <input id="b0" name="b0" type="text" class="validate" placeholder="Nilai B0">
          @if ($errors->has('b0'))
            <span class="helper-text red-text">{{ $errors->first('b0') }}</span>
          @endif
          Nilai B1 <input id="b1" name="b1" type="text" class="validate" placeholder="Nilai B1">
          @if ($errors->has('b1'))
            <span class="helper-text red-text">{{ $errors->first('b1') }}</span>
          @endif
          Nilai B2 <input id="b2" name="b2" type="text" class="validate" placeholder="Nilai B2">
          @if ($errors->has('b2'))
            <span class="helper-text red-text">{{ $errors->first('b2') }}</span>
          @endif
          Nilai B3 <input id="b3" name="b3" type="text" class="validate" placeholder="Nilai B3">
          @if ($errors->has('b3'))
            <span class="helper-text red-text">{{ $errors->first('b3') }}</span>
          @endif
        </form>
      </div>
      <div class="col s6" style="margin: auto 0">
        <div class="input-field col s12 center">
          Persamaan Regresi <input id="regresi" type="text" class="validate" placeholder="Persamaan regresi">
          <div class="row">
            <div class="col s4">
              <a class="btn waves-effect waves-light green accent-4" id="proses">Proses</a>
            </div>
            <div class="col s4">
              <a class="btn waves-effect waves-light green accent-4" id="simpan"><i class="material-icons right">send</i> Simpan</a>
            </div>
            <div class="col s4">
              <a class="btn waves-effect waves-light green accent-4" href="{{ route('dataemas.index') }}">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#simpan').attr('disabled', 'disabled');
    });
    //processing rlb
    $('#proses').click(function(){
      $('#simpan').removeAttr('disabled');
      //declare variable
      const data = {{ $data }},
      y    = "{{ $y }}", 
      x1   = "{{ $x1 }}",
      x2   = "{{ $x2 }}",
      x3   = "{{ $x3 }}",
      yx1  = "{{ $yx1 }}",
      yx2  = "{{ $yx2 }}",
      yx3  = "{{ $yx3 }}",
      x1x2 = "{{ $x1x2 }}",
      x1x3 = "{{ $x1x3 }}",
      x2x3 = "{{ $x2x3 }}",
      x12  = "{{ $x12 }}",
      x22  = "{{ $x22 }}",
      x32  = "{{ $x32 }}";

      //persamaan 5
      const pers5_Y = Number((y * x1) - (data * yx1)).toFixed(3),
      pers5_b0 = (data * x1) - (data * x1),
      pers5_b1 = Number((x1 * x1) - (data * x12)).toFixed(3),
      pers5_b2 = Number((x2 * x1) - (data * x1x2)).toFixed(3),
      pers5_b3 = Number((x3 * x1) - (data * x1x3)).toFixed(3);

      //persamaan 6
      const pers6_Y = Number((y * x2) - (data * yx2)).toFixed(3),
      pers6_b0 = (data * x2) - (data * x2),
      pers6_b1 = Number((x1 * x2) - (data * x1x2)).toFixed(3),
      pers6_b2 = Number((x2 * x2) - (data * x22)).toFixed(3),
      pers6_b3 = Number((x3 * x2) - (data * x2x3)).toFixed(3);

      //persamaan 7
      const pers7_Y = Number((y * x3) - (data * yx3)).toFixed(3),
      pers7_b0 = (data * x3) - (data * x3),
      pers7_b1 = Number((x1 * x3) - (data * x1x3)).toFixed(3),
      pers7_b2 = Number((x2 * x3) - (data * x2x3)).toFixed(3),
      pers7_b3 = Number((x3 * x3) - (data * x32)).toFixed(3);

      //persamaan 8
      const pers8_Y = Number((pers5_Y * pers6_b1) - (pers5_b1 * pers6_Y)).toFixed(3),
      pers8_b1 = (pers5_b1 * pers6_b1) - (pers5_b1 * pers6_b1),
      pers8_b2 = Number((pers5_b2 * pers6_b1) - (pers5_b1 * pers6_b2)).toFixed(3),
      pers8_b3 = Number((pers5_b3 * pers6_b1) - (pers5_b1 * pers6_b3)).toFixed(3);

      //persamaan 9
      const pers9_Y = Number((pers6_Y * pers7_b1) - (pers6_b1 * pers7_Y)).toFixed(3),
      pers9_b1 = (pers6_b1 * pers7_b1) - (pers6_b1 * pers7_b1),
      pers9_b2 = Number((pers6_b2 * pers7_b1) - (pers6_b1 * pers7_b2)).toFixed(3),
      pers9_b3 = Number((pers6_b3 * pers7_b1) - (pers6_b1 * pers7_b3)).toFixed(3);

      // mencari b3
      const pers10_Y = Number((pers8_Y * pers9_b2) - (pers8_b2 * pers9_Y)).toFixed(3),
      pers10_b3 = Number((pers8_b3 * pers9_b2) - (pers8_b2 * pers9_b3)).toFixed(3),
      b3 = Number(pers10_Y/pers10_b3).toFixed(3);

      // mencari b2 dari persamaan 8
      const b2 = Number((pers8_Y - (pers8_b3 * b3))/pers8_b2).toFixed(3);

      // mencari b1 dari persamaan 5
      const b1 = Number((pers5_Y - ((pers5_b2 * b2) + (pers5_b3 * b3)))/pers5_b1).toFixed(3);

      // mencari b0 dari persamaan 1
      const b0 = Number((y - ((x1 * b1) + (x2 * b2) + (x3 * b3)))/data).toFixed(3);

      //pers1 value
      $('#s1').val(y + " = " + data + " B0 + " + x1 + " B1 + " + x2 + " B2 + " + x3 + " B3");

      //pers2 value
      $('#s2').val(yx1 + " = " + x1 + " B0 + " + x12 + " B1 + " + x1x2 + " B2 + " + x1x3 + " B3");

      //pers3 value
      $('#s3').val(yx2 + " = " + x2 + " B0 + " + x1x2 + " B1 + " + x22 + " B2 + " + x2x3 + " B3");

      //pers4 value
      $('#s4').val(yx3 + " = " + x3 + " B0 + " + x1x3 + " B1 + " + x2x3 + " B2 + " + x32 + " B3");

      //pers 5 value
      $('#s5').val(pers5_Y + " = " + pers5_b0 + " B0 + " + pers5_b1 + " B1 + " + pers5_b2 + " B2 + " + pers5_b3 + " B3");

      //pers 6 value
      $('#s6').val(pers6_Y + " = " + pers6_b0 + " B0 + " + pers6_b1 + " B1 + " + pers6_b2 + " B2 + " + pers6_b3 + " B3");

      //pers 7 value
      $('#s7').val(pers7_Y + " = " + pers7_b0 + " B0 + " + pers7_b1 + " B1 + " + pers7_b2 + " B2 + " + pers7_b3 + " B3");

      //pers 8 value
      $('#s8').val(pers8_Y + " = " + pers8_b1 + " B1 + " + pers8_b2 + " B2 + " + pers8_b3 + " B3");

      //pers 9 value
      $('#s9').val(pers9_Y + " = " + pers9_b1 + " B1 + " + pers9_b2 + " B2 + " + pers9_b3 + " B3");

      $('#b0').val(b0); //b0
      $('#b1').val(b1); //b1
      $('#b2').val(b2); //b2
      $('#b3').val(b3); //b3

      $('#regresi').val("Y = " + b0 + " + (" + b1 + ") X1 + (" + b2 + ") X2 + (" + b3 + ") X3")
    });

    //save data
    $('#simpan').click(function(){
      $('form').submit();
    });
  </script>
@endpush