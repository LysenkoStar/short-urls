<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column text-center">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">ShortLy</h3>
            <nav class="nav nav-masthead justify-content-center">
                <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="#">Features</a>
                <a class="nav-link" href="#">Contact</a>
            </nav>
        </div>
    </header>

    <main role="main" class="inner cover">
        <h1 class="cover-heading mb-4">Build your short link.</h1>

        <form>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="currentUrl" placeholder="Your link" aria-label="Recipient's username" aria-describedby="generateUrl">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="generateUrl">Generate</button>
                </div>
            </div>
        </form>

        <div class="input-group mb-3 d-none" id="readyLink">
            <input type="text" class="form-control" placeholder="Your generated short link" id="shortLink" aria-label="Your generated short link" aria-describedby="shortLink">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="copyLink">Copy</button>
            </div>
        </div>

    </main>

    <footer class="mastfoot mt-auto">
        <div class="inner">
            <p>@BogdanLysenko - 2020</p>
        </div>
    </footer>
</div>
<style>
    a,
    a:focus,
    a:hover {
        color: #fff;
    }
    .btn-secondary,
    .btn-secondary:hover,
    .btn-secondary:focus {
        color: #333;
        text-shadow: none; /* Prevent inheritance from `body` */
        background-color: #fff;
        border: .05rem solid #fff;
    }
    html,
    body {
        height: 100%;
        background-color: #333;
    }
    body {
        display: -ms-flexbox;
        display: flex;
        color: #fff;
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }
    .cover-container {
        max-width: 42em;
    }
    .masthead {
        margin-bottom: 2rem;
    }
    .masthead-brand {
        margin-bottom: 0;
    }
    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgba(255, 255, 255, .5);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
    }
    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(255, 255, 255, .25);
    }
    .nav-masthead .nav-link + .nav-link {
        margin-left: 1rem;
    }
    .nav-masthead .active {
        color: #fff;
        border-bottom-color: #fff;
    }
    @media (min-width: 48em) {
        .masthead-brand {
            float: left;
        }
        .nav-masthead {
            float: right;
        }
    }
    .cover {
        padding: 0 1.5rem;
    }
    .cover .btn-lg {
        padding: .75rem 1.25rem;
        font-weight: 700;
    }
    .mastfoot {
        color: rgba(255, 255, 255, .5);
    }
</style>
