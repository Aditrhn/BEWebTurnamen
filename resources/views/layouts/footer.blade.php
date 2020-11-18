<footer>
<div class="container-fluid" style="background-color: #35346c; color: white; margin-top: 6%;">
    <div class="row copyright">
        <div class="col-md-4">
            <img class="img-footer" src="{{ asset('assets/img/gameski.png') }}" alt="">
            <!--<div class="row" style="padding-top : 20px;">
                <a href="#">
                    <img class="img-sosial" src="{{ URL::asset('assets/img/ICON/instagram-white.png') }}" alt="Instagram">
                </a>
                <a href="#">
                    <img class="img-sosial" src="{{ URL::asset('assets/img/ICON/facebook-white.png') }}" alt="Facebook">
                </a>
                <a href="#">
                    <img class="img-sosial" src="{{ URL::asset('assets/img/ICON/whatsapp-white.png') }}" alt="Whatsapp">
                </a>
                <a href="#">
                    <img class="img-sosial" src="{{ URL::asset('assets/img/ICON/youtube-white.png') }}" alt="Youtube">
                </a>
            </div>-->
        </div>
        <div class="col-md-4">
            <h4 style="font-weight: bold;">About Us</h4>
            <p style="text-align: justify">Gameskii adalah sebuah platform turnamen gaming yang dikembangkan dengan tujuan 
             untuk membantu memajukan industri esports, khususnya di Indonesia, dengan cara memberikan kesempatan bagi 
             para gamer untuk merasakan nuansa bertanding secara profesional melalui berbagai turnamen-turnamen pilihan, 
             serta menyediakan fitur-fitur yang dapat memudahkan para penyelenggara turnamen untuk mengadakan event mereka sendiri.
             Gameskii merupakan hak milik dari CV. Nongskii Class. Akan tetapi, aset-aset yang berasosiasi dengan game-game yang 
             ada di website ini, adalah hak milik dari masing-masing developer.
            </p>
            <p></p>
        </div>
        <div class="col-md-4">
            <?php 
                $sponsor = DB::table('admin_sponsors')->select('logo_url')->get()
            ?>
            <h4 style="font-weight: bold;">Official Partner :</h4>
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

