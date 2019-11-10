 <div class="col-lg-3 col-md-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class=" card-title">Pages</h3>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="{{url('htsf')}}" class="nav-link 
                                @if(Route::is('htsf')) active @endif">How to sell fast</a></li>
                        
                            <li class="nav-item"><a href="{{url('membership')}}" class="nav-link @if(Route::is('membership')) active @endif">VIP badge</a></li>
                            <li class="nav-item"><a href="{{url('contact')}}" class="nav-link @if(Route::is('contact')) active @endif">Contact us</a></li>
                            <li class="nav-item"><a href="{{url('blog')}}" class="nav-link @if(Route::is('blog')) active @endif">Blog</a></li>
                            <li class="nav-item"><a href="{{url('faq')}}" class="nav-link @if(Route::is('faq')) active @endif">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>