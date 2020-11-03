<footer>
    <div class="container-fluid" style="background-color: #35346c;">
        <div class="row copyright">
            <div class="col-md-4">
                <img class="img-footer" src="{{ asset('assets/img/gameski.png') }}" alt="">
                <div class="row" style="padding-top : 20px;">
                    <img class="img-sosial" src="{{ URL::asset('assets/img/ICON/instagram-white.png') }}" alt="">
                    <img class="img-sosial" src="{{ URL::asset('assets/img/ICON/facebook-white.png') }}" alt="">
                    <img class="img-sosial" src="{{ URL::asset('assets/img/ICON/whatsapp-white.png') }}" alt="">
                    <img class="img-sosial" src="{{ URL::asset('assets/img/ICON/youtube-white.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-4">
                <h4>About Us</h4>
                <p style="text-align: center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                </p>
                <p>Telp. 0812-2799-3505</p>
            </div>
            <div class="col-md-4">
                <?php 
                    $sponsor = DB::table('admin_sponsors')->select('logo_url')->get()
                ?>
                <h4>Supported By :</h4>
                @forelse ($sponsor as $sponsors)
                    <img class="img-support" src="{{ URL::asset('images/admin/sponsors/'. $sponsors->logo_url) }}" alt="">
                @empty
                    <p>Nongskii 2020</p>
                @endforelse
            </div>
        </div>
        <p class="copyright-font">&copy; 2020 Gameskii.</p>
    </div>
</footer>