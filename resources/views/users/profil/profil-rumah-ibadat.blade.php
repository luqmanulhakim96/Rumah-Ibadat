@extends('layouts.layout-user-nicepage')

@section('content')


<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  
  <div class="row">
      {{-- <div class="col-2"></div> --}}
      <div class="col-12">
          <div class="card">
            <form method="POST" action="#">
            {{ csrf_field() }}

              <div class="card-body border border-dark">

                  {{-- Flash Message --}}
                  @if ($message = Session::get('success'))
                    <div class="alert alert-success border border-success" style="text-align: center;">{{$message}}</div>
                  @elseif ($message = Session::get('error'))
                    <div class="alert alert-danger border border-danger" style="text-align: center;">{{$message}}</div>
                  @else
                    {{-- Hidden Gap - Just Ignore --}}
                    <div class="alert alert-white" style="text-align: center;"></div>
                    {{-- <div style="padding: 23px;"></div> --}}
                  @endif

                  <div class="row"> 
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>ID Rumah Ibadat</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('id_rumah_ibadat') is-invalid @else border-dark @enderror" id="id_rumah_ibadat" name="id_rumah_ibadat" type="text" readonly>
                          @error('id_rumah_ibadat')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row"> 
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Kategori Rumah Ibadat</label>
                          <select class="custom-select mr-sm-2 @error('category') is-invalid @else border-dark @enderror" id="category" name="category">
                              <option selected disabled hidden>PILIH KATEGORI RUMAH IBADAT</option>
                              <option value="BUDDHA"    {{ old('category') == "BUDDHA"    ? 'selected' : '' }} >BUDDHA</option>
                              <option value="HINDU"     {{ old('category') == "HINDU"     ? 'selected' : '' }} >HINDU</option>
                              <option value="KRISTIAN"  {{ old('category') == "KRISTIAN"  ? 'selected' : '' }} >KRISTIAN</option>
                          </select>
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Nama Rumah Ibadat</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('name') is-invalid @else border-dark @enderror" id="name" name="name" type="text">
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Nombor ROS</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('ros_number') is-invalid @else border-dark @enderror" id="ros_number" name="ros_number" type="text">
                          @error('ros_number')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Nombor Telefon Pejabat</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="office_phone" name="office_phone" type="text" placeholder="Contoh: 0312345678" minlength="10" maxlength="11" onkeypress="return onlyNumberKey(event)">
                          @error('office_phone')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Alamat Rumah Ibadat</label>
                      <div class="form-group">
                          <textarea class="form-control text-uppercase @error('office_phone') is-invalid @else border-dark @enderror" id="address" name="address" rows="2"></textarea>
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <label>Poskod</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('postcode') is-invalid @else border-dark @enderror" id="postcode" name="postcode" type="text" minlength="5" maxlength="5" onkeypress="return onlyNumberKey(event)">
                          @error('ros_number')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Daerah</label>
                          <select class="custom-select mr-sm-2 @error('district') is-invalid @else border-dark @enderror" id="district" name="district">
                              <option selected disabled hidden>PILIH DAERAH</option>
                              <option value="GOMBAK"          {{ old('district') == "GOMBAK"          ? 'selected' : '' }} >GOMBAK</option>
                              <option value="HULU LANGAT"     {{ old('district') == "HULU LANGAT"     ? 'selected' : '' }} >HULU LANGAT</option>
                              <option value="HULU SELANGOR"   {{ old('district') == "HULU SELANGOR"   ? 'selected' : '' }} >HULU SELANGOR</option>
                              <option value="KLANG"           {{ old('district') == "KLANG"           ? 'selected' : '' }} >KLANG</option>
                              <option value="KUALA SELANGOR"  {{ old('district') == "KUALA SELANGOR"  ? 'selected' : '' }} >KUALA SELANGOR</option>
                              <option value="PETALING"        {{ old('district') == "PETALING"        ? 'selected' : '' }} >PETALING</option>
                              <option value="SABAK BERNAM"    {{ old('district') == "SABAK BERNAM"    ? 'selected' : '' }} >SABAK BERNAM</option>
                              <option value="SEPANG"          {{ old('district') == "SEPANG"          ? 'selected' : '' }} >SEPANG</option>
                          </select>
                          @error('category')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Daerah</label>
                          <select class="custom-select mr-sm-2 @error('state') is-invalid @else border-dark @enderror" id="state" name="state">
                              <option selected disabled hidden>PILIH NEGERI</option>
                              <option value="JOHOR"           {{ old('state') == "JOHOR"            ? 'selected' : '' }}>JOHOR</option>
                              <option value="KEDAH"           {{ old('state') == "KEDAH"            ? 'selected' : '' }}>KEDAH</option>
                              <option value="KELANTAN"        {{ old('state') == "KELANTAN"         ? 'selected' : '' }}>KELANTAN</option>
                              <option value="MELAKA"          {{ old('state') == "MELAKA"           ? 'selected' : '' }}>MELAKA</option>
                              <option value="NEGERI SEMBILAN" {{ old('state') == "NEGERI SEMBILAN"  ? 'selected' : '' }}>NEGERI SEMBILAN</option>
                              <option value="PAHANG"          {{ old('state') == "PAHANG"           ? 'selected' : '' }}>PAHANG</option>
                              <option value="PULAU PINANG"    {{ old('state') == "PULAU PINANG"     ? 'selected' : '' }}>PULAU PINANG</option>
                              <option value="PERAK"           {{ old('state') == "PERAK"            ? 'selected' : '' }}>PERAK</option>
                              <option value="PERLIS"          {{ old('state') == "PERLIS"           ? 'selected' : '' }}>PERLIS</option>
                              <option value="SABAH"           {{ old('state') == "SABAH"            ? 'selected' : '' }}>SABAH</option>
                              <option value="SARAWAK"         {{ old('state') == "SARAWAK"          ? 'selected' : '' }}>SARAWAK</option>
                              <option value="SELANGOR"        {{ old('state') == "SELANGOR"         ? 'selected' : '' }}>SELANGOR</option>
                              <option value="TERENGGANU"      {{ old('state') == "TERENGGANU"       ? 'selected' : '' }}>TERENGGANU</option>
                              <option value="WP KUALA LUMPUR" {{ old('state') == "WP KUALA LUMPUR"  ? 'selected' : '' }}>WP KUALA LUMPUR</option>
                              <option value="WP PUTRAJAYA"    {{ old('state') == "WP PUTRAJAYA"     ? 'selected' : '' }}>WP PUTRAJAYA</option>
                              <option value="WP LABUAN"       {{ old('state') == "WP LABUAN"        ? 'selected' : '' }}>WP LABUAN</option>
                          </select>
                          @error('state')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md">
                      <div class="form-group">
                          <label class="mr-sm-2" for="inlineFormCustomSelect">Nama Bank</label>
                          <select class="custom-select mr-sm-2 @error('bank_name') is-invalid @else border-dark @enderror" id="bank_name" name="bank_name">
                              <option selected disabled hidden>PILIH BANK</option>
                              <option value="AFFIN BANK" >AFFIN BANK</option>
                              <option value="AGROBANK" >AGROBANK</option>
                              <option value="ALLIANCE BANK MALAYSIA">ALLIANCE BANK MALAYSIA</option>
                              <option value="AMBANK">AMBANK</option>
                              <option value="BANK ISLAM MALAYSIA" >BANK ISLAM MALAYSIA</option>
                              <option value="BANK MUAMALAT MALAYSIA BERHAD" >BANK MUAMALAT MALAYSIA BERHAD</option>
                              <option value="BANK RAKYAT" >BANK RAKYAT</option>
                              <option value="BANK SIMPANAN NASIONAL (BSN)" >BANK SIMPANAN NASIONAL (BSN)</option>
                              <option value="CIMB BANK">CIMB BANK</option>
                              <option value="CITIBANK" >CITIBANK</option>
                              <option value="HSBC BANK" >HSBC BANK</option>
                              <option value="HONG LEONG BANK" >HONG LEONG BANK</option>
                              <option value="MAYBANK" >MAYBANK</option>
                              <option value="PUBLIC BANK" >PUBLIC BANK</option>
                              <option value="RHB BANK">RHB BANK</option>
                          </select>
                          @error('bank_name')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md">
                      <label>Nombor Akaun</label>
                      <div class="input-group mb-3">
                          <input class="form-control text-uppercase @error('bank_account') is-invalid @else border-dark @enderror" id="bank_account" name="bank_account" type="text" onkeypress="return onlyNumberKey(event)">
                          @error('bank_account')
                          <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- Submit Button --}}
                  <div class="row" style="padding-top: 15px;"> 
                    <div class="col-md-2"></div>
                    <div class="col-md" style="text-align: center;">
                      <button type="button" class="btn waves-effect waves-light btn-info btn-block" data-toggle="modal" data-target="#confirmation">Kemaskini Profil Rumah Ibadat</button>
                    </div>
                    <div class="col-md-2"></div>
                  </div>

                  {{-- Hidden Gap - Just Ignore --}}
                  <div class="alert alert-white" style="text-align: center;"></div>
                  {{-- <div style="padding: 25px;"></div> --}}
              </div>

              <!-- Modal Confirmation -->
              <div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbspPengesahan!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      Anda pasti mahu mengemaskini profil rumah ibadat?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                      <button type="submit" class="btn btn-success">Kemaskini Profil Rumah Ibadat</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
      </div>
  </div>

</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<script>
  function onlyNumberKey(evt) {

        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
  }
</script>
@endsection