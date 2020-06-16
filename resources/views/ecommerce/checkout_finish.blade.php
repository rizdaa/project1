@extends('layouts.ecommerce')

@section('title')
<title>Keranjang Belanja</title>
@endsection

@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Pesanan Diterima</h2>
                <div class="page_link">
                    <a href="{{ url('/') }}">Home</a>
                    <a href="">Invoice</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Order Details Area =================-->
<section class="order_details p_120">
    <div class="container">
        <h3 class="title_confirmation">Terima kasih, pesanan anda telah kami terima, <br> silahkan cek dashboard anda untuk konfirmasi pembayaran</h3>
        <div class="row order_d_inner">
            <div class="col-lg-6">
                <div class="details_item">
                    <h4>Informasi Pesanan</h4>
                    <ul class="list">
                        <li>
                            <a href="#">
                                <span>Invoice</span> : {{ $order->invoice }}</a>
                            </li>
                            <li>
                                <a href="#">
                                    <span>Tanggal</span> : {{ $order->created_at }}</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>Total</span> : Rp {{ number_format($order->subtotal) }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="details_item">
                                <h4>Informasi Pemesan</h4>
                                <ul class="list">
                                    <li>
                                        <a href="#">
                                            <span>Alamat</span> : {{ $order->customer_address }}</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <span>Kota</span> : {{ $order->district->city->name }}</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <span>Country</span> : Indonesia</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- <h4 style="color: blue; ">Silahkan kirim bukti transfer via wa</h4>
                                <button class="btn btn-primary" type="submit"> Kirim Bukti </button> -->
                            </div>
                        </section>
                        <!--================End Order Details Area =================-->                          
                        @endsection

                        <!-- @section('js2')
                        <script>
                            $('button').click(function(){
                                console.log($('button').val());
                                // window.location.href='https://api.whatsapp.com/send?phone=6282119198100&text=Hai%20saya%20{nama}%20{email}%20{no_hp}%20{mulai_sewa}%20{akhir_sewa}%20{mobil}';
                                window.location.href='https://api.whatsapp.com/send?phone=6281385433322&text=Hai%20saya%20' + $('#first').val() + "%20" + $('#number').val() + $('#email').val() + $('#add1').val()});
                        </script> 
                        @endsection -->