@extends('layouts.default')

@section('title', ' - Prediksi')

@section('contents')
  <div class="container">
    <div class="row">
      <div class="right-align"><h6><a href="{{ url('/') }}" class="grey-text">Home</a> / <a href="{{ route('rlb.index') }}" class="grey-text">RLB</a> / Hitung Prediksi</h6></div>
      <!-- Modal Trigger -->
      <a class="waves-effect waves-light orange darken-3 btn modal-trigger" id="modalAdd" href="#dataemas">
        Hitung
      </a> 

      <a class="waves-effect waves-light btn green" href="{{ route('semua.laporan') }}">
        Cetak Semua
      </a>
      <!-- end modal trigger -->

      <!-- datatable -->
      <div class="_data-table-overflow-x _push-t-d">
        <table id="tblPrediksi" class="display" style="width:100%">
          @csrf
          <thead>
            <tr>
              <th>#</th>
              <th>Bulan</th>
              <th>Inflasi</th>
              <th>Kurs Dollar</th>
              <th>Suku Bunga</th>
              <tH>Hasil Prediksi</tH>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table> 
      </div>
      <!-- end datatable -->

      <!-- Modal add -->
      <div id="dataemas" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Hitung Prediksi Harga Emas</h4>
          <form id="frmPrediksi">
            <div class="input-field">
              <input name="bulan" id="bulan" type="text" class="validate">
              <label for="bulan">Bulan</label>
              <span class="txtBulan helper-text red-text"></span>
            </div>
            <div class="input-field">
              <input name="inflasi" id="inflasi" type="number" class="validate">
              <label for="inflasi">Inflasi (Dalam persen)</label>
              <span class="txtInflasi helper-text red-text"></span>
            </div>
            <div class="input-field">
              <input name="kursdollar" id="kurs" type="number" class="validate">
              <label for="kurs">Kurs Dollar (Rp))</label>
              <span class="txtKurs helper-text red-text"></span>
            </div>
            <div class="input-field">
              <input name="sukubunga" id="sukubunga" type="number" class="validate">
              <label for="sukubunga">Suku Bunga (Dalam persen)</label>
              <span class="txtSuku helper-text red-text"></span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-orange btn-flat">Batal</a>
            <button id="addData" class="waves-effect waves-orange btn-flat" type="submit">Simpan</a>
          </form>
        </div>
      </div>
      <!-- end modal add -->

      <!-- Modal update -->
      <div id="updatePrediksi" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4 class="modalTitle">Hitung Prediksi Harga Emas</h4>
          <form id="frmUpdatePrediksi">
            <input type="hidden" name="id">
            <div class="input-field">
              <input name="bulan" id="bulan" type="text" class="validate" placeholder="(Ex: Januari 2017)">
              <label for="bulan">Bulan</label>
              <span class="editBulan helper-text red-text"></span>
            </div>
            <div class="input-field">
              <input name="inflasi" id="inflasi" type="number" class="validate" placeholder="(Ex: 5)">
              <label for="inflasi">Inflasi (Dalam persen)</label>
              <span class="editInflasi helper-text red-text"></span>
            </div>
            <div class="input-field">
              <input name="kursdollar" id="kurs" type="number" class="validate" placeholder="(Ex: 10000)">
              <label for="kurs">Kurs Dollar (Rp))</label>
              <span class="editKurs helper-text red-text"></span>
            </div>
            <div class="input-field">
              <input name="sukubunga" id="sukubunga" type="number" class="validate" placeholder="(Ex: 5)">
              <label for="sukubunga">Suku Bunga (Dalam persen)</label>
              <span class="editSuku helper-text red-text"></span>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-orange btn-flat">Batal</a>
            <button id="updateData" class="waves-effect waves-orange btn-flat" type="submit">Simpan</a>
          </form>
        </div>
      </div>
      <!-- end modal update -->
    </div>
  </div>
@endsection

