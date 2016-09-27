<div class="container-fluid">
    <!-- Half Page Image Background Carousel Header -->
    <header id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            @foreach (File::allFiles('img/portada/') as $key => $file)
                <li data-target="#myCarousel" data-slide-to="{{ $key }}" class="{{ ($key == 0)? 'active' : '' }}"></li>
            @endforeach
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner" role="listbox">
            @foreach (File::allFiles('img/portada/') as $key => $file)
                <div class="item {{ ($key == 0)? 'active' : '' }}">
                    <!-- Set the first background image using inline CSS below. -->
                    <img src="{{ asset('img/portada/'.$file->getRelativePathName()) }}" alt="foto de portada" style="width: 800px; height: 420px" class="img-responsive center-block">
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
</div>