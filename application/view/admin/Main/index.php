<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="<?= ADMIN?>/user/logout-admin">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h2>All modified links</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Original</th>
                        <th>Link code</th>
                        <th>Date</th>
                        <th>Hits</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($links as $link) : ?>
                        <tr>
                            <td><?= $link->original; ?></td>
                            <td><?= $link->modified; ?></td>
                            <td><?= $link->date; ?></td>
                            <td><?= $link->hits; ?></td>
                            <td><button type="button" id="removeLink" data-id="<?= $link->id; ?>" class="btn btn-outline-danger btn-sm">X</button></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<style>
    body {
        font-size: .875rem;
    }
    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 48px 0 0; /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }
    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    }
    @supports ((position: -webkit-sticky) or (position: sticky)) {
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
        }
    }
    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }
    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
    }
    .sidebar .nav-link.active {
        color: #007bff;
    }
    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }
    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    [role="main"] {
        padding-top: 133px; /* Space for fixed navbar */
    }
    @media (min-width: 768px) {
        [role="main"] {
            padding-top: 48px; /* Space for fixed navbar */
        }
    }

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }
    .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
    }
    .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
    }
    .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }
</style>