@push('scripts')
  <!-- Alert if data rlb success -->
  @if (session('success'))
    <script type="text/javascript">
      Swal.fire('Sukses!','{!! session('success') !!}','success');
    </script>
  @endif
  <script type="text/javascript">
    //ajax header need for deleted and updating data
    var table;

    //datatables serverSide
    $('document').ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      table = $('#tblPrediksi').DataTable({ 
        stateSave: true,
        responsive: true,
        processing: true,
        serverSide : true,
        // order : [0,'desc'],
        ajax : '{{ route('prediksi.emas') }}',
        columns: [
          { data: 'DT_RowIndex', name : 'id' },
          { data: 'bulan' , name : 'bulan' },
          { data: 'inflasi' , name : 'inflasi' },
          { data: 'kursdollar' , name : 'kursdollar' },
          { data: 'sukubunga' , name : 'sukubunga' },
          { data: 'hasil' , name : 'hasil' },
          { data: 'action' , name : 'action', orderable : false ,searchable: false},
        ]
      });
    });

    //calling add modal 
    $('#modalAdd').click(function(e){
      e.preventDefault();
      $('[name=bulan]').focus(),
      $('[name=bulan]').val(''),
      $('[name=inflasi]').val(''),
      $('[name=kursdollar]').val(''),
      $('[name=sukubunga').val(''),
      $('#dataemas').modal('open');
    });

    //Add data
    $('#addData').click(function(e){
      e.preventDefault();
      var frm = $('#frmPrediksi');
      $.ajax({
        url : '{{ route('prediksi.store') }}',
        type : 'POST',
        dataType: 'json',
        data : {
          'csrf-token': $('input[name=_token]').val(), 
           bulan : $('[name=bulan]').val(),
           inflasi : $('[name=inflasi]').val(),
           kursdollar : $('[name=kursdollar]').val(),
           sukubunga : $('[name=sukubunga').val()
        },
        success:function(data){
          $('.txtBulan').hide();
          $('.txtInflasi').hide();
          $('.txtKurs').hide();
          $('.txtSuku').hide();
          if (data.errors) {
            if (data.errors.bulan) { //if validate bulan error
              $('.txtBulan').text(data.errors.bulan);
              $('.txtBulan').show();
            }
            if (data.errors.inflasi) { //if inflasi error
              $('.txtInflasi').text(data.errors.inflasi);
              $('.txtInflasi').show();
            }
            if (data.errors.kursdollar) {
              $('.txtKurs').text(data.errors.kursdollar);
              $('.txtKurs').show();
            } 
            if (data.errors.sukubunga) {
              $('.txtSuku').text(data.errors.sukubunga);
              $('.txtSuku').show();
            }
          }
          if (data.success) {
            $('#dataemas').modal('close');
            frm.trigger('reset');
            Swal.fire('Sukses!','Data Berhasil Ditambah','success');
            table.ajax.reload(null,false);
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
          {
            alert('Please reload to read Ajax');
          }
      });
    });

    //deleting data
    $('#tblPrediksi').on('click','.btnDelete[data-remove]', function(e){
      e.preventDefault();
      var url = $(this).data('remove');
      Swal.fire({
        title: 'Apakah Anda yakin akan menghapus data ini?',
        text: "Data akan terhapus secara permanen!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Ya, hapus',
        reverseButtons: true,
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url : url,
            type: 'DELETE',
            dataType : 'json',
            data : { method : '_DELETE' , submit : true},
            success:function(data){
              if (data == 'Success') {
                Swal.fire("Deleted!", "Data berhasil dihapus!", "success");
                table.ajax.reload(null,false);
              }else{
                Swal.fire("Error", "Terjadi Kesalahan", "error");
              }    
            }
          });
        }
      });
    });

    //calling edit modal and id info of data
    $('#tblPrediksi').on('click','.btnEdit[data-edit]',function(e){
      e.preventDefault();
      var url = $(this).data('edit');
      $.ajax({
        url : url,
        type : 'GET',
        datatype : 'json',
        success:function(data){
          $('.modalTitle').text('Edit Hitung Prediksi ' + data.bulan),
          $('[name=id]').val(data.id),
          $('[name=bulan]').val(data.bulan),
          $('[name=inflasi]').val(data.inflasi),
          $('[name=kursdollar]').val(data.kursdollar),
          $('[name=sukubunga').val(data.sukubunga),
          $('#updatePrediksi').modal('open');
        }
      });
    });

    // updating data infomation
    $('#updateData').on('click',function(e){
      e.preventDefault();
      var url = "prediksi/" + $('[name=id]').val();
      var frm = $('#frmUpdatePrediksi');
      $.ajax({
        type :'PUT',
        url : url,
        dataType : 'json',
        data : frm.serialize(),
        success:function(data){
          //hide error message
          $('.editBulan').hide();
          $('.editInflasi').hide();
          $('.editKurs').hide();
          $('.editSuku').hide();

          if (data.errors) {
            if (data.errors.bulan) { //if validate bulan error
              $('.editBulan').text(data.errors.bulan);
              $('.editBulan').show();
            }
            if (data.errors.inflasi) { //if inflasi error
              $('.editInflasi').text(data.errors.inflasi);
              $('.editInflasi').show();
            }
            if (data.errors.kursdollar) {
              $('.editKurs').text(data.errors.kursdollar);
              $('.editKurs').show();
            } 
            if (data.errors.sukubunga) {
              $('.editSuku').text(data.errors.sukubunga);
              $('.editSuku').show();
            }
          }
          if (data.success) {
            $('#updatePrediksi').modal('close');
            frm.trigger('reset');
            Swal.fire('Sukses!','Data berhasil diperbaharui.','success');
            table.ajax.reload(null,false);
          }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Please reload to read Ajax');
        }
      });
    });
  </script>
@endpush