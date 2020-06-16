@extends('layouts.ecommerce')

@section('title')
<title>Register</title>
@endsection

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Login/Register</h2>
				<div class="page_link">
					<a href="{{ url('/') }}">Home</a>
					<a href="{{ route('customer.register') }}">register
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Home Banner Area =================-->

<!--================Login Box Area =================-->
<section class="login_box_area p_120">
	<div class="container">
		<div class="row">
			<div class="offset-md-3 col-lg-6">
				@if (session('success'))
				<div class="alert alert-success">{{ session('success') }}</div>
				@endif

				@if (session('error'))
				<div class="alert alert-danger">{{ session('error') }}</div>
				@endif

				<div class="login_form_inner">
					<h3>Register</h3>
					<form class="row login_form" action="{{ route('customer.post_register') }}" method="post">
						@csrf
						<div class="col-md-12 form-group">
							<input type="name" class="form-control" id="name" name="customer_name" placeholder="Nama Anda">
							<p class="text-danger">{{ $errors->first('customer_name') }}</p>
						</div>
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
							<p class="text-danger">{{ $errors->first('email') }}</p>
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="******">
						</div>
						<div class="col-md-12 form-group">
							<input type="phone" class="form-control" id="phone" name="customer_phone" placeholder="Your Phone">
							<p class="text-danger">{{ $errors->first('customer_phone') }}</p>
						</div>
						<div class="col-md-12 form-group">
							<input type="address" class="form-control" id="address" name="customer_address" placeholder="Your Address">
							<p class="text-danger">{{ $errors->first('customer_address') }}</p>
						</div>
						<div class="col-md-12 form-group">
							<select class="form-control" name="province_id" id="province_id" required>
								<option value="">Pilih Propinsi</option>
								@foreach ($provinces as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                                <p class="text-danger">{{ $errors->first('province_id') }}</p>
							</select>
						</div>
						<div class="col-md-12 form-group">
							<select class="form-control" name="city_id" id="city_id" required>
								<option value="">Pilih Kabupaten/Kota</option>
							</select>
							<p class="text-danger">{{ $errors->first('city_id') }}</p>
						</div>
						<div class="col-md-12 form-group">
							<select class="form-control" name="district_id" id="district_id" required>
								<option value="">Pilih Kecamatan</option>
							</select>
							<p class="text-danger">{{ $errors->first('district_id') }}</p>
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="remember">
								<label for="f-option2">Agree</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="btn submit_btn">Register</button>
							<!-- <a href="#">Forgot Password?</a> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('js3')
<script>
    $('#province_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/city') }}",
            type: "GET",
            data: { province_id: $(this).val() },
            success: function(html){

                $('#city_id').empty()
                $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                $.each(html.data, function(key, item) {
                    $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })

    $('#city_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/district') }}",
            type: "GET",
            data: { city_id: $(this).val() },
            success: function(html){
                $('#district_id').empty()
                $('#district_id').append('<option value="">Pilih Kecamatan</option>')
                $.each(html.data, function(key, item) {
                    $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })
</script>
@endsection('')
