<main id="main" class="main">
    <div class="pagetitle">
        <h1>Danh sách khách hàng</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/dashboard">Home</a>
                </li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách</h5>
                        <div class="w-full d-flex justify-content-between">
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="d-flex justify-content-center align-items-center me-4">
                                    <label for="">Show</label>
                                    <select class="ms-3" aria-label="Default select example">
                                        <option selected value="5">5</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                    </select>
                                </div>
                                <input type="text" class="form-control" placeholder="search...">
                            </div>
                            <button class="btn btn-success btn-sm d-block me-3">Export</button>
                        </div>
                        <!-- Default Table -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">
                                            </label>
                                        </div>
                                    </th>
                                    <th scope="col">#</th>
                                    <th scope="col">
                                        Họ tên
                                        <span>
                                            <i class="bi bi-arrow-down-short"></i>
                                            <i class="bi bi-arrow-up-short"></i>
                                        </span>
                                    </th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Ngày đăng ký<span>
                                            <i class="bi bi-arrow-down-short"></i>
                                            <i class="bi bi-arrow-up-short"></i>
                                        </span></th>
                                    <th scope="col">Hoạt động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1">
                                            <label class="form-check-label" for="gridCheck1">

                                            </label>
                                        </div>
                                    </th>
                                    <th scope="row">1</th>
                                    <td>Brandon Jacob</td>
                                    <td>Designer</td>
                                    <td>28</td>
                                    <td>2016-05-25</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                                checked="">
                                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- End Default Table Example -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>